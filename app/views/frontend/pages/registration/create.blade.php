@extends('frontend.layouts.default')

@section('stylesheet')
<style type="text/css">
    html {
        background:#505D6E url("{{ Theme::asset('img/body.jpg') }}") no-repeat center center fixed; 
        min-height:100%;
        -webkit-background-size: cover;
           -moz-background-size: cover;
             -o-background-size: cover;
                background-size: cover;
    }
</style>
@stop

@section('content')
<div class="row">
	<div class="col-xs-12 col-sm-12 col-md-4 col-md-offset-8 col-lg-4 col-lg-offset-8">
	{{ Form::open(['route' => 'register_path', 'class' => '', 'role' => 'form', 'method' => 'POST']) }}
		<div class="panel panel-default">
			<div class="panel-heading">
				<h4>Register!</h4>
			</div>
			<div class="panel-body">
				
				@include('frontend.layouts.partials.errors')

				<div class="form-group">
					{{ Form::label('username', 'Username:', ['for' => 'username', 'class' => 'control-label']) }}<span class="req">*</span>
					{{ Form::text('username', null, ['id' => 'username', 'class' => 'form-control']) }}
				</div>

				<div class="form-group">
					{{ Form::label('email', 'Email:', ['for' => 'email', 'class' => 'control-label']) }}<span class="req">*</span>
					{{ Form::email('email', null, ['id' => 'email', 'class' => 'form-control']) }}
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
					{{ Form::checkbox('terms_and_conditions', true, false, ['id' => 'terms-and-conditions', 'class' => 'control-label']) }}
					<!-- Link trigger modal -->
					<small>I have read and agree to <a href="javascript:void(0);" data-toggle="modal" data-target="#terms-and-conditions-modal">terms and conditions</a>.</small>
				</div>
			</div>
			<div class="panel-footer">
				<div class="form-group pull-left">
					{{ Form::submit('Sign Up!', ['class' => 'btn btn-primary']) }}
				</div>

				<div class="form-group pull-right">
	                {{ link_to_route('home', 'Sign in') }}
	            </div>
	            <div class="clearfix"></div>
			</div>
		</div>
	{{ Form::close() }}
	</div>
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
@stop