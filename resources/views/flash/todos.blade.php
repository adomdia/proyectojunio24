@if ($errors->any() || session()->has('flash_notification'))
    <div style="margin-top:135px;text-align: center ">
        @include('flash.errors')
        @include('flash.normal')
    </div>
@endif
