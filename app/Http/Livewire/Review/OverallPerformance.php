<?php

namespace App\Http\Livewire\Review;

use App\Models\Opras;
use Livewire\Component;
use App\Events\OprasReviewed;
use Illuminate\Support\Facades\Gate;
use App\Models\OverallPerformance as ModelsOverallPerformance;

class OverallPerformance extends Component
{
    public Opras $opras;
    public ModelsOverallPerformance $overallPerformance;

    public function mount()
    {
        $this->checkSection();

        $this->overallPerformance = $this->opras->overallPerformance;
    }

    public function complete()
    {
        $this->opras->reviewSectionSeven()->delete(); // delete reviewing session

        $this->opras->sectionSeven()->update([ // mark section seven as complete
            'status' => 1
        ]);

        $this->opras->sections()->firstOrCreate([ // create new section which is reward_measure_sanction
            'section' => 'reward_measure_sanction'
        ]);

        $this->opras->reviews()->firstOrCreate([ // mark reward_measure_sanction section for review
            'section' => 'reward_measure_sanction'
        ]);

        broadcast(new OprasReviewed($this->opras))->toOthers();

        toastr('Completed successfully');
        return redirect()->route('review.reward-measure-sanction', $this->opras->id);
    }

    public function checkSection()
    {
        if($this->opras->sectionSeven()->status) {
            toastr('Overall performance section is already completed', 'error', 'You are not allowed');
            return redirect()->route('review.index');
        } elseif (!$this->opras->reviewSectionSeven()) {
            toastr('Overall performance section is not under review', 'error', 'You are not allowed');
            return redirect()->route('review.index');
        }
    }

    public function render()
    {
        Gate::authorize('overall-perfomance-review');

        return view('livewire.review.overall-performance');
    }
}
