<!DOCTYPE html>
<html lang="en">


<!-- Mirrored from themes.pixelstrap.com/multikart/back-end/index.html by HTTrack Website Copier/3.x [XR&CO'2014], Tue, 22 Sep 2020 02:11:08 GMT -->
<head>
    @include('BackEnd.template.layouts.style')
    <meta name="csrf-token" content="{{ csrf_token() }}">
    @yield('style')
    <title>
        @yield('title')
    </title>
</head>

<body>

<!-- page-wrapper Start-->
<div class="page-wrapper">

    @include('BackEnd.template.layouts.header')
    <!-- Page Body Start-->
    <div class="page-body-wrapper">

        @include('BackEnd.template.layouts.sidebar')
        
        @include('BackEnd.template.layouts.message')

        <div class="page-body">

            <!-- Container-fluid starts-->
            <div class="container-fluid">
                <div class="page-header">
                    @include('error')
                    <div class="row">
                        <div class="col-lg-6">
                            <div class="page-header-left">
                                <h3>@yield('contentTitle')
                                    <small>@yield('contentSubtitle')</small>
                                </h3>
                            </div>
                        </div>
                        @yield('path')
                    </div>
                </div>
            </div>
            <!-- Container-fluid Ends-->

            <!-- Container-fluid starts-->
            @yield('content')
            <!-- Container-fluid Ends-->

        </div>

        <!-- footer start-->
        @include('BackEnd.template.layouts.footer')
        <!-- footer end-->
    </div>

</div>
@yield('script')
<script src='../assets/js/ajax/ajax.js'></script>
<script>
        window.onload = function() {
            
            setTimeout(() => {
                $('#alert-container').fadeOut('slow');
            }, 5000);
        }
    </script>
</body>

<!-- Mirrored from themes.pixelstrap.com/multikart/back-end/index.html by HTTrack Website Copier/3.x [XR&CO'2014], Tue, 22 Sep 2020 02:12:44 GMT -->
</html>
