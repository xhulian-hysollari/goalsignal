<a href="{{route('feeds.index')}}" class="logo" style="padding-top: 10px;">

    <!-- logo for regular state and mobile devices -->

    <span class="logo-lg"><img src="https://dewey.tailorbrands.com/production/brand_version_mockup_image/137/316242137_695ddda0-ff3d-4e78-9899-3d65487ae80f.png?cb=1507023955" class="img-responsive"></span>


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