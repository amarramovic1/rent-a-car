@extends('layout')
@section('CONTENT')
<!-- Naslovna sekcija -->
<section class="jumbotron text-center">
    <div class="container">
        <div class="row">
            <div class="col">
                <h1 class="display-4">Dobrodošli u <span class="highlight">Rent-a-Car</span></h1>
                <p class="lead">
                    Iznajmite vozilo po najpovoljnijim cijenama. Uživajte u <span class="highlight">slobodi</span> i <span class="highlight">udobnosti</span>.
                </p>
                <a href="{{route('all-vehicles')}}" class="btn btn-primary">Pogledaj ponudu</a>
            </div>
        </div>
    </div>
</section>


<!-- O nama sekcija -->
<section class="about-section py-5 scroll-reveal zoom-in">
    <div class="container">
        <div class="row">
            <div class="col-lg-6">
                <h2>O nama</h2>
                <p>
                    Mi smo vodeća rent-a-car agencija u Crnoj Gori, posvećena pružanju vrhunskih usluga iznajmljivanja vozila po najpovoljnijim cijenama. Naša misija je olakšati vaše putovanje i omogućiti vam da istražite ljepote Crne Gore slobodno, udobno i bezbijedno.

                    Sa širokim spektrom vozila najnovije generacije, nudimo raznovrsne opcije koje odgovaraju vašim potrebama. Bez obzira da li vam je potreban kompaktni automobil za gradsku vožnju, prostrani SUV za obilazak prirodnih ljepota ili luksuzna limuzina za posebne prilike, naš vozni park ima sve što vam treba.

                    Naša vizija je postati vaš prvi izbor prilikom planiranja putovanja ili poslovnog boravka, pružajući vam ne samo kvalitetna vozila, već i izvrsnu uslugu koja nadmašuje vaša očekivanja.
                </p>
            </div>
            <div class="col-lg-6">
                <img src="{{ asset('images/rent-a-car.jpg') }}" alt="Rent-a-Car" class="img-fluid">

            </div>
        </div>
    </div>
</section>
<!-- Rezervacija sekcija -->
<section id="reservation-section" class="reservation-section py-5 scroll-reveal zoom-in">
    <div class="container">
        <h2 class="text-center mb-4">Rezervišite vozilo</h2>
        <form action="{{ route('search.index') }}" method="GET">
        @csrf
            <div class="row">
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="class">Klasa vozila:</label>
                        <select class="form-control" id="class" name="class">
                            <option value="">Izaberite klasu vozila</option>
                            <option value="Ekonomična">Ekonomična</option>
                            <option value="Srednja">Srednja</option>
                            <option value="Luksuzna">Luksuzna</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="transmission">Tip menjača:</label>
                        <select class="form-control" id="transmission" name="transmission">
                            <option value="">Izaberite tip menjača</option>
                            <option value="Automatik">Automatik</option>
                            <option value="Manual">Manual</option>
                        </select>
                    </div>
                    <div class="form-group row">
                        <label for="year_from" class="col-sm-4 col-form-label mt-2">Godina proizvodnje:</label>
                        <div class="col-sm-4">
                            <select class="form-control" id="year_from" name="year_from">
                                <option value="">(Od)</option>
                                @php
                                    $currentYear = date('Y');
                                    for($i = $currentYear; $i >= 1990; $i--) {
                                        echo "<option value='$i'>$i</option>";
                                    }
                                @endphp
                            </select>
                        </div>
                        <div class="col-sm-4">
                            <select class="form-control" id="year_to" name="year_to">
                                <option value="">(Do)</option>
                                @php
                                    $currentYear = date('Y');
                                    for($i = $currentYear; $i >= 1990; $i--) {
                                        echo "<option value='$i'>$i</option>";
                                    }
                                @endphp
                            </select>
                        </div>
                    </div>

                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="fuel">Tip goriva:</label>
                        <select class="form-control" id="fuel" name="fuel">
                            <option value="">Izaberite tip goriva</option>
                            <option value="Benzin">Benzin</option>
                            <option value="Dizel">Dizel</option>
                            <option value="Hibrid">Hibrid</option>
                            <option value="Električno">Električno</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="date_from">Datum od:</label>
                        <input type="date" class="form-control" id="date_from" name="date_from">
                    </div>
                    <div class="form-group">
                        <label for="date_to">Datum do:</label>
                        <input type="date" class="form-control" id="date_to" name="date_to">
                    </div>
                </div>
            </div>
            <button type="submit" class="btn btn-primary btn-block">Pretraži</button>
        </form>
    </div>
