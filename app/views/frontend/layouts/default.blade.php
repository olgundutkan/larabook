<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    @yield('token')
	<title>Larabook</title>
	<!-- Latest compiled and minified CSS -->
	<link rel="stylesheet" type="text/css" href="{{ Theme::asset('css/main.min.css') }}">
	@yield('stylesheet')
</head>
<body>

@if(Session::has('incomplete_information'))
<div style="width:100%;margin-bottom: 15px;margin-top: -30px;position:relative;z-index:100;height:52px;">
    <div class="alert alert-danger" style="width:100%;margin-bottom:0px;border-radius:0px;text-align:center;position:fixed;">
        {{{Session::get('incomplete_information')}}}
        <a href="{{ route('profile_path.edit', $currentUser->username) }}" style="color:#a94442;text-decoration:underline;font-weight:bold;">Fix this</a>
        <a href="{{ url('close-alert') }}" class="close">×</button>
    </div>
</div>
@endif

@include('frontend/layouts/partials/nav')

<div class="container">
	@include('flash::message')

	@yield('content')
</div>

<!-- Latest compiled and minified JavaScript -->
<script src="{{ Theme::asset('js/main.min.js') }}"></script>
@yield('script')
<script type="text/javascript">
	$('#flash-overlay-modal').modal();

	$('.comments__create-form').on('keydown', function(e) {
            if (e.keyCode == 13) {
                e.preventDefault();
                $(this).submit();
            }
        });
		(function(d, s, id) {
			var js, fjs = d.getElementsByTagName(s)[0];
			if (d.getElementById(id)) return;
			js = d.createElement(s); js.id = id;
			js.src = "//connect.facebook.net/tr_TR/sdk.js#xfbml=1&version=v2.0";
			fjs.parentNode.insertBefore(js, fjs);
		}(document, 'script', 'facebook-jssdk'));
</script>
</body>
</html>