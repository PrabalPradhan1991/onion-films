<!DOCTYPE html>
<html>
<head>
	<title>You have received a query</title>
</head>
<body>
	<p>Name: {{ $parameters['name'] }}</p>
	<p>Email: {{ $parameters['email'] }}</p>
	<p>Phone: {{ $parameters['phone'] }}</p>
	<p>Message:</p>
	<p>
		{!! nl2br($parameters['message']) !!}
	</p>
</body>
</html>