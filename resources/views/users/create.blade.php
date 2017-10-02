@extends('layouts.admin')
@section('container')

    {{Form::model($users = new App\User(), ['route' =>'users.store' ,'method' => 'POST', 'novalidate', 'block'])}}
    @include('users.form', [$button = trans('users.create'), $disabled = 'true'])
    {{Form::close()}}

@stop