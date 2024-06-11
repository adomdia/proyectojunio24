@extends('layouts.app')
@section('last_head')
    {{--Aquí estilos solo para esta página--}}
@endsection
@section('content')

<div class="container mb-5" style="margin-top:15vh">


    <div class="card-deck mt-5">

        <div class="card mt-5" style="border-radius:16px">
            <div class="card-body" style="background-color: #bbcffd; border-radius:15px">
                <h3 class="card-title" style="color:black">{{ $foro->text }}</h3>
                @foreach ($subforos as $foro)
                    <div class="d-flex">
                        <h5 class="card-title" style="color:black">{{ $foro->title }}</h5>
                        <p class="card-text">{{ $foro->subtext }}</p>
                        <a href="#" class="btn btn-primary text-right">Ir al tema</a>
                    </div>
                    @endforeach
                </div>
            </div>
    </div>

</div>


@endsection
@section('javascript')
    {{-- Aquí scripts solo para esta página--}}
@endsection
