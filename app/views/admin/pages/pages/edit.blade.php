@extends('layouts.default')

@section('title')
<i class="fa fa-file-text-o"></i>Pages
@stop

@section('content')
<div class="panel panel-default">
    {{ Form::model($page, ['route' => ['admin.pages.update', $page->id], 'role' => 'form', 'class' => 'form-horizontal form-bordered', 'method' => 'PUT']) }}
    <div class="panel-heading clearfix">
        <h4 class="panel-title pull-left">Edit Page</h4>
        <div class="pull-right">
            <a href="{{ route('admin.pages.index') }}" title="" data-toggle="tooltip" type="button" class="btn btn-white tooltips" data-original-title="Back"><i class="glyphicon glyphicon-chevron-left"></i></a>
        </div>
    </div>
    <div class="panel-body panel-body-nopadding">
        <div class="form-group">
            <label class="col-sm-3 control-label">Title <span class="asterisk">*</span></label>
            <div class="col-sm-6">
                {{ Form::text('title', null, ['class' => 'form-control', 'id' => 'title']) }}
            </div>
        </div>
        <div class="form-group">
            <label class="col-sm-3 control-label">Is Home Page?</label>
            <div class="col-sm-1">
                {{ Form::checkbox('is_home', true, false) }}
            </div>
        </div>
        <div class="form-group">
            <label class="col-sm-3 control-label">Slug <span class="asterisk">*</span></label>
            <div class="col-sm-6">
                {{ Form::text('slug', null, ['class' => 'form-control', 'id' => 'slug']) }}
            </div>
        </div>
        <div class="form-group">
            <label class="col-sm-3 control-label">Content <span class="asterisk">*</span></label>
            <div class="col-sm-6">
                {{ Form::textarea('content', null, ['id' => 'ckeditor', 'class' => 'form-control']) }}
            </div>
        </div>
        <div class="form-group">
            <label class="col-sm-3 control-label">Status <span class="asterisk">*</span></label>
            <div class="col-sm-6">
                {{ Form::select('status', ['draft' => 'Draft', 'live' => 'Live'], null, ['class' => 'chosen-select form-control']) }}
            </div>
        </div>
    </div><!-- panel-body -->

    <div class="panel-footer">
        <div class="row">
            <div class="col-sm-6 col-sm-offset-3">
                {{ Form::submit('Update', array('class' => 'btn btn-primary')) }}
            </div>
        </div>
    </div><!-- panel-footer -->
    {{ Form::close() }}
</div><!-- panel -->
@stop

@section('script')
    <script src="{{ asset('js/ckeditor/ckeditor.js') }}"></script>
    <script src="{{ asset('js/ckeditor/adapters/jquery.js') }}"></script>
    <script type="text/javascript">
        jQuery(document).ready(function(){
            // CKEditor
            jQuery('#ckeditor').ckeditor();

            $("#title").slugger({
                slugInput: $("#slug")
            });
        });
    </script>
@stop