<?php

namespace App\Http\Livewire\Form\Submission;

use App\Models\AttributePerformance as ModelsAttributePerformance;
use App\Models\Opras;
use Livewire\Component;

class AttributePerformance extends Component
{
    public Opras $opras;
    public ModelsAttributePerformance $attributePerformance;
    public $appraiseeInputDisabled = false;
    public $supervisorInputDisabled = false;
    public $underReview = false;
    public $complete = false;

    public function mount()
    {
        $this->opras = request()->user()->myOpras();
        $this->attributePerformance = $this->opras->attributePerformance;

        // check if section is compelete to disable all inputs
        if ($this->opras->sectionSix()->status??false) {
            $this->complete = true;
        }

        $this->checkAppraiseeInput();
        $this->checkSupervisorInput();

        if (!$this->opras->checkSectionSix()) {
            $this->appraiseeInputDisabled = true;
            $this->supervisorInputDisabled = true;
        }
    }

    public function checkAppraiseeInput()
    {
        if((($this->opras->reviewSectionSix())) || $this->attributePerformance->supervisorMarkFlag()) {
            $this->appraiseeInputDisabled = true;
        }
    }

    public function checkSupervisorInput() {
        if($this->opras->reviewSectionSix()) {
            $this->underReview = true;
        }
    }

    public function render()
    {
        return view('livewire.form.submission.attribute-performance');
    }
}
