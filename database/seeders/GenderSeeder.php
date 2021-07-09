<?php

namespace Database\Seeders;

use App\Models\Gender;
use Illuminate\Database\Seeder;

class GenderSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $gender = [['short_name' => 'F', 'name' => 'Female'], ['short_name' => 'M', 'name' => 'Male']];

        foreach ($gender as $g) {
        	Gender::updateOrCreate([
        		'short_name' => $g['short_name'],
        		'name' => $g['name']
        	]);
        }
    }
}
