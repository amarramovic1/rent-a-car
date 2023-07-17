@extends('layout')
@section('CONTENT')

<div class="container">
    <div class="row">
        <div class="col-lg-6">
            <img src="{{ asset('storage/' . $car->image) }}" alt="Vozilo" class="car-image">
        </div>
        <div class="col-lg-6 car-info">
            <h2>Proizvođač:</h2>
            <p>{{ $car->manufacturer->name}}</p>
            <h2>Model:</h2>
            <p>{{ $car->carModel->name }}</p>
            <h2>Godina proizvodnje:</h2>
            <p>{{ $car->year_of_production }}</p>
            <h2>Registracijske oznake:</h2>
            <p>{{ $car->registration_marks }}</p>
            <h2>Tip menjača:</h2>
            <p>{{ $car->type_of_exchanger }}</p>
            <h2>Tip goriva:</h2>
            <p>{{ $car->type_of_fuel }}</p>
            <h2>Klasa vozila:</h2>
            <p>{{ $car->vehicle_class }}</p>
            <h2>Cijena:</h2>
            <p>{{ $car->price }}</p>
        </div>
    </div>
</div>

@endsection
