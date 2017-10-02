<?php

use Illuminate\Support\Facades\Auth;

$user = Auth::user();
?>

@if(count($user) != 0)

    <aside class="main-sidebar" style="height: 100%">
        <section class="sidebar">

            <!-- Sidebar Menu -->
            <ul class="sidebar-menu" data-widget="tree">

                {{--Paneli I Administratorit--}}

                <li class="header">{{trans('admin.dash')}}</li>

                <!-- Optionally, you can add icons to the links -->

                {{--feeds--}}

                <li><a href="{{url('/')}}"><i class="fa fa-rss"></i> <span>{{trans('admin.feeds')}}</span></a></li>

                {{--create new feed--}}

                <li><a href="{{url('feeds/create')}}"><i class="fa fa-pencil-square-o"></i> <span>{{trans('feeds.create')}}</span></a></li>

                {{--categories--}}

                <li><a href="{{url('dashboard/categories')}}"><i class="fa fa-folder-open"></i> <span>{{trans('admin.categories')}}</span></a></li>
                @if($user->role == 'Admin')

                    {{--users--}}

                <li><a href="{{url('dashboard/users')}}"><i class="fa fa-users"></i> <span>{{trans('admin.users')}}</span></a></li>

                @endif

                {{--personal profile--}}

                <li><a href="{{url('dashboard/users/profile')}}"><i class="fa fa-user"></i> <span>{{trans('admin.profile')}}</span></a></li>


                {{--pages--}}

                <li><a href="{{url('dashboard/pages')}}"><i class="fa fa-sticky-note-o"></i> <span>{{trans('admin.pages')}}</span></a></li>


                {{--Change language--}}

                @foreach(LaravelLocalization::getSupportedLocales() as $localeCode => $properties)
                    <li>
                        <a rel="alternate" hreflang="{{ $localeCode }}" href="{{ LaravelLocalization::getLocalizedURL($localeCode, null, [], true) }}">
                            {{ $properties['native'] }}
                        </a>
                    </li>
                @endforeach



                <li>

                    {{--logout--}}


                    <a href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                        <i class="fa fa-sign-out" aria-hidden="true"></i><span>{{trans('admin.logout')}}</span>
                    </a>

                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                        {{ csrf_field() }}
                    </form>
                </li>
            </ul>
            <!-- /.sidebar-menu -->
        </section>
        <!-- /.sidebar -->
    </aside>
@endif