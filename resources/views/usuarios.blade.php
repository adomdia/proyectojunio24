@extends('layouts.app')
@section('last_head')
    {{--Aquí estilos solo para esta página--}}
@endsection
@section('content')

<div class="container mt-5" style="padding-top: 50px">

    <div class="row">
        @if(!$usuarios->isEmpty())
        @foreach($usuarios as $usuario)
        <div class="col-md-4 d-flex justify-content-center" style="margin-bottom: 50px">
            <div class="card" style="max-width: 260px">
                <a href="{{route('guest_profile', $usuario->id)}}" style="text-decoration: none;">
                <img src="{{Voyager::image($usuario->avatar)}}" class="card-img-top" alt="Avatar Usuario 1">
                <div class="card-body">
                    <h5 class="card-title" style="color:black">{{$usuario->name}}</h5></a>
                    <div class="d-flex justify-content-center">
                        <form id="solicitudForm_{{ $usuario->id }}" action="{{ route('send_solicitude') }}" method="post">
                            @csrf
                            <input type="hidden" name="query" value="{{ $usuario->id }}">
                            <button type="button" class="btn btn-primary enviar-solicitud ml-3" data-userid="{{ $usuario->id }}">Enviar solicitud</button>
                        </form>
                    
                        <form id="cancelarSolicitudForm_{{ $usuario->id }}" action="{{ route('cancel_solicitude') }}" method="post" style="display: none;">
                            @csrf
                            <input type="hidden" name="query" value="{{ $usuario->id }}">
                            <button type="button" class="btn btn-danger cancelar-solicitud ml-3" data-userid="{{ $usuario->id }}">Cancelar solicitud</button>
                        </form>
                    
                        <form id="bloqueoForm_{{ $usuario->id }}" action="{{ route('block_user') }}" method="post">
                            @csrf
                            <input type="hidden" name="query" value="{{ $usuario->id }}">
                            <button type="button" class="btn btn-danger bloquear-usuario ml-3" data-userid="{{ $usuario->id }}">Bloquear</button>
                        </form>
                    
                        <form id="desbloqueoForm_{{ $usuario->id }}" action="{{ route('unblock_user') }}" method="post" style="display: none;">
                            @csrf
                            <input type="hidden" name="query" value="{{ $usuario->id }}">
                            <button type="button" class="btn btn-success desbloquear-usuario ml-3" data-userid="{{ $usuario->id }}">Desbloquear</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        @endforeach
        @else
        <div class="page-component__wrapper" style="z-index: 11;padding-top:150px;padding-bottom:70px;display:flex;justify-content:center">

            <h2 style="color:black">No tienes solicitudes pendientes</h2>
    
        </div>
        @endif

    </div>
</div>

<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.10.2/dist/umd/popper.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>

<script>
    $(document).ready(function () {
        var userId = "{{ $usuario->id ?? null}}";
        var formId = '#solicitudForm_' + userId;
        var cancelarFormId = '#cancelarSolicitudForm_' + userId;
        var bloqueoFormId = '#bloqueoForm_' + userId;
        var desbloqueoFormId = '#desbloqueoForm_' + userId;

        // Obtener el estado de amistad
        $.ajax({
            type: 'GET',
            url: '{{url("/get_friendship_status/")}}/' + userId,
            success: function (response) {
                console.log(response);

                // Mostrar o ocultar formularios según el estado de amistad
                if (response.friendshipStatus) {
                    $(formId).hide();
                    $(cancelarFormId).show();
                } else {
                    $(formId).show();
                    $(cancelarFormId).hide();
                }

                // Mostrar o ocultar formularios según el estado de bloqueo
                if (response.blockedStatus) {
                    $(bloqueoFormId).hide();
                    $(desbloqueoFormId).show();
                } else {
                    $(bloqueoFormId).show();
                    $(desbloqueoFormId).hide();
                }
            },
            error: function (error) {
                console.log(error);
            }
        });

        // Manejar clic en el botón de enviar solicitud
        $('.enviar-solicitud').click(function () {
            var button = $(this);
            $.ajax({
                type: 'POST',
                url: $(formId).attr('action'),
                data: $(formId).serialize(),
                success: function (response) {
                    console.log(response);
                    $(formId).hide();
                    $(cancelarFormId).show();
                },
                error: function (error) {
                    console.log(error);
                }
            });
        });

        // Manejar clic en el botón de cancelar solicitud
        $('.cancelar-solicitud').click(function () {
            var button = $(this);
            $.ajax({
                type: 'POST',
                url: $(cancelarFormId).attr('action'),
                data: $(cancelarFormId).serialize(),
                success: function (response) {
                    console.log(response);
                    $(formId).show();
                    $(cancelarFormId).hide();
                },
                error: function (error) {
                    console.log(error);
                }
            });
        });

        // Manejar clic en el botón de bloquear usuario
        $('.bloquear-usuario').click(function () {
            var formId = bloqueoFormId;
            $.ajax({
                type: 'POST',
                url: $(formId).attr('action'),
                data: $(formId).serialize(),
                success: function (response) {
                    console.log(response);
                    $(bloqueoFormId).hide();
                    $(desbloqueoFormId).show();
                },
                error: function (error) {
                    console.log(error);
                }
            });
        });

        // Manejar clic en el botón de desbloquear usuario
        $('.desbloquear-usuario').click(function () {
            var button = $(this);
            $.ajax({
                type: 'POST',
                url: $(desbloqueoFormId).attr('action'),
                data: $(desbloqueoFormId).serialize(),
                success: function (response) {
                    console.log(response);
                    $(bloqueoFormId).show();
                    $(desbloqueoFormId).hide();
                },
                error: function (error) {
                    console.log(error);
                }
            });
        });
    });
</script>

@endsection
@section('javascript')
    {{-- Aquí scripts solo para esta página--}}
@endsection
