@extends('layouts.app')

@section('meta')
    <meta property="og:url"           content="{{url('feeds/show', $results->id)}}" />
    <meta property="og:type"          content="website" />
    <meta property="og:title"         content="Article" />
    <meta property="og:description"   content="{{ $results->title }}" />
    <meta property="og:image"         content="{{asset('storage/'.$results->images[0]->path)}}" />
@stop

@section('css')
    <style>
        img.note-float-left {
            margin-right: 20px;
        }
        a.post-category:hover {
            color: #333;
            text-decoration: none;
        }
        .post_details_block p {
            font-size: 18px !important;
        }
        section.social-icon > div a i {
            display: inline-block;
            font-size: 15px;
            color: #ffffff;
            width: 40px;
            /* padding: 11px 8px; */
            position: relative;
            -webkit-transition: 0.3s ease-in-out;
            transition: 0.3s ease-in-out;
            background-color: #000;
            height: 40px;
            line-height: 43px;
            text-align: center;
            margin: 5px;
        }
        section.social-icon > div a i.fa-facebook {
            background-color: #4c66a3;
        }

        .item img {
            height: 200px;
            width: 300px;

        }
    </style>

@stop

@section('container')

        <div class="post_details_inner">

            <div class="post_details_block details_block3" id="fb-root">
                <div class="post-header">
                    <ul class="td-category">
                        <li><a class="post-category" href="{{route('feeds.categories',$results->categories->url)}}">{{$results->categories->name}}</a></li>
                    </ul>
                    <h2>{{$results->title}}</h2>
                    <ul class="authar-info">
                        <li class="author"><a href="#">by {{$results->user->name}}</a></li>
                        <li class="date">{{\Carbon\Carbon::parse($results->created_at)->diffForHumans()}}</li>
                        <li class="view"><a href="#">{{$results->view_count}} views</a></li>
                    </ul>
                </div>
                <figure class="social-icon">
                    <img src="{{asset('storage/'.$results->images[0]->path)}}" class="img-responsive" alt=""/>
                    <div>
                        <a href="#" onclick="window.open('https://www.facebook.com/sharer/sharer.php?u={{url('feeds/show', $results->id)}}','facebook-share-dialog','width=626,height=436');return false;">
                            <i class="fa fa-facebook"></i></a>
                        {{--<a href="#"><i class="fa fa-facebook"></i></a>--}}
                        {{--<a href="#"><i class="fa fa-twitter"></i></a>--}}
                        {{--<a href="#"><i class="fa fa-google-plus"></i></a>--}}
                        {{--<a href="#" class="hidden-xs"><i class="fa fa-linkedin"></i></a>--}}
                        {{--<a href="#" class="hidden-xs"><i class="fa fa-pinterest-p"></i></a>--}}
                    </div>
                </figure>

                <div class="clearfix">
                    {!! $results->body !!}

                    <div class="row">
                        <div class="col-sm-12 col-xs-12 col-md-12 col-lg-12">
                            <div class="featured-inner">
                                <div id="featured-owl" class="owl-carousel">
                                    @foreach($results->images as $image)
                                        <div class="item">
                                            <img src="{{asset('storage/'.$image->path)}}" class="img-responsive" alt=""/>
                                        </div>
                                    @endforeach
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-sm-12 col-xs-12 col-md-12 col-lg-12">
                            <div class="featured-inner">
                                <div id="featured-owl" class="owl-carousel">

                                    @foreach($results->images as $image)
                                        <div class="item">
                                            <img src="{{asset('storage/'.$image->path)}}" class="img-responsive" alt=""/>
                                        </div>
                                    @endforeach

                                </div>
                            </div>
                        </div>
                    </div>

                </div>

            </div>
        <!-- Post footer -->
            <div class="post-footer">
                <div class="row thm-margin">
                    <div class="col-xs-12 col-sm-12 col-md-12 thm-padding">
                        <section class="social-icon">
                            <div class="col-xs-6 col-sm-6 col-md-6 thm-padding">
                            <a href="#" onclick="window.open('https://www.facebook.com/sharer/sharer.php?u={{url('feeds/show', $results->id)}}','facebook-share-dialog','width=626,height=436');return false;">
                                <i class="fa fa-facebook"></i><span style="padding-left: 10px;">{{trans('feeds.shareOnFB')}}</span></a>
                            {{--<a href="#"><i class="fa fa-twitter"></i></a>--}}
                            {{--<a href="#"><i class="fa fa-google-plus"></i></a>--}}
                            {{--<a href="#" class="hidden-xs"><i class="fa fa-linkedin"></i></a>--}}
                            {{--<a href="#" class="hidden-xs"><i class="fa fa-pinterest-p"></i></a>--}}
                            </div>

                            <div class="col-xs-6 col-sm-6 col-md-6" style="padding-top: 9px">

                            @if(Auth::user())
                                    <a class="btn btn-primary" href="{{url('feeds/edit', $results->id)}}">{{trans('feeds.edit')}}</a>
                                    <a class="de btn btn-danger">{{trans('feeds.delete')}}</a>
                                @endif

                            </div>
                        </section>

                    </div>
                </div>
            </div>
        </div>

@stop

@section('js')
    <script>
        $('a.de').on('click', function(){

            $.confirm({
                useBootstrap: false,
                title: "{{trans('feeds.deleteScript')}}",
                content: "{{trans('feeds.contentScript')}}",
                animationSpeed: 750,
                buttons: {

                    "{{trans('feeds.confirmButton')}}": function () {

                        $.alert('{{trans("feeds.deleteSuccess")}}');

                        setTimeout(function(){ document.location.href = "{{url('feeds/destroy', $results->id)}}"; }, 3000);
                    },

                    "{{trans('feeds.cancelButton')}}": function () {
                    },
                }
            });
        });
    </script>

@stop




