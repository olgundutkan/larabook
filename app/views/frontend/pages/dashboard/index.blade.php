@extends('frontend.layouts.default')

@section('token')
    <meta name="csrf-token" content="{{ csrf_token() }}" />
    <meta name="csrf-param" content="_token" />
@stop

@section('content')
<style type="text/css">
    .right-to-left { margin-top: 30px; }

    .right-to-left li { float: right; }
</style>
<div class="row">
    <div class="col-xs-4 col-sm-4 col-md-3 col-lg-3">
        <div class="panel panel-default">
            <div class="panel-heading">
                Groups!
            </div>
            <div class="panel-body">
                <div class="table-responsive">
                    <table class="table table-bordered">
                        <thead>
                            <tr>
                                <th>Name</th>
                                <th class="text-center"></th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse($groups as $group)
                                <tr>
                                    <td>{{ link_to_route('groups.show', e($group->name), [e($group->slug)]) }} ( {{ $group->users->count() }} )</td>
                                    <td>
                                        @if($currentUser->inGroup($group->id))
                                            <a href="{{ route('quit_the_group_path', $group->id) }}" data-method="post" data-confirm=""><i class="fa fa-minus-square-o"></i> Quit</a>
                                        @else
                                            <a href="{{ route('join_the_group_path', $group->id) }}" data-method="post" data-confirm=""><i class="fa fa-plus-square-o"></i> Join</a>
                                        @endif
                                        @if($currentUser->isOwner($group->id))
                                            <a href="{{ route('groups.edit', $group->id) }}"><i class="fa fa-pencil"></i> Edit</a>
                                            <a href="{{ route('groups.destroy', $group->id) }}" data-method="delete" data-confirm="Are you sure ?"><i class="fa fa-trash"></i> Delete</a>
                                        @endif
                                    </td>
                                </tr>
                            @empty
                                <tr>
                                    <td class="text-center" colspan="4">No group found</td>
                                </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
    <div class="col-xs-8 col-sm-8 col-md-6 col-lg-6">
        @if(isset($currentUser) && $currentUser)
            @if($currentUser->groups->count())
                <div class="panel-group" id="accordion" role="tablist" aria-multiselectable="true">
                    @foreach($currentUser->groups as $group)
                    <div class="panel panel-default">
                        <div class="panel-heading" role="tab" id="heading-{{ $group->id }}">
                            <h4 class="panel-title">
                            <a data-toggle="collapse" data-parent="#accordion" href="#collapse-{{ $group->id }}" aria-expanded="true" aria-controls="collapse-{{ $group->id }}">
                            {{ e($group->name) }} </a>
                            </h4>
                        </div>
                        <div id="collapse-{{ $group->id }}" class="panel-collapse collapse in" role="tabpanel" aria-labelledby="heading-{{ $group->id }}">
                            <div class="panel-body status-body">
                                @if ($currentUser->inGroup($group->id))
                                    @include ('groups.partials.publish-status-form')
                                @endif
                            </div>
                            @include ('groups.partials.statuses', ['statuses' => $group->statuses])
                        </div>
                    </div>
                    @endforeach
                </div>
            @else
                <p>No group found</p>
            @endif
        @endif
    </div>
    <div class="hidden-xs hidden-sm col-md-3 col-lg-3">
        <div class="panel panel-default">
            @if(isset($currentUser) && $currentUser)
            <div class="panel-body">
                <div class="col-md-12 text-center">
                    <a href="{{ route('profile_path', e($currentUser->username), $currentUser->username) }}">
                        <img src="{{ $currentUser->present()->profilePicture('medium') }}" class="img-responsive" alt="{{ $currentUser->username }}" style="margin:0 auto;">
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