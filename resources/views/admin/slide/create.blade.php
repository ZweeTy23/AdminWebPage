
@extends('layouts.admin')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            @include('admin.aside')
            <div class="col-sm-9">
                <div class="card">
                    <div class="card-header">Slides | Create</div>

                    <div class="card-body py-5">
                        <form action="{{route('slide.store', null)}}" method="post" enctype="multipart/form-data">
                        @csrf
                        @method('POST')

                            <div class="form-group my-3">
                                <div class="card">
                                    <div class="card-body">
                                        <label for="img">Image:</label><br>
                                        <input type="file" name="img" class="form-control">
                                    </div>
                                </div>
                            </div>

                            <div class="form-group">
                                <label for="phrase">Phrase:</label>
                                <input type="text" name="phrase" class="form-control" maxlength="190">
                            </div>

                            <div class="form-group">
                                <label for="position">Position:</label>
                                <input type="number" name="position" class="form-control">
                            </div>

                            <div class="form-group">
                                <label for="link">Link:</label>
                                <input type="url" name="link" class="form-control">
                            </div>

                            <input type="submit" value="Save" class="btn btn-dark my-3">

                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
