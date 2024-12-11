@extends('layouts.vertical', ['title' => 'Apex Candlestick Charts'])

@section('content')

<div class="container">
    <div class="row">
        <div class="col-xl-9">
            <div class="card">
                <div class="card-body">
                    <h5 class="card-title anchor mb-1" id="overview">
                        Overview
                    </h5>

                    <p class="mb-0"><span class="fw-medium">Find the JS file for the following chart at:</span> <code> resources/js/components/apexchart-candlestick.js</code></p>
                </div><!-- end card-body -->
            </div><!-- end card -->

            <div class="card">
                <div class="card-body">
                    <h4 class="card-title anchor" id="simple">Simple Candlestick Chart</h4>
                    <div dir="ltr">
                        <div id="simple-candlestick" class="apex-charts"></div>
                    </div>
                </div>
                <!-- end card body-->
            </div>
            <!-- end card -->

            <div class="card">
                <div class="card-body">
                    <h4 class="card-title anchor" id="combo">Combo Candlestick Chart</h4>
                    <div dir="ltr">
                        <div id="combo-candlestick" class="apex-charts"></div>
                        <div id="combo-bar-candlestick" class="apex-charts"></div>
                    </div>
                </div>
                <!-- end card body-->
            </div>
            <!-- end card -->

            <div class="card">
                <div class="card-body">
                    <h4 class="card-title mb-3 anchor" id="x-axis">Category X-Axis</h4>
                    <div dir="ltr">
                        <div id="x-axis-candlestick" class="apex-charts"></div>
                    </div>
                </div>
                <!-- end card body-->
            </div>
            <!-- end card -->

            <div class="card">
                <div class="card-body">
                    <h4 class="card-title mb-3 anchor" id="line">Candlestick with Line</h4>
                    <div dir="ltr">
                        <div id="candlestick-with-line" class="apex-charts"></div>
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
                        <a href="#simple" class="nav-link">Simple Candlestick Chart</a>
                    </li>
                    <li class="nav-item">
                        <a href="#combo" class="nav-link">Combo Candlestick Chart</a>
                    </li>
                    <li class="nav-item">
                        <a href="#x-axis" class="nav-link">Category X-Axis</a>
                    </li>
                    <li class="nav-item">
                        <a href="#line" class="nav-link">Candlestick with Line</a>
                    </li>
                </ul>
            </div>
        </div>
    </div> <!-- end row -->
</div>

@endsection

@section('script-bottom')
<script src="https://apexcharts.com/samples/assets/ohlc.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/dayjs/1.8.17/dayjs.min.js"></script>
@vite(['resources/js/components/apexchart-candlestick.js'])
@endsection