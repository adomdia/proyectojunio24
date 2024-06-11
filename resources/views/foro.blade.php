@extends('layouts.app')
@section('last_head')
    {{-- Aquí estilos solo para esta página --}}
@endsection
@section('content')
    <div class="container mb-5" style="margin-top:15vh">


        <div class="card-deck mt-5">

            @foreach ($foros as $foro)
                <div class="card mt-5" style="border-radius:16px">
                    <div class="card-body" style="background-color: #bbcffd; border-radius:15px">
                        <h5 class="card-title" style="color:black">{{ $foro->text }}</h5>
                        <p class="card-text">{{ $foro->subtext }}</p>
                        <a href="#" class="btn btn-primary text-right">Ir al tema</a>
                    </div>
                </div>
            @endforeach
        </div>

    </div>
@endsection
@section('javascript')
    {{-- Aquí scripts solo para esta página --}}
@endsection
