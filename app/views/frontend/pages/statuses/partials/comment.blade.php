<article class="comments__comment media status-media">
    <div class="pull-left">
        @include ('frontend.pages.users.partials.avatar', ['user' => $comment->owner, 'class' => 'media-object'])
    </div>

    <div class="media-body">
        <h4 class="media-heading">{{ link_to_route('profile_path', e($comment->owner->username), e($currentUser->username)) }}</h4>

        {{ e($comment->body) }}
    </div>
</article>