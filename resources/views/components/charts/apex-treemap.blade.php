@extends('layouts.vertical', ['title' => 'Treemap Charts'])

@section('content')

<div class="container">
    <div class="row">
        <div class="col-xl-9">
            <div class="card">
                <div class="card-body">
                    <h5 class="card-title anchor mb-1" id="overview">
                        Overview
                    </h5>

                    <p class="mb-0"><span class="fw-medium">Find the JS file for the following chart at:</span> <code> resources/js/components/apexchart-treemap.js</code></p>
                </div><!-- end card-body -->
            </div><!-- end card -->

            <div class="card">
                <div class="card-body">
                    <h4 class="card-title anchor" id="basic">Basic Treemap</h4>
                    <div dir="ltr">
                        <div id="basic-treemap" class="apex-charts"></div>
                    </div>
                </div>
                <!-- end card body-->
            </div>
            <!-- end card -->

            <div class="card">
                <div class="card-body">
                    <h4 class="card-title anchor" id="multiple">Treemap Multiple Series</h4>
                    <div dir="ltr">
                        <div id="multiple-treemap" class="apex-charts"></div>
                    </div>
                </div>
                <!-- end card body-->
            </div>
            <!-- end card -->

            <div class="card">
                <div class="card-body">
                    <h4 class="card-title anchor" id="distributed">Distributed Treemap</h4>
                    <div dir="ltr">
                        <div id="distributed-treemap" class="apex-charts"></div>
                    </div>
                </div>
                <!-- end card body-->
            </div>
            <!-- end card -->

            <div class="card">
                <div class="card-body">
                    <h4 class="card-title anchor" id="color-range">Color Range Treemap</h4>
                    <div dir="ltr">
                        <div id="color-range-treemap" class="apex-charts"></div>
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
                        <a href="#basic" class="nav-link">Basic</a>
                    </li>
                    <li class="nav-item">
                        <a href="#multiple" class="nav-link">Treemap Multiple Series</a>
                    </li>
                    <li class="nav-item">
                        <a href="#distributed" class="nav-link">Distributed Treemap</a>
                    </li>
                    <li class="nav-item">
                        <a href="#color-range" class="nav-link">Color Range Treemap</a>
                    </li>
                </ul>
            </div>
        </div>
    </div> <!-- end row -->
</div>

@endsection

@section('script-bottom')
@vite(['resources/js/components/apexchart-treemap.js'])
@endsection