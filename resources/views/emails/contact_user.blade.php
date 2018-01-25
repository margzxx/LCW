<!DOCTYPE html>
<html>
<head>
	<title></title>
</head>
<body>

	<h3>An entrepreneur wants to keep in touch with you</h3>

	From: <b>{{ Auth::user()->firstname }} {{ Auth::user()->lastname }}</b>
	<br>
	Email: {{ Auth::user()->email }}
	<br><br>
	{{ $description }}

	<br><br>
	If you have any problems, please contact us at cwjobs@jobs.connectedwomen.co
	<br>
	Thanks,
	<br>
	Connected Women - Virtual Assistants For Entrepreneurs

</body>
</html>