<!DOCTYPE html>
<html>
<head>
	<title>Larabook</title>
	<link rel="stylesheet" type="text/css" href="//maxcdn.bootstrapcdn.com/bootstrap/3.2.0/css/bootstrap.min.css">
	<link rel="stylesheet" type="text/css" href="{{ asset('css/main.css') }}">
</head>
<body>

@include('layouts/partials/nav')

<div class="container">
	@yield('content')
</div>

<script type="text/javascript" src="//maxcdn.bootstrapcdn.com/bootstrap/3.2.0/css/bootstrap.min.css"></script>
</body>
</html>