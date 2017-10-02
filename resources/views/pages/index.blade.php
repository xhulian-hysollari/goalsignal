@extends('layouts.admin')
@section('container')


    <style>

        *{
            font-size: 18px;
        }

        .button {

            font-size: 12pt;
        }

        .field {
            padding: 30px;
        }

    </style>

    <section class="content-header">
        <h1>{{trans('admin.pages')}}</h1>

    </section>

    <br>

    <nav class="panel">
        <div class="field">
            <table class="table">
                <thead>
                    <td>{{trans('pages.title')}}</td>
                    <td>{{trans('pages.slug')}}</td>
                    <td>{{trans('pages.actions')}}</td>

                </thead>
                <tbody>
                    @if(isset($results) && count($results) > 0)
                        @foreach($results as $result)
                            <tr>
                                <td>{{$result->title}}</td>
                                <td>{{$result->slug}}</td>
                                <td>
                                    <a class="button is-info" href="{{url('dashboard/pages/show', $result->slug)}}" target="_blank"><i class="fa fa-file-powerpoint-o" aria-hidden="true"></i></a>
                                    <a class="button is-primary" href="{{url('dashboard/pages/edit', $result->id)}}"><i class="fa fa-pencil-square-o" aria-hidden="true"></i></a>

                                    <a class="button is-danger" data-toggle="modal" data-target="#modal-{{$result->id}}">
                                        <i class="fa fa-trash-o" aria-hidden="true"></i>
                                    </a>

                                    <div class="modal fade" id="modal-{{$result->id}}">
                                        <div class="modal-dialog">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                        <span aria-hidden="true">&times;</span>
                                                    </button>
                                                    <h4 class="modal-title">{{trans('pages.modalTitle')}}</h4>
                                                </div>
                                                <div class="modal-body">
                                                    <p>{{trans('pages.modalBody')}}</p>
                                                </div>
                                                <div class="modal-footer">
                                                    <button type="button" class="btn btn-default pull-left" data-dismiss="modal">{{trans('pages.close')}}</button>

                                                    <a class="button is-primary is-outlined has-margin" href="{{url('dashboard/pages/destroy', $result->id)}}">{{trans('pages.delete')}}</a>

                                                </div>
                                            </div>
                                            <!-- /.modal-content -->
                                        </div>
                                        <!-- /.modal-dialog -->
                                    </div>
                                </td>
                            </tr>

                        @endforeach
                    @else
                        <h6>Nothing to be shown</h6>
                    @endif
                </tbody>
            </table>


            <div class="control">
                <a class="button is-primary is-outlined has-margin" href="{{url('dashboard/pages/create')}}">{{trans('pages.create')}}</a>
            </div>

        </div>
    </nav>



@stop