@extends('layouts.app')
@section('last_head')
    {{-- Aquí estilos solo para esta página --}}
@endsection
@section('content')
    <style>
        .input-group {
            position: relative;
        }

        .search-results {
            position: absolute;
            top: 100%;
            left: 0;
            width: 100%;
            list-style: none;
            margin: 0;
            padding: 0;
            box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
            background-color: #fff;
            z-index: 1000;
        }

        .search-results li {
            padding: 8px;
            border-bottom: 1px solid #ddd;
        }

        .liked_button {
            background-color: #dc3545;
            color: #fff;
        }

        .carrusel_movil{
            display:none;
        }

        @media (max-width: 768px) {
            .carrusel_movil{
                display:flex;
            }

            .carrusel_pc{
                display:none;
            }
        }

        .banner-left, .banner-right {
            position: fixed;
            top: 0%;
            width: 320px;
            height: 100vh;
            background-color: #f1f1f1;
            text-align: center;
            z-index: 1000;
            background-size: cover; 
            background-repeat: no-repeat; 
            background-position: center;
            display: flex; 
            justify-content: center; 
            align-items: center; 
        }

        .banner-left {
            left: 0;
        }

        .banner-right {
            right: 0;
        }


        @media (max-width: 1674px) {
            .banner-left, .banner-right {
                display: none;
            }
        }
    </style>
    

    <div class="container mt-4" style="padding-top: 15vh">
        <div class="row justify-content-center carrusel_pc">
            <div class="col-md-10">
                <!-- Carrusel -->
                @if(count($servicios) !== 0)
                <div id="cardCarousel" class="carousel slide" data-ride="carousel">
                    <div class="carousel-inner">
                        @foreach ($servicios->chunk(3) as $index => $chunk)
                            <div class="carousel-item {{ $index == 0 ? 'active' : '' }}">
                                <div class="row">
                                    @foreach ($chunk as $servicio)
                                        @php
                                            $uploader = App\Models\User::find($servicio->user_id);
                                        @endphp
                                        <div class="col-md-4 d-flex justify-content-center">
                                            <div class="card" style="max-width: 260px;">
                                                <img src="{{ Voyager::image($uploader->avatar) }}" class="card-img-top"
                                                    alt="Avatar Usuario">
                                                <div class="card-body">
                                                    <h5 class="card-title" style="color:black">{{ $servicio->title }}
                                                    </h5>
                                                    <h5 class="card-title text-center" style="color:black">
                                                        {{ $servicio->price }}€</h5>
                                                    <div class="d-flex justify-content-center">
                                                        <form id="solicitudForm_{{ $servicio->id }}"
                                                            action="{{ route('send_solicitude') }}" method="post">
                                                            @csrf
                                                            <input type="hidden" name="query"
                                                                value="{{ $servicio->id }}">
                                                            <a href="{{ route('pagos-servicios', $servicio->id) }}"
                                                                class="btn btn-primary enviar-solicitud ml-3"
                                                                data-userid="{{ $servicio->id }}">Comprar</a>
                                                        </form>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    @endforeach
                                </div>
                            </div>
                        @endforeach
                    </div>
                    <a class="carousel-control-prev" href="#cardCarousel" role="button" data-slide="prev">
                        <span class="carousel-control-prev-icon" aria-hidden="true" style="background-color: #2d2196;border-radius: 8px;"></span>
                        <span class="sr-only">Previous</span>
                    </a>
                    <a class="carousel-control-next" href="#cardCarousel" role="button" data-slide="next" >
                        <span class="carousel-control-next-icon" aria-hidden="true" style="background-color: #2d2196;border-radius: 8px;"></span>
                        <span class="sr-only">Next</span>
                    </a>
                </div>
                @endif
            </div>
        </div>

        <div class="row justify-content-center carrusel_movil">
            <div class="col-md-10">
                <!-- Carrusel -->
                @if(count($servicios) !== 0)
                <div id="cardCarousel" class="carousel slide" data-ride="carousel">
                    <div class="carousel-inner">
                        @foreach ($servicios as $index => $servicio)
                            <div class="carousel-item {{ $index == 0 ? 'active' : '' }}">
                                <div class="d-flex justify-content-center">
                                    <div class="card" style="max-width: 260px;">
                                        @php
                                            $uploader = App\Models\User::find($servicio->user_id);
                                        @endphp
                                        <img src="{{ Voyager::image($uploader->avatar) }}" class="card-img-top"
                                            alt="Avatar Usuario">
                                        <div class="card-body">
                                            <h5 class="card-title" style="color:black">{{ $servicio->title }}</h5>
                                            <h5 class="card-title text-center" style="color:black">{{ $servicio->price }}€</h5>
                                            <div class="d-flex justify-content-center">
                                                <form id="solicitudForm_{{ $servicio->id }}"
                                                    action="{{ route('send_solicitude') }}" method="post">
                                                    @csrf
                                                    <input type="hidden" name="query" value="{{ $servicio->id }}">
                                                    <a href="{{ route('pagos-servicios', $servicio->id) }}"
                                                        class="btn btn-primary enviar-solicitud ml-3"
                                                        data-userid="{{ $servicio->id }}">Comprar</a>
                                                </form>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </div>
                    <a class="carousel-control-prev" href="#cardCarousel" role="button" data-slide="prev">
                        <span class="carousel-control-prev-icon" aria-hidden="true" style="background-color: #2d2196; border-radius: 8px;"></span>
                        <span class="sr-only">Previous</span>
                    </a>
                    <a class="carousel-control-next" href="#cardCarousel" role="button" data-slide="next">
                        <span class="carousel-control-next-icon" aria-hidden="true" style="background-color: #2d2196; border-radius: 8px;"></span>
                        <span class="sr-only">Next</span>
                    </a>
                </div>
                @endif
            </div>
        </div>
        <div class="row" style="margin-top:50px">
            <div class="col-md-6 offset-md-3">
                <!-- Input para buscar usuarios -->
                <div class="input-group mb-3">
                    <input type="text" class="form-control" placeholder="Buscar usuarios..."
                        aria-describedby="button-addon2" maxlength="256" name="query" id="query">
                    <ul id="results" class="search-results"></ul>
                </div>
            </div>
        </div>

        <div class="banner-left" style="background-image: url('{{Voyager::image(json_decode($adds[0]->img)[0]->download_link)}}')">
        </div>
    
        <div class="banner-right" style="background-image: url('{{Voyager::image(json_decode($adds[1]->img)[0]->download_link)}}')">
        </div>

        <div class="row">
            <div class="col-md-6 offset-md-3">
                @foreach ($publicaciones as $publicacion)
                    @php

                        $uploader = App\Models\User::get()
                            ->where('id', $publicacion->user_id)
                            ->first();

                        // dd($uploader->avatar);

                    @endphp
                    <div class="card mb-3">
                        <div class="card-body">
                            <p class="card-text">{{ $publicacion->title }}</p>
                            <div class="d-flex justify-content-center">
                                @if (in_array(strtolower(str_replace('"}]', '', pathinfo($publicacion->file, PATHINFO_EXTENSION))), [
                                        'jpg',
                                        'jpeg',
                                        'png',
                                        'gif',
                                    ]))
                                    <img src="{{ Voyager::image(json_decode($publicacion->file)[0]->download_link) }}"
                                        class="img-fluid" alt="Imagen de publicación">
                                @elseif (in_array(strtolower(str_replace('"}]', '', pathinfo($publicacion->file, PATHINFO_EXTENSION))), [
                                        'mp4',
                                        'avi',
                                        'mov',
                                        'mkv',
                                    ]))
                                    <video class="img-fluid" controls>
                                        <source src="storage/{{ json_decode($publicacion->file)[0]->download_link }}"
                                            type="video/mp4">
                                        Tu navegador no soporta el tag de video.
                                    </video>
                                @elseif (in_array(strtolower(str_replace('"}]', '', pathinfo($publicacion->file, PATHINFO_EXTENSION))), ['mp3']))
                                    <div class="audio-container">
                                        <div class="image-mask"></div>
                                        <img src="{{ Voyager::image($user->avatar) }}" class="img-fluid"
                                            alt="Imagen de perfil del usuario">
                                        <audio controls>
                                            <source src="storage/{{ json_decode($publicacion->file)[0]->download_link }}"
                                                type="audio/mp3">
                                            Tu navegador no soporta el tag de audio.
                                        </audio>
                                    </div>
                                @endif
                            </div>
                            <div class="text-right mt-3">
                                @php
                                    $like = App\Models\LikePostsContent::where('post_id', $publicacion->id)
                                        ->where('user_id', auth()->id())
                                        ->first();
                                @endphp

                                @if ($like)
                                    <button class="btn btn-outline-danger liked_button"
                                        data-post-id="{{ $publicacion->id }}">
                                        <i class="fas fa-heart"></i>
                                    </button>
                                    <button class="btn btn-outline-danger like_button"
                                        data-post-id="{{ $publicacion->id }}" style="display: none;">
                                        <i class="fas fa-heart"></i>
                                    </button>
                                @else
                                    <button class="btn btn-outline-danger like_button"
                                        data-post-id="{{ $publicacion->id }}">
                                        <i class="fas fa-heart"></i>
                                    </button>
                                    <button class="btn btn-outline-danger liked_button"
                                        data-post-id="{{ $publicacion->id }}" style="display: none;">
                                        <i class="fas fa-heart"></i>
                                    </button>
                                @endif
                            </div>
                            {{-- <img src="{{Voyager::image(json_decode($publicacion->file)[0]->download_link)}}" class="img-fluid" alt="Imagen de publicación"> --}}
                            <div class="mt-3">
                                <h6>Comentarios:</h6>
                                @php
                                    $comentarios = App\Models\CommentsPostsContent::where(
                                        'post_id',
                                        $publicacion->id,
                                    )->get();
                                @endphp
                                <div class="media mb-2 comment-div commentsContainer"
                                    data-post-id="{{ $publicacion->id }}">
                                    @foreach ($comentarios as $comentario)
                                        @php
                                            $user = App\Models\user::where('id', $comentario->user_id)->first();
                                        @endphp
                                        <div class="title-comment-home">
                                            <img src="{{ Voyager::image($user->avatar) }}" style="max-width:50px"
                                                class="card-img-top" alt="Imagen de usuario">
                                            <h6 class="mt-0" style="color:black; margin:20px 0 0 20px">
                                                <strong>{{ $user->name }}:</strong>
                                            </h6>
                                        </div>
                                        <div class="media-body comment-div">
                                            <p>{{ $comentario->text }} </p>
                                        </div>
                                    @endforeach
                                </div>
                                <div class="container">
                                    <div class="row">
                                        <div class="col-12">
                                            <form class="send-comment-form d-flex justify-content-center"
                                                data-post-id="{{ $publicacion->id }}" class="d-flex">
                                                @csrf
                                                <input hidden name="post_id" value="{{ $publicacion->id }}"
                                                    class="flex-grow-1 mr-2">
                                                <input type="text" class="form-control flex-grow-1 mr-2 message-input"
                                                    name="content" placeholder="Escribe comentario"
                                                    aria-describedby="button-addon3">
                                                <button class="btn btn-outline-secondary" type="submit"
                                                    id="button-addon3">Comentar</button>
                                            </form>

                                        </div>
                                    </div>
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
    <script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
    <script>
        $(document).ready(function() {
            var input = $('#query');
            var results = $('#results');

            input.on('input', function() {
                var query = $(this).val();

                if (query.length >= 3) {
                    $.ajax({
                        url: '{{ url('/obtener_usuarios/') }}/',
                        method: 'GET',
                        data: {
                            query: query
                        },
                        success: function(data) {
                            console.log(data);
                            console.log(Object.keys(data).length);
                            mostrarResultados(data);
                        },
                        error: function(error) {
                            console.error('Error en la solicitud AJAX:', error);
                        }
                    });
                } else {
                    results.empty();
                    results.css('display', 'none');
                }
            });

            $(document).on('click', function(event) {
                var isClickInside = input.is(event.target) || results.has(event.target).length > 0;

                if (!isClickInside) {
                    results.css('display', 'none');
                }
            });

            results.on('click', 'a', function(event) {
                console.log('Clic en el resultado:', $(this).text());
            });

            function mostrarResultados(data) {
                results.empty();

                if (Object.keys(data).length > 0) {
                    for (const clave in data) {
                        if (data.hasOwnProperty(clave)) {
                            const valor = data[clave];
                            var link = $('<a>', {
                                href: '{{ url('/perfil/') }}/' + encodeURIComponent(clave),
                                class: 'form-control',
                                style: 'text-decoration:none;color: #3f969d',
                                html: $('<li>', {
                                    class: 'text-input js-form-input',
                                    style: 'background-color:#fff;color:#3f969d;display:flex;align-items:center',
                                    value: clave,
                                    text: valor
                                })
                            });

                            results.append(link);
                        }
                    }
                } else {
                    results.append(
                        $('<li>', {
                            class: 'text-input js-form-input form-control',
                            style: 'background-color:#fff;color:#3f969d;display:flex;align-items:center',
                            text: 'No se encontraron resultados'
                        })
                    );
                }

                results.css('display', 'block');
            }
        });

        $('.send-comment-form').submit(function(e) {
            e.preventDefault();

            var formData = $(this).serialize();
            var postId = $(this).data('post-id');

            $.ajax({
                type: 'POST',
                url: '{{ url('/send_comment/') }}',
                data: formData,
                success: function(response) {
                    console.log(response);
                    $('.message-input').val('');

                    var imagen = '{!! Voyager::image("' + response.user.avatar + '") !!}';

                    var messageContent = '<div class="title-comment-home"> <img src="' + imagen +
                        '" \n' +
                        'style="max-width:50px" class="card-img-top" alt="Imagen de usuario"> \n' +
                        '<h6 class="mt-0" style="color:black; margin:20px 0 0 20px"><strong>' + response
                        .user.name + ':</strong></h6> \n' +
                        '</div> \n' +
                        '<div class="media-body comment-div">\n' +
                        '<p> ' + response.comment.text + ' </p>\n' +
                        '</div>';

                    // Append al contenedor específico de comentarios usando la clase y el postId
                    $('.commentsContainer[data-post-id="' + postId + '"]').append(messageContent);
                },
                error: function(error) {
                    console.log(error);
                }
            });
        });

        $('.like_button').click(function() {
            var postId = $(this).data('post-id');

            $.ajax({
                type: 'POST',
                url: '{{ url('/like-post/') }}',
                data: {
                    post_id: postId,
                    _token: '{{ csrf_token() }}'
                },
                success: function(response) {
                    console.log(response)
                    $('.like_button[data-post-id="' + postId + '"]').hide();
                    $('.liked_button[data-post-id="' + postId + '"]').show();

                },
                error: function(error) {
                    console.log(error);
                }
            });
        });

        $('.liked_button').click(function() {
            var postId = $(this).data('post-id');

            $.ajax({
                type: 'POST',
                url: '{{ url('/unlike-post/') }}',
                data: {
                    post_id: postId,
                    _token: '{{ csrf_token() }}'
                },
                success: function(response) {

                    $('.liked_button[data-post-id="' + postId + '"]').hide();
                    $('.like_button[data-post-id="' + postId + '"]').show();

                },
                error: function(error) {
                    console.log(error);
                }
            });
        });
    </script>
@endsection
