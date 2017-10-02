@extends('layouts.app')

@section('slider')
    @include('partials.slideshow')
@stop

@section('container')
    {{--@if(isset($topCategory) && count($topCategory) > 0)--}}
        @foreach($topCategory as $result)
            @if(count($result->news) > 0 && isset($result->news))
                @include('partials.categorySection')
            @endif
        @endforeach
    {{--@endif--}}

    @include('partials.latestArticles')

@stop
