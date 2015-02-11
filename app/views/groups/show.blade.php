@extends('layouts.default')

@section('content')

    <div class="row">
        <div class="col-md-4">
            <div class="media">

                <div class="media-body">
                    <h1 class="media-heading">{{ $group->name }}</h1>

                    @foreach ($group->users as $user)
                        @include ('users.partials.avatar', ['size' => 25, 'user' => $user])
                    @endforeach
                </div>
            </div>
        </div>

        <div class="col-md-6">

            @if ($user->inGroup($group->id))
                @include ('groups.partials.publish-status-form')
            @endif

            @include ('groups.partials.statuses', ['statuses' => $group->statuses])
        </div>
    </div>

@stop