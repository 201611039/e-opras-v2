<?php

namespace App\Http\Livewire\Form\MidYearReview;

use App\Models\Opras;
use Illuminate\Support\Facades\Gate;
use Livewire\Component;

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
        Gate::authorize('mid-year-review-view');

        return view('livewire.form.mid-year-review.index');
    }
}
