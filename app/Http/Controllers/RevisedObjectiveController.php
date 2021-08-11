<?php

namespace App\Http\Controllers;

use App\Events\ReviewOpras;
use Illuminate\Http\Request;
use App\Models\RevisedObjective;

class RevisedObjectiveController extends Controller
{

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $this->authorize('revised-objectives-create');

        return view('pages.form.revised-objectives.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->authorize('revised-objectives-create');

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

        $opras = request()->user()->myOpras();

        // create revised objective
        $revisedObjective = $opras->revisedObjectives()->create([
            'objective' => $request->objective,
            'target'    => $request->target,
            'criteria'  => $request->criteria,
            'resource'  => $request->resource,
        ]);

        // create annual review of that revised objective
        $revisedObjective->annualReview()->create([
            'objective' => $revisedObjective->objective,
            'opras_id'  => $revisedObjective->opras->id
        ]);

        toastr('Added successfully', 'success');
        return redirect()->route('revised-objectives.index');
    }


    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\RevisedObjective  $revisedObjective
     * @return \Illuminate\Http\Response
     */
    public function edit(RevisedObjective $revisedObjective)
    {
        $this->authorize('revised-objectives-update');

        return view('pages.form.revised-objectives.edit', [
            'revisedObjective' => $revisedObjective
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\RevisedObjective  $revisedObjective
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, RevisedObjective $revisedObjective)
    {
        $this->authorize('revised-objectives-update');

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

        $revisedObjective->update([
            'objective' => $request->objective,
            'target' => $request->target,
            'criteria' => $request->criteria,
            'resource' => $request->resource,
        ]);

        $revisedObjective->annualReview()->update([
            'objective' => $revisedObjective->objective,
            'opras_id'  => $revisedObjective->opras->id
        ]);

        toastr('Updated successfully', 'success');
        return redirect()->route('revised-objectives.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\RevisedObjective  $revisedObjective
     * @return \Illuminate\Http\Response
     */

    public function destroy(RevisedObjective $revisedObjective)
    {
        $this->authorize('revised-objectives-delete');

        $revisedObjective->delete();
        toastr('Deleted successfully', 'success');
        return back();
    }

    public function foward()
    {
        $this->authorize('revised-objectives-foward');

        $opras = request()->user()->myOpras();

        $opras->reviews()->firstOrCreate([
            'section' => 'revised_objective'
        ]);

        $opras->revisedObjectives()->update(['comments' => null]);

        broadcast(new ReviewOpras($opras->personalInformation->supervisor_id))->toOthers();

        toastr('Fowarded to supervisor successfully');
        return back();
    }
}
