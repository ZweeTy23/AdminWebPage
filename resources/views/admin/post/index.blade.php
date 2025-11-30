
@extends('layouts.admin')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            @include('admin.aside')
            <div class="col-md-9">
                <div class="card">
                    <div class="card-header">Blog</div>

                    <div class="card-body py-5">
                        <a href="{{route('post.create')}}" class="btn btn-dark">New Post</a>
                        <table class="table table-striped">
                            <thead>
                            <th>Order</th>
                            <th>Name</th>
                            <th>Action</th>
                            </thead>

                            <tbody>
                            @forelse($posts as $item)
                                <tr>
                                    <td>{{$item->position}}</td>
                                    <td>{{$item->name}}</td>
                                    <td>
                                        <div class="btn-group">
                                        <a href="{{route('post.edit',$item->id)}}" class="btn btn-dark">Edit Post</a>
                                        <form action="{{ route('post.destroy', $item->id) }}" method="POST" style="display:inline-block;">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn btn-danger btn-sm">Delete</button>
                                        </form>
                                        </div>
                                    </td>
                                </tr>
                            @empty
                                <tr><td colspan="3">No Data</td></tr>
                            @endforelse
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
