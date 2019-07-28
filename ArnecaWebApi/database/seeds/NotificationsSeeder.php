<?php

use Illuminate\Database\Seeder;
use App\Models\notifications;


class NotificationsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        notifications::create([
            'coache_info_ligs_id'=>1,
            'bildirim1'=>"Enes Atlı - 25 Mayıs’a kadar sakatlığı bulunmaktadır.",
            'bildirim2'=>"Ahmet Giray B’nin - Vücut ağırlığı, boyuna göre fazladır.",
            'bildirim3'=>"Oğuzhan Doğruluk - Kilosu, olması gereken kilonun 5kg altındadır.",
            'bildirim4'=>"bildirim 4",
            'bildirim5'=>"bildirim 5",
            'bildirim6'=>"bildirim 6",
            'bildirim7'=>"bildirim 7",
            'bildirim8'=>"bildirim 8",
        ]);
    }
}
