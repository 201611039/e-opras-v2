<?php

namespace App\Http\Livewire\Form\PersonalInformation;

use Illuminate\Support\Facades\Gate;
use Livewire\Component;

class Index extends Component
{
    public $personalInformation;
    public $opras;

    public function mount()
    {
        $this->opras = request()->user()->myOpras();
        $this->personalInformation = $this->opras->personalInformation;

        if(!$this->personalInformation) {
            Gate::authorize('personal-information-create');
            $this->personalInformation = $this->opras->personalInformation()->firstOrCreate([]);
            $this->opras->sections()->firstOrCreate([
                'section' => 'personal_information'
            ]);
        }
    }
    public function render()
    {
        Gate::authorize('personal-information-view');

        return view('livewire.form.personal-information.index');
    }
}
