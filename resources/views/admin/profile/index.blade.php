@extends('layouts.admin')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            @include('admin.aside')

            <div class="col-md-9">
                <div class="card shadow-lg border-0" style="background: #121212; color: #fff;">
                    <div class="card-header border-bottom border-secondary bg-transparent py-3">
                        <h5 class="m-0 text-uppercase fw-bold" style="letter-spacing: 2px; color: #00f2ea;">
                            Company Profile //
                        </h5>
                    </div>

                    <div class="card-body py-5">
                        <!-- Form -->
                        <form action="{{route('profile.update', $profile->id)}}" method="post" enctype="multipart/form-data">
                            @csrf
                            @method('PUT')

                            <!-- Sección Principal -->
                            <div class="card mb-4 border-secondary bg-transparent">
                                <div class="card-header bg-dark border-secondary text-uppercase text-muted small fw-bold">
                                    General Information
                                </div>
                                <div class="card-body">
                                    <div class="form-group mb-4">
                                        <label for="title" class="text-uppercase small text-muted mb-2 fw-bold">Site Title</label>
                                        <input type="text" name="title" class="form-control bg-dark text-light border-secondary" value="{{$profile->title}}" required>
                                    </div>

                                    <div class="form-group mb-4">
                                        <label for="description" class="text-uppercase small text-muted mb-2 fw-bold">Meta Description</label>
                                        <textarea name="description" class="form-control bg-dark text-light border-secondary" rows="3" required>{{$profile->description}}</textarea>
                                    </div>
                                </div>
                            </div>

                            <!-- Identidad de Marca -->
                            <div class="row mb-4">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="company_name" class="text-uppercase small text-muted mb-2 fw-bold">Enterprise Name</label>
                                        <input type="text" name="company_name" class="form-control bg-dark text-light border-secondary" value="{{$profile->company_name}}" required>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="slogan" class="text-uppercase small text-muted mb-2 fw-bold">Slogan</label>
                                        <input type="text" name="slogan" class="form-control bg-dark text-light border-secondary" value="{{$profile->slogan}}" required>
                                    </div>
                                </div>
                            </div>

                            <!-- Contacto y Ubicación -->
                            <div class="card mb-4 border-secondary bg-transparent">
                                <div class="card-header bg-dark border-secondary text-uppercase text-muted small fw-bold">
                                    Contact & Location
                                </div>
                                <div class="card-body">
                                    <div class="row mb-4">
                                        <div class="col-sm-6 mb-3 mb-sm-0">
                                            <label for="phone" class="text-uppercase small text-muted mb-2 fw-bold">Phone Number</label>
                                            <input type="tel" name="phone" class="form-control bg-dark text-light border-secondary" value="{{$profile->phone}}" required>
                                        </div>
                                        <div class="col-sm-6">
                                            <label for="email" class="text-uppercase small text-muted mb-2 fw-bold">Email Address</label>
                                            <input type="email" name="email" class="form-control bg-dark text-light border-secondary" value="{{$profile->email}}" required>
                                        </div>
                                    </div>

                                    <div class="form-group mb-4">
                                        <label for="direction" class="text-uppercase small text-muted mb-2 fw-bold">Physical Address</label>
                                        <input type="text" name="direction" class="form-control bg-dark text-light border-secondary" value="{{$profile->direction}}" required>
                                    </div>

                                    <div class="form-group">
                                        <label for="map" class="text-uppercase small text-muted mb-2 fw-bold">Google Map Embed Code</label>
                                        <textarea name="map" class="form-control bg-dark text-light border-secondary" rows="3" required>{{$profile->map}}</textarea>
                                        <small class="text-muted">Paste the &lt;iframe&gt; code here.</small>
                                    </div>
                                </div>
                            </div>

                            <!-- Redes Sociales -->
                            <div class="card mb-4 border-secondary bg-transparent">
                                <div class="card-header bg-dark border-secondary text-uppercase text-muted small fw-bold">
                                    Social Media Links
                                </div>
                                <div class="card-body">
                                    <div class="input-group mb-3">
                                        <span class="input-group-text bg-dark border-secondary text-light"><i class="bi bi-facebook"></i> FB</span>
                                        <input type="url" name="facebook" class="form-control bg-dark text-light border-secondary" value="{{$profile->facebook}}">
                                    </div>

                                    <div class="input-group mb-3">
                                        <span class="input-group-text bg-dark border-secondary text-light"><i class="bi bi-instagram"></i> IG</span>
                                        <input type="url" name="instagram" class="form-control bg-dark text-light border-secondary" value="{{$profile->instagram}}">
                                    </div>

                                    <div class="input-group">
                                        <span class="input-group-text bg-dark border-secondary text-light"><i class="bi bi-tiktok"></i> TK</span>
                                        <input type="url" name="tiktok" class="form-control bg-dark text-light border-secondary" value="{{$profile->tiktok}}">
                                    </div>
                                </div>
                            </div>

                            <!-- Branding Assets -->
                            <div class="row">
                                <div class="col-md-4">
                                    <div class="card border-secondary bg-transparent h-100">
                                        <div class="card-body text-center">
                                            <label for="logo" class="text-uppercase small text-muted mb-3 fw-bold d-block">Logo</label>
                                            <div class="mb-3 p-3 border border-dark bg-black rounded d-inline-block">
                                                <img src="/img/profile/{{$profile->logo}}" alt="Logo" style="max-height: 50px; max-width: 100%;">
                                            </div>
                                            <input type="file" name="logo" class="form-control bg-dark text-light border-secondary">
                                        </div>
                                    </div>
                                </div>

                                <div class="col-md-4">
                                    <div class="card border-secondary bg-transparent h-100">
                                        <div class="card-body text-center">
                                            <label for="seo" class="text-uppercase small text-muted mb-3 fw-bold d-block">SEO Image</label>
                                            <div class="mb-3 p-3 border border-dark bg-black rounded d-inline-block">
                                                <img src="/img/profile/{{$profile->seo}}" alt="SEO" style="max-height: 50px; max-width: 100%;">
                                            </div>
                                            <input type="file" name="seo" class="form-control bg-dark text-light border-secondary">
                                        </div>
                                    </div>
                                </div>

                                <div class="col-md-4">
                                    <div class="card border-secondary bg-transparent h-100">
                                        <div class="card-body text-center">
                                            <label for="favicon" class="text-uppercase small text-muted mb-3 fw-bold d-block">Favicon</label>
                                            <div class="mb-3 p-3 border border-dark bg-black rounded d-inline-block">
                                                <img src="/img/profile/{{$profile->favicon}}" alt="Favicon" style="max-height: 32px; max-width: 32px;">
                                            </div>
                                            <input type="file" name="favicon" class="form-control bg-dark text-light border-secondary">
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="d-grid gap-2 mt-5">
                                <input type="submit" value="UPDATE PROFILE" class="btn btn-light fw-bold rounded-0 py-3 text-uppercase" style="letter-spacing: 1px;">
                            </div>

                        </form>
                        <!-- //Form -->
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
