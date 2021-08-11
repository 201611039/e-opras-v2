<?php

namespace App\Http\Controllers;

use App\Events\ReviewOpras;
use App\Models\MidYearReview;
use Illuminate\Http\Request;

class MidYearReviewController extends Controller
{
    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\MidYearReview  $midYearReview
     * @return \Illuminate\Http\Response
     */
    public function edit(MidYearReview $midYearReview)
    {
        $this->authorize('mid-year-review-update');

        return view('pages.form.mid-year-review.edit', [
            'midYearReview' => $midYearReview
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\MidYearReview  $midYearReview
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, MidYearReview $midYearReview)
    {
        $this->authorize('mid-year-review-update');

        $validator = validator($request->all(), [
            'progress_made'  => ['required', 'string', 'max:1000'],
            'factor_affecting_performance'  => ['required', 'string', 'max:1000'],
            ]);

        //Validation above failed
        if ($validator->fails()) {
            toastr('Oops! something went wrong try again', 'error');
            $validator->validate();
        }

        $midYearReview->update([
            'progress_made' => $request->progress_made,
            'factor_affecting_performance' => $request->factor_affecting_performance,
            ]);

        $midYearReview->annualReview()->updateOrCreate(
            [
                'mid_year_review_id' => $midYearReview->id
            ],
            [
            'objective' => $midYearReview->objective,
            'progress_made' => $request->progress_made,
            'opras_id'  => $midYearReview->opras->id
            ]
        );

        toastr('Data saved successfully', 'success');
        return redirect()->route('mid-year-review.index');
    }

    public function foward()
    {
        $this->authorize('mid-year-review-foward');

        $opras = request()->user()->myOpras();

        foreach ($opras->midYearReviews as $key => $midYearReview) {
            if (!$midYearReview->progress_made) {
                toastr('Filling mid-year review for all objectives is required', 'error');
                return redirect()->route('mid-year-review.index');
            }
        }

        $opras->reviews()->firstOrCreate([
            'section' => 'mid_year_review'
        ]);

        $opras->midYearReviews()->update(['comments' => null]);

        broadcast(new ReviewOpras($opras->personalInformation->supervisor_id))->toOthers();

        toastr('Fowarded to supervisor successfully');
        return back();

    }

}
