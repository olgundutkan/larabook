@extends('layouts.default')

@section('stylesheet')
<style type="text/css">
	.file-preview-frame{
		margin: 5px 0px 0px !important;
		border: none !important;
	}
</style>
@stop

@section('content')
<div class="row">
	<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
		<h1>Register!</h1>

		@include('layouts.partials.errors')
	</div>
	{{ Form::open(['route' => 'register_path', 'class' => '', 'role' => 'form', 'files' => true, 'method' => 'POST']) }}
	<div class="col-xs-12 col-sm-12 col-md-6 col-lg-6">
		<div class="form-group">
			{{ Form::label('username', 'Username:', ['for' => 'username', 'class' => 'control-label']) }}<span class="req">*</span>
			{{ Form::text('username', null, ['id' => 'username', 'class' => 'form-control']) }}
			<span class="help-block">Will be seen at Social Network</span>
		</div>

		<div class="form-group">
			{{ Form::label('email', 'Email:', ['for' => 'email', 'class' => 'control-label']) }}<span class="req">*</span>
			{{ Form::email('email', null, ['id' => 'email', 'class' => 'form-control']) }}
			{{ Form::hidden('is_visible_email', false) }}
			<span class="help-block">Will <a href="javascript:void(0)" class="privacy" data-input="is_visible_email" data-privacy="true">not be seen</a> at Social Network</span>
		</div>

		<div class="form-group">
			{{ Form::label('password', 'Password:', ['for' => 'password', 'class' => 'control-label']) }}<span class="req">*</span>
			{{ Form::password('password', ['id' => 'password', 'class' => 'form-control']) }}
		</div>

		<div class="form-group">
			{{ Form::label('password_confirmation', 'Password Confirmation:', ['for' => 'password_confirmation', 'class' => 'control-label']) }}<span class="req">*</span>
			{{ Form::password('password_confirmation', ['id' => 'password_confirmation', 'class' => 'form-control']) }}
		</div>

		<div class="form-group">
			{{ Form::label('title', 'Title:', ['for' => 'title', 'class' => 'control-label']) }}
			{{ Form::text('title', null, ['id' => 'title', 'class' => 'form-control']) }}
			{{ Form::hidden('is_visible_title', false) }}
			<span class="help-block">Will <a href="javascript:void(0)" class="privacy" data-input="is_visible_title" data-privacy="true">not be seen</a> at Social Network</span>
		</div>

		<div class="form-group">
			{{ Form::label('first_name', 'First Name:', ['for' => 'first_name', 'class' => 'control-label']) }}<span class="req">*</span>
			{{ Form::text('first_name', null, ['id' => 'first_name', 'class' => 'form-control']) }}
			{{ Form::hidden('is_visible_first_name', false) }}
			<span class="help-block">Will <a href="javascript:void(0)" class="privacy" data-input="is_visible_first_name" data-privacy="true">not be seen</a> at Social Network</span>
		</div>

		<div class="form-group">
			{{ Form::label('last_name', 'Last Name:', ['for' => 'last_name', 'class' => 'control-label']) }}<span class="req">*</span>
			{{ Form::text('last_name', null, ['id' => 'last_name', 'class' => 'form-control']) }}
			{{ Form::hidden('is_visible_last_name', false) }}
			<span class="help-block">Will <a href="javascript:void(0)" class="privacy" data-input="is_visible_last_name" data-privacy="true">not be seen</a> at Social Network</span>
		</div>

		<div class="form-group">
			{{ Form::label('gender', 'Gender:', ['for' => 'gender', 'class' => 'control-label']) }}
			{{ Form::radio('gender', 'not_specified', true) }} Not Specified
			{{ Form::radio('gender', 'male', false) }} Male
			{{ Form::radio('gender', 'female', false) }} Female
			{{ Form::hidden('is_visible_gender', false) }}
			<span class="help-block">Will <a href="javascript:void(0)" class="privacy" data-input="is_visible_gender" data-privacy="true">not be seen</a> at Social Network</span>
		</div>

		<div class="form-group">
			{{ Form::label('dob', 'Date of Birth:', ['for' => 'dob', 'class' => 'control-label']) }}<span class="req">*</span>
			{{ Form::text('dob', null, ['id' => 'dob', 'class' => 'form-control']) }}
			{{ Form::hidden('is_visible_dob', false) }}
			<span class="help-block">Will <a href="javascript:void(0)" class="privacy" data-input="is_visible_dob" data-privacy="true">not be seen</a> at Social Network</span>
		</div>

		<div class="form-group">
			{{ Form::label('country', 'Country:', ['for' => 'country', 'class' => 'control-label']) }}<span class="req">*</span>
			{{ Form::select('country', $countries, null, ['id' => 'country', 'class' => 'form-control']) }}
		</div>

		<div class="form-group">
			{{ Form::label('state', 'State:', ['for' => 'state', 'class' => 'control-label']) }}<span class="req">*</span>
			{{ Form::select('state', $states, null, ['id' => 'state', 'class' => 'form-control']) }}
		</div>

		<div class="form-group">
			{{ Form::label('city', 'City:', ['for' => 'city', 'class' => 'control-label']) }}<span class="req">*</span>
			{{ Form::select('city', $cities, null, ['id' => 'city', 'class' => 'form-control']) }}
		</div>

		<div class="form-group">
			{{ Form::label('school_department', 'School / Department:', ['for' => 'school_department', 'class' => 'control-label']) }}<span class="req">*</span>
			{{ Form::text('school_department', null, ['id' => 'school_department', 'class' => 'form-control']) }}
		</div>

		<div class="form-group">
			{{ Form::label('is_commercial', 'Is Commercial:', ['for' => 'is_commercial', 'class' => 'control-label']) }}
			{{ Form::checkbox('is_commercial', true, false, ['id' => 'is_commercial']) }}
		</div>

		
		<div class="form-group">
			{{ Form::label('groups', 'Choose Group:', ['for' => 'groups', 'class' => 'control-label']) }}
			{{ Form::select('groups[]', ['1' => 'Group 1', '2' => 'Group 2', '3' => 'Group 3'], 1, ['id' => 'groups', 'class' => 'form-control', 'multiple'=>'multiple']) }}
		</div>

		<div class="form-group">
			{{ Form::checkbox('terms_and_conditions', true, false, ['id' => 'terms-and-conditions', 'class' => 'control-label']) }}
			<!-- Link trigger modal -->
			I have read and agree to <a href="javascript:void(0);" data-toggle="modal" data-target="#terms-and-conditions-modal">terms and conditions</a>.
		</div>
	</div>
	<div class="col-xs-12 col-sm-12 col-md-6 col-lg-6">
		<div class="form-group">
			{{ Form::label('language', 'Language:', ['for' => 'language', 'class' => 'control-label']) }}<span class="req">*</span>
			{{ Form::select('language', ['1' => 'English', '2' => 'Turkish'], 1, ['id' => 'language', 'class' => 'form-control']) }}
		</div>
		<div class="col-md-6 col-md-offset-6 form-group">
			{{ Form::file('profile_picture', ['id' => 'profile-profile_picture', 'class' => 'profile-profile_picture']) }}
		</div>
	</div>
	<div class="clearfix"></div>
	<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
		<div class="form-group">
			{{ Form::submit('Sign Up!', ['class' => 'btn btn-primary']) }}
		</div>
	</div>
	{{ Form::close() }}
