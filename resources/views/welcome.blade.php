@extends('layouts.app')

@section('content')
    <div class="container">
        <div id="carouselExampleCaptions" class="carousel slide">
            <div class="carousel-indicators">
                @foreach($slides as $s)
                    @if($loop->index == 0)
                        <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Slide 1"></button>
                    @else
                        <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="{{$loop->index}}" aria-label="Slide {{$loop->index}}"></button>
                    @endif
                @endforeach


            </div>
            <div class="carousel-inner">
                @foreach($slides as $s)
                    @if($loop->index == 0)
                        <div class="carousel-item active">
                            <img src="img/slide/{{$s->img}}" class="d-block w-100" alt="...">
                            <div class="carousel-caption d-none d-md-block">
                                <h5>{{$s->phrase}}</h5>
                                <p><a href="{{$s->link}}" class="btn btn-light rounded-pill px-5">See More</a></p>
                            </div>
                        </div>
                    @else
                        <div class="carousel-item">
                            <img src="img/slide/{{$s->img}}" class="d-block w-100" alt="...">
                            <div class="carousel-caption d-none d-md-block">
                                <h5>{{$s->phrase}}</h5>
                                <p><a href="{{$s->link}}" class="btn btn-light rounded-pill px-5">See More</a>.</p>
                            </div>
                        </div>
                    @endif
                @endforeach


            </div>
            <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide="prev">
                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                <span class="visually-hidden">Previous</span>
            </button>
            <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide="next">
                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                <span class="visually-hidden">Next</span>
            </button>
        </div>
    </div>
    <div class="container my-5 py-5">
        <div class="row justify-content-center">
            <div class="com-sm-12">
                <h2 class="text-center border-bottom-1 my-3 py-3">Top Categories</h2>
            </div>
            @foreach($categories as $item)

                <div class="col-sm-4">
                    <div class="card">
                        <div class="card-body">
                            <img src="img/category/{{$item->img}}" alt="" class="img-fluid">
                            <a href="/{{$item->slug}}" class="btn btn-light d-block outline-1">{{$item->name}}</a>
                        </div>
                    </div>
                </div>

            @endforeach
        </div>
    </div>

    <div class="container my-5 py-5">
        <div class="row justify-content-center">
            <div class="com-sm-12">
                <h2 class="text-center border-bottom my-3 py-3">Most Value Products</h2>
            </div>
            @foreach($products as $item)

                <div class="col-sm-4">
                    <div class="card">
                        <div class="card-body text-center" >
                            <img src="img/products/{{$item->img}}" alt="" class="img-fluid">
                            <p>${{$item->price}}</p>
                            <a href="/{{$item->slug}}" class="btn btn-light d-block outline-1">{{$item->name}}</a>
                        </div>
                    </div>
                </div>

            @endforeach
        </div>
    </div>
@endsection
