@extends('layouts.vertical', ['title' => 'Apex Line Charts'])

@section('content')

<div class="container">
    <div class="row">
        <div class="col-xl-9">
            <div class="card">
                <div class="card-body">
                    <h5 class="card-title anchor" id="overview">
                        Overview
                    </h5>
                    <p class="mb-0"><span class="fw-medium">Find the JS file for the following chart at:</span> <code> resources/js/components/apexchart-line.js</code></p>
                </div><!-- end card-body -->
            </div><!-- end card -->

            <div class="card">
                <div class="card-body">
                    <h4 class="card-title mb-3 anchor" id="simple">Simple line chart</h4>
                    <div dir="ltr">
                        <div id="line-chart" class="apex-charts"></div>
                    </div>
                </div>
                <!-- end card body-->
            </div>
            <!-- end card -->

            <div class="card">
                <div class="card-body">
                    <h4 class="card-title mb-3 anchor" id="datalabel">Line with Data Labels</h4>
                    <div dir="ltr">
                        <div id="line-chart-datalabel" class="apex-charts"></div>
                    </div>
                </div>
                <!-- end card body-->
            </div>
            <!-- end card -->

            <div class="card">
                <div class="card-body">
                    <h4 class="card-title mb-3 anchor" id="zoomable">Zoomable Timeseries</h4>
                    <div dir="ltr">
                        <div id="line-chart-zoomable" class="apex-charts"></div>
                    </div>
                </div>
                <!-- end card body-->
            </div>
            <!-- end card -->

            <div class="card">
                <div class="card-body">
                    <h4 class="card-title mb-3 anchor" id="syncing">Syncing charts</h4>
                    <div id="line-chart-syncing2"></div>
                    <div dir="ltr">
                        <div id="line-chart-syncing" class="apex-charts"></div>
                    </div>
                </div>
                <!-- end card body-->
            </div>
            <!-- end card -->

            <div class="card">
                <div class="card-body">
                    <h4 class="card-title mb-3 anchor" id="missing">Missing / Null values</h4>
                    <div dir="ltr">
                        <div id="line-chart-missing" class="apex-charts"></div>
                    </div>
                </div>
                <!-- end card body-->
            </div>
            <!-- end card -->

            <div class="card">
                <div class="card-body">
                    <h4 class="card-title mb-3 anchor" id="dashed">Dashed Line Chart</h4>
                    <div dir="ltr">
                        <div id="line-chart-dashed" class="apex-charts"></div>
                    </div>
                </div>
                <!-- end card body-->
            </div>
            <!-- end card -->

            <div class="card">
                <div class="card-body">
                    <h4 class="card-title mb-3 anchor" id="stepline">Stepline Chart</h4>
                    <div dir="ltr">
                        <div id="line-chart-stepline" class="apex-charts"></div>
                    </div>
                </div>
                <!-- end card body-->
            </div>
            <!-- end card -->

            <div class="card">
                <div class="card-body">
                    <h4 class="card-title mb-3 anchor" id="realtime">Realtime Chart</h4>
                    <div dir="ltr">
                        <div id="line-chart-realtime" class="apex-charts"></div>
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
                        <a href="#simple" class="nav-link">Simple line chart</a>
                    </li>
                    <li class="nav-item">
                        <a href="#datalabel" class="nav-link">Line with Data Labels</a>
                    </li>
                    <li class="nav-item">
                        <a href="#zoomable" class="nav-link">Zoomable Timeseries</a>
                    </li>
                    <li class="nav-item">
                        <a href="#syncing" class="nav-link">Syncing charts</a>
                    </li>
                    <li class="nav-item">
                        <a href="#missing" class="nav-link">Missing / Null values</a>
                    </li>
                    <li class="nav-item">
                        <a href="#dashed" class="nav-link">Dashed Line Chart</a>
                    </li>
                    <li class="nav-item">
                        <a href="#stepline" class="nav-link">Stepline Chart</a>
                    </li>
                    <li class="nav-item">
                        <a href="#brush" class="nav-link">Brush Chart</a>
                    </li>
                    <li class="nav-item">
                        <a href="#realtime" class="nav-link">Realtime Chart</a>
                    </li>
                </ul>
            </div>
        </div>
    </div> <!-- end row -->
</div>

@endsection

@section('script-bottom')
<script src="https://apexcharts.com/samples/assets/stock-prices.js"></script>
<script src="https://apexcharts.com/samples/assets/irregular-data-series.js"></script>
@vite(['resources/js/components/apexchart-line.js'])
@endsection
