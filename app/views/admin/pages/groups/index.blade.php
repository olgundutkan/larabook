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
        <h4 class="panel-title pull-left">Groups</h4>
        <div class="pull-right">
            <a href="{{ route('admin.groups.create') }}" type="button" class="btn btn-default tooltips" data-toggle="tooltip" data-placement="top" title="Add New Group"><i class="glyphicon glyphicon-plus"></i></a>
        </div>
        <div class="clearfix"></div>
    </div>
    <div class="panel-body">
       <div class="table-responsive">
            <table class="table table-bordered">
                <thead>
                    <tr>
                        <th>Name</th>
                        <th>Created At</th>
                        <th>Updated At</th>
                        <th class="text-center"></th>
                    </tr>
                </thead>
                <tbody>
                    @forelse($groups as $group)
                        <tr>
                            <td>{{ link_to_route('admin.groups.show', e($group->name), [e($group->slug)]) }}</td>
                            <td>{{ e($group->created_at) }}</td>
                            <td>{{ e($group->updated_at) }}</td>
                            <td>
                                <a href="{{ route('admin.groups.edit', $group->id) }}"><i class="fa fa-pencil"></i> Edit</a>
                                <a href="{{ route('admin.groups.destroy', $group->id) }}" data-method="delete" data-confirm="Are you sure ?"><i class="fa fa-trash"></i> Delete</a>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td class="text-center" colspan="4">No group found</td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>
    <div class="panel-footer">
        
    </div>
</div>
@stop