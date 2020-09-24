@extends('BackEnd.template.index')
@section('title', 'Rapports')
@section('contentTitle', 'Rapports')
@section('contentSubtitle', 'Rapports d\'evaluation')
@section('path')
<div class="col-lg-6">
    <ol class="breadcrumb pull-right">
        <li class="breadcrumb-item"><a href={{ route('dashboard') }}><i data-feather="home"></i></a></li>
        <li class="breadcrumb-item active">Rapports</li>
        <li class="breadcrumb-item active">Rapports avances</li>
    </ol>
</div>
@stop
@section('content')
<div class="container-fluid">
    <div class="row">
        <div class="col-xl-8 col-md-6">
            <div class="card">
                <div class="card-header">
                    <h5>Sales Summary</h5>
                </div>
                <div class="card-body sell-graph">
                    <canvas id="myGraph"></canvas>
                </div>
            </div>
        </div>
        <div class="col-xl-4 col-md-6">
            <div class="card report-employee">
                <div class="card-header">
                    <h2>75%</h2>
                    <h6 class="mb-0">Employees Satisfied</h6>
                </div>
                <div class="card-body p-0">
                    <div class="ct-4 flot-chart-container"></div>
                </div>
            </div>
        </div>
        <div class="col-sm-12">
            <div class="card">
                <div class="card-header">
                    <h5>Transfer Report</h5>
                </div>
                <div class="card-body">
                    <div id="basicScenario" class="report-table"></div>
                </div>
            </div>
        </div>
        <div class="col-lg-6">
            <div class="card">
                <div class="card-header">
                    <h5>Expenses</h5>
                </div>
                <div class="card-body expense-chart">
                    <div class="chart-overflow" id="area-chart1"></div>
                </div>
            </div>
        </div>
        <div class="col-lg-6">
            <div class="card">
                <div class="card-header">
                    <h5> Sales / Purchase</h5>
                </div>
                <div class="card-body">
                    <div class="sales-chart"></div>
                </div>
            </div>
        </div>
        <div class="col-sm-12">
            <div class="card">
                <div class="card-header">
                    <h5> Sales / Purchase Return</h5>
                </div>
                <div class="card-body sell-graph">
                    <canvas id="myLineCharts"></canvas>
                </div>
            </div>
        </div>
    </div>
</div>
@stop
@section('style')
<!-- Flag icon-->
<link rel="stylesheet" type="text/css" href="../assets/css/flag-icon.css">

<link rel="stylesheet" type="text/css" href="../assets/css/chartist.css">

<link rel="stylesheet" type="text/css" href="../assets/css/jsgrid.css">

<!-- Bootstrap css-->
<link rel="stylesheet" type="text/css" href="../assets/css/bootstrap.css">

<!-- App css-->
<link rel="stylesheet" type="text/css" href="../assets/css/admin.css">
@stop

@section('script')

<!-- latest jquery-->
<script src="../assets/js/jquery-3.3.1.min.js"></script>

<!-- Bootstrap js-->
<script src="../assets/js/popper.min.js"></script>
<script src="../assets/js/bootstrap.js"></script>

<!-- feather icon js-->
<script src="../assets/js/icons/feather-icon/feather.min.js"></script>
<script src="../assets/js/icons/feather-icon/feather-icon.js"></script>

<!-- Chartist js-->
<script src="../assets/js/chart/chartist/chartist.js"></script>

<!-- Chartjs -->
<script src="../assets/js/chart/chartjs/chart.min.js"></script>

<!-- Sidebar jquery-->
<script src="../assets/js/sidebar-menu.js"></script>

<!-- Jsgrid js-->
<script src="../assets/js/jsgrid/jsgrid.min.js"></script>
<script src="../assets/js/jsgrid/griddata-reports.js"></script>
<script src="../assets/js/jsgrid/jsgrid-reports.js"></script>

<!-- Google chart js-->
<script src="../assets/js/chart/google/google-chart-loader.js"></script>

<!--Customizer admin-->
<script src="../assets/js/admin-customizer.js"></script>

<!-- lazyload js-->
<script src="../assets/js/lazysizes.min.js"></script>

<!--right sidebar js-->
<script src="../assets/js/chat-menu.js"></script>

<!--script admin-->
<script src="../assets/js/admin-script.js"></script>

<!--Report chart-->
<script src="../assets/js/admin-reports.js"></script>
@stop