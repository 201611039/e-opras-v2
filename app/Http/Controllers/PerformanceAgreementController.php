<?php

namespace App\Http\Controllers;

use App\Events\ReviewOpras;
use Illuminate\Http\Request;
use App\Models\MidYearReview;
use App\Models\PerformanceAgreement;

class PerformanceAgreementController extends Controller
{
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $this->authorize('performance-agreement-create');

        return view('pages.form.performance-agreement.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->authorize('performance-agreement-create');

        $opras = request()->user()->myOpras();

        $validator = validator($request->all(), [
            'objective' => ['required', 'string', 'max:1000'],
            'resource'  => ['required', 'string', 'max:1000'],
            'criteria'  => ['required', 'string', 'max:1000'],
            'target'    => ['required', 'string', 'max:1000'],
        ]);

        //Validation above failed
        if ($validator->fails()) {
            toastr('Oops! something went wrong try again', 'error');
            $validator->validate();
        }

        $performanceAgreement = $opras->performanceAgreement()->firstOrCreate([
            'objective' => $request->objective,
            'target'    => $request->target,
            'criteria'  => $request->criteria,
            'resource'  => $request->resource,
        ]);

        $opras->midYearReview()->firstOrCreate([
            'objective' => $performanceAgreement->objective,
            'performance_agreement_id' => $performanceAgreement->id
        ]);

        toastr('Added successfully', 'success');
        return redirect()->route('performance-agreement.index');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\PerformanceAgreement  $performanceAgreement
     * @return \Illuminate\Http\Response
     */
    public function edit(PerformanceAgreement $performanceAgreement)
    {
        $this->authorize('performance-agreement-update');

        return view('pages.form.performance-agreement.edit', [
            'performanceAgreement' => $performanceAgreement
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\PerformanceAgreement  $performanceAgreement
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, PerformanceAgreement $performanceAgreement)
    {
        $this->authorize('performance-agreement-update');

        $validator = validator($request->all(), [
            'objective' => ['required', 'string', 'max:1000'],
            'resource'  => ['required', 'string', 'max:1000'],
            'criteria'  => ['required', 'string', 'max:1000'],
            'target'    => ['required', 'string', 'max:1000'],
            ]);

            //Validation above failed
            if ($validator->fails()) {
                toastr('Oops! something went wrong try again', 'error');
                $validator->validate();
            }

            $performanceAgreement->update([
                'objective' => $request->objective,
                'target' => $request->target,
                'criteria' => $request->criteria,
                'resource' => $request->resource,
            ]);

            // Update Mid Year Review
            $midYearReview = MidYearReview::where('performance_agreement_id', $performanceAgreement->id)->first();
            $midYearReview->update([
                'objective' => $performanceAgreement->objective,
            ]);

            toastr('Updated successfully', 'success');
            return redirect()->route('performance-agreement.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\PerformanceAgreement  $performanceAgreement
     * @return \Illuminate\Http\Response
     */
    public function destroy(PerformanceAgreement $performanceAgreement)
    {
        $this->authorize('performance-agreement-delete');

        $performanceAgreement->delete();
        toastr('Deleted successfully', 'success');
        return back();
    }

    public function foward()
    {
        $this->authorize('performance-agreement-foward');

        $opras = request()->user()->myOpras();

        $opras->review()->firstOrCreate([
            'section' => 'performance_agreement'
        ]);

        $opras->performanceAgreement()->update(['comments' => null]);

        broadcast(new ReviewOpras($opras->personalInformation->supervisor_id))->toOthers();

        toastr('Fowarded to supervisor successfully');
        return back();
    }
}
