
@extends('layouts.admin')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            @include('admin.aside')
            <div class="col-md-9">
                <div class="card">
                    <div class="card-header">Slides</div>

                    <div class="card-body py-5">
                        <a href="{{route('slide.create')}}" class="btn btn-dark">New Slide</a>
                        <table class="table table-striped">
                            <thead>
                            <th>Order</th>
                            <th>Image</th>
                            <th>Action</th>
                            </thead>

                            <tbody>
                            @forelse($slides as $item)
                                <tr>
                                    <td>{{$item->position}}</td>
                                    <td><img src="/img/slide/{{$item->img}}" width="300"></td>
                                    <td>
                                        <a href="{{route('slide.edit',$item->id)}}" class="btn btn-dark">Edit Slide</a>
                                        <form action="{{ route('slide.destroy', $item->id) }}" method="POST" style="display:inline-block;">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn btn-danger btn-sm">Delete</button>
                                        </form>

                                    </td>
                                </tr>
                            @empty
                            @endforelse
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
