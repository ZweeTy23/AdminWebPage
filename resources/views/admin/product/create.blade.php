
@extends('layouts.admin')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            @include('admin.aside')
            <div class="col-sm-9">
                <div class="card">
                    <div class="card-header">Products | Create</div>

                    <div class="card-body py-5">
                        <form action="{{route('product.store', null)}}" method="post" enctype="multipart/form-data">
                        @csrf
                        @method('POST')

                            <div class="card mb-3">
                                <div class="card-body">
                                    <div class="form-group">
                                        <label for="title">Title:</label>
                                        <input type="text" name="title" class="form-control" required>
                                    </div>

                                    <div class="form-group">
                                        <label for="description">Description:</label>
                                        <textarea  name="description" class="form-control" required></textarea>
                                    </div>
                                </div>
                            </div>

                            <div class="form-group my-3">
                                <div class="card">
                                    <div class="card-body">
                                        <label for="img">Image:</label><br>
                                        <input type="file" name="img" class="form-control">
                                    </div>
                                </div>
                            </div>

                            <div class="form-group">
                                <label for="name">Name:</label>
                                <input type="text" name="name" class="form-control" maxlength="190">
                            </div>

                            <div class="form-group">
                                <label for="position">Position:</label>
                                <input type="number" name="position" class="form-control">
                            </div>

                            <div class="form-group">
                                <label for="details">Details:</label>
                                <textarea name="details" class="form-control"></textarea>
                            </div>

                            <div class="form-group">
                                <div class="col-sm-4">
                                    <label for="code">Code:</label>
                                    <input type="text" name="code" class="form-control" maxlength="100">
                                </div>

                                <div class="col-sm-4">
                                    <label for="stock">Stock:</label>
                                    <input type="stock" name="stock" class="form-control">
                                </div>

                                <div class="col-sm-4">
                                    <label for="price">Price:</label>
                                    <input type="text" name="price" class="form-control">
                                </div>
                            </div>


                            <input type="submit" value="Save" class="btn btn-dark my-3">

                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
