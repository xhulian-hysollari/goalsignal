@extends('layouts.app')
@section('container')

    <nav class="panel">
        <div class="field">

            <h3>{{$result->title}}</h3>


            <p>{!! $result->body !!}</p>

        </div>
    </nav>

@stop