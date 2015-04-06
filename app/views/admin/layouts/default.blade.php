<!DOCTYPE html>
<html lang="en">
    <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="shortcut icon" href="images/favicon.png" type="image/png">
    @yield('token')
    <title>Larabook | Admin Panel</title>

    <!-- Bootstrap Core CSS -->
    <link href="{{ Theme::asset('css/backend.min.css') }}" rel="stylesheet">
    @yield('stylesheet')
    <!-- HTML5 shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!--[if lt IE 9]>
    <script src="js/html5shiv.js"></script>
    <script src="js/respond.min.js"></script>
    <![endif]-->
    </head>
    <body>
    <!-- Preloader -->
    <div id="preloader">
        <div id="status">
            <i class="fa fa-spinner fa-spin"></i>
        </div>
    </div>
    <section>
    <div class="leftpanel">
        <div class="logopanel">
            <h1><span>[</span> LARABOOK <span>]</span></h1>
        </div>
        <!-- logopanel -->
        <div class="leftpanelinner">
            <!-- This is only visible to small devices -->
            <div class="visible-xs hidden-sm hidden-md hidden-lg">
                <div class="media userlogged">
                    <img alt="" src="{{ Theme::asset('img/photos/loggeduser.png') }}" class="media-object">
                    <div class="media-body">
                        <h4>John Doe</h4>
                        <span>"Life is so..."</span>
                    </div>
                </div>
                <h5 class="sidebartitle actitle">Account</h5>
                <ul class="nav nav-pills nav-stacked nav-bracket mb30">
                    <li><a href="profile.html"><i class="fa fa-user"></i><span>Profile</span></a></li>
                    <li><a href=""><i class="fa fa-cog"></i><span>Account Settings</span></a></li>
                    <li><a href=""><i class="fa fa-question-circle"></i><span>Help</span></a></li>
                    <li><a href="signout.html"><i class="fa fa-sign-out"></i><span>Sign Out</span></a></li>
                </ul>
            </div>
            <h5 class="sidebartitle">Navigation</h5>
            <ul class="nav nav-pills nav-stacked nav-bracket">
                <li>
                    <a href="{{ route('admin.dashboard') }}"><i class="fa fa-home"></i><span>Dashboard</span></a>
                </li>
                <li>
                    <a href="{{ route('admin.users.index') }}"><i class="fa fa-user"></i><span>Users</span></a>
                </li>
                <li>
                    <a href="{{ route('admin.groups.index') }}"><i class="fa fa-users"></i><span>Groups</span></a>
                </li>
                <li>
                    <a href="{{ route('admin.locations.index') }}"><i class="fa fa-map-marker"></i><span>Locations</span></a>
                </li>
                <li>
                    <a href="{{ route('admin.languages.index') }}"><i class="fa fa-language"></i><span>Language</span></a>
                </li>
                <li>
                    <a href="{{ route('admin.pages.index') }}"><i class="fa fa-file-text-o"></i><span>Pages</span></a>
                </li>
                <li>
                    <a href="#"><i class="fa fa-map-marker"></i> Ads</a>
                </li>
                <li>
                    <a href="#"><i class="fa fa-map-marker"></i> Settings</a>
                </li>
            </ul>
            <!-- infosummary -->
        </div>
        <!-- leftpanelinner -->
    </div>
    <!-- leftpanel -->
    <div class="mainpanel">
        <div class="headerbar">
            <a class="menutoggle"><i class="fa fa-bars"></i></a>
            <form class="searchform" action="index.html" method="post">
                <input type="text" class="form-control" name="keyword" placeholder="Search here..."/>
            </form>
            <div class="header-right">
                <ul class="headermenu">
                    <li>
                    <div class="btn-group">
                        <button class="btn btn-default dropdown-toggle tp-icon" data-toggle="dropdown">
                        <i class="glyphicon glyphicon-user"></i>
                        <span class="badge">2</span>
                        </button>
                        <div class="dropdown-menu dropdown-menu-head pull-right">
                            <h5 class="title">2 Newly Registered Users</h5>
                            <ul class="dropdown-list user-list">
                                <li class="new">
                                <div class="thumb">
                                    <a href=""><img src="images/photos/user1.png" alt=""/></a>
                                </div>
                                <div class="desc">
                                    <h5><a href="">Draniem Daamul (@draniem)</a><span class="badge badge-success">new</span></h5>
                                </div>
                                </li>
                                <li class="new">
                                <div class="thumb">
                                    <a href=""><img src="images/photos/user2.png" alt=""/></a>
                                </div>
                                <div class="desc">
                                    <h5><a href="">Zaham Sindilmaca (@zaham)</a><span class="badge badge-success">new</span></h5>
                                </div>
                                </li>
                                <li>
                                <div class="thumb">
                                    <a href=""><img src="images/photos/user3.png" alt=""/></a>
                                </div>
                                <div class="desc">
                                    <h5><a href="">Weno Carasbong (@wenocar)</a></h5>
                                </div>
                                </li>
                                <li>
                                <div class="thumb">
                                    <a href=""><img src="images/photos/user4.png" alt=""/></a>
                                </div>
                                <div class="desc">
                                    <h5><a href="">Nusja Nawancali (@nusja)</a></h5>
                                </div>
                                </li>
                                <li>
                                <div class="thumb">
                                    <a href=""><img src="images/photos/user5.png" alt=""/></a>
                                </div>
                                <div class="desc">
                                    <h5><a href="">Lane Kitmari (@lane_kitmare)</a></h5>
                                </div>
                                </li>
                                <li class="new"><a href="">See All Users</a></li>
                            </ul>
                        </div>
                    </div>
                    </li>
                    <li>
                    <div class="btn-group">
                        <button class="btn btn-default dropdown-toggle tp-icon" data-toggle="dropdown">
                        <i class="glyphicon glyphicon-envelope"></i>
                        <span class="badge">1</span>
                        </button>
                        <div class="dropdown-menu dropdown-menu-head pull-right">
                            <h5 class="title">You Have 1 New Message</h5>
                            <ul class="dropdown-list gen-list">
                                <li class="new">
                                <a href="">
                                <span class="thumb"><img src="images/photos/user1.png" alt=""/></span>
                                <span class="desc">
                                <span class="name">Draniem Daamul <span class="badge badge-success">new</span></span>
                                <span class="msg">Lorem ipsum dolor sit amet...</span>
                                </span>
                                </a>
                                </li>
                                <li>
                                <a href="">
                                <span class="thumb"><img src="images/photos/user2.png" alt=""/></span>
                                <span class="desc">
                                <span class="name">Nusja Nawancali</span>
                                <span class="msg">Lorem ipsum dolor sit amet...</span>
                                </span>
                                </a>
                                </li>
                                <li>
                                <a href="">
                                <span class="thumb"><img src="images/photos/user3.png" alt=""/></span>
                                <span class="desc">
                                <span class="name">Weno Carasbong</span>
                                <span class="msg">Lorem ipsum dolor sit amet...</span>
                                </span>
                                </a>
                                </li>
                                <li>
                                <a href="">
                                <span class="thumb"><img src="images/photos/user4.png" alt=""/></span>
                                <span class="desc">
                                <span class="name">Zaham Sindilmaca</span>
                                <span class="msg">Lorem ipsum dolor sit amet...</span>
                                </span>
                                </a>
                                </li>
                                <li>
                                <a href="">
                                <span class="thumb"><img src="images/photos/user5.png" alt=""/></span>
                                <span class="desc">
                                <span class="name">Veno Leongal</span>
                                <span class="msg">Lorem ipsum dolor sit amet...</span>
                                </span>
                                </a>
                                </li>
                                <li class="new"><a href="">Read All Messages</a></li>
                            </ul>
                        </div>
                    </div>
                    </li>
                    <li>
                    <div class="btn-group">
                        <button class="btn btn-default dropdown-toggle tp-icon" data-toggle="dropdown">
                        <i class="glyphicon glyphicon-globe"></i>
                        <span class="badge">5</span>
                        </button>
                        <div class="dropdown-menu dropdown-menu-head pull-right">
                            <h5 class="title">You Have 5 New Notifications</h5>
                            <ul class="dropdown-list gen-list">
                                <li class="new">
                                <a href="">
                                <span class="thumb"><img src="images/photos/user4.png" alt=""/></span>
                                <span class="desc">
                                <span class="name">Zaham Sindilmaca <span class="badge badge-success">new</span></span>
                                <span class="msg">is now following you</span>
                                </span>
                                </a>
                                </li>
                                <li class="new">
                                <a href="">
                                <span class="thumb"><img src="images/photos/user5.png" alt=""/></span>
                                <span class="desc">
                                <span class="name">Weno Carasbong <span class="badge badge-success">new</span></span>
                                <span class="msg">is now following you</span>
                                </span>
                                </a>
                                </li>
                                <li class="new">
                                <a href="">
                                <span class="thumb"><img src="images/photos/user3.png" alt=""/></span>
                                <span class="desc">
                                <span class="name">Veno Leongal <span class="badge badge-success">new</span></span>
                                <span class="msg">likes your recent status</span>
                                </span>
                                </a>
                                </li>
                                <li class="new">
                                <a href="">
                                <span class="thumb"><img src="images/photos/user3.png" alt=""/></span>
                                <span class="desc">
                                <span class="name">Nusja Nawancali <span class="badge badge-success">new</span></span>
                                <span class="msg">downloaded your work</span>
                                </span>
                                </a>
                                </li>
                                <li class="new">
                                <a href="">
                                <span class="thumb"><img src="images/photos/user3.png" alt=""/></span>
                                <span class="desc">
                                <span class="name">Nusja Nawancali <span class="badge badge-success">new</span></span>
                                <span class="msg">send you 2 messages</span>
                                </span>
                                </a>
                                </li>
                                <li class="new"><a href="">See All Notifications</a></li>
                            </ul>
                        </div>
                    </div>
                    </li>
                    @if(isset($currentUser) && $currentUser)
                    <li>
                        <div class="btn-group">
                            <button type="button" class="btn btn-default dropdown-toggle" data-toggle="dropdown">
                            <img src="{{ Theme::asset('img/photos/loggeduser.png') }}" alt="{{ e($currentUser->username) }}"/>
                            {{ e($currentUser->username) }} 
                            <span class="caret"></span>
                            </button>
                            <ul class="dropdown-menu dropdown-menu-usermenu pull-right">
                                <li><a href="{{ route('profile_path', e($currentUser->username)) }}"><i class="glyphicon glyphicon-user"></i> My Profile</a></li>
                                <li><a href="{{ route('home') }}"><i class="glyphicon glyphicon-question-sign"></i> Back to Frontend</a></li>
                                <li><a href="{{ route('logout_path') }}"><i class="glyphicon glyphicon-log-out"></i> Log Out</a></li>
                            </ul>
                        </div>
                    </li>
                    @endif
                    <li>
                    <button id="chatview" class="btn btn-default tp-icon chat-icon">
                    <i class="glyphicon glyphicon-comment"></i>
                    </button>
                    </li>
                </ul>
            </div>
            <!-- header-right -->
        </div>
        <!-- headerbar -->
        @include('admin/layouts/partials/page_header')
        <div class="contentpanel">
            <!-- content goes here... -->
            @yield('content')
        </div>
    </div>
    <!-- mainpanel -->
    @include('admin/layouts/partials/right_panel')
    <!-- rightpanel -->
    </section>

    <!-- script -->
    <script src="{{ Theme::asset('js/backend.min.js') }}"></script>
    @yield('script')
    </body>
</html>