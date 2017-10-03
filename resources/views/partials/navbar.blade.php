<?php

use App\User;

$user = Auth::user();

?>

<style>
    @media (max-width: 1147px) and (min-width: 992px) {

        #logo {
            display: none;
        }
    }
    /*@media (max-width: 992px) and (min-width: 992px) {*/
    /*#smlogo {*/
    /*display: inline;*/
    /*}*/
    /*}*/
</style>

<nav class="navbar navbar-default navbar-sticky navbar-mobile bootsnav">

    <a class="navbar-brand hidden-xs hidden-sm" href="{{url('/')}}" id="logo" style="margin-top: -5px;">
        <img src="https://dewey.tailorbrands.com/production/brand_version_mockup_image/137/316242137_695ddda0-ff3d-4e78-9899-3d65487ae80f.png?cb=1507023955" alt=""></a>

    <div class="container">
        <div class="navbar-header">
            <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#navbar-menu">
                <i class="fa fa-bars"></i>
            </button>
            <a class="navbar-brand hidden-md hidden-lg" id="smlogo" href="{{url('/')}}" >
                <img style="margin-top: 15px;"
                     src="https://dewey.tailorbrands.com/production/brand_version_mockup_image/137/316242137_695ddda0-ff3d-4e78-9899-3d65487ae80f.png?cb=1507023955"
                     class="logo" alt="">
            </a>
        </div>
        <div class="collapse navbar-collapse" id="navbar-menu">
            <ul class="nav navbar-nav navbar-left" data-in="" data-out="">
                <li><a href="{{route('feeds.index')}}">{{trans('feeds.home')}}</a></li>

                @if(isset($resulted) && count($resulted)>0)
                    @foreach($resulted as $result)
                        <li>
                            <a href="{{url('feeds/showCategory', $result->url)}}" style="color:{{$result->optional}}">{{ucwords($result->name)}}</a>
                        </li>
                    @endforeach
                @endif

                <li class="dropdown">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown">{{trans('feeds.about_us')}}</a>
                    <ul class="dropdown-menu animated">
                        @if(isset($pages) && count($pages) > 0)
                            @foreach($pages as $page)
                                <li><a href="{{url('dashboard/pages/show', $page->slug)}}">{{ucwords($page->title)}}</a></li>
                            @endforeach
                        @endif
                    </ul>
                </li>


                @if(Auth::check())

                    <li><a href="{{url('dashboard/users/profile')}}">{{trans('admin.dash')}}</a></li>

                @endif


                @if(count(User::get()) == 0)
                    <li><a class="non" href="{{url('register')}}">{{trans('users.register')}}</a></li>


                @elseif(!Auth::user() && count(User::get()) > 0)

                        <li><a class="non" href="{{url('login')}}">{{trans('admin.login')}}</a></li>

                @else

                    <li>
                        <a href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                            <i class="fa fa-sign-out" aria-hidden="true"></i>{{trans('admin.logout')}}
                        </a>
                    </li>
                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                        {{ csrf_field() }}
                    </form>

                @endif

                <li class="dropdown">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown">{{trans('feeds.lang')}}</a>
                    <ul class="dropdown-menu animated">
                        @foreach(LaravelLocalization::getSupportedLocales() as $localeCode => $properties)
                            <li>
                                <a rel="alternate" hreflang="{{ $localeCode }}" href="{{ LaravelLocalization::getLocalizedURL($localeCode, null, [], true) }}">
                                    {{ $properties['native'] }}
                                </a>
                            </li>
                        @endforeach
                    </ul>
                </li>

            </ul>
        </div><!-- /.navbar-collapse -->
    </div>
</nav>