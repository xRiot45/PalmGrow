<!DOCTYPE html>
<html lang="en">

<head>
  @include('layouts/title-meta', ['title' => $title])
  @vite(['node_modules/choices.js/public/assets/styles/choices.min.css'])
  @yield('css')
  @include('layouts/head-css')

  {{-- JQuery Script --}}
  <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

  {{-- Toastr CSS --}}
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.css"
    integrity="sha512-vKMx8UnXk60zUwyUnUPM3HbQo8QfmNx7+ltw8Pm5zLusl1XIfwcxo8DbWCqMGKaWeNxWA8yrx5v3SaVpMvR3CA=="
    crossorigin="anonymous" referrerpolicy="no-referrer" />

  {{-- CKEditor CSS --}}
  <link rel="stylesheet" href="https://cdn.ckeditor.com/ckeditor5/44.1.0/ckeditor5.css" crossorigin>

</head>

<body>

  <div class="wrapper">
    @include('layouts.petugas.partials/topbar', ['title' => $title])
    @include('layouts.petugas.partials/left-sidebar')
    <div class="page-content">
      <div class="container-fluid">
        @yield('content')
      </div>
      @include('layouts.petugas.partials/footer')
    </div>
  </div>

  @include('layouts.petugas.partials/right-sidebar')

  {{-- Toastr JS --}}
  <script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"
    integrity="sha512-VEd+nq25CkR676O+pLBnDW09R7VQX9Mdiij052gVCp5yVH3jGtH70Ho/UUv4mJDsEdTvqRCFZg0NKGiojGnUCw=="
    crossorigin="anonymous" referrerpolicy="no-referrer"></script>

  @stack('js')
  @vite(['resources/js/app.js', 'resources/js/layout.js'])

  {{-- Toast Message Start --}}
  @if (Session::has('success'))
    <script>
      toastr.success('{{ Session::get('success') }}');
    </script>
  @elseif(Session::has('error'))
    <script>
      toastr.error('{{ Session::get('error') }}');
    </script>
  @endif
  {{-- Toast Message End --}}
</body>

</html>
