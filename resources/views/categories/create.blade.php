@extends('layouts.admin')

@section('container')

    {!! Form::model($categ = new \App\Models\Categories(), ['route' => ['categories.store'], 'method' => 'POST', 'novalidate']) !!}
        @include('categories.form', [$button = trans('categories.create')])
    {!! Form::close() !!}

@stop