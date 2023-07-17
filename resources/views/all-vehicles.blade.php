@extends('layout')

@section('CONTENT')
    <div class="car-container">
        @foreach($filteredCars as $car)
            <div class="car-item">
                <div class="card mb-4">
                    <img src="{{ asset('storage/' . $car->image) }}" class="card-img-top" alt="Car Image">
                    <div class="card-body">
                        <h3 class="card-title text-center">{{ $car->manufacturer->name }}</h3>
                        <h5 class="card-text text-center">{{ $car->carModel->name }}</h5>
                        <ul class="list-group list-group-flush">
                            <li class="list-group-item"><strong>Godina proizvodnje:</strong> {{ $car->year_of_production }}</li>
                            <li class="list-group-item"><strong>Registarske oznake:</strong> {{ $car->registration_marks }}</li>
                            <li class="list-group-item"><strong>Tip mjenjača:</strong> {{ $car->type_of_exchanger }}</li>
                            <li class="list-group-item"><strong>Tip goriva:</strong> {{ $car->type_of_fuel }}</li>
                            <li class="list-group-item"><strong>Klasa vozila:</strong> {{ $car->vehicle_class }}</li>
                            <li class="list-group-item"><strong>Cijena vozila:</strong> {{ $car->price }}</li>
                        </ul>
                    </div>
                </div>
            </div>
        @endforeach
    </div>
@endsection
