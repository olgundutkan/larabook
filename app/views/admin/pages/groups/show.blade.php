@extends('admin.layouts.default')

@section('content')
<div class="row">
<div class="col-lg-12">
<div class="panel panel-default">
    <div class="panel-heading">
        <h4 class="panel-title">{{ $group->name }} Users</h4>
    </div>
    <div class="panel-body">
        @if(!$group->users->count())
            <p>Not Found Users!</p>
        @else
            <div class="table-responsive">
                <table class="table table-bordered">
                    <thead>
                        <th>Avatar</th>
                        <th>Username</th>
                        <th class="text-center"></th>
                    </thead>
                    <tbody>
                        @foreach ($group->users as $user)
                            <tr>
                                <td>@include ('admin.pages.users.partials.avatar', ['size' => 20])</td>
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
        @endif
    </div>
    <div class="panel-footer">
    </div>
</div>
</div>
</div>
<div class="row">
<div class="col-lg-12">
<div class="panel panel-default">
    <div class="panel-heading">
        <h4 class="panel-title">{{ $group->name }} Posts</h4>
    </div>
    <div class="panel-body">
        <div class="panel-body status-body">
            @include ('frontend.pages.groups.partials.publish-status-form')
        </div>
        @if(!$group->statuses->count())
            <p>Not Found Status!</p>
        @else
            @include ('frontend.pages.groups.partials.statuses', ['statuses' => $group->statuses])
        @endif
    </div>
    <div class="panel-footer">
    </div>
</div>
</div>
@stop