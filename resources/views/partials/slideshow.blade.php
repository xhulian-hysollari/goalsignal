<div class="container">
    <div class="newstricker_inner">
        <div class="trending">{{trans('feeds.recent')}}</div>
        <div id="NewsTicker" class="owl-carousel owl-theme">

            @if(isset($newstricker) && count($newstricker) > 0)
                @foreach($newstricker as $newstr)
                    <div class="item">
                        <a href="{{route('feeds.show', $newstr->id)}}">{{$newstr->title}}</a>
                    </div>
                @endforeach
            @endif
        </div>
    </div>
</div>

<style>

    .post-height-1 .news-image img {
        height: 230px;
    }

    @media (max-width: 991px) and (min-width: 768px) {
        .post-height-1 .news-image img {
            height: 320px;
        }
    }

</style>

<section class="slider-inner">
    <div class="container">
        <div class="row thm-margin">
            <div class="col-xs-12 col-sm-8 col-md-8 thm-padding">
                <div class="slider-wrapper">
                    <div id="owl-slider" class="owl-carousel owl-theme">
                        <!-- Slider item one -->
                    @if(isset($slideshows) && count($slideshows) > 0)
                        @foreach($slideshows as $slideshow)
                            <div class="item">
                                <div class="slider-post post-height-1">
                                    <a href="{{route('feeds.show', $slideshow->id)}}" class="news-image"><img
                                                src="{{asset('storage/'.$slideshow->images[0]->path)}}" alt=""
                                                class="img-responsive"></a>
                                    <div class="post-text">
                                        <span class="post-category">{{$slideshow->categories->name}}</span>
                                        <h2><a href="{{route('feeds.show', $slideshow->id)}}">{{$slideshow->title}} </a></h2>
                                        <ul class="authar-info">
                                            <li class="authar"><a href="#">by {{$slideshow->user->name}}</a></li>
                                            <li class="date">{{\Carbon\Carbon::parse($slideshow->created_at)->format('d M y')}}</li>
                                            <li class="view"><a href="#">{{$slideshow->view_count}} views</a></li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    @endif
                    </div>
                </div>
            </div>
            <div class="col-xs-12 col-sm-4 col-md-4 thm-padding">
                <div class="row slider-right-post thm-margin">
                    <div class="col-xs-6 col-sm-12 col-md-12 thm-padding">

                        <div class="slider-post post-height-2">
                            @if(isset($topNews) && count($topNews) > 0)
                                <a href="{{route('feeds.show', $topNews->id)}}" class="news-image"><img src="{{asset('storage/'.$topNews->images[0]->path)}}" alt="" class="img-responsive"></a>
                                <div class="post-text">
                                    <span class="post-category">{{$topNews->categories->name}}</span>
                                    <h2><a href="{{route('feeds.show', $topNews->id)}}">{{str_limit(strip_tags($topNews->title), '20', '...')}} </a></h2>
                                    <ul class="authar-info">
                                        <li class="authar"><a href="#">by {{$topNews->user->name}}</a></li>
                                        <li class="date">{{\Carbon\Carbon::parse($topNews->created_at)->format('d M y')}}</li>
                                        <li class="view"><a href="#">{{$topNews->view_count}} views</a></li>
                                    </ul>
                                </div>
                            @endif
                        </div>
                    </div>
                    <div class="col-xs-6 col-sm-12 col-md-12 thm-padding">
                        <div class="slider-post post-height-2">
                            @if(isset($latest) && count($latest) > 0)
                                <a href="{{route('feeds.show', $latest->id)}}" class="news-image"><img src="{{asset('storage/'.$latest->images[0]->path)}}" alt="" class="img-responsive"></a>
                                <div class="post-text">
                                    <span class="post-category">{{$latest->categories->name}}</span>
                                    <h2><a href="{{route('feeds.show', $latest->id)}}">{{str_limit(strip_tags($latest->title), '20', '...')}} </a></h2>
                                    <ul class="authar-info">
                                        <li class="authar"><a href="#">by {{$latest->user->name}}</a></li>
                                        <li class="date">{{\Carbon\Carbon::parse($latest->created_at)->format('d M y')}}</li>
                                        <li class="view"><a href="#">{{$latest->view_count}} views</a></li>
                                    </ul>
                                </div>
                            @endif
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

