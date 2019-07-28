<?php

use Illuminate\Database\Seeder;
use App\Models\weeks;

class WeeksSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        weeks::create([
            'month_id'=>'1',
            'name'=>'1.hafta'
        ]);
        weeks::create([
            'month_id'=>'1',
            'name'=>'2.hafta'
        ]);
        weeks::create([
            'month_id'=>'2',
            'name'=>'1.hafta'
        ]);
    }
}
