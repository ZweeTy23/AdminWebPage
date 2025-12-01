@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-sm-10">
                <div class="card">
                    <div class="card-body py-5">
                        <h1 class="text-center">{{$category->name}}</h1>

                        <img src="/img/category/{{$category->img}}" alt="" class="img-fluid mx-auto d-block">



                        <div class="bg-light p-sm-5 p-1">
                            {!! $category->texttop !!}
                        </div>
                        <div class="row">
                            <div class="col-sm-12">
                                <h2>Products</h2>
                            </div>
                            @foreach($category->products as $item)
                                <div class="col-sm-4">
                                    <div class="card my-5">
                                        <a href="/{{$category->slug}}/{{$item->id}}">
                                            <img src="{{ asset('img/product/' . $item->img) }}" alt="{{$item->name}}" class="card-img-top img-fluid mx-auto d-block mb-3">
                                        </a>
                                        <div class="card-body text-center">
                                            <p>${{$item->price}}</p>

                                            <a href="/{{$category->slug}}/{{$item->id}}" class="btn btn-dark d-block">{{$item->name}}</a>
                                        </div>
                                    </div>
                                </div>
                            @endforeach
                        </div>

                        <div class="bg-light p-sm-5 p-1">
                            {!! $category->textbottom !!}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
