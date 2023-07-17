@extends('layout')

@section('CONTENT')
    <h3 class="text-center mt-3">Rezultati pretrage</h3>
    <div class="row row-cols-1 row-cols-md-2 row-cols-lg-3">
        @if ($filteredCars->isEmpty())
            <div class="col">
                <div class="card mb-4">
                    <img src="{{ asset('images/placeholder-car.png')}}" class="card-img-top" alt="Car Image">
                    <div class="card-body">
                        <h5 class="card-title">/</h5>
                        <p class="card-text">/</p>
                        <ul class="list-group list-group-flush">
                            <li class="list-group-item">Godina proizvodnje: /</li>
                            <li class="list-group-item">Registarske oznake: /</li>
                            <li class="list-group-item">Tip mjenjača: /</li>
                            <li class="list-group-item">Tip goriva: /</li>
                            <li class="list-group-item">Klasa vozila: /</li>
                        </ul>
                    </div>
                </div>
                <h4 class="text-center mt-4">Nema rezultata pretrage.</h4>
            </div>
        @else
            @foreach($filteredCars as $car)
                <form action="{{ route('reservations.create', ['carId' => $car->id]) }}" method="GET" class="col mb-4">
                    @csrf
                    <input type="hidden" name="car_id" value="{{ $car->id }}">
                    <input type="hidden" name="date_from" value="{{ $dateFrom }}">
                    <input type="hidden" name="date_to" value="{{ $dateTo }}">
                    <div class="card">
                        <img src="{{ asset('storage/' . $car->image) }}" class="card-img-top" alt="Car Image">
                        <div class="card-body">
                            <h5 class="card-title">{{ $car->manufacturer->name }}</h5>
                            <p class="card-text">{{ $car->carModel->name }}</p>
                            <ul class="list-group list-group-flush">
                                <li class="list-group-item">Godina proizvodnje: {{ $car->year_of_production }}</li>
                                <li class="list-group-item">Registarske oznake: {{ $car->registration_marks }}</li>
                                <li class="list-group-item">Tip mjenjača: {{ $car->type_of_exchanger }}</li>
                                <li class="list-group-item">Tip goriva: {{ $car->type_of_fuel }}</li>
                                <li class="list-group-item">Klasa vozila: {{ $car->vehicle_class }}</li>
                                <li class="list-group-item">Cijena vozila: {{ $car->price }}</li>
                            </ul>
                            <div class="d-flex justify-content-center">
                                <button type="submit" class="btn btn-primary">Rezerviši</button>
                            </div>
                        </div>
                    </div>
                </form>
            @endforeach
        @endif
    </div>
@endsection
