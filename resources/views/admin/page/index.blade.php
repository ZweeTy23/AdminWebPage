
@extends('layouts.admin')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            @include('admin.aside')
            <div class="col-md-9">
                <div class="card">
                    <div class="card-header">Pages</div>

                    <div class="card-body py-5">
                        <a href="{{route('page.create')}}" class="btn btn-dark">New Page</a>
                        <table class="table table-striped">
                            <thead>
                            <th>Order</th>
                            <th>Name</th>
                            <th>Action</th>
                            </thead>

                            <tbody>
                            @forelse($pages as $item)
                                <tr>
                                    <td>{{$item->position}}</td>
                                    <td>{{$item->name}}</td>
                                    <td>
                                        <a href="{{route('page.edit',$item->id)}}" class="btn btn-dark">Edit Page</a>
                                        <form action="{{ route('page.destroy', $item->id) }}" method="POST" style="display:inline-block;">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn btn-danger btn-sm">Delete</button>
                                        </form>

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
