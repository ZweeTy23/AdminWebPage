
@extends('layouts.admin')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            @include('admin.aside')
            <div class="col-sm-9">
                <div class="card">
                    <div class="card-header">Pages | Edit</div>

                    <div class="card-body py-5">
                        <form action="{{route('page.update', $page)}}" method="post" enctype="multipart/form-data">
                            @csrf
                            @method('PUT')

                            <div class="card mb-3">
                            <div class="card-body">
                                <div class="form-group">
                                    <label for="title">Title:</label>
                                    <input type="text" name="title" class="form-control" value="{{$page->title}}" required>
                                </div>

                                <div class="form-group">
                                    <label for="description">Description:</label>
                                    <textarea  name="description" class="form-control" required>{{$page->description}}</textarea>
                                </div>
                            </div>
                    </div>
                            <div class="form-group my-3">
                                <div class="card">
                                    <div class="card-body">
                                        <label for="img">Image:</label><br>
                                        <img src="/img/page/{{$page->img}}" class="img-fluid">
                                        <input type="file" name="img" class="form-control">
                                    </div>
                                </div>
                            </div>

                            <div class="form-group">
                                <label for="name">Name:</label>
                                <input type="text" name="name" class="form-control" value="{{$page->name}}" maxlength="190">
                            </div>

                            <div class="form-group">
                                <label for="position">Position:</label>
                                <input type="number" name="position" value="{{$page->position}}" class="form-control">
                            </div>

                            <div class="form-group">
                                <label for="texttop">Top Text:</label>
                                <textarea name="texttop" class="form-control">{{$page->texttop}}</textarea>
                            </div>

                            <div class="form-group">
                                <label for="textbottom">Bottom Text:</label>
                                <textarea name="textbottom" class="form-control">{{$page->textbottom}}</textarea>
                            </div>

                            <input type="submit" value="Edit" class="btn btn-dark my-3">

                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
