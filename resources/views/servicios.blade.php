@extends('layouts.app')
@section('last_head')
<style>
    .star-rating {
        font-size: 2em;
        color: #f5b301;
    }
    .star-rating .empty-star {
        color: #ccc;
    }
</style>
@endsection
@section('content')

<div class="container mt-5" style="padding-top: 50px">

    <div class="row">
        @foreach($servicios as $servicio)
        <div class="col-md-4 d-flex justify-content-center" style="margin-bottom: 50px">
            <div class="card" style="max-width: 260px">
                @php
                    $user = \App\Models\User::where('id', $servicio->user_id)->first();
                @endphp
                <img src="{{Voyager::image($user->avatar)}}" class="card-img-top" alt="Avatar Usuario 1">
                <div class="card-body">
                    <h5 class="card-title" style="color:black">{{$servicio->title}}</h5>
                    <h5 class="card-title" style="text-align:center;color:black">{{$servicio->price}}€</h5>
                    <div class="star-rating" style="text-align: center;margin-bottom:15px">
                        @if ($servicio->averageRating() !== null)
                            @for ($i = 1; $i <= 5; $i++)
                                @if ($i <= $servicio->averageRating())
                                    &#9733; 
                                @else
                                    <span class="empty-star">&#9733;</span> 
                                @endif
                            @endfor
                        @else
                            <p style="font-size: 20px;color:#2d2196">Sin valoraciones</p>
                        @endif
                    </div>
                    <div class="d-flex justify-content-center">
                        <form id="solicitudForm_{{ $servicio->id }}" action="{{ route('send_solicitude') }}" method="post">
                            @csrf
                            <input type="hidden" name="query" value="{{ $servicio->id }}">
                            <a href="{{route('pagos-servicios', $servicio->id)}}" class="btn btn-primary enviar-solicitud ml-3" data-userid="{{ $servicio->id }}">Comprar</a>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        @endforeach
       
    </div>
</div>

<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.10.2/dist/umd/popper.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>


@endsection
@section('javascript')
    {{-- Aquí scripts solo para esta página--}}
@endsection
