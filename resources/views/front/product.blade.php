@extends('layouts.app')

@section('content')
    <div class="container py-5">
        <div class="row align-items-center">
            <!-- Imagen del Producto -->
            <div class="col-md-6 mb-5 mb-md-0">
                <div class="position-relative overflow-hidden rounded shadow-lg border border-secondary bg-black">
                    <img src="{{ asset('img/product/'.$product->img) }}" alt="{{$product->name}}" class="img-fluid w-100" style="object-fit: cover; min-height: 500px;">
                    <div class="position-absolute top-0 end-0 p-4">
                        <span class="badge bg-black border border-light text-white rounded-0 px-3 py-2">IN STOCK</span>
                    </div>
                </div>
            </div>

            <!-- Detalles del Producto -->
            <div class="col-md-6 ps-md-5 text-white">
                <div class="mb-3">
                    <small class="text-uppercase text-muted fw-bold" style="letter-spacing: 2px;">Collection / {{$category->name ?? 'Item'}}</small>
                </div>

                <h1 class="display-4 fw-bold text-uppercase mb-2">{{$product->title}}</h1>
                <h2 class="h4 text-muted fw-light mb-4">{{$product->name}}</h2>

                <div class="mb-4 pb-4 border-bottom border-secondary">
                    <span class="display-5 fw-bold" style="color: #00f2ea;">${{ number_format($product->price, 2) }}</span>
                </div>

                <div class="mb-5">
                    <h6 class="text-uppercase text-primary fw-bold mb-3" style="letter-spacing: 1px;">Description</h6>
                    <p class="lead text-light" style="opacity: 0.9;">{{$product->description}}</p>

                    @if($product->details)
                        <div class="mt-4 p-3 bg-dark rounded border border-secondary">
                            <small class="text-muted text-uppercase fw-bold d-block mb-2">Technical Specs</small>
                            <p class="mb-0 small">{{$product->details}}</p>
                        </div>
                    @endif
                </div>

                <div class="row g-3 align-items-center mb-4">
                    <div class="col-auto">
                        <div class="bg-dark text-light px-3 py-2 rounded border border-secondary">
                            <small class="text-uppercase text-muted" style="font-size: 0.7rem;">SKU</small>
                            <div class="fw-mono">{{$product->code ?? 'N/A'}}</div>
                        </div>
                    </div>
                    <div class="col-auto">
                        <div class="bg-dark text-light px-3 py-2 rounded border border-secondary">
                            <small class="text-uppercase text-muted" style="font-size: 0.7rem;">Stock</small>
                            <div class="fw-mono">{{$product->stock}} units</div>
                        </div>
                    </div>
                </div>

                <!-- Fake Add to Cart Button for Aesthetics -->
                <button class="btn btn-lg btn-outline-light rounded-0 w-100 text-uppercase fw-bold py-3" style="letter-spacing: 2px;">
                    Add to Cart (Demo)
                </button>
            </div>
        </div>
    </div>
@endsection
