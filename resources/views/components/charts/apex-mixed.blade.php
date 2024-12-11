@extends('layouts.vertical', ['title' => 'Apex Mixed Charts'])

@section('content')

<div class="container">
    <div class="row">
        <div class="col-xl-9">
            <div class="card">
                <div class="card-body">
                    <h5 class="card-title anchor mb-1" id="overview">
                        Overview
                    </h5>

                    <p class="mb-0"><span class="fw-medium">Find the JS file for the following chart at:</span> <code> resources/js/components/apexchart-mixed.js</code></p>
                </div><!-- end card-body -->
            </div><!-- end card -->

            <div class="card">
                <div class="card-body">
                    <h4 class="card-title mb-3 anchor" id="line-column">Line & Column Chart</h4>
                    <div dir="ltr">
                        <div id="line-column-mixed" class="apex-charts"></div>
                    </div>
                </div>
                <!-- end card body-->
            </div>
            <!-- end card -->

            <div class="card">
                <div class="card-body">
                    <h4 class="card-title mb-3 anchor" id="multiple-yaxis">Multiple Y-Axis Chart</h4>
                    <div dir="ltr">
                        <div id="multiple-yaxis-mixed" class="apex-charts"></div>
                    </div>
                </div>
                <!-- end card body-->
            </div>
            <!-- end card -->

            <div class="card">
                <div class="card-body">
                    <h4 class="card-title mb-3 anchor" id="line-area">Line & Area Chart</h4>
                    <div dir="ltr">
                        <div id="line-area-mixed" class="apex-charts"></div>
                    </div>
                </div>
                <!-- end card body-->
            </div>
            <!-- end card -->

            <div class="card">
                <div class="card-body">
                    <h4 class="card-title mb-3 anchor" id="all">Line, Column & Area Chart</h4>
                    <div dir="ltr">
                        <div id="all-mixed" class="apex-charts"></div>
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
                        <a href="#line-column" class="nav-link">Line & Column Chart</a>
                    </li>
                    <li class="nav-item">
                        <a href="#multiple-yaxis" class="nav-link">Multiple Y-Axis Chart</a>
                    </li>
                    <li class="nav-item">
                        <a href="#line-area" class="nav-link">Line & Area Chart</a>
                    </li>
                    <li class="nav-item">
                        <a href="#all" class="nav-link">Line, Column & Area Chart</a>
                    </li>
                </ul>
            </div>
        </div>
    </div> <!-- end row -->
</div>

@endsection

@section('script-bottom')
@vite(['resources/js/components/apexchart-mixed.js'])
@endsection