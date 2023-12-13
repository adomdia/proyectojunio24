<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
   @include('layouts.head')

   <body class="custom-google-fonts-enabled comps" id="85500-178535">
    @include('layouts.navbar')



            {{-- Mensajes flash --}}
            @include('flash.todos')

            {{-- Contenido de la página --}}
            @yield('content')

    {{-- Footer --}}
    @include('layouts.footer')

    {{-- Assets después del footer --}}

    @yield('late_footer')
    @yield('style')
    {{-- Secciones para añadir assets al final desde una página que extienda --}}


    @include('layouts.scripts')
    @yield('javascript')
    @yield('js')
    </body>
</html>
