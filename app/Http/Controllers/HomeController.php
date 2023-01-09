<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Airport;
use App\Models\Flight;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $data['flights'] = Flight::all();
        return view('home', $data);
    }

    public function calculate()
    {
        if(isset($_POST['timezone'])){
            $currentTimezone = $_POST['current_timezone'];
            $timezone = $_POST['timezone'];
            $dateString = "";
            $dateString .= $_POST['departure_at']. ':00';
            $date = date_create($dateString, timezone_open($currentTimezone));
            date_timezone_set($date, timezone_open($timezone));
            return 'Laikas pasirinkta laiko juosta: '.$date->format('Y-m-d H:i');
          
        }
    }

    public function calculate2()
    {
        if(isset($_POST['timezone'])){
            $currentTimezone = $_POST['current_timezone'];
            $timezone = $_POST['timezone'];
            $dateString = "";
            $dateString .= str_replace('T', ' ', $_POST['arrival_at']);
            $dateString .= ':00';
            $date = date_create($dateString, timezone_open($currentTimezone));
            date_timezone_set($date, timezone_open($timezone));
            return 'Laikas pasirinkta laiko juosta: '.$date->format('Y-m-d H:i');
          
        }
    }
    
    public function log()
    {
        return true;
    }

}
