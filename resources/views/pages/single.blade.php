@extends('layouts.app')
@section('meta')
    <meta name="description"
          content="{{$page->title}}">
    <meta name="keywords" content="">
    {{--<meta name="author" content="Raúl Caro Pastorino">--}}
@endsection

@section('title')
    @parent
    - {{$page->title}}
@endsection

@section('content')
<div class="container">
    <div class="row">
        <div class="col-12 col-md-8" style="margin:auto">
            <div class="box-content-builder">
                {!! $page->body!!}
            </div>
        </div>
    </div>
</div>

@endsection
@section('style')
    @include('layouts.contentbuilder_styles_front')
@endsection
@section('javascript')
    {{-- Aquí scripts solo para esta página--}}
@endsection
