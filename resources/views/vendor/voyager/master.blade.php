<!DOCTYPE html>
<html lang="{{ config('app.locale') }}" dir="{{ __('voyager::generic.is_rtl') == 'true' ? 'rtl' : 'ltr' }}">
<head>
    <title>@yield('page_title', setting('admin.title') . " - " . setting('admin.description'))</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}"/>
    <meta name="assets-path" content="{{ route('voyager.voyager_assets') }}"/>

    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,700" rel="stylesheet">

    <!-- Favicon -->
    <?php $admin_favicon = Voyager::setting('admin.icon_image', ''); ?>
    @if($admin_favicon == '')
        <link rel="shortcut icon" href="{{ voyager_asset('images/logo-icon.png') }}" type="image/png">
    @else
        <link rel="shortcut icon" href="{{ Voyager::image($admin_favicon) }}" type="image/png">
    @endif



    <!-- App CSS -->
    <link rel="stylesheet" href="{{ voyager_asset('css/app.css') }}">

    @yield('css')
    @if(__('voyager::generic.is_rtl') == 'true')
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-rtl/3.4.0/css/bootstrap-rtl.css">
        <link rel="stylesheet" href="{{ voyager_asset('css/rtl.css') }}">
    @endif

    <!-- Few Dynamic Styles -->
    <style type="text/css">
        .voyager .side-menu .navbar-header {
            background:{{ config('voyager.primary_color','#22A7F0') }};
            border-color:{{ config('voyager.primary_color','#22A7F0') }};
        }
        .widget .btn-primary{
            border-color:{{ config('voyager.primary_color','#22A7F0') }};
        }
        .widget .btn-primary:focus, .widget .btn-primary:hover, .widget .btn-primary:active, .widget .btn-primary.active, .widget .btn-primary:active:focus{
            background:{{ config('voyager.primary_color','#22A7F0') }};
        }
        .voyager .breadcrumb a{
            color:{{ config('voyager.primary_color','#22A7F0') }};
        }

        /* DISEÑO RESPONSIVE */
        @media (max-width: 750px) {
            .voyager .table > thead > tr > th {
                border-color: #EAEAEA;
                background: #E7EBF2;
            }
            .col-lg-1, .col-lg-10, .col-lg-11, .col-lg-12, .col-lg-2, .col-lg-3, .col-lg-4, .col-lg-5, .col-lg-6, .col-lg-7, .col-lg-8, .col-lg-9, .col-md-1, .col-md-10, .col-md-11, .col-md-12, .col-md-2, .col-md-3, .col-md-4, .col-md-5, .col-md-6, .col-md-7, .col-md-8, .col-md-9, .col-sm-1, .col-sm-10, .col-sm-11, .col-sm-12, .col-sm-2, .col-sm-3, .col-sm-4, .col-sm-5, .col-sm-6, .col-sm-7, .col-sm-8, .col-sm-9, .col-xs-1, .col-xs-10, .col-xs-11, .col-xs-12, .col-xs-2, .col-xs-3, .col-xs-4, .col-xs-5, .col-xs-6, .col-xs-7, .col-xs-8, .col-xs-9 {
                position: relative;
                min-height: 1px;
                padding-left: 0px;
                padding-right: 0px;
            }
            .panel-bordered > .panel-heading > .panel-title {
                padding-bottom: 20px;
                margin-left: 48px;
            }
            .contenedor_browser{
                padding-left: 0px !important;
                padding-right: 0px !important;
            }
            .img_table_responsive{
                width: 65px !important;
                height: 60px !important;
            }
            label>.dataTables_filter{
                width:100%;
                border-radius: 20px;
            }
            .breadcrumb {
                padding: 4px 15px 4px 10px;
                list-style: none;
                background-color: #fff;
                border-radius: 25px;
                border: 1px solid #f9f9f9;
                font-size: 12px;
                margin-bottom: 12px;
            }
            .form-control {
                color: #76838f;
                background-color: #FAFAFA;
                background-image: none;
                border: 1px solid #FAFAFA;
                height: 60px;
            }
            .contenedor_input{
                padding-left: 0px !important;
                padding-right: 0px !important;
            }
            .row {
                margin-left: 0px;
                margin-right: 0px;

            }
            #enviar{
                bottom:0px !important;
                left: 0px !important;
                position: fixed;
                width: 100%;
                opacity: 1;
                text-transform: uppercase;
                font-weight: bold;
                z-index: 1000;
                height: 70px;
                background-color:{{ Voyager::setting(('admin.bg_color'), "#84bd00") }};
            }
            .site-footer-right {
                padding-right: 0px !important;
            }
            .cuerpo_edit_add{
                padding-left: 0px !important;
                padding-right: 0px !important;
            }
            .panel-body, .panel-footer, .panel-title {
                padding-right: 0px!important;
                padding-left: 0px!important;
            }
            /*.app-container .content-container .side-body {
                padding-top: 70px;
                background-color: white;
            }*/
            .app-container .side-body {
                margin-left: 0px !important;
                margin-right: 0px !important;
                background-color: white !important;
            }
            .btn_save{
                width: 100%;


            }
            .title_responsive{
                font-weight: bold;
                color:{{ Voyager::setting(('admin.bg_color'), "#84bd00") }};
            }
            .panel-body>label{
                visibility: hidden ;
            }
            .panel {
                background-color: transparent !important;
                /* border: 1px solid transparent; */
                box-shadow: none !important;
            }
            .voyager .panel {
                margin-bottom: 22px;
                background-color: #fff;
                border: none;
                border-radius: 0px;
                box-shadow: 0 2px 10px rgba(0, 0, 0, .05);
            }
            .panel-body {
                padding: 0px;
            }
            .table-responsive{
                padding-right: 0px;
                padding-left: 0px;
            }
            .panel-bordered > .panel-body {
                padding: 0px;
                overflow: hidden;
            }
            .table-responsive {
                width: 100%;
                margin-bottom: 15px;
                overflow-y: hidden;
                -ms-overflow-style: -ms-autohiding-scrollbar;

            }
            .container, .container-fluid {
                padding-left: 0px;
                padding-right: 0px;
            }
            .panel.widget p {
                margin: 30px 0 0;
                font-size: 20px;
                font-size: 14px;
                color: #DDD;
                display: block;
                max-height: none !important;
            }
            h1 , .page-title > i ,#title_pages{
                color:{{ Voyager::setting(('admin.bg_color'), "#84bd00") }};
            }
            .voyager .breadcrumb a {
                color:{{ Voyager::setting(('admin.bg_color'), "#84bd00") }} !important;

            }
            .hamburger-inner {
                width: 20px;
                height: 2px;
                background: #ffffff;
                display: block;
                border-radius: 10px;
                top: 50%;
                left: 50%;
                margin-left: -10px;
                margin-top: -1px;
                position: absolute;
                transition: all .3s cubic-bezier(.19, 1, .22, 1);
            }
            .hamburger-inner::after {
                width: 19px;
                bottom: -5px;
            }
            .hamburger-inner::after, .hamburger-inner::before {
                width: 20px;
                height: 2px;
                background: #ffffff;
                border-radius: 10px;
                transition: all .5s cubic-bezier(.19, 1, .22, 1);
                position: absolute;
                display: block;
                content: '';
            }

            .voyager .navbar, .voyager .navbar.navbar-default {
                border-bottom: 0;
                box-shadow: 0 0 0;
                opacity: 0.8;
                background: {{ Voyager::setting(('admin.bg_color'), "#84bd00") }};
            }
            #icon-image-navbar{
                display:none;
            }
            .voyager .side-menu.sidebar-inverse {
                background: {{ Voyager::setting(('admin.bg_color'), "#84bd00") }};
                background: linear-gradient(45deg, {{ Voyager::setting(('admin.bg_color'), "#84bd00") }} 0, #21292e 100%);
                filter: progid:DXImageTransform.Microsoft.gradient(startColorstr='#353d47', endColorstr='#21292e', GradientType=1);
                overflow-x: hidden;
                opacity: .95;
                transition: width .5s cubic-bezier(.19, 1, .22, 1);
            }
            .voyager .side-menu.sidebar-inverse .navbar li > a {
                color: #bbc5ce;

            }
            .app-container .content-container .side-menu .navbar-nav li a .title {

                color: white!important;
            }
            .btn-link:focus, .btn-link:hover {
                color: transparent;
            }
            @media (max-width:798px){
                div.dataTables_filter input {
                    width:400px;
                }
            }
            div.dataTables_filter input {
                margin-left: .5em;
                display: flex;
            }
            .dataTables_wrapper .dataTables_filter, .dataTables_wrapper .dataTables_length {
                float: none;
                text-align: center;
            }
            div.dataTables_filter input {
                width: 95%;
            }
            div.dataTables_filter label {
                font-weight: 400;
                white-space: nowrap;
                text-align: center;
            }
            .dataTables_wrapper .dataTables_filter input {
                margin-left: .5em;
                border-radius: 20px;
                box-shadow: 3px 2px 13px gray;
                margin-top: 10px;
            }
            .form-group>img,input[type=file]{
                margin:auto !important;
            }
            .form-group>label,small{
                margin-left: 13px;
            }
            .contenedor_input>div{
                text-align:center;
            }
            .contenedor_input>div>img{
                margin:auto;
            }
            .contenedor_input>div>a{
                position: unset !important;
            }
            .voyager .btn.btn-success {

                margin-left: 90px;
            }
            ul.checkbox {
                padding-left: 27px !important;
            }
            .panel-footer{
                text-align:center;
            }
            .dataTables_filter>label{
                width: 100%!important;
            }
            .toggle.btn {
                margin-left: 13px !important;
            }
            .btn, .pagination {
                margin-bottom: 0px !important;
            }
            body.login .form-group-default {
                background-color: #000;

            }





        }
    </style>

    @if(!empty(config('voyager.additional_css')))<!-- Additional CSS -->
        @foreach(config('voyager.additional_css') as $css)<link rel="stylesheet" type="text/css" href="{{ asset($css) }}">@endforeach
    @endif

    @yield('head')
