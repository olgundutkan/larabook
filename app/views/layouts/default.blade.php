<!DOCTYPE html>
<html>
<head>
	<title>Larabook</title>
	<!-- Latest compiled and minified CSS -->
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.2.0/css/bootstrap.min.css">

	<link rel="stylesheet" type="text/css" href="{{ asset('css/main.css') }}">
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
<script type="text/javascript">
	$('#flash-overlay-modal').modal();
</script>
</body>
</html>