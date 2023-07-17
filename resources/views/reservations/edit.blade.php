@extends('main-layout')
@section('content')
    <h3 class="text-center mt-3">Izmena rezervacije</h3>
    <div class="row">
        <div class="col-9 offset-2">
            <form action="{{ route('reservations.update', $reservation->id) }}" method="POST">
                @method('PUT')
                @csrf
                <div class="form-group">
                    <label for="client_id">Klijent:</label>
                    <select name="client_id" id="client_id" class="form-control">
                        @foreach($clients as $clientId => $clientName)
                            <option value="{{ $clientId }}" {{ $reservation->client_id == $clientId ? 'selected' : '' }}>
                                {{ $clientName }}
                            </option>
                        @endforeach
                    </select>
                </div>
                <div class="form-group">
                    <label for="car_id">Automobil:</label>
                    <select name="car_id" id="car_id" class="form-control">
                        @foreach($cars as $carId => $carName)
                            <option value="{{ $carId }}" {{ $reservation->car_id == $carId ? 'selected' : '' }}>
                                {{ $carName }}
                            </option>
                        @endforeach
                    </select>
                </div>
                <div class="form-group">
                    <label for="date_from">Datum od:</label>
                    <input type="date" name="date_from" id="date_from" class="form-control" value="{{ $reservation->date_from }}">
                </div>
                <div class="form-group">
                    <label for="date_to">Datum do:</label>
                    <input type="date" name="date_to" id="date_to" class="form-control" value="{{ $reservation->date_to }}">
                </div>
                <div class="form-group">
                    <label for="price">Cena:</label>
                    <input type="number" name="price" id="price" class="form-control" value="{{ $reservation->price }}">
                </div>
                <button type="submit" class="btn btn-primary mt-3">Sačuvaj izmene</button>
            </form>
        </div>
    </div>
@endsection
