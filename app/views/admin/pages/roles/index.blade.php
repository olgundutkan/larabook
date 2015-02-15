@extends('layouts.default')

@section('token')
    <meta name="csrf-token" content="{{ csrf_token() }}" />
    <meta name="csrf-param" content="_token" />
@stop

@section('content')
    <h1 class="page-header">All Roles</h1>
    <div class="table-responsive">
        <table class="table table-bordered">
            <thead>
                <th>Name</th>
                <th class="text-center"></th>
            </thead>
            <tbody>
                @foreach ($roles as $role)
                    <tr>
                        <td>{{ e($role->name) }}</td>
                        <td>
                            <a href="{{ route('manage.roles.edit', e($role->id)) }}"><i class="fa fa-pencil"></i> Edit</a>
                            <a href="{{ route('manage.roles.destroy', e($role->id)) }}" data-method="delete" data-confirm="Are you sure ?"><i class="fa fa-trash"></i> Delete</a>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
@stop