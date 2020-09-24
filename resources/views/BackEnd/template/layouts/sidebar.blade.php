<div class="page-sidebar">
    <div class="main-header-left d-none d-lg-block">
        <div class="logo-wrapper"><a href={{ route('dashboard') }}><h2>MyShop</h2></a></div>
    </div>
    <div class="sidebar custom-scrollbar">
        <div class="sidebar-user text-center">
            <div><img class="img-60 rounded-circle lazyloaded blur-up" src={{ Auth::user()->photo == null ?  Auth::user()->gender == 0 ? "../assets/images/backend/no_picture/avatar.png" : "../assets/images/backend/no_picture/avatarFemme.jpg" : "../assets/images/backend/admin/" .  Auth::user()->photo }} alt="#">
            </div>
            <h6 class="mt-3 f-14">{{Auth::user()->firstname}} {{Auth::user()->lastname}}</h6>
            <p>
            @if(Auth::user()->isAdmin == 1) 
                Administrateur
            @else
                Super Administrateur
            @endif
            </p>
        </div>
        <ul class="sidebar-menu">
            <li><a class="sidebar-header" href={{ route('dashboard') }}><i data-feather="home"></i><span>Tableau de bord</span></a></li>
            <li><a class="sidebar-header" href="#"><i data-feather="box"></i> <span>Produits</span><i class="fa fa-angle-right pull-right"></i></a>
                <ul class="sidebar-submenu">
                    <li><a href={{ route('addProduct') }}><i class="fa fa-circle"></i>Nouveau produit</a></li>
                    <li><a href={{ route('categories') }}><i class="fa fa-circle"></i>Categories</a></li>
                    <li><a href={{ route('products') }}><i class="fa fa-circle"></i>Tous les produits</a></li>
                </ul>
            </li>
            <li><a class="sidebar-header" href="#"><i data-feather="dollar-sign"></i><span>Ventes</span><i class="fa fa-angle-right pull-right"></i></a>
                <ul class="sidebar-submenu">
                    <li><a href={{ route('orders') }}><i class="fa fa-circle"></i>Commandes</a></li>
                </ul>
            </li>
            <li><a class="sidebar-header" href="#"><i data-feather="tag"></i><span>Bons de reduction</span><i class="fa fa-angle-right pull-right"></i></a>
                <ul class="sidebar-submenu">
                    <li><a href={{ route('promotions') }}><i class="fa fa-circle"></i>Listes des coupons</a></li>
                    <li><a href={{ route('newPromotions') }}><i class="fa fa-circle"></i>Nouveaux coupons</a></li>
                </ul>
            </li>
            <li><a class="sidebar-header" href={{ route('clients') }}><i data-feather="user"></i><span>Clients</span></a></li>
            <li><a class="sidebar-header" href="#"><i data-feather="user-plus"></i><span>Employe</span><i class="fa fa-angle-right pull-right"></i></a>
                <ul class="sidebar-submenu">
                    <li><a href={{ route('admins') }}><i class="fa fa-circle"></i>Listes des employes</a></li>
                    <li><a href={{ route('newAdmin') }}><i class="fa fa-circle"></i>Nouvel employe</a></li>
                </ul>
            </li>
            <li><a class="sidebar-header" href={{ route('reports') }}><i data-feather="bar-chart"></i><span>Rapports</span></a></li>
        </ul>
    </div>
</div>