@extends('BackEnd.template.index')
@section('title', 'Nouvel employe')
@section('contentTitle', 'Employes')
@section('contentSubtitle', 'Formulaire d\'ajout')
@section('path')
<div class="col-lg-6">
    <ol class="breadcrumb pull-right">
        <li class="breadcrumb-item"><a href={{ route('dashboard') }}><i data-feather="home"></i></a></li>
        <li class="breadcrumb-item active">Employes</li>
        <li class="breadcrumb-item active">Ajout</li>
    </ol>
</div>
@stop

@section('content')
<div class="container-fluid">
    <div class="row">
        <div class="col-sm-12">
            <div class="card tab2-card">
                <div class="card-header">
                    <h5> Formulaire d'ajout</h5>
                </div>
                <div class="card-body">
                    <ul class="nav nav-tabs tab-coupon" id="myTab" role="tablist">
                        <li class="nav-item"><a class="nav-link active show" id="account-tab" data-toggle="tab" href="#account" role="tab" aria-controls="account" aria-selected="true" data-original-title="" title="">Informations personnelles</a></li>
                    </ul>
                    <form enctype="multipart/form-data" class="needs-validation user-add" action= {{ route('storeAdmin') }} method="post">
                        @csrf
                        <div class="tab-content" id="myTabContent">
                            <div class="tab-pane fade active show" id="account" role="tabpanel" aria-labelledby="account-tab">
                                <div class="form-group row">
                                    <label for="validationCustom0" class="col-xl-3 col-md-4"><span>*</span> Nom</label>
                                    <input class="form-control col-xl-8 col-md-7" name="firstname" required id="validationCustom0" type="text"  >
                                </div>
                                <div class="form-group row">
                                    <label for="validationCustom1" class="col-xl-3 col-md-4"><span>*</span> Prenom</label>
                                    <input class="form-control col-xl-8 col-md-7" name="lastname" required id="validationCustom1" type="text"  >
                                </div>
                                <div class="form-group row">
                                    <label for="validationCustom2" class="col-xl-3 col-md-4"><span>*</span> Email</label>
                                    <input class="form-control col-xl-8 col-md-7" name="email" required id="validationCustom2" type="email"  >
                                </div>
                                <div class="form-group row">
                                    <label for="validationCustom2" class="col-xl-3 col-md-4"><span>*</span> Telphone</label>
                                    <input class="form-control col-xl-8 col-md-7" name="phone" required id="validationCustom2" type="text"  >
                                </div>
                                <div class="form-group row">
                                    <label for="validationCustom2" class="col-xl-3 col-md-4"><span>*</span> Nom d'utilisateur</label>
                                    <input class="form-control col-xl-8 col-md-7" name="login" required id="validationCustom2" type="text"  >
                                </div>
                                <div class="form-group row">
                                    <label for="validationCustom3" class="col-xl-3 col-md-4"><span>*</span> Mot de passe</label>
                                    <input class="form-control col-xl-8 col-md-7" name="password" required id="validationCustom3" type="password"  >
                                </div>
                                <div class="form-group row">
                                    <label for="validationCustom4" class="col-xl-3 col-md-4"><span>*</span> Confirmation mot de passe</label>
                                    <input class="form-control col-xl-8 col-md-7" name="cpassword" required id="validationCustom4" type="password"  >
                                </div>
                                <div class="form-group row">
                                    <label for="validationCustom3" class="col-xl-3 col-md-4"><span>*</span> Rue</label>
                                    <input class="form-control col-xl-8 col-md-7" name="street" required id="validationCustom3" type="text"  >
                                </div>
                                <div class="form-group row">
                                    <label for="validationCustom4" class="col-xl-3 col-md-4"><span>*</span> Poste</label>
                                    <select name="isAdmin" class="form-control col-xl-8 col-md-7" required>
                                        <option value="">--Select--</option>
                                        <option value="1">Administrateur</option>
                                        <option value="2">Super Administrateur</option>
                                    </select>
                                </div>
                                <div class="form-group row col-12">
                                    <input type="file" name="photo" />
                                </div>
                                <div class="form-group row">
                                <label class="col-form-label col-3"><span>*</span> Genre</label>
                                <div class="m-checkbox-inline mb-0 custom-radio-ml d-flex radio-animated">
                                    <label class="d-block" for="edo-ani">
                                        <input class="radio_animated" value='0' checked id="edo-ani" type="radio" name="gender">
                                        Homme
                                    </label>
                                    <label class="d-block" for="edo-ani1">
                                        <input class="radio_animated" value='1' id="edo-ani1" type="radio" name="gender">
                                        Femme
                                    </label>
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
    </div>
</div>
@stop

@section('style')
<!-- Flag icon-->
<link rel="stylesheet" type="text/css" href="../assets/css/flag-icon.css">

<!-- Bootstrap css-->
<link rel="stylesheet" type="text/css" href="../assets/css/bootstrap.css">

<!-- App css-->
<link rel="stylesheet" type="text/css" href="../assets/css/admin.css">
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