@extends('layouts.admin')
@section('container')

    <style>

        *{
            font-size: 18px;
        }

        .field {
            padding: 30px;
        }

        .control {
            float: left;
        }

        .table {
            padding-right: 20px;
            border: solid lightslategrey 1px;
        }

    </style>

    <section class="content-header">
        <h1>{{trans('admin.profile')}}</h1>

    </section>

    <br>

    <nav class="panel">

        <div class="field">

            <div class="panel panel-default">
                <div class="panel-body">
                    <h6><em>{{trans('users.username')}}</em>:  <strong>{{$user->name}}</strong></h6>
                    <h6><em>{{trans('users.email')}}</em>:  <strong>{{$user->email}}</strong></h6>
                </div>

            </div>

        <br>
        <br>


                <table class="table">
                    <thead>
                        <td>{{trans('users.postTitle')}}</td>
                        <td>{{trans('users.publishedAt')}}</td>
                        <td>{{trans('users.view')}}</td>
                    </thead>
                    <tbody>

                        @if(isset($feeds) && count($feeds) > 0)
                            @foreach($feeds as $feed)
                                <tr>
                                    <td><a href="{{route('feeds.show', $feed->id)}}" target="_blank">{{$feed->title}}</a></td>
                                    <td>{{$feed->created_at}}</td>
                                    <td>{{$feed->view_count}}</td>
                                </tr>
                            @endforeach
                        @endif
                    </tbody>
                </table>

            {{$feeds -> links()}}

        </div>

    </nav>

@stop