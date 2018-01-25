<!DOCTYPE html>
<html>
<head>
	<title></title>
</head>
<body>

	<h3>Welcome to Connected Women</h3>

	Hi <b>{{ $name }}</b>,
	<br>
	{{ $description }}

	<br>

	Send an email to: {{ Auth::user()->email }}

	<br><br>
	If you have any problems, please contact us at cwjobs@jobs.connectedwomen.co
	<br>
	Thanks,
	<br>
	Connected Women - Virtual Assistants For Entrepreneurs

</body>
</html>