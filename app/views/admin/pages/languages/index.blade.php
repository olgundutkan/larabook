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
                    <a href="{{ route('admin.languages.create') }}" type="button" class="btn btn-default tooltips" data-toggle="tooltip" data-placement="top" title="Add New Language"><i class="fa fa-plus"></i></a>
                </div>
                <!-- panel-btns -->
                <h3 class="panel-title">Languages</h3>
            </div>
                <div class="table-responsive">
                    <table class="table table-bordered">
                        <thead>
                            <tr>
                                <th>Name</th>
                                <th>Created At</th>
                                <th>Updated At</th>
                                <th>Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse($languages as $language)
                                <tr>
                                    <td>{{ link_to_route('admin.languages.show', e($language->name), [e($language->slug)]) }}</td>
                                    <td>{{ e($language->created_at) }}</td>
                                    <td>{{ e($language->updated_at) }}</td>
                                    <td>
                                        <a href="{{ route('admin.languages.edit', $language->id) }}"><i class="fa fa-pencil"></i></a>
                                        <a href="{{ route('admin.languages.destroy', $language->id) }}" data-method="delete" data-confirm="Are you sure ?"><i class="fa fa-trash-o"></i></a>
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
            <div class="panel-footer">
                 Footer content goes here...
            </div>
            <!-- panel-footer -->
        </div>
    </div>
</div>
@stop