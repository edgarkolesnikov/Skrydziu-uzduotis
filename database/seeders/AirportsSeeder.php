<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Http\Controllers\CsvController;
use App\Models\Airport;

class AirportsSeeder extends Seeder
{
    public function run()
    {

      Airport::truncate();
        $file = storage_path()."/airport-codes_csv.csv";
        $records = CsvController::import_CSV($file);
      
        // add each record to the posts table in DB       
        foreach ($records as $key => $record) {
          if(!empty($record['iata_code'])){
          Airport::create([
            'name' => $record['name'],
            'code' => $record['iata_code']
          ]);
        }
      }
    }

    
     
}
