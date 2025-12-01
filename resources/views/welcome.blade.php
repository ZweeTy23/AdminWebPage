@extends('layouts.app')

@section('content')

    <style>
        /* --- HERO LOGO STYLE --- */
        .hero-logo-img {
            max-width: 250px; /* Tamaño controlado */
            height: auto;
            border: 2px solid rgba(255, 255, 255, 0.1); /* Borde sutil */
            box-shadow: 0 0 30px rgba(0, 242, 234, 0.3); /* Resplandor Cyan */
            border-radius: 4px; /* Ligeramente redondeado o 0 para cuadrado */
            margin-bottom: 1.5rem;
            animation: float 6s ease-in-out infinite;
        }

        @keyframes float {
            0% { transform: translateY(0px); }
            50% { transform: translateY(-10px); }
            100% { transform: translateY(0px); }
        }

        /* --- CATEGORY GRID REVOLUTION (Lo 2do Mejorado) --- */
        .cat-grid-container {
            display: grid;
            grid-template-columns: 1fr;
            gap: 1.5rem;
        }

        /* En pantallas grandes, diseño asimétrico (1 grande a la izq, 2 a la der) */
        @media (min-width: 992px) {
            .cat-grid-container {
                grid-template-columns: 1.5fr 1fr; /* Columna izq más ancha */
                grid-template-rows: 250px 250px; /* Altura base */
            }

            /* El primer item ocupa las 2 filas de la columna 1 */
            .cat-item-0 {
                grid-column: 1;
                grid-row: 1 / span 2;
                height: 100% !important;
            }
            .cat-item-1 {
                grid-column: 2;
                grid-row: 1;
            }
            .cat-item-2 {
                grid-column: 2;
                grid-row: 2;
            }
        }

        .cat-card {
            position: relative;
            width: 100%;
            height: 100%;
            min-height: 300px; /* Altura mínima para móviles */
            overflow: hidden;
            border: 1px solid #222;
            transition: all 0.4s ease;
        }

        .cat-card:hover {
            border-color: #00f2ea;
            transform: translateY(-5px);
            box-shadow: 0 10px 40px -10px rgba(0,0,0,0.8);
        }

        .cat-bg {
            position: absolute;
            top: 0; left: 0; width: 100%; height: 100%;
            background-size: cover;
            background-position: center;
            transition: transform 0.8s cubic-bezier(0.215, 0.610, 0.355, 1.000);
        }

        .cat-card:hover .cat-bg {
            transform: scale(1.1);
        }

        .cat-overlay {
            position: absolute;
            inset: 0;
            background: linear-gradient(to top, #000 0%, rgba(0,0,0,0.4) 50%, rgba(0,0,0,0) 100%);
            z-index: 1;
        }

        .cat-content {
            position: absolute;
            bottom: 0; left: 0;
            padding: 2rem;
            z-index: 2;
            width: 100%;
        }

        .cat-name {
            font-size: 2rem;
            font-weight: 800;
            text-transform: uppercase;
            color: #fff;
            margin-bottom: 0;
            line-height: 0.9;
            text-shadow: 2px 2px 4px rgba(0,0,0,0.8);
        }

        .cat-link {
            color: #00f2ea;
            text-transform: uppercase;
            font-size: 0.8rem;
            letter-spacing: 2px;
            font-weight: 700;
            margin-top: 10px;
            display: inline-block;
            opacity: 0;
            transform: translateX(-10px);
            transition: all 0.3s ease;
        }

        .cat-card:hover .cat-link {
            opacity: 1;
            transform: translateX(0);
        }
    </style>

    <!-- HERO CAROUSEL -->
    <div id="heroCarousel" class="carousel slide carousel-fade" data-bs-ride="carousel">
        <div class="carousel-inner">
            @foreach($slides as $s)
                <!-- data-bs-interval="3000" hace que cambie cada 3s -->
                <div class="carousel-item {{ $loop->first ? 'active' : '' }}" data-bs-interval="3000">
                    <div style="position: absolute; top:0; left:0; width:100%; height:100%; background: rgba(0,0,0,0.6); z-index: 1;"></div>

                    <img src="{{ asset('img/slide/'.$s->img) }}" class="d-block w-100" style="height: 90vh; object-fit: cover;" alt="Slym-X Banner">

                    <div class="carousel-caption d-flex flex-column justify-content-center align-items-center h-100" style="z-index: 2;">

                        <!-- AQUI ESTÁ EL LOGO SOLICITADO -->
                        <img src="{{ asset('img/profile/slym-x.jpg') }}" alt="Slym-X Logo" class="hero-logo-img rounded-circle">

                        <h2 class="text-uppercase fw-bold mb-3 d-none d-md-block" style="letter-spacing: 4px;">{{ $s->phrase }}</h2>

                        <div class="mt-3">
                            <a href="{{ $s->link }}" class="btn btn-slym btn-lg px-5">Enter The Void</a>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
        <!-- Botones del Slider -->
        <button class="carousel-control-prev" type="button" data-bs-target="#heroCarousel" data-bs-slide="prev" style="z-index: 3;">
            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
        </button>
        <button class="carousel-control-next" type="button" data-bs-target="#heroCarousel" data-bs-slide="next" style="z-index: 3;">
            <span class="carousel-control-next-icon" aria-hidden="true"></span>
        </button>
    </div>

    <!-- CATEGORIES SECTION (DISEÑO "LO 2DO" MEJORADO - GRID ASIMÉTRICO) -->
    <div class="container my-5 py-5">
        <div class="row mb-5">
            <div class="col-12 d-flex justify-content-between align-items-end border-bottom border-secondary pb-3">
                <div>
                    <h6 class="text-primary text-uppercase ls-2 mb-0">Slym-X Series</h6>
                    <h2 class="display-4 fw-bold text-white mb-0">Collections</h2>
                </div>
                <a href="#" class="text-white text-decoration-none d-none d-md-block">View All Categories &rarr;</a>
            </div>
        </div>

        <!-- Contenedor Grid Asimétrico -->
        <div class="cat-grid-container">
            @foreach($categories as $item)
                <!-- Asignamos clase según índice para el grid (0 = Grande, 1 y 2 = Pequeños) -->
                <div class="cat-card cat-item-{{ $loop->index }}">
                    <a href="/{{$item->slug}}" class="d-block w-100 h-100 text-decoration-none">
                        <div class="cat-bg" style="background-image: url('{{ asset('img/category/'.$item->img) }}');"></div>
                        <div class="cat-overlay"></div>
                        <div class="cat-content">
                            <h3 class="cat-name">{{$item->name}}</h3>
                            <span class="cat-link">Explore <i class="ms-1">&rarr;</i></span>
                        </div>
                    </a>
                </div>
                <!-- Limitamos a 3 categorías para mantener el diseño grid perfecto -->
                @if($loop->index == 2) @break @endif
            @endforeach
        </div>
    </div>

    <!-- PRODUCTS SECTION -->
    <div class="container-fluid bg-dark-subtle py-5">
        <div class="container my-5">
            <div class="d-flex justify-content-between align-items-end mb-5">
                <div>
                    <h6 class="text-primary text-uppercase ls-2">New Arrivals</h6>
                    <h2 class="display-5 mb-0 text-white">Latest Drops</h2>
                </div>
                <a href="#" class="btn btn-slym-outline d-none d-md-block">Full Catalogue</a>
            </div>

            <div class="row g-4">
                @foreach($products as $item)
                    <div class="col-sm-6 col-lg-4">
                        <div class="card h-100 product-card bg-black border-secondary">
                            <div class="card-body p-0 position-relative overflow-hidden">
                                <a href="/{{$item->slug}}">
                                    <img src="{{ asset('img/product/'.$item->img) }}" class="img-fluid w-100" style="height: 400px; object-fit: cover; transition: transform 0.5s;" onmouseover="this.style.transform='scale(1.05)'" onmouseout="this.style.transform='scale(1)'" alt="{{$item->name}}">
                                </a>
                                <div class="position-absolute top-0 start-0 p-3">
                                    <span class="badge bg-primary text-black rounded-0 fw-bold">NEW DROP</span>
                                </div>
                            </div>
                            <div class="card-footer bg-transparent border-top border-secondary p-4">
                                <div class="d-flex justify-content-between align-items-start">
                                    <div>
                                        <a href="/{{$item->slug}}" class="text-white text-decoration-none">
                                            <h5 class="mb-1 fw-bold" style="font-size: 1.1rem;">{{$item->name}}</h5>
                                        </a>
                                        <small class="text-muted text-uppercase" style="font-size: 0.75rem; letter-spacing: 1px;">Techwear / Slim Fit</small>
                                    </div>
                                    <span class="text-white fw-light fs-5">${{$item->price}}</span>
                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>

            <div class="text-center mt-5 d-md-none">
                <a href="#" class="btn btn-slym-outline w-100">View All Products</a>
            </div>
        </div>
    </div>
@endsection
