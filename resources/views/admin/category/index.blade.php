
@extends('layouts.admin')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            @include('admin.aside')
            <div class="col-md-9">
                <div class="card">
                    <div class="card-header">Categories</div>

                    <div class="card-body py-5">
                        <a href="{{route('category.create')}}" class="btn btn-dark">New Category</a>
                        <table class="table table-striped">
                            <thead>
                            <th>Order</th>
                            <th>Name</th>
                            <th>Action</th>
                            </thead>

                            <tbody>
                            @forelse($categories as $item)
                                <tr>
                                    <td>{{$item->position}}</td>
                                    <td>{{$item->name}}</td>
                                    <td>
                                        <div class="btn-group">
                                            <a href="{{route('category.show',$item->id)}}" class="btn btn-dark">Products</a>
                                        <a href="{{route('category.edit',$item->id)}}" class="btn btn-dark">Edit Category</a>
                                        <form action="{{ route('category.destroy', $item->id) }}" method="POST" style="display:inline-block;">
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
