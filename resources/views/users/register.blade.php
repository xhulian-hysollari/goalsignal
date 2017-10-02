@extends('layouts.app')

@section('content')

    {{Form::model($users = new App\User(), ['route' =>'users.registered' ,'method' => 'POST', 'novalidate', 'block'])}}
        @include('users.form', [$button = trans('users.register'), $disabled = 'true'])
    {{Form::close()}}


@endsection
