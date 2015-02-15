<nav class="navbar navbar-default navbar-fixed-top navbar-inverse" role="navigation">
	<div class="container">
		<!-- Brand and toggle get grouped for better mobile display -->
		<div class="navbar-header">
			<button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-ex1-collapse">
				<span class="sr-only">Toggle navigation</span>
				<span class="icon-bar"></span>
				<span class="icon-bar"></span>
				<span class="icon-bar"></span>
			</button>
			<a class="navbar-brand" href="{{ Auth::check() ? route('statuses_path') : route('home') }}">Larabook</a>
		</div>
		<!-- Collect the nav links, forms, and other content for toggling -->
		<div class="collapse navbar-collapse navbar-ex1-collapse">
			@if(Auth::check())
			<ul class="nav navbar-nav">
				<li>{{ link_to_route('users_path', 'Browse Users') }}</li>
			</ul>
			@endif
			<ul class="nav navbar-nav navbar-right">
				@if(isset($currentUser) && $currentUser)
					<li class="dropdown">
						<a href="#" class="dropdown-toggle" data-toggle="dropdown">
							<img class="nav-gravatar" src="{{ e($currentUser->present()->gravatar) }}" alt="{{ e($currentUser->username) }}">
							{{ e($currentUser->username) }} 
							<b class="caret"></b>
						</a>
						<ul class="dropdown-menu">
							<li>{{ link_to_route('profile_path', 'Your Profile', e($currentUser->username)) }}</li>
							@if($currentUser->hasRole('Admin'))
							<li class="divider"></li>
							<li>{{ link_to_route('groups.create', 'Create Group') }}</li>
							<li>{{ link_to_route('groups.index', 'Manage Groups') }}</li>
							<li class="divider"></li>
							<li>{{ link_to_route('manage.roles.create', 'Create Role') }}</li>
							<li>{{ link_to_route('manage.roles.index', 'Manage Role') }}</li>
							<li class="divider"></li>
							<li>{{ link_to_route('manage.users.create', 'Add User') }}</li>
							<li>{{ link_to_route('manage.users.index', 'Manage Users') }}</li>
							<li class="divider"></li>
							<li>{{ link_to_route('manage.locations.index', 'Locations') }}</li>
							@endif
							<li class="divider"></li>
							<li>{{ link_to_route('logout_path', 'Log out') }}</li>
						</ul>
					</li>
				@else
					<li>{{ link_to_route('register_path', 'Register') }}</li>
					<li>{{ link_to_route('login_path', 'Login') }}</li>
				@endif
			</ul>
		</div><!-- /.navbar-collapse -->
	</div>
</nav>