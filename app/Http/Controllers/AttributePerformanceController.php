<?php

namespace App\Http\Controllers;

use App\Models\Opras;
use App\Events\ReviewOpras;
use Illuminate\Http\Request;
use App\Models\AttributePerformance;
use Illuminate\Support\Facades\Validator;

class AttributePerformanceController extends Controller
{
    protected $appraiseeValidation = [
        "appraisee_team_work" => ['required', 'max:5', 'min:1', 'integer'],
        "appraisee_interaction" => ['required', 'max:5', 'min:1', 'integer'],
        "appraisee_respect" => ['required', 'max:5', 'min:1', 'integer'],
        "appraisee_writting" => ['required', 'max:5', 'min:1', 'integer'],
        "appraisee_speak" => ['required', 'max:5', 'min:1', 'integer'],
        "appraisee_listen" => ['required', 'max:5', 'min:1', 'integer'],
        "appraisee_train" => ['required', 'max:5', 'min:1', 'integer'],
        "appraisee_plan_organize" => ['required', 'max:5', 'min:1', 'integer'],
        "appraisee_lead" => ['required', 'max:5', 'min:1', 'integer'],
        "appraisee_innitiate_innovate" => ['required', 'max:5', 'min:1', 'integer'],
        "appraisee_output" => ['required', 'max:5', 'min:1', 'integer'],
        "appraisee_persistence" => ['required', 'max:5', 'min:1', 'integer'],
        "appraisee_demand" => ['required', 'max:5', 'min:1', 'integer'],
        "appraisee_extra_work" => ['required', 'max:5', 'min:1', 'integer'],
        "appraisee_responsibility" => ['required', 'max:5', 'min:1', 'integer'],
        "appraisee_decisions" => ['required', 'max:5', 'min:1', 'integer'],
        "appraisee_customer" => ['required', 'max:5', 'min:1', 'integer'],
        "appraisee_followership" => ['required', 'max:5', 'min:1', 'integer'],
        "appraisee_support" => ['required', 'max:5', 'min:1', 'integer'],
        "appraisee_instructions" => ['required', 'max:5', 'min:1', 'integer'],
        "appraisee_working" => ['required', 'max:5', 'min:1', 'integer'],
        "appraisee_services" => ['required', 'max:5', 'min:1', 'integer'],
        "appraisee_government" => ['required', 'max:5', 'min:1', 'integer']
    ];

    protected $agreedValidation = [
        "team_work" => ['required', 'max:5', 'min:1', 'integer'],
        "interaction" => ['required', 'max:5', 'min:1', 'integer'],
        "respect" => ['required', 'max:5', 'min:1', 'integer'],
        "writting" => ['required', 'max:5', 'min:1', 'integer'],
        "speak" => ['required', 'max:5', 'min:1', 'integer'],
        "listen" => ['required', 'max:5', 'min:1', 'integer'],
        "train" => ['required', 'max:5', 'min:1', 'integer'],
        "plan_organize" => ['required', 'max:5', 'min:1', 'integer'],
        "lead" => ['required', 'max:5', 'min:1', 'integer'],
        "innitiate_innovate" => ['required', 'max:5', 'min:1', 'integer'],
        "output" => ['required', 'max:5', 'min:1', 'integer'],
        "persistence" => ['required', 'max:5', 'min:1', 'integer'],
        "demand" => ['required', 'max:5', 'min:1', 'integer'],
        "extra_work" => ['required', 'max:5', 'min:1', 'integer'],
        "responsibility" => ['required', 'max:5', 'min:1', 'integer'],
        "decisions" => ['required', 'max:5', 'min:1', 'integer'],
        "customer" => ['required', 'max:5', 'min:1', 'integer'],
        "followership" => ['required', 'max:5', 'min:1', 'integer'],
        "support" => ['required', 'max:5', 'min:1', 'integer'],
        "instructions" => ['required', 'max:5', 'min:1', 'integer'],
        "working" => ['required', 'max:5', 'min:1', 'integer'],
        "services" => ['required', 'max:5', 'min:1', 'integer'],
        "government" => ['required', 'max:5', 'min:1', 'integer']
    ];

    protected $supervisorValidation = [
        "supervisor_team_work" => ['required', 'max:5', 'min:1', 'integer'],
        "supervisor_interaction" => ['required', 'max:5', 'min:1', 'integer'],
        "supervisor_respect" => ['required', 'max:5', 'min:1', 'integer'],
        "supervisor_writting" => ['required', 'max:5', 'min:1', 'integer'],
        "supervisor_speak" => ['required', 'max:5', 'min:1', 'integer'],
        "supervisor_listen" => ['required', 'max:5', 'min:1', 'integer'],
        "supervisor_train" => ['required', 'max:5', 'min:1', 'integer'],
        "supervisor_plan_organize" => ['required', 'max:5', 'min:1', 'integer'],
        "supervisor_lead" => ['required', 'max:5', 'min:1', 'integer'],
        "supervisor_innitiate_innovate" => ['required', 'max:5', 'min:1', 'integer'],
        "supervisor_output" => ['required', 'max:5', 'min:1', 'integer'],
        "supervisor_persistence" => ['required', 'max:5', 'min:1', 'integer'],
        "supervisor_demand" => ['required', 'max:5', 'min:1', 'integer'],
        "supervisor_extra_work" => ['required', 'max:5', 'min:1', 'integer'],
        "supervisor_responsibility" => ['required', 'max:5', 'min:1', 'integer'],
        "supervisor_decisions" => ['required', 'max:5', 'min:1', 'integer'],
        "supervisor_customer" => ['required', 'max:5', 'min:1', 'integer'],
        "supervisor_followership" => ['required', 'max:5', 'min:1', 'integer'],
        "supervisor_support" => ['required', 'max:5', 'min:1', 'integer'],
        "supervisor_instructions" => ['required', 'max:5', 'min:1', 'integer'],
        "supervisor_working" => ['required', 'max:5', 'min:1', 'integer'],
        "supervisor_services" => ['required', 'max:5', 'min:1', 'integer'],
        "supervisor_government" => ['required', 'max:5', 'min:1', 'integer']
    ];

