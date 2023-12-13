{{--
<div class="side-menu sidebar-inverse">
    <nav class="navbar navbar-default" role="navigation">
        <div class="side-menu-container">
            <div class="navbar-header">
                <a class="navbar-brand" href="{{ route('voyager.dashboard') }}">
                    <div class="logo-icon-container">
                        <?php $admin_logo_img = Voyager::setting('admin.icon_image', ''); ?>
                        @if($admin_logo_img == '')
                            <img src="{{ voyager_asset('images/logo-icon-light.png') }}" alt="Logo Icon">
                        @else
                            <img src="{{ Voyager::image($admin_logo_img) }}" alt="Logo Icon">
                        @endif
                    </div>
                    <div class="title">{{Voyager::setting('admin.title', 'VOYAGER')}}</div>
                </a>
            </div><!-- .navbar-header -->

            <div class="panel widget center bgimage"
                 style="background-image:url({{ Voyager::image( Voyager::setting('admin.bg_image'), voyager_asset('images/bg.jpg') ) }}); background-size: cover; background-position: 0px;">
                <div class="dimmer"></div>
                <div class="panel-content">
                    <img src="{{ $user_avatar }}" class="avatar" alt="{{ Auth::user()->name }} avatar">
                    <h4>{{ ucwords(Auth::user()->name) }}</h4>
                    <p>{{ Auth::user()->email }}</p>

                    <a href="{{ route('voyager.profile') }}" class="btn btn-primary">{{ __('voyager::generic.profile') }}</a>
                    <div style="clear:both"></div>
                </div>
            </div>

        </div>
        <div id="adminmenu">
            <admin-menu :items="{{ menu('admin', '_json') }}"></admin-menu>
        </div>
    </nav>
</div>
--}}
<?php $admin_logo_img = Voyager::setting('admin.icon_image', ''); ?>
<div class="side-menu sidebar-inverse btn-link is-active no-animation " id="sidebar_menu" >

    <nav class="navbar navbar-default" role="navigation">
        <div class="side-menu-container">
            <div class="hidden-md hidden-lg col-xs-12" style="margin-top:15px ">

                @if($admin_logo_img == '')
                    <img class="img-responsive img-circle" style="width: 100px;height:100px;object-fit:cover;display:block; margin:auto;" src="{{ $user_avatar }}" alt="Logo Icon">
                @else
                    <img class="img-responsive img-circle"  style="width: 100px;height:100px;object-fit:cover;display:block; margin:auto;" src="{{ $user_avatar  }}" alt="Logo Icon">
                @endif
            </div>
            <div class="hidden-md hidden-lg title col-xs-12" style="text-align:center;">
                <div class="col-xs-10">
                    <span style="font-size:22px;color:white">{{ \Illuminate\Support\Str::limit(Auth::user()->name,30,'...')  }}  </span>
                </div>
                <div class="col-xs-2">
                    <form action="{{ route('voyager.logout') }}" method="POST">
                        {{ csrf_field() }}
                        <button type="submit" style="background: transparent;border: 0px;">
                            <i style="color:white;margin-top:9px !important " class="fa fa-2x fa-sign-out-alt"></i>
                        </button>
                    </form>
                </div>


            </div>
            <div class="hidden-lg hidden-md col-xs-10 pull-right" style="border:solid 1px white"></div>
            <div class="navbar-header hidden-xs">
                <a class="navbar-brand" href="{{ route('voyager.dashboard') }}">
                    <div class="logo-icon-container">

                        @if($admin_logo_img == '')
                            <img src="{{ voyager_asset('images/logo-icon-light.png') }}" alt="Logo Icon">
                        @else
                            <img src="{{ Voyager::image($admin_logo_img) }}" alt="Logo Icon">
                        @endif
                    </div>
                    <div class="title">{{Voyager::setting('admin.title', 'VOYAGER')}}</div>
                </a>
            </div>



            <div class="panel widget center bgimage hidden-xs"
                 style="background-image:url({{ Voyager::image( Voyager::setting('admin.bg_image'), voyager_asset('images/bg.jpg') ) }}); background-size: cover; background-position: 0px;">
                <div class="dimmer"></div>
                <div class="panel-content">
                    <img src="{{ $user_avatar }}" class="avatar" alt="{{ Auth::user()->name }} avatar">
                    <h4>{{ ucwords(Auth::user()->name) }}</h4>
                    <p>{{ Auth::user()->email }}</p>

                    <a href="{{ route('voyager.profile') }}"
                       class="btn btn-primary">{{ __('voyager::generic.profile') }}</a>
                    <div style="clear:both"></div>
                </div>
            </div>

        </div>

        <div id="adminmenu">
            <admin-menu :items="{{ menu('admin', '_json') }}"></admin-menu>
        </div>


    </nav>
</div>

{{--<script>
    $(function(){
        $("#item_sidebar").click(function(){
            $("#sidebar_menu").hide();
        });
    });

</script>--}}
