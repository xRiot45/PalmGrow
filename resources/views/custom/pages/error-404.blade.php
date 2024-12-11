@extends('layouts.auth', ['title' => 'Page Not Found - 404'])

@section('content')

<div class="d-flex flex-column h-100 p-3">
    <div class="d-flex flex-column flex-grow-1">
        <div class="row h-100">
            <div class="col-xxl-7">
                <div class="row align-items-center justify-content-center h-100">
                    <div class="col-lg-10">
                        <div class="auth-logo mb-3 text-center">
                            <a href="{{ route('dashboard.index') }}" class="logo-dark">
                                <img src="/images/logo-dark.png" height="24" alt="logo dark">
                            </a>

                            <a href="{{ route('dashboard.index') }}" class="logo-light">
                                <img src="/images/logo-light.png" height="24" alt="logo light">
                            </a>
                        </div>
                        <div class="mx-auto text-center">
                            <img src="/images/404-error.png" alt="" class="img-fluid my-3">
                        </div>
                        <h2 class="fw-bold text-center lh-base">Ooops! The Page You're Looking For Was Not Found</h2>
                        <p class="text-muted text-center mt-1 mb-4">Sorry, we couldn't find the page you were looking for. We suggest that you return to main sections</p>
                        <div class="text-center">
                            <a href="{{ route('dashboard.index') }}" class="btn btn-primary">Back To Home</a>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-xxl-5 d-none d-xxl-flex">
                <div class="card h-100 mb-0 overflow-hidden">
                    <div class="d-flex flex-column h-100">
                        <img src="/images/small/img-10.jpg" alt="" class="w-100 h-100">
                    </div>
                </div> <!-- end card -->
            </div>
        </div>
    </div>
</div>

@endsection