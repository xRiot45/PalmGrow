@extends('layouts.vertical', ['title' => 'Page 404 (alt)'])

@section('content')
  <div class="row align-items-center justify-content-center">
    <div class="col-xl-5">
      <div class="card">
        <div class="card-body px-3 py-4">
          <div class="row align-items-center justify-content-center h-100">
            <div class="col-lg-10">
              <div class="mx-auto text-center">
                <img src="/images/404-error.png" alt="" class="img-fluid my-3">
              </div>
              <h3 class="fw-bold text-center lh-base">Ooops! The Page You're Looking For Was Not Found
              </h3>
              <p class="text-muted text-center mt-1 mb-4">Sorry, we couldn't find the page you were
                looking for. We suggest that you return to main sections</p>
              <div class="text-center">
                <a href="{{ route('dashboard.index') }}" class="btn btn-primary">Back To Home</a>
              </div>
            </div>
          </div>
        </div> <!-- end card-body -->
      </div> <!-- end card -->

    </div> <!-- end col -->
  </div> <!-- end row -->
@endsection
