@extends('BackEnd.template.index')
@section('title', 'Tableau de bord')
@section('contentTitle', 'Tableau de bord')
@section('contentSubtitle', 'Statistiques Generales')
@section('path')
<div class="col-lg-6">
    <ol class="breadcrumb pull-right">
        <li class="breadcrumb-item"><a href="/admin"><i data-feather="home"></i></a></li>
        <li class="breadcrumb-item active">Tableau de bord</li>
    </ol>
</div>
@stop
@section('content')
<div class="container-fluid">
    <div class="row">
        <div class="col-xl-3 col-md-6 xl-50">
            <div class="card o-hidden widget-cards">
                <div class="bg-warning card-body">
                    <div class="media static-top-widget row">
                        <div class="icons-widgets col-4">
                            <div class="align-self-center text-center"><i data-feather="navigation" class="font-warning"></i></div>
                        </div>
                        <div class="media-body col-8"><span class="m-0">Ventes Globales</span>
                            <h3 class="mb-0">Fcfa <span class="counter">{{ $monthlySalesAmount }}</span><small> Annuel</small></h3>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-xl-3 col-md-6 xl-50">
            <div class="card o-hidden  widget-cards">
                <div class="bg-secondary card-body">
                    <div class="media static-top-widget row">
                        <div class="icons-widgets col-4">
                            <div class="align-self-center text-center"><i data-feather="box" class="font-secondary"></i></div>
                        </div>
                        <div class="media-body col-8"><span class="m-0">Ventes mensuelles</span>
                            <h3 class="mb-0">Fcfa <span class="counter">{{ $globalSalesAmount }}</span><small> Ce mois</small></h3>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-xl-3 col-md-6 xl-50">
            <div class="card o-hidden widget-cards">
                <div class="bg-primary card-body">
                    <div class="media static-top-widget row">
                        <div class="icons-widgets col-4">
                            <div class="align-self-center text-center"><i data-feather="message-square" class="font-primary"></i></div>
                        </div>
                        <div class="media-body col-8"><span class="m-0">Messages</span>
                            <h3 class="mb-0"><span class="counter">{{ $interactions }}</span><small> Ce mois</small></h3>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-xl-3 col-md-6 xl-50">
            <div class="card o-hidden widget-cards">
                <div class="bg-danger card-body">
                    <div class="media static-top-widget row">
                        <div class="icons-widgets col-4">
                            <div class="align-self-center text-center"><i data-feather="users" class="font-danger"></i></div>
                        </div>
                        <div class="media-body col-8"><span class="m-0">Clients de la plateforme</span>
                            <h3 class="mb-0"><span class="counter"> {{ $numClients }} </span><small> Clients actifs</small></h3>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-xl-6 xl-100">
            <div class="card">
                <div class="card-header">
                    <h5>Dernieres commandes</h5>
                    <div class="card-header-right">
                        <ul class="list-unstyled card-option">
                            <li><i class="icofont icofont-simple-left"></i></li>
                            <li><i class="view-html fa fa-code"></i></li>
                            <li><i class="icofont icofont-maximize full-card"></i></li>
                            <li><i class="icofont icofont-minus minimize-card"></i></li>
                            <li><i class="icofont icofont-refresh reload-card"></i></li>
                            <li><i class="icofont icofont-error close-card"></i></li>
                        </ul>
                    </div>
                </div>
                <div class="card-body">
                    <div class="user-status table-responsive latest-order-table">
                        <table class="table table-bordernone">
                            <thead>
                            <tr>
                                <th scope="col">Code Commande</th>
                                <th scope="col">Montant </th>
                                <th scope="col">Mode de paiement</th>
                                <th scope="col">Mode de livraison</th>
                                <th scope="col">Status</th>
                            </tr>
                            </thead>
                            <tbody>
                                @foreach($firstLastOrders as $order)
                                <tr>
                                    <td>{{ $order->code }}</td>
                                    <td class="digits">{{ $order->amount }}</td>
                                    <td class="font-danger"> {{ $order->paymentMode }}</td>
                                    <td class="digits">{{ $order->deliveredMode }}</td>
                                    <td class="digits">{{$order->status == 0 ? "Non paye" : $order->status == 1 ? "Non livre" : "Paye et livre"}}</td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                        <a href={{ route('orders') }} class="btn btn-primary">Voir toutes les commandes</a>
                    </div>
                    <div class="code-box-copy">
                        <button class="code-box-copy__btn btn-clipboard" data-clipboard-target="#example-head1" title="" data-original-title="Copy"><i class="icofont icofont-copy-alt"></i></button>
                        <pre class=" language-html"><code class=" language-html" id="example-head1">
                            &lt;div class="user-status table-responsive latest-order-table"&gt;
                                &lt;table class="table table-bordernone"&gt;
                                    &lt;thead&gt;
                                        &lt;tr&gt;
                                            &lt;th scope="col"&gt;Order ID&lt;/th&gt;
                                            &lt;th scope="col"&gt;Order Total&lt;/th&gt;
                                            &lt;th scope="col"&gt;Payment Method&lt;/th&gt;
                                            &lt;th scope="col"&gt;Status&lt;/th&gt;
                                        &lt;/tr&gt;
                                    &lt;/thead&gt;
                                    &lt;tbody&gt;
                                        &lt;tr&gt;
                                            &lt;td&gt;1&lt;/td&gt;
                                            &lt;td class="digits"&gt;$120.00&lt;/td&gt;
                                            &lt;td class="font-secondary"&gt;Bank Transfers&lt;/td&gt;
                                            &lt;td class="digits"&gt;Delivered&lt;/td&gt;
                                        &lt;/tr&gt;
                                        &lt;tr&gt;
                                            &lt;td&gt;2&lt;/td&gt;
                                            &lt;td class="digits"&gt;$90.00&lt;/td&gt;
                                            &lt;td class="font-secondary"&gt;Ewallets&lt;/td&gt;
                                            &lt;td class="digits"&gt;Delivered&lt;/td&gt;
                                        &lt;/tr&gt;
                                        &lt;tr&gt;
                                            &lt;td&gt;3&lt;/td&gt;
                                            &lt;td class="digits"&gt;$240.00&lt;/td&gt;
                                            &lt;td class="font-secondary"&gt;Cash&lt;/td&gt;
                                            &lt;td class="digits"&gt;Delivered&lt;/td&gt;
                                        &lt;/tr&gt;
                                        &lt;tr&gt;
                                            &lt;td&gt;4&lt;/td&gt;
                                            &lt;td class="digits"&gt;$120.00&lt;/td&gt;
                                            &lt;td class="font-primary"&gt;Direct Deposit&lt;/td&gt;
                                            &lt;td class="digits"&gt;Delivered&lt;/td&gt;
                                        &lt;/tr&gt;
                                        &lt;tr&gt;
                                            &lt;td&gt;5&lt;/td&gt;
                                            &lt;td class="digits"&gt;$50.00&lt;/td&gt;
                                            &lt;td class="font-primary"&gt;Bank Transfers&lt;/td&gt;
                                            &lt;td class="digits"&gt;Delivered&lt;/td&gt;
                                        &lt;/tr&gt;
                                    &lt;/tbody&gt;
                                &lt;/table&gt;
                            &lt;/div&gt;
                        </code></pre>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-xl-3 col-md-6 xl-50">
            <div class="card order-graph sales-carousel">
                <div class="card-header">
                    <h6>Total des ventes</h6>
                    <div class="row">
                        <div class="col-6">
                            <div class="small-chartjs">
                                <div class="flot-chart-placeholder" id="simple-line-chart-sparkline-3"></div>
                            </div>
                        </div>
                        <div class="col-6">
                            <div class="value-graph">
                                <h3>{{ $variationSalesAmount * 100 }}% <span><i class="fa fa-angle-up font-primary"></i></span></h3>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="card-body">
                    <div class="media">
                        <div class="media-body">
                            <span>Ventes du mois dernier</span>
                            <h2 class="mb-0">{{ $monthlySalesAmount }}</h2>
                            <p>{{ $variationSalesAmount * 100 }}% <span><i class="fa fa-angle-up"></i></span></p>
                            <h5 class="f-w-600">Ventes du mois</h5>
                            <p>Fluctuation des ventes entre le mois dernier et le mois en cours</p>
                        </div>
                        <div class="bg-primary b-r-8">
                            <div class="small-box">
                                <i data-feather="briefcase"></i>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-xl-3 col-md-6 xl-50">
            <div class="card order-graph sales-carousel">
                <div class="card-header">
                    <h6>Total Interactions</h6>
                    <div class="row">
                        <div class="col-6">
                            <div class="small-chartjs">
                                <div class="flot-chart-placeholder" id="simple-line-chart-sparkline"></div>
                            </div>
                        </div>
                        <div class="col-6">
                            <div class="value-graph">
                                <h3>{{ $variationInteractions * 100 }}% <span><i class="fa fa-angle-up font-secondary"></i></span></h3>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="card-body">
                    <div class="media">
                        <div class="media-body">
                            <span>Interaction du mois</span>
                            <h2 class="mb-0">{{ $monthlyInteractions }}</h2>
                            <p>{{ $variationInteractions * 100 }}% <span><i class="fa fa-angle-up"></i></span></p>
                            <h5 class="f-w-600">Moyenne d'interaction</h5>
                            <p>Messages echanges entre l'administrateur et les utilisateurs</p>
                        </div>
                        <div class="bg-secondary b-r-8">
                            <div class="small-box">
                                <i data-feather="credit-card"></i>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-xl-3 col-md-6 xl-50">
            <div class="card order-graph sales-carousel">
                <div class="card-header">
                    <h6>Total cash transaction</h6>
                    <div class="row">
                        <div class="col-6">
                            <div class="small-chartjs">
                                <div class="flot-chart-placeholder" id="simple-line-chart-sparkline-2"></div>
                            </div>
                        </div>
                        <div class="col-6">
                            <div class="value-graph">
                                <h3>{{ $variationCashSalesAmount * 100 }} % <span><i class="fa fa-angle-up font-warning"></i></span></h3>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="card-body">
                    <div class="media">
                        <div class="media-body">
                            <span>Paiement en cash</span>
                            <h2 class="mb-0">{{ $cashSalesAmount }}</h2>
                            <p>{{ $variationCashSalesAmount * 100 }} % <span><i class="fa fa-angle-up"></i></span></p>
                            <h5 class="f-w-600">Details a propos</h5>
                            <p>Payer a la livraison par le client</p>
                        </div>
                        <div class="bg-warning b-r-8">
                            <div class="small-box">
                                <i data-feather="shopping-cart"></i>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-xl-3 col-md-6 xl-50">
            <div class="card order-graph sales-carousel">
                <div class="card-header">
                    <h6>Paiement en ligne</h6>
                    <div class="row">
                        <div class="col-6">
                            <div class="small-chartjs">
                                <div class="flot-chart-placeholder" id="simple-line-chart-sparkline-1"></div>
                            </div>
                        </div>
                        <div class="col-6">
                            <div class="value-graph">
                                <h3>{{ $variationOMSalesAmount * 100 }} % <span><i class="fa fa-angle-up font-danger"></i></span></h3>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="card-body">
                    <div class="media">
                        <div class="media-body">
                            <span>Depots securises</span>
                            <h2 class="mb-0">{{ $OMSalesAmount }}</h2>
                            <p>{{ $variationOMSalesAmount * 100 }} % <span><i class="fa fa-angle-up"></i></span></p>
                            <h5 class="f-w-600">Achats du mois</h5>
                            <p>Paiement via OM, MoMo, PayPal</p>
                        </div>
                        <div class="bg-danger b-r-8">
                            <div class="small-box">
                                <i data-feather="calendar"></i>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-xl-6 xl-100">
            <div class="card height-equal">
                <div class="card-header">
                    <h5>Statut des employes</h5>
                    <div class="card-header-right">
                        <a href={{ route('admins') }}>
                            <button class="btn btn-sm btn-primary"> Voir tout </button>
                        </a>
                    </div>
                </div>
                <div class="card-body">
                    <div class="user-status table-responsive products-table">
                        <table class="table table-bordernone mb-0">
                            <thead>
                            <tr>
                                <th scope="col">Nom</th>
                                <th scope="col">Designation</th>
                                <th scope="col">Competence</th>
                                <th scope="col">Experience</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($firstLastUsers as $user)
                            <tr>
                                <td class="bd-t-none u-s-tb">
                                    <div class="align-middle image-sm-size"><img class="img-radius align-top m-r-15 rounded-circle blur-up lazyloaded" src = {{ $user->photo == null ? $user->gender == 0 ? "../assets/images/backend/no_picture/avatar.png" : "../assets/images/backend/no_picture/avatarFemme.jpg" : "../assets/images/backend/admin/" . $user->photo}} alt="" data-original-title="" title="">
                                        <div class="d-inline-block">
                                            <h6> {{ $user->firstname }} {{ $user->lastname }} <span class="text-muted digits">(14+ En ligne)</span></h6>
                                        </div>
                                    </div>
                                </td>
                                <td> {{ $user->isAdmin == 2 ? 'Super Administrateur' : 'Administrateur' }} </td>
                                <td>
                                    <div class="progress-showcase">
                                        <div class="progress" style="height: 8px;">
                                            <div class="progress-bar bg-success" role="progressbar" style="width: 50%" aria-valuenow="50" aria-valuemin="0" aria-valuemax="100"></div>
                                        </div>
                                    </div>
                                </td>
                                <td class="digits">+ 2 Ans</td>
                            </tr>
                            @endforeach
                            </tbody>
                        </table>
                    </div>
                    <div class="code-box-copy">
                        <button class="code-box-copy__btn btn-clipboard" data-clipboard-target="#example-head5" title="" data-original-title="Copy"><i class="icofont icofont-copy-alt"></i></button>
                        <pre class=" language-html"><code class=" language-html" id="example-head5">
                            &lt;div class="user-status table-responsive products-table"&gt;
                            &lt;table class="table table-bordernone mb-0"&gt;
                                &lt;thead&gt;
                                    &lt;tr&gt;
                                        &lt;th scope="col"&gt;Name&lt;/th&gt;
                                        &lt;th scope="col"&gt;Designation&lt;/th&gt;
                                        &lt;th scope="col"&gt;Skill Level&lt;/th&gt;
                                        &lt;th scope="col"&gt;Experience&lt;/th&gt;
                                    &lt;/tr&gt;
                                &lt;/thead&gt;
                                &lt;tbody&gt;
                                        &lt;tr&gt;
                                            &lt;td class="bd-t-none u-s-tb"&gt;
                                                &lt;div class="align-middle image-sm-size"&gt;&lt;img class="img-radius align-top m-r-15 rounded-circle blur-up lazyloaded" src="../assets/images/dashboard/user2.jpg" alt="" data-original-title="" title=""&gt;
                                                &lt;div class="d-inline-block"&gt;
                                                &lt;h6&gt;John Deo &lt;span class="text-muted digits"&gt;(14+ Online)&lt;/span&gt;&lt;/h6&gt;
                                                &lt;/div&gt;
                                                &lt;/div&gt;
                                            &lt;/td&gt;
                                            &lt;td&gt;Designer&lt;/td&gt;
                                            &lt;td&gt;
                                                &lt;div class="progress-showcase"&gt;
                                                &lt;div class="progress" style="height: 8px;"&gt;
                                                &lt;div class="progress-bar bg-primary" role="progressbar" style="width: 30%" aria-valuenow="50" aria-valuemin="0" aria-valuemax="100"&gt;&lt;/div&gt;
                                                &lt;/div&gt;
                                                &lt;/div&gt;
                                            &lt;/td&gt;
                                            &lt;td class="digits"&gt;2 Year&lt;/td&gt;
                                        &lt;/tr&gt;
                                    &lt;tr&gt;
                                        &lt;td class="bd-t-none u-s-tb"&gt;
                                            &lt;div class="align-middle image-sm-size"&gt;&lt;img class="img-radius align-top m-r-15 rounded-circle blur-up lazyloaded" src="../assets/images/dashboard/user1.jpg" alt="" data-original-title="" title=""&gt;
                                            &lt;div class="d-inline-block"&gt;
                                            &lt;h6&gt;Holio Mako &lt;span class="text-muted digits"&gt;(250+ Online)&lt;/span&gt;&lt;/h6&gt;
                                            &lt;/div&gt;
                                            &lt;/div&gt;
                                        &lt;/td&gt;
                                        &lt;td&gt;Developer&lt;/td&gt;
                                        &lt;td&gt;
                                            &lt;div class="progress-showcase"&gt;
                                            &lt;div class="progress" style="height: 8px;"&gt;
                                            &lt;div class="progress-bar bg-secondary" role="progressbar" style="width: 70%" aria-valuenow="50" aria-valuemin="0" aria-valuemax="100"&gt;&lt;/div&gt;
                                            &lt;/div&gt;
                                            &lt;/div&gt;
                                        &lt;/td&gt;
                                        &lt;td class="digits"&gt;3 Year&lt;/td&gt;
                                    &lt;/tr&gt;
                                    &lt;tr&gt;
                                        &lt;td class="bd-t-none u-s-tb"&gt;
                                            &lt;div class="align-middle image-sm-size"&gt;&lt;img class="img-radius align-top m-r-15 rounded-circle blur-up lazyloaded" src="../assets/images/dashboard/man.png" alt="" data-original-title="" title=""&gt;
                                            &lt;div class="d-inline-block"&gt;
                                            &lt;h6&gt;Mohsib lara&lt;span class="text-muted digits"&gt;(99+ Online)&lt;/span&gt;&lt;/h6&gt;
                                            &lt;/div&gt;
                                            &lt;/div&gt;
                                        &lt;/td&gt;
                                        &lt;td&gt;Tester&lt;/td&gt;
                                        &lt;td&gt;
                                            &lt;div class="progress-showcase"&gt;
                                            &lt;div class="progress" style="height: 8px;"&gt;
                                            &lt;div class="progress-bar bg-primary" role="progressbar" style="width: 60%" aria-valuenow="50" aria-valuemin="0" aria-valuemax="100"&gt;&lt;/div&gt;
                                            &lt;/div&gt;
                                            &lt;/div&gt;
                                        &lt;/td&gt;
                                        &lt;td class="digits"&gt;5 Month&lt;/td&gt;
                                    &lt;/tr&gt;
                                    &lt;tr&gt;
                                        &lt;td class="bd-t-none u-s-tb"&gt;
                                            &lt;div class="align-middle image-sm-size"&gt;&lt;img class="img-radius align-top m-r-15 rounded-circle blur-up lazyloaded" src="../assets/images/dashboard/user.png" alt="" data-original-title="" title=""&gt;
                                            &lt;div class="d-inline-block"&gt;
                                            &lt;h6&gt;Hileri Soli &lt;span class="text-muted digits"&gt;(150+ Online)&lt;/span&gt;&lt;/h6&gt;
                                            &lt;/div&gt;
                                            &lt;/div&gt;
                                        &lt;/td&gt;
                                        &lt;td&gt;Designer&lt;/td&gt;
                                        &lt;td&gt;
                                            &lt;div class="progress-showcase"&gt;
                                            &lt;div class="progress" style="height: 8px;"&gt;
                                            &lt;div class="progress-bar bg-secondary" role="progressbar" style="width: 30%" aria-valuenow="50" aria-valuemin="0" aria-valuemax="100"&gt;&lt;/div&gt;
                                            &lt;/div&gt;
                                            &lt;/div&gt;
                                        &lt;/td&gt;
                                        &lt;td class="digits"&gt;3 Month&lt;/td&gt;
                                    &lt;/tr&gt;
                                    &lt;tr&gt;
                                        &lt;td class="bd-t-none u-s-tb"&gt;
                                            &lt;div class="align-middle image-sm-size"&gt;&lt;img class="img-radius align-top m-r-15 rounded-circle blur-up lazyloaded" src="../assets/images/dashboard/designer.jpg" alt="" data-original-title="" title=""&gt;
                                            &lt;div class="d-inline-block"&gt;
                                            &lt;h6&gt;Pusiz bia &lt;span class="text-muted digits"&gt;(14+ Online)&lt;/span&gt;&lt;/h6&gt;
                                            &lt;/div&gt;
                                            &lt;/div&gt;
                                        &lt;/td&gt;
                                        &lt;td&gt;Designer&lt;/td&gt;
                                        &lt;td&gt;
                                            &lt;div class="progress-showcase"&gt;
                                            &lt;div class="progress" style="height: 8px;"&gt;
                                            &lt;div class="progress-bar bg-primary" role="progressbar" style="width: 90%" aria-valuenow="50" aria-valuemin="0" aria-valuemax="100"&gt;&lt;/div&gt;
                                            &lt;/div&gt;
                                            &lt;/div&gt;
                                        &lt;/td&gt;
                                        &lt;td class="digits"&gt;5 Year&lt;/td&gt;
                                    &lt;/tr&gt;
                                &lt;/tbody&gt;
                                &lt;/table&gt;
                                    &lt;/div&gt;
                        </code></pre>
                    </div>
                </div>
            </div>
        </div>
       
    </div>
