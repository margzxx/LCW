<!DOCTYPE html>
<html>
<head>
	<title></title>
</head>
<body>

	<h3>Welcome to Connected Women</h3>

	Hi <b>{{ $name }}</b>,
	<br>
	Please click the link below to reset your password:<br><br>

	<a href="{{ url('http://phplaravel-135925-393147.cloudwaysapps.com/reset-password/'.$user_id) }}">http://phplaravel-135925-393147.cloudwaysapps.com/reset-password</a>

	<br><br>
	If you have any problems, please contact us at cwjobs@jobs.connectedwomen.co
	<br>
	Thanks,
	<br>
	Connected Women - Virtual Assistants For Entrepreneurs

</body>
</html>