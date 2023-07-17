@extends('main-layout')
@section('content')
    <h3 class="text-center mt-3">Unos vozila</h3>
    <div class="row">
        <div class="col-8 offset-2">
            <form action="{{ route('car.save')}}" method="POST" enctype="multipart/form-data">
                @csrf

                <div class="form-group">
                    <label for="manufacturer">Proizvođač:</label>
                    <select name="manufacturer" id="manufacturer" class="form-control">
                        <option value="">- Izaberite proizvođača -</option>
                        @foreach($manufacturers as $manufacturer)
                            <option value="{{ $manufacturer->id }}">{{ $manufacturer->name }}</option>
                        @endforeach
                    </select>

                </div>

                <div class="form-group">
                    <label for="model">Model:</label>
                    <select name="model" id="model" class="form-control">
                        <option value="">- Izaberite model -</option>
                    </select>
                </div>

                <div class="form-group">
                    <label for="year_of_production" class="mt-2">Godina proizvodnje:</label>
                    <input type="text" name="year_of_production" class="form-control" placeholder="Unesite godinu proizvodnje">
                </div>

                <div class="form-group">
                    <label for="registration_marks" class="mt-2">Registarske oznake:</label>
                    <input type="text" name="registration_marks" class="form-control" placeholder="Unesite registarske oznake">
                </div>

                <div class="form-group">
                    <label for="type_of_exchanger" class="mt-2">Tip mjenjača:</label>
                    <select name="type_of_exchanger" id="type_of_exchanger" class="form-control">
                        <option value="">- Izaberite tip mjenjača -</option>
                        <option value="Automatik">Automatik</option>
                        <option value="Manual">Manual</option>
                    </select>
                </div>

                <div class="form-group">
                    <label for="type_of_fuel" class="mt-2">Tip goriva:</label>
                    <select name="type_of_fuel" id="type_of_fuel" class="form-control">
                        <option value="">- Izaberite tip goriva -</option>
                        <option value="Benzin">Benzin</option>
                        <option value="Dizel">Dizel</option>
                        <option value="Hibrid">Hibrid</option>
                        <option value="Električno">Električno</option>
                    </select>
                </div>

                <div class="form-group">
                    <label for="vehicle_class" class="mt-2">Klasa vozila:</label>
                    <select name="vehicle_class" id="vehicle_class" class="form-control">
                        <option value="">- Izaberite klasu vozila -</option>
                        <option value="Ekonomična">Ekonomična</option>
                        <option value="Sednja">Srednja</option>
                        <option value="Luksuzna">Luksuzna</option>
                    </select>
                </div>
                <div class="form-group" >
                    <label for="price"class="mt-2">Cijena:</label>
                    <input type="text" name="price" id="price" class="form-control mt-3" placeholder="Unesite cijenu auta">
                </div>
                <div class="form-group" >
                    <label for="image"class="mt-2">Slika:</label>
                    <input type="file" name="image" id="image" class="form-control-file mt-3">
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


        $('#manufacturer').on('change', function () {
            var selectedManufacturerId = $(this).val();
            var modelsOptions = '';

            models.forEach(function (model) {
                if (model.manufacturer_id == selectedManufacturerId) {
                    modelsOptions += '<option value="' + model.id + '">' + model.name + '</option>';
                }
            });

            $('#model').html(modelsOptions);
        });
    </script>

@endsection
