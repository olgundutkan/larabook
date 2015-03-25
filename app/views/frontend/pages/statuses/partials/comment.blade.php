<article class="comments__comment media status-media">
    <div class="pull-left">
        @include ('frontend.pages.users.partials.avatar', ['user' => $comment->owner, 'class' => 'media-object', 'size' => 'x-small'])
    </div>

    <div class="media-body">
        <h4 class="media-heading">{{ link_to_route('profile_path', $comment->owner->username ? e($comment->owner->username) : e($comment->owner->full_name), $comment->owner->username ? e($comment->owner->username) : $comment->owner->id) }}</h4>

        {{ e($comment->body) }}
    </div>
</article>