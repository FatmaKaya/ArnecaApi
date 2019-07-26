<?php

use Illuminate\Database\Seeder;
use App\Models\location;

class LocationSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        location::create([
            'lat'=>39.9361571,
            'lon'=>32.8171598
        ]);
        location::create([
            'lat'=>40.9361571,
            'lon'=>33.8171598
        ]);
    }
}
