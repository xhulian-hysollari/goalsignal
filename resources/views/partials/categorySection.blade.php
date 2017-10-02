<!-- START POST CATEGORY STYLE ONE (Popular news) -->
<div class="post-inner">
    <!--post header-->
    <div class="post-head">
        <h2 class="title"><strong>{{$result->name}}</strong></h2>
    </div>
    <!-- post body -->
    <div class="post-body">
        <div class="row">
            <div class="col-sm-6 main-post-inner bord-right">
                <article>
                    <figure>
                        <a href="{{route('feeds.show', $result->latest_news->id)}}"><img
                                    src="{{asset('storage/'.$result->latest_news->images[0]->path)}}"
                                    height="242" width="345" alt="" class="img-responsive"></a>
                        <span class="post-category">{{$result->latest_news->categories->name}}</span>
                    </figure>
                    <div class="post-info">
                        <h3>
                            <a href="{{route('feeds.show', $result->latest_news->id)}}">{{ucwords($result->latest_news->title)}}</a>
                        </h3>
                        <ul class="authar-info">
                            <li>
                                <i class="ti-timer"></i> {{\Carbon\Carbon::parse($result->latest_news->created_at)->format('d M y')}}
                            </li>
                            <li><i class="ti-eye"></i>{{$result->latest_news->view_count}}</li>
                        </ul>
                        <p>{{str_limit(strip_tags($result->latest_news->body), '100', '...')}}</p>
                    </div>
                </article>
            </div>
            <div class="col-sm-6">
                <div class="news-list">
                    @foreach($result->news as $news)
                        <div class="news-list-item">
                            <div class="img-wrapper">
                                <a href="{{route('feeds.show', $news->id)}}" class="thumb">
                                    <img src="{{asset('storage/'.$news->images[0]->path)}}" alt=""
                                         class="img-responsive">
                                    <div class="link-icon">
                                        <i class="fa fa-camera"></i>
                                    </div>
                                </a>
                            </div>
                            <div class="post-info-2">
                                <h5><a href="{{route('feeds.show', $news->id)}}" class="title">{{ucwords($news->title)}}</a></h5>
                                <ul class="authar-info">
                                    <li>
                                        <i class="ti-timer"></i> {{\Carbon\Carbon::parse($news->created_at)->format('d M y')}}
                                    </li>
                                    <li class="hidden-xs hidden-sm"><a href="#"><i
                                                    class="ti-eye"></i>{{$news->view_count}}</a></li>
                                </ul>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
    <!-- Post footer -->
    <div class="post-footer">
        <div class="row thm-margin">
            <div class="col-xs-12 thm-padding">
                <a href="{{route('feeds.categories', $result->url)}}" class="more-btn">{{trans('feeds.more_from')}} {{$result->name}} </a>
            </div>
        </div>
    </div>
</div>
<!-- END OF /. POST CATEGORY STYLE ONE (Popular news) -->
<!-- START ADVERTISEMENT
<div class="add-inner">
    <img src="assets/images/add728x90-1.jpg" class="img-responsive" alt="">
</div>
<!-- END OF /. ADVERTISEMENT -->
