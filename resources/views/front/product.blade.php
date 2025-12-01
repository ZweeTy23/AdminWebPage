@extends('layouts.app')
@section('content')
    <div class="container">
        <div class="row justify-content-center align-items-center py-5">
            <div class="col-sm-5">
                <img src="/img/product/{{$product->img}}" alt="" class="img-fluid mx-auto d-block">
            </div>
                <div class="col-sm-5">
                    <h1>{{$product->title}}</h1><hr>
                    <h2>{{$product->name}}</h2>
                    <hr>

                    <p>${{$product->price}}</p>
                   <hr>
                    <p>Stock:{{$product->stock}}</p>
                    <hr>
                    <p>Description: {{$product->description}}</p>
                    <hr>
                    <p>Details: {{$product->details}}</p>
                    <hr>
                    <p>Product Code: {{$product->code}}</p>
                </div>
            </div>
        </div>
@endsection
