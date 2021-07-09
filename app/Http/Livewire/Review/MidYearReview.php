<?php

namespace App\Http\Livewire\Review;

use App\Models\Opras;
use Livewire\Component;
use App\Events\OprasReviewed;
use App\Models\MidYearReview as ModelsMidYearReview;

class MidYearReview extends Component
{
    public Opras $opras;
    public ModelsMidYearReview $midYearReviewModel;
    public $comments;
    public $message;
    public $showModal = false;

    protected $listeners = ['accept', 'decline'];

    public function mount()
    {
        $this->checkSection();
    }

    public function selected($midYearReviewId)
    {
        $this->message = '';
        $this->midYearReviewModel = ModelsMidYearReview::find($midYearReviewId);
        $this->comments = $this->midYearReviewModel->comments;
        $this->showModal = true;
        $this->emitSelf('addComment');
    }

    public function saveComment()
    {
        if ($this->comments) {
            $this->midYearReviewModel->update([
                'comments' => $this->comments
            ]);
            $this->showModal = false;
            $this->opras->refresh();
            $this->message = ['Reason added successfully', 'success'];
        } else {
            $this->message = ['The reason field is required', 'danger'];
        }
    }

    public function accept()
    {
        $this->opras->midYearReview()->update(['comments' => null]); // remove all comments
        $this->opras->reviewSectionThree()->delete(); // delete reviewing session

        $this->opras->sectionThree()->update([ // mark section two as complete
            'status' => 1
        ]);

        $this->opras->sections()->firstOrCreate([ // create new section which is revised objective
            'section' => 'revised_objective'
        ]);

        broadcast(new OprasReviewed($this->opras))->toOthers();

        toastr('Accepted successfully');
        return redirect()->route('review.index');
    }

    public function decline()
    {
        if ($this->checkMidYearReview()) {
            $this->opras->reviewSectionThree()->delete(); // delete reviewing session

            broadcast(new OprasReviewed($this->opras))->toOthers();

            toastr('Declined successfully');
            return redirect()->route('review.index');
        } else {
            $this->message = ['Add reason for atleast one mid-year review', 'danger'];
        }
    }

    public function checkMidYearReview()
    {
        foreach ($this->opras->midYearReview as $p) {
            if ($p->comments) {
                return true;
            }
        }
        return false;
    }

    public function checkSection()
    {
        if($this->opras->sectionThree()->status) {
            toastr('Section two is already completed', 'error', 'You are not allowed');
            return redirect()->route('review.index');
        }
    }

    public function render()
    {
        return view('livewire.review.mid-year-review');
    }
}
