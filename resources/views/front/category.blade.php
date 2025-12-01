@extends('layouts.app')

@section('content')
    <div class="container py-5">
        <div class="row justify-content-center">
            <div class="col-lg-10">
                <!-- Card Container con estilo oscuro -->
                <div class="card shadow-lg border-0" style="background: #121212; color: #e0e0e0;">

                    <!-- Hero Image de la Categoría -->
                    <div class="position-relative">
                        <!-- CORRECCIÓN: Usamos $category en lugar de $data -->
                        @if($category->img)
                            <img src="{{ asset('img/category/'.$category->img) }}" alt="{{ $category->name }}" class="card-img-top" style="height: 400px; object-fit: cover; opacity: 0.8;">
                        @else
                            <!-- Fallback si no hay imagen -->
                            <div style="height: 400px; background: #222;"></div>
                        @endif

                        <!-- Gradiente y Título -->
                        <div class="position-absolute bottom-0 start-0 w-100 h-50 bg-gradient-to-t from-black to-transparent"></div>
                        <div class="position-absolute bottom-0 start-0 p-5">
                            <h1 class="display-4 fw-bold text-uppercase text-white mb-0" style="letter-spacing: 2px; text-shadow: 2px 2px 4px rgba(0,0,0,0.8);">
                                {{ $category->name }} <span style="color: #00f2ea;">//</span>
                            </h1>
                            <div style="width: 60px; height: 4px; background: #00f2ea;" class="mt-3"></div>
                        </div>
                    </div>

                    <div class="card-body p-5">
                        <!-- Contenido Superior (Descripción) -->
                        <div class="mb-5 lead text-light" style="line-height: 1.8;">
                            {!! $category->texttop !!}
                        </div>

                        <!-- Título de Sección Productos -->
                        <div class="d-flex align-items-center mb-4">
                            <h5 class="text-uppercase text-muted fw-bold m-0" style="letter-spacing: 1px;">Collection Items</h5>
                            <div class="flex-grow-1 border-bottom border-secondary ms-3"></div>
                        </div>

                        <!-- Grid de Productos -->
                        <div class="row g-4">
                            @forelse($category->products as $item)
                                <div class="col-sm-6 col-lg-4">
                                    <div class="card h-100 border-secondary bg-black text-white overflow-hidden shadow-sm product-card">
                                        <div class="position-relative">
                                            <a href="/{{$category->slug}}/{{$item->id}}">
                                                <img src="{{ asset('img/product/' . $item->img) }}"
                                                     alt="{{$item->name}}"
                                                     class="card-img-top w-100"
                                                     style="height: 300px; object-fit: cover; transition: transform 0.5s;"
                                                     onmouseover="this.style.transform='scale(1.05)'"
                                                     onmouseout="this.style.transform='scale(1)'">
                                            </a>
                                            <!-- Badge Precio -->
                                            <div class="position-absolute top-0 end-0 p-2">
                                                <span class="badge bg-black border border-secondary text-primary" style="font-size: 0.9rem;">${{ $item->price }}</span>
                                            </div>
                                        </div>
                                        <div class="card-body p-3">
                                            <h5 class="card-title text-uppercase fw-bold m-0 fs-6">{{$item->name}}</h5>
                                            <a href="/{{$category->slug}}/{{$item->id}}" class="btn btn-sm btn-outline-light rounded-0 w-100 mt-3 text-uppercase" style="border-color: #333;">View Details</a>
                                        </div>
                                    </div>
                                </div>
                            @empty
                                <div class="col-12 text-center py-5">
                                    <p class="text-muted">No products found in this collection yet.</p>
                                </div>
                            @endforelse
                        </div>

                        <!-- Contenido Inferior -->
                        @if($category->textbottom)
                            <div class="d-flex align-items-center my-5">
                                <div class="flex-grow-1 border-bottom border-secondary"></div>
                                <div class="px-3 text-muted text-uppercase small fw-bold" style="letter-spacing: 2px;">More Info</div>
                                <div class="flex-grow-1 border-bottom border-secondary"></div>
                            </div>

                            <div class="text-muted">
                                {!! $category->textbottom !!}
                            </div>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
