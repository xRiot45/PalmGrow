<!DOCTYPE html>
<html lang="en" class="h-100">

<head>
  @include('layouts/title-meta', ['title' => $title])
  @yield('css')
  @include('layouts/head-css')

  <!-- Load jQuery before toastr.js -->
  <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

  <!-- Toastr CSS -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.css"
    integrity="sha512-vKMx8UnXk60zUwyUnUPM3HbQo8QfmNx7+ltw8Pm5zLusl1XIfwcxo8DbWCqMGKaWeNxWA8yrx5v3SaVpMvR3CA=="
    crossorigin="anonymous" referrerpolicy="no-referrer" />
</head>

<body class="h-100">

  @yield('content')

  <!-- Make sure toastr.js is loaded after jQuery -->
  <script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"
    integrity="sha512-VEd+nq25CkR676O+pLBnDW09R7VQX9Mdiij052gVCp5yVH3jGtH70Ho/UUv4mJDsEdTvqRCFZg0NKGiojGnUCw=="
    crossorigin="anonymous" referrerpolicy="no-referrer"></script>

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
