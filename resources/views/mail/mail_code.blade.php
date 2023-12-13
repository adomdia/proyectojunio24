<html>
<head>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/css/bootstrap.min.css" rel="stylesheet"
          integrity="sha384-eOJMYsd53ii+scO/bJGFsiCZc+5NDVN2yr8+0RDqr0Ql0h+rP48ckxlpbzKgwra6" crossorigin="anonymous">
</head>
<body>
<div class="container">
    <div class="row">
        <div class="col-12 col-md-8" style="margin: auto;text-align: center">
            <img class="img-responsive" style="width:25%" src="">
        </div>
        <div class="col-md-8" style="margin: auto">
            <h3>Has recibido un código de verificación para tu usuario.</h3><br>

            <p>
                Email:   <span>{{$email}}</span>
            </p>

            <h4>Introduzca el siguiente código para verificar su usuario<h4><br>

            <p>
                Código:  <h4>{{$code}}<h4>
            </p>
        </div>
        <div class="col-md-8 bg-light" style="margin: auto">
            <span></span>
            <span style="font-weight: bold"> Este email ha sido generado de forma automática, por favor, no responda a él.</span>
        </div>
    </div>
</div>
</body>
</html>
