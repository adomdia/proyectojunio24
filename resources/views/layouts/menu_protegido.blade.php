@php

    if (Voyager::translatable($items)) {
        $items = $items->load('translations');
    }

@endphp

{{-- Este es el bucle más importante --}}
@foreach ($items as $item)
    @php

        $originalItem = $item;
        if (Voyager::translatable($item)) {
            $item = $item->translate($options->locale);
        }

        $listItemClass = 'nav-item';
        $linkAttributes = 'class="nav-link link text-white text-primary display-4"';
        $styles = null;
        $icon = null;
        $caret = null;

        // With Children Attributes
        if (!$originalItem->children->isEmpty()) {
            $linkAttributes = 'class="nav-link link text-white dropdown-toggle display-4" data-toggle="dropdown-submenu" aria-expanded="false"';
            $caret = '<span class="caret"></span>';

            if (url($item->link()) == url()->current()) {
                $listItemClass = 'nav-item dropdown active';
            } else {
                $listItemClass = 'nav-item dropdown';
            }
        }

        // Set Icon
        if (isset($options->icon) && $options->icon == true) {
            $icon = '<i class="' . $item->icon_class . '"></i>';
        }

    @endphp
    <li class="nav-02__item" style="color:white">

        <a class="button   button--white-outline  button--empty " style="text-decoration:none"
            href="{{ url($item->link()) }}" target="{{ $item->target }}"><span
                class="button__text">{{ $item->title }}</span>
        </a>
    </li>
@endforeach

@php
    $user = Auth()->user();
@endphp

<li class="nav-02__item">
    <button class="button button--has-dropdown js-toggle-dropdown" style="box-shadow: rgba(0, 0, 0, 0)">
        <span class="button__text" style="color:#fff">
            @if (!$user->nick)
                {{ $user->name }}
            @else
                {{ $user->nick }}
            @endif
        </span>
    </button>
    <ul class="dropdown__list">

        <li class="nav-02__item">


            <div class="buttons-set">
                <ul class="buttons-set__list">
                    <li class="buttons-set__item">
                        <a class="button button--empty button--white-outline" href="{{ route('user_profile') }}">
                            <span class="button__text">Mi perfil</span>
                        </a>
                    </li>
                </ul>
            </div>

        </li>

        {{-- <li class="nav-02__item">


                        <div class="buttons-set">
                            <ul class="buttons-set__list">
                                <li class="buttons-set__item">
                                    <a class="button button--empty button--black-outline"
                                    href="{{ route('user_services') }}">
                                    <span class="button__text">Mis servicios</span>
                                    </a>
                                </li>
                            </ul>
                        </div>

                    </li> --}}


        <li class="nav-02__item">


            <div class="buttons-set">
                <ul class="buttons-set__list">
                    <li class="buttons-set__item">
                        <a class="button button--empty button--white-outline" href="{{ route('user_edit_profile') }}">
                            <span class="button__text">Editar perfil</span>
                        </a>
                    </li>
                </ul>
            </div>

        </li>
        {{-- @dd(auth()->id()) --}}
        @php

            $loggedInUserId = auth()->id();

            $ultimoMensaje = App\Models\MessageContent::where('user_id', $loggedInUserId)
                ->orWhere('foreign_id', $loggedInUserId)
                ->orderBy('created_at', 'desc')
                ->first();

                $otroUsuarioId = null;

                if ($ultimoMensaje) {
                    $otroUsuarioId = ($ultimoMensaje->user_id == $loggedInUserId) ? $ultimoMensaje->foreign_id : $ultimoMensaje->user_id;
                }

        @endphp
        
        <li class="nav-02__item">


            <div class="buttons-set">
                <ul class="buttons-set__list">
                    <li class="buttons-set__item">
                        @if($ultimoMensaje == null)
                        <a class="button button--empty button--white-outline" href="{{ route('amigos') }}">
                            <span class="button__text">Chats</span>
                        </a>
                        @else
                        <a class="button button--empty button--white-outline" href="{{ route('chat', $otroUsuarioId) }}">
                            <span class="button__text">Chats</span>
                        </a>
                        @endif
                    </li>
                </ul>
            </div>

        </li>

        <li class="nav-02__item">


            <div class="buttons-set">
                <ul class="buttons-set__list">
                    <li class="buttons-set__item">
                        <a class="button button--empty button--white-outline" href="{{ route('amigos') }}">
                            <span class="button__text">Amigos</span>
                        </a>
                    </li>
                </ul>
            </div>

        </li>



        <li class="nav-02__item">


            <div class="buttons-set">
                <ul class="buttons-set__list">
                    <li class="buttons-set__item">
                        <a class="button button--empty button--white-outline" href="{{ route('solicitud') }}">
                            <span class="button__text">Solicitudes</span>
                        </a>
                    </li>
                </ul>
            </div>

        </li>

        <li class="nav-02__item">


            <div class="buttons-set">
                <ul class="buttons-set__list">
                    <li class="buttons-set__item">
                        <a class="button button--empty button--white-outline" href="{{ route('logout') }}"
                            onclick="event.preventDefault();
                                    document.getElementById('logout-form').submit();">
                            <span class="button__text">Salir</span>
                        </a>
                        <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                            @csrf
                        </form>
                    </li>
                </ul>
            </div>

        </li>

    </ul>
</li>
<style>
    /* Estilo para el dropdown */
    .nav-02__item:hover .dropdown__list {
        display: block; 
    }

    .dropdown__list {
        display: none; 
        position: absolute;
        background-color: #2d2196; 
        box-shadow: 0 8px 16px rgba(0, 0, 0, 0.2); 
        z-index: 1;
        padding: 10px; 
        list-style: none; 
        margin: 0; 
    }

    .dropdown__list .nav-02__item {
        display: block; 
        margin-bottom: 5px; 
        text-align: center; 
    }

    .dropdown__list .buttons-set {
        margin: 0; 
    }

    .dropdown__list .buttons-set__list {
        padding: 0; 
        list-style: none; 
        margin: 0; 
    }

    .dropdown__list .buttons-set__item {
        display: block; 
        text-align: center; 
        margin-bottom: 5px; 
    }

    .dropdown__list .button {
        display: block; 
        margin-bottom: 5px; 
        text-align: center; 
        line-height: 1.5; 
    }

    .dropdown__list a {
        display: block; 
        margin-bottom: 5px; 
        color: white; 
        text-decoration: none; 
        text-align: center; 
        line-height: 1.5; 
    
    }
    .buttons-set__list{
        display: flex;
        justify-content: center;
    }
</style>







{{-- @foreach ($items as $item)

        <li class="nav-02__item">

            <a class="button   button--white-outline  button--empty " style="text-decoration:none" href="{{ url($item->link()) }}" target="{{ $item->target }}"><span class="button__text">{{ $item->title }}</span>
            </a>

        </li>
        </li>
    @endforeach --}}


</ul>
