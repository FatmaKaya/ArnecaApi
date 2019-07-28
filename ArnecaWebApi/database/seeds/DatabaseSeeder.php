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
        $this->call(
            [
                PlanSeeder::class,
                DaysSeeder::class,
                WeeksSeeder::class,
                MonthsSeeder::class,
                WorkoutPlansSeeder::class,
                NotificationsSeeder::class,
                CoachInfoLigSeeder::class,
                SetsSeeder::class,
                LocationSeeder::class,
                MatchesSeeder::class
            ]
        );
        
        
        
        

    
    }
}
