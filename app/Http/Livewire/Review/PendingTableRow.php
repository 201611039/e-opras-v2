<?php

namespace App\Http\Livewire\Review;

use Livewire\Component;

class PendingTableRow extends Component
{
    public $row;
    public $route;
    public $key;

    public function mount()
    {
        $this->route = str_slug($this->row->opras->reviews()->first()->section);
    }

    public function render()
    {
        return view('livewire.review.pending-table-row');
    }
}
