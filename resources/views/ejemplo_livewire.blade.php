@extends('layouts.app')
@section('last_head')
    <style>
        .row a {
            color: #0d6efd !important;
            font-weight: bold;
        }
    </style>
    @livewireStyles
@endsection
@section('content')
@php
$count = 5;
$datos= [
 'titulo'=>'Hola mundo desde un componente livewire',
 'descripcion'=>'Probando Livewire'
]
@endphp

    <div class="container">
        <div class="row">
            <div class="col-12" style="margin-top: 25px">
                <p>Livewire es una librería para Laravel, cuyo propósito es construir interfaces dinámicas y reactivas
                    de forma sencilla,
                    parecido a Vue o React, pero totalmente integrado en Laravel y mucho menos complejo. <a target="_blank" href="https://laravel-livewire.com/docs/2.x/quickstart">Documentación</a></p>


                <p>Para configurarlo correctamente, revisar si existe <strong>config/livewire.php</strong>. si no, ejecutar este comando: <strong>php artisan
                        livewire:publish
                        --config</strong>.</p>
                <p>En config/livewire, <strong>'asset_url' => env('APP_URL')</strong>.</p>
                <p>Crear un componente de livewire: <strong>php artisan make:livewire counter</strong> Modificamos su
                    html  <strong>(Resources/views/livewire/counter.blade)</strong> y Clase creada  <strong>(app/Http/Livewire/Counter.php)</strong> y añadimos el componente a esta página: </p>

               {{-- <livewire:counter :count="$count" :datos="$datos"/>--}}
                @livewire('counter', ['count'=>$count,'datos'=>$datos])
            </div>
        </div>
    </div>

@endsection
@section('javascript')
    @livewireScripts
@endsection
