<!DOCTYPE html>
<html>
<head>

    <meta charset="utf-8">
    <meta name="author" content="Marin Hysollari">
    <!-- Meta tags to share on facebook    -->
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    @section('meta') @show
    @section('title') @show
    <link rel="shortcut icon" href="{{asset('assets/images/ico/favicon.png')}}" type="image/x-icon">
    <link rel="apple-touch-icon" type="image/x-icon"
          href="{{asset('assets/images/ico/apple-touch-icon-57-precomposed.png')}}">
    <link rel="apple-touch-icon" type="image/x-icon" sizes="72x72"
          href="{{asset('assets/images/ico/apple-touch-icon-72-precomposed.png')}}">
    <link rel="apple-touch-icon" type="image/x-icon" sizes="114x114"
          href="{{asset('assets/images/ico/apple-touch-icon-114-precomposed.png')}}">
    <link rel="apple-touch-icon" type="image/x-icon" sizes="144x144"
          href="{{asset('assets/images/ico/apple-touch-icon-144-precomposed.png')}}">
    <link href="{{asset('assets/css/jquery-ui.min.css')}}" rel="stylesheet" type="text/css"/>
    <link href="{{asset('assets/css/bootstrap.min.css')}}" rel="stylesheet" type="text/css"/>
    <link href="{{asset('assets/css/animate.min.css')}}" rel="stylesheet" type="text/css"/>
    <link href="{{asset('assets/bootsnav/css/bootsnav.css')}}" rel="stylesheet" type="text/css"/>
    <link href="{{asset('assets/css/RYPP.css')}}" rel="stylesheet" type="text/css"/>
    <link href="{{asset('assets/font-awesome/css/font-awesome.min.css')}}" rel="stylesheet" type="text/css"/>
    <link href="{{asset('assets/themify-icons/themify-icons.css')}}" rel="stylesheet" type="text/css"/>
    <link href="{{asset('assets/weather-icons/css/weather-icons.min.css')}}" rel="stylesheet" type="text/css"/>
    <link href="{{asset('assets/css/flaticon.css')}}" rel="stylesheet" type="text/css"/>
    <link href="{{asset('assets/owl-carousel/owl.carousel.css')}}" rel="stylesheet" type="text/css"/>
    <link href="{{asset('assets/owl-carousel/owl.theme.css')}}" rel="stylesheet" type="text/css"/>
    <link href="{{asset('assets/owl-carousel/owl.transitions.css')}}" rel="stylesheet" type="text/css"/>
    <link href="{{asset('assets/css/style.css')}}" rel="stylesheet" type="text/css"/>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/jquery-confirm/3.3.0/jquery-confirm.min.css">
    @section('css') @show
    <style>
        .page_main_wrapper {
            margin-top: 20px;
        }

        img {
            width: 100% !important;
        }

        iframe {
            width: 100% !important;
        }

    </style>

    <title>GOALSignal</title>

    <script async src="//pagead2.googlesyndication.com/pagead/js/adsbygoogle.js"></script>


    <script>
        (adsbygoogle = window.adsbygoogle || []).push({
            google_ad_client: "ca-pub-6040717899325039",
            enable_page_level_ads: true
        });
    </script>

</head>
<body>
<header>
    @include('partials.navbar')
</header>
<script async src="//pagead2.googlesyndication.com/pagead/js/adsbygoogle.js"></script>
<!-- ADD2 -->
<ins class="adsbygoogle"
     style="display:inline-block;width:300px;height:600px"
     data-ad-client="ca-pub-6040717899325039"
     data-ad-slot="5466747669"></ins>
<script>
    (adsbygoogle = window.adsbygoogle || []).push({});
</script>
<main class="page_main_wrapper">



    @include('partials.alerts')
    @section('slider') @show
    <div class="container">
        <div class="row row-m">
            <!-- START MAIN CONTENT -->
            <div class="col-sm-8 col-p main-content">
                <div class="theiaStickySidebar">
                    @section('container') @show
                </div>
            </div>
            <!-- END OF /. MAIN CONTENT -->
            @include('partials.sideContent')
        </div>

        <script async src="//pagead2.googlesyndication.com/pagead/js/adsbygoogle.js"></script>
        <ins class="adsbygoogle"
             style="display:block"
             data-ad-format="fluid"
             data-ad-layout-key="-fe+6b+2x-jx+pw"
             data-ad-client="ca-pub-6040717899325039"
             data-ad-slot="2289866083"></ins>
        <script>
            (adsbygoogle = window.adsbygoogle || []).push({});
        </script>

    </div>

</main>

<footer>
    @include('partials.footer')
</footer>
<script src="{{asset('assets/js/jquery.min.js')}}" type="text/javascript"></script>
<script src="{{asset('assets/js/jquery-ui.min.js')}}" type="text/javascript"></script>
<script src="{{asset('assets/js/bootstrap.min.js')}}" type="text/javascript"></script>
<script src="{{asset('assets/bootsnav/js/bootsnav.js')}}" type="text/javascript"></script>
<script src="{{asset('assets/js/theia-sticky-sidebar.js')}}" type="text/javascript"></script>
<script src="{{asset('assets/js/RYPP.js')}}" type="text/javascript"></script>
<script src="{{asset('assets/owl-carousel/owl.carousel.min.js')}}" type="text/javascript"></script>
<script src="{{asset('assets/js/custom.js')}}" type="text/javascript"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-confirm/3.3.0/jquery-confirm.min.js"></script>
@section('js') @show

</body>
</html>