@extends('layouts.app')

@section('content')

    <div class="container">
        <div class="row">
            <div class="col-md-6" style="margin-left: auto;margin-right: auto;margin-top: 100px;">
                <div class="card">
                    <div class="card-body" >
                        <h5 class="card-title">¡Hola! Ya estás logueado</h5>
                        <p>Estás utilizando el paquete Laravel Breeze para autenticación de usuarios</p>
                        <p>Las vistas están en <strong>views/auth</strong></p>
                        <p>Los controladores en <strong>app/Http/Controllers/Auth</strong></p>
                        <p>Y las rutas en <strong>routes/auth.php</strong></p>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection
