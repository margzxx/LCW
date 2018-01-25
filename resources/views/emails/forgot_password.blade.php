<!DOCTYPE html>
<html>
<head>
	<title></title>
</head>
<body>

	<h3>Welcome to Connected Women</h3>

	Hi <b>{{ $name }}</b>,
	<br>
	Thank you for signing up with Connected Women - Virtual Assistants For Entrepreneurs!<br>
	To activate your account , please click the link below to confirm your email address:<br><br>

	<a href="{{ url('http://phplaravel-135925-393147.cloudwaysapps.com/reset-password/'.$user_id) }}">http://phplaravel-135925-393147.cloudwaysapps.com/activate-account</a>

	<br><br>
	If you have any problems, please contact us at cwjobs@jobs.connectedwomen.co
	<br>
	Thanks,
	<br>
	Connected Women - Virtual Assistants For Entrepreneurs

</body>
</html>