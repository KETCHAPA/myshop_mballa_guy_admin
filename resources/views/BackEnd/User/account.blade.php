@extends('BackEnd.template.index')
@section('title', 'Mon compte')
@section('contentTitle', 'Mon compte')
@section('contentSubtitle', 'mon compte')
@section('path')
<div class="col-lg-6">
    <ol class="breadcrumb pull-right">
        <li class="breadcrumb-item"><a href={{ route('dashboard') }}><i data-feather="home"></i></a></li>
        <li class="breadcrumb-item active">Compte</li>
    </ol>
</div>
@stop

@section('content')
<div class="container-fluid">
    <div class="row">
        <div class="col-xl-4">
            <div class="card">
                <div class="card-body">
                    <div class="profile-details text-center">
                        <img src={{  Auth::user()->photo == null ?  Auth::user()->gender == 0 ? "../assets/images/backend/no_picture/avatar.png" : "../assets/images/backend/no_picture/avatarFemme.jpg" : "../assets/images/backend/admin/" .  Auth::user()->photo }} alt="#" class="img-fluid img-90 rounded-circle blur-up lazyloaded">
                        <h5 class="f-w-600 mb-0">{{ Auth::user()->lastname }}</h5>
                        <span>{{Auth::user()->email}}</span>
                        <div class="social">
                            <div class="form-group btn-showcase">
                                <button class="btn social-btn btn-fb d-inline-block"> <i class="fa fa-facebook"></i></button>
                                <button class="btn social-btn btn-twitter d-inline-block"><i class="fa fa-google"></i></button>
                                <button class="btn social-btn btn-google d-inline-block mr-0"><i class="fa fa-twitter"></i></button>
                            </div>
                        </div>
                    </div>
                    <hr>
                    <div class="project-status">
                        <h5 class="f-w-600">Status de l'employee</h5>
                        <div class="media">
                            <div class="media-body">
                                <h6>Performance<span class="pull-right">80%</span></h6>
                                <div class="progress sm-progress-bar">
                                    <div class="progress-bar bg-primary" role="progressbar" style="width: 90%" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100"></div>
                                </div>
                            </div>
                        </div>
                        <div class="media">
                            <div class="media-body">
                                <h6>Temps de travail <span class="pull-right">60%</span></h6>
                                <div class="progress sm-progress-bar">
                                    <div class="progress-bar bg-secondary" role="progressbar" style="width: 60%" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100"></div>
                                </div>
                            </div>
                        </div>
                        <div class="media">
                            <div class="media-body">
                                <h6>Clients traites<span class="pull-right">70%</span></h6>
                                <div class="progress sm-progress-bar">
                                    <div class="progress-bar bg-danger" role="progressbar" style="width: 70%" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100"></div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-xl-8">
            <div class="card tab2-card">
                <div class="card-body">
                    <ul class="nav nav-tabs nav-material" id="top-tab" role="tablist">
                        <li class="nav-item"><a class="nav-link active" id="top-profile-tab" data-toggle="tab" href="#top-profile" role="tab" aria-controls="top-profile" aria-selected="true"><i data-feather="user" class="mr-2"></i>Profil</a>
                        </li>
                    </ul>
                    <div class="tab-content" id="top-tabContent">
                        <div class="tab-pane fade show active" id="top-profile" role="tabpanel" aria-labelledby="top-profile-tab">
                            <h5 class="f-w-600">Profil</h5>
                            <div class="table-responsive profile-table">
                                <table class="table table-responsive">
                                    <tbody>
                                    <tr>
                                        <td>Nom(s):</td>
                                        <td>{{ Auth::user()->firstname }}</td>
                                    </tr>
                                    <tr>
                                        <td>Prenom(s):</td>
                                        <td> {{ Auth::user()->lastname }} </td>
                                    </tr>
                                    <tr>
                                        <td>Email:</td>
                                        <td> {{ Auth::user()->email }} </td>
                                    </tr>
                                    <tr>
                                        <td>Sexe:</td>
                                        <td>{{ Auth::user()->gender == 0 ? "Homme" : "Femme" }}</td>
                                    </tr>
                                    <tr>
                                        <td>Mobile Number:</td>
                                        <td>{{ Auth::user()->phone }}</td>
                                    </tr>
                                    <tr>
                                        <td>Adresse:</td>
                                        <td> {{ Auth::user()->street }} </td>
                                    </tr>
                                    <tr>
                                        <td><button class="btn btn-sm btn-primary" data-toggle="modal" data-original-title="test" data-target="#exampleModal"> Editer</button></td>
                                    </tr>
                                    </tbody>
                                    <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                        <div class="modal-dialog" role="document">
                                            <div class="modal-content">
                                                <form class="needs-validation" enctype="multipart/form-data" method="POST" action={{ route('storeUserData') }}>
                                                    @csrf
                                                    <div class="modal-header">
                                                        <h5 class="modal-title f-w-600" id="exampleModalLabel">Modifier mon compte</h5>
                                                        <button class="close" type="button" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span></button>
                                                    </div>
                                                    <div class="modal-body">
                                                        <div class="form">
                                                            <div class="form-group">
                                                                <label for="validationCustom01" class="mb-1">Nom(s)</label>
                                                                <input class="form-control" name="firstname" placeholder={{ Auth::user()->firstname }} id="validationCustom01" type="text">
                                                            </div>
                                                            <div class="form-group">
                                                                <label for="validationCustom01" class="mb-1">Prenom(s)</label>
                                                                <input class="form-control" name="lastname" placeholder={{ Auth::user()->lastname }} id="validationCustom01" type="text">
                                                            </div>
                                                            <div class="form-group">
                                                                <label for="validationCustom01" class="mb-1">Email</label>
                                                                <input class="form-control" name="email" placeholder={{ Auth::user()->email }} id="validationCustom01" type="text">
                                                            </div>
                                                            <div class="form-group">
                                                                <label for="validationCustom01" class="mb-1">Nom d'utilisateur</label>
                                                                <input class="form-control" name="login" placeholder={{ Auth::user()->login }} id="validationCustom01" type="text">
                                                            </div>
                                                            <div class="form-group">
                                                                <label for="validationCustom01" class="mb-1">Mot de passe</label>
                                                                <input class="form-control" name="password" id="validationCustom01" type="password">
                                                            </div>
                                                            <div class="form-group">
                                                                <label for="validationCustom01" class="mb-1">Confirmation mot de passe</label>
                                                                <input class="form-control" name="cpassword" id="validationCustom01" type="password">
                                                            </div>
                                                            <div class="form-group">
                                                                <label for="validationCustom01" class="mb-1">Telephone</label>
                                                                <input class="form-control" name="street" placeholder={{ Auth::user()->phone }} id="validationCustom01" type="text">
                                                            </div>
                                                            <div class="form-group">
                                                                <label for="validationCustom01" class="mb-1">Adresse</label>
                                                                <input class="form-control" name="street" id="validationCustom01" type="text">
                                                            </div>
                                                            <div class="form-group mb-0">
                                                                <label for="validationCustom02" class="mb-1">Ajouter une photo :</label>
                                                                <input class="form-control" name="photo" id="validationCustom02" type="file">
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="modal-footer">
                                                        <button class="btn btn-primary" type="submit">Mettre a jour</button>
                                                        <button class="btn btn-secondary" type="reset" data-dismiss="modal">Fermer</button>
                                                    </div>
                                                
                                                </form>
                                            
                                            </div>
                                        </div>
                                    </div>
                                </table>
                            </div>
                        </div>
                    </div>
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

<!--Customizer admin-->
<script src="../assets/js/admin-customizer.js"></script>

<!-- lazyload js-->
<script src="../assets/js/lazysizes.min.js"></script>

<!--right sidebar js-->
<script src="../assets/js/chat-menu.js"></script>

<!--script admin-->
<script src="../assets/js/admin-script.js"></script>
@stop