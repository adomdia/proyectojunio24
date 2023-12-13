<!DOCTYPE html>
<html lang="{{ config('app.locale') }}" @if (config('voyager.multilingual.rtl')) dir="rtl" @endif>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="robots" content="none"/>
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0, minimal-ui">
    <meta name="description" content="admin login">
    <title>Admin - {{ Voyager::setting("admin.title") }}</title>
    <link rel="stylesheet" href="{{ voyager_asset('css/app.css') }}">
    @if (config('voyager.multilingual.rtl'))
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-rtl/3.4.0/css/bootstrap-rtl.css">
        <link rel="stylesheet" href="{{ voyager_asset('css/rtl.css') }}">
    @endif
    <style>
        body {

            background-color: {{ Voyager::setting("admin.bg_color", "#FFFFFF" ) }};
        }

        body.login .login-sidebar {

            border-top: 5px solid{{ Voyager::setting(('admin.bg_color'),'#A5B793') }};
        }

        .contenedor_logo {
            margin-top: 40vh;
            color: #fff;
        }

        body.login .login-button {
            display: block;
            background-color: {{ Voyager::setting(('admin.bg_color'), "#18a71e"  ) }};
            background: #18a71e;
            text-align: center;
            color: #eee;
            padding: 12px 20px;
            outline: 0 !important;

            border: 0;
            width: auto;
            border-radius: 2px;
            float: left;
            font-size: 11px;
            font-weight: 400;
            text-transform: uppercase;
            transition: width .3s ease;
        }

        @media (max-width: 760px) {

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

            /* firefox 19+ */
            :-ms-input-placeholder {
                color: #fff !important;
                font-weight: bold !important;
                opacity: 1 !important;
            }

            /* ie */
            input:-moz-placeholder {
                color: #fff !important;
                font-weight: bold !important;
                opacity: 1 !important;
            }

            body.login .login-sidebar {
                border-top: 0px !important;
                background-color: {{ Voyager::setting("admin.bg_color", "#FFFFFF" ) }};
                /* border-left: 5px solid
            {{ config('voyager.primary_color','#22A7F0') }} ;*/
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
                color:black;
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
                background-color: {{ Voyager::setting('admin.bg_login_input','#fff')  }};
                position: relative;

                border-radius: 0px;
                padding: 7px 12px 4px;
                overflow: hidden;
                transition: border .3s ease-in;
                font-weight: 400;
                color: black;


            }

            body.login .blanco_t {
                background-color: #ffffff8c;
                opacity: 0.8;
                color: white;
            }
            body.login .faded-bg {
                position: absolute;
                top: 0;
                left: 0;
                right: 0;
                bottom: 0;
                background: transparent;
                /* background: -webkit-gradient(linear,left top,left bottom,from(rgba(21,21,28,0)),color-stop(40%,rgba(21,21,28,.1)),color-stop(55%,rgba(21,21,28,.3)),color-stop(75%,rgba(21,21,28,.61)),to(#15151c)); */
                /* background: linear-gradient(180deg,rgba(21,21,28,0) 0,rgba(21,21,28,.1) 40%,rgba(21,21,28,.3) 55%,rgba(21,21,28,.61) 75%,#15151c); */
                /* filter: progid:DXImageTransform.Microsoft.gradient(startColorstr="#0015151c",endColorstr="#15151c",GradientType=0); */
            }
            .logo_login_responsive{
                max-width: 180px !important;
            }

        }
        .logo_login_responsive{
            max-width: 180px !important;
            padding-top: 0px !important;
        }

        body.login .form-group-default.focused {
            /*border-color:
        {{ config('voyager.primary_color','#22A7F0') }} ;*/
            border-color: {{ config('admin.bg_color','#22A7F0') }};
        }

        .login-button, .bar:before, .bar:after {
            background: {{ config('voyager.primary_color','#22A7F0') }};
        }

        {{--
         body.login .logo-title-container {
            margin-top: 0;
            bottom: 42%;
            left: 25%;
        }

        @media (max-width: 790px) {
            body.login .logo-title-container {
                bottom: 42%;
                left: 5%;
            }
        }

        body.login .logo {
            height: auto;
            max-width: 156px;
            margin: 0 auto;
            padding-top: 0;
            padding-bottom: 0;
            margin-left: 92px;
            margin-bottom: 1em;
        }

        body.login .copy {
            width: auto;
            padding: 0;
        }
        --}}

    </style>

    <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,700" rel="stylesheet">
