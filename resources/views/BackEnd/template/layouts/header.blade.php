<div class="page-main-header">
    <div class="main-header-right row">
        <div class="main-header-left d-lg-none">
            <div class="logo-wrapper"><a href="index.html"><img class="blur-up lazyloaded" src="../assets/images/dashboard/multikart-logo.png" alt=""></a></div>
        </div>
        <div class="mobile-sidebar">
            <div class="media-body text-right switch-sm">
                <label class="switch"><a href="#"><i id="sidebar-toggle" data-feather="align-left"></i></a></label>
            </div>
        </div>
        <div class="nav-right col">
            <ul class="nav-menus">
                <li>
                    <form class="form-inline search-form">
                        <div class="form-group">
                            <input class="form-control-plaintext" type="search" placeholder="Recherche.."><span class="d-sm-none mobile-search"><i data-feather="search"></i></span>
                        </div>
                    </form>
                </li>
                <li><a class="text-dark" href="#!" onclick="javascript:toggleFullScreen()"><i data-feather="maximize-2"></i></a></li>
                <li class="onhover-dropdown"><a class="txt-dark" href="#">
                    <h6>FR</h6></a>
                    <ul class="language-dropdown onhover-show-div p-20">
                        <li><a href="#" data-lng="en"><i class="flag-icon flag-icon-fr"></i> Francais</a></li>
                        <li><a href="#" data-lng="es"><i class="flag-icon flag-icon-um"></i> Anglais</a></li>
                    </ul>
                </li>
                <li class="onhover-dropdown"><i data-feather="bell"></i><span class="badge badge-pill badge-primary pull-right notification-badge" id='notification-number'>0</span><span class="dot"></span>
                    <ul class="notification-dropdown onhover-show-div p-0" id="ul-list-notification">
                    </ul>
                </li>
                <li><a href="#"><i class="right_side_toggle" data-feather="message-square"></i><span class="dot"></span></a></li>
                <li class="onhover-dropdown">
                    <div class="media align-items-center"><img class="align-self-center pull-right img-50 rounded-circle blur-up lazyloaded" style="height: 50px" src={{ Auth::user()->photo == null ?  Auth::user()->gender == 0 ? "../assets/images/backend/no_picture/avatar.png" : "../assets/images/backend/no_picture/avatarFemme.jpg" : "../assets/images/backend/admin/" .  Auth::user()->photo }} alt="#">
                        <div class="dotted-animation"><span class="animate-circle"></span><span class="main-circle"></span></div>
                    </div>
                    <ul class="profile-dropdown onhover-show-div p-20 profile-dropdown-hover">
                        <li><a href={{ route('account') }}><i data-feather="user"></i>Mon compte</a></li>
                        <li><a href={{ route('logout') }}><i data-feather="log-out"></i>Deconnexion</a></li>
                    </ul>
                </li>
            </ul>
            <div class="d-lg-none mobile-toggle pull-right"><i data-feather="more-horizontal"></i></div>
        </div>
    </div>
</div>