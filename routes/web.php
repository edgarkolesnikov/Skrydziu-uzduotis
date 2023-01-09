<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\CsvController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::post('/calculate', [App\Http\Controllers\HomeController::class, 'calculate'])->name('home.calculate');
Route::post('/calculate2', [App\Http\Controllers\HomeController::class, 'calculate2'])->name('home.calculate2');

Auth::routes();

Route::get('/flight/list', [App\Http\Controllers\FlightController::class, 'index'])->name('flight.list');
Route::post('/flight', [App\Http\Controllers\FlightController::class, 'store'])->name('flight.store');
Route::get('/flight/edit/{id}', [App\Http\Controllers\FlightController::class, 'edit'])->name('flight.edit');
Route::post('/flight/update/{id}', [App\Http\Controllers\FlightController::class, 'update'])->name('flight.update');
Route::get('/flight/delete/{id}', [App\Http\Controllers\FlightController::class, 'destroy'])->name('flight.delete');
Route::get('/flight/create', [App\Http\Controllers\FlightController::class, 'create'])->name('flight.create');
Route::get('/flight/show/{id}', [App\Http\Controllers\FlightController::class, 'show'])->name('flight.show');
Auth::routes();