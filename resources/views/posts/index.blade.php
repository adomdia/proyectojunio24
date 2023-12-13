@extends('layouts.app')
@section('last_head')
    {{--Aquí estilos solo para esta página--}}
@endsection
@section('content')
<div class="container">
    <div class="row">
        @foreach($posts as $post)
        <div class="col-12 col-md-6" style="padding-bottom: 8px;padding-top: 8px">
            <div class="card">
                <div class="card-header">
                    <h4>{{$post->title}}</h4>
                </div>
                <div class="card-body">
                   <img src="{{\App\Helpers\ImagesVoyagerHelper::getImage($post->image)}}">
                    <p>{{$post->excerpt}}</p>
                </div>
                <div class="card-footer">
                    <a class="btn btn-success" href="{{route('post.single',$post->slug)}}">Ver más</a>
                </div>

            </div>


        </div>
            @endforeach
    </div>
</div>



@endsection
@section('javascript')
    {{-- Aquí scripts solo para esta página--}}
@endsection
