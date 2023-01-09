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
                    <form method="POST" action="{{ route('flight.store') }}">
                        @csrf

                        <div class="row mb-3">
                            <label for="Laiko juosta"
                                   class="col-md-4 col-form-label text-md-end">{{ __('Laiko juosta') }}</label>
                            <div class="col-md-6">
                                <select name="timezone" class="form-control">
                                    <option value="0" disabled="true" selected="true">Pasirinkti laiko juosta</option>
                                    @foreach($timezones as $timezone)
                                        <option value="{{$timezone}}">{{$timezone}}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>


                        <div class="row mb-3">
                            <label for="Isvykimo data ir laikas"
                                   class="col-md-4 col-form-label text-md-end">{{ __('Isvykimo data ir laikas') }}</label>
                            <div class="col-md-6">
                                <input type="datetime-local" name="departure_at">
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="Gryzimo data ir laikas"
                                   class="col-md-4 col-form-label text-md-end">{{ __('Gryzimo data ir laikas') }}</label>
                            <div class="col-md-6">
                                <input type="datetime-local" name="arrival_at">
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="Isvykimas is"
                                   class="col-md-4 col-form-label text-md-end">{{ __('Isvykimas is') }}</label>
                            <div class="col-md-6">
                                <select name="departure_airport" class="form-control">
                                    <option value="0" disabled="true" selected="true">Isvykimo oro uostas</option>
                                    @foreach($airports as $airport)
                                        <option value="{{$airport->id}}">{{$airport->name}}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="Atvykimas i"
                                   class="col-md-4 col-form-label text-md-end">{{ __('Atvykimas i') }}</label>
                            <div class="col-md-6">
                                <select name="arrival_airport" class="form-control">
                                    <option value="0" disabled="true" selected="true">Atvykimo oro uostas</option>
                                    @foreach($airports as $airport)
                                        <option value="{{$airport->id}}">{{$airport->name}}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="Vietu lektuve"
                                   class="col-md-4 col-form-label text-md-end">{{ __('Vietu lektuve') }}</label>
                            <div class="col-md-6">
                                <input type="number" name="quantity" placeholder="155"><br>
                            </div>
                        </div>
                        

                        <div class="row mb-6">
                            <div class="col-md-6 offset-md-4 text-md-end">
                                <button type="submit" class="btn btn-primary">
                                    {{ __('Sukurti') }}
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