</section>

<!-- Vozila sekcija -->
<section id="vehicles-section" class="vehicles-section bg-light py-5 scroll-reveal zoom-in">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <h2 class="text-center mb-4">Naša vozila</h2>
            </div>
        </div>
        <div class="row">
            <div id="vehicleCarousel" class="carousel slide" data-bs-ride="carousel">
                <div class="carousel-inner">
                    @foreach($cars->chunk(3) as $chunk)
                        <div class="carousel-item{{ $loop->first ? ' active' : '' }}">
                            <div class="row">
                                @foreach($chunk as $car)
                                    <div class="col-lg-4">
                                        <div class="card vehicle-card">
                                            <img src="{{ asset('storage/' . $car->image) }}" alt="Vozilo" class="card-img-top">
                                            <div class="card-body d-flex flex-column align-items-center">
                                                <h5 class="card-title">{{ $car->manufacturer->name }}</h5>
                                                <p class="card-text">{{$car->carModel->name ?? ''}}</p>
                                                <a href="{{ route('vehicles.details', $car->id) }}" class="btn btn-primary mt-auto">Detalji</a>
                                            </div>
                                        </div>

                                    </div>
                                @endforeach
                            </div>
                        </div>
                    @endforeach
                </div>
                <button class="carousel-control-prev" type="button" data-bs-target="#vehicleCarousel" data-bs-slide="prev">
                    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                    <span class="visually-hidden">Prethodno</span>
                </button>
                <button class="carousel-control-next" type="button" data-bs-target="#vehicleCarousel" data-bs-slide="next">
                    <span class="carousel-control-next-icon" aria-hidden="true"></span>
                    <span class="visually-hidden">Sledeće</span>
                </button>
            </div>
        </div>
    </div>
</section>

