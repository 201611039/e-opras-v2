<?php

namespace App\Http\Livewire\Form\RewardMeasure;

use App\Models\Opras;
use Livewire\Component;
use Illuminate\Support\Facades\Gate;
// use App\Models\RewardMeasureSanction;

class Index extends Component
{
    public Opras $opras;
    public $rewardMeasure;

    public function mount()
    {
        $this->opras = request()->user()->myOpras();

        $this->rewardMeasure = $this->opras->rewardMeasure;
    }

    public function getListeners()
    {
        return [
            "echo-private:opras-reviwed.{$this->opras->id},OprasReviewed" => 'updateOpras',
        ];
    }

    public function updateOpras()
    {
        $this->opras->refresh();
        $this->rewardMeasure = $this->opras->rewardMeasure;

    }

    public function render()
    {
        Gate::authorize('sanction-reward-view');

        return view('livewire.form.reward-measure.index');
    }
}
