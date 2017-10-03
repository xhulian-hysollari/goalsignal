<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bulma/0.5.1/css/bulma.css">
    <link rel="stylesheet" href="{{asset('bower_components/bootstrap/dist/css/bootstrap.min.css')}}">
    <link rel="stylesheet" href="{{asset('bower_components/font-awesome/css/font-awesome.min.css')}}">
   <link rel="stylesheet" href="{{asset('bower_components/Ionicons/css/ionicons.min.css')}}">
    <link rel="stylesheet" href="{{asset('dist/css/AdminLTE.min.css')}}">
   <link rel="stylesheet" href="{{asset('dist/css/skins/skin-blue.min.css')}}">
    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
    <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic">
    <link href="{{asset('dist/summernote.css')}}" rel="stylesheet">


    <title>GOALSignal</title>

    <style>
        *{
            font-size: 18px;
        }

        body {
            background-color: #222d32;
        }
    </style>
</head>
<body class="hold-transition skin-blue sidebar-mini">


<header class="main-header">
    @include('admin.adminNav')
</header>
@include('admin.adminSideBar')
<div class="content-wrapper">

@include('partials.alerts')

    <!-- Main content -->
    <section class="content container-fluid">

            @yield('container')

    </section>

</div>

<footer>

    <script src="{{asset('bower_components/jquery/dist/jquery.min.js')}}"></script>
    <script src="{{asset('bower_components/bootstrap/dist/js/bootstrap.min.js')}}"></script>
    <script src="{{asset('dist/js/adminlte.min.js')}}"></script>

    @section('footer') @show



</footer>


</body>
</html>