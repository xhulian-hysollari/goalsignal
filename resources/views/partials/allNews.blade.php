@extends('layouts.app')
@section('container')

    <style>
        .row-m {
            margin-left: -20px
        }
    </style>

    <section class="articles-wrapper">
        <div class="container">
            <div class="row row-m">
                <div class="col-sm-8 main-content col-p">
                    <div class="theiaStickySidebar">
                        <!-- START POST CATEGORY STYLE FOUR (Latest articles ) -->
                        <div class="post-inner">

                            <!-- post body -->

                            <div class="post-body">

                                @if(isset($allNews) && count($allNews) > 0)
                                    @foreach($allNews as $news)
                                        <div class="news-list-item articles-list">
                                            <div class="img-wrapper">
                                                <a href="{{route('feeds.show', $news->id)}}" class="thumb"><img src="{{asset('storage/'.$news->images[0]->path)}}" alt="" class="img-responsive"></a>
                                            </div>
                                            <div class="post-info-2">
                                                <h4 ><a href="{{route('feeds.show', $news->id)}}" class="title"  style="color: {{$news->categories->optional}}">{{ucwords($news->title)}}</a></h4>
                                                <ul class="authar-info">
                                                    <li><i class="ti-timer"></i> {{\Carbon\Carbon::parse($news->created_at)->format('d M y')}}</li>
                                                    <li class="like"><i class="ti-eye"></i> {{$news->view_count}} views</li>
                                                </ul>
                                                <p class="hidden-sm">{!! str_limit(strip_tags($news->body), '250', '...') !!}</p>
                                            </div>
                                        </div>
                                    @endforeach
                                @endif

                            </div> <!-- /. post body -->

                            {{$allNews -> links()}}

                        </div>
                        <!-- END OF /. POST CATEGORY STYLE FOUR (Latest articles ) -->
                    </div>
                </div>
            </div>
        </div>
    </section>


@stop