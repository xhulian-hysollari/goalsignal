@extends('layouts.admin')

@section('css')
    <style>
        .note-editor .note-editable {
            line-height: 1.2;
            font-size: 14pt;
        }
    </style>
@stop



@section('container')

    <section class="content-header">
        <h1>{{trans('feeds.edit')}}</h1>

    </section>

    <br>

    {!! Form::model($results, ['route' => ['feeds.update', $results -> id], 'method' => 'PATCH', 'novalidate', 'files' => true], $resulted) !!}
    @include('feeds.form', [$button = trans('feeds.update')])
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
