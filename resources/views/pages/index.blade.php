@extends('layouts.app')
@section('last_head')
    {{--Aquí estilos solo para esta página--}}
@endsection
@section('content')
    <div class="container">
        <div class="row">
            @foreach($pages as $page)
                <div class="col-12 col-md-6" style="padding-bottom: 8px;padding-top: 8px">
                    <div class="card">
                        <div class="card-header">
                            <h4>{{$page->title}}</h4>
                        </div>
                        <div class="card-body">
                            <img src="{{\App\Helpers\ImagesVoyagerHelper::getImage($page->image)}}">
                            <p>{{$page->excerpt}}</p>
                        </div>
                        <div class="card-footer">
                            <a class="btn btn-success" href="{{route('pagina',$page->slug)}}">Ver más</a>
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
