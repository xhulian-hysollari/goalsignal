<a href="{{route('feeds.index')}}" class="logo" style="padding-top: 10px;">

    <!-- logo for regular state and mobile devices -->

    <span class="logo-lg"><img src="{{asset('images/logo.jpg')}}" class="img-responsive"></span>


</a>
@if(count(\App\User::all()) != 0)
<!-- Header Navbar -->
<nav class="navbar navbar-static-top" role="navigation">
    <!-- Sidebar toggle button-->
    <a href="#" class="sidebar-toggle" data-toggle="push-menu" role="button">
        <span class="sr-only">Toggle navigation</span>
    </a>

</nav>
@endif