@extends('layouts.app')
@section('last_head')
    {{--Aquí estilos solo para esta página--}}
@endsection
@section('content')

<div class="page-component__bg_image_box    bg-white-color  first_component  " id="text-07-401621">

    <div class="page-component__wrapper" style="z-index: 11;padding-top:150px;padding-bottom:70px;">


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


                                <h1 class="heading ">Subir un nuevo producto</h1>



                            </div>
                        </div>


                        <div class="cta_form-01__form_box">


                            <form class="form  form--centered-button" action="{{route('upload_servicio')}}" method="POST" enctype="multipart/form-data"
                                data-sheet-id="">
                                @csrf

                                <div class="form__inputs">



                                    <div class="form__input  form__input--full  ">
                                        <div class="form__input__label_box">
                                            <label class="form__input__label " for="EMAIL-85500-0">
                                                <span class="form__input__label_asterix"
                                                    title="This field is required.">*</span>
                                                Título
                                            </label>
                                        </div>
                                        <input class="text-input js-form-input   " type="text" id="EMAIL-85500-0"
                                            name="title" required placeholder="Escriba un título" />
                                    </div>

                                    <div class="form__input  form__input--full">
                                        <div class="form__input__label_box">
                                            <label class="button js-submit-button" type="submit" style="background-color:#2d2196;color:#fff" for="EMAIL-85500-0" onclick="document.getElementById('input_img').click()">
                                                <span
                                                class="button__text">Añadir contenido multimedia</span>
                                            </label>
                                        </div>
                                        <input id="input_img" class="text-input js-form-input" type="file" id="OTHER3-77029-7" name="img[]" multiple placeholder="" style="display:none" />
                                    </div>


                                    <div class="form__input  form__input--full  ">
                                        <div class="form__input__label_box">
                                            <label class="form__input__label " for="EMAIL-85500-0">
                                                <span class="form__input__label_asterix"
                                                    title="This field is required.">*</span>
                                                Texto
                                            </label>
                                        </div>
                                        <textarea class="text-input js-form-input" type="text" id="EMAIL-85500-0"
                                            name="text" required>
                                        </textarea>
                                    </div>

                                    <div class="form__input  form__input--full  ">
                                        <div class="form__input__label_box">
                                            <label class="form__input__label " for="EMAIL-85500-0">
                                                <span class="form__input__label_asterix"
                                                    title="This field is required.">*</span>
                                                Precio
                                            </label>
                                        </div>
                                        <input class="text-input js-form-input" type="number" id="price-input" name="price" required placeholder="Escriba un precio" step="0.01" min="0" />
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


@endsection
@section('javascript')
    {{-- Aquí scripts solo para esta página--}}
@endsection
