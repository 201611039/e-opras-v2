<?php

namespace Database\Seeders;

use Carbon\Carbon;
use App\Models\Year;
use Illuminate\Database\Seeder;

class YearSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Year::firstOrCreate([
            'start' => Carbon::parse('1-07-2021'),
            'end' => Carbon::parse('30-06-2022')
        ]);
    }
}
