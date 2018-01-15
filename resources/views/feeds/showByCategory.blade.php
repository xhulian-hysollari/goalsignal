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
                           <!--post header-->
                           <div class="post-head">
                               <h2 class="title">{{trans('feeds.latestFrom')}} {!! $categ->name !!}</h2>
                           </div>
                           <!-- post body -->


                           <div class="post-body">
                               <ins class="adsbygoogle"
                                    style="display:block"
                                    data-ad-format="fluid"
                                    data-ad-layout-key="-d0+5d+77-e2+1d"
                                    data-ad-client="ca-pub-6040717899325039"
                                    data-ad-slot="2289866083"></ins>
                               <script>
                                   (adsbygoogle = window.adsbygoogle || []).push({});
                               </script>
                               @if(isset($categorized) && count($categorized) > 0)
                                   @foreach($categorized as $categories)
                                       <div class="news-list-item articles-list">
                                           <div class="img-wrapper">
                                               <a href="{{route('feeds.show', $categories->id)}}" class="thumb"><img src="{{asset('storage/'.$categories->images[0]->path)}}" alt="" class="img-responsive"></a>
                                           </div>
                                           <div class="post-info-2">
                                               <h4 ><a href="{{route('feeds.show', $categories->id)}}" class="title"  style="color: {{$categories->categories->optional}}">{{ucwords($categories->title)}}</a></h4>
                                               <ul class="authar-info">
                                                   <li><i class="ti-timer"></i> {{\Carbon\Carbon::parse($categories->created_at)->format('d M y')}}</li>
                                                   <li class="like"><i class="ti-eye"></i> {{$categories->view_count}} views</li>
                                               </ul>
                                               <p class="hidden-sm">{!! str_limit(strip_tags($categories->body), '200', '...') !!}</p>
                                           </div>
                                       </div>
                                   @endforeach
                               @endif

                           </div> <!-- /. post body -->

                       </div>
                       <!-- END OF /. POST CATEGORY STYLE FOUR (Latest articles ) -->
                   </div>
               </div>
           </div>
       </div>
   </section>


@stop