<!-- Accordion sekcija -->
<section class="accordion-section py-5 scroll-reveal zoom-in">
    <div class="container">
        <h2 class="text-center mb-4">Često postavljena pitanja</h2>
        <div class="row">
            <div class="col-8 offset-2">
                <div class="accordion" id="accordionExample">
                    <div class="accordion-item">
                        <h2 class="accordion-header">
                            <button class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
                                1) Koja dokumenta su potrebna prilikom iznajmljivanja?
                            </button>
                        </h2>
                        <div id="collapseOne" class="accordion-collapse collapse show" data-bs-parent="#accordionExample">
                            <div class="accordion-body">
                                <strong>Odgovor:</strong> Važeća vozačka dozvola, Identifikacioni dokument, Kreditna kartica.
                            </div>
                        </div>
                    </div>
                    <div class="accordion-item">
                        <h2 class="accordion-header">
                            <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
                                2) Kako rezervisati vozilo?
                            </button>
                        </h2>
                        <div id="collapseTwo" class="accordion-collapse collapse" data-bs-parent="#accordionExample">
                            <div class="accordion-body">
                                <strong>Odgovor:</strong> Da biste rezervisali vozilo, idite na sekciju "Rezervišite vozilo" i odaberite željeno vozilo. Zatim slijedite upustva za rezervaciju na stranici.
                            </div>
                        </div>
                    </div>
                    <div class="accordion-item">
                        <h2 class="accordion-header">
                            <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseThree" aria-expanded="false" aria-controls="collapseThree">
                                3) Koji su uslovi iznajmljivanja?
                            </button>
                        </h2>
                        <div id="collapseThree" class="accordion-collapse collapse" data-bs-parent="#accordionExample">
                            <div class="accordion-body">
                                <strong>Odgovor:</strong> Uslovi iznajmljivanja variraju zavisno o modelu vozila. Molimo vas da se obratite našem timu za podršku kako biste dobili tačne informacije o uslovima iznajmljivanja.
                            </div>
                        </div>
                    </div>
                    <div class="accordion-item">
                        <h2 class="accordion-header">
                            <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseFour" aria-expanded="false" aria-controls="collapseFour">
                                4) Kako mogu platiti iznajmljivanje?
                            </button>
                        </h2>
                        <div id="collapseFour" class="accordion-collapse collapse" data-bs-parent="#accordionExample">
                            <div class="accordion-body">
                                <strong>Odgovor:</strong> Prihvatamo različite načine plaćanja kao što su kreditne kartice, debitne kartice i gotovina. Detalje o plaćanju možete pronaći u dijelu "Načini plaćanja".
                            </div>
                        </div>
                    </div>
                    <div class="accordion-item">
                        <h2 class="accordion-header">
                            <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseFive" aria-expanded="false" aria-controls="collapseFive">
                                5) Kako otkazati rezervaciju?
                            </button>
                        </h2>
                        <div id="collapseFive" class="accordion-collapse collapse" data-bs-parent="#accordionExample">
                            <div class="accordion-body">
                                <strong>Odgovor:</strong> Ako želite otkazati rezervaciju, kontaktirajte naš tim za podršku i pružite im detalje rezervacije. Oni će vam pomoći u procesu otkazivanja.
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Načini plaćanja sekcija -->
<section id="payment-methods-section"class="payment-methods-section py-5 scroll-reveal zoom-in">
    <div class="container">
        <h2 class="text-center mb-4">Načini plaćanja</h2>
        <div class="row justify-content-center">
            <div class="col-lg-6 col-md-6 col-sm-6">
                <div class="payment-method">
                    <h5 class="payment-method-title">Kreditne kartice</h5>
                    <img src="{{ asset('images/credit-card.png') }}" alt="Kreditne kartice" class="payment-method-icon">
                    <p class="payment-method-description">Prihvatamo sve glavne kreditne kartice kao što su Visa, Mastercard, American Express itd. Plaćanje se vrši putem sigurnog online sistema za plaćanje.</p>
                </div>
            </div>
            <div class="col-lg-6 col-md-6 col-sm-6">
                <div class="payment-method">
                    <h5 class="payment-method-title">Debitne kartice</h5>
                    <img src="{{ asset('images/debit-card.jpg') }}" alt="Debitne kartice" class="payment-method-icon">
                    <p class="payment-method-description">Prihvatamo debitne kartice koje podržavaju online plaćanje. Plaćanje će biti naplaćeno direktno sa vašeg bankovnog računa povezanog sa karticom.</p>
                </div>
            </div>
            <div class="col-lg-6 col-md-6 col-sm-6">
                <div class="payment-method">
                    <h5 class="payment-method-title">Gotovina</h5>
                    <img src="{{ asset('images/cash.jpg') }}" alt="Gotovina" class="payment-method-icon">
                    <p class="payment-method-description">Plaćanje u gotovini je moguće prilikom preuzimanja vozila. Molimo vas da imate tačan iznos pri ruci, jer nemamo mogućnost za vraćanje sitnog novca.</p>
                </div>
            </div>
            <div class="col-lg-6 col-md-6 col-sm-6">
                <div class="payment-method">
                    <h5 class="payment-method-title">Bankovni transfer</h5>
                    <img src="{{ asset('images/bank-transfer.jpg') }}" alt="Bankovni transfer" class="payment-method-icon">
                    <p class="payment-method-description">Ako želite izvršiti plaćanje putem bankovnog transfera, kontaktirajte naš tim za podršku kako biste dobili potrebne bankovne detalje za transfer.</p>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Kontakt form sekcija -->
<section id="contact-section" class="contact-form-section py-5 scroll-reveal zoom-in">
    <div class="container">
        <div class="row">
            <div class="col-lg-6 mx-auto">
                <h2 class="text-center mb-4">Kontaktirajte nas</h2>
                <form class="reservation-form">
                    <div class="form-group">
                        <input type="text" class="form-control" placeholder="Ime i prezime">
                    </div>
                    <div class="form-group">
                        <input type="email" class="form-control" placeholder="Email">
                    </div>
                    <div class="form-group">
                        <textarea class="form-control" rows="5" placeholder="Poruka"></textarea>
                    </div>
                    <button type="submit" class="btn btn-primary btn-block">Pošalji</button>
                </form>
            </div>
        </div>
    </div>
</section>
<script>
    ScrollReveal().reveal('.scroll-reveal.zoom-in', {
        delay: 170,
        duration: 700,
        easing: 'ease-out',
        scale: 0.8,
        reset: true,
        viewFactor: 0.2
    });
</script>

@endsection
