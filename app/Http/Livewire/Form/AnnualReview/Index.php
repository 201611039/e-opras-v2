<?php

namespace App\Http\Livewire\Form\AnnualReview;

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
        Gate::authorize('annual-review-view');

        return view('livewire.form.annual-review.index');
    }
}
