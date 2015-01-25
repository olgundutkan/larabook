<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Larabook</title>
	<!-- Latest compiled and minified CSS -->
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.2.0/css/bootstrap.min.css">

	<link rel="stylesheet" type="text/css" href="{{ asset('css/main.css') }}">
	@yield('stylesheet')
</head>
<body>

@include('layouts/partials/nav')

<div class="container">
	@include('flash::message')

	@yield('content')
</div>

<script src="https://code.jquery.com/jquery.js"></script>
<!-- Latest compiled and minified JavaScript -->
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.2.0/js/bootstrap.min.js"></script>
<script src="{{ asset('js/jquery-ui.js') }}"></script>
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