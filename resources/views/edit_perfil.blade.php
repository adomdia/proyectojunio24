@extends('layouts.app')

@section('content')

<div class="page-component__bg_image_box    bg-white-color  first_component  " id="text-07-401621">

    <div class="page-component__wrapper" style="z-index: 11;padding-top:150px;padding-bottom:70px;display:flex;justify-content:center">

        <h2 style="color:black">Actualice su perfil</h2>

    </div>
    <div class="page-component__bg_image_box    bg-white-color  first_component  " id="cta_form-01-207171" style="background-color: #2d2196;">

        <div class="page-component__bg_overlay_box " style="">

        </div>

        <div class="page-component__wrapper" style="z-index: 10;padding-top:30px;padding-bottom:70px;">


            <div class="cta_form-01 False">
                <div class="container cta_form-01__container" style="background-color: white;padding: 20px;border-radius: 15px;">
                    <div class="cta_form-01__wrapper">






                        <div class="container container--small">
                            <div class="title-box title-box--center">


                                <h1 class="heading ">Editar Perfil</h1>



                            </div>
                        </div>


                        <div class="cta_form-01__form_box">
                            {{-- @dd($user) --}}

                            <form class="form  form--centered-button" action="{{route('edit_profile')}}" method="POST" enctype='multipart/form-data'
                                data-sheet-id="">
                                @csrf

                                <div class="form__inputs">

                                    <div class="form__input  form__input--full">
                                        <div class="form__input__label_box">
                                            <label class="button js-submit-button" type="submit" style="background-color:#2d2196;color:#fff" for="EMAIL-85500-0" onclick="document.getElementById('input_avatar').click()">
                                                <span
                                                class="button__text">Actualizar la imagen de perfil</span>
                                            </label>
                                        </div>
                                        <input id="input_avatar" class="text-input js-form-input" type="file" id="OTHER3-77029-7" name="avatar" placeholder="" style="display:none" />
                                    </div>




                                    <div class="form__input  form__input--full  ">
                                        <div class="form__input__label_box">
                                            <label class="form__input__label " for="FNAME-85500-1">
                                                Nick
                                            </label>
                                        </div>
                                        <input class="text-input js-form-input   " type="text" id="FNAME-85500-1"
                                            name="nick" placeholder="Escriba su nombre"  value="{{isset($user->name) ? $user->name : 'Introduzca su nombre...'}}"/>
                                    </div>

                                    <div class="form__input  form__input--full  ">
                                        <div class="form__input__label_box">
                                            <label class="form__input__label " for="FNAME-85500-1">
                                                <span class="form__input__label_asterix"
                                                    title="This field is required.">*</span>


                                                Email
                                            </label>
                                        </div>
                                        <input class="text-input js-form-input   " type="text" id="FNAME-85500-1"
                                            name="email" placeholder="Escriba su nuevo email" />
                                    </div>



                                    <div class="form__input  form__input--full   ">
                                        <div class="form__input__label_box">
                                            <label class="form__input__label " for="OTHER-85500-2">
                                                Nueva contraseña
                                            </label>
                                        </div>
                                        <input class="text-input js-form-input" type="password"  id="OTHER-85500-2"
                                            name="password" />
                                    </div>



                                    <div class="form__input  form__input--full   ">
                                        <div class="form__input__label_box">
                                            <label class="form__input__label " for="OTHER-85500-2">
                                                Confirmar nueva contraseña
                                            </label>
                                        </div>
                                        <input class="text-input js-form-input   " type="password"  id="OTHER-85500-2"
                                            name="password_confirmation" />
                                    </div>

                                    <div class="form__input  form__input--full   ">
                                        <div class="form__input__label_box">
                                            <label class="form__input__label " for="OTHER-85500-2">
                                                DNI
                                                <span class="form__input__label_asterix" style="font-size:1em"
                                                title="Needed">Necenario para los datos de facturación</span>
                                            </label>
                                        </div>
                                        <input class="text-input js-form-input   " type="text"  id="OTHER-85500-2"
                                            name="user_dni" />
                                    </div>



                                    <div class="form__button  form__button--full ">








                                        <button class="button js-submit-button" type="submit" style="background-color:#2d2196;color:#fff"><span
                                                class="button__text">Enviar</span>
                                            <div class="spinner"></div>
                                            <div class="button__submit_success">
                                                <div class="button__success_circle "></div>
                                                <div><svg class="button__success_tick" width="13" height="13"
                                                        viewBox="0 0 13 13" xmlns="http://www.w3.org/2000/svg">
                                                        <path class="button__success_tick_path" stroke="#FFF"
                                                            d="M0 8l5.119 3.873L11.709.381" fill="none"
                                                            fill-rule="evenodd" stroke-linecap="square" />
                                                    </svg></div>
                                            </div><span class="icon"><svg viewBox="0 0 13 10"
                                                    xmlns="http://www.w3.org/2000/svg">
                                                    <path
                                                        d="M12.823 4.164L8.954.182a.592.592 0 0 0-.854 0 .635.635 0 0 0 0 .88l2.836 2.92H.604A.614.614 0 0 0 0 4.604c0 .344.27.622.604.622h10.332L8.1 8.146a.635.635 0 0 0 0 .88.594.594 0 0 0 .854 0l3.869-3.982a.635.635 0 0 0 0-.88z"
                                                        fill-rule="nonzero" fill="#fff" />
                                                </svg></span>
                                        </button>

                                    </div>

                                    <div class="form__messages_box">
                                        <div class="form__messages">

                                            <div class="message message--error js-message js-error-message">
                                                <div class="message__box">
                                                    <button class="message__close js-close-message" type="button"><img
                                                            loading="lazy" class="message__close_icon"
                                                            src="static/img/icons/corner-top--blue.svg" /></button>
                                                    <div class="message__body">
                                                        <div class="message__in">
                                                            <div class="message__bubble">
                                                                <div class="message__bubble_text"><b>Error.</b> Your
                                                                    form has not been submitted<img loading="lazy"
                                                                        class="emoji  " src="static/img/twemoji/1f914.svg"
                                                                        alt="Emoji" />
                                                                </div>
                                                            </div>
                                                            <div class="message__bubble">
                                                                <div class="message__bubble_text">This is what the
                                                                    server says:
                                                                    <div
                                                                        class="message__bubble_error js-error-message-text">
                                                                        There must be an @ at the beginning.</div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="message__out">
                                                            <div class="message__out_box">
                                                                <div class="message__bubble">
                                                                    <div
                                                                        class="message__bubble_text message__bubble_text--out js-reaction-text">
                                                                        I will retry</div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="message__reply_box">
                                                        <div class="message__reply_word">Reply</div>
                                                        <div class="message__options">
                                                            <div class="message__option">
                                                                <button class="button js-react-on-message button--ruby-bg "
                                                                    type="submit"><span class="button__text">Uh
                                                                        oh!</span>
                                                                </button>
                                                            </div>
                                                            <div class="message__option">
                                                                <button class="button js-react-on-message button--ruby-bg "
                                                                    type="submit"><span class="button__text">I will
                                                                        retry</span>
                                                                </button>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                            </form>


                        </div>
                    </div>
                </div>
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
@endsection
