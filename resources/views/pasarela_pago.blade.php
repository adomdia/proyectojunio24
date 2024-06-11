@extends('layouts.app')
@section('last_head')
    {{--Aquí estilos solo para esta página--}}
@endsection
@section('content')
<div style="margin-top:150px">
    <div class="container" id="main-container">
        @if(session()->has('message-error'))
            <br>
            <div class="alert alert-danger">
                {{session()->get('message-error')}}
            </div>
        @endif
    
        <div style="text-align:center;display: flex;justify-content: center;">
            <h1 style="color:black">{{$servicio->title}}</h1>
        </div>
        <div style="text-align:center;display: flex;justify-content: center;">
            <h1 style="color:black">{{$servicio->price}}€ + IVA 21%</h1>
        </div>
        
        <div class="tarjetas-aceptadas" style="text-align:center;display: flex;justify-content: center;">

            <img src="{{asset('images/mastercard.png')}}" alt="Mastercard" style="max-width:100px;margin-right:50px">
            <img src="{{asset('images/visa.png')}}" alt="Visa" style="max-width:100px;">
        </div>
        <form id="payment-form" action="{{route('confirmar-pago')}}" method="POST" style=" max-width: 450px;margin: auto;">
            @csrf
            <input hidden id="sus-price" name="price" value="{{$servicio->price}}">
            <input hidden id="sus-name" name="servicio_name" value="{{$servicio->title}}">        
            <input hidden id="sus-id" name="servicio_id" value="{{$servicio->id}}">
            <div class="form-group" style=" text-align: center; margin-top: 50px;">
                <h4 for="titularTarjeta" class="heading-2 factura" style="margin-left:0px; color:black">Nombre</h4>
                <input type="text" class="form-control-custom text-input" required style="max-width: 300px;" name="name" value="{{Auth()->user()->name}}">
            </div>
            
            @if(Auth()->user()->user_dni === null)
            <div class="form-group" style=" text-align: center; margin-top: 50px;">
                <h4 for="titularTarjeta" class="heading-2 factura" style="margin-left:0px; color:black">DNI</h4>
                <input type="text" class="form-control-custom text-input" required style="max-width: 300px;" name="user_dni" >
            </div>
            @endif
            <div class="form-group" style="text-align: center">
              <h4 for="titularTarjeta" class="heading-2 factura" style="margin-left:0px;margin-top:30px;color:black"><strong>Dirección de facturación</strong></h4>
              <div class="form-group">
                <h4 for="titularTarjeta" class="heading-2 factura" style="margin-left:0px;color:black">Calle</h4>
                <input type="text" class="form-control-custom text-input" required style="max-width: 300px;" name="street_name" value="">

                <h4 for="titularTarjeta" class="heading-2 factura" style="margin-left:0px;color:black">Ciudad</h4>
                <input type="text" class="form-control-custom text-input" required style="max-width: 300px;" name="city_name" value="">

                <h4 for="titularTarjeta" class="heading-2 factura" style="margin-left:0px;color:black">Provincia</h4>
                <input type="text" class="form-control-custom text-input" required style="max-width: 300px;" name="province_name" value="">
              </div>
            </div>   
            <div class="form-group" style="text-align: center">
              <h3 for="card-element" style="margin-top:50px;color:black">Datos de la tarjeta</h3>
              <div id="card-element" style="text-align: center;max-width: 450px" >
                  <!-- A Stripe Element will be inserted here. -->
              </div>
              <button type="submit" class="btn btn-primary ml-3 mt-5 text-white" style="margin-bottom:150px;background-color: #2d2196;border-color: #2d2196;">Proceder al pago</button>
              <!-- Used to display form errors. -->
              <div id="card-errors" role="alert"></div>
          </div>

        </form>
    </div>
</div>


@endsection
@section('javascript')

<script src="https://js.stripe.com/v3/"></script>
<script>
  var stripe = Stripe('{{ env('STRIPE_KEY') }}');

  var elements = stripe.elements();

  var style = {
      base: {
          fontSize: '16px',
          color: '#32325d',
      }
  };
  var card = elements.create('card', {style: style});

  card.mount('#card-element');

  card.addEventListener('change', function(event) {
      var displayError = document.getElementById('card-errors');
      if (event.error) {
          displayError.textContent = event.error.message;
      } else {
          displayError.textContent = '';
      }
  });

  var form = document.getElementById('payment-form');
  form.addEventListener('submit', function(event) {
      event.preventDefault();

      stripe.createToken(card).then(function(result) {
          if (result.error) {
              var errorElement = document.getElementById('card-errors');
              errorElement.textContent = result.error.message;
          } else {
              stripeTokenHandler(result.token);
          }
      });
  });

  function stripeTokenHandler(token) {
      var form = document.getElementById('payment-form');
      var hiddenInput = document.createElement('input');
      hiddenInput.setAttribute('type', 'hidden');
      hiddenInput.setAttribute('name', 'stripeToken');
      hiddenInput.setAttribute('value', token.id);
      form.appendChild(hiddenInput);

      form.submit();
  }
</script>
@endsection
