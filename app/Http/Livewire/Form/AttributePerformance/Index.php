<?php

namespace App\Http\Livewire\Form\AttributePerformance;

use App\Models\AttributePerformance;
use App\Models\Opras;
use Livewire\Component;
use Illuminate\Support\Facades\Gate;

class Index extends Component
{
    public Opras $opras;
    public AttributePerformance $attributePerformance;
    public $appraiseeInputDisabled = false;
    public $supervisorInputDisabled = false;
    public $underReview = false;
    public $complete = false;

    public function getListeners()
    {
        return [
            "echo-private:opras-reviwed.{$this->opras->id},OprasReviewed" => 'updateOpras',
        ];
    }

    public function mount()
    {
        $this->opras = request()->user()->myOpras();

        // Create attribute performance instance
        if(!isset($this->opras->attributePerformance)) {
            $this->attributePerformance =  $this->opras->attributePerformance()->create();
        }
        else {
            $this->attributePerformance = $this->opras->attributePerformance;
        }

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

    public function updateOpras()
    {
        $this->opras->refresh();
    }

    public function render()
    {
        Gate::authorize('attribute-good-performance-view');

        return view('livewire.form.attribute-performance.index');
    }
}
