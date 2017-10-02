@extends('layouts.admin')
@section('container')

    {!! Form::model($results, ['route'=> ['pages.update', $results->id], 'method' => 'Patch', 'novalidate'])!!}
        @include('pages.form', [$button = trans('pages.update')])
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
