@extends('admin.layouts.default')

@section('content')

@include('admin.layouts.partials.errors')

<div class="row">
    <div class="col-sm-12">
        {{ Form::open(['route' => ['admin.languages.update', $language->id], 'id' => 'basicForm', 'class' => 'form-horizontal', 'files' => true, 'role' => 'form', 'method' => 'PUT']) }}
        <div class="panel panel-default">
            <div class="panel-heading">
                <div class="panel-btns">
                    <a href="{{ route('admin.languages.index') }}" type="button" class="btn btn-default tooltips" data-toggle="tooltip" data-placement="top" title="Back"><i class="fa fa-chevron-left"></i></a>
                </div>
                <!-- panel-btns -->
                <h3 class="panel-title">Edit Language</h3>
            </div>
            <div class="panel-body">
                <div class="form-group">
                    <label class="col-sm-3 control-label" for="name">Language Name: <span class="asterisk">*</span></label>
                    <div class="col-sm-6">
                        {{ Form::text('name', $language->name, ['id' => 'name', 'class' => 'form-control']) }}
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-sm-3 control-label" for="slug">Slug: <span class="asterisk">*</span></label>
                    <div class="col-sm-6">
                        {{ Form::text('slug', $language->slug, ['id' => 'slug', 'class' => 'form-control']) }}
                    </div>
                </div>
            </div>
            <!-- panel-body -->
            <div class="panel-footer">
                <div class="form-group">
                    <div class="col-md-2 col-md-offset-10">
                        {{ Form::submit('Update Language!', ['class' => 'btn btn-primary']) }}
                    </div>
                </div>
            </div>
            <!-- panel-footer -->
        </div>
        {{ Form::close() }}
    </div>
</div>
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