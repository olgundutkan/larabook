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
                    <a href="{{ route('admin.groups.create') }}" type="button" class="btn btn-default tooltips" data-toggle="tooltip" data-placement="top" title="Add New Group"><i class="fa fa-plus"></i></a>
                </div>
                <!-- panel-btns -->
                <h3 class="panel-title">Groups</h3>
            </div>
                <div class="table-responsive">
                    <table class="table table-striped table-bordered mb30">
                        <thead>
                            <tr>
                                <th>Name</th>
                                <th>Created At</th>
                                <th>Updated At</th>
                                <th>Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse($groups as $group)
                                <tr>
                                    <td>{{ link_to_route('admin.groups.show', e($group->name), [e($group->slug)]) }}</td>
                                    <td>{{ e($group->created_at) }}</td>
                                    <td>{{ e($group->updated_at) }}</td>
                                    <td>
                                        <a href="{{ route('admin.groups.edit', $group->id) }}"><i class="fa fa-pencil"></i></a>
                                        <a href="{{ route('admin.groups.destroy', $group->id) }}" data-method="delete" data-confirm="Are you sure ?"><i class="fa fa-trash-o"></i></a>
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