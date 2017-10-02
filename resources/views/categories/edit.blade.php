@extends('layouts.admin')
@section('container')

    {!! Form::model($categ, ['route'=>['categories.update', $categ -> id], 'method' => 'PATCH', 'novalidate']) !!}
        @include('categories.form', [$button = trans('categories.update')])
    {!! Form::close() !!}

@stop
