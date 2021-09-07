<?php

namespace App\Http\Livewire\Form\Submission;

use App\Models\Opras;
use Livewire\Component;

class RevisedObjective extends Component
{
    public Opras $opras;

    public function mount()
    {
        $this->opras = request()->user()->myOpras();
    }

    public function render()
    {
        return view('livewire.form.submission.revised-objective');
    }
}
