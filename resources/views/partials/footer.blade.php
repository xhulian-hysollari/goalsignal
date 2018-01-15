
    <div class="container">
        <div class="row">

            @if(isset($categories) && count($categories)>0)
                <div class="col-sm-2 footer-box">
                    <h3 class="wiget-title">{{trans('admin.categories')}}</h3>
                    <ul class="menu-services">
                            @foreach($categories as $category)
                                <li><a href="{{url('feeds/showCategory', $category->url)}}">{{ucwords($category->name)}}</a></li>
                            @endforeach
                    </ul>
                </div>
            @endif

            @if(isset($pages) && count($pages)>0)
                <div class="col-sm-2 footer-box">
                    <h3 class="wiget-title">{{trans('admin.pages')}}</h3>
                    <ul class="menu-services">
                        @foreach($pages as $page)
                            <li><a href="{{url('dashboard/pages/show', $page->slug)}}">{{ucwords($page->title)}}</a></li>
                        @endforeach
                    </ul>
                </div>
            @endif
        </div>
    </div>