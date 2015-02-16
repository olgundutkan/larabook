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
				{{ link_to_route('activation_path', 'Activation', [$activation_code], ['class' => 'btn btn-primary']) }}
			</div>
		</div>
	</div>
</body>
</html>