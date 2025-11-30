
@extends('layouts.admin')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            @include('admin.aside')
            <div class="col-md-9">
                <div class="card">
                    <div class="card-header">Productos</div>

                    <div class="card-body py-5">
                        <a href="{{route('product.create')}}" class="btn btn-dark">New Product</a>
                        <table class="table table-striped">
                            <thead>
                            <th>Order</th>
                            <th>Name</th>
                            <th>Action</th>
                            </thead>

                            <tbody>
                            @forelse($products as $item)
                                <tr>
                                    <td>{{$item->position}}</td>
                                    <td>{{$item->name}}</td>
                                    <td>
                                        <div class="btn-group">
                                        <a href="{{route('product.edit',$item->id)}}" class="btn btn-dark">Edit Product</a>
                                        <form action="{{ route('product.destroy', $item->id) }}" method="POST" style="display:inline-block;">
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
