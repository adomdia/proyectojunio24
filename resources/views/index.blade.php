@extends('layouts.app')
@section('last_head')
    {{-- Aquí estilos solo para esta página --}}
@endsection
@section('content')
    <div class="page-component__bg_image_box    bg-white-color  first_component   page-component__bg_image_box--has-image "
        id="header-23-39171" style="background-image: url({{ Voyager::image($content->img) }})">

        <div class="page-component__bg_overlay_box " style="opacity: 0;">

        </div>

        <div class="page-component__wrapper" style="z-index: 114;padding-top:420px;padding-bottom:160px;">





            <header class="header-23 graphics-image default-graphics-image">
                <div class="container container--large header-23__container">
                    <div class="header-23__left">
                        <div class="header-23__left_content">


                            <h1 class="heading heading--accent header-23__heading ">{{ $content->title_1 }}</h1>



                            {!! $content->text_1 !!}

                            <div class="header-23__cta_box">


                                <div class="buttons-set">
                                    <ul class="buttons-set__list">
                                        <li class="buttons-set__item"><a data-stripe-product-id=""
                                                data-stripe-mode="payment" data-successful-payment-url=""
                                                data-cancel-payment-url="" class="button button--black-outline "
                                                href="#regform" target="_self"><span
                                                    class="button__text">Registrate</span></a></li>
                                    </ul>
                                </div>

                            </div>
                        </div>
                    </div>
                    <div class="header-23__right">

                    </div>
                </div>
            </header>


        </div>
    </div>


    <div class="page-component__bg_image_box    page-component__bg_image_box--dark-bg  bg-custom-color   bg-custom-color--dark "
        id="quienessomos">

        <div class="page-component__bg_overlay_box " style=" background-color: #2d2196;">

        </div>

        <div class="page-component__wrapper" style="z-index: 110;padding-top: 1px;padding-bottom: 1px;">





            <header class="header-23 graphics-image default-graphics-image">
                <div class="container container--large header-23__container">
                    <div class="header-23__left">
                        <div class="header-23__left_content">


                            <h2 class="heading heading--accent header-23__heading  text-white">{{ $content->title_2 }}</h2>



                            <div class="header-23__text content_box  text-white">
                                <p>{{ $content->text_2 }}</p>
                            </div>

                            <div class="header-23__cta_box">




                            </div>
                        </div>
                    </div>
                    <div class="header-23__right">
                        <img loading="lazy" class="header-23__img"
                            alt="Modern minimalist website launch promotion instagram post (1)"
                            src="{{ Voyager::image($content->img_2) }}"
                            sizes="(max-width: 320px) 290px,(max-width: 375px) 345px,(max-width: 425px) 395px,(max-width: 600px) 500px,(max-width: 1020px) 500px,620px" />
                    </div>
                </div>
            </header>


        </div>
    </div>








    <div class="page-component__bg_image_box    bg-white-color  " id="features-01-144931">

        <div class="page-component__bg_overlay_box " style="">

        </div>

        <div class="page-component__wrapper" style="z-index: 19;padding-top:30px;padding-bottom:50px;">




            <div class="features-01">





                <div class="container container--small">
                    <div class="title-box title-box--center">


                        <h2 class="heading" style="color:black">{{ $content->title_3 }}</h2>


                    </div>
                </div>

                <div class="container">
                    <ul class="features-01__items">


                        @foreach ($valores as $v)
                            <li class="features-01__item">


                                <div class="feature   ">
                                    <h3 class="feature__title">

                                        <div class="feature__icon">
                                            <span class="icon"
                                                data="{&#39;alt&#39;: &#39;Post para instagram opiniones clientes minimalista pastel&#39;, &#39;type&#39;: &#39;uploaded&#39;, &#39;width&#39;: 1080, &#39;height&#39;: 1080, &#39;emojiSrc&#39;: &#39;1f381.svg&#39;, &#39;uploadedSrc&#39;: &#39;https://ucarecdn.com/875b53c4-3876-48c9-bfc9-5379e137d2cc/&#39;, &#39;lineaIconSrc&#39;: &#39;&#39;, &#39;uploadedUUID&#39;: &#39;875b53c4-3876-48c9-bfc9-5379e137d2cc&#39;, &#39;abstractIconId&#39;: &#39;6&#39;, &#39;uploadedHeight&#39;: 60}">





                                                <img loading="lazy"
                                                    alt="Post para instagram opiniones clientes minimalista pastel"
                                                    class="" height="60"
                                                    src="https://unicorn-cdn.b-cdn.net/875b53c4-3876-48c9-bfc9-5379e137d2cc/post-para-instagram-opiniones-clientes-minimalista-pastel.png"
                                                    sizes="60px" />




                                            </span>
                                        </div>

                                        <span class="feature__title_text" style="color:black">
                                            <strong>{{ $v->title }}</strong>
                                        </span>
                                    </h3>
                                    <div class="feature__content">
                                        <span class="feature__content_text content_box">
                                            <p style="color:black">{{ $v->text }}</p>

                                        </span>
                                    </div>

                                </div>


                            </li>
                        @endforeach


                    </ul>
                    <div class="bottom_cta">




                    </div>
                </div>
            </div>


        </div>
    </div>



    <div class="page-component__bg_image_box    bg-white-color  first_component  " id="logform">

        <div class="page-component__wrapper" style="z-index: 11;padding-top:150px;padding-bottom:70px;">


        </div>
        <div class="page-component__bg_image_box    bg-white-color  first_component  " id="cta_form-01-207171"
            style="background-color: #2d2196;">

            <div class="page-component__bg_overlay_box " style="">

            </div>

            <div class="page-component__wrapper" style="z-index: 10;padding-top:30px;padding-bottom:70px;">


                <div class="cta_form-01 False">
                    <div class="container cta_form-01__container"
                        style="background-color: white;padding: 20px;border-radius: 15px;">
                        <div class="cta_form-01__wrapper">






                            <div class="container container--small">
                                <div class="title-box title-box--center">


                                    <h1 class="heading " style="color:black">Accede con tu correo y contraseña</h1>



                                </div>
                            </div>


                            <div class="cta_form-01__form_box">


                                <form class="form  form--centered-button" action="{{ route('loginV') }}" method="POST"
                                    data-sheet-id="">
                                    @csrf

                                    <div class="form__inputs">



                                        <div class="form__input  form__input--full  ">
                                            <div class="form__input__label_box">
                                                <label class="form__input__label " for="EMAIL-85500-0">
                                                    <span class="form__input__label_asterix"
                                                        title="This field is required.">*</span>


                                                    E-mail
                                                </label>
                                            </div>
                                            <input class="text-input js-form-input   " type="text" id="EMAIL-85500-0"
                                                name="email" required placeholder="Escriba su mail" />
                                        </div>

                                        <div class="form__input  form__input--full   ">
                                            <div class="form__input__label_box">
                                                <label class="form__input__label " for="OTHER-85500-2">
                                                    <span class="form__input__label_asterix"
                                                        title="This field is required.">*</span>
                                                    Contraseña
                                                </label>
                                            </div>
                                            <input class="text-input js-form-input   " type="password" required
                                                id="OTHER-85500-2" name="password" required
                                                placeholder="Escriba su contraseña" />
                                        </div>

                                        <div class="form__button  form__button--full ">

                                            <button class="button js-submit-button" type="submit"
                                                style="background-color:#2d2196;color:#fff"><span
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


                                    </div>

                                </form>


                            </div>
                        </div>
                    </div>
                </div>

            </div>


            <div class="page-component__bg_overlay_box " style="">

            </div>

            <div class="page-component__wrapper" style="z-index: 10;padding-top:30px;padding-bottom:70px;">


                <div class="cta_form-01 False">
                    <div class="container cta_form-01__container">
                        <div class="cta_form-01__wrapper">






                            <div class="container container--small">
                                <div class="title-box title-box--center">

                                    <button class="button" style="background-color:#fff;" onclick="mostrarVerify()">
                                        <span class="button__text" style="color:#2d2196">Validar código</span>
                                    </button>



                                </div>
                            </div>

                        </div>
                    </div>
                </div>

            </div>

        </div>




        <div class="page-component__bg_image_box    bg-white-color  first_component" style="display:none"
            id="verifyform">

            <div class="page-component__wrapper" style="z-index: 11;padding-top:150px;padding-bottom:70px;">


            </div>
            <div class="page-component__bg_image_box    bg-white-color  first_component  " id="cta_form-01-207171"
                style="background-color: #2d2196;">

                <div class="page-component__bg_overlay_box " style="">

                </div>

                <div class="page-component__wrapper" style="z-index: 10;padding-top:30px;padding-bottom:70px;">


                    <div class="cta_form-01 False">
                        <div class="container cta_form-01__container"
                            style="background-color: white;padding: 20px;border-radius: 15px;">
                            <div class="cta_form-01__wrapper">






                                <div class="container container--small">
                                    <div class="title-box title-box--center">


                                        <h1 class="heading " style="color:black">Verificación de código enviado al correo</h1>



                                    </div>
                                </div>


                                <div class="cta_form-01__form_box">


                                    <form class="form  form--centered-button" action="{{ route('validar') }}"
                                        method="POST" data-sheet-id="">
                                        @csrf

                                        <div class="form__inputs">



                                            <div class="form__input  form__input--full  ">
                                                <div class="form__input__label_box">
                                                    <label class="form__input__label " for="EMAIL-85500-0">
                                                        <span class="form__input__label_asterix"
                                                            title="This field is required.">*</span>


                                                        E-mail
                                                    </label>
                                                </div>
                                                <input class="text-input js-form-input   " type="text"
                                                    id="EMAIL-85500-0" name="email" required
                                                    placeholder="Escriba su mail" />
                                            </div>




                                            <div class="form__input  form__input--full  ">
                                                <div class="form__input__label_box">
                                                    <label class="form__input__label " for="FNAME-85500-1">
                                                        <span class="form__input__label_asterix"
                                                            title="This field is required.">*</span>


                                                        Código confirmación
                                                    </label>
                                                </div>
                                                <input class="text-input js-form-input   " type="text"
                                                    id="FNAME-85500-1" name="code" required
                                                    placeholder="Escriba el código recibido" />
                                            </div>

                                            <div class="form__button  form__button--full ">








                                                <button class="button js-submit-button" type="submit"
                                                    style="background-color:#2d2196;color:#fff"><span
                                                        class="button__text">Enviar</span>
                                                    <div class="spinner"></div>
                                                    <div class="button__submit_success">
                                                        <div class="button__success_circle "></div>
                                                        <div><svg class="button__success_tick" width="13"
                                                                height="13" viewBox="0 0 13 13"
                                                                xmlns="http://www.w3.org/2000/svg">
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


                                        </div>

                                    </form>


                                </div>
                            </div>
                        </div>
                    </div>

                </div>




            </div>
        </div>









            <div class="page-component__bg_image_box" id="regform">

                <div class="page-component__bg_image_box " id="cta_form-01-207171" >

                    <div class="page-component__wrapper" style="z-index: 11;padding-top:150px;padding-bottom:70px;">


                    </div>

                    <div class="page-component__wrapper" style="z-index: 10;padding-top:30px;padding-bottom:70px;background-color: #2d2196;">


                        <div class="cta_form-01 False">
                            <div class="container cta_form-01__container"
                                style="background-color: white;padding: 20px;border-radius: 15px;">
                                <div class="cta_form-01__wrapper">






                                    <div class="container container--small">
                                        <div class="title-box title-box--center">


                                            <h1 class="heading" style="color:black">Formulario de registro</h1>



                                        </div>
                                    </div>


                                    <div class="cta_form-01__form_box">


                                        <form class="form  form--centered-button" action="{{ route('registrar') }}"
                                            method="POST" data-sheet-id="">
                                            @csrf

                                            <div class="form__inputs">



                                                <div class="form__input  form__input--full  ">
                                                    <div class="form__input__label_box">
                                                        <label class="form__input__label " for="EMAIL-85500-0">
                                                            <span class="form__input__label_asterix"
                                                                title="This field is required.">*</span>


                                                            E-mail
                                                        </label>
                                                    </div>
                                                    <input class="text-input js-form-input   " type="text"
                                                        id="EMAIL-85500-0" name="email" required
                                                        placeholder="Escriba su mail" />
                                                </div>




                                                <div class="form__input  form__input--full  ">
                                                    <div class="form__input__label_box">
                                                        <label class="form__input__label " for="FNAME-85500-1">
                                                            <span class="form__input__label_asterix"
                                                                title="This field is required.">*</span>


                                                            Nombre
                                                        </label>
                                                    </div>
                                                    <input class="text-input js-form-input   " type="text"
                                                        id="FNAME-85500-1" name="name" required
                                                        placeholder="Escriba su nombre" />
                                                </div>



                                                <div class="form__input  form__input--full   ">
                                                    <div class="form__input__label_box">
                                                        <label class="form__input__label " for="OTHER-85500-2">
                                                            <span class="form__input__label_asterix"
                                                                title="This field is required.">*</span>
                                                            Contraseña
                                                        </label>
                                                    </div>
                                                    <input class="text-input js-form-input   " type="password" required
                                                        id="OTHER-85500-2" name="password" required
                                                        placeholder="Escriba su contraseña" />
                                                </div>



                                                <div class="form__input  form__input--full   ">
                                                    <div class="form__input__label_box">
                                                        <label class="form__input__label " for="OTHER-85500-2">
                                                            <span class="form__input__label_asterix"
                                                                title="This field is required.">*</span>
                                                            Confirmar contraseña
                                                        </label>
                                                    </div>
                                                    <input class="text-input js-form-input   " type="password" required
                                                        id="OTHER-85500-2" name="password_confirmation" required
                                                        placeholder="Confirme su contraseña" />
                                                </div>



                                                <div class="form__button  form__button--full ">








                                                    <button class="button js-submit-button formReg" type="submit"
                                                        style="color:#fff"><span class="button__text">Enviar</span>
                                                        <div class="spinner"></div>
                                                        <div class="button__submit_success">
                                                            <div class="button__success_circle "></div>
                                                            <div><svg class="button__success_tick" width="13"
                                                                    height="13" viewBox="0 0 13 13"
                                                                    xmlns="http://www.w3.org/2000/svg">
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


                                            </div>

                                        </form>


                                    </div>
                                </div>
                            </div>
                        </div>

                    </div>
                </div>






            </div>

            <style>
                p {
                    color: #fff;
                }

                .formReg {
                    background-color: #2d2196;
                }
            </style>
        @endsection
        @section('javascript')
        <script>
            function mostrarVerify() {
                var elemento = document.getElementById("verifyform");
                if (elemento.style.display === "none") {
                    elemento.style.display = "block";
                }
            }
            var aviso = document.querySelector('.close')
            aviso.addEventListener('click', function() {
            aviso.parentNode.style.display = "none"
            });

        </script>
        @endsection
