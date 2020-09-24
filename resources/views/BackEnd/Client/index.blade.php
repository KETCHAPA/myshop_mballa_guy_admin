@extends('BackEnd.template.index')
@section('title', 'Clients')
@section('contentTitle', 'Clients')
@section('contentSubtitle', 'Listes des clients')
@section('path')
<div class="col-lg-6">
    <ol class="breadcrumb pull-right">
        <li class="breadcrumb-item"><a href={{ route('dashboard') }}><i data-feather="home"></i></a></li>
        <li class="breadcrumb-item active">Clients</li>
    </ol>
</div>
@stop

@section('content')
<div id="data-target-js" style="display:none">
{{ $clients }}
</div>
<div class="container-fluid">
    <div class="card">
        <div class="card-header">
            <h5>Listes des clients</h5>
        </div>
        <div class="card-body">
            <div id="batchDelete" class="category-table user-list order-table"></div>
        </div>
    </div>
</div>
@stop

@section('style')
<!-- Flag icon-->
<link rel="stylesheet" type="text/css" href="../assets/css/flag-icon.css">

<!-- jsgrid css-->
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

<!-- Sidebar jquery-->
<script src="../assets/js/sidebar-menu.js"></script>

<!-- Jsgrid js-->
<script src="../assets/js/jsgrid/jsgrid.min.js"></script>
<script src="../assets/js/jsgrid/griddata-users.js"></script>
<script src="../assets/js/jsgrid/jsgrid-users.js"></script>

<!--Customizer admin-->
<script src="../assets/js/admin-customizer.js"></script>

<!-- lazyload js-->
<script src="../assets/js/lazysizes.min.js"></script>

<!--right sidebar js-->
<script src="../assets/js/chat-menu.js"></script>

<!--script admin-->
<script src="../assets/js/admin-script.js"></script>
@stop