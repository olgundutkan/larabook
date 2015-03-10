<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">
    @yield('token')
    <title>Larabook Admin Panel</title>

    <!-- Bootstrap Core CSS -->
    <link href="{{ Theme::asset('css/backend.min.css') }}" rel="stylesheet">

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
        <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->
    @yield('stylesheet')
</head>

<body>

    <div id="wrapper">

        <!-- Navigation -->
        <nav class="navbar navbar-default navbar-static-top" role="navigation" style="margin-bottom: 0">
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand" href="{{ route('admin.dashboard') }}">Larabook Admin Panel</a>
            </div>
            <!-- /.navbar-header -->

            <ul class="nav navbar-top-links navbar-right">
                <!-- /.dropdown -->
                @if(isset($currentUser) && $currentUser)
                    <li class="dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                            <img class="nav-gravatar" src="{{ e($currentUser->present()->profilePicture('small')) }}" alt="{{ e($currentUser->username) }}">
                            {{ e($currentUser->username) }} 
                            <b class="caret"></b>
                        </a>
                        <ul class="dropdown-menu">
                            <li>{{ link_to_route('profile_path', 'Your Profile', e($currentUser->username)) }}</li>
                            @if($currentUser->hasRole('Admin'))
                            <li class="divider"></li>
                            <li>{{ link_to_route('home', 'Back to Frontend') }}</li>
                            @endif
                            <li class="divider"></li>
                            <li>{{ link_to_route('logout_path', 'Log out') }}</li>
                        </ul>
                    </li>
                @endif
                <!-- /.dropdown -->
            </ul>
            <!-- /.navbar-top-links -->

            <div class="navbar-default sidebar" role="navigation">
                <div class="sidebar-nav navbar-collapse">
                    <ul class="nav" id="side-menu">
                        <li class="sidebar-search">
                            <div class="input-group custom-search-form">
                                <input type="text" class="form-control" placeholder="Search...">
                                <span class="input-group-btn">
                                    <button class="btn btn-default" type="button">
                                        <i class="fa fa-search"></i>
                                    </button>
                                </span>
                            </div>
                            <!-- /input-group -->
                        </li>
                        <li>
                            <a href="{{ route('admin.dashboard') }}"><i class="fa fa-dashboard fa-fw"></i> Dashboard</a>
                        </li>
                        <li>
                            <a href="{{ route('admin.users.index') }}"><i class="fa fa-users fa-fw"></i> Users</a>
                        </li>
                        <li>
                            <a href="{{ route('admin.groups.index') }}"><i class="fa fa-users fa-fw"></i> Groups</a>
                        </li>
                        <li>
                            <a href="{{ route('admin.locations.index') }}"><i class="fa fa-map-marker fa-fw"></i> Locations</a>
                        </li>
                        <li>
                            <a href="#"><i class="fa fa-map-marker fa-fw"></i> Language</a>
                        </li>
                        <li>
                            <a href="{{ route('admin.pages.index') }}"><i class="fa fa-map-marker fa-fw"></i> Pages</a>
                        </li>
                        <li>
                            <a href="#"><i class="fa fa-map-marker fa-fw"></i> Ads</a>
                        </li>
                        <li>
                            <a href="#"><i class="fa fa-map-marker fa-fw"></i> Settings</a>
                        </li>
                    </ul>
                </div>
                <!-- /.sidebar-collapse -->
            </div>
            <!-- /.navbar-static-side -->
        </nav>

        <!-- Page Content -->
        <div id="page-wrapper">
            <div class="container-fluid" style="padding-top:40px;">
                @yield('content')
            </div>
            <!-- /.container-fluid -->
        </div>
        <!-- /#page-wrapper -->

    </div>
    <!-- /#wrapper -->

    <!-- jQuery -->
    <script src="{{ Theme::asset('js/backend.min.js') }}"></script>
    @yield('script')

</body>

</html>