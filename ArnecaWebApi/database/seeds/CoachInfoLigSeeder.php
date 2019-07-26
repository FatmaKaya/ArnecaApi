<?php

use Illuminate\Database\Seeder;
use App\Models\coach_info_ligs;

class CoachInfoLigSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        coach_info_ligs::create([
           
            'lastMatch'=>'Ziraat Bankası- Fenerbahçe(21.05.2019)',
            'workout_plan_id'=>1
        ]);
    }
}
