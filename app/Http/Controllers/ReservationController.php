<?php

namespace App\Http\Controllers;

use App\Models\Car;
use App\Models\Manufacturer;
use App\Models\Reservation;
use App\Models\Client;
use App\Http\Requests\StoreReservationRequest;
use App\Http\Requests\UpdateReservationRequest;
use Illuminate\Http\Request;

class ReservationController extends Controller
{

    public function index(Request $request)
    {
        $reservations = Reservation::query();

        $reservations = $reservations->get();

        $clients = Client::pluck('first_name', 'id')->map(function ($firstName, $id) {
            $lastName = Client::where('id', $id)->pluck('last_name')->first();
            return $firstName . ' ' . $lastName;
        });


        $cars = Car::pluck('manufacturer_id', 'id');

        return view('reservations.index', compact('reservations', 'clients', 'cars'));

    }

    /**
     * Show the form for creating a new resource.
     */
    public function create($carId, Request $request)
    {
        $dateFrom = $request->input('date_from');
        $dateTo = $request->input('date_to');

        $car = Car::findOrFail($carId);

        return view('reservations.create', compact('car', 'dateFrom', 'dateTo'));
    }


    public function store(Request $request)
    {

        $carPrice = $request->input('car_price');
        $dateFrom = $request->input('date_from');
        $dateTo = $request->input('date_to');

        if ($carPrice) {
            $validatedData['price'] = $carPrice;
        }

        $validatedData = $request->validate([
            'car_id' => 'required',
            'first_name' => 'required',
            'last_name' => 'required',
            'document_type' => 'required',
            'number_of_documents' => 'required',
            'country' => 'required',
            'date_of_birth' => 'required',
        ]);


        $validatedData = array_merge($validatedData, [
            'date_from' => $dateFrom,
            'date_to' => $dateTo,
        ]);

        $client = Client::create([
            'first_name' => $validatedData['first_name'],
            'last_name' => $validatedData['last_name'],
            'document_type' => $validatedData['document_type'],
            'number_of_documents' => $validatedData['number_of_documents'],
            'country' => $validatedData['country'],
            'date_of_birth' => $validatedData['date_of_birth'],
        ]);

        $reservation = Reservation::create([
            'client_id' => $client->id,
            'car_id' => $validatedData['car_id'],
            'date_from' => $validatedData['date_from'],
            'date_to' => $validatedData['date_to'],
            'price' => $request->input('car_price'),
        ]);

        return redirect()->route('reservations.success');


    }

    public function success()
    {
        return view('reservations.success');
    }
    public function edit($id)
    {
        $reservation = Reservation::findOrFail($id);
        $clients = Client::pluck('first_name', 'id');
        $cars = Car::pluck('model', 'id');

        return view('reservations.edit', compact('reservation', 'clients', 'cars'));
    }

    public function update(Request $request, $id)
    {
        $reservation = Reservation::findOrFail($id);
        $reservation->client_id = $request->input('client_id');
        $reservation->car_id = $request->input('car_id');
        $reservation->date_from = $request->input('date_from');
        $reservation->date_to = $request->input('date_to');
        $reservation->price = $request->input('price');
        $reservation->save();

        return redirect()->route('reservations.index')->with('success', 'Rezervacija je uspešno izmenjena.');
    }
    public function destroy($id)
    {
        $reservation = Reservation::find($id);

        if (!$reservation) {
            return redirect()->back()->with('error', 'Rezervacija nije pronađena.');
        }

        $reservation->delete();

        return redirect()->back()->with('success', 'Rezervacija je uspješno obrisana.');
    }
}
