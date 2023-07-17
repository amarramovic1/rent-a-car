<?php

namespace App\Http\Controllers;

use App\Models\Car;
use Illuminate\Http\Request;

class VehicleController extends Controller
{
    public function index()
    {
        $cars = Car::all();

        return view('index', compact('cars'));
    }
    public function details($id)
    {
        $car = Car::find($id);

        if (!$car) {
            return redirect()->route('vehicle.index')->with('error', 'Automobil nije pronađen.');
        }
        return view('details', compact('car'));
    }

}
