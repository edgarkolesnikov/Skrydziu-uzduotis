@extends('layouts.app')

@section('content')
@if (\Session::has('success'))
    <div class="alert alert-success">
        <ul>
            <li>{!! \Session::get('success') !!}</li>
        </ul>
    </div>
@endif
<div class="container-fluid">
    <table class="table">
        <thead>
        <tr>
            <th scope="col">#</th>
            <th scope="col">Departure from</th>
            <th scope="col">Departure time</th>
            <th scope="col">Departure from</th>
            <th scope="col">Departure time</th>
            <th scope="col">Timezone</th>
            <th scope="col">Spaces in aircraft</th>
            <th scope="col">Edit</th>
            <th scope="col">Delete</th>

        </tr>
        </thead>

        <tbody> 
            @foreach($flights as $flight)
                <tr>
                    <th scope="row">{{$loop->iteration}}</th>
                    <th>{{ $flight->departureAirport->name }} </th>
                    <th>
                        <a href="{{ route('flight.show', $flight->id) }}"> 
                        {{$flight->departure_at}}
                        </a>
                        <br>
                        <h4 id="result"> </h4>
                    </th>
                    <th>{{ $flight->arrivalAirport->name }} </th>
                    <th>
                        <a href="{{ route('flight.show', $flight->id) }}"> 
                        {{$flight->arrival_at}}
                        </a>
                    </th>
                    <th> {{ $flight->timezone }}</th>
                    <th>{{ $flight->spaces }}</th>
                    <th><a href="{{ route('flight.edit', $flight->id) }}"> Edit </th>
                    <th><a href="{{ route('flight.delete', $flight->id) }}"> Delete </th>
                </tr>   
            </a>   
             @endforeach            
            </tbody> 

@endsection