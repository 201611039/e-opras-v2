<?php

namespace App\Http\Livewire\Form\Submission;

use App\Models\Opras;
use Illuminate\Support\Facades\Gate;
use Livewire\Component;

class Index extends Component
{
    public Opras $opras;

    public function mount()
    {
        if (request()->user()->myOpras()) {
            $this->opras = request()->user()->myOpras();
        } else {
            toastr()->error('Opras form not created yet', 'Not found');
            return redirect()->route('opras.index');
        }
    }

    public function render()
    {
        Gate::authorize('opras-submit');

        return view('livewire.form.submission.index');
    }
}
