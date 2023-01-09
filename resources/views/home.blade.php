@extends('layouts.app')

@section('content')
@foreach($flights as $flight)


  
  <div class="row row-cols-1 row-cols-md-2 g-4">
    <div class="col">
      <div class="card">
        <a href="{{ route('flight.show', $flight->id) }}" class="btn btn-primary">
        <div class="card-body">
          <h5 class="card-title">{{ $flight->departureAirport->name }} -> {{ $flight->arrivalAirport->name }}</h5>
          <p class="card-text">{{ $flight->departure_at }} - {{ $flight->arrival_at }}</p>
        </div>
    </a>
      </div>
    </div>
  </div>


  @endforeach


@endsection