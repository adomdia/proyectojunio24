@extends('layouts.app')
@section('last_head')
    {{--Aquí estilos solo para esta página--}}
@endsection
@section('content')


<div class="container mt-4" style="padding-top: 15vh">
    <div class="row">
        <div class="col-md-6 offset-md-3">
            <!-- Input para buscar usuarios -->
            <div class="input-group mb-3">
                <input type="text" class="form-control" placeholder="Buscar usuarios" aria-describedby="button-addon2">
                <div class="input-group-append">
                    <button class="btn btn-outline-secondary" type="button" id="button-addon2">Buscar</button>
                </div>
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-md-6 offset-md-3">
            @foreach($publicaciones as $publicacion)


            @php
            
            $uploader = App\Models\User::get()->where('id', $publicacion->user_id)->first();

            // dd($uploader->avatar);

            @endphp
            <div class="card mb-3">
                <div class="title-card-home" >
                    <img src="{{Voyager::image($uploader->avatar)}}" style="max-width:50px" class="card-img-top" alt="Imagen de usuario">
                    <h5 class="card-title" style="color:black;  margin:0 0 0 20px">{{$uploader->name}}</h5>
                </div>
                <div class="card-body">
                    <p class="card-text">{{$publicacion->title}}</p>
                    <img src="{{Voyager::image(json_decode($publicacion->file)[0]->download_link)}}" class="img-fluid" alt="Imagen de publicación">
                    <div class="mt-3">
                        <h6>Comentarios:</h6>
                        <div class="media mb-2 comment-div">
                            <div class="title-comment-home">
                                <img src="{{asset('images/user.png')}}" style="max-width:50px" class="card-img-top" alt="Imagen de usuario">
                                <h6 class="mt-0" style="color:black; margin:20px 0 0 20px"><strong>Nombre de Usuario:</strong></h6>
                            </div>
                            <div class="media-body comment-div">
                                <p>Comentario de ejemplo. </p>
                            </div>
                        </div>
                        <div class="input-group">
                            <input type="text" class="form-control" placeholder="Escribe un comentario" aria-describedby="button-addon3">
                            <div class="input-group-append">
                                <button class="btn btn-outline-secondary" type="button" id="button-addon3">Comentar</button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            @endforeach
        </div>
    </div>
</div>

<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.0.7/dist/umd/popper.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>


@endsection
@section('javascript')
    {{-- Aquí scripts solo para esta página--}}
@endsection
