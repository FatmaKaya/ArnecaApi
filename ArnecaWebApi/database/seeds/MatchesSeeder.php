<?php

use Illuminate\Database\Seeder;
use App\Models\matches;

class MatchesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        matches::create([
            'coach_info_ligs_id'=>1,
            'title'=>'Cumartesi, 20 Nisan, 2019 - 14:00',
            'lig'=>'Playoff',
            'date'=>'21 Nisan Cumartesi',
            'time'=>'14:00',
            'dateRaw'=>'Cumartesi, 20 Nisan, 2019 - 14:00',
            'order'=>1555768800000,
            'yer'=>'Ankara(Başkent)',
            'location_id'=>1,
            'takimA'=>'Ziraat Bankası',
            'takimB'=>'İstanbul BBSK',
            'imgA'=>'/images/ziraat-bankasi.png',
            'imgB'=>'/images/istanbul-bbsk.png',
            'skor'=>'1-3',
            'sets_id'=>1,

        ]);
        matches::create([
            'coach_info_ligs_id'=>1,
            'title'=>'Cumartesi, 20 Nisan, 2019 - 14:00',
            'lig'=>'Playoff',
            'date'=>'21 Nisan Cumartesi',
            'time'=>'14:00',
            'dateRaw'=>'Cumartesi, 20 Nisan, 2019 - 14:00',
            'order'=>1555768800000,
            'yer'=>'Ankara(Başkent)',
            'location_id'=>2,
            'takimA'=>'Ziraat Bankası',
            'takimB'=>'İstanbul BBSK',
            'imgA'=>'/images/ziraat-bankasi.png',
            'imgB'=>'/images/istanbul-bbsk.png',
            'skor'=>'1-3',
            'sets_id'=>2,
        ]);
    }
}
