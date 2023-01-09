<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Flight;
use App\Models\Airport;

class FlightController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data['flights'] = Flight::all();
        return view('flight.list', $data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $data['airports'] = Airport::all();
        $data['timezones'] = timezone_identifiers_list();
        return view('flight.create', $data);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $flight =  new Flight();

        $flight->departure_at = str_replace('T', ' ', $request->post('departure_at'));
        $flight->arrival_at = str_replace('T', ' ' , $request->post('arrival_at'));
        $flight->timezone = $request->post('timezone');
        $flight->arrival_airport_id = $request->post('arrival_airport');
        $flight->departure_airport_id = $request->post('departure_airport');
        $flight->spaces = $request->post('quantity');
        $flight->save();

        return back()->with('success', 'Skrydis uzregistruotas sekmingai');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $data['flight'] = Flight::find($id);
        $data['timezones'] = timezone_identifiers_list();
        return view('flight.show', $data);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $data['flight'] = Flight::find($id);
        $data['airports'] = Airport::all();
        $data['timezones'] = timezone_identifiers_list();
        return view('flight.edit', $data);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $flight = Flight::find($id);
        $flight->departure_at = str_replace('T', ' ', $request->post('departure_at'));
        $flight->arrival_at = str_replace('T', ' ', $request->post('arrival_at'));
        $flight->timezone = $request->post('timezone');
        $flight->arrival_airport_id = $request->post('arrival_airport');
        $flight->departure_airport_id = $request->post('departure_airport');
        $flight->spaces = $request->post('quantity');
        $flight->update();
        return back()->with('success', 'Informacija atnaujinta');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $flight = Flight::find($id);
        $flight->delete();
        return back()->with('success', 'Skrydis istrintas');
    }
}
