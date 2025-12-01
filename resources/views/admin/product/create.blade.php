@extends('layouts.admin')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            @include('admin.aside')
            <div class="col-sm-9">
                <div class="card shadow-lg border-0" style="background: #121212; color: #fff;">
                    <div class="card-header border-bottom border-secondary bg-transparent py-3">
                        <h5 class="m-0 text-uppercase fw-bold" style="letter-spacing: 2px; color: #00f2ea;">
                            Create Product //
                        </h5>
                    </div>

                    <div class="card-body py-5">
                        <form action="{{route('product.store', null)}}" method="post" enctype="multipart/form-data">
                            @csrf
                            @method('POST')

                            <div class="card mb-4 border-secondary bg-transparent">
                                <div class="card-body">
                                    <div class="form-group mb-4">
                                        <label for="title" class="text-uppercase small text-muted mb-2 fw-bold">Product Title</label>
                                        <input type="text" name="title" class="form-control bg-dark text-light border-secondary" placeholder="Product display name..." required>
                                    </div>

                                    <div class="form-group">
                                        <label for="description" class="text-uppercase small text-muted mb-2 fw-bold">Short Description</label>
                                        <textarea name="description" class="form-control bg-dark text-light border-secondary" rows="3" placeholder="Brief summary for listings..." required></textarea>
                                    </div>
                                </div>
                            </div>

                            <div class="form-group my-4">
                                <div class="card border-secondary bg-transparent">
                                    <div class="card-body">
                                        <label for="img" class="text-uppercase small text-muted mb-2 fw-bold">Main Image</label>
                                        <input type="file" name="img" class="form-control bg-dark text-light border-secondary">
                                    </div>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group mb-4">
                                        <label for="name" class="text-uppercase small text-muted mb-2 fw-bold">Internal Name</label>
                                        <input type="text" name="name" class="form-control bg-dark text-light border-secondary" maxlength="190">
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group mb-4">
                                        <label for="position" class="text-uppercase small text-muted mb-2 fw-bold">Display Order</label>
                                        <input type="number" name="position" class="form-control bg-dark text-light border-secondary">
                                    </div>
                                </div>
                            </div>

                            <div class="form-group mb-4">
                                <label for="details" class="text-uppercase small text-muted mb-2 fw-bold">Full Details</label>
                                <div class="text-dark">
                                    <textarea name="details" class="form-control" rows="5"></textarea>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-sm-4">
                                    <div class="form-group mb-4">
                                        <label for="code" class="text-uppercase small text-muted mb-2 fw-bold">SKU / Code</label>
                                        <input type="text" name="code" class="form-control bg-dark text-light border-secondary" maxlength="100">
                                    </div>
                                </div>

                                <div class="col-sm-4">
                                    <div class="form-group mb-4">
                                        <label for="stock" class="text-uppercase small text-muted mb-2 fw-bold">Stock</label>
                                        <input type="number" name="stock" class="form-control bg-dark text-light border-secondary">
                                    </div>
                                </div>

                                <div class="col-sm-4">
                                    <div class="form-group mb-4">
                                        <label for="price" class="text-uppercase small text-muted mb-2 fw-bold">Price ($)</label>
                                        <input type="text" name="price" class="form-control bg-dark text-light border-secondary">
                                    </div>
                                </div>
                            </div>


                            <div class="d-grid gap-2 mt-5">
                                <input type="submit" value="ADD PRODUCT" class="btn btn-light fw-bold rounded-0 py-3 text-uppercase" style="letter-spacing: 1px;">
                            </div>

                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
