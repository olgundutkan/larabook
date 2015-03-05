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
			<a class="navbar-brand" href="{{ route('home') }}">Larabook</a>
		</div>
		<!-- Collect the nav links, forms, and other content for toggling -->
		<div class="collapse navbar-collapse navbar-ex1-collapse">
			<div class="col-sm-6 col-md-6">
				<form class="navbar-form" role="search">
					<div class="input-group">
						<input type="text" class="form-control" placeholder="Search" name="q">
						<div class="input-group-btn">
							<button class="btn btn-default" type="submit"><i class="glyphicon glyphicon-search"></i></button>
						</div>
					</div>
				</form>
			</div>

			<ul class="nav navbar-nav navbar-right">
				@if(isset($currentUser) && $currentUser)
					<li>{{ link_to_route('home', 'Main Page') }}</li>
					<li>{{ link_to_route('profile_path', 'My Profile', e($currentUser->username)) }}</li>
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
							<li>{{ link_to_route('admin.dashboard', 'Admin Panel') }}</li>
							@endif
							<li class="divider"></li>
							<li>{{ link_to_route('logout_path', 'Log out') }}</li>
						</ul>
					</li>
				@else
					<li>{{ link_to('about-us', 'About Us') }}</li>
					<li>{{ link_to('terms-conditioins', 'Terms & Conditioins') }}</li>
					<li class="dropdown language">
						<a href="#" class="dropdown-toggle" data-toggle="dropdown">
							Language: <span id="language-concept"></span>
							<b class="caret"></b>
						</a>
						<ul class="dropdown-menu">
							<li role="presentation"><a data-original-title="British English" role="menuitem" href="#" data-lang-code="en-gb" >English UK</a></li>
							<li role="presentation"><a data-original-title="French" role="menuitem" href="#" data-lang-code="fr" >Français</a></li>
							<li role="presentation"><a data-original-title="Portuguese" role="menuitem" href="#" data-lang-code="pt" >Português</a></li>
							<li role="presentation"><a data-original-title="Türkçe" role="menuitem" href="#" data-lang-code="tr" >Türkçe</a></li>
						</ul>
					</li>
				@endif
			</ul>
		</div><!-- /.navbar-collapse -->
	</div>
</nav>
