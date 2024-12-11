<!DOCTYPE html>
<html lang="en" class="h-100">

<head>
    @include('layouts.partials/title-meta', ['title' => $title])
    @yield('css')
    @include('layouts.partials/head-css')
</head>

<body class="h-100">

@yield('content')

@include("layouts.partials/footer-scripts")
@vite(['resources/js/app.js','resources/js/layout.js'])

</body>

</html>
