@extends('layouts.admin')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            @include('admin.aside')
            <div class="col-sm-9">
                <div class="card shadow-lg border-0" style="background: #121212; color: #fff;">
                    <div class="card-header border-bottom border-secondary bg-transparent py-3 d-flex justify-content-between align-items-center">
                        <h5 class="m-0 text-uppercase fw-bold" style="letter-spacing: 2px; color: #00f2ea;">
                            Edit Slide //
                        </h5>
                        <span class="badge border border-secondary text-secondary">Order: {{ $slide->position }}</span>
                    </div>

                    <div class="card-body py-5">
                        <form action="{{route('slide.update', $slide)}}" method="post" enctype="multipart/form-data">
                            @csrf
                            @method('PUT')

                            <!-- Image Preview & Upload -->
                            <div class="form-group mb-4">
                                <div class="card border-secondary bg-transparent">
                                    <div class="card-body">
                                        <label for="img" class="text-uppercase small text-muted mb-3 fw-bold">Current Banner</label>

                                        <div class="mb-3 p-1 border border-dark bg-black d-block">
                                            <img src="/img/slide/{{$slide->img}}" class="img-fluid" style="max-height: 200px; width: 100%; object-fit: cover; opacity: 0.8;">
                                        </div>

                                        <label for="img" class="text-muted small">Change Image:</label>
                                        <input type="file" name="img" class="form-control bg-dark text-light border-secondary mt-1">
                                    </div>
                                </div>
                            </div>

                            <!-- Text Content -->
                            <div class="card mb-4 border-secondary bg-transparent">
                                <div class="card-body">
                                    <div class="form-group mb-4">
                                        <label for="phrase" class="text-uppercase small text-muted mb-2 fw-bold">Phrase</label>
                                        <input type="text" name="phrase" class="form-control bg-dark text-light border-secondary" value="{{$slide->phrase}}" maxlength="190">
                                    </div>

                                    <div class="form-group">
                                        <label for="link" class="text-uppercase small text-muted mb-2 fw-bold">Link</label>
                                        <input type="url" name="link" value="{{$slide->link}}" class="form-control bg-dark text-light border-secondary">
                                    </div>
                                </div>
                            </div>

                            <div class="form-group mb-4">
                                <label for="position" class="text-uppercase small text-muted mb-2 fw-bold">Position</label>
                                <input type="number" name="position" value="{{$slide->position}}" class="form-control bg-dark text-light border-secondary">
                            </div>

                            <div class="d-grid gap-2 mt-5">
                                <input type="submit" value="UPDATE SLIDE" class="btn btn-light fw-bold rounded-0 py-3 text-uppercase" style="letter-spacing: 1px;">
                            </div>

                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
