@extends('layouts.app')
@section('meta')
    <meta name="description"
          content="{{$post->meta_description}}">
    <meta name="keywords" content="{{$post->meta_keywords}}">

@endsection

@section('title')
    @parent
    - {{$post->title}}
@endsection

@section('content')
<div class="container" style="margin-top: 10vh;">
    <div class="row">
        <div class="col-12">
            <h1 style="text-align: center">{{$post->title}}</h1>
        </div>
        <div class="col-12 col-md-6" style="margin:auto">
                {!! $post->body!!}
        </div>
        <div class="col-12 col-md-6" style="margin:auto">

            <img src="{{\App\Helpers\ImagesVoyagerHelper::getImage($post->image)}}" style="border-radius: 7px">
            <span><i class="far fa-calendar-alt"></i>&nbsp;{{\App\Helpers\DatesHelper::toEuFormat($post->created_at)}}</span>
        </div>
    </div>
</div>

@endsection

@section('javascript')
    {{-- Aquí scripts solo para esta página--}}
@endsection
