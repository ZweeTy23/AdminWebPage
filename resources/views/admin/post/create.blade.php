
@extends('layouts.admin')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            @include('admin.aside')
            <div class="col-sm-9">
                <div class="card">
                    <div class="card-header">Post | Create</div>

                    <div class="card-body py-5">
                        <form action="{{route('post.store', null)}}" method="post" enctype="multipart/form-data">
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
<!--Can be changed to report-->
                            <div class="form-group">
                                <label for="details">Details:</label>
                                <textarea name="details" class="form-control"></textarea>
                            </div>




                            <input type="submit" value="Save" class="btn btn-dark my-3">

                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
