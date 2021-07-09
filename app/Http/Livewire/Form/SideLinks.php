<?php

namespace App\Http\Livewire\Form;

use App\Models\Opras;
use Livewire\Component;

class SideLinks extends Component
{
    public Opras $opras;
    public $segment;

    public function getListeners()
    {
        return [
            "echo-private:opras-reviwed.{$this->opras->id},OprasReviewed" => 'updateOpras',
        ];
    }

    public function updateOpras()
    {
        $this->opras->refresh();
    }

    public function mount()
    {
        $this->segment = request()->segment(2);
    }

    public function render()
    {
        return view('livewire.form.side-links');
    }
}
