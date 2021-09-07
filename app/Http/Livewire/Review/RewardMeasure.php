<?php

namespace App\Http\Livewire\Review;

use App\Models\Opras;
use Livewire\Component;
use App\Events\OprasReviewed;
use Illuminate\Support\Facades\Gate;
use Illuminate\Support\Facades\Route;

class RewardMeasure extends Component
{
    public Opras $opras;
    public $rewardMeasure;
    public $currentRouteName;

    protected $listeners = ['complete'];

    public function mount()
    {
        $this->checkSection();

        $this->currentRouteName = Route::currentRouteName();

        $this->rewardMeasure = $this->opras->rewardMeasure;
    }

    public function checkSection()
    {
        if($this->opras->sectionEight()->status) {
            toastr('Reward or measure or sanction section is already completed', 'error', 'You are not allowed');
            return redirect()->route('review.index');
        } elseif (!$this->opras->reviewSectionEight()) {
            toastr('Reward or measure or sanction section is not under review', 'error', 'You are not allowed');
            return redirect()->route('review.index');
        }
    }

    public function complete()
    {
        if ($this->rewardMeasure) {
            $this->opras->reviewSectionEight()->delete(); // delete reviewing session

            $this->opras->sectionEight()->update([ // mark section six as complete
                'status' => 1
            ]);

            broadcast(new OprasReviewed($this->opras))->toOthers();

            toastr('Completed successfully');
            return redirect()->route('review.index');
        } else {
            toastr()->error('Reward or mesure or saction is required');
            return redirect()->route($this->currentRouteName, $this->opras->slug);
        }
    }

    public function render()
    {
        Gate::authorize('sanction-reward-review');

        return view('livewire.review.reward-measure');
    }

}
