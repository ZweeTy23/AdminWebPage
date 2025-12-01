@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-body py-5">
                        <h1 class="text-center">Our Enteprise</h1>

                        <img src="/img/page/{{$data->img}}" alt="" class="img-fluid mx-auto d-block">
                        <div class="bg-light p-sm-5 p-1">
                        {!! $data->texttop !!}
                        </div>
                        <div class="bg-light p-sm-5 p-1">
                        {!! $data->textbottom !!}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
