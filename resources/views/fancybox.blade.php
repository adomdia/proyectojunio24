@extends('layouts.app')
@section('last_head')
    <script src="https://cdn.jsdelivr.net/npm/@fancyapps/ui@4.0/dist/fancybox.umd.js"></script>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/@fancyapps/ui@4.0/dist/fancybox.css"/>
@endsection
@section('content')
    <div class="container">
        <div class="row">
            <div class="col-12" style="margin-top: 50px">
                <a href="https://fancyapps.com/docs/ui/fancybox/">Documentación</a>
            </div>
            <div class="col-12" style="margin-top: 20px;display: flex">
                <a data-fancybox="gallery" class="img_galeria" href="https://img.freepik.com/foto-gratis/hermosa-vista-oceano-cielo-colorido-capturado-al-atardecer-andalucia-espana_181624-8647.jpg?w=900&t=st=1659343021~exp=1659343621~hmac=7b1a02529f679780ecab9680a63e717fc1ae59a6be7a25318f938abe2dd7b21d">
                    <img src="https://img.freepik.com/foto-gratis/hermosa-vista-oceano-cielo-colorido-capturado-al-atardecer-andalucia-espana_181624-8647.jpg?w=900&t=st=1659343021~exp=1659343621~hmac=7b1a02529f679780ecab9680a63e717fc1ae59a6be7a25318f938abe2dd7b21d" class="img-fluid mx-auto d-block mg-sm rounded" style="object-fit: contain;height: 265px;"/>
                </a>
                <a data-fancybox="gallery" class="img_galeria" href="https://img.freepik.com/fotos-premium/fascinante-vista-puesta-sol-sobre-mar-baltico-lituania_181624-57174.jpg">
                    <img src="https://img.freepik.com/fotos-premium/fascinante-vista-puesta-sol-sobre-mar-baltico-lituania_181624-57174.jpg" class="img-fluid mx-auto d-block mg-sm rounded" style="object-fit: contain;height: 265px;"/>
                </a>
                <a data-fancybox="gallery" class="img_galeria" href="https://img.freepik.com/foto-gratis/primer-plano-agua-azul-amanecer_181624-20980.jpg?t=st=1659320170~exp=1659320770~hmac=9fc3a0993a47b344c49c653f518f7b5ef3d326740de7ca2bfac686a9eedd5560">
                    <img src="https://img.freepik.com/foto-gratis/primer-plano-agua-azul-amanecer_181624-20980.jpg?t=st=1659320170~exp=1659320770~hmac=9fc3a0993a47b344c49c653f518f7b5ef3d326740de7ca2bfac686a9eedd5560" class="img-fluid mx-auto d-block mg-sm rounded" style="object-fit: contain;height: 265px;"/>
                </a>
            </div>
        </div>
    </div>

@endsection
@section('javascript')
    {{-- Aquí scripts solo para esta página--}}
@endsection
