<?php

namespace App\Http\Livewire\Review;

use App\Models\Opras;
use Livewire\Component;
use App\Events\OprasReviewed;
use Illuminate\Support\Facades\Gate;
use App\Models\RevisedObjective as ModelsRevisedObjective;

class RevisedObjective extends Component
{
    public Opras $opras;
    public ModelsRevisedObjective $revisedObjectiveModel;
    public $comments;
    public $message;
    public $showModal = false;

    protected $listeners = ['accept', 'decline'];

    public function mount()
    {
        $this->checkSection();
    }

    public function selected($performance_id)
    {
        $this->message = '';
        $this->revisedObjectiveModel = ModelsRevisedObjective::find($performance_id);
        $this->comments = $this->revisedObjectiveModel->comments;
        $this->showModal = true;
        $this->emitSelf('addComment');
    }

    public function saveComment()
    {
        if ($this->comments) {
            $this->revisedObjectiveModel->update([
                'comments' => $this->comments
            ]);
            $this->showModal = false;
            $this->message = ['Reason added successfully', 'success'];
            $this->opras->refresh();
        } else {
            $this->message = ['The reason field is required', 'danger'];
        }
    }

    public function accept()
    {
        $this->opras->revisedObjectives()->update(['comments' => null]); // remove all comments
        $this->opras->reviewSectionFour()->delete(); // delete reviewing session

        $this->opras->sectionFour()->update([ // mark section four as complete
            'status' => 1
        ]);

        $this->opras->sections()->firstOrCreate([ // create new section which is annual performance review
            'section' => 'annual_performance_review'
        ]);

        broadcast(new OprasReviewed($this->opras))->toOthers();

        toastr('Accepted successfully');
        return redirect()->route('review.index');
    }

    public function decline()
    {
        if ($this->checkrevisedObjectives()) {
            $this->opras->reviewSectionFour()->delete(); // delete reviewing session

            broadcast(new OprasReviewed($this->opras))->toOthers();

            toastr('Declined successfully');
            return redirect()->route('review.index');
        } else {
            $this->message = ['Add reason for atleast one performance agreement', 'danger'];
        }
    }

    public function checkrevisedObjectives()
    {
        foreach ($this->opras->revisedObjectives as $p) {
            if ($p->comments) {
                return true;
            }
        }

        if (!$this->opras->revisedObjectives->count()) { // if no revised return true
            return true;
        }

        return false;
    }

    public function checkSection()
    {
        if($this->opras->sectionFour()->status) {
            toastr('Revised Objective section is already completed', 'error', 'You are not allowed');
            return redirect()->route('review.index');
        } elseif (!$this->opras->reviewSectionFour()) {
            toastr('Revised Objective section is not under review', 'error', 'You are not allowed');
            return redirect()->route('review.index');
        }
    }

    public function render()
    {
        Gate::authorize('revised-objective-review');

        return view('livewire.review.revised-objective');
    }
}
