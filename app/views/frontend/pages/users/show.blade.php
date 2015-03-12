@extends('frontend.layouts.default')

@section('content')
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

                    @if($currentUser->is($user))
                        @include('frontend.pages.users.partials.profile-owner-user-show')
                    @else
                        @include('frontend.pages.users.partials.profile-other-user-show')
                    @endif
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
                    <div class="col-md-12">
                        @unless ($user->is($currentUser))
                            @include ('frontend.pages.users.partials.follow-form')
                        @endif
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