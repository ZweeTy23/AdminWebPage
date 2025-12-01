@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-sm-10">
                <div class="card">
                    <div class="card-body py-5">
                        <h1 class="text-center">{{$page->name}}</h1>


                        <div class="bg-light p-sm-5 p-1">
                            {!! $page->texttop !!}
                            <img src="{{ asset('img/page/' . $page->img) }}" class="img-fluid mx-auto d-block" alt="{{$page->name}}">
                            <div class="col-sm-12">
                                <h2>Posts</h2>
                            </div>

                        </div>
                            @foreach($posts as $item)
                        <div class="row my-4 align-items-center">
                            <div class="col-sm-6">
                                <img src="/img/post/{{$item->img}}" alt="{{$item->title}}" class="img-fluid mx-auto d-block mb-3">
                            </div>
                            <div class="col-sm-6">
                                <h3><a href="/blog/{{$item->slug}}" class="text-decoration-none">{{$item->name}}</a></h3>
                                <p>{{$item->description}}</p>
                            </div>
                        </div>
                        @endforeach
                        <div class="bg-light p-sm-5 p-1">
                            {!! $page->textbottom !!}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
