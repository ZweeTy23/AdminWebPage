@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-sm-10">
                <div class="card">
                    <div class="card-body py-5">
                        <h1 class="text-center">{{$post->name}}</h1> {{-- OJO: ¿Es name o title? --}}
                        <img src="/img/post/{{$post->img}}" class="img-fluid mx-auto d-block" alt="">
                        <div class="bg-light p-sm-5 p-1">
                            {!! $post->description !!}
                        </div> {{-- Cerré el div que faltaba cerrar bien --}}
                    </div>
                </div>
            </div>

            <div class="col-sm-10 my-5">
                <h2>Recent Posts</h2>
                <div class="row">
                    @foreach($posts as $item)
                        <div class="col-sm-3 text-center">
                            {{-- ERROR CORREGIDO: Usamos $item, no $post --}}
                            <a href="/blog/{{$item->slug}}" class="text-decoration-none text-dark">
                                <img src="/img/post/{{$item->img}}" class="img-fluid mx-auto d-block mb-2" alt="">
                                <p class="fw-bold">{{$item->name}}</p> {{-- Aquí también $item --}}
                            </a>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
@endsection
