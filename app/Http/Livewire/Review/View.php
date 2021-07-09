<?php

namespace App\Http\Livewire\Review;

use App\Models\Review;
use Livewire\Component;
use Illuminate\Support\Facades\Gate;

class View extends Component
{
    public $pendingForms;
    public $user_id;

    public function getListeners()
    {
        return [
            "echo-private:review-opras.{$this->user_id},ReviewOpras" => 'updateOpras',
        ];
    }

    public function mount()
    {
        $this->pendingForms = Review::myReviews()->get();
        $this->user_id = auth()->id();
    }

    public function updateOpras()
    {
        $this->pendingForms = Review::myReviews()->get();

    }

    public function render()
    {
        Gate::authorize('opras-review');

        return view('livewire.review.view');
    }
}
