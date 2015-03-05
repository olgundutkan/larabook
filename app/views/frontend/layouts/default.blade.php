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
</script>
</body>
</html>