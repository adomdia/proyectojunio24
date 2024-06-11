@extends('layouts.app')
@section('last_head')
    <style>
        .image-container {
            position: relative;
            display: inline-block;
        }

        .image-mask {
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background-color: black;
            opacity: 0.6;
        }

        .image-controls {
            position: absolute;
            top: 50%;
            left: 50%;
            transform: translate(-50%, -50%);
            z-index: 1;
            color: white;
        }

        .image-controls button {
            background-color: transparent;
            color: white;
            border: none;
            padding: 5px 10px;
            margin: 5px;
            cursor: pointer;
        }

        .image-container img {
            display: block;
            max-width: 100%;
            height: auto;
        }

        .audio-container {
            position: relative;
            display: inline-block;
        }

        .audio-container img {
            display: block;
            max-width: 100%;
            height: auto;
        }

        .audio-container audio {
            position: absolute;
            top: 90%;
            left: 50%;
            transform: translate(-50%, -50%);
            z-index: 1;
            width: 100%;
        }



        .liked_button {
            background-color: #dc3545;
            color: #fff;
        }
    </style>
@endsection
@section('content')
    <div class="bloc d-bloc" id="bloc-35" style="margin-top: 135px">
        <div class="container bloc-lg-md bloc-lg-sm bloc-no-padding-lg bloc-no-padding">
            <div class="row">
                <div class="offset-lg-1 col-lg-10">
                    <div style="width: 220px; height: 220px; overflow: hidden; margin: auto; border-radius: 50%;">
                        <img src="{{ Voyager::image($user->avatar) }}"
                            onerror="this.onerror=null;this.src='{{ asset('storage/users/default.png') }}';" class=""
                            style="height: 100%; width: 100%; object-fit: cover; object-position: center;"
                            alt="{{ $user->nick ?? $user->name }}" />
                    </div>
                    <h6 class="mg-md text-lg-center tc-anti-flash-white mx-auto d-block text-center text-dark">
                        @if (!$user->nick)
                            <span style="font-size: 30px">{{ $user->name }}</span>
                        @else
                            <span style="font-size: 30px">{{ $user->nick }}</span>
                        @endif
                    </h6>

                    <div class="text-center mt-3 d-flex justify-content-center">
                        @if (auth()->user()->id !== $user->id)
                            <div class="d-flex justify-content-center">

                                <form id="removeForm_{{ $user->id }}" action="{{ route('remove_friend', $user->id) }}"
                                    method="post">
                                    @csrf
                                    <input type="hidden" name="query" value="{{ $user->id }}">
                                    <button type="button" class="btn btn-primary eliminar-amistad ml-3"
                                        data-userid="{{ $user->id }}">Eliminar de amigos</button>
                                </form>

                                <form id="solicitudForm_{{ $user->id }}" action="{{ route('send_solicitude') }}"
                                    method="post">
                                    @csrf
                                    <input type="hidden" name="query" value="{{ $user->id }}">
                                    <button type="button" class="btn btn-primary enviar-solicitud ml-3"
                                        data-userid="{{ $user->id }}">Enviar solicitud</button>
                                </form>

                                <form id="cancelarSolicitudForm_{{ $user->id }}"
                                    action="{{ route('cancel_solicitude') }}" method="post" style="display: none;">
                                    @csrf
                                    <input type="hidden" name="query" value="{{ $user->id }}">
                                    <button type="button" class="btn btn-danger cancelar-solicitud ml-3"
                                        data-userid="{{ $user->id }}">Cancelar solicitud</button>
                                </form>

                                <form id="bloqueoForm_{{ $user->id }}" action="{{ route('block_user') }}"
                                    method="post">
                                    @csrf
                                    <input type="hidden" name="query" value="{{ $user->id }}">
                                    <button type="button" class="btn btn-danger bloquear-usuario ml-3"
                                        data-userid="{{ $user->id }}">Bloquear</button>
                                </form>

                                <form id="desbloqueoForm_{{ $user->id }}" action="{{ route('unblock_user') }}"
                                    method="post" style="display: none;">
                                    @csrf
                                    <input type="hidden" name="query" value="{{ $user->id }}">
                                    <button type="button" class="btn btn-success desbloquear-usuario ml-3"
                                        data-userid="{{ $user->id }}">Desbloquear</button>
                                </form>

                                <a href="{{ route('chat', $user->id) }}" style="text-decoration: none">
                                    <button class="btn btn-primary ml-3 text-white" data-userid="{{ $user->id }}">Abrir
                                        Chat
                                    </button>
                                </a>
                            </div>
                        @endif
                    </div>


                </div>
            </div>
        </div>
    </div>


    <div class="container mt-4" style="padding-top: 15vh">

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
                                $like = App\Models\LikePostsContent::where('post_id', $publicacion->id)->where('user_id', auth()->id())->first();
                            @endphp
                            
                            @if($like)
                                <button class="btn btn-outline-danger liked_button" data-post-id="{{ $publicacion->id }}">
                                    <i class="fas fa-heart"></i>
                                </button>
                                <button class="btn btn-outline-danger like_button" data-post-id="{{ $publicacion->id }}" style="display: none;">
                                    <i class="fas fa-heart"></i>
                                </button>
                            @else
                               
                                <button class="btn btn-outline-danger like_button" data-post-id="{{ $publicacion->id }}">
                                    <i class="fas fa-heart"></i>
                                </button>
                                <button class="btn btn-outline-danger liked_button" data-post-id="{{ $publicacion->id }}" style="display: none;">
                                    <i class="fas fa-heart"></i>
                                </button>
                            @endif
                            </div>
                            {{-- <img src="{{Voyager::image(json_decode($publicacion->file)[0]->download_link)}}" class="img-fluid" alt="Imagen de publicación"> --}}
                            <div class="mt-3">
                                <h6>Comentarios:</h6>
                                @php
                                    $comentarios = App\Models\CommentsPostsContent::where('post_id', $publicacion->id)->get();
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
                @endforeach
            </div>
        </div>
    </div>








    <script>
        var aviso = document.querySelector('.close')
        console.log(aviso);

        aviso.addEventListener('click', function() {
            console.log('entra');
            aviso.parentNode.style.display = "none"
        });
    </script>


    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.10.2/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>

    <script>
        $(document).ready(function() {
            var userId = "{{ $user->id }}";
            var formId = '#solicitudForm_' + userId;
            var cancelarFormId = '#cancelarSolicitudForm_' + userId;
            var bloqueoFormId = '#bloqueoForm_' + userId;
            var desbloqueoFormId = '#desbloqueoForm_' + userId;
            var removeForm = '#removeForm_' + userId



            //AMISTAD Y BLOQUEO
            $.ajax({
                type: 'GET',
                url: '{{ url('/get_friendship_status/') }}/' + userId,
                success: function(response) {
                    console.log(response);


                    if (response.friendshipStatus) {
                        $(formId).hide();
                        $(cancelarFormId).show();

                    } else {
                        $(formId).show();
                        $(cancelarFormId).hide();
                    }


                    if (response.blockedStatus) {
                        $(bloqueoFormId).hide();
                        $(desbloqueoFormId).show();
                    } else {
                        $(bloqueoFormId).show();
                        $(desbloqueoFormId).hide();
                    }
                },
                error: function(error) {
                    console.log(error);
                }
            });


            $.ajax({
                type: 'GET',
                url: '{{ url('/are_friends/') }}/' + userId,
                success: function(response) {
                    console.log(response);

                    if (response.areFriends) {
                        $(formId).hide();
                        $(cancelarFormId).hide();
                        $(removeForm).show();

                    } else {

                        $(formId).show();
                        $(cancelarFormId).hide();
                        $(removeForm).hide();
                    }
                },
                error: function(error) {
                    console.log(error);
                }
            });

            $('.enviar-solicitud').click(function() {
                var button = $(this);
                $.ajax({
                    type: 'POST',
                    url: $(formId).attr('action'),
                    data: $(formId).serialize(),
                    success: function(response) {
                        console.log(response);
                        $(formId).hide();
                        $(cancelarFormId).show();
                    },
                    error: function(error) {
                        console.log(error);
                    }
                });
            });

            $('.cancelar-solicitud').click(function() {
                var button = $(this);
                $.ajax({
                    type: 'POST',
                    url: $(cancelarFormId).attr('action'),
                    data: $(cancelarFormId).serialize(),
                    success: function(response) {
                        console.log(response);
                        $(formId).show();
                        $(cancelarFormId).hide();
                    },
                    error: function(error) {
                        console.log(error);
                    }
                });
            });


            $('.bloquear-usuario').click(function() {
                var formId = bloqueoFormId;
                $.ajax({
                    type: 'POST',
                    url: $(formId).attr('action'),
                    data: $(formId).serialize(),
                    success: function(response) {
                        console.log(response);
                        $(bloqueoFormId).hide();
                        $(desbloqueoFormId).show();
                    },
                    error: function(error) {
                        console.log(error);
                    }
                });
            });


            $('.desbloquear-usuario').click(function() {
                var button = $(this);
                $.ajax({
                    type: 'POST',
                    url: $(desbloqueoFormId).attr('action'),
                    data: $(desbloqueoFormId).serialize(),
                    success: function(response) {
                        console.log(response);
                        $(bloqueoFormId).show();
                        $(desbloqueoFormId).hide();
                    },
                    error: function(error) {
                        console.log(error);
                    }
                });
            });


            $('.eliminar-amistad').click(function() {
                var removeFormId = removeForm;
                $.ajax({
                    type: 'POST',
                    url: $(removeFormId).attr('action'),
                    data: $(removeFormId).serialize(),
                    success: function(response) {
                        console.log(response);
                        $(removeFormId).hide();
                        $(formId).show();
                    },
                    error: function(error) {
                        console.log(error);
                    }
                });
            });
        });

        //COMENTARIOS
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


                    $('.commentsContainer[data-post-id="' + postId + '"]').append(messageContent);
                },
                error: function(error) {
                    console.log(error);
                }
            });
        });

        //LIKES
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
@section('javascript')
    {{-- Aquí scripts solo para esta página --}}
@endsection
