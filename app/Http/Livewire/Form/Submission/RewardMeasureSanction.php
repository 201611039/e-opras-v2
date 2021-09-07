<?php

namespace App\Http\Livewire\Form\Submission;

use App\Models\Opras;
use App\Models\RewardMeasureSanction as ModelsRewardMeasureSanction;
use Livewire\Component;

class RewardMeasureSanction extends Component
{
    public Opras $opras;
    public ModelsRewardMeasureSanction $rewardMeasure;

    public function mount()
    {
        $this->opras = request()->user()->myOpras();
        $this->rewardMeasure = $this->opras->rewardMeasure;
    }

    public function render()
    {
        return view('livewire.form.submission.reward-measure-sanction');
    }
}
