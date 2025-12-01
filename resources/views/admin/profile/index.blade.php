@extends('layouts.admin')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            @include('admin.aside')

            <div class="col-md-9">

                <div class="card">
                    <div class="card-header">
                        PROFILE
                    </div>
                    <div class="card-body">
                        <!-- Form -->
                        <form action="{{route('profile.update', $profile->id)}}" method="post" enctype="multipart/form-data">
                            @csrf
                            @method('PUT')

                            <div class="card mb-3">
                                <div class="card-body">
                                    <div class="form-group">
                                        <label for="title">Title:</label>
                                        <input type="text" name="title" class="form-control" value="{{$profile->title}}" required>
                                    </div>

                                    <div class="form-group">
                                        <label for="description">Description:</label>
                                        <textarea  name="description" class="form-control" required>{{$profile->description}}</textarea>
                                    </div>
                                </div>
                            </div>



                            <div class="form-group">
                                <label for="company_name">Enterprise Name:</label>
                                <input type="text" name="company_name" class="form-control" value="{{$profile->company_name}}" required>
                            </div>

                            <div class="form-group">
                                <label for="slogan">Slogan:</label>
                                <input type="text" name="slogan" class="form-control" value="{{$profile->slogan}}" required>
                            </div>

                            <div class="form-group row">
                                <div class="col-sm-3">
                                    <label for="phone">Phone Number:</label>
                                    <input type="tel" name="phone" class="form-control" value="{{$profile->phone}}" required>

                                </div>

                                <div class="col-sm-3">
                                    <label for="email">Email:</label>
                                    <input type="email" name="email" class="form-control" value="{{$profile->email}}" required>
                                </div>

                                <div class="col-sm-6">
                                    <label for="direction">Direction:</label>
                                    <input type="text" name="direction" class="form-control" value="{{$profile->direction}}" required>
                                </div>

                                <div class="col-sm-6">
                                    <label for="map">Map:</label>
                                    <textarea name="map" class="form-control"  required>{{$profile->map}}</textarea>
                                </div>

                            </div>



                            <div class="form-group">
                                <label for="facebook">Facebook:</label>
                                <input type="url" name="facebook" class="form-control" value="{{$profile->facebook}}">
                            </div>

                            <div class="form-group">
                                <label for="instagram">Instagram:</label>
                                <input type="url" name="instagram" class="form-control" value="{{$profile->instagram}}">
                            </div>

                            <div class="form-group">
                                <label for="tiktok">Tik Tok:</label>
                                <input type="url" name="tiktok" class="form-control" value="{{$profile->tiktok}}">
                            </div>

                            <div class="form-group my-3">
                                <div class="card">
                                    <div class="card-body">
                                        <label for="logo">Logo:</label>
                                        <img src="/img/profile/{{$profile->logo}}" alt="Logo" width="32" height="32"><br><br>
                                        <input type="file" name="logo" class="form-control">
                                    </div>
                                </div>
                            </div>

                            <div class="form-group my-3">
                                <div class="card">
                                    <div class="card-body">
                                        <label for="seo">Seo:</label><br>
                                        <img src="/img/profile/{{$profile->seo}}" alt="seo" width="48" height="32"><br><br>
                                        <input type="file" name="seo" class="form-control">
                                    </div>
                                </div>
                            </div>

                            <div class="form-group my-3">
                                <div class="card">
                                    <div class="card-body">
                                        <label for="favicon">Favicon:</label><br>
                                        <img src="/img/profile/{{$profile->favicon}}" alt="Favicon" width="32" height="32"><br><br>
                                        <input type="file" name="favicon" class="form-control">
                                    </div>
                                </div>
                            </div>

                            <input type="submit" value="Update" class="btn btn-dark my-3">

                        </form>
                        <!-- //Form -->
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
