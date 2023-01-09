<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Flight;

class FlightsSeeder extends Seeder
{
    
    public function run()
    {
        Flight::truncate();

        $data = [
            [
            'departure_at' => ('2023-01-09 14:00'),
            'arrival_at' => ('2023-01-14 17:00'),
            'timezone' => 'Europe/Vilnius',
            'arrival_airport_id' => rand(1, 599),
            'departure_airport_id' => rand(1,599),
            'spaces' => rand(120, 260)
            ],
            [
            'departure_at' => ('2023-01-09 14:00'),
            'arrival_at' => ('2023-01-14 17:00'),
            'timezone' => 'Europe/Vilnius',
            'arrival_airport_id' => rand(1, 599),
            'departure_airport_id' => rand(600, 1500),
            'spaces' => rand(120, 260)
            ],
            [
            'departure_at' => ('2023-01-09 14:00'),
            'arrival_at' => ('2023-01-14 17:00'),
            'timezone' => 'Europe/Vilnius',
            'arrival_airport_id' => rand(1, 599),
            'departure_airport_id' => rand(1,599),
            'spaces' => rand(120, 260)
            ]];
            foreach($data as $singleFlight){
        Flight::create($singleFlight);
            }
    }

}