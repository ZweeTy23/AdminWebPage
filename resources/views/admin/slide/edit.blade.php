
@extends('layouts.admin')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            @include('admin.aside')
            <div class="col-sm-9">
                <div class="card">
                    <div class="card-header">Slides | Edit</div>

                    <div class="card-body py-5">
                        <form action="{{route('slide.update', $slide)}}" method="post" enctype="multipart/form-data">
                            @csrf
                            @method('PUT')

                            <div class="form-group my-3">
                                <div class="card">
                                    <div class="card-body">
                                        <label for="img">Image:</label><br>
                                        <img src="/img/slide/{{$slide->img}}" class="img-fluid">
                                        <input type="file" name="img" class="form-control">
                                    </div>
                                </div>
                            </div>

                            <div class="form-group">
                                <label for="phrase">Phrase:</label>
                                <input type="text" name="phrase" class="form-control" value="{{$slide->phrase}}" maxlength="190">
                            </div>

                            <div class="form-group">
                                <label for="position">Position:</label>
                                <input type="number" name="position" value="{{$slide->position}}" class="form-control">
                            </div>

                            <div class="form-group">
                                <label for="link">Link:</label>
                                <input type="url" name="link" value="{{$slide->link}}" class="form-control">
                            </div>

                            <input type="submit" value="Edit" class="btn btn-dark my-3">

                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
