<!DOCTYPE html>
<html>
<head>
    <title>Rent-a-Car</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js"></script>
    <link href="{{ asset('css/style.css') }}" rel="stylesheet">
    <script src="https://kit.fontawesome.com/07aeb126ed.js" crossorigin="anonymous"></script>
    <script src="https://unpkg.com/scrollreveal"></script>
    <style>
        body {
            padding-top: 75px;
        }
        .navbar {
            position: fixed;
            top: 0;
            width: 100%;
            z-index: 9999;
            padding-top: 4px;
            padding-bottom: 4px;
        }
        .navbar-brand {
            padding: 0px;
        }
        .navbar-brand img {
            height: 30px;
        }
        .navbar-toggler-icon {
            color: white;
        }
    </style>
</head>
<body>

<!-- Navigaciona traka -->
<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
    <div class="container">
        <a class="navbar-brand" href="/index">Rent-a-Car</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav"
                aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav ml-auto">
                <li class="nav-item">
                    <a class="nav-link" href="/index">Početna</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="/index#vehicles-section">Vozila</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="/index#reservation-section">Rezervacija</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="/index#payment-methods-section">Načini plaćanja</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="/index#contact-section">Kontakt</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('admin.index') }}">Administrator</a>
                </li>
            </ul>
        </div>
    </div>
</nav>




<div class="container">
    @yield('CONTENT')
</div>
<!-- Kontakt informacije sekcija -->
<section class="contact-info-section py-5 bg-light">
    <div class="container">
        <div class="row">
            <div class="col-lg-4">
                <div class="card contact-card">
                    <div class="card-body">
                        <h5 class="card-title">
                            <i class="fas fa-map-marker-alt"></i> Adresa
                        </h5>
                        <p class="card-text">Džordža Vašingtona, Podgorica, Crna Gora</p>
                    </div>
                </div>
            </div>
            <div class="col-lg-4">
                <div class="card contact-card">
                    <div class="card-body">
                        <h5 class="card-title">
                            <i class="fas fa-phone"></i> Telefon
                        </h5>
                        <p class="card-text">+382 39 456 789</p>
                    </div>
                </div>
            </div>
            <div class="col-lg-4">
                <div class="card contact-card">
                    <div class="card-body">
                        <h5 class="card-title">
                            <i class="fas fa-envelope"></i> Email
                        </h5>
                        <p class="card-text">info@rentacar.com</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- Drustvene mreze sekcija -->
<section class="social-media-section py-3">
    <div class="container">
        <h6 class="text-center mb-4">Pratite nas na društvenim mrežama</h6>
        <div class="social-media-icons">
            <a href="https://www.facebook.com/" class="social-media-icon" target="_blank">
                <i class="fab fa-facebook-f"></i>
            </a>
            <a href="https://www.instagram.com/" class="social-media-icon"target="_blank">
                <i class="fab fa-instagram"></i>
            </a>
            <a href="https://twitter.com/" class="social-media-icon"target="_blank">
                <i class="fab fa-twitter"></i>
            </a>
        </div>
    </div>
</section>
<!-- Footer -->
<footer class="footer bg-dark text-white text-center py-3">
    <div class="container">
        <p>&copy; 2023 Rent-a-Car. Sva prava zadržana.</p>
    </div>
</footer>

<a id="back-to-top" href="#" style="display: none;"><i class="fa fa-arrow-up"></i></a>

<script>
    window.addEventListener('scroll', function() {
        var backToTopButton = document.getElementById('back-to-top');
        if (window.scrollY > 200) {
            backToTopButton.style.display = 'block';
        } else {
            backToTopButton.style.display = 'none';
        }
    });

    document.getElementById('back-to-top').addEventListener('click', function(e) {
        e.preventDefault();
        window.scrollTo({ top: 0, behavior: 'smooth' });
    });
</script>

</body>
</html>
