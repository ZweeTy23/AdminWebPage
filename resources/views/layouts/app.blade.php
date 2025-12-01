<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>Slym-X | The Minimalist Edge</title>

    <!-- Scripts & Styles -->
    @vite(['resources/sass/app.scss', 'resources/js/app.js'])
</head>
<body>
<div id="app" class="d-flex flex-column min-vh-100">
    <!-- Navbar Oscuro con Efecto Blur -->
    <nav class="navbar navbar-expand-md navbar-dark fixed-top" style="background: rgba(5, 5, 5, 0.9); backdrop-filter: blur(10px); border-bottom: 1px solid #222;">
        <div class="container">
            <!-- LOGO + MARCA -->
            <a class="navbar-brand d-flex align-items-center gap-2" href="{{ url('/') }}">
                <!-- Logo Imagen -->
                <img src="{{ asset('img/profile/slym-x.jpg') }}" alt="Slym-X Logo"
                     style="width: 40px; height: 40px; object-fit: cover; border: 1px solid #333;"
                     class="rounded-circle">

                <!-- Nombre Texto -->
                <span class="fw-bold text-uppercase" style="letter-spacing: 2px; font-size: 1.2rem;">
                        SLYM-X <span style="color: #00f2ea;">//</span>
                    </span>
            </a>

            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
                <span class="navbar-toggler-icon"></span>
            </button>

            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <!-- Menu Items (Derecha) -->
                <ul class="navbar-nav ms-auto align-items-center text-uppercase fw-bold" style="font-size: 0.8rem; letter-spacing: 1px;">
                    <li class="nav-item">
                        <a class="nav-link" href="/">Home</a>
                    </li>

                    @foreach($menu as $m)
                        <li class="nav-item">
                            <a class="nav-link" href="/{{ $m->slug }}">{{ $m->name }}</a>
                        </li>
                    @endforeach

                    <li class="nav-item">
                        <a class="nav-link" href="/blog">Journal</a>
                    </li>

                    <li class="nav-item">
                        <a class="nav-link" href="/contact">Contact</a>
                    </li>

                    <!-- Admin Link (Solo visible si logueado - Opcional) -->
                    @auth
                        <li class="nav-item ms-3">
                            <a href="{{ route('home') }}" class="btn btn-sm btn-outline-light rounded-0 px-3">Admin</a>
                        </li>
                    @endauth
                </ul>
            </div>
        </div>
    </nav>

    <!-- Spacer para que el navbar fijo no tape el contenido -->
    <div style="height: 76px;"></div>

    <main class="flex-grow-1">
        @yield('content')
    </main>

    <!-- Footer -->
    <footer class="bg-black py-5 border-top border-secondary mt-auto">
        <div class="container text-center">
            <img src="{{ asset('img/profile/slym-x.jpg') }}" alt="Logo" width="50" class="rounded-circle mb-3 grayscale opacity-50">
            <p class="text-muted small mb-4 text-uppercase ls-1">Define your cut. Dominate the game.</p>
            <div class="text-muted small">
                &copy; {{ date('Y') }} Slym-X Apparel.
            </div>
        </div>
    </footer>
</div>
</body>
</html>
