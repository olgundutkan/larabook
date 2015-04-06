@extends('admin.layouts.default')

@section('token')
    <meta name="csrf-token" content="{{ csrf_token() }}" />
    <meta name="csrf-param" content="_token" />
@stop

@section('stylesheet')
@stop

@section('content')
<div class="row">
    <div class="col-sm-3">
        <h3>{{ e($group->name) }}</h3>
        <p>Analistic Data</p>
    </div>
    <!-- col-sm-3 -->
    <div class="col-sm-9">
        <div class="profile-header">
            <h2 class="profile-name">{{ e($group->name) }}</h2>
            <div class="profile-location">
                <i class="fa fa-map-marker"></i> San Francisco, California, USA
            </div>
            <div class="profile-position">
                <i class="fa fa-briefcase"></i> Software Engineer at <a href="">SomeCompany, Inc.</a>
            </div>
            <div class="mb20">
            </div>
            <button class="btn btn-success mr5"><i class="fa fa-user"></i> Follow</button>
            <button class="btn btn-white"><i class="fa fa-envelope-o"></i> Message</button>
        </div>
        <div class="col-sm-6" style="padding-left: 0">
            {{ Form::open(['route' => ['group_statuses_path', $group->id], 'id' => 'information']) }}
                <div class="panel panel-dark panel-alt timeline-post">
                    <div class="panel-body">
                        {{ Form::textarea('body', null, ['class' => 'form-control', 'rows' => 3, 'placeholder' => "Write something..."]) }}
                    </div><!-- panel-body -->
                    <div class="panel-footer">
                        <div class="timeline-btns pull-left">
                            <a href="" class="tooltips" data-toggle="tooltip" title="Add Photo"><i class="glyphicon glyphicon-picture"></i></a>
                            <a href="" class="tooltips" data-toggle="tooltip" title="Add Video"><i class="glyphicon glyphicon-facetime-video"></i></a>
                            <a href="" class="tooltips" data-toggle="tooltip" title="Check In"><i class="glyphicon glyphicon-map-marker"></i></a>
                            <a href="" class="tooltips" data-toggle="tooltip" title="Tag User"><i class="glyphicon glyphicon-user"></i></a>
                        </div><!--timeline-btns -->
                        {{ Form::submit('Inform & Share', ['id' =>'share-and-inform', 'class' => 'btn btn-default btn-xs pull-right', 'style' => 'margin-left:5px;']) }}
                        {{ Form::submit('Inform', ['id' =>'share-and-inform', 'class' => 'btn btn-primary btn-xs pull-right', 'style' => 'margin-right:5px;']) }}
                    </div><!-- panel-footer -->
                </div>
            {{ Form::close() }}
            @forelse($group->statuses as $status)
                <div class="panel panel-default panel-timeline">
                    <div class="panel-heading">                        
                        <div class="media">
                            <a href="#" class="pull-left">
                                <img alt="{{ e($status->user->username) }}" src="{{ Theme::asset('img/photos/user1.png') }}" class="media-object">
                            </a>
                            <div class="media-body">
                                <h4 class="text-primary"><a href="{{ route('admin.users.show', $status->user->id) }}">{{ $status->user->username }}</a> <small>{{ $status->user->country->name }}</small></h4>
                                <small class="text-muted">{{ e($status->present()->timeSincePublished()) }}</small>
                            </div>
                        </div><!-- media -->
                        
                    </div><!-- panel-heading -->
                    <div class="panel-body">

                        {{ e($status->body) }}

                        <div class="timeline-btns">
                            <div class="pull-left">
                                <a href="" class="tooltips" data-toggle="tooltip" title="Like"><i class="glyphicon glyphicon-heart"></i></a>
                                <a href="" class="tooltips" data-toggle="tooltip" title="Add Comment"><i class="glyphicon glyphicon-comment"></i></a>
                                <a href="" class="tooltips" data-toggle="tooltip" title="Share"><i class="glyphicon glyphicon-share"></i></a>
                            </div>
                            <div class="pull-right">
                                <small class="text-muted">2 people like this</small>
                            </div>
                        </div>
                    </div><!-- panel-body -->
                    <div class="panel-footer">
                        <div class="media">
                            <a href="#" class="pull-left">
                                <img alt="" src="{{ Theme::asset('img/photos/user1.png') }}" class="media-object">
                            </a>
                            
                            @if ($signedIn)
                                {{ Form::open(['route' => ['comment_path', $status->id], 'class' => 'comments__create-form']) }}
                                    {{ Form::hidden('status_id', $status->id) }}
                                    <div class="media-body">
                                        {{ Form::textarea('body', null, ['class' => 'form-control', 'rows' => 1, 'placeholder' => 'Write a comment']) }}
                                    </div>
                                {{ Form::close() }}
                            @endif

                            @unless ($status->comments->isEmpty())
                                <ul class="media-list comment-list">
                                @foreach ($status->comments as $comment)
                                    <li class="media">
                                        <a href="{{ route('admin.users.show', $comment->owner->id) }}" class="pull-left">
                                            <img alt="{{ e($comment->owner->username) }}" src="{{ Theme::asset('img/photos/user1.png') }}" class="media-object thumbnail">
                                        </a>
                                        <div class="media-body">
                                            <a href="{{ route('admin.users.show', $comment->owner->id) }}"><h4>{{ e($comment->owner->username) }}</h4></a>
                                            <small class="text-muted">{{ e($comment->created_at) }}</small>
                                            <p>
                                                {{ e($comment->body) }}
                                            </p>
                                        </div>
                                    </li>
                                @endforeach
                                </ul>
                            @endunless
                        </div><!-- media -->
                    </div>
                </div><!-- panel -->
            @empty
                <p>This user hasn't yet posted a inform.</p>
            @endforelse
        </div>
        <div class="col-sm-6" style="padding-right: 0px;">
            <div class="panel panel-default">
                <div class="panel-heading">
                    <h4 class="panel-title">{{ $group->name }} Users</h4>
                </div>
                <div class="panel-body">
                    @if(!$group->users->count())
                        <p>Not Found Users!</p>
                    @else
                        <div class="table-responsive">
                            <table class="table table-bordered">
                                <thead>
                                    <th>Username</th>
                                    <th>Actions</th>
                                </thead>
                                <tbody>
                                    @foreach ($group->users as $user)
                                        <tr>
                                            <td>{{ link_to_route('profile_path', e($user->username), $user->username) }}</td>
                                            <td>
                                                <a href="{{ route('admin.users.edit', e($user->username)) }}"><i class="fa fa-pencil"></i></a>
                                                <a href="{{ route('admin.users.destroy', $user->id) }}" data-method="delete" data-confirm="Are you sure ?"><i class="fa fa-trash-o"></i></a>
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    @endif
                </div>
                <div class="panel-footer">
                </div>
            </div>
        </div>
    </div>
    <!-- col-sm-9 -->
</div>
<!-- row -->
@stop

@section('script')
<script type="text/javascript">
    $('.comments__create-form').on('keydown', function(e) {
            if (e.keyCode == 13) {
                e.preventDefault();
                $(this).submit();
            }
        });
</script>
@stop