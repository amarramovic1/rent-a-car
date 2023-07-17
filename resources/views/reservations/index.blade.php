@extends('main-layout')
@section('content')
    <h3 class="text-center mt-3">Lista rezervacija</h3>
    <div class="row">
        <div class="col-10 offset-1 table-responsive">
            <table class="table table-hover mt-4">
                <thead>
                <tr>
                    <th>ID</th>
                    <th>Client_id</th>
                    <th>Car_id</th>
                    <th>Date_from</th>
                    <th>Date_to</th>
                    <th>Price</th>
                    <th></th>
                    <th></th>
                </tr>
                </thead>
                <tbody>
                @foreach($reservations as $reservation)
                    <tr>
                        <td>{{$reservation->id}}</td>
                        <td>{{$clients[$reservation->client_id]}}</td>
                        <td>{{$cars[$reservation->car_id]}}</td>
                        <td>{{$reservation->date_from}}</td>
                        <td>{{$reservation->date_to}}</td>
                        <td>{{$reservation->price}}</td>
                        <td><a href="{{route('reservations.edit',['id'=>$reservation->id])}}" class="btn btn-primary btn-sm">Izmjena</a></td>
                        <td>
                            <form action="{{ route('reservations.destroy', ['id' => $reservation->id]) }}" method="post">
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
