<?php

namespace App\Http\Controllers;

use App\Events\ReviewOpras;
use Illuminate\Http\Request;
use App\Models\OverallPerformance;

class OverallPerformanceController extends Controller
{
    protected $fields = [
        'team_work', 'interaction', 'respect', 'writting', 'speak', 'listen', 'train', 'plan_organize', 'lead', 'innitiate_innovate', 'output', 'persistence', 'demand', 'extra_work', 'responsibility', 'decisions', 'customer', 'followership', 'support', 'instructions', 'working', 'services', 'government'
    ];


    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\OverallPerformance  $overallPerformance
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, OverallPerformance $overallPerformance)
    {
        $this->authorize('overall-perfomance-update');

        $request->validate([
            'appraisee_comments' => ['nullable', 'string', 'max:2000']
        ]);

        $overallPerformance->update([
            'appraisee_comments' => $request->appraisee_comments
        ]);

        toastr()->success('Comments saved successfully');
        return back();
    }

    public function review(Request $request, OverallPerformance $overallPerformance)
    {
        $this->authorize('overall-perfomance-review');

        $request->validate([
            'supervisor_comments' => ['nullable', 'string', 'max:2000']
        ]);

        $overallPerformance->update([
            'supervisor_comments' => $request->supervisor_comments
        ]);

        toastr()->success('Comments saved successfully');
        return back();
    }

    public function foward()
    {
        $this->authorize('overall-perfomance-foward');

        $opras = request()->user()->myOpras();

        $opras->reviews()->firstOrCreate([
            'section' => 'overall_performance'
        ]);

        broadcast(new ReviewOpras($opras->personalInformation->supervisor_id))->toOthers();

        toastr('Fowarded to supervisor successfully');
        return back();
    }

}
