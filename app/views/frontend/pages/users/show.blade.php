@extends('frontend.layouts.default')

@section('content')
    <style type="text/css">
        .right-to-left { margin-top: 30px; }

        .right-to-left li { float: right; }
    </style>
    <div class="row">
        <div class="col-xs-12 col-sm-12 col-md-9 col-lg-9">
            @if(isset($currentUser) && $currentUser)
            <div class="panel panel-default">
                <div class="panel-heading clearfix">
                    <div class="pull-left">
                        <h4>Profile</h4>
                    </div>
                    <div class="pull-right">
                        @if ($user->is($currentUser))
                            <a href="{{ route('profile_path.edit', $user->username) }}" class="btn btn-default">Edit</a>
                        @endif
                    </div>
                </div>
                <div class="panel-body">
                    <div class="form-group">
                        {{ Form::label('username', 'Username:', ['for' => 'username', 'class' => 'control-label']) }}
                        {{ e($currentUser->username) }}
                    </div>

                    <div class="form-group">
                        {{ Form::label('email', 'Email:', ['for' => 'email', 'class' => 'control-label']) }}
                        {{ e($currentUser->email) }}
                    </div>

                    <div class="form-group">
                        {{ Form::label('title', 'Title:', ['for' => 'title', 'class' => 'control-label']) }}
                        {{ e($currentUser->title) }}
                    </div>

                    <div class="form-group">
                        {{ Form::label('first_name', 'First Name:', ['for' => 'first_name', 'class' => 'control-label']) }}
                        {{ e($currentUser->first_name) }}
                    </div>

                    <div class="form-group">
                        {{ Form::label('last_name', 'Last Name:', ['for' => 'last_name', 'class' => 'control-label']) }}
                        {{ e($currentUser->last_name) }}
                    </div>

                    <div class="form-group">
                        {{ Form::label('gender', 'Gender:', ['for' => 'gender', 'class' => 'control-label']) }}
                        {{ e($currentUser->gender) }}
                    </div>

                    <div class="form-group">
                        {{ Form::label('dob', 'Date of Birth:', ['for' => 'dob', 'class' => 'control-label']) }}
                        {{ e($currentUser->present()->birthday) }}
                    </div>

                    <div class="form-group">
                        {{ Form::label('country', 'Country:', ['for' => 'country', 'class' => 'control-label']) }}
                        {{ e($currentUser->country_id) }}
                    </div>

                    <div class="form-group">
                        {{ Form::label('state', 'State:', ['for' => 'state', 'class' => 'control-label']) }}
                        {{ e($currentUser->state_id) }}
                    </div>

                    <div class="form-group">
                        {{ Form::label('city', 'City:', ['for' => 'city', 'class' => 'control-label']) }}
                        {{ e($currentUser->city_id) }}
                    </div>

                    <div class="form-group">
                        {{ Form::label('school_department', 'School / Department:', ['for' => 'school_department', 'class' => 'control-label']) }}
                        {{ e($currentUser->school_department) }}
                    </div>

                    <div class="form-group">
                        {{ Form::label('is_commercial', 'Is Commercial:', ['for' => 'is_commercial', 'class' => 'control-label']) }}
                        {{ e($currentUser->is_commercial) }}
                    </div>
                    
                    <div class="form-group">
                        {{ Form::label('groups', 'Choose Group:', ['for' => 'groups', 'class' => 'control-label']) }}
                        
                    </div>

                    <div class="form-group">
                        {{ Form::label('language', 'Language:', ['for' => 'language', 'class' => 'control-label']) }}
                        {{ e($currentUser->language_id) }}
                    </div>
                </div>
            </div>
            @endif
        </div>
        <div class="hidden-xs hidden-sm col-md-3 col-lg-3">
            <div class="panel panel-default">
                @if(isset($currentUser) && $currentUser)
                <div class="panel-body">
                    <div class="col-md-12 text-center">
                        <a href="{{ route('profile_path', e($currentUser->username), $currentUser->username) }}">
                            <img src="{{  $currentUser->present()->profilePicture('medium') }}" class="img-responsive" alt="{{ $currentUser->username }}" style="margin:0 auto;">
                        </a>
                    </div>
                    <h4 class="text-center">{{ link_to_route('profile_path', e($currentUser->username), $currentUser->username) }}</h4>
                    <div class="col-md-4 text-center">
                        {{ e($currentUser->present()->followerCount) }}
                    </div>
                    <div class="col-md-4 text-center">
                        {{ e($currentUser->present()->statusCount) }}
                    </div>
                    <div class="col-md-4 text-center">
                    </div>
                </div>
                @endif
            </div>
            <div class="panel panel-default">
                @if(isset($currentUser) && $currentUser)
                <div class="panel-body">
                    <ul class="list-group">
                        <li class="list-group-item">{{ link_to('about-us', 'About Us') }}</li>
                        <li class="list-group-item">{{ link_to('terms-conditioins', 'Terms & Conditioins') }}</li> 
                    </ul>
                </div>
                @endif
            </div>
        </div>
    </div>
@stop