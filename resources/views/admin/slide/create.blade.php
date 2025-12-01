@extends('layouts.admin')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            @include('admin.aside')
            <div class="col-sm-9">
                <div class="card shadow-lg border-0" style="background: #121212; color: #fff;">
                    <div class="card-header border-bottom border-secondary bg-transparent py-3">
                        <h5 class="m-0 text-uppercase fw-bold" style="letter-spacing: 2px; color: #00f2ea;">
                            Create Slide //
                        </h5>
                    </div>

                    <div class="card-body py-5">
                        <form action="{{route('slide.store', null)}}" method="post" enctype="multipart/form-data">
                            @csrf
                            @method('POST')

                            <!-- Image Upload Section -->
                            <div class="form-group mb-4">
                                <div class="card border-secondary bg-transparent">
                                    <div class="card-body">
                                        <label for="img" class="text-uppercase small text-muted mb-2 fw-bold">Banner Image</label>
                                        <input type="file" name="img" class="form-control bg-dark text-light border-secondary">
                                        <small class="text-muted">Recommended size: 1920x1080px</small>
                                    </div>
                                </div>
                            </div>

                            <!-- Text Content -->
                            <div class="card mb-4 border-secondary bg-transparent">
                                <div class="card-body">
                                    <div class="form-group mb-4">
                                        <label for="phrase" class="text-uppercase small text-muted mb-2 fw-bold">Hero Phrase</label>
                                        <input type="text" name="phrase" class="form-control bg-dark text-light border-secondary" placeholder="Catchy slogan..." maxlength="190">
                                    </div>

                                    <div class="form-group">
                                        <label for="link" class="text-uppercase small text-muted mb-2 fw-bold">Call to Action Link</label>
                                        <input type="url" name="link" class="form-control bg-dark text-light border-secondary" placeholder="https://...">
                                    </div>
                                </div>
                            </div>

                            <!-- Configuration -->
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="form-group mb-4">
                                        <label for="position" class="text-uppercase small text-muted mb-2 fw-bold">Display Order</label>
                                        <input type="number" name="position" class="form-control bg-dark text-light border-secondary" placeholder="1">
                                    </div>
                                </div>
                            </div>

                            <div class="d-grid gap-2 mt-5">
                                <input type="submit" value="ADD SLIDE" class="btn btn-light fw-bold rounded-0 py-3 text-uppercase" style="letter-spacing: 1px;">
                            </div>

                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
