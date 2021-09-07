<?php

namespace App\Http\Livewire\Form\Submission;

use App\Models\Opras;
use App\Models\PerformanceAgreement as ModelsPerformanceAgreement;
use Livewire\Component;

class PerformanceAgreement extends Component
{

    public Opras $opras;

    public function mount()
    {
        $this->opras = request()->user()->myOpras();
    }

    public function render()
    {
        return view('livewire.form.submission.performance-agreement');
    }
}
