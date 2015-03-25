@extends('admin.layouts.default')

@section('content')
<div class="row">
<div class="col-lg-12">
{{ Form::open(['route' => ['admin.groups.update', $group->id], 'role' => 'form', 'method' => 'PUT']) }}
<div class="panel panel-default">
    <div class="panel-heading">
        <h4 class="panel-title pull-left">Groups</h4>
        <div class="pull-right">
            <a href="{{ route('admin.groups.index') }}" type="button" class="btn btn-default tooltips" data-toggle="tooltip" data-placement="top" title="Add New Group"><i class="glyphicon glyphicon-chevron-left"></i></a>
        </div>
        <div class="clearfix"></div>
    </div>
    <div class="panel-body">
    	@include('admin.layouts.partials.errors')

    	<div class="form-group">
			{{ Form::label('name', 'Group Name:', ['for' => 'name']) }}
			{{ Form::text('name', $group->name, ['id' => 'name', 'class' => 'form-control']) }}
		</div>
		<div class="form-group">
			{{ Form::label('slug', 'Slug:', ['for' => 'slug']) }}
			{{ Form::text('slug', $group->slug, ['id' => 'slug', 'class' => 'form-control']) }}
		</div>
        @foreach($languages as $slug => $language)
            <div class="form-group">
                {{ Form::label('translations', $language . ' :', ['for' => 'translations']) }}
                {{ Form::text('translations[' . $slug . ']', property_exists($group->translations, $slug) ? $group->translations->$slug : null, ['id' => 'translations-slug', 'class' => 'form-control']) }}
            </div>
        @endforeach
    </div>
    <div class="panel-footer">
        <div class="form-group">
			{{ Form::submit('Update Group!', ['class' => 'btn btn-primary']) }}
		</div>
    </div>
</div>
{{ Form::close() }}
@stop

@section('script')
<script type="text/javascript">
    jQuery(document).ready(function(){
        $("#name").slugger({
            slugInput: $("#slug")
        });
    });
</script>
@stop