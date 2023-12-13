@extends('layouts.app')

@section('content')

    <div class="container">
        <div class="row">
            <div class="col-12 col-md-6" style="margin-top: 20px;display: block;margin: auto;text-align: center">
                <a target="_blank" href="https://github.com/barryvdh/laravel-dompdf">Documentación</a>
                <form action="{{route('download-dompdf')}}" method="post">
                    @csrf
                    <button class="btn btn-primary" type="submit">Descargar factura</button>
                </form>

            </div>
        </div>
    </div>

@endsection
@section('javascript')
    {{-- Aquí scripts solo para esta página--}}
@endsection
