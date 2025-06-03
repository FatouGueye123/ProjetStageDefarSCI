@extends('layouts.bootstrap')

@section('content')
<style>
    body {
        background-color: #f4f6f9;
    }

    .main-content {
    background-color: #f8f9fa; /* gris clair Bootstrap */
    padding: 2rem;
    min-height: 100vh;
}


    .login-card {
        border: none;
        border-radius: 1rem;
        box-shadow: 0 4px 20px rgba(0, 0, 0, 0.1);
        background-color: #ffffff;
    }

    .login-card .card-header {
        background-color: #343a40;
        color: white;
        text-align: center;
        padding: 1.5rem;
        border-top-left-radius: 1rem;
        border-top-right-radius: 1rem;
    }

    .login-card .card-body {
        padding: 2rem;
    }

    .form-control:focus {
        border-color: #343a40;
        box-shadow: 0 0 0 0.2rem rgba(52, 58, 64, 0.25);
    }

    .btn-dark {
        background-color: #343a40;
        border-color: #343a40;
    }

    .btn-dark:hover {
        background-color: #23272b;
        border-color: #1d2124;
    }

    .card-footer a {
        color: #343a40;
        text-decoration: none;
        font-weight: 500;
    }

    .card-footer a:hover {
        text-decoration: underline;
    }
</style>

<div class="row justify-content-center mt-5">
    <div class="col-md-6 col-lg-5">
        <div class="card login-card">
            <div class="card-header">
                <h3>🎓 JobPlatform</h3>
                <p class="mb-0">Connexion à votre compte</p>
            </div>

            <div class="card-body">
                {{-- Message de statut --}}
                @if (session('status'))
                    <div class="alert alert-info">
                        {{ session('status') }}
                    </div>
                @endif

                {{-- Erreur d'authentification --}}
                @if ($errors->any())
                    <div class="alert alert-danger">
                        Email ou mot de passe incorrect. Veuillez réessayer.
                    </div>
                @endif

                <form method="POST" action="{{ route('login') }}">
                    @csrf

                    <div class="mb-3">
                        <label for="email" class="form-label">Adresse email</label>
                        <input type="email"
                               name="email"
                               id="email"
                               value="{{ old('email') }}"
                               required
                               autofocus
                               class="form-control @error('email') is-invalid @enderror">
                        @error('email')
                            <small class="text-danger">{{ $message }}</small>
                        @enderror
                    </div>

                    <div class="mb-3">
                        <label for="password" class="form-label">Mot de passe</label>
                        <input type="password"
                               name="password"
                               id="password"
                               required
                               class="form-control @error('password') is-invalid @enderror">
                        @error('password')
                            <small class="text-danger">{{ $message }}</small>
                        @enderror
                    </div>

                    <div class="mb-3 form-check">
                        <input class="form-check-input"
                               type="checkbox"
                               name="remember"
                               id="remember"
                               {{ old('remember') ? 'checked' : '' }}>
                        <label class="form-check-label" for="remember">
                            Se souvenir de moi
                        </label>
                    </div>

                    <button type="submit" class="btn btn-dark w-100">
                        Se connecter
                    </button>
                </form>
            </div>

            <div class="card-footer text-center py-3 bg-light">
                <a href="{{ route('register') }}">Pas encore de compte ? Créez-en un</a>
            </div>
        </div>
    </div>
</div>
@endsection
