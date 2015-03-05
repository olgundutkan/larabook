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
<div class="col-xs-12 col-sm-12 col-md-4 col-md-offset-8 col-lg-4 col-lg-offset-8">
    <div class="panel panel-default">
        <div class="panel-heading">
            <h4>Reset Your Password</h4>
        </div>
        <div class="panel-body">
            {{ Form::open() }}
                {{ Form::hidden('token', $token) }}
                <!-- Email Form Input -->
                <div class="form-group">
                    {{ Form::label('email', 'Email:') }}
                    {{ Form::email('email', null, ['class' => 'form-control', 'required']) }}
                </div>
                
                <!-- Password Form Input -->
                <div class="form-group">
                    {{ Form::label('password', 'Password:') }}
                    {{ Form::password('password', ['class' => 'form-control', 'required']) }}
                </div>
                
                <!-- Password_confirmation Form Input -->
                <div class="form-group">
                    {{ Form::label('password_confirmation', 'Password Confirmation:') }}
                    {{ Form::password('password_confirmation', ['class' => 'form-control', 'required']) }}
                </div>

                <!-- Sign In Input -->
                <div class="form-group pull-right">
                    {{ Form::submit('Sign In', ['class' => 'btn btn-primary']) }}
                </div>
            {{ Form::close() }}
        </div>
        <div class="panel-footer">
            <div class="form-group pull-right">
                New to Larabook? {{ link_to_route('register_path', 'Sign up') }}
            </div>
            <div class="clearfix"></div>
        </div>
    </div>
</div>
@stop