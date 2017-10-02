<footer style="padding: 0">
    <div class="container">
        <div class="row">


            <div class="col-sm-2 footer-box">
                <h3 class="wiget-title">{{trans('admin.categories')}}</h3>
                <ul class="menu-services">
                    @if(isset($categories) && count($categories)>0)
                        @foreach($categories as $category)
                            <li><a href="{{url('feeds/showCategory', $category->url)}}">{{ucwords($category->name)}}</a></li>
                        @endforeach
                    @endif
                </ul>
            </div>

            <div class="col-sm-2 footer-box">
                <h3 class="wiget-title">{{trans('admin.pages')}}</h3>
                <ul class="menu-services">
                    @if(isset($pages) && count($pages)>0)
                        @foreach($pages as $page)
                            <li><a href="{{url('dashboard/pages/show', $page->slug)}}">{{ucwords($page->title)}}</a></li>
                        @endforeach
                    @endif
                </ul>
            </div>

        </div>
    </div>
</footer>
