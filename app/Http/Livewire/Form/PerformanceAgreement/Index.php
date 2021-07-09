<?php

namespace App\Http\Livewire\Form\PerformanceAgreement;

use Livewire\Component;
use Illuminate\Support\Facades\Gate;

class Index extends Component
{
    public $personalInformation;
    public $opras;

    public function getListeners()
    {
        return [
            "echo-private:opras-reviwed.{$this->opras->id},OprasReviewed" => 'updateOpras',
        ];
    }

    public function mount()
    {
        $this->opras = request()->user()->myOpras();
        $this->personalInformation = $this->opras->personalInformation;
    }

    public function updateOpras()
    {
        $this->opras->refresh();
    }

    public function render()
    {
        Gate::authorize('performance-agreement-view');

        return view('livewire.form.performance-agreement.index');
    }
}
