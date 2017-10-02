@extends('layouts.admin')
@section('container')

    {{Form::model($users, ['route' => ['users.update', $users -> id], 'method' => 'PATCH', 'novalidate', 'block'], $activated)}}
        @include('users.form', [$button = trans('users.update'), $disabled = 'false'])
    {{Form::close()}}

@stop