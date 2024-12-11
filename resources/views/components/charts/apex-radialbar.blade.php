@extends('layouts.vertical', ['title' => 'Apex RadialBar Charts'])

@section('content')

<div class="container">
    <div class="row">
        <div class="col-xl-9">
            <div class="card">
                <div class="card-body">
                    <h5 class="card-title anchor mb-1" id="overview">
                        Overview
                    </h5>

                    <p class="mb-0"><span class="fw-medium">Find the JS file for the following chart at:</span> <code> resources/js/components/apexchart-radialbar.js</code></p>
                </div><!-- end card-body -->
            </div><!-- end card -->

            <div class="card">
                <div class="card-body">
                    <h4 class="card-title mb-4 anchor" id="basic">Basic RadialBar Chart</h4>
                    <div dir="ltr">
                        <div id="basic-radialbar" class="apex-charts"></div>
                    </div>
                </div>
                <!-- end card body-->
            </div>
            <!-- end card -->

            <div class="card">
                <div class="card-body">
                    <h4 class="card-title mb-4 anchor" id="multiple">Multiple RadialBars</h4>
                    <div dir="ltr">
                        <div id="multiple-radialbar" class="apex-charts"></div>
                    </div>
                </div>
                <!-- end card body-->
            </div>
            <!-- end card -->

            <div class="card">
                <div class="card-body">
                    <h4 class="card-title mb-4 anchor" id="circle-angle">Circle Chart - Custom Angle</h4>
                    <div class="text-center" dir="ltr">
                        <div id="circle-angle-radial" class="apex-charts"></div>
                    </div>
                </div>
                <!-- end card body-->
            </div>
            <!-- end card -->

            <div class="card">
                <div class="card-body">
                    <h4 class="card-title mb-4 anchor" id="image">Circle Chart with Image</h4>
                    <div dir="ltr">
                        <div id="image-radial" class="apex-charts"></div>
                    </div>
                </div>
                <!-- end card body-->
            </div>
            <!-- end card -->

            <div class="card">
                <div class="card-body">
                    <h4 class="card-title mb-4 anchor" id="stroked-guage">Stroked Circular Gauge</h4>
                    <div dir="ltr">
                        <div id="stroked-guage-radial" class="apex-charts"></div>
                    </div>
                </div>
                <!-- end card body-->
            </div>
            <!-- end card -->

            <div class="card">
                <div class="card-body">
                    <h4 class="card-title mb-4 anchor" id="gradient">Gradient Circular Chart</h4>
                    <div dir="ltr">
                        <div id="gradient-chart" class="apex-charts"></div>
                    </div>
                </div>
                <!-- end card body-->
            </div>
            <!-- end card -->

            <div class="card">
                <div class="card-body">
                    <h4 class="card-title mb-4 anchor" id="semi-circle">Semi Circle Gauge</h4>
                    <div dir="ltr">
                        <div id="semi-circle-gauge" class="apex-charts"></div>
                    </div>
                </div>
                <!-- end card body-->
            </div>
            <!-- end card -->
        </div> <!-- end col -->

        <div class="col-xl-3">
            <div class="card docs-nav">
                <ul class="nav bg-transparent flex-column">
                    <li class="nav-item">
                        <a href="#overview" class="nav-link">Overview</a>
                    </li>
                    <li class="nav-item">
                        <a href="#basic" class="nav-link">Basic RadialBar Chart</a>
                    </li>
                    <li class="nav-item">
                        <a href="#multiple" class="nav-link">Multiple RadialBars</a>
                    </li>
                    <li class="nav-item">
                        <a href="#circle-angle" class="nav-link">Circle Chart - Custom Angle</a>
                    </li>
                    <li class="nav-item">
                        <a href="#image" class="nav-link">Circle Chart with Image</a>
                    </li>
                    <li class="nav-item">
                        <a href="#stroked-guage" class="nav-link">Stroked Circular Guage</a>
                    </li>
                    <li class="nav-item">
                        <a href="#gradient" class="nav-link">Gradient Circular Chart</a>
                    </li>
                    <li class="nav-item">
                        <a href="#semi-circle" class="nav-link">Semi Circle Gauge</a>
                    </li>
                </ul>
            </div>
        </div>
    </div> <!-- end row -->
</div>

@endsection

@section('script-bottom')
@vite(['resources/js/components/apexchart-radialbar.js'])
@endsection