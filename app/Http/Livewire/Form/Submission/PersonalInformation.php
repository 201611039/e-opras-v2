<?php

namespace App\Http\Livewire\Form\Submission;

use App\Models\Opras;
use App\Models\PersonalInformation as ModelsPersonalInformation;
use Livewire\Component;

class PersonalInformation extends Component
{
    public Opras $opras;
    public ModelsPersonalInformation $personalInformation;

    public function mount()
    {
        $this->opras = request()->user()->myOpras();
        $this->personalInformation = $this->opras->personalInformation;
    }

    public function render()
    {
        return view('livewire.form.submission.personal-information');
    }
}
