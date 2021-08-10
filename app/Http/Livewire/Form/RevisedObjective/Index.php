<?php

namespace App\Http\Livewire\Form\RevisedObjective;

use Livewire\Component;
use Illuminate\Support\Facades\Gate;

class Index extends Component
{
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
    }

    public function updateOpras()
    {
        $this->opras->refresh();
    }

    public function render()
    {
        Gate::authorize('revised-objectives-view');

        return view('livewire.form.revised-objective.index');
    }
}
