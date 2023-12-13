@extends('layouts.app')
@section('last_head')
    <script src="//cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"></script>
    <link rel="stylesheet" href="//cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.css"/>

@endsection
@section('content')

    <div class="container" style="margin-top: 100px;">
        <div class="row">
            <div class="col-12" style="text-align: center;margin-bottom: 50px;">
                Toastr es una libreria de Javscript que provee de notificaciones toast. Requiere de Jquery.
                <a href="https://github.com/CodeSeven/toastr">Documentación</a>
            </div>
            <div class="col-12" style="text-align: center">
                <button class="btn btn-success" id="toast_success">Toastr success</button>
                <button class="btn btn-warning" id="toast_warning">Toastr warning</button>
                <button class="btn btn-danger" id="toast_error">Toastr error</button>
                <button class="btn btn-info" id="toast_info">Toastr info</button>
            </div>
        </div>


<script>
    window.onload = (event) => {
        document.getElementById('toast_success').addEventListener('click',()=>{
            toastr.success('Toast Success')
        })
        document.getElementById('toast_warning').addEventListener('click',()=>{
            toastr.warning('Toast warning')
        })
        document.getElementById('toast_error').addEventListener('click',()=>{
            toastr.error('Toast error')
        })
        document.getElementById('toast_info').addEventListener('click',()=>{
            toastr.info('Toast info')
        })
    }
</script>
@endsection
