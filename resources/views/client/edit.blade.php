@extends('main-layout')
@section('content')
    <h3 class="text-center mt-3">Izmjena klijenta</h3>
    <div class="row">
        <div class="col-8 offset-2">
            <form action="{{route('client.update',['id'=>$client->id ])}}" method="POST">
                @csrf
                @method('PUT')

                <div class="row">
                    <div class="col-5">
                        <label for="first_name">Ime:</label>
                        <input type="text" name="first_name" class="form-control" value="{{$client->first_name}}">
                    </div>
                    <div class="col-5">
                        <label for="last_name">Prezime:</label>
                        <input type="text" name="last_name" class="form-control" value="{{$client->last_name}}">
                    </div>
                </div>
                <div class="row mt-3">
                    <div class="col-6">
                        <label for="document_type">Tip dokumenta:</label><br>
                        <input class="mx-2 mt-3" type="radio" name="document_type" value="Lična karta" {{ $client->document_type == 'Lična karta' ? 'checked' : '' }}>Lična karta
                        <input class="mx-2" type="radio" name="document_type" value="Pasoš" {{ $client->document_type == 'Pasoš' ? 'checked' : '' }}>Pasoš
                        <input class="mx-2" type="radio" name="document_type" value="Vozačka" {{ $client->document_type == 'Vozačka' ? 'checked' : '' }}>Vozačka
                        <input class="mx-2" type="radio" name="document_type" value="Ostalo" {{ $client->document_type == 'Ostalo' ? 'checked' : '' }}>Ostalo
                    </div>
                    <div class="col-4">
                        <label for="number_of_documents">Broj dokumenta:</label>
                        <input type="text" name="number_of_documents" class="form-control" value="{{$client->number_of_documents}}">
                    </div>
                </div>
                <div class="row mt-3">
                    <div class="col-4">
                        <label for="country">Država:</label>
                        <select name="country" id="country" class="form-control">
                            <option value="">-odaberite državu-</option>
                            <option value="Crna Gora" {{ $client->country == 'Crna Gora' ? 'selected' : '' }}>Crna Gora</option>
                            <option value="Srbija" {{ $client->country == 'Srbija' ? 'selected' : '' }}>Srbija</option>
                            <option value="Hrvatska" {{ $client->country == 'Hrvatska' ? 'selected' : '' }}>Hrvatska</option>
                            <option value="Makedonija" {{ $client->country == 'Makedonija' ? 'selected' : '' }}>Makedonija</option>
                        </select>
                    </div>
                    <div class="col-4">
                        <label for="date_of_birth">Datum rođenja:</label>
                        <input type="date" name="date_of_birth" class="form-control" value="{{$client->date_of_birth}}">
                    </div>
                </div>
                <div class="row mt-3">
                    <div class="col-4">
                        <button class="btn btn-success w-100">Prijavi se</button>
                    </div>
                </div>



            </form>
        </div>
    </div>
@endsection