</div>
<!-- Modal -->
<div class="modal fade" id="terms-and-conditions-modal" tabindex="-1" role="dialog" aria-labelledby="terms-and-conditions" aria-hidden="true">
	<div class="modal-dialog">
		<div class="modal-content">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
				<h4 class="modal-title" id="terms-and-conditions">TERMS AND CONDITIONS</h4>
			</div>
			<div class="modal-body">
				<p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.</p>
			</div>
			<div class="modal-footer">
				<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
			</div>
		</div>
	</div>
</div>
@stop

@section('script')
	<script>
		$(function() {
			$( "#dob" ).datepicker({
				format: 'dd/mm/yyyy'
			});
			/* Initialize your widget via javascript as follows */
			$("#profile-profile_picture").fileinput({
				browseClass: "btn btn-primary btn-block",
				showCaption: false,
				showRemove: false,
				showUpload: false,
				browseLabel: 'Upload Profile Photo',
				browseIcon: '<i class="glyphicon glyphicon-profile_picture"></i> ',
				maxFilesNum: 1,
    			allowedFileExtensions: ["jpeg", "jpg", "gif", "png"],
        		msgInvalidFileExtension: 'Invalid extension for file "{name}". Only "{extensions}" files are supported.',
			});
		});
		$('.privacy').click(function() {
	    	var input = $(this).data('input');
			var privacy = $(this).data('privacy');
			console.log(input);
			console.log(privacy);


			if (privacy) {
				$("input[name="+input+"]").val(true);
				$(this).text('be seen');
				$(this).data('privacy', false);
			} else {				
				$("input[name="+input+"]").val(false);
				$(this).text('not be seen');
				$(this).data('privacy', true);
			}
	    });
	</script>
@stop