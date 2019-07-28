<?php

use Illuminate\Database\Seeder;
use App\Models\days;

class DaysSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        days::create([
            'week_id'=>'1',
            'day_month'=>'1 Ocak'
        ]);
        days::create([
            'week_id'=>'1',
            'day_month'=>'2 Ocak'
        ]);
        days::create([
            'week_id'=>'1',
            'day_month'=>'3 Ocak'
        ]);
        
    }
}