    protected $fields = [
        'team_work', 'interaction', 'respect', 'writting', 'speak', 'listen', 'train', 'plan_organize', 'lead', 'innitiate_innovate', 'output', 'persistence', 'demand', 'extra_work', 'responsibility', 'decisions', 'customer', 'followership', 'support', 'instructions', 'working', 'services', 'government'
    ];

    protected $mark;
    protected $relation;
    protected $field;

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\AttributePerformance  $attributePerformance
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {
        $this->authorize('attribute-good-performance-store');

        $attributePerformance = request()->user()->myOpras()->attributePerformance;

        if ($attributePerformance->agreedMarkFlag()) {
            $validator = Validator::make($request->all(), $this->agreedValidation);
            $agreed = true;
        } else {
            $validator = Validator::make($request->all(), $this->appraiseeValidation);
            $agreed = false;
        }

        // Validate
        if ($validator->fails()) {
            toastr('All rated marks fields are required and should be not greater than 5 and not less than 1', 'error', 'Oops! something went wrong');
            $validator->validate();
        }

        // store rated mark for each attrubute
        foreach ($this->fields as $key => $field) {
            $this->relation = camel_case($field.'_mark');

            if($agreed) {
                $this->mark = $request->$field;
                $this->saveAgreedRatedMark($attributePerformance);

            } else {
                $this->field = $field;
                $this->mark = $request->{'appraisee_'.$field};
                $this->saveAppraiseeRatedMark($attributePerformance);
            }

        }

        toastr("Data is saved successfully", 'success');
        return back();
    }

    public function foward()
    {
        $this->authorize('attribute-good-performance-foward');

        $opras = request()->user()->myOpras()->with('attributePerformance')->first();

        $attributePerformance = $opras->attributePerformance;

        if (!($attributePerformance->appraiseeMarkFlag())) {
            toastr('Filling appraisee marks rate for all attributes is required', 'error');
            return redirect()->route('attribute-performance.index');
        }

        if ($attributePerformance->agreedMarkFlag()) {
            if (!$attributePerformance->allMarkFlag()) {
                toastr('Filling agreed marks rate for all attributes is required', 'error');
                return redirect()->route('attribute-performance.index');
            }
        }

        $opras->reviews()->firstOrCreate([
            'section' => 'attribute_good_performance'
        ]);

        $attributePerformance->update(['comments' => null]);

        broadcast(new ReviewOpras($opras->personalInformation->supervisor_id))->toOthers();

        toastr('Fowarded to supervisor successfully');
        return back();
    }

    public function review(Opras $opras, Request $request)
    {
        $this->authorize('attribute-good-performance-review');

        $validator = Validator::make($request->all(), $this->supervisorValidation);

        // Validate
        if ($validator->fails()) {
            toastr('All rated marks fields are required and rated marks is not greater than 5 and not less than 1', 'error', 'Oops! something went wrong');
            $validator->validate();
        }

        $attributePerformance = $opras->attributePerformance;

        foreach ($this->fields as $key => $field) {
            $this->relation = camel_case($field.'_mark');

            $this->field = 'supervisor_'.$field;

            $this->mark = $request->{$this->field};

            $this->saveSupervisorRatedMark($attributePerformance);

        }

        toastr("Data is saved successfully", 'success');
        return back();
    }

    public function saveAppraiseeRatedMark(AttributePerformance $attributePerformance)
    {
        if (($attributePerformance->{$this->relation})??false) {
            $attributePerformance->{$this->relation}()->update([
                'appraisee' => $this->mark
            ]);
            return $attributePerformance->{$this->relation}->id;

        } else {
            return $attributePerformance->update([
                $this->field => $attributePerformance->{$this->relation}()->create([
                    'appraisee' => $this->mark
                ])->id,
            ]);
        }
    }

    public function saveAgreedRatedMark(AttributePerformance $attributePerformance)
    {
        return $attributePerformance->{$this->relation}()->update([
            'agreed' => $this->mark
        ]);
    }

    public function saveSupervisorRatedMark(AttributePerformance $attributePerformance)
    {
        return $attributePerformance->{$this->relation}()->update([
            'supervisor' => $this->mark
        ]);
    }
}
