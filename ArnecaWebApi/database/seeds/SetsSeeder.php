<?php

use Illuminate\Database\Seeder;
use App\Models\sets;

class SetsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        sets::create([
            'set1'=>"21-25",
            'set2'=>"25-20",
            'set3'=>"21-25",
            'set4'=>"18-25",
        ]);
        sets::create([
            'set1'=>"21-25",
            'set2'=>"25-20",
            'set3'=>"21-25",
            'set4'=>"18-25",
        ]);
        sets::create([
            'set1'=>"21-25",
            'set2'=>"25-20",
            'set3'=>"21-25",
            'set4'=>"18-25",
        ]);
        sets::create([
            'set1'=>"21-25",
            'set2'=>"25-20",
            'set3'=>"21-25",
            'set4'=>"18-25",
        ]);
    }
}
