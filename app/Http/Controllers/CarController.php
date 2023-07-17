<?php

namespace App\Http\Controllers;

use App\Models\Car;
use App\Http\Requests\StoreCarRequest;
use App\Http\Requests\UpdateCarRequest;
use App\Models\CarModel;
use App\Models\Client;
use App\Models\Manufacturer;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Storage;


class CarController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $manufacturers = Manufacturer::all();
        $cars = Car::query();

        if ($request->has('searchTerm')) {
            $term = $request->get('searchTerm');
            $cars->where(function ($query) use ($term) {
                $query->whereHas('manufacturer', function ($subquery) use ($term) {
                    $subquery->where('name', 'like', "%{$term}%");
                })->orWhereHas('carModel', function ($subquery) use ($term) {
                    $subquery->where('name', 'like', "%{$term}%");
                })->orWhere('registration_marks', 'like', "%{$term}%");
            });
        }

        $cars = $cars->get();

        return view('car.index', compact('cars', 'manufacturers'));
    }


    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $manufacturers = Manufacturer::all();
        $carModels = CarModel::all();

        return view('car.create', compact('manufacturers', 'carModels'));
    }



    /**
     * Store a newly created resource in storage.
     */
    public function save(Request $request)
    {
        $newCarDetails = $request->except('_token');

        if ($request->hasFile('image')) {
            $imagePath = $request->file('image')->store('car_images', 'public');
            $newCarDetails['image'] = $imagePath;

        }

        $car = new Car();
        $car->fill($newCarDetails);
        $manufacturer = Manufacturer::find($request->input('manufacturer'));

        $car->manufacturer()->associate($manufacturer);

        $car->save();

        return redirect()->route('car.index');
    }


    public function edit($id)
    {
        $car = Car::findOrFail($id);

        $manufacturers = Manufacturer::all();
        $models = CarModel::where('manufacturer_id', $car->manufacturer_id)->get();
        $carModels = CarModel::all();

        return view('car.edit', compact('car', 'manufacturers', 'models', 'carModels'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $car = Car::findOrFail($id);
        $carDetails = $request->except('_token');

        if ($request->hasFile('new_image')) {
            $newImagePath = $request->file('new_image')->store('car_images', 'public');

            Storage::disk('public')->delete($car->image);

            $carDetails['image'] = $newImagePath;
        }

        $manufacturer = Manufacturer::find($request->input('manufacturer'));
        $car->manufacturer()->associate($manufacturer);

        $carModel = CarModel::find($request->input('model'));
        $car->carModel()->associate($carModel);

        $car->update($carDetails);

        return redirect()->route('car.index');
    }



    /**
     * Remove the specified resource from storage.
     */
    public function delete($id)
    {
        $car = Car::findOrFail($id);
        $car->delete();

        return Redirect::route('car.index');
    }


}
