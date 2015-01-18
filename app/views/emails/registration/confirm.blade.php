<!DOCTYPE html>
<html>
<head>
	<title>Social Network</title>
	<!-- Latest compiled and minified CSS -->
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.1/css/bootstrap.min.css">

	<!-- Optional theme -->
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.1/css/bootstrap-theme.min.css">

	<!-- Latest compiled and minified JavaScript -->
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.1/js/bootstrap.min.js"></script>
</head>
<body>
	<div class="container">
		<div class="row">
			<div class="col-sm-12">
				<h1>Welcome To Social Network</h1>
				{{-- // TODO: translation --}}
				<a class="btn btn-primary" href="{{ route('activation_path', $activation_code) }}">Activation</a>
			</div>
		</div>
	</div>
</body>
</html>