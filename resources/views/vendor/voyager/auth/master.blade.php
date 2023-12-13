<!DOCTYPE html>
<html lang="{{ config('app.locale') }}" dir="{{ __('voyager::generic.is_rtl') == 'true' ? 'rtl' : 'ltr' }}">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="robots" content="none" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0, minimal-ui">
    <meta name="description" content="admin login">
    <title>@yield('title', 'Admin - '.Voyager::setting("admin.title"))</title>
    <link rel="stylesheet" href="{{ voyager_asset('css/app.css') }}">
    @if (__('voyager::generic.is_rtl') == 'true')
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-rtl/3.4.0/css/bootstrap-rtl.css">
        <link rel="stylesheet" href="{{ voyager_asset('css/rtl.css') }}">
    @endif
    <style>
        body {
            background-image:url('{{ Voyager::image( Voyager::setting("admin.bg_image"), voyager_asset("images/bg.jpg") ) }}');
            background-color: {{ Voyager::setting("admin.bg_color", "#FFFFFF" ) }};
        }
        body.login .login-sidebar {
            border-top:5px solid {{ config('voyager.primary_color','#22A7F0') }};
        }
        @media (max-width: 767px) {
            body.login .login-sidebar {
                border-top:0px !important;
                border-left:5px solid {{ config('voyager.primary_color','#22A7F0') }};
            }
        }
        body.login .form-group-default.focused{
            border-color:{{ config('voyager.primary_color','#22A7F0') }};
        }
        .login-button, .bar:before, .bar:after{
            background:{{ config('voyager.primary_color','#22A7F0') }};
        }
        .remember-me-text{
            padding:0 5px;
        }
       /* @media (max-width: 760px) {

            .fondo-transparente-cont-opaco {
                background-color: rgba(255, 255, 255, 0.62);
                color: #ffffff;
            }

            ::-webkit-input-placeholder {
                color: #fff !important;
                font-weight: bold !important;
                opacity: 1 !important;
            }

            ::-moz-placeholder {
                color: #fff !important;
                font-weight: bold !important;
                opacity: 1 !important;
            }

            !* firefox 19+ *!
            :-ms-input-placeholder {
                color: #fff !important;
                font-weight: bold !important;
                opacity: 1 !important;
            }

            !* ie *!
            input:-moz-placeholder {
                color: #fff !important;
                font-weight: bold !important;
                opacity: 1 !important;
            }

            body.login .login-sidebar {
                border-top: 0px !important;
                background-color: {{ Voyager::setting("admin.bg_color", "#FFFFFF" ) }};
                !* border-left: 5px solid
            {{ config('voyager.primary_color','#22A7F0') }} ;*!
            }

            body.login .login-container {
                position: absolute;
                z-index: 10;
                width: 100%;
                padding: 0px;
                top: 20%;

            }

            body.login .form-group-default .form-control {
                border: none;
                height: 40px;
                color:white;
                padding: 0;
                margin-top: -4px;
                background: 0 0;
            }

            .contenedor_logo {
                margin-top: 12%;
            }

            body.login .login-button {
                display: block;
                text-align: center;
                margin-top: 5%;
                color: #eee;
                background:{{ Voyager::setting('admin.bg_login_button','#22A7F0')  }};
                padding: 12px 20px;
                outline: 0 !important;

                border: 0;
                width: 100%;
                border-radius: 2px;
                float: left;
                font-size: 18px;
                font-weight: bold;
                text-transform: uppercase;
                transition: width .3s ease;
            }

            body.login .form-group-default {
                background-color: {{ Voyager::setting('admin.bg_login_input','#22A7F0')  }};
                position: relative;

                border-radius: 0px;
                padding: 7px 12px 4px;
                overflow: hidden;
                transition: border .3s ease-in;
                font-weight: 400;
                color: white;


            }

            body.login .blanco_t {
                background-color: #ffffff8c;
                opacity: 0.8;
                color: white;
            }

        }*/

        body.login .form-group-default.focused {
            /*border-color:
        {{ config('voyager.primary_color','#22A7F0') }} ;*/
            border-color: {{ config('admin.bg_color','#22A7F0') }};
        }

        .login-button, .bar:before, .bar:after {
            background: {{ config('voyager.primary_color','#22A7F0') }};
        }


    </style>

    @yield('pre_css')
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,700" rel="stylesheet">
</head>
<body class="login">
<div class="container-fluid">
    <div class="row">
        <div class="faded-bg animated"></div>
        <div class="hidden-xs col-sm-7 col-md-8">
            <div class="clearfix">
                <div class="col-sm-12 col-md-10 col-md-offset-2">
                    <div class="logo-title-container">
                        <?php $admin_logo_img = Voyager::setting('admin.icon_image', ''); ?>
                        @if($admin_logo_img == '')
                            <img class="img-responsive pull-left flip logo hidden-xs animated fadeIn" src="{{ voyager_asset('images/logo-icon-light.png') }}" alt="Logo Icon">
                        @else
                            <img class="img-responsive pull-left flip logo hidden-xs animated fadeIn" src="{{ Voyager::image($admin_logo_img) }}" alt="Logo Icon">
                        @endif
                        <div class="copy animated fadeIn">
                            <h1>{{ Voyager::setting('admin.title', 'Voyager') }}</h1>
                            <p>{{ Voyager::setting('admin.description', __('voyager::login.welcome')) }}</p>
                        </div>
                    </div> <!-- .logo-title-container -->
                </div>
            </div>
        </div>

        <div class="col-xs-12 col-sm-5 col-md-4 login-sidebar">

           @yield('content')

        </div> <!-- .login-sidebar -->
    </div> <!-- .row -->
</div> <!-- .container-fluid -->
@yield('post_js')
</body>
</html>
