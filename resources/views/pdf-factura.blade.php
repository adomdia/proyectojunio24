<head class="style-blue-1  custom-colors-enabled  custom_fonts comps live_website">
    <!-- This page is running on Unicorn Platform. -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">


    <link rel="stylesheet" href="{{asset('static/css/main.css')}}">
    {{-- <link rel="stylesheet" href="{{asset('owl-carousel/css/owl.carousel.min.css')}}"> --}}
    <script src="{{asset('static/js/main.js')}}" defer></script>

    <link href="{https://fonts.googleapis.com/css?family=Noto+Sans:700|Noto+Sans:400,700&display=swap}" rel="stylesheet" />
    <style>
        .custom_fonts .custom-google-fonts-enabled * {
            font-family: 'Noto Sans', Helvetica, sans-serif;
        }

        .custom_fonts .custom-google-fonts-enabled h1,
        .custom_fonts .custom-google-fonts-enabled h2,
        .custom_fonts .custom-google-fonts-enabled h3,
        .custom_fonts .custom-google-fonts-enabled h4,
        .custom_fonts .custom-google-fonts-enabled h5,
        .custom_fonts .custom-google-fonts-enabled h6 {
            font-family: 'Noto Sans', Helvetica, serif;
        }

    </style>


    <meta property="og:type" content="website">




    <meta name="twitter:url" content="">
    <meta property="og:url" content="">
    <script src="https://code.jquery.com/jquery-3.6.1.min.js" integrity="sha256-o88AwQnZB+VDvE9tvIXrMQaPlFFSUTR+nldQm1LuPXQ=" crossorigin="anonymous"></script>
    <script src="{{asset('owl-carousel/js/owl.carousel.js')}}"></script>

    <style>
        /** Define the margins of your page **/
        @page {
            margin: 100px 25px;
        }

        header {
            width: 100%;
            text-align: center;
            position: fixed;
            top: -60px;
            left: 0px;
            right: 0px;
            height: 50px;
        }

        footer {
            width: 100%;
            text-align: center;
            position: fixed; 
            bottom: -60px; 
            left: 0px; 
            right: 0px;
            height: 50px; 
        }
    </style>
</head>
<body style="font-family: 'Noto Sans', Helvetica, sans-serif;" id="59300-126855">
    <header > 
        <div style="width: 50%; text-align: left;position:relative;left:100px:background-color:#2d2196">
            <img src="images/logo-icon-color.png" loading="lazy" width="150px" alt="">
        </div>
    </header>


<div style="margin-top: 90px; margin-bottom: 100px; font-size: 12px; display: flex;">
    <!-- Datos del cliente -->
    <div style="margin-left:50px">
        <h2 style="padding-left:30px; background-color:#2d2196; width:620px; color: white">Cliente:</h2>
        <div style="margin-left:50px">
            <p><strong>Nombre:</strong> {{ $user->name }}</p>
            <p><strong>DNI:</strong> {{ $user->user_dni }}</p>
            <p><strong>Dirección:</strong> {{ $userStreet }}, {{ $userCity }} ({{ $userProvince }})</p>
        </div>
    </div>
    <!-- Datos del vendedor -->
    <div style="margin-left:50px">
        <h2 style="padding-left:30px; background-color:#2d2196; width:620px; color: white">PlayTogether:</h2>
        <div style="margin-left:50px">
            <p><strong>Nombre:</strong> {{ $playtogether['name'] }}</p>
            <p><strong>Dirección:</strong> {{ $playtogether['address'] }}</p>
            <p><strong>NIF:</strong>{{ $playtogether['nif'] }} </p>
        </div>
    </div>
</div>


<div style="margin-top: 50px; margin-bottom: 100px;font-size:12px">

    <div style="margin-left:50px">
        <h2 style="padding-left:30px; background-color:#2d2196; width:620px; color: white">Detalles de la Factura:</h2>
        <div style="margin-left:50px">
            <p><strong>Concepto:</strong> {{$concepto}}</p>
            <p><strong>Fecha:</strong> {{$fecha}} </p>
            <p><strong>Precio:</strong> {{$precioSinIva}} €</p>
            <p><strong>IVA 21%:</strong> {{$iva}} €</p>
            <p style="padding:15px;width:150px;background-color:#2d2196;color: white"><strong>TOTAL:</strong> {{$precio }} €</p>
        </div>
    </div>
</div>







</body>
