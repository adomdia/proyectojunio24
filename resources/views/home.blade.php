@extends('layouts.app')
@section('last_head')
    {{--Aquí estilos solo para esta página--}}
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
</style>


<div class="container mt-4" style="padding-top: 15vh">
    <div class="row">
        <div class="col-md-6 offset-md-3">
            <!-- Input para buscar usuarios -->
            <div class="input-group mb-3">
                <input type="text" class="form-control" placeholder="Buscar usuarios..." aria-describedby="button-addon2"
                maxlength="256" name="query" id="query">
                <ul id="results" class="search-results"></ul>
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
                    <a href="{{route('guest_profile', $uploader->id)}}" style="text-decoration: none;"><img src="{{Voyager::image($uploader->avatar)}}" style="max-width:50px" class="card-img-top" alt="Imagen de usuario"></a>
                     <a href="{{route('guest_profile', $uploader->id)}}" style="text-decoration: none;"><h5 class="card-title" style="color:black;  margin:0 0 0 20px">{{$uploader->name}}</h5></a>
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
</script>
@endsection
