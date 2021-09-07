<?php

namespace App\Http\Livewire\Form\OverallPerformance;

use App\Models\Opras;
use Illuminate\Support\Facades\Gate;
use Livewire\Component;

class Index extends Component
{
    public Opras $opras;
    public $overallPerformance;
    public $checkInput = false;

    protected $fields = [
        'team_work', 'interaction', 'respect', 'writting', 'speak', 'listen', 'train', 'plan_organize', 'lead', 'innitiate_innovate', 'output', 'persistence', 'demand', 'extra_work', 'responsibility', 'decisions', 'customer', 'followership', 'support', 'instructions', 'working', 'services', 'government'
    ];


    public function getListeners()
    {
        return [
            "echo-private:opras-reviwed.{$this->opras->id},OprasReviewed" => 'updateOpras',
        ];
    }

    public function mount()
    {
        $this->opras = request()->user()->myOpras();

        // create new instance of overll performance
        if(!isset($this->opras->overallPerformance)) {
            $this->overallPerformance =  $this->opras->overallPerformance()->create([
                'overall_marks' =>$this->getOverallPerformance($this->opras),
            ]);
        }
        else {
            $this->overallPerformance = $this->opras->overallPerformance;
        }

        // check editor input
        if ($this->opras->reviewSectionSeven()) {
            $this->checkInput = true;
        }
    }

    public function updateOpras()
    {
        $this->opras->refresh();
    }


    public function render()
    {
        Gate::authorize('overall-perfomance-view');

        return view('livewire.form.overall-performance.index');
    }

    public function getOverallPerformance($opras)
    {
        $totalAnnual = 0;
        $totalAttribute = 0;

        // get total anuall rated marks
        foreach ($opras->annualReviews as $key => $annualReview) {
            $totalAnnual = $annualReview->ratedMark->agreed + $totalAnnual;
        }
        // calculate average
        $annualAverage = $totalAnnual/($key+1);

        // get total attribute performance marks
        foreach ($this->fields as $index => $value) {
            $relation = camel_case($value.'_mark');
            $totalAttribute = $opras->attributePerformance->$relation->agreed + $totalAttribute;
        }

        // calculate average
        $attributeAverage = $totalAttribute/($index+1);

        // return average of both section 5 and 6
        return substr((($attributeAverage + $annualAverage)/2), 0, 4);
    }
}
