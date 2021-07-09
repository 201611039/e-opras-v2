<?php

namespace App\Http\Livewire\Review;

use Livewire\Component;

class Table extends Component
{
    public $rows;

    public function render()
    {
        return view('livewire.review.table');
    }
}
