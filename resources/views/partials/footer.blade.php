<footer style="padding: 0">
    <div class="container">
        <div class="row">

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
</footer>
