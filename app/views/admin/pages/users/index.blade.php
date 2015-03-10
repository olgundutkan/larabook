@extends('admin.layouts.default')

@section('token')
    <meta name="csrf-token" content="{{ csrf_token() }}" />
    <meta name="csrf-param" content="_token" />
@stop

@section('content')
<div class="row">
<div class="col-lg-12">
<div class="panel panel-default">
    <div class="panel-heading">
        <h4 class="panel-title pull-left">Users</h4>
        <div class="pull-right">
            <a href="{{ route('admin.users.create') }}" type="button" class="btn btn-default tooltips" data-toggle="tooltip" data-placement="top" title="Add New Group"><i class="glyphicon glyphicon-plus"></i></a>
        </div>
        <div class="clearfix"></div>
    </div>
    <div class="panel-body">
        <div class="table-responsive">
            <table class="table table-bordered">
                <thead>
                    <th>Avatar</th>
                    <th>Username</th>
                    <th class="text-center"></th>
                </thead>
                <tbody>
                    @foreach ($users as $user)
                        <tr>
                            <td>
                                <a href="{{ route('profile_path', $user->username) }}">
                                    <img class="media-object" src="{{ $user->present()->profilePicture('x-small') }}" alt="{{ e($user->username) }}">
                                </a>
                            </td>
                            <td>{{ link_to_route('profile_path', e($user->username), $user->username) }}</td>
                            <td>
                                <a href="{{ route('admin.users.edit', e($user->username)) }}"><i class="fa fa-pencil"></i> Edit</a>
                                <a href="{{ route('admin.users.destroy', $user->id) }}" data-method="delete" data-confirm="Are you sure ?"><i class="fa fa-trash"></i> Delete</a>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
    <div class="panel-footer">
        {{ $users->links() }}
    </div>
</div>
@stop