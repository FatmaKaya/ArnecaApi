<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // $this->call(UsersTableSeeder::class);
        Eloquent::unguard();
        $this->call(PlanSeeder::class);
        $this->call(DaysSeeder::class);
        $this->call(WeeksSeeder::class);
        $this->call(MonthsSeeder::class);
        $this->call(WorkoutPlansSeeder::class);

        $this->call(LocationSeeder::class);
        $this->call(MatchesSeeder::class);
        
        $this->call(CoachInfoLigSeeder::class);
        

    
    }
}
