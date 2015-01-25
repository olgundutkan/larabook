<article class="panel subject-panel">
	@if ($subject->user->is($currentUser))
    <div class="dropdown pull-right">
        <span class="dropdown-toggle" type="button" data-toggle="dropdown">
            <span class="glyphicon glyphicon-chevron-down"></span>
        </span>
        <ul class="dropdown-menu" role="menu">
            <li role="presentation"><a role="menuitem" tabindex="-1" href="#">Edit</a></li>
            <li role="presentation" class="divider"></li>
            <li role="presentation"><a role="menuitem" tabindex="-1" href="#">Delete</a></li>
        </ul>
    </div>
    @endif
    <div class="panel-heading">
		<div class="pull-left">
			@include ('users.partials.avatar', ['user' => $subject->user, 'class' => 'subject-panel-object'])
		</div>
        <h4>{{ link_to_route('profile_path', e($subject->user->username), e($subject->user->username)) }}</h4>
        <h5><span>{{ e($subject->present()->timeSincePublished()) }}</span> </h5>
    </div>
    <div class="panel-body">
        <p>{{ e($subject->title) }}</p>
    </div>
    @unless ($subject->user->is($currentUser))
    <div class="panel-footer" style="overflow:hidden;">
        <button type="button" class="btn btn-default pull-right">Follow</button>
    </div>
    @endif
</article>