@extends('layout')

@section('CONTENT')
    <div class="d-flex justify-content-center align-items-center" style="height: 70vh;">
        <div class="card shadow" style="width: 600px; height: 300px;">
            <div class="card-body">
                <h3 class="card-title text-center mb-4">Prijava administratora</h3>

                @if (session('error'))
                    <div class="alert alert-danger" role="alert">
                        {{ session('error') }}
                    </div>
                @endif

                <form action="{{ route('admin.login') }}" method="POST">
                    @csrf

                    <div class="form-group">
                        <label for="username">Korisničko ime:</label>
                        <input type="text" name="username" class="form-control" placeholder="Unesite korisničko ime" required>
                    </div>

                    <div class="form-group">
                        <label for="password">Lozinka:</label>
                        <input type="password" name="password" class="form-control" placeholder="Unesite lozinku" required>
                    </div>

                    <div class="text-center">
                        <button type="submit" class="btn btn-primary mt-5">Prijavi se</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
