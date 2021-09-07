<?php

namespace App\Http\Livewire\Review;

use App\Models\Opras;
use Livewire\Component;
use App\Events\OprasReviewed;
use Illuminate\Support\Facades\Gate;
use App\Models\PerformanceAgreement as ModelsPerformanceAgreement;

class PerformanceAgreement extends Component
{
    public Opras $opras;
    public ModelsPerformanceAgreement $performanceAgreementModel;
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
        $this->performanceAgreementModel = ModelsPerformanceAgreement::find($performance_id);
        $this->comments = $this->performanceAgreementModel->comments;
        $this->showModal = true;
        $this->emitSelf('addComment');
    }

    public function saveComment()
    {
        if ($this->comments) {
            $this->performanceAgreementModel->update([
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
        $this->opras->performanceAgreements()->update(['comments' => null]); // remove all comments
        $this->opras->reviewSectionTwo()->delete(); // delete reviewing session

        $this->opras->sectionTwo()->update([ // mark section two as complete
            'status' => 1
        ]);

        $this->opras->sections()->firstOrCreate([ // create new section which is mid year review
            'section' => 'mid_year_review'
        ]);

        broadcast(new OprasReviewed($this->opras))->toOthers();

        toastr('Accepted successfully');
        return redirect()->route('review.index');
    }

    public function decline()
    {
        if ($this->checkPerformanceAgreement()) {
            $this->opras->reviewSectionTwo()->delete(); // delete reviewing session

            broadcast(new OprasReviewed($this->opras))->toOthers();

            toastr('Declined successfully');
            return redirect()->route('review.index');
        } else {
            $this->message = ['Add reason for atleast one performance agreement', 'danger'];
        }
    }

    public function checkPerformanceAgreement()
    {
        foreach ($this->opras->performanceAgreements as $p) {
            if ($p->comments) {
                return true;
            }
        }
        return false;
    }

    public function checkSection()
    {
        if($this->opras->sectionTwo()->status) {
            toastr('Performance agreement section is already completed', 'error', 'You are not allowed');
            return redirect()->route('review.index');
        } elseif (!$this->opras->reviewsectionTwo()) {
            toastr('Performance agreement section is not under review', 'error', 'You are not allowed');
            return redirect()->route('review.index');
        }

    }

    public function render()
    {
        Gate::authorize('performance-agreement-review');

        return view('livewire.review.performance-agreement');
    }
}
