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
    <div class="col-xs-12 col-sm-12 col-md-4 col-lg-4">
        <h4>Login With</h4>
        <div class="text-left">
            <a href="{{ route('login.with.facebook') }}" class="btn btn-primary btn-block text-left"><i class="fa fa-facebook"></i> Facebook</a>
            <a href="{{ route('login.with.google') }}" class="btn btn-danger btn-block text-left"><i class="fa fa-google"></i> Google</a>
            <a href="{{ route('login.with.twitter') }}" class="btn btn-info btn-block text-left" ><i class="fa fa-twitter"></i> Twitter</a>
        </div>
    </div>
    <div class="col-xs-12 col-sm-12 col-md-4 col-md-offset-4 col-lg-4 col-lg-offset-4">
        <div class="panel panel-default">
            <div class="panel-heading">
                <h4>Sign In!</h4>
            </div>
            <div class="panel-body">
                {{ Form::open(['route' => 'login_path']) }}
                    <!-- Email Form Input -->
                    <div class="form-group">
                        {{ Form::label('email', 'Email:') }}
                        {{ Form::email('email', null, ['class' => 'form-control', 'required' => 'required']) }}
                    </div>

                    <!-- Password Form Input -->
                    <div class="form-group">
                        {{ Form::label('password', 'Password:') }}
                        {{ link_to('password/remind', 'Forgotten Password?', ['class' => 'pull-right']) }}
                        {{ Form::password('password', ['class' => 'form-control', 'required' => 'required']) }}
                    </div>

                    <div class="form-group pull-left">
                        <label class="checkbox-inline">
                            {{ Form::checkbox('remember_me', '1', false) }} Remember me
                        </label>
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
</div>
@stop