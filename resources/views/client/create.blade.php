@extends('main-layout')
@section('content')
    <h3 class="text-center mt-3 mb-3">Unos podataka</h3>
    <div class="row">
        <div class="col-8 offset-2 table-responsive">
            <form action="{{route('client.save')}}" method="POST">
                @csrf
                <div class="row">
                    <div class="col-5">
                        <label for="first_name">Ime:</label>
                        <input type="text" name="first_name" class="form-control" placeholder="Unesite ime">
                    </div>
                    <div class="col-5">
                        <label for="last_name">Prezime:</label>
                        <input type="text" name="last_name" class="form-control" placeholder="Unesite prezime">
                    </div>
                </div>
                <div class="row mt-3">
                    <div class="col-6">
                        <label for="document_type">Tip dokumenta:</label><br>
                        <input class="mx-2 mt-3" type="radio" name="document_type" value="Lična karta">Lična karta
                        <input class="mx-2" type="radio" name="document_type" value="Pasoš">Pasoš
                        <input class="mx-2" type="radio" name="document_type" value="Vozačka">Vozačka
                        <input class="mx-2" type="radio" name="document_type" value="Ostalo">Ostalo
                    </div>
                    <div class="col-4">
                        <label for="number_of_documents">Broj dokumenta:</label>
                        <input type="text" name="number_of_documents" class="form-control" placeholder="Unesite broj dokumenta">
                    </div>
                </div>
                <div class="row mt-3">
                    <div class="col-4">
                        <label for="country">Država:</label>
                        <select name="country" id="country" class="form-control">
                            <option value="">-odaberite državu-</option>
                            <option value="Crna Gora">Crna Gora</option>
                            <option value="Srbija">Srbija</option>
                            <option value="Hrvatska">Hrvatska</option>
                            <option value="Makedonija">Makedonija</option>
                        </select>
                    </div>
                    <div class="col-4">
                        <label for="date_of_birth">Datum rođenja:</label>
                        <input type="date" name="date_of_birth" class="form-control">
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
