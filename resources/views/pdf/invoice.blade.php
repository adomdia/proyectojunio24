<!DOCTYPE html>
<html>
<head>
    <title>Factura</title>

</head>
<style type="text/css">
    /* cyrillic-ext */

    body {
        font-family: Sans-serif;
    }
    h1, h2, h3, h4, h5, h6, p, label, .btn, a,span,label,td,th {
        font-family: Sans-serif;
        color:black;
    }
    .m-0 {
        margin: 0px;
    }
    .p-0 {
        padding: 0px;
    }
    .pt-5 {
        padding-top: 5px;
    }
    .mt-10 {
        margin-top: 10px;
    }
    .text-center {
        text-align: center !important;
    }
    .w-100 {
        width: 100%;
    }
    .w-50 {
        width: 50%;
    }
    .w-85 {
        width: 85%;
    }
    .w-15 {
        width: 15%;
    }
    .logo img {
        width: 45px;
        height: 45px;
        padding-top: 30px;
    }
    .logo span {
        margin-left: 8px;
        top: 19px;
        position: absolute;
        font-weight: bold;
        font-size: 25px;
    }
    .gray-color {
        color: #5D5D5D;
    }
    .text-bold {
        font-weight: bold;
    }
    .border {
        border: 1px solid black;
    }
    table tr, th, td {
        border: 1px solid #d2d2d2;
        border-collapse: collapse;
        padding: 7px 8px;
    }
    table tr th {
        background: #F4F4F4;
        font-size: 15px;
    }
    table tr td {
        font-size: 13px;
    }
    table {
        border-collapse: collapse;
    }
    .box-text p {
        line-height: 10px;
    }
    .float-left {
        float: left;
    }
    .total-part {
        font-size: 16px;
        line-height: 12px;
    }
    .total-right p {
        padding-right: 20px;
    }
</style>
<body>
<div class="head-title">
    <h1 class="text-center m-0 p-0">Factura</h1>
</div>
<div class="add-detail mt-10">

    <div class="w-50 float-left mt-10">

        <p class="m-0 pt-5 text-bold w-100">Nº de factura: <span class="gray-color">#3432432</span></p>

        <p class="m-0 pt-5 text-bold w-100">Nº de pedido: <span class="gray-color">12321423</span></p>

        <p class="m-0 pt-5 text-bold w-100">Fecha del pedido: <span class="gray-color">{{\Carbon\Carbon::now()->format('d-m-Y H:i:s')}}</span></p>

    </div>

    <div class="w-50 float-left logo mt-50">

        <img style="width: 90px;height: 90px" alt="Logo cliente" src="{{asset('images/large-logo-icon.png')}}">

    </div>

    <div style="clear: both;"></div>

</div>
<div class="table-section bill-tbl w-100 mt-10">

    <table class="table w-100 mt-10">
        <tr>
            <th class="w-100">Datos del cliente</th>
        </tr>
        <tr>
            <td>
                <div class="box-text">
                    <p>Nombre y apellidos: xxxx</p>
                    <p>NIF: xxxxx</p>
                    <p>Dirección: xxxxx</p>
                    <p>Dirección de envío: xxxxx</p>
                    <p>Teléfono: xxxxxx</p>
                    <p>Email: xxxx</p>
                </div>
            </td>
        </tr>
    </table>
</div>
<div class="table-section bill-tbl w-100 mt-10">
    <table class="table w-100 mt-10">
        <tr>
            <th class="w-50">Método de pago</th>
            <th class="w-50">Método de envío</th>
        </tr>
        <tr>
            <td>Tarjeta de crédito</td>
            <td>-</td>
        </tr>
    </table>
</div>
<div class="table-section bill-tbl w-100 mt-10">
    <table class="table w-100 mt-10">
        <tr>
            <th class="w-100">Modificaciones / Indicaciones</th>
        </tr>
        <tr>
            <td>xxxxx</td>
        </tr>
    </table>
</div>
<div class="table-section bill-tbl w-100 mt-10">
    <table class="table w-100 mt-10">
        <tr>
            <th class="w-50">ID</th>
            <th class="w-50">Nombre del producto</th>
            <th class="w-50">Precio</th>
            <th class="w-50">Cantidad</th>
            <th class="w-50">Color</th>
            <th class="w-50">Talla</th>
            <th class="w-50">Subtotal</th>

        </tr>

        <tr align="center">
            <td>xxxxxxxxx</td>
            <td>xxxxxxxxx</td>
            <td>xxxxxxxxx</td>
            <td>xxxxxxxxx</td>
            <td>xxxxxxxxx</td>
            <td>xxxxxxxxx</td>
            <td>xxxxxxxxx</td>
        </tr>
        <tr align="center">
            <td>yyyyyyyyy</td>
            <td>yyyyyyyyy</td>
            <td>yyyyyyyyy</td>
            <td>yyyyyyyyy</td>
            <td>yyyyyyyyy</td>
            <td>yyyyyyyyy</td>
            <td>yyyyyyyyy</td>
        </tr>

        <tr>
            <td colspan="7">
                <div class="total-part">
                    <div class="total-left w-85 float-left" align="right">
                        <p>Subtotal</p>
                        <p>Impuestos (21%)</p>
                        <p>Total</p>
                    </div>
                    <div class="total-right w-15 float-left text-bold" align="right">
                        <p>{{number_format(10*0.79,2)}}€</p>
                        <p>{{number_format(10*0.21,2)}}€</p>
                        <p>{{number_format(10,2)}}€</p>
                    </div>
                    <div style="clear: both;"></div>
                </div>
            </td>
        </tr>
    </table>
</div>
</body>
</html>
