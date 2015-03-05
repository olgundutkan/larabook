@extends('admin.layouts.default')

@section('token')
    <meta name="csrf-token" content="{{ csrf_token() }}" />
    <meta name="csrf-param" content="_token" />
@stop

@section('content')
<div class="row">
<div class="col-lg-12">
    <h1 class="page-header">Users</h1>
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
    {{ $users->links() }}

    </div>
    <!-- /.col-lg-12 -->
</div>
@stop