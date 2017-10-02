@extends('layouts.admin')

@section('container')

    <section class="content-header">
        <h1>{{trans('feeds.create')}}</h1>

    </section>

    <br>

    {!! Form::model($results = new \App\Models\Feeds(),  ['route' => ['feeds.store'], 'method' => 'POST', 'novalidate', 'block', 'files' => true], $resulted) !!}
    @include('feeds.form', [$button = trans('feeds.create')])
    {!! Form::close() !!}

@stop



@section('footer')
    <script src="https://cdnjs.cloudflare.com/ajax/libs/summernote/0.8.7/summernote.min.js"></script>

    <script>
        $(document).ready(function() {
            $('.summernote').summernote({
                height: 400,
                fontSize: 18
            });
        });
    </script>
@stop
