@extends('main-layout')
@section('content')
    <h3 class="text-center mt-3">Izmjena vozila</h3>
    <div class="row">
        <div class="col-8 offset-2">
            <form action="{{ route('car.update',['id'=>$car->id ]) }}" method="POST" enctype="multipart/form-data">
                @csrf
                @method('PUT')
                <div class="form-group">
                    <label for="manufacturer">Proizvođač:</label>
                    <select name="manufacturer" id="manufacturer" class="form-control">
                        <option value="">- Izaberite proizvođača -</option>
                        @foreach($manufacturers as $manufacturer)
                            <option value="{{ $manufacturer->id }}" @if($manufacturer->id == $car->manufacturer_id) selected @endif>{{ $manufacturer->name }}</option>
                        @endforeach
                    </select>
                </div>

                <div class="form-group">
                    <label for="model">Model:</label>
                    <select name="model" id="model" class="form-control">
                        <option value="">- Izaberite model -</option>
                        @foreach($models as $model)
                            <option value="{{ $model->id }}" @if($model->id == $car->model) selected @endif>{{ $model->name }}</option>
                        @endforeach
                    </select>
                </div>

                <div class="form-group">
                    <label for="year_of_production" class="mt-2">Godina proizvodnje:</label>
                    <input type="text" name="year_of_production" class="form-control" placeholder="Unesite godinu proizvodnje" value="{{ $car->year_of_production }}">
                </div>

                <div class="form-group">
                    <label for="registration_marks" class="mt-2">Registarske oznake:</label>
                    <input type="text" name="registration_marks" class="form-control" placeholder="Unesite registarske oznake" value="{{ $car->registration_marks }}">
                </div>

                <div class="form-group">
                    <label for="type_of_exchanger" class="mt-2">Tip mjenjača:</label>
                    <select name="type_of_exchanger" id="type_of_exchanger" class="form-control">
                        <option value="">- Izaberite tip mjenjača -</option>
                        <option value="Automatik" @if($car->type_of_exchanger == "Automatik") selected @endif>Automatik</option>
                        <option value="Manual" @if($car->type_of_exchanger == "Manual") selected @endif>Manual</option>
                    </select>
                </div>

                <div class="form-group">
                    <label for="type_of_fuel" class="mt-2">Tip goriva:</label>
                    <select name="type_of_fuel" id="type_of_fuel" class="form-control">
                        <option value="">- Izaberite tip goriva -</option>
                        <option value="Benzin" @if($car->type_of_fuel == "Benzin") selected @endif>Benzin</option>
                        <option value="Dizel" @if($car->type_of_fuel == "Dizel") selected @endif>Dizel</option>
                        <option value="Hibrid" @if($car->type_of_fuel == "Hibrid") selected @endif>Hibrid</option>
                        <option value="Električno" @if($car->type_of_fuel == "Električno") selected @endif>Električno</option>
                    </select>
                </div>

                <div class="form-group">
                    <label for="vehicle_class" class="mt-2">Klasa vozila:</label>
                    <select name="vehicle_class" id="vehicle_class" class="form-control">
                        <option value="">- Izaberite klasu vozila -</option>
                        <option value="Ekonomična" @if($car->vehicle_class == "Ekonomična") selected @endif>Ekonomična</option>
                        <option value="Srednja" @if($car->vehicle_class == "Srednja") selected @endif>Srednja</option>
                        <option value="Luksuzna" @if($car->vehicle_class == "Luksuzna") selected @endif>Luksuzna</option>
                    </select>
                </div>
                <div class="form-group">
                    <label for="price"class="mt-2">Cijena:</label>
                    <input type="text" name="price" id="price" class="form-control mt-3" value="{{ $car->price}}">
                </div>

                <div class="form-group">
                    <label for="image" class="mt-2">Trenutna slika:</label>
                    <img src="{{ asset('storage/'.$car->image) }}" alt="Trenutna slika" class="img-thumbnail ">
                </div>

                <div class="form-group">
                    <label for="new_image" class="mt-2">Nova slika:</label>
                    <input type="file" name="new_image" id="new_image" class="form-control-file mt-3">
                </div>

                <div class="form-group">
                    <button class="btn btn-success w-100 mt-4">Sačuvaj</button>
                </div>
            </form>
        </div>
    </div>
    <script>
        var models = {!! $carModels !!};
        console.log(models);

        var selectedManufacturerId = {{ $car->manufacturer_id }};
        var selectedModelId = {{ $car->model }};

        $(document).ready(function () {
            $('#manufacturer').val(selectedManufacturerId);

            $('#manufacturer').on('change', function () {
                var selectedManufacturerId = $(this).val();
                var modelsOptions = '';

                models.forEach(function (model) {
                    if (model.manufacturer_id == selectedManufacturerId) {
                        modelsOptions += '<option value="' + model.id + '">' + model.name + '</option>';
                    }
                });

                $('#model').html(modelsOptions);

                // Postavi vrednost za polje "Model" nakon ažuriranja opcija
                $('#model').val(selectedModelId);
            });
        });
    </script>
@endsection
