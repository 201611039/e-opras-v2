<?php

namespace App\Http\Livewire\Review;

use App\Models\Opras;
use Livewire\Component;
use App\Events\OprasReviewed;
use App\Models\AnnualReview as ModelsAnnualReview;
use Illuminate\Support\Facades\Gate;
use Illuminate\Support\Facades\Validator;

class AnnualReview extends Component
{
    public Opras $opras;
    public ModelsAnnualReview $annualReviewModel;
    public $supervisorMark;
    public $message;
    public $comments;
    public $confirmAnnualReview = true;
    public $error;
    public $showModal = false;

    protected $listeners = ['accept', 'decline'];

    protected $casts = [
        'supervisorMark' => 'integer'
    ];

    public function mount()
    {
        $this->checkSection();

        foreach ($this->opras->annualReview as $annualReview) {
            if (!($annualReview->allMarkFlag())) {
                $this->confirmAnnualReview = false;
                break;
            }
        }
    }

    public function selected($annualReviewId)
    {
        $this->clearData();
        $this->annualReviewModel = ModelsAnnualReview::find($annualReviewId);
        $this->supervisorMark = $this->annualReviewModel->ratedMark->supervisor;
        $this->comments = $this->annualReviewModel->comments;
        $this->showModal = true;
        // $this->emitSelf('addSupervisorMark');
    }

    public function saveMark()
    {
        $validator = Validator::make(['supervisor_mark' => $this->supervisorMark], [
            'supervisor_mark' => ['required', 'integer', 'max:5', 'min:1']
        ]);

        if ($validator->fails()) {
            $this->error = [$validator->errors()->first(), 'danger'];
        } else {
            $this->annualReviewModel->ratedMark()->update([
                'supervisor' => $this->supervisorMark
            ]);

            $this->clearData();
            $this->message = ['Supervisor mark added successfully', 'success'];
            $this->opras->refresh();
        }
    }

    public function saveComment()
    {
        $validator = Validator::make(['comments' => $this->comments], [
            'comments' => ['required', 'string']
        ]);

        if ($validator->fails()) {
            $this->message = [$validator->errors()->first(), 'danger'];
        } else {
            $this->annualReviewModel->update([
                'comments' => $this->comments
            ]);

            $this->clearData();
            $this->opras->refresh();

            $this->message = ['Reason added successfully', 'success'];
        }
    }

    public function accept()
    {
        if ($this->checkAnnualReview()) {
            $this->opras->reviewSectionFive()->delete(); // delete reviewing session

            broadcast(new OprasReviewed($this->opras))->toOthers();

            toastr('Completed successfully');
            return redirect()->route('review.index');
        } else {
            $this->clearData();
            $this->message = ['Filling annual performance review for all objectives is required', 'danger'];
        }
    }

    public function decline()
    {
        if ($this->checkAnnualReview()) {
            $this->opras->reviewSectionFive()->delete(); // delete reviewing session

            broadcast(new OprasReviewed($this->opras))->toOthers();

            toastr('Declined successfully');
            return redirect()->route('review.index');
        } else {
            $this->message = ['Add reason for atleast one annual review', 'danger'];
        }
    }

    public function checkAnnualReview()
    {
        foreach ($this->opras->annualReview as $annualReview) {
            if (!$annualReview->ratedMark->supervisor) {
                return false;
            }
        }

        if ($this->confirmAnnualReview) { // for agreed mark supervision
            foreach ($this->opras->annualReview as $annualReview) {
                if ($annualReview->comments) {
                    return true;
                }
            }

            return false;
        }

        return true;
    }

    public function checkSection()
    {
        if($this->opras->sectionFive()->status) {
            toastr('Annual performance review section is already completed', 'error', 'You are not allowed');
            return redirect()->route('review.index');
        }
    }

    public function clearData()
    {
        $this->supervisorMark = null;
        $this->showModal = false;
        $this->error = false;
        $this->message = false;
    }

    public function render()
    {
        Gate::authorize('annual-review-review');

        return view('livewire.review.annual-review');
    }
}
