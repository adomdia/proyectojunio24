
@php

        if (Voyager::translatable($items)) {
            $items = $items->load('translations');
        }

    @endphp

    {{-- Este es el bucle más importante--}}
    @foreach ($items as $item)

        @php

            $originalItem = $item;
            if (Voyager::translatable($item)) {
                $item = $item->translate($options->locale);
            }

            $listItemClass = 'nav-item';
            $linkAttributes =  'class="nav-link link text-black text-primary display-4"';
            $styles = null;
            $icon = null;
            $caret = null;

            // With Children Attributes
            if(!$originalItem->children->isEmpty()) {
                $linkAttributes =  'class="nav-link link text-white dropdown-toggle display-4" data-toggle="dropdown-submenu" aria-expanded="false"';
                $caret = '<span class="caret"></span>';

                if(url($item->link()) == url()->current()){
                    $listItemClass = 'nav-item dropdown active';
                }else{
                    $listItemClass = 'nav-item dropdown';
                }
            }

            // Set Icon
            if(isset($options->icon) && $options->icon == true){
                $icon = '<i class="' . $item->icon_class . '"></i>';
            }

        @endphp
        <li class="nav-02__item" style="color:white">

            <a class="button   button--black-outline  button--empty " href="{{ url($item->link()) }}" target="{{ $item->target }}"><span class="button__text" style="color:white">{{ $item->title }}</span>
            </a>
        </li>
    @endforeach

    {{-- @foreach($items as $item)

        <li class="nav-02__item">

            <a class="button   button--black-outline  button--empty " href="{{ url($item->link()) }}" target="{{ $item->target }}"><span class="button__text">{{ $item->title }}</span>
            </a>

        </li>
        </li>
    @endforeach --}}



</ul>
