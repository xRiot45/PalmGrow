<!DOCTYPE html>
<html lang="en" class="h-100">

<head>
  @include('layouts/title-meta', ['title' => $title])
  @yield('css')
  @include('layouts/head-css')

  <!-- Load jQuery before toastr.js -->
  <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
</head>

<body class="h-100">
  @yield('content')
  @vite(['resources/js/app.js', 'resources/js/layout.js'])
</body>

</html>
