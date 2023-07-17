@extends('main-layout')
@section('content')
    <h3 class="text-center mt-3">Lista auta</h3>
    <div class="row">
        <div class="col-12 table-responsive">
            <form action="{{route('car.index')}}" method="GET">
                <div class="row">
                    <div class="col-6">
                        <input type="text" name="searchTerm" class="form-control" value="{{request()->get('searchTerm')}}" placeholder="Pretraga auta">
                    </div>
                    <div class="col-3">
                        <button class="btn btn-primary w-100">Pretraži</button>
                    </div>
                    <div class="col-3">
                        <a href="{{route('car.create')}}" class="btn btn-success w-100">+ Dodaj novi</a>
                    </div>
                </div>
            </form>
            <table class="table table-hover mt-4">
                <thead>
                <tr>
                    <th>ID</th>
                    <th>Proizvođač</th>
                    <th>Model</th>
                    <th>Godina proizvodnje</th>
                    <th>Registarske oznake</th>
                    <th>Tip mjenjača</th>
                    <th>Tip goriva</th>
                    <th>Klasa vozila</th>
                    <th>Cijena</th>
                    <th>Slika</th>
                    <th></th>
                    <th></th>
                </tr>
                </thead>
                <tbody>
                @foreach($cars as $car)
                    <tr>
                        <td>{{$car->id}}</td>
                        <td>{{$car->manufacturer->name}}</td>
                        <td>{{$car->carModel->name ?? ''}}</td>

                        <td>{{$car->year_of_production}}</td>
                        <td>{{$car->registration_marks}}</td>
                        <td>{{$car->type_of_exchanger}}</td>
                        <td>{{$car->type_of_fuel}}</td>
                        <td>{{$car->vehicle_class}}</td>
                        <td>{{$car->price}}</td>
                        <td>
                            @if($car->image)
                                <img src="{{ asset('storage/' . $car->image) }}" alt="Car Image" width="100">
                            @endif
                        </td>
                        <td><a href="{{route('car.edit',['id'=>$car->id])}}" class="btn btn-primary btn-sm">Izmjena</a></td>
                        <td>
                            <form action="{{route('car.delete',['id'=>$car->id])}}" method="post">
                                @method('DELETE')
                                @csrf
                                <button class="btn btn-danger btn-sm">Brisanje</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
                </tbody>
            </table>

        </div>
    </div>
@endsection
