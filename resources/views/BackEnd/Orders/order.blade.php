@extends('BackEnd.template.index')
@section('title', 'Commandes')
@section('contentTitle', 'Commandes')
@section('contentSubtitle', 'Listes des commandes')
@section('path')
<div class="col-lg-6">
    <ol class="breadcrumb pull-right">
        <li class="breadcrumb-item"><a href={{ route('dashboard') }}><i data-feather="home"></i></a></li>
        <li class="breadcrumb-item active">Ventes</li>
        <li class="breadcrumb-item active">Commandes</li>
    </ol>
</div>
@stop
@section('content')
<div class="container-fluid">
    <div class="row">
        <div class="col-sm-12">
            <div class="card">
                <div class="card-header">
                    <h5>Gestion des commandes</h5>
                </div>
                <div class="card-body order-datatable">
                    <table class="display" id="basic-1">
                        <thead>
                        <tr>
                            <th>Code Commande</th>
                            <th>Photo produit</th>
                            <th>Nom produit</th>
                            <th>Quantite produit</th>
                            <th>Methode paiement</th>
                            <th>Status Commande</th>
                            <th>Date</th>
                            <th>Total</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($orders as $order)
                            <tr>
                                <td>{{ $order->code }}</td>
                                <td>
                                    <div class="d-flex">
                                        @foreach($order->photos as $photo)
                                            <img src={{"../assets/images/backend/products/" . $photo }} alt="" class="img-fluid img-30 mr-2 blur-up lazyloaded">
                                        @endforeach
                                    </div>
                                </td>
                                <td>
                                    @foreach($order->names as $name)
                                        {{ $name }} <br>
                                    @endforeach
                                </td>
                                <td>
                                    @foreach($order->qties as $qty)
                                        ({{ $qty }}) <br>
                                    @endforeach
                                </td>
                                <td>{{ $order->paymentMode }}</td>
                                @if($order->status == 0)
                                    <td><span class="badge badge-info">Non Payee</span></td>
                                @elseif($order->status == 1)
                                    <td><span class="badge badge-warning">Non Livre</span></td>
                                @else
                                    <td><span class="badge badge-success">Paye et livre</span></td>
                                @endif
                                <td>{{ $order->paymentDate }}</td>
                                <td>{{ $order->cart->amount }}</td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
@stop
@section('style')
<!-- Flag icon-->
<link rel="stylesheet" type="text/css" href="../assets/css/flag-icon.css">

<!-- Datatables css-->
<link rel="stylesheet" type="text/css" href="../assets/css/datatables.css">

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

<!-- Datatable js-->
<script src="../assets/js/datatables/jquery.dataTables.min.js"></script>
<script src="../assets/js/datatables/custom-basic.js"></script>

<!--Customizer admin-->
<script src="../assets/js/admin-customizer.js"></script>

<!-- lazyload js-->
<script src="../assets/js/lazysizes.min.js"></script>

<!--right sidebar js-->
<script src="../assets/js/chat-menu.js"></script>

<!--script admin-->
<script src="../assets/js/admin-script.js"></script>
@stop