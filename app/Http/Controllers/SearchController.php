<?php
namespace App\Http\Controllers;

use App\Models\Reservation;
use App\Models\Car;
use Illuminate\Http\Request;


class SearchController extends Controller
{
    public function index(Request $request)
    {
        $class = $request->input('class');
        $transmission = $request->input('transmission');
        $yearFrom = $request->input('year_from');
        $yearTo = $request->input('year_to');
        $fuel = $request->input('fuel');
        $dateFrom = $request->input('date_from');
        $dateTo = $request->input('date_to');

        $cars = Car::query();

        if ($class) {
            $cars->where('vehicle_class', $class);
        }

        if ($transmission) {
            $cars->where('type_of_exchanger', $transmission);
        }

        if ($yearFrom && $yearTo) {
            $cars->whereBetween('year_of_production', [$yearFrom, $yearTo]);
        }

        if ($fuel) {
            $cars->where('type_of_fuel', $fuel);
        }

        $availableCars = collect();

        if ($class && $transmission && $yearFrom && $yearTo && $fuel && $dateFrom && $dateTo) {
            $cars->whereDoesntHave('reservations', function ($query) use ($dateFrom, $dateTo) {
                $query->where(function ($subQuery) use ($dateFrom, $dateTo) {
                    $subQuery->where('date_from', '<=', $dateTo)
                        ->where('date_to', '>=', $dateFrom);
                });
            });

            $availableCars = $cars->with(['manufacturer', 'carModel'])->get();
        }

        $filteredCars = $cars->with(['manufacturer', 'carModel'])->get();

        return view('search.index', compact('filteredCars', 'class', 'transmission', 'yearFrom', 'yearTo', 'fuel', 'dateFrom', 'dateTo'));
    }



    public function all_vehicles(){
        $cars = Car::query();
        $filteredCars = $cars->with(['manufacturer', 'carModel'])->get();
        return view('all-vehicles', compact('filteredCars'));
    }
    public function reserve(Request $request)
    {
        $carId = $request->input('car_id');
        $dateFrom = $request->input('date_from');
        $dateTo = $request->input('date_to');

        $car = Car::findOrFail($carId);

        return view('reservations.create', compact('car', 'dateFrom', 'dateTo'));
    }


}



