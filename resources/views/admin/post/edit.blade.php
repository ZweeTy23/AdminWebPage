
@extends('layouts.admin')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            @include('admin.aside')
            <div class="col-sm-9">
                <div class="card">
                    <div class="card-header">Post | Edit</div>

                    <div class="card-body py-5">
                        <form action="{{route('post.update', $post)}}" method="post" enctype="multipart/form-data">
                            @csrf
                            @method('PUT')

                            <div class="card mb-3">
                            <div class="card-body">
                                <div class="form-group">
                                    <label for="title">Title:</label>
                                    <input type="text" name="title" class="form-control" value="{{$post->title}}" required>
                                </div>

                                <div class="form-group">
                                    <label for="description">Description:</label>
                                    <textarea  name="description" class="form-control" required>{{$post->description}}</textarea>
                                </div>
                            </div>
                    </div>
                            <div class="form-group my-3">
                                <div class="card">
                                    <div class="card-body">
                                        <label for="img">Image:</label><br>
                                        <img src="/img/post/{{$post->img}}" class="img-fluid">
                                        <input type="file" name="img" class="form-control">
                                    </div>
                                </div>
                            </div>

                            <div class="form-group">
                                <label for="name">Name:</label>
                                <input type="text" name="name" class="form-control" value="{{$post->name}}" maxlength="190">
                            </div>

                            <div class="form-group">
                                <label for="position">Position:</label>
                                <input type="number" name="position" value="{{$post->position}}" class="form-control">
                            </div>

                            <div class="form-group">
                                <label for="details">Details:</label>
                                <textarea name="details" class="form-control">gi{{$post->details}}</textarea>
                            </div>



                            <input type="submit" value="Edit" class="btn btn-dark my-3">

                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
