@extends('frontend.layouts.default')

@section('content')
    <style type="text/css">
        .right-to-left { margin-top: 30px; }

        .right-to-left li { float: right; }
    </style>
    <div class="row">
        <div class="col-xs-12 col-sm-12 col-md-9 col-lg-9">
            @if(isset($user) && $user)
            <div class="panel panel-default">
                <div class="panel-heading clearfix">
                    <div class="pull-left">
                        <h4>Profile</h4>
                    </div>
                    <div class="pull-right">
                        @if ($currentUser->is($user))
                            <a href="{{ route('profile_path.edit', $user->username) }}" class="btn btn-default">Edit</a>
                        @endif
                    </div>
                </div>
                <div class="panel-body">
                    <div class="form-group">
                        {{ Form::label('username', 'Username:', ['for' => 'username', 'class' => 'control-label']) }}
                        {{ e($user->username) }}
                    </div>

                    @unless(!$user->privacy->email)
                        <div class="form-group">
                            {{ Form::label('email', 'Email:', ['for' => 'email', 'class' => 'control-label']) }}
                            {{ e($user->email) }}
                        </div>
                    @endunless

                    @unless(!$user->privacy->title)
                    <div class="form-group">
                        {{ Form::label('title', 'Title:', ['for' => 'title', 'class' => 'control-label']) }}
                        {{ e(!$user->title) }}
                    </div>
                    @endunless

                    @unless(!$user->privacy->first_name)
                    <div class="form-group">
                        {{ Form::label('first_name', 'First Name:', ['for' => 'first_name', 'class' => 'control-label']) }}
                        {{ e(!$user->first_name) }}
                    </div>
                    @endunless

                    @unless(!$user->privacy->last_name)
                    <div class="form-group">
                        {{ Form::label('last_name', 'Last Name:', ['for' => 'last_name', 'class' => 'control-label']) }}
                        {{ e(!$user->last_name) }}
                    </div>
                    @endunless

                    @unless(!$user->privacy->gender)
                    <div class="form-group">
                        {{ Form::label('gender', 'Gender:', ['for' => 'gender', 'class' => 'control-label']) }}
                        {{ e(!$user->gender) }}
                    </div>
                    @endunless

                    @unless(!$user->privacy->dob)
                    <div class="form-group">
                        {{ Form::label('dob', 'Date of Birth:', ['for' => 'dob', 'class' => 'control-label']) }}
                        {{ e($user->present()->birthday) }}
                    </div>
                    @endunless

                    @unless(!$user->country_id)
                    <div class="form-group">
                        {{ Form::label('country', 'Country:', ['for' => 'country', 'class' => 'control-label']) }}
                        {{ e($user->country_id) }}
                    </div>
                    @endunless

                    @unless(!$user->state_id)
                    <div class="form-group">
                        {{ Form::label('state', 'State:', ['for' => 'state', 'class' => 'control-label']) }}
                        {{ e($user->state_id) }}
                    </div>
                    @endunless

                    @unless(!$user->city_id)
                    <div class="form-group">
                        {{ Form::label('city', 'City:', ['for' => 'city', 'class' => 'control-label']) }}
                        {{ e($user->city_id) }}
                    </div>
                    @endunless

                    @unless(empty($user->school_department))
                    <div class="form-group">
                        {{ Form::label('school_department', 'School / Department:', ['for' => 'school_department', 'class' => 'control-label']) }}
                        {{ e($user->school_department) }}
                    </div>
                    @endunless

                    @unless(!$user->is_commercial)
                    <div class="form-group">
                        {{ Form::label('is_commercial', 'Is Commercial:', ['for' => 'is_commercial', 'class' => 'control-label']) }}
                        {{ e($user->is_commercial) }}
                    </div>
                    @endunless

                    @unless(!$user->groups)
                    <div class="form-group">
                        {{ Form::label('groups', 'Choose Group:', ['for' => 'groups', 'class' => 'control-label']) }}
                        
                    </div>
                    @endunless

                    @unless(!$user->language_id)
                    <div class="form-group">
                        {{ Form::label('language', 'Language:', ['for' => 'language', 'class' => 'control-label']) }}
                        {{ e($user->language_id) }}
                    </div>
                    @endunless
                </div>
            </div>
            @endif
        </div>
        <div class="hidden-xs hidden-sm col-md-3 col-lg-3">
            <div class="panel panel-default">
                @if(isset($user) && $user)
                <div class="panel-body">
                    <div class="col-md-12 text-center">
                        <a href="{{ route('profile_path', e($user->username), $user->username) }}">
                            <img src="{{  $user->present()->profilePicture('medium') }}" class="img-responsive" alt="{{ $user->username }}" style="margin:0 auto;">
                        </a>
                    </div>
                    <h4 class="text-center">{{ link_to_route('profile_path', e($user->username), $user->username) }}</h4>
                    <div class="col-md-4 text-center">
                        {{ e($user->present()->followerCount) }}
                    </div>
                    <div class="col-md-4 text-center">
                        {{ e($user->present()->statusCount) }}
                    </div>
                    <div class="col-md-4 text-center">
                    </div>
                </div>
                @endif
            </div>
            <div class="panel panel-default">
                <div class="panel-body">
                    <ul class="list-group">
                        <li class="list-group-item">{{ link_to('about-us', 'About Us') }}</li>
                        <li class="list-group-item">{{ link_to('terms-conditioins', 'Terms & Conditioins') }}</li> 
                    </ul>
                </div>
            </div>
        </div>
    </div>
@stop