<?php

declare(strict_types = 1);

namespace App\Charts;

use App\Models\Opras;
use Carbon\Carbon;
use Chartisan\PHP\Chartisan;
use Illuminate\Http\Request;
use ConsoleTVs\Charts\BaseChart;

class OverallPerformance extends BaseChart
{
    /**
     * Handles the HTTP request for the given chart.
     * It must always return an instance of Chartisan
     * and never a string or an array.
     */
    public function handler(Request $request): Chartisan
    {
        $oprases = Opras::where([['user_id', auth()->id()], ['status', 1]])->orderBy('id', 'desc')->take(5)->get();
        $oprases = $oprases->sortBy('id');

        $labels = $oprases->map(function ($value, $key) {
            return Carbon::parse($value->year->start)->year.'/'.Carbon::parse($value->year->end)->year;
        });

        $labels->prepend('Min');
        $labels->push('Max');

        $dataset = $oprases->map(function ($value, $key) {
            return $value->overallPerformance->overall_marks;
        });

        $dataset->prepend(1);
        $dataset->push(5);


        return Chartisan::build()
            ->labels($labels->toArray())
            ->dataset('Overall', $dataset->toArray());
    }
}
