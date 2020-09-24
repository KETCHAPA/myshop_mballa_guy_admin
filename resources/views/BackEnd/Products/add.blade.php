@extends('BackEnd.template.index')
@section('title', 'Ajout d\'un produit')
@section('contentTitle', 'Produits')
@section('contentSubtitle', 'Nouveau produit')
@section('path')
<div class="col-lg-6">
    <ol class="breadcrumb pull-right">
        <li class="breadcrumb-item"><a href="/admin"><i data-feather="home"></i></a></li>
        <li class="breadcrumb-item active">Produits</li>
    </ol>
</div>
@stop


@section('content')
<form enctype="multipart/form-data" action={{ route('newProduct') }} method="post">
    @csrf
    <div class="container-fluid">
        <div class="row product-adding">
            <div class="col-xl-6">
                <div class="card">
                    <div class="card-header">
                        <h5>Informations</h5>
                    </div>
                    <div class="card-body">
                        <div class="digital-add needs-validation">
                            <div class="form-group">
                                <label for="validationCustom01" class="col-form-label pt-0"><span>*</span> Titre</label>
                                <input class="form-control" name='name' id="validationCustom01" type="text" required>
                            </div>
                            <div class="form-group">
                                <label for="validationCustomtitle" class="col-form-label pt-0"><span>*</span> Prix</label>
                                <input class="form-control" name='price' id="validationCustomtitle" type="text" required>
                            </div>
                            <div class="form-group">
                                <label for="validationCustomtitle" class="col-form-label pt-0"><span>*</span> Quantite</label>
                                <input class="form-control" name='qty' id="validationCustomtitle" type="text" required>
                            </div>
                            <div class="form-group">
                                <label class="col-form-label"><span>*</span> Categories</label>
                                <select name="catId" class="custom-select" required>
                                    
                                    <option value="">--Select--</option>
                                    @foreach($categories as $cat)
                                    <option value={{ $cat->id }}>{{$cat->name}}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="form-group">
                                <label class="col-form-label"><span>*</span> Status</label>
                                <div class="m-checkbox-inline mb-0 custom-radio-ml d-flex radio-animated">
                                    <label class="d-block" for="edo-ani">
                                        <input class="radio_animated" value='0' checked id="edo-ani" type="radio" name="isBlock">
                                        Actif
                                    </label>
                                    <label class="d-block" for="edo-ani1">
                                        <input class="radio_animated" value='1' id="edo-ani1" type="radio" name="isBlock">
                                        Desactif
                                    </label>
                                </div>
                            </div>
                            <label class="col-form-label pt-0"><span class='text-danger'>*</span> Image du produit</label>
                            
                            <div   class="dropzone digits" id="singleFileUpload">
                                <div class="dz-message needsclick"><i class="fa fa-cloud-upload"></i>
                                    <h4 class="mb-0 f-w-600">Deposer des fichiers ici ou cliquer sur parcourir.</h4>
                                    <input required type="file" name="photo">
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-xl-6">
                <div class="card">
                    <div class="card-header">
                        <h5>Ajouter une description</h5>
                    </div>
                    <div class="card-body">
                        <div class="digital-add needs-validation">
                            <div class="form-group mb-0">
                                <div class="description-sm">
                                    <textarea name="description" rows="5" cols="12"></textarea>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="card">
                    <div class="card-header">
                        <h5>Autres informations</h5>
                    </div>
                    <div class="card-body">
                        <div class="digital-add needs-validation">
                            <div class="form-group">
                                <label for="validationCustom05" class="col-form-label pt-0">Nom synonyme</label>
                                <input name="metaDataTitle" class="form-control" id="validationCustom05" type="text">
                            </div>
                            <div class="form-group">
                                <label class="col-form-label">Description supplementaire</label>
                                <textarea name="metaDataDescription" rows="4" cols="12"></textarea>
                            </div>
                            <div class="form-group mb-0">
                                <div class="product-buttons text-center">
                                    <button type="submit" class="btn btn-primary">Ajouter</button>
                                    <button type="reset" class="btn btn-light">Annuler</button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</form>
@stop


@section('style')
    <!-- Font Awesome-->
    <link rel="stylesheet" type="text/css" href="../assets/css/fontawesome.css">

    <!-- Flag icon-->
    <link rel="stylesheet" type="text/css" href="../assets/css/flag-icon.css">

    <!-- Dropzone css-->
    <link rel="stylesheet" type="text/css" href="../assets/css/dropzone.css">

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

<!--dropzone js-->
<script src="../assets/js/dropzone/dropzone.js"></script>
<script src="../assets/js/dropzone/dropzone-script.js"></script>

<!--ckeditor js-->
<script src="../assets/js/editor/ckeditor/ckeditor.js"></script>
<script src="../assets/js/editor/ckeditor/styles.js"></script>
<script src="../assets/js/editor/ckeditor/adapters/jquery.js"></script>
<script src="../assets/js/editor/ckeditor/ckeditor.custom.js"></script>

<!--Customizer admin-->
<script src="../assets/js/admin-customizer.js"></script>

<!-- lazyload js-->
<script src="../assets/js/lazysizes.min.js"></script>

<!--right sidebar js-->
<script src="../assets/js/chat-menu.js"></script>

<!--script admin-->
<script src="../assets/js/admin-script.js"></script>

@stop