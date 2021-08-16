<?php

namespace App\Http\Livewire\Form\AttributePerformance;

use App\Models\Opras;
use Livewire\Component;
use Illuminate\Support\Facades\Gate;

class Index extends Component
{
    public Opras $opras;

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
        Gate::authorize('attribute-good-performance-view');

        return view('livewire.form.attribute-performance.index');
    }
}
