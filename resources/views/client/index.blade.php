@extends('main-layout')
@section('content')
    <h3 class="text-center mt-3">Lista klijenata</h3>
    <div class="row">
        <div class="col-10 offset-1 table-responsive">
            <form action="{{route('client.index')}}" method="GET">
                <div class="row">
                    <div class="col-6">
                        <input type="text" name="searchTerm" class="form-control" value="{{request()->get('searchTerm')}}" placeholder="Pretraga klijenta">
                    </div>
                    <div class="col-3">
                        <button class="btn btn-primary w-100">Pretraži</button>
                    </div>
                    <div class="col-3">
                        <a href="{{route('client.create')}}" class="btn btn-success w-100">+ Dodaj novi</a>
                    </div>
                </div>
            </form>
            <table class="table table-hover mt-4">
                <thead>
                <tr>
                    <th>ID</th>
                    <th>Ime</th>
                    <th>Prezime</th>
                    <th>Tip dokumenta</th>
                    <th>Broj dokumenta</th>
                    <th>Drzava</th>
                    <th>Datum rodjenja</th>
                    <th></th>
                    <th></th>
                </tr>
                </thead>
                <tbody>
                @foreach($clients as $client)
                    <tr>
                        <td>{{$client->id}}</td>
                        <td>{{$client->first_name}}</td>
                        <td>{{$client->last_name}}</td>
                        <td>{{$client->document_type}}</td>
                        <td>{{$client->number_of_documents}}</td>
                        <td>{{$client->country}}</td>
                        <td>{{$client->date_of_birth}}</td>
                        <td><a href="{{route('client.edit',['id'=>$client->id])}}" class="btn btn-primary btn-sm">Izmjena</a></td>
                        <td>
                            <form action="{{route('client.delete',['id'=>$client->id])}}" method="post">
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
