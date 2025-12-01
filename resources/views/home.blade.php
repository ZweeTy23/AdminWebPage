@extends('layouts.admin')

@section('content')
    <div class="container">
        <div class="row justify-content-center align-items-center" style="min-height: 60vh;">
            <div class="col-md-8">
                <div class="card shadow-lg border-0" style="background: #121212; color: #fff;">
                    <div class="card-header border-bottom border-secondary bg-transparent py-3">
                        <h5 class="m-0 text-uppercase fw-bold" style="letter-spacing: 2px;">
                            Dashboard <span style="color: #00f2ea;">//</span>
                        </h5>
                    </div>

                    <div class="card-body py-5 text-center">
                        <div class="mb-5">
                            <h1 class="display-4 fw-bold mb-3">WELCOME BACK</h1>
                            <p class="text-muted lead">System ready. Access the control panel to manage your content.</p>
                        </div>

                        <div class="d-grid gap-3 d-sm-flex justify-content-sm-center">
                            <a href="{{ route('profile.index') }}" class="btn btn-light btn-lg rounded-0 px-5 fw-bold text-uppercase" style="letter-spacing: 2px;">
                                Enter Administration
                            </a>
                            <a href="{{ url('/') }}" target="_blank" class="btn btn-outline-secondary btn-lg rounded-0 px-5 fw-bold text-uppercase" style="letter-spacing: 2px;">
                                View Website
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
