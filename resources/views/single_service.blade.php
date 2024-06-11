@extends('layouts.app')
@section('last_head')
    {{--Aquí estilos solo para esta página--}}
@endsection
@section('content')
<style>
    .audio-container {
        position: relative;
        display: inline-block;
    }
    .audio-container .image-mask {
        position: absolute;
        top: 0;
        left: 0;
        right: 0;
        bottom: 0;
        background: rgba(0, 0, 0, 0.5); /* Optional: to darken the image */
    }
    .audio-container img {
        display: block;
        max-width: 100%;
        height: auto;
    }
    .audio-container audio {
        position: absolute;
        bottom: 10px;
        left: 50%;
        transform: translateX(-50%);
        width: 90%;
    }

    .star-rating {
        display: inline-flex;
        font-size: 2em;
        direction: rtl;
    }
    .star-rating input[type="radio"] {
        display: none;
    }
    .star-rating label {
        cursor: pointer;
        color: #ccc;
    }
    .star-rating input[type="radio"]:checked ~ label {
        color: #ccc;
    }
    .star-rating input[type="radio"]:checked + label,
    .star-rating input[type="radio"]:checked + label ~ label {
        color: #f5b301;
    }
    .star-rating label:hover,
    .star-rating label:hover ~ label {
        color: #f5b301;
    }
</style>


@php
    $owned = App\Models\OwnedService::where('user_id', Auth()->user()->id)->pluck('service_id');
@endphp

    @if ($owned->contains($servicio->id))
<div class="container text-center mt-5" style="padding-top:150px">
    <div class="content-section">
        <h1 style="color:black">{{$servicio->title}}</h1>
        @php
            $user = \App\Models\User::where('id', $servicio->user_id)->first();
        @endphp
        <p><a href="{{route('guest_profile', $user->id)}}" class="text-decoration-none">{{$user->name}}</a></p>
    </div>

    <div class="content-section" style="display: flex;justify-content: center;">
        @if (in_array(strtolower(str_replace('"}]', '', pathinfo($servicio->multimedia, PATHINFO_EXTENSION))), [
                                    'jpg',
                                    'jpeg',
                                    'png',
                                    'gif',
                                ]))
            <img src="{{ Voyager::image(json_decode($servicio->multimedia)[0]->download_link) }}"
                class="img-fluid" alt="Imagen de publicación">
        @elseif (in_array(strtolower(str_replace('"}]', '', pathinfo($servicio->multimedia, PATHINFO_EXTENSION))), [
                'mp4',
                'avi',
                'mov',
                'mkv',
            ]))
            <video class="img-fluid" controls>
                <source src="{{ url ('storage/' .json_decode($servicio->multimedia)[0]->download_link) }}"
                    type="video/mp4">
                Tu navegador no soporta el tag de video.
            </video>
        @elseif (in_array(strtolower(str_replace('"}]', '', pathinfo($servicio->multimedia, PATHINFO_EXTENSION))), ['mp3',
                                                                                                                     'wav']))
            <div class="audio-container">
                <div class="image-mask"></div>
                <img src="{{ Voyager::image($user->avatar) }}" class="img-fluid" style="max-width:500px"
                    alt="Imagen de perfil del usuario">
                <audio controls>
                    <source src="{{ url ('storage/' .json_decode($servicio->multimedia)[0]->download_link) }}"
                        type="audio/mp3">
                    Tu navegador no soporta el tag de audio.
                </audio>
            </div>
        @endif
    </div>

    <div class="content-section">
        <p>{{$servicio->text}}</p>
    </div>


    <div class="content-section" style="margin-top:150px">
        <h2 style="color:black">Ayuda a la comunidad valorando este contenido</h2>
    </div>
    <form id="ratingForm" action="{{ route('submit.rating') }}" method="POST">
        @csrf
        <input hidden value="{{$servicio->id}}" name="servicio_id">
        <div class="star-rating">
            <input type="radio" id="star1" name="rating" value="5" /><label for="star1">&#9733;</label>
            <input type="radio" id="star2" name="rating" value="4" /><label for="star2">&#9733;</label>
            <input type="radio" id="star3" name="rating" value="3" /><label for="star3">&#9733;</label>
            <input type="radio" id="star4" name="rating" value="2" /><label for="star4">&#9733;</label>
            <input type="radio" id="star5" name="rating" value="1" /><label for="star5">&#9733;</label>
        </div>
        <br>
        <button type="submit" class="btn btn-primary mt-5 mb-5">Valorar</button>
    </form>
</div>


@else
<div class="container text-center mt-5" style="padding-top:150px">
    <div class="content-section">
        <h1 style="color:black">Contrata el servicio para poder disfrutarlo</h1>
    </div>
@endif

@endsection
@section('javascript')
    {{-- Aquí scripts solo para esta página--}}
@endsection
