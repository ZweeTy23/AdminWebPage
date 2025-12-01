@extends('layouts.app')

@section('content')
    <div class="container py-5">
        <div class="row justify-content-center">
            <div class="col-lg-10">

                <!-- Main Journal Container -->
                <div class="card shadow-lg border-0" style="background: #121212; color: #e0e0e0;">

                    <!-- Hero Section de la página Blog -->
                    <div class="position-relative">
                        @if($page->img)
                            <img src="{{ asset('img/page/'.$page->img) }}" alt="Journal" class="card-img-top" style="height: 350px; object-fit: cover; opacity: 0.7;">
                        @else
                            <div style="height: 350px; background: #1a1a1a;"></div>
                        @endif

                        <!-- Gradiente para legibilidad -->
                        <div class="position-absolute bottom-0 start-0 w-100 h-100 bg-gradient-to-t from-black via-transparent to-transparent"></div>

                        <div class="position-absolute bottom-0 start-0 p-5">
                            <h1 class="display-3 fw-bold text-uppercase text-white mb-0" style="letter-spacing: 3px; text-shadow: 0 4px 10px rgba(0,0,0,0.8);">
                                {{ $page->title ?? 'The Journal' }} <span style="color: #00f2ea;">//</span>
                            </h1>
                        </div>
                    </div>

                    <div class="card-body p-5">
                        <!-- Texto Superior -->
                        @if($page->texttop)
                            <div class="mb-5 lead text-light" style="opacity: 0.9;">
                                {!! $page->texttop !!}
                            </div>
                        @endif

                        <!-- Lista de Artículos -->
                        <div class="row g-5">
                            @forelse($posts as $post)
                                <div class="col-12">
                                    <div class="card bg-transparent border-0">
                                        <div class="row g-0 align-items-center">
                                            <!-- Imagen del Post -->
                                            <div class="col-md-5">
                                                <a href="{{ url('/blog/'.$post->slug) }}" class="d-block overflow-hidden rounded border border-secondary position-relative group">
                                                    <img src="{{ asset('img/post/'.$post->img) }}"
                                                         class="img-fluid w-100"
                                                         alt="{{ $post->title }}"
                                                         style="height: 280px; object-fit: cover; transition: transform 0.5s;"
                                                         onmouseover="this.style.transform='scale(1.05)'"
                                                         onmouseout="this.style.transform='scale(1)'">
                                                </a>
                                            </div>

                                            <!-- Texto del Post -->
                                            <div class="col-md-7">
                                                <div class="card-body ps-md-4">
                                                    <div class="mb-2">
                                                        <span class="badge bg-dark border border-secondary text-primary rounded-0">LATEST</span>
                                                        <small class="text-muted ms-2">{{ $post->created_at->format('M d, Y') }}</small>
                                                    </div>

                                                    <a href="{{ url('/blog/'.$post->slug) }}" class="text-decoration-none">
                                                        <h2 class="card-title fw-bold text-white mb-3" style="letter-spacing: 1px;">{{ $post->title }}</h2>
                                                    </a>

                                                    <p class="card-text text-muted mb-4">
                                                        {{ Str::limit($post->description, 150) }}
                                                    </p>

                                                    <a href="{{ url('/blog/'.$post->slug) }}" class="btn btn-outline-light rounded-0 text-uppercase fw-bold px-4" style="font-size: 0.8rem; letter-spacing: 2px;">
                                                        Read Story
                                                    </a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <!-- Separador entre posts -->
                                    @if(!$loop->last)
                                        <hr class="my-5 border-secondary opacity-50">
                                    @endif
                                </div>
                            @empty
                                <div class="col-12 text-center py-5">
                                    <p class="text-muted">No entries found in the journal.</p>
                                </div>
                            @endforelse
                        </div>

                        <!-- Texto Inferior -->
                        @if($page->textbottom)
                            <div class="mt-5 pt-4 border-top border-secondary text-muted small">
                                {!! $page->textbottom !!}
                            </div>
                        @endif

                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
