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
        <h4 class="panel-title pull-left">Languages</h4>
        <div class="pull-right">
            <a href="{{ route('admin.languages.create') }}" type="button" class="btn btn-default tooltips" data-toggle="tooltip" data-placement="top" title="Add New Language"><i class="glyphicon glyphicon-plus"></i></a>
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
                    @forelse($languages as $language)
                        <tr>
                            <td>{{ link_to_route('admin.languages.show', e($language->name), [e($language->slug)]) }}</td>
                            <td>{{ e($language->created_at) }}</td>
                            <td>{{ e($language->updated_at) }}</td>
                            <td>
                                <a href="{{ route('admin.languages.edit', $language->id) }}"><i class="fa fa-pencil"></i> Edit</a>
                                <a href="{{ route('admin.languages.destroy', $language->id) }}" data-method="delete" data-confirm="Are you sure ?"><i class="fa fa-trash"></i> Delete</a>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td class="text-center" colspan="4">No language found</td>
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