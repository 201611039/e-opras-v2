<?php

namespace App\Http\Controllers;

use App\Models\Opras;
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

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\AttributePerformance  $attributePerformance
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {
        $opras = request()->user()->myOpras();

        if(!isset($opras->attributePerformance)) {
            $attributePerformance =  $opras->attributePerformance()->create();
        }
        else {
            $attributePerformance = $opras->attributePerformance;
        }

        if ($attributePerformance->agreedMarkFlag()) {
            $validator = Validator::make($request->all(), $this->agreedValidation);
            $agreed = true;
        } else {
            $validator = Validator::make($request->all(), $this->appraiseeValidation);
            $agreed = false;
        }

        // Validate
        if ($validator->fails()) {
            toastr('Oops! something went wrong. Make sure all field are filled and rated mark is not greater than 5 and not less than 1', 'error');
            $validator->validate();
        }

        // store rated mark for each attrubute
        foreach ($this->fields as $key => $value) {
            $this->relation = camel_case($value.'_mark');

            if($agreed) {
                $this->mark = $request->$value;
                $ratedMarkId = $this->saveAgreedRatedMark($attributePerformance);

            } else {
                $field = 'appraisee_'.$value;
                $this->mark = $request->$field;
                $ratedMarkId = $this->saveAppraiseeRatedMark($attributePerformance);
            }

            if ($ratedMarkId) {
                if($attributePerformance) {
                    $attributePerformance->update([
                        $value => $ratedMarkId,
                    ]);
                }
            }

        }

        toastr("Data is saved successfully", 'success');
        return back();
    }

    public function foward()
    {
        return 1;
    }

    public function saveAppraiseeRatedMark(AttributePerformance $attributePerformance)
    {
        if (($attributePerformance->{$this->relation})??false) {
            $attributePerformance->{$this->relation}()->update([
                'appraisee' => $this->mark
            ]);
            return $attributePerformance->{$this->relation}->id;

        } else {
            return $attributePerformance->{$this->relation}()->create([
                'appraisee' => $this->mark
            ])->id;
        }
    }

    public function saveAgreedRatedMark(AttributePerformance $attributePerformance)
    {
        $attributePerformance->{$this->relation}()->update([
            'agreed' => $this->mark
        ]);
    }
}
