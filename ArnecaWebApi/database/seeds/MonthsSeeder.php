<?php

use Illuminate\Database\Seeder;
use App\Models\month;

class MonthsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        month::create([
           
            'name'=>'Ocak',
            'workout_plan_id'=>1
        ]);
        month::create([
            'name'=>'Şubat',
            'workout_plan_id'=>1
        ]);
    }
}
