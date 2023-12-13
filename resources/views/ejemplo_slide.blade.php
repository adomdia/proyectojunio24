@extends('layouts.app')
@section('last_head')
    <link rel="stylesheet" href="{{asset('owl-carousel/css/owl.carousel.css') }}">
    <style>
        .owl-nav{
            text-align: center;
        }
        .owl-nav button{
            margin: 8px;
        }
        .owl-nav button>span{
            font-size: 25px;
        }
        .item{
            width: 100%;
            background-color: #00da89;
            height: 200px;
        }
        .row a{
            color: #0d6efd !important;
            font-weight: bold;
        }
    </style>
@endsection
@section('content')

    <div class="container">
        <div class="row">
            <div class="col-12" style="margin-top: 250px">
                <p>Owl-Carousel. <a href="https://owlcarousel2.github.io/OwlCarousel2/docs/started-welcome.html">Documentación</a></p>
                <div class="owl-carousel owl-theme">
                    <div class="item"><h4>1</h4></div>
                    <div class="item"><h4>2</h4></div>
                    <div class="item"><h4>3</h4></div>
                    <div class="item"><h4>4</h4></div>
                    <div class="item"><h4>5</h4></div>
                    <div class="item"><h4>6</h4></div>
                    <div class="item"><h4>7</h4></div>
                    <div class="item"><h4>8</h4></div>
                    <div class="item"><h4>9</h4></div>
                    <div class="item"><h4>10</h4></div>
                    <div class="item"><h4>11</h4></div>
                    <div class="item"><h4>12</h4></div>
                </div>
            </div>
        </div>
    </div>


@endsection
@section('javascript')
    <script>
        $('.owl-carousel').owlCarousel({
            loop:true,
            margin:10,
            autoplay:true,
            autoplayTimeout:650,
            autoplayHoverPause:true,
            nav:true,
            responsive:{
                0:{
                    items:1
                },
                600:{
                    items:3
                },
                1000:{
                    items:5
                }
            }
        })
    </script>
@endsection
