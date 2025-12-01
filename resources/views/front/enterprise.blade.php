@extends('layouts.app')

@section('content')
    <div class="container py-5">
        <div class="row justify-content-center">
            <div class="col-lg-10">
                <div class="card shadow-lg border-0" style="background: #121212; color: #e0e0e0;">

                    <!-- Hero Image -->
                    <div class="position-relative">
                        <img src="{{ asset('img/page/'.$data->img) }}" alt="Enterprise" class="card-img-top" style="height: 400px; object-fit: cover; opacity: 0.8;">
                        <div class="position-absolute bottom-0 start-0 w-100 h-50 bg-gradient-to-t from-black to-transparent"></div>
                        <div class="position-absolute bottom-0 start-0 p-5">
                            <h1 class="display-4 fw-bold text-uppercase text-white mb-0" style="letter-spacing: 2px; text-shadow: 2px 2px 4px rgba(0,0,0,0.8);">
                                The Enterprise
                            </h1>
                            <div style="width: 60px; height: 4px; background: #00f2ea;" class="mt-3"></div>
                        </div>
                    </div>

                    <div class="card-body p-5">
                        <!-- Contenido Superior -->
                        <div class="mb-5 lead text-light" style="line-height: 1.8;">
                            {!! $data->texttop !!}
                        </div>

                        <!-- Divisor Estilizado -->
                        <div class="d-flex align-items-center my-5">
                            <div class="flex-grow-1 border-bottom border-secondary"></div>
                            <div class="px-3 text-muted text-uppercase small fw-bold" style="letter-spacing: 2px;">Our Philosophy</div>
                            <div class="flex-grow-1 border-bottom border-secondary"></div>
                        </div>

                        <!-- Contenido Inferior -->
                        <div class="text-muted">
                            {!! $data->textbottom !!}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
