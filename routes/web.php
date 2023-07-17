<?php

use App\Http\Controllers\CarController;
use App\Http\Controllers\ClientController;
use App\Http\Controllers\ReservationController;
use App\Http\Controllers\SearchController;
use App\Http\Controllers\VehicleController;
use App\Models\Car;
use App\Http\Controllers\AdminController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

//Index routes
Route::get('/index', [VehicleController::class, 'index'])->name('vehicles.index');

//Client routes
Route::get('/clients/index',[ClientController::class,'index'])->name('client.index');
Route::get('/clients/create',[ClientController::class,'create'])->name('client.create');
Route::post('/clients/save',[ClientController::class,'save'])->name('client.save');
Route::get('/clients/{id}/edit',[ClientController::class,'edit'])->name('client.edit');
Route::put('/clients/{id}',[ClientController::class,'update'])->name('client.update');
Route::delete('/clients/{id}',[ClientController::class,'delete'])->name('client.delete');

//Car routes
Route::get('/car/index',[CarController::class,'index'])->name('car.index');
Route::get('/car/create',[CarController::class,'create'])->name('car.create');
Route::post('/car/save',[CarController::class,'save'])->name('car.save');
Route::get('/car/{id}/edit',[CarController::class,'edit'])->name('car.edit');
Route::put('/car/{id}',[CarController::class,'update'])->name('car.update');
Route::delete('/car/{id}',[CarController::class,'delete'])->name('car.delete');

//Search routes
Route::get('/search/index', [SearchController::class, 'index'])->name('search.index');
Route::post('/reserve', [SearchController::class, 'reserve'])->name('search.reserve');

//Vehicles routes
Route::get('/all-vehicles', [SearchController::class, 'all_vehicles'])->name('all-vehicles');
Route::get('/vehicles/{id}', [VehicleController::class, 'details'])->name('vehicles.details');

//Admin routes
Route::get('/admin', [\App\Http\Controllers\AdminController::class, 'index'])->name('admin.index');
Route::post('/admin', [\App\Http\Controllers\AdminController::class, 'login'])->name('admin.login');

//Reservations
Route::get('/reservations/index', [ReservationController::class, 'index'])->name('reservations.index');
Route::get('/reservations/{id}/edit',[ReservationController::class, 'edit'])->name('reservations.edit');
Route::put('/reservations/{id}', [ReservationController::class, 'update'])->name('reservations.update');
Route::delete('/reservations/{id}',[ReservationController::class, 'destroy'])->name('reservations.destroy');
Route::get('/reservations/create/{carId}', [ReservationController::class, 'create'])->name('reservations.create');
Route::post('/reservations/store', [ReservationController::class, 'store'])->name('reservations.store');
Route::get('/reservations/success', [ReservationController::class, 'success'])->name('reservations.success');
