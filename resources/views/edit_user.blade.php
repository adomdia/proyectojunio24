@extends('layouts.app')
@section('last_head')
   <script src="//cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"></script>
   <link rel="stylesheet" href="//cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.css"/>

@endsection
@section('content')

    <div class="container" style="margin-top: 100px">
        <div class="row">
            <div class="col-12"><span>Ejemplo de modificacion de datos del usuario mediante ajax y con validaciones en el backend.</span></div>
            <div class="col-md-3"><!--left col-->
                <div class="text-center">
                    <img style="width: 190px;height: 190px" src="{{\App\Helpers\ImagesVoyagerHelper::getImage(\Illuminate\Support\Facades\Auth::user()->avatar)}}" class="avatar img-circle img-thumbnail" alt="avatar">
                    <input type="file" accept="image/*" name="avatar" class="text-center center-block file-upload">
                </div>
                <br>
            </div>
            <div class="col-md-6" style="margin: auto">
                <div class="tab-content">
                    <div class="tab-pane active" id="home">
                        <hr>
                        <form class="form" id="registrationForm" enctype="multipart/form-data">
                            <div class="form-group">

                                <div class="col-md-12">
                                    <label for="first_name"><h4>Nombre y aplliedos</h4></label>
                                    <input type="text" value="{{$user->name}}" class="form-control" name="name_lastname" id="name_lastname" placeholder="" >
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="col-md-12">
                                    <label for="last_name"><h4>Email</h4></label>
                                    <input type="email" value="{{$user->email}}"  class="form-control" name="email" id="email" placeholder="tu@email.com" title="Introduce tu email.">
                                </div>
                            </div>

                            <div class="form-group">
                                <div class="col-md-12">
                                    <label for="password"><h4>Contraseña</h4></label>
                                    <input type="password" class="form-control" name="password" autocomplete="new-password" id="password"  placeholder="Dejar en blanco para dejar la misma" title="Introduce tu contraseña.">
                                <small style="color:red">Si estás usando la cuenta de PlayTogether, recuerda reestablecer la contraseña original</small>
                                </div>
                            </div>
                            <div class="form-group">

                                <div class="col-md-12">
                                    <label for="password2"><h4>Confirmar contraseña</h4></label>
                                    <input type="password" class="form-control" name="password_confirmation" id="" placeholder="" title="Confirma la contraseña">
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="col-xs-12">
                                    <br>
                                    <button class="btn btn-lg btn-success" id="submit_button" type="button">Guardar</button>
                                </div>
                            </div>
                        </form>
                    </div><!--/tab-pane-->
                </div><!--/tab-pane-->
            </div><!--/tab-content-->
        </div><!--/col-9-->
    </div><!--/row-->

<script>
    window.onload = (event) => {
        var readURL = function(input) {
            if (input.files && input.files[0]) {
                var reader = new FileReader();
                reader.onload = function (e) {
                    $('.avatar').attr('src', e.target.result);
                }
                reader.readAsDataURL(input.files[0]);
            }
        }
        $(".file-upload").on('change', function(){
            readURL(this);
        });
       document.getElementById('submit_button').addEventListener('click',()=>{
           let data = new FormData();
           let avatar_file = document.getElementsByName('avatar')[0].files[0];
           let name_lastname = document.getElementsByName('name_lastname')[0].value;
           let password = document.getElementsByName('password')[0].value;
           let password_confirmation = document.getElementsByName('password_confirmation')[0].value;
           let email = document.getElementsByName('email')[0].value;
           data.append('_token','{{csrf_token()}}');
           data.append('name_lastname',name_lastname);
           data.append('password',password);
           data.append('password_confirmation',password_confirmation);
           data.append('email',email);
           if(avatar_file){
               data.append('avatar',avatar_file);
           }
           $.ajax({
               url: "{{route('update.profile')}}",
               type: 'post',
               contentType: false,
               processData: false,
               data: data,
               success: function (data) {
                   document.getElementsByName('avatar')[0].value ='';
                   document.getElementsByName('password')[0].value = ''
                   document.getElementsByName('password_confirmation')[0].value = ''
                   toastr.success('Datos actualizados correctamente.')
               },
               error: data => {
                   toastr.error('Ha ocurrido un error.')
               }
           });
       })
    };
</script>
@endsection
@section('javascript')
    {{-- Aquí scripts solo para esta página--}}
@endsection