</div>
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

<!--chartist js-->
<script src="../assets/js/chart/chartist/chartist.js"></script>

<!--chartjs js--> 
<script src="../assets/js/chart/chartjs/chart.min.js"></script>

<!-- lazyload js-->
<script src="../assets/js/lazysizes.min.js"></script>

<!--copycode js-->
<script src="../assets/js/prism/prism.min.js"></script>
<script src="../assets/js/clipboard/clipboard.min.js"></script>
<script src="../assets/js/custom-card/custom-card.js"></script>

<!--counter js-->
<script src="../assets/js/counter/jquery.waypoints.min.js"></script>
<script src="../assets/js/counter/jquery.counterup.min.js"></script>
<script src="../assets/js/counter/counter-custom.js"></script>

<!--peity chart js-->
<script src="../assets/js/chart/peity-chart/peity.jquery.js"></script>

<!--sparkline chart js-->
<script src="../assets/js/chart/sparkline/sparkline.js"></script>

<!--Customizer admin-->
<script src="../assets/js/admin-customizer.js"></script>

<!--dashboard custom js-->
<script src="../assets/js/dashboard/default.js"></script>

<!--right sidebar js-->
<script src="../assets/js/chat-menu.js"></script>

<!--height equal js-->
<script src="../assets/js/height-equal.js"></script>

<!-- lazyload js-->
<script src="../assets/js/lazysizes.min.js"></script>

<!--script admin-->
<script src="../assets/js/admin-script.js"></script>

@stop
