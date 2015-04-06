@extends('admin.layouts.default')

@section('token')
    <meta name="csrf-token" content="{{ csrf_token() }}" />
    <meta name="csrf-param" content="_token" />
@stop

@section('content')

@include('admin.layouts.partials.errors')

<div class="row">
    <div class="col-sm-12">
        <div class="panel panel-default">
            <div class="panel-heading">
                <div class="panel-btns">
                    <a href="{{ route('admin.users.create') }}" type="button" class="btn btn-default tooltips" data-toggle="tooltip" data-placement="top" title="Add New User"><i class="fa fa-plus"></i></a>
                </div>
                <!-- panel-btns -->
                <h3 class="panel-title">Users</h3>
            </div>
                <div class="table-responsive">
                    <table class="table table-striped table-bordered mb30">
                        <thead>
                            <tr>
                                <th>Username</th>
                                <th>Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($users as $user)
                                <tr>
                                    <td>
                                        {{ link_to_route('admin.users.show', e($user->username), $user->id) }}
                                    </td>
                                    <td>
                                        <a href="{{ route('admin.users.edit', e($user->id)) }}"><i class="fa fa-pencil"></i></a>
                                        <a href="{{ route('admin.users.destroy', $user->id) }}" data-method="delete" data-confirm="Are you sure ?"><i class="fa fa-trash-o"></i></a>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            <!-- panel-body -->
            <div class="panel-footer">
                 Footer content goes here...
            </div>
            <!-- panel-footer -->
        </div>
        <!-- panel -->
    </div>
    <!-- col-sm-12 -->
</div>
<!-- row -->
@stop