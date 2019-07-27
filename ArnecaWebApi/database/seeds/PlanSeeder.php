<?php

use Illuminate\Database\Seeder;
use App\Models\plan;

class PlanSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        plan::create([
            'day_id'=>'1',
            'day_month'=>'1 Ocak',
            'hours'=>'11:00 - 13:00',
            'name'=>'Genel Antrema',
            'location'=>'Yer: Ziraat Volley Spor Salonu'
        ]);
        plan::create([
            'day_id'=>'2',
            'day_month'=>'2 Ocak',
            'hours'=>'11:00 - 13:00',
            'name'=>'Genel Antrema',
            'location'=>'Yer: Ziraat Volley Spor Salonu'
        ]);
        plan::create([
            'day_id'=>'3',
            'day_month'=>'3 Ocak',
            'hours'=>'11:00 - 13:00',
            'name'=>'Genel Antrema',
            'location'=>'Yer: Ziraat Volley Spor Salonu'
        ]);
        plan::create([
            'day_id'=>'3',
            'day_month'=>'3 Ocak',
            'hours'=>'15:00 - 17:00',
            'name'=>'Genel Antrema',
            'location'=>'Yer: Ziraat Volley Spor Salonu'
        ]);
       
    }
}
