<?php

namespace App\Http\Controllers;

use App\Events\ReviewOpras;
use App\Models\AnnualReview;
use Illuminate\Http\Request;

class AnnualReviewController extends Controller
{

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\AnnualReview  $annualReview
     * @return \Illuminate\Http\Response
     */
    public function edit(AnnualReview $annualReview)
    {
        $this->authorize('annual-review-update');

        return view('pages.form.annual-review.edit', [
            'annualReview' => $annualReview
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\AnnualReview  $annualReview
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, AnnualReview $annualReview)
    {
        $this->authorize('annual-review-update');

        $request->validate([
            'progress_made' => ['required_if:task,null', 'string'],
            'appraisee' => ['required_if:task,null', 'integer', 'min:1', 'max:5'],
            'agreed' => ['required_if:task,1', 'integer', 'min:1', 'max:5']
        ], [
            'required_if' => 'The :attribute field is required'
        ]);

        if ($request->task) {
            $this->saveAgreedRatedMark($annualReview);
        } else {
            $annualReview->update([
                'progress_made' => $request->progress_made,
                'rated_mark_id' => $this->saveAppraiseeRatedMark($annualReview)
            ]);
        }

        toastr('Rated marks added successfully');
        return redirect()->route('annual-review.index');
    }

    public function foward()
    {
        $this->authorize('annual-review-foward');

        $opras = request()->user()->myOpras();

        foreach ($opras->annualReview as $key => $annualReview) {
            if (!($annualReview->progress_made) && !($annualReview->ratedMark->appraisee??false)) {
                toastr('Filling annual performance review for all objectives is required', 'error');
                return redirect()->route('annual-review.index');
            }
        }

        foreach ($opras->annualReviews as $annualReview) {
            if ($annualReview->agreedMarkFlag()) {
                if (!$annualReview->allMarkFlag()) {
                    toastr('Filling agreed rated mark for all objectives is required', 'error');
                    return redirect()->route('annual-review.index');
                }
            } else {
                toastr('Filling annual performance review for all objectives is required', 'error');
                return redirect()->route('annual-review.index');
            }
        }

        $opras->reviews()->firstOrCreate([
            'section' => 'annual_performance_review'
        ]);

        $opras->annualReviews()->update(['comments' => null]);

        broadcast(new ReviewOpras($opras->personalInformation->supervisor_id))->toOthers();

        toastr('Fowarded to supervisor successfully');
        return back();
    }

    public function saveAppraiseeRatedMark(AnnualReview $annualReview)
    {
        if (($annualReview->ratedMark->appraisee)??false) {
            $annualReview->ratedMark()->update([
                'appraisee' => request('appraisee')
            ]);
            return $annualReview->ratedMark->id;

        } else {
            return $annualReview->ratedMark()->create([
                'appraisee' => request('appraisee')
            ])->id;
        }
    }

    public function saveAgreedRatedMark(AnnualReview $annualReview)
    {
        $annualReview->ratedMark()->update([
            'agreed' => request('agreed')
        ]);
    }
}