</head>

<body class="voyager @if(isset($dataType) && isset($dataType->slug)){{ $dataType->slug }}@endif">

<div id="voyager-loader">
    <?php $admin_loader_img = Voyager::setting('admin.loader', ''); ?>
    @if($admin_loader_img == '')
        <img src="{{ voyager_asset('images/logo-icon.png') }}" alt="Voyager Loader">
    @else
        <img src="{{ Voyager::image($admin_loader_img) }}" alt="Voyager Loader">
    @endif
</div>

<?php
if (\Illuminate\Support\Str::startsWith(Auth::user()->avatar, 'http://') || \Illuminate\Support\Str::startsWith(Auth::user()->avatar, 'https://')) {
    $user_avatar = Auth::user()->avatar;
} else {
    $user_avatar = Voyager::image(Auth::user()->avatar);
}
?>

<div class="app-container">
    <div class="fadetoblack visible-xs"></div>
    <div class="row content-container">
        @include('voyager::dashboard.navbar')
        @include('voyager::dashboard.sidebar')
        <script>
            (function(){
                    var appContainer = document.querySelector('.app-container'),
                        sidebar = appContainer.querySelector('.side-menu'),
                        navbar = appContainer.querySelector('nav.navbar.navbar-top'),
                        loader = document.getElementById('voyager-loader'),
                        hamburgerMenu = document.querySelector('.hamburger'),
                        sidebarTransition = sidebar.style.transition,
                        navbarTransition = navbar.style.transition,
                        containerTransition = appContainer.style.transition;

                    sidebar.style.WebkitTransition = sidebar.style.MozTransition = sidebar.style.transition =
                    appContainer.style.WebkitTransition = appContainer.style.MozTransition = appContainer.style.transition =
                    navbar.style.WebkitTransition = navbar.style.MozTransition = navbar.style.transition = 'none';

                    if (window.innerWidth > 768 && window.localStorage && window.localStorage['voyager.stickySidebar'] == 'true') {
                        appContainer.className += ' expanded no-animation';
                        loader.style.left = (sidebar.clientWidth/2)+'px';
                        hamburgerMenu.className += ' is-active no-animation';
                    }

                   navbar.style.WebkitTransition = navbar.style.MozTransition = navbar.style.transition = navbarTransition;
                   sidebar.style.WebkitTransition = sidebar.style.MozTransition = sidebar.style.transition = sidebarTransition;
                   appContainer.style.WebkitTransition = appContainer.style.MozTransition = appContainer.style.transition = containerTransition;
            })();
        </script>
        <!-- Main Content -->
        <div class="container-fluid">
            <div class="side-body padding-top">
                @yield('page_header')
                <div id="voyager-notifications"></div>
                @yield('content')
            </div>
        </div>
    </div>
</div>
@include('voyager::partials.app-footer')

<!-- Javascript Libs -->


<script type="text/javascript" src="{{ voyager_asset('js/app.js') }}"></script>

<script>
    @if(Session::has('alerts'))
        let alerts = {!! json_encode(Session::get('alerts')) !!};
        helpers.displayAlerts(alerts, toastr);
    @endif

    @if(Session::has('message'))

    // TODO: change Controllers to use AlertsMessages trait... then remove this
    var alertType = {!! json_encode(Session::get('alert-type', 'info')) !!};
    var alertMessage = {!! json_encode(Session::get('message')) !!};
    var alerter = toastr[alertType];

    if (alerter) {
        alerter(alertMessage);
    } else {
        toastr.error("toastr alert-type " + alertType + " is unknown");
    }
    @endif
</script>
@include('voyager::media.manager')
@yield('javascript')
@stack('javascript')
@if(!empty(config('voyager.additional_js')))<!-- Additional Javascript -->
    @foreach(config('voyager.additional_js') as $js)<script type="text/javascript" src="{{ asset($js) }}"></script>@endforeach
@endif

</body>
</html>
