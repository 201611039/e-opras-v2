<?php

namespace App\Http\Livewire\Form\Submission;

use App\Models\Opras;
use App\Models\OverallPerformance as ModelsOverallPerformance;
use Livewire\Component;

class OverallPerformance extends Component
{
    public Opras $opras;
    public ModelsOverallPerformance $overallPerformance;

    public function mount()
    {
        $this->opras = request()->user()->myOpras();
        $this->overallPerformance = $this->opras->overallPerformance;
    }

    public function render()
    {
        return view('livewire.form.submission.overall-performance');
    }
}
