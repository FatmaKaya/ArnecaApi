<?php

use Illuminate\Database\Seeder;
use App\Models\workout_plan;

class WorkoutPlansSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        workout_plan::create([
            'name'=>'plan 1'
        ]);
    }
}
