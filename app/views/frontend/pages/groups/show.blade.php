@extends('frontend.layouts.default')

@section('token')
    <meta name="csrf-token" content="{{ csrf_token() }}" />
    <meta name="csrf-param" content="_token" />
@stop

@section('content')
    <div class="row">
        <div class="col-md-4">
            <div class="media">

                <div class="media-body">
                    <h1 class="media-heading">{{ $group->name }}</h1>
                    @if ($signedIn)
                    <div class="col-md-12" style="padding:0px;">
                        @include ('frontend.pages.groups.partials.join-form')
                    </div>
                    @endif
                    @foreach ($group->users as $user)
                        @include ('frontend.pages.users.partials.avatar', ['size' => 'x-small', 'user' => $user])
                    @endforeach
                </div>
            </div>
        </div>

    @if ($signedIn)
        <div class="col-md-6">
                @if ($currentUser->inGroup($group->id))
                    @include ('frontend.pages.groups.partials.publish-status-form')
                @endif
                @include ('frontend.pages.groups.partials.statuses', ['statuses' => $group->statuses])
        </div>
    @endif
    </div>
@stop