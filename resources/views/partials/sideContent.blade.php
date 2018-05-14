<div class="col-sm-4 col-p rightSidebar">

    <div class="theiaStickySidebar">
        <!-- START NAV TABS -->
        <div class="tabs-wrapper">
            <ul class="nav nav-tabs" role="tablist">
                <li role="presentation" class="active"><a href="#home" aria-controls="home" role="tab"
                                                          data-toggle="tab">{{trans('feeds.mostViewed')}}</a></li>
            </ul>
            <!-- Tab panels one -->
            <div class="tab-content">
                <div role="tabpanel" class="tab-pane fade in active" id="home">

                    <div class="most-viewed">
                        <ins class="adsbygoogle"
                             style="display:inline-block;width:100%;height:300px"
                             data-ad-client="ca-pub-6040717899325039"
                             data-ad-slot="5466747669"></ins>
                        <script>
                            (adsbygoogle = window.adsbygoogle || []).push({});
                        </script>
                        @if(isset($mostViewed) && count($mostViewed)>0)
                            @foreach($mostViewed as $most)
                                <div class="p-post">
                                    <h4><a href="{{route('feeds.show', $most->id)}}">{{ucwords($most->title)}}</a></h4>
                                    <ul class="authar-info">
                                        <li class="date"><a href="#"><i
                                                        class="ti-timer"></i> {{\Carbon\Carbon::parse($most->created_at)->format('d M y')}}
                                            </a></li>
                                        <li class="like"><a href="#"><i class="ti-eye"></i> {{$most->view_count}} views</a>
                                        </li>
                                    </ul>
                                </div>
                            @endforeach
                        @endif
                    </div>
                </div>
            </div>
        </div>
        <!-- END OF /. NAV TABS -->
        <div class="tabs-wrapper">
            <ul class="nav nav-tabs" role="tablist">
                <li role="presentation" class="active"><a href="#profile" aria-controls="profile" role="tab"
                                                          data-toggle="tab">{{trans('feeds.is_featured')}}</a></li>
            </ul>
            <!-- Tab panels one -->
            <div class="tab-content">
                <div role="tabpanel" class="tab-pane fade in active" id="profile">
                    <div class="popular-news">
                        <ins class="adsbygoogle"
                             style="display:inline-block;width:100%;height:300px"
                             data-ad-client="ca-pub-6040717899325039"
                             data-ad-slot="5466747669"></ins>
                        <script>
                            (adsbygoogle = window.adsbygoogle || []).push({});
                        </script>
                        @if(isset($featured) && count($featured)>0)
                            @foreach($featured as $feat)
                                <div class="p-post">
                                    <h4><a href="{{route('feeds.show', $feat->id)}}">{{ucwords($feat->title)}}</a></h4>
                                    <ul class="authar-info">
                                        <li class="date"><a href="#"><i
                                                        class="ti-timer"></i> {{\Carbon\Carbon::parse($feat->created_at)->format('d M y')}}
                                            </a></li>
                                        <li class="like"><a href="#"><i class="ti-eye"></i>{{$feat->view_count}}
                                                views</a></li>
                                    </ul>
                                </div>
                            @endforeach
                        @endif
                    </div>
                </div>
            </div>
        </div>
        <div class="panel_inner categories-widget">
            <div class="panel_header">
                <h4>{{trans('admin.categories')}}</h4>
            </div>
            <div class="panel_body">
                <ul style="list-style: none">
                    <ins class="adsbygoogle"
                         style="display:inline-block;width:100%;height:300px"
                         data-ad-client="ca-pub-6040717899325039"
                         data-ad-slot="5466747669"></ins>
                    <script>
                        (adsbygoogle = window.adsbygoogle || []).push({});
                    </script>
                    @if(isset($categories) && count($categories)>0)
                        @foreach($categories as $category)
                            <li><a href="{{url('feeds/showCategory', $category->url)}}">
                                    <h5>{{ucwords($category->name)}}</h5></a></li>
                        @endforeach
                    @endif
                </ul>
            </div>
        </div>
    </div>
</div>