@extends('layouts.default')

@section('content')
<style type="text/css">
    .right-to-left { margin-top: 30px; }

    .right-to-left li { float: right; }
</style>
<div class="row">
    <div class="col-xs-4 col-sm-4 col-md-3 col-lg-3">
        <div class="panel panel-default">
            <div class="panel-heading">
                <h4>Groups!</h4>
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
                                    <td>{{ link_to_route('groups.show', e($group->name), [e($group->slug)]) }}</td>
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
            @forelse($currentUser->groups as $group)
                    <div class="panel panel-default">
                        <div class="panel-heading">{{ e($group->name) }}</div>
                        <div class="panel-body status-body">
                            @if ($currentUser->inGroup($group->id))
                                @include ('groups.partials.publish-status-form')
                            @endif
                        </div>
                        @include ('groups.partials.statuses', ['statuses' => $group->statuses])
                    </div>
            @empty
                <p>No group found</p>
            @endforelse
        @endif
    </div>
    <div class="hidden-xs hidden-sm col-md-3 col-lg-3">
        <div class="panel panel-default">
            @if(isset($currentUser) && $currentUser)
            <div class="panel-body">
                <a href="{{ route('profile_path', e($currentUser->username), $currentUser->username) }}">
                    <img src="{{ $currentUser->profile_picture->url('medium') }}" class="img-responsive" alt="{{ $currentUser->username }}">
                </a>
                <h4 class="text-center">{{ link_to_route('profile_path', e($currentUser->username), $currentUser->username) }}</h4>
                <ul class="list-group">
                    <li class="list-group-item">{{ e($currentUser->present()->followerCount) }}</li>
                    <li class="list-group-item">{{ e($currentUser->present()->statusCount) }}</li> 
                </ul>
            </div>
            @endif
        </div>
    </div>
</div>
@stop