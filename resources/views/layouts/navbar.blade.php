<nav class="js-nav nav-02 ">
    <div class="topContainer" >

    <div class="container container--large">
        <div class="nav-02__box">
            <div class="nav-02__logo"><a class="nav-02__link" href="{{ route('home') }}" target="_self">


                    <img class="nav-02__logo_img" height="100" style="max-height: 80px" alt="Logo" src="{{ asset('/images/logo-icon.png') }}"
                        sizes="160px" />


                </a></div>
            <div class="nav-02__links js-menu">
                <div class="nav-02__list_wrapper  ">
                    <ul class="nav-02__list nav-02__list--desktop">

                        @if (!auth()->id())

                        <li class="nav-02__item">

                            <a class="button   button--black-outline  button--empty " href="{{ route('home') }}"
                                target="_self"><span class="button__text">Inicio</span>
                            </a>

                        </li>


                        <li class="nav-02__item">

                            <a class="button   button--black-outline  button--empty " href="#quienessomos"
                                target="_self"><span class="button__text">¿Quiénes somos?</span>
                            </a>

                        </li>

                        <li class="nav-02__item">


                            <div class="buttons-set">
                                <ul class="buttons-set__list">
                                    <li class="buttons-set__item"><a data-stripe-product-id=""
                                            data-stripe-mode="payment" data-successful-payment-url=""
                                            data-cancel-payment-url="" class="button button--black-outline "
                                            href="#regform" target="_self"><span
                                                class="button__text">Registro</span></a></li>
                                </ul>
                            </div>

                        </li>

                        <li class="nav-02__item">


                            <div class="buttons-set">
                                <ul class="buttons-set__list">
                                    <li class="buttons-set__item"><a data-stripe-product-id=""
                                            data-stripe-mode="payment" data-successful-payment-url=""
                                            data-cancel-payment-url="" class="button button--black-outline "
                                            href="#logform" target="_self"><span
                                                class="button__text">Acceder</span></a></li>
                                </ul>
                            </div>

                        </li>


                        @elseif (auth()->id())
                        {{ menu('web', 'layouts.menu_protegido') }}
                            {{-- <li class="nav-02__item">


                                <div class="buttons-set">
                                    <ul class="buttons-set__list">
                                        <li class="buttons-set__item">
                                            <a class="button button--empty button--black-outline"
                                                href="{{ route('logout') }}"
                                                onclick="event.preventDefault();
                                            document.getElementById('logout-form').submit();">
                                                <span class="button__text">Salir</span>
                                            </a>
                                            <form id="logout-form" action="{{ route('logout') }}" method="POST"
                                                style="display: none;">
                                                @csrf
                                            </form>
                                        </li>
                                    </ul>
                                </div>

                            </li> --}}


                        @endif
                    </ul>
                    <ul class="nav-02__list nav-02__list--mobile">


                        @if (!auth()->id())

                        <li class="nav-02__item">

                            <a class="button   button--black-outline  button--empty " href="{{ route('home') }}"
                                target="_self"><span class="button__text">Inicio</span>
                            </a>

                        </li>


                        <li class="nav-02__item">

                            <a class="button   button--black-outline  button--empty " href="#quienessomos"
                                target="_self"><span class="button__text">¿Quiénes somos?</span>
                            </a>

                        </li>

                        <li class="nav-02__item">


                            <div class="buttons-set">
                                <ul class="buttons-set__list">
                                    <li class="buttons-set__item"><a data-stripe-product-id=""
                                            data-stripe-mode="payment" data-successful-payment-url=""
                                            data-cancel-payment-url="" class="button button--black-outline "
                                            href="#regform" target="_self"><span
                                                class="button__text">Registro</span></a></li>
                                </ul>
                            </div>

                        </li>

                        <li class="nav-02__item">


                            <div class="buttons-set">
                                <ul class="buttons-set__list">
                                    <li class="buttons-set__item"><a data-stripe-product-id=""
                                            data-stripe-mode="payment" data-successful-payment-url=""
                                            data-cancel-payment-url="" class="button button--black-outline "
                                            href="#logform" target="_self"><span
                                                class="button__text">Acceder</span></a></li>
                                </ul>
                            </div>

                        </li>


                        @elseif (auth()->id())
                            {{ menu('web', 'layouts.menu_protegido_mobile') }}
                            {{-- <li class="nav-02__item">


                                <div class="buttons-set">
                                    <ul class="buttons-set__list">
                                        <li class="buttons-set__item">
                                            <a class="button button--empty button--black-outline"
                                                href="{{ route('logout') }}"
                                                onclick="event.preventDefault();
                                            document.getElementById('logout-form').submit();">
                                                <span class="button__text">Salir</span>
                                            </a>
                                            <form id="logout-form" action="{{ route('logout') }}" method="POST"
                                                style="display: none;">
                                                @csrf
                                            </form>
                                        </li>
                                    </ul>
                                </div>

                            </li> --}}


                        @endif
                    </ul>
                </div>


                <div class="nav-02__burger">
                    <button class="burger burger--black js-open-menu" type="button">
                        <div class="burger__box">
                            <div class="burger__inner"></div>
                        </div>
                    </button>
                </div>


            </div>
        </div>
    </div>
</div>
</nav>


<style>
    .topContainer{
        position: relative;
        top: 0;
        background-color : #2d2196;
    }
</style>
