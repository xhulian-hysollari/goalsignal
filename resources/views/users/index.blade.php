@extends('layouts.admin')
@section('container')

    <style>

        *{
            font-size: 18px;
        }

        .button{
            font-size:12pt;
        }

        .field {
            padding: 30px;
        }
    </style>

    <section class="content-header">
        <h1>{{trans('admin.users')}}</h1>

    </section>

    <br>

    <nav class="panel">
        <div class="field">
            <table class="table">
                <thead>
                    <td>{{trans('users.username')}}</td>
                    <td>{{trans('users.email')}}</td>
                    <td>{{trans('users.actions')}}</td>
                </thead>
                <tbody>

                    @foreach($users as $user)
                        <tr>
                            <td>{!! $user->name !!}</td>
                            <td>{!! $user->email !!}</td>
                            <td><a class="button is-info"  href="{{url('dashboard/users/showUsers', $user->id)}}"><i class="fa fa-user-o" aria-hidden="true"></i></a>
                                <a class="button is-primary"  href="{{url('dashboard/users/edit', $user->id)}}"><i class="fa fa-pencil-square-o" aria-hidden="true"></i></a>
                                @if(Auth::user()->role === "Admin" && Auth::user()->id != $user->id)

                                    @if($user->is_active == 1)
                                        <a class="button is-danger" data-toggle="modal" data-target="#modal-{{$user->id}}">
                                            <i class="fa fa-user-times" aria-hidden="true"></i>
                                        </a>


                                        <div class="modal fade" id="modal-{{$user->id}}">
                                            <div class="modal-dialog">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                            <span aria-hidden="true">&times;</span>
                                                        </button>
                                                        <h4 class="modal-title">{{trans('users.modalTitle')}}</h4>
                                                    </div>
                                                    <div class="modal-body">
                                                        <p>{{trans('users.modalBody')}}</p>
                                                    </div>
                                                    <div class="modal-footer">
                                                        <button type="button" class="btn btn-default pull-left" data-dismiss="modal">{{trans('users.close')}}</button>
                                                        <a class="button is-primary is-outlined has-margin" href="{{url('dashboard/users/destroy', $user->id)}}">{{trans('users.delete')}}</a>
                                                    </div>
                                                </div>
                                                <!-- /.modal-content -->
                                            </div>
                                            <!-- /.modal-dialog -->
                                        </div>

                                    @elseif($user->is_active == 0)

                                        <a class="button is-success" data-toggle="modal" data-target="#modal-{{$user->id}}">
                                            <i class="fa fa-user-plus" aria-hidden="true"></i>
                                        </a>


                                        <div class="modal fade" id="modal-{{$user->id}}">
                                            <div class="modal-dialog">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                            <span aria-hidden="true">&times;</span>
                                                        </button>
                                                        <h4 class="modal-title">{{trans('users.modalTitle')}}</h4>
                                                    </div>
                                                    <div class="modal-body">
                                                        <p>{{trans('users.modalActiveBody')}}</p>
                                                    </div>
                                                    <div class="modal-footer">
                                                        <button type="button" class="btn btn-default pull-left" data-dismiss="modal">{{trans('users.close')}}</button>
                                                        <a class="button is-primary is-outlined has-margin" href="{{url('dashboard/users/activate', $user->id)}}">{{trans('users.activate')}}</a>
                                                    </div>
                                                </div>
                                                <!-- /.modal-content -->
                                            </div>
                                            <!-- /.modal-dialog -->
                                        </div>

                                    @endif



                                @endif
                            </td>

                        </tr>
                    @endforeach

                </tbody>
            </table>


            <div class="control">
                <a class="button is-primary is-outlined has-margin" href="{{url('dashboard/users/create')}}">{{trans('users.create')}}</a>
            </div>

        </div>
    </nav>
@stop

@section('footer')

@stop