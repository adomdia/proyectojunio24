@extends('layouts.app')
@section('last_head')
    {{--Aquí estilos solo para esta página--}}
@endsection
@section('content')


<div class="container mt-4" style="padding-top: 10vh">
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

    <!-- Publicaciones con scroll vertical -->
    <div class="row">
        <div class="col-md-6 offset-md-3">
            <div class="card mb-3">
                <img src="{{asset('images/user.png')}}" class="card-img-top" alt="Imagen de usuario">
                <div class="card-body">
                    <h5 class="card-title">Nombre de Usuario</h5>
                    <p class="card-text">Título de la imagen</p>
                    <img src="{{asset('images/paisaje.webp')}}" class="img-fluid" alt="Imagen de publicación">
                    <button class="btn btn-primary mt-3">Like</button>
                    <!-- Comentarios -->
                    <div class="mt-3">
                        <h6>Comentarios:</h6>
                        <!-- Aquí puedes iterar sobre los comentarios y mostrarlos -->
                        <div class="media mb-2">
                            <img src="{{asset('images/user.png')}}" class="mr-3" alt="Imagen de usuario">
                            <div class="media-body">
                                <h6 class="mt-0">Usuario Comentario</h6>
                                Comentario de ejemplo.
                            </div>
                        </div>
                        <!-- Input para comentar -->
                        <div class="input-group">
                            <input type="text" class="form-control" placeholder="Escribe un comentario" aria-describedby="button-addon3">
                            <div class="input-group-append">
                                <button class="btn btn-outline-secondary" type="button" id="button-addon3">Comentar</button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- Repite esta estructura para cada publicación -->

            <div class="card mb-3">
                <img src="{{asset('images/user.png')}}" class="card-img-top" alt="Imagen de usuario">
                <div class="card-body">
                    <h5 class="card-title">Nombre de Usuario</h5>
                    <p class="card-text">Título de la imagen</p>
                    <img src="{{asset('images/paisaje.webp')}}" class="img-fluid" alt="Imagen de publicación">
                    <button class="btn btn-primary mt-3">Like</button>
                    <!-- Comentarios -->
                    <div class="mt-3">
                        <h6>Comentarios:</h6>
                        <!-- Aquí puedes iterar sobre los comentarios y mostrarlos -->
                        <div class="media mb-2">
                            <img src="{{asset('images/user.png')}}" class="mr-3" alt="Imagen de usuario">
                            <div class="media-body">
                                <h6 class="mt-0">Usuario Comentario</h6>
                                Comentario de ejemplo.
                            </div>
                        </div>
                        <!-- Input para comentar -->
                        <div class="input-group">
                            <input type="text" class="form-control" placeholder="Escribe un comentario" aria-describedby="button-addon3">
                            <div class="input-group-append">
                                <button class="btn btn-outline-secondary" type="button" id="button-addon3">Comentar</button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- Repite esta estructura para cada publicación -->

            <div class="card mb-3">
                <img src="{{asset('images/user.png')}}" class="card-img-top" alt="Imagen de usuario">
                <div class="card-body">
                    <h5 class="card-title">Nombre de Usuario</h5>
                    <p class="card-text">Título de la imagen</p>
                    <img src="{{asset('images/paisaje.webp')}}" class="img-fluid" alt="Imagen de publicación">
                    <button class="btn btn-primary mt-3">Like</button>
                    <!-- Comentarios -->
                    <div class="mt-3">
                        <h6>Comentarios:</h6>
                        <!-- Aquí puedes iterar sobre los comentarios y mostrarlos -->
                        <div class="media mb-2">
                            <img src="{{asset('images/user.png')}}" class="mr-3" alt="Imagen de usuario">
                            <div class="media-body">
                                <h6 class="mt-0">Usuario Comentario</h6>
                                Comentario de ejemplo.
                            </div>
                        </div>
                        <!-- Input para comentar -->
                        <div class="input-group">
                            <input type="text" class="form-control" placeholder="Escribe un comentario" aria-describedby="button-addon3">
                            <div class="input-group-append">
                                <button class="btn btn-outline-secondary" type="button" id="button-addon3">Comentar</button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- Repite esta estructura para cada publicación -->

            <div class="card mb-3">
                <img src="{{asset('images/user.png')}}" class="card-img-top" alt="Imagen de usuario">
                <div class="card-body">
                    <h5 class="card-title">Nombre de Usuario</h5>
                    <p class="card-text">Título de la imagen</p>
                    <img src="{{asset('images/paisaje.webp')}}" class="img-fluid" alt="Imagen de publicación">
                    <button class="btn btn-primary mt-3">Like</button>
                    <!-- Comentarios -->
                    <div class="mt-3">
                        <h6>Comentarios:</h6>
                        <!-- Aquí puedes iterar sobre los comentarios y mostrarlos -->
                        <div class="media mb-2">
                            <img src="{{asset('images/user.png')}}" class="mr-3" alt="Imagen de usuario">
                            <div class="media-body">
                                <h6 class="mt-0">Usuario Comentario</h6>
                                Comentario de ejemplo.
                            </div>
                        </div>
                        <!-- Input para comentar -->
                        <div class="input-group">
                            <input type="text" class="form-control" placeholder="Escribe un comentario" aria-describedby="button-addon3">
                            <div class="input-group-append">
                                <button class="btn btn-outline-secondary" type="button" id="button-addon3">Comentar</button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- Repite esta estructura para cada publicación -->

            <div class="card mb-3">
                <img src="{{asset('images/user.png')}}" class="card-img-top" alt="Imagen de usuario">
                <div class="card-body">
                    <h5 class="card-title">Nombre de Usuario</h5>
                    <p class="card-text">Título de la imagen</p>
                    <img src="{{asset('images/paisaje.webp')}}" class="img-fluid" alt="Imagen de publicación">
                    <button class="btn btn-primary mt-3">Like</button>
                    <!-- Comentarios -->
                    <div class="mt-3">
                        <h6>Comentarios:</h6>
                        <!-- Aquí puedes iterar sobre los comentarios y mostrarlos -->
                        <div class="media mb-2">
                            <img src="{{asset('images/user.png')}}" class="mr-3" alt="Imagen de usuario">
                            <div class="media-body">
                                <h6 class="mt-0">Usuario Comentario</h6>
                                Comentario de ejemplo.
                            </div>
                        </div>
                        <!-- Input para comentar -->
                        <div class="input-group">
                            <input type="text" class="form-control" placeholder="Escribe un comentario" aria-describedby="button-addon3">
                            <div class="input-group-append">
                                <button class="btn btn-outline-secondary" type="button" id="button-addon3">Comentar</button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- Repite esta estructura para cada publicación -->

            <div class="card mb-3">
                <img src="{{asset('images/user.png')}}" class="card-img-top" alt="Imagen de usuario">
                <div class="card-body">
                    <h5 class="card-title">Nombre de Usuario</h5>
                    <p class="card-text">Título de la imagen</p>
                    <img src="{{asset('images/paisaje.webp')}}" class="img-fluid" alt="Imagen de publicación">
                    <button class="btn btn-primary mt-3">Like</button>
                    <!-- Comentarios -->
                    <div class="mt-3">
                        <h6>Comentarios:</h6>
                        <!-- Aquí puedes iterar sobre los comentarios y mostrarlos -->
                        <div class="media mb-2">
                            <img src="{{asset('images/user.png')}}" class="mr-3" alt="Imagen de usuario">
                            <div class="media-body">
                                <h6 class="mt-0">Usuario Comentario</h6>
                                Comentario de ejemplo.
                            </div>
                        </div>
                        <!-- Input para comentar -->
                        <div class="input-group">
                            <input type="text" class="form-control" placeholder="Escribe un comentario" aria-describedby="button-addon3">
                            <div class="input-group-append">
                                <button class="btn btn-outline-secondary" type="button" id="button-addon3">Comentar</button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- Repite esta estructura para cada publicación -->

            <div class="card mb-3">
                <img src="{{asset('images/user.png')}}" class="card-img-top" alt="Imagen de usuario">
                <div class="card-body">
                    <h5 class="card-title">Nombre de Usuario</h5>
                    <p class="card-text">Título de la imagen</p>
                    <img src="{{asset('images/paisaje.webp')}}" class="img-fluid" alt="Imagen de publicación">
                    <button class="btn btn-primary mt-3">Like</button>
                    <!-- Comentarios -->
                    <div class="mt-3">
                        <h6>Comentarios:</h6>
                        <!-- Aquí puedes iterar sobre los comentarios y mostrarlos -->
                        <div class="media mb-2">
                            <img src="{{asset('images/user.png')}}" class="mr-3" alt="Imagen de usuario">
                            <div class="media-body">
                                <h6 class="mt-0">Usuario Comentario</h6>
                                Comentario de ejemplo.
                            </div>
                        </div>
                        <!-- Input para comentar -->
                        <div class="input-group">
                            <input type="text" class="form-control" placeholder="Escribe un comentario" aria-describedby="button-addon3">
                            <div class="input-group-append">
                                <button class="btn btn-outline-secondary" type="button" id="button-addon3">Comentar</button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- Repite esta estructura para cada publicación -->

            <div class="card mb-3">
                <img src="{{asset('images/user.png')}}" class="card-img-top" alt="Imagen de usuario">
                <div class="card-body">
                    <h5 class="card-title">Nombre de Usuario</h5>
                    <p class="card-text">Título de la imagen</p>
                    <img src="{{asset('images/paisaje.webp')}}" class="img-fluid" alt="Imagen de publicación">
                    <button class="btn btn-primary mt-3">Like</button>
                    <!-- Comentarios -->
                    <div class="mt-3">
                        <h6>Comentarios:</h6>
                        <!-- Aquí puedes iterar sobre los comentarios y mostrarlos -->
                        <div class="media mb-2">
                            <img src="{{asset('images/user.png')}}" class="mr-3" alt="Imagen de usuario">
                            <div class="media-body">
                                <h6 class="mt-0">Usuario Comentario</h6>
                                Comentario de ejemplo.
                            </div>
                        </div>
                        <!-- Input para comentar -->
                        <div class="input-group">
                            <input type="text" class="form-control" placeholder="Escribe un comentario" aria-describedby="button-addon3">
                            <div class="input-group-append">
                                <button class="btn btn-outline-secondary" type="button" id="button-addon3">Comentar</button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- Repite esta estructura para cada publicación -->

            <div class="card mb-3">
                <img src="{{asset('images/user.png')}}" class="card-img-top" alt="Imagen de usuario">
                <div class="card-body">
                    <h5 class="card-title">Nombre de Usuario</h5>
                    <p class="card-text">Título de la imagen</p>
                    <img src="{{asset('images/paisaje.webp')}}" class="img-fluid" alt="Imagen de publicación">
                    <button class="btn btn-primary mt-3">Like</button>
                    <!-- Comentarios -->
                    <div class="mt-3">
                        <h6>Comentarios:</h6>
                        <!-- Aquí puedes iterar sobre los comentarios y mostrarlos -->
                        <div class="media mb-2">
                            <img src="{{asset('images/user.png')}}" class="mr-3" alt="Imagen de usuario">
                            <div class="media-body">
                                <h6 class="mt-0">Usuario Comentario</h6>
                                Comentario de ejemplo.
                            </div>
                        </div>
                        <!-- Input para comentar -->
                        <div class="input-group">
                            <input type="text" class="form-control" placeholder="Escribe un comentario" aria-describedby="button-addon3">
                            <div class="input-group-append">
                                <button class="btn btn-outline-secondary" type="button" id="button-addon3">Comentar</button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- Repite esta estructura para cada publicación -->

            <div class="card mb-3">
                <img src="{{asset('images/user.png')}}" class="card-img-top" alt="Imagen de usuario">
                <div class="card-body">
                    <h5 class="card-title">Nombre de Usuario</h5>
                    <p class="card-text">Título de la imagen</p>
                    <img src="{{asset('images/paisaje.webp')}}" class="img-fluid" alt="Imagen de publicación">
                    <button class="btn btn-primary mt-3">Like</button>
                    <!-- Comentarios -->
                    <div class="mt-3">
                        <h6>Comentarios:</h6>
                        <!-- Aquí puedes iterar sobre los comentarios y mostrarlos -->
                        <div class="media mb-2">
                            <img src="{{asset('images/user.png')}}" class="mr-3" alt="Imagen de usuario">
                            <div class="media-body">
                                <h6 class="mt-0">Usuario Comentario</h6>
                                Comentario de ejemplo.
                            </div>
                        </div>
                        <!-- Input para comentar -->
                        <div class="input-group">
                            <input type="text" class="form-control" placeholder="Escribe un comentario" aria-describedby="button-addon3">
                            <div class="input-group-append">
                                <button class="btn btn-outline-secondary" type="button" id="button-addon3">Comentar</button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- Repite esta estructura para cada publicación -->
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
