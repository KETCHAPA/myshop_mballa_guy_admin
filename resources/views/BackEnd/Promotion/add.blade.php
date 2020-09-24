@extends('BackEnd.template.index')
@section('title', 'Nouvelle Promotion')
@section('contentTitle', 'Promotion')
@section('contentSubtitle', 'Formulaire d\'ajout')
@section('path')
<div class="col-lg-6">
    <ol class="breadcrumb pull-right">
        <li class="breadcrumb-item"><a href={{ route('dashboard') }}><i data-feather="home"></i></a></li>
        <li class="breadcrumb-item active">Promotions</li>
        <li class="breadcrumb-item active">Ajout</li>
    </ol>
</div>
@stop
@section('content')
<div class="container-fluid">
    <div class="card tab2-card">
        <div class="card-header">
            <h5>Formulaire</h5>
        </div>
        <div class="card-body">
            <ul class="nav nav-tabs tab-coupon" id="myTab" role="tablist">
                <li class="nav-item"><a class="nav-link active show" id="general-tab" data-toggle="tab" href="#general" role="tab" aria-controls="general" aria-selected="true" data-original-title="" title="">Informations generales</a></li>
            </ul>
            <form  class="needs-validation" action={{ route('storePromotions') }} method="post">
                @csrf
                <div class="tab-content" id="myTabContent">
                    <div class="tab-pane fade active show" id="general" role="tabpanel" aria-labelledby="general-tab">
                        <div class="row">
                            <div class="col-sm-12">
                                <div class="form-group row">
                                    <label for="validationCustom0" class="col-xl-3 col-md-4"><span>*</span> Titre</label>
                                    <input class="form-control col-md-7" name="name" required id="validationCustom0" type="text" required="">
                                </div>
                                <div class="form-group row">
                                    <label for="validationCustom0" class="col-xl-3 col-md-4"><span>*</span> Code</label>
                                    <input class="form-control col-md-7" name="code" required id="validationCustom0" type="text" required="">
                                </div>
                                <div class="form-group row">
                                    <label for="validationCustom0" class="col-xl-3 col-md-4"><span>*</span> Montant</label>
                                    <input class="form-control col-md-7" name="price" required id="validationCustom0" type="text" required="">
                                </div>
                                <div class="form-group row">
                                    <label class="col-xl-3 col-md-4"><span>*</span> Produit</label>
                                    <select name="pro_id" class="custom-select col-md-7" required>
                                        <option value="">--Selectionner--</option>
                                        @foreach($products as $product)
                                            <option value={{ $product->id }}>{{ $product->name }}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="form-group row">
                                    <label class="col-xl-3 col-md-4">Date de debut</label>
                                    <input class="datepicker-here form-control digits col-md-7" name="beginDate" type="text" data-language="en">
                                </div>
                                <div class="form-group row">
                                    <label class="col-xl-3 col-md-4"><span>*</span> Date de fin</label>
                                    <input class="datepicker-here form-control digits col-md-7" required name="expirationDate" type="text" data-language="en">
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="pull-right">
                    <button type="submit" class="btn btn-primary">Enregistrer</button>
                </div>
            </form>
        </div>
    </div>
</div>
@stop
@section('style')
<!-- Ico-font-->
<link rel="stylesheet" type="text/css" href="../assets/css/icofont.css">

<!-- Flag icon-->
<link rel="stylesheet" type="text/css" href="../assets/css/flag-icon.css">

<!-- Datepicker css-->
<link rel="stylesheet" type="text/css" href="../assets/css/date-picker.css">

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

<!--Datepicker jquery-->
<script src="../assets/js/datepicker/datepicker.js"></script>
<script src="../assets/js/datepicker/datepicker.en.js"></script>
<script src="../assets/js/datepicker/datepicker.custom.js"></script>

<!--Customizer admin-->
<script src="../assets/js/admin-customizer.js"></script>

<!-- lazyload js-->
<script src="../assets/js/lazysizes.min.js"></script>

<!--right sidebar js-->
<script src="../assets/js/chat-menu.js"></script>

<!--script admin-->
<script src="../assets/js/admin-script.js"></script>
@stop