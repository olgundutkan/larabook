<article class="media">
    <div class="pull-left">
        @include ('frontend.pages.users.partials.avatar', ['user' => $status->user, 'class' => 'status-media-object', 'size' => 'small'])
    </div>

    <div class="media-body">
        <h4 class="media-heading status-media-heading">{{ link_to_route('profile_path', $status->user->username ? e($status->user->username) : e($status->user->full_name), $status->user->username ? e($status->user->username) : $status->user->id) }}</h4>
        <p><small class="status-media-time">{{ e($status->present()->timeSincePublished()) }}</small></p>

        {{ e($status->body) }}
    </div>
</article>

@if ($signedIn)
    {{ Form::open(['route' => ['comment_path', $status->id], 'class' => 'comments__create-form']) }}
        {{ Form::hidden('status_id', $status->id) }}

        <div class="form-group">
            {{ Form::textarea('body', null, ['class' => 'form-control', 'rows' => 1]) }}
        </div>
    {{ Form::close() }}
@endif

@unless ($status->comments->isEmpty())
    <div class="comments-body">
        @foreach ($status->comments as $comment)
            @include ('frontend.pages.statuses.partials.comment')
        @endforeach
    </div>
@endunless
