@extends('layouts.admin')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            @include('admin.aside')
            <div class="col-sm-9">
                <div class="card shadow-lg border-0" style="background: #121212; color: #fff;">
                    <div class="card-header border-bottom border-secondary bg-transparent py-3 d-flex justify-content-between align-items-center">
                        <h5 class="m-0 text-uppercase fw-bold" style="letter-spacing: 2px; color: #00f2ea;">
                            Edit Page //
                        </h5>
                        <span class="badge border border-secondary text-secondary">{{ $page->name }}</span>
                    </div>

                    <div class="card-body py-5">
                        <form action="{{route('page.update', $page)}}" method="post" enctype="multipart/form-data">
                            @csrf
                            @method('PUT')

                            <div class="card mb-4 border-secondary bg-transparent">
                                <div class="card-body">
                                    <div class="form-group mb-4">
                                        <label for="title" class="text-uppercase small text-muted mb-2 fw-bold">Page Title</label>
                                        <input type="text" name="title" class="form-control bg-dark text-light border-secondary" value="{{$page->title}}" required>
                                    </div>

                                    <div class="form-group">
                                        <label for="description" class="text-uppercase small text-muted mb-2 fw-bold">Description</label>
                                        <textarea name="description" class="form-control bg-dark text-light border-secondary" rows="3" required>{{$page->description}}</textarea>
                                    </div>
                                </div>
                            </div>

                            <div class="form-group my-4">
                                <div class="card border-secondary bg-transparent">
                                    <div class="card-body">
                                        <label for="img" class="text-uppercase small text-muted mb-2 fw-bold">Current Image</label>
                                        <div class="mb-3 p-2 border border-dark bg-black rounded d-inline-block">
                                            <img src="/img/page/{{$page->img}}" class="img-fluid" style="max-height: 150px; opacity: 0.8;">
                                        </div>
                                        <input type="file" name="img" class="form-control bg-dark text-light border-secondary">
                                    </div>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group mb-4">
                                        <label for="name" class="text-uppercase small text-muted mb-2 fw-bold">Internal Name</label>
                                        <input type="text" name="name" class="form-control bg-dark text-light border-secondary" value="{{$page->name}}" maxlength="190">
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group mb-4">
                                        <label for="position" class="text-uppercase small text-muted mb-2 fw-bold">Menu Position</label>
                                        <input type="number" name="position" class="form-control bg-dark text-light border-secondary" value="{{$page->position}}">
                                    </div>
                                </div>
                            </div>

                            <div class="form-group mb-4">
                                <label for="texttop" class="text-uppercase small text-muted mb-2 fw-bold">Top Content</label>
                                <div class="text-dark">
                                    <textarea name="texttop" id="texttop" class="form-control">{{$page->texttop}}</textarea>
                                </div>
                            </div>

                            <div class="form-group mb-4">
                                <label for="textbottom" class="text-uppercase small text-muted mb-2 fw-bold">Bottom Content</label>
                                <div class="text-dark">
                                    <textarea name="textbottom" id="textbottom" class="form-control">{{$page->textbottom}}</textarea>
                                </div>
                            </div>

                            <div class="d-grid gap-2 mt-5">
                                <input type="submit" value="UPDATE PAGE" class="btn btn-light fw-bold rounded-0 py-3 text-uppercase" style="letter-spacing: 1px;">
                            </div>

                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

    @push('scripts')
        <script>
            ClassicEditor
                .create(document.querySelector('#texttop'))
                .catch(error => console.error(error));

            ClassicEditor
                .create(document.querySelector('#textbottom'))
                .catch(error => console.error(error));
        </script>
    @endpush
@endsection
