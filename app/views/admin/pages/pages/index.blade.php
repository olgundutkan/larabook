@extends('admin.layouts.default')

@section('token')
    <meta name="csrf-token" content="{{ csrf_token() }}" />
    <meta name="csrf-param" content="_token" />
@stop

@section('content')
<div class="row">
    <div class="col-md-12">
        
    
<div class="panel panel-default">
    <!-- Default panel contents -->
    <div class="panel-heading clearfix">
        <h4 class="panel-title pull-left">Pages</h4>
        <div class="pull-right">
            <a href="{{ route('admin.pages.create') }}" type="button" class="btn btn-white tooltips" data-original-title="Add New Page"><i class="fa fa-plus"></i></a>
        </div>
    </div>
    @if($pages->count() > 0)
    <div class="table-responsive">
        <table class="table">
            <thead>
                <tr>
                    <th>Page</th>
                    <th>Slug</th>
                    <th>Status</th>
                    <th class="table-action">Actions</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($pages as $page)
                <tr>
                    <td>{{ $page->title }}</td>
                    <td>{{ $page->slug }}</td>
                    <td>{{ $page->status == 'live' ? 'Live' : 'Draft' }}</td>
                    <td class="table-action">
                        <a href="{{ route('admin.pages.edit', $page->id) }}" title="Edit"><i class="fa fa-pencil"></i></a>
                        <a href="{{ route('admin.pages.destroy', $page->id) }}" data-original-title="Delete" data-method="delete" data-confirm="Are you sure you want to delete?"><i class="fa fa-trash-o"></i></a>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
    @else
        <div class="panel-body">
            <p>The system does not have registered any page.</p>
        </div>
    @endif
</div>
</div>
</div>
@stop