</head>
<body class="login" style="overflow-y: hidden">
<div class="container-fluid">
    <div class="row">
        <div class="faded-bg animated"></div>
        <div class=" col-xs-12 col-sm-8 col-lg-8 contenedor_logo">
            <div class="row" style="justify-content: center">
                <div class="col-xs-12 col-md-12" style="text-align: center">
                    <?php $admin_logo_img = Voyager::setting('admin.icon_image', ''); ?>
                    @if($admin_logo_img == '')
                        <img class="img-responsive flip logo animated fadeIn logo_login_responsive"
                             src="{{ asset('vendor/tcg/voyager/assets/images/logo-icon-light.png') }}" alt="Logo Icon">
                    @else
                        <img class="img-responsive flip logo  animated fadeIn logo_login_responsive"
                             src="{{ Voyager::image($admin_logo_img) }}" alt="Logo Icon">
                    @endif

                </div>
                <div class="col-xs-12 col-md-12">
                    <div class="animated fadeIn row" style="text-align: center">
                        {{-- <h1>{{ Voyager::setting('admin.title', 'Voyager') }}</h1>--}}
                        <p style="margin-top:20px">{{ Voyager::setting('admin.description', __('voyager::login.welcome')) }}</p>
                    </div>
                </div>

            </div>

        </div>

        <div class="col-xs-12 col-sm-4 col-lg-4 login-sidebar">

            <div class="login-container">

                <p class="hidden-xs">{{ __('voyager::login.signin_below') }}</p>

                <form action="{{ route('voyager.login') }}" method="POST">
                    {{ csrf_field() }}
                    <div class="" style="background-color: white">


                        <div class="form-group form-group-default fondo-transparente-cont-opaco" id="emailGroup">
                            <label class="">{{ __('voyager::generic.email') }}</label>
                            <div class="controls">
                                <input type="text" name="email" id="email" value="{{ old('email') }}"
                                       class="form-control" required>
                            </div>
                        </div>
                    </div>
                    <div class="" style="background-color: white">
                        <div class="form-group form-group-default fondo-transparente-cont-opaco" id="passwordGroup">
                            <label class="">{{ __('voyager::generic.password') }}</label>
                            <div class="controls ">
                                <input type="password" name="password"
                                       class="form-control" required>
                            </div>
                        </div>
                    </div>


                    <div class="" style="background-color: black">
                        <button type="submit" class="btn btn-block login-button" style="background-color:{{ Voyager::setting('admin.bg_login_button','#FFFFFF' ) }}">

                            <span class="signingin hidden"><span
                                    class="voyager-refresh"></span> {{ __('voyager::login.loggingin') }}...</span>
                            <span class="signin"
                                  style="opacity: 1;">ACCEDER{{--{{ __('voyager::generic.login') }}--}}</span>
                        </button>
                    </div>


                </form>

                <div style="clear:both"></div>

                @if(!$errors->isEmpty())
                    <div class="alert alert-red">
                        <ul class="list-unstyled">
                            @foreach($errors->all() as $err)
                                <li>{{ $err }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif

            </div> <!-- .login-container -->

        </div> <!-- .login-sidebar -->
    </div> <!-- .row -->
</div> <!-- .container-fluid -->
<script>
    var btn = document.querySelector('button[type="submit"]');
    var form = document.forms[0];
    var email = document.querySelector('[name="email"]');
    var password = document.querySelector('[name="password"]');
    btn.addEventListener('click', function (ev) {
        if (form.checkValidity()) {
            btn.querySelector('.signingin').className = 'signingin';
            btn.querySelector('.signin').className = 'signin hidden';
        } else {
            ev.preventDefault();
        }
    });
    email.focus();
    document.getElementById('emailGroup').classList.add("focused");

    // Focus events for email and password fields
    email.addEventListener('focusin', function (e) {
        document.getElementById('emailGroup').classList.add("focused");
    });
    email.addEventListener('focusout', function (e) {
        document.getElementById('emailGroup').classList.remove("focused");
    });

    password.addEventListener('focusin', function (e) {
        document.getElementById('passwordGroup').classList.add("focused");
    });
    password.addEventListener('focusout', function (e) {
        document.getElementById('passwordGroup').classList.remove("focused");
    });

</script>
</body>
</html>
