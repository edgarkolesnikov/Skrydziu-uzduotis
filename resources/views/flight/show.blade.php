@extends('layouts.app')

@section('content')

<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/lightbox2/2.8.2/css/lightbox.min.css">
<div class="container">
<div class="row justify-content-center">
    <div class="col-md-8">
        <div class="card">
            <div class="card-header">Skrydzio informacija</div>
            <div class="card-body">
                
                <div class="row">
                <div class="col">
                <ul>
                    Isvykimo is <b> {{$flight->departureAirport->name}} </b> data ir laikas:
                    <b>{{$flight->departure_at}} </b><h4 id="result"> </h4>
                    Gryzimo is <b> {{$flight->arrivalAirport->name}} </b> data ir laikas:
                    <b>{{$flight->arrival_at}}</b> <h4 id="result2"> </h4>
                    Isvykimo laiko juosta: 

                    <select id="timezone" name="timezone">
                        @foreach($timezones as $timezone)
                        @if($timezone == $flight->timezone)
                            <option value="{{$timezone}}" selected="true">{{$timezone}}</option>
                            @else
                            <option value="{{ $timezone }}">{{ $timezone }} </option>
                            @endif
                        @endforeach
                    </select>  <br>  

                    Gryzimo laiko juosta: 

                    <select id="timezone2" name="timezone2">
                        @foreach($timezones as $timezone)
                        @if($timezone == $flight->timezone)
                            <option value="{{$timezone}}" selected="true">{{$timezone}}</option>
                            @else
                            <option value="{{ $timezone }}">{{ $timezone }} </option>
                            @endif
                        @endforeach
                    </select> 
                    <br>
                    Vietu lektuve: <b> {{$flight->spaces}} </b>
                </ul>
                </div>
            </div>

            <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
            <script>
                jQuery(document).ready(function($){
                    $("#timezone").on('change', function(){
                        var timezone = $("#timezone").val();
                        if(timezone){
                    
                        $.ajax({
                                type: "POST",
                                url: '{{ route('home.calculate') }}',
                                data: {_token: '{{csrf_token()}}', departure_at: "{{ $flight->departure_at }}", current_timezone: "{{ $flight->timezone }}", 'timezone': timezone},
                                success: function(htmlresponse) {
                                $("#result").html(htmlresponse);
                                console.log(htmlresponse);
                            }
                        });
                    }
                            
                    });
                });
            </script>
            <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
            <script>
                jQuery(document).ready(function($){
                    $("#timezone2").on('change', function(){
                        var timezone = $("#timezone").val();
                        if(timezone){
                    
                        $.ajax({
                                type: "POST",
                                url: '{{ route('home.calculate2') }}',
                                data: {_token: '{{csrf_token()}}', arrival_at: "{{ $flight->arrival_at }}", current_timezone: "{{ $flight->timezone }}", 'timezone': timezone},
                                success: function(htmlresponse) {
                                $("#result2").html(htmlresponse);
                                console.log(htmlresponse);
                            }
                        });
                    }
                            
                    });
                });
            </script>
@endsection