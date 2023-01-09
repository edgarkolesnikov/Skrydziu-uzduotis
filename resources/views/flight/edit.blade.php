@extends('layouts.app')

@section('content')


<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Skrydzio Registravimas') }}</div>
                @if (\Session::has('success'))
                        <div class="alert alert-success">
                            <ul>
                                <li>{!! \Session::get('success') !!}</li>
                            </ul>
                        </div>
                    @endif
                <div class="card-body">
                    <form method="POST" action="{{ route('flight.update', $flight->id) }}">
                        @csrf

                        <div class="row mb-3">
                            <label for="Laiko juosta"
                                   class="col-md-4 col-form-label text-md-end">{{ __('Laiko juosta') }}</label>
                            <div class="col-md-6">
                        <select name="timezone" class="form-control">
                            @foreach($timezones as $timezone)
                            @if($timezone == $flight->timezone)
                                <option value="{{$timezone}}" selected="true">{{$timezone}}</option>
                                @else
                                <option value="{{ $timezone }}">{{ $timezone }} </option>
                                @endif
                            @endforeach
                        </select>
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="Isvykimo data ir laikas"
                                   class="col-md-4 col-form-label text-md-end">{{ __('Isvykimo data ir laikas') }}</label>
                            <div class="col-md-6">
                                <input type="datetime-local" name="departure_at" value="{{ $flight->departure_at }}">
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="Gryzimo data ir laikas"
                                   class="col-md-4 col-form-label text-md-end">{{ __('Gryzimo data ir laikas') }}</label>
                            <div class="col-md-6">
                                <input type="datetime-local" name="arrival_at" value="{{ $flight->arrival_at }}">
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="Isvykimas is"
                                   class="col-md-4 col-form-label text-md-end">{{ __('Isvykimas is') }}</label>
                            <div class="col-md-6">

                                <select name="departure_airport" class="form-control">
                                    @foreach($airports as $airport)
                                    @if($airport->id == $flight->departure_airport_id)
                                        <option value="{{$airport->id}}" selected="true">{{$airport->name}}</option>
                                        @else
                                        <option value="{{ $airport->id }}">{{ $airport->name }} </option>
                                        @endif
                                    @endforeach
                                </select>

                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="Atvykimas i"
                                   class="col-md-4 col-form-label text-md-end">{{ __('Atvykimas i') }}</label>
                            <div class="col-md-6">
                                <select name="arrival_airport" class="form-control">
                                    @foreach($airports as $airport)
                                    @if($airport->id == $flight->arrival_airport_id)
                                        <option value="{{$airport->id}}" selected="true">{{$airport->name}}</option>
                                        @else
                                        <option value="{{ $airport->id }}">{{ $airport->name }} </option>
                                        @endif
                                    @endforeach
                                </select>
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="Vietu lektuve"
                                   class="col-md-4 col-form-label text-md-end">{{ __('Vietu lektuve') }}</label>
                            <div class="col-md-6">
                                <input type="number" name="quantity" value="{{ $flight->spaces }}"><br>
                            </div>
                        </div>
                        

                        <div class="row mb-6">
                            <div class="col-md-6 offset-md-4 text-md-end">
                                <button type="submit" class="btn btn-primary">
                                    {{ __('Issaugoti') }}
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection