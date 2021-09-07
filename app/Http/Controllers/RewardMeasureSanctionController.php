<?php

namespace App\Http\Controllers;

use App\Models\Opras;
use App\Models\RewardMeasureSanction;
use Illuminate\Http\Request;


class RewardMeasureSanctionController extends Controller
{
    public function store(Request $request, Opras $opras)
    {
        $this->authorize('sanction-reward-review');


        $request->validate([
            "category" => ['required', 'string'],
            "description" => ['required', 'string', 'max:3000']
        ]);

        if ($opras->rewardMeasure) {
            $rewardMeasure = $opras->rewardMeasure;
        } else {
            $rewardMeasure = new RewardMeasureSanction();
        }

        $rewardMeasure->category = $request->category;
        $rewardMeasure->opras_id = $opras->id;
        $rewardMeasure->description = $request->description;
        $rewardMeasure->save();

        toastr('Saved successfully');
        return back();

    }
}
