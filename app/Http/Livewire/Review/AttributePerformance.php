<?php

namespace App\Http\Livewire\Review;

use App\Models\Opras;
use Livewire\Component;
use App\Events\OprasReviewed;
use App\Models\AttributePerformance as ModelsAttributePerformance;
use Illuminate\Support\Facades\Gate;
use Illuminate\Support\Facades\Validator;

class AttributePerformance extends Component
{
    public Opras $opras;
    public $supervisorMark;
    public $comments = null;
    public $message;
    public $error;
    public ModelsAttributePerformance $attributePerformance;
    public $showModal = false;
    public $confirmAttributePerformance = false;

    protected $listeners = ['accept', 'decline', 'complete'];

    public function mount()
    {
        $this->checkSection();

        $this->attributePerformance = $this->opras->attributePerformance;

        // check for final review for supervisor which is agreed mark review if is true supervisor will be allowed to accept or decline the agreed mark entered by his/her appraisee
        if (($this->opras->attributePerformance->allMarkFlag()) && ($this->opras->reviewSectionSix())) {
            $this->confirmAttributePerformance = true;
        }
    }

    public function showCommentModal()
    {
        $this->clearData();
        $this->comments = $this->attributePerformance->comments;
        $this->showModal = true;
    }

    public function complete()
    {
        if ($this->opras->attributePerformance->supervisorMarkFlag()) {
            $this->opras->reviewSectionSix()->delete(); // delete reviewing session

            broadcast(new OprasReviewed($this->opras))->toOthers();

            toastr('Completed successfully');
            return redirect()->route('review.index');
        } else {
            $this->clearData();
            $this->message = ['Filling annual performance review for all objectives is required', 'danger'];
        }
    }

    public function saveComment()
    {
        $validator = Validator::make(['comments' => $this->comments], [
            'comments' => ['required', 'string']
        ]);

        if ($validator->fails()) {
            $this->message = [$validator->errors()->first(), 'danger'];
            return false;
        } else {
            $this->attributePerformance->update([
                'comments' => $this->comments
            ]);

            $this->clearData();
            $this->opras->refresh();

            $this->message = ['Reason added successfully', 'success'];
            return true;
        }
    }

    public function accept()
    {
        $this->opras->attributePerformance()->update(['comments' => null]); // remove all comments
        $this->opras->reviewSectionSix()->delete(); // delete reviewing session

        $this->opras->sectionSix()->update([ // mark section six as complete
            'status' => 1
        ]);

        $this->opras->sections()->firstOrCreate([ // create new section which is overall performance
            'section' => 'overall_performance'
        ]);

        broadcast(new OprasReviewed($this->opras))->toOthers();

        toastr('Accepted successfully');
        return redirect()->route('review.index');
    }

    public function decline()
    {

        if ($this->saveComment()) {
            if ($this->checkAttributePerformance()) {
                $this->opras->reviewSectionSix()->delete(); // delete reviewing session

                broadcast(new OprasReviewed($this->opras))->toOthers();

                toastr('Declined successfully');
                return redirect()->route('review.index');
            } else {
                $this->message = ['Add reason first', 'danger'];
            }
        } else {

        }
    }


    public function checkSection()
    {
        if($this->opras->sectionSix()->status) {
            toastr('Attribute of good performance section is already completed', 'error', 'You are not allowed');
            return redirect()->route('review.index');
        } elseif (!$this->opras->reviewSectionSix()) {
            toastr('Attribute of good performance section is not under review', 'error', 'You are not allowed');
            return redirect()->route('review.index');
        }
    }

    public function checkAttributePerformance()
    {
        if (!$this->attributePerformance->teamWorkMark->supervisor) {
            return false;
        }

        if ($this->confirmAttributePerformance) { // for agreed mark supervision
            if ($this->attributePerformance->comments) {
                return true;
            }

            return false;
        }

        return true;
    }

    public function clearData()
    {
        $this->showModal = false;
        $this->error = false;
        $this->message = false;
    }


    public function render()
    {
        Gate::authorize('attribute-good-performance-review');

        return view('livewire.review.attribute-performance');
    }
}
