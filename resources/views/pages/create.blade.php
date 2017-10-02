@extends('layouts.admin')
@section('container')

    {!! Form::model($results = new \App\Models\Pages(), ['route' => ['pages.store'], 'method' => 'POST', 'novalidate']) !!}
        @include('pages.form', [$button = trans('pages.create')])
    {!! Form::close() !!}

@stop

@section('footer')
    <script src="https://cdnjs.cloudflare.com/ajax/libs/summernote/0.8.7/summernote.min.js"></script>

    <script>
        $(document).ready(function() {
            $('.summernote').summernote({
                height: 400
            });
        });
    </script>
@stop
