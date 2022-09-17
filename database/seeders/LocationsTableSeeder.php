<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Location;

class LocationsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        Location::create([
            'user_id' => 4,
            'lat' => '-6.970805123009773',
            'long' => '107.65471218960744'
        ]);
        Location::create([
            'user_id' => 5,
            'lat' => '-6.970395086223803',
            'long' => '107.65485264717364'
        ]);
        Location::create([
            'user_id' => 7,
            'lat' => '-6.971234944374602',
            'long' => '107.65463898239267'
        ]);
        Location::create([
            'user_id' => 9,
            'lat' => '-6.9706784324757525',
            'long' => '107.65601327425293'
        ]);
    }
}
