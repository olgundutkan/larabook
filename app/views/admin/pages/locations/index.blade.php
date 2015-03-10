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
        <h4 class="panel-title pull-left">All Countries</h4>
        <div class="pull-right">
            <a href="{{ route('admin.locations.create') }}" type="button" class="btn btn-default tooltips" data-toggle="tooltip" data-placement="top" title="Add New Group"><i class="glyphicon glyphicon-plus"></i></a>
        </div>
        <div class="clearfix"></div>
    </div>
    <div class="panel-body">
        <div class="table-responsive">
            <table class="table table-bordered">
                <thead>
                    <th>Name</th>
                    <th class="text-center"></th>
                </thead>
                <tbody>
                    @foreach ($locations as $location)
                        <tr>
                            <td><a href="{{ route('admin.locations.show', $location->id) }}">{{ e($location->name) }}</a></td>
                            <td>
                                <a href="{{ route('admin.locations.edit', $location->id) }}"><i class="fa fa-pencil"></i> Edit</a>
                                <a href="{{ route('admin.locations.destroy', $location->id) }}" data-method="delete" data-confirm="Are you sure ?"><i class="fa fa-trash"></i> Delete</a>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
    <div class="panel-footer">
    </div>
</div>
@stop