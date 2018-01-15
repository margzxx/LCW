<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Connected Women</title>
	<link href="{{ url('css/bootstrap.min.css') }}" rel="stylesheet">
	<link href="{{ url('css/font-awesome.min.css') }}" rel="stylesheet">
	<link href="{{ url('css/datepicker3.css') }}" rel="stylesheet">
	<link href="{{ url('css/styles.css') }}" rel="stylesheet">
	
	<!--Custom Font-->
	<link href="https://fonts.googleapis.com/css?family=Montserrat:300,300i,400,400i,500,500i,600,600i,700,700i" rel="stylesheet">
	<!--[if lt IE 9]>
	<script src="js/html5shiv.js"></script>
	<script src="js/respond.min.js"></script>
<![endif]-->
</head>
<body>
	<nav class="navbar navbar-custom navbar-fixed-top" role="navigation">
		<div class="container-fluid">
			<div class="navbar-header">
				<button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#sidebar-collapse"><span class="sr-only">Toggle navigation</span>
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
					<span class="icon-bar"></span></button>
					<a class="navbar-brand" href="#"><span>Connected</span>Women</a>
					<ul class="nav navbar-top-links navbar-right">
						<li class="dropdown"><a class="dropdown-toggle count-info" data-toggle="dropdown" href="#">
							<em class="fa fa-envelope"></em><span class="label label-danger">15</span>
						</a>
						<ul class="dropdown-menu dropdown-messages">
							<li>
								<div class="dropdown-messages-box"><a href="profile.html" class="pull-left">
									<img alt="image" class="img-circle" src="http://placehold.it/40/30a5ff/fff">
								</a>
								<div class="message-body"><small class="pull-right">3 mins ago</small>
									<a href="#"><strong>John Doe</strong> commented on <strong>your photo</strong>.</a>
									<br /><small class="text-muted">1:24 pm - 25/03/2015</small></div>
								</div>
							</li>
							<li class="divider"></li>
							<li>
								<div class="dropdown-messages-box"><a href="profile.html" class="pull-left">
									<img alt="image" class="img-circle" src="http://placehold.it/40/30a5ff/fff">
								</a>
								<div class="message-body"><small class="pull-right">1 hour ago</small>
									<a href="#">New message from <strong>Jane Doe</strong>.</a>
									<br /><small class="text-muted">12:27 pm - 25/03/2015</small></div>
								</div>
							</li>
							<li class="divider"></li>
							<li>
								<div class="all-button"><a href="#">
									<em class="fa fa-inbox"></em> <strong>All Messages</strong>
								</a></div>
							</li>
						</ul>
					</li>
					<li class="dropdown"><a class="dropdown-toggle count-info" data-toggle="dropdown" href="#">
						<em class="fa fa-bell"></em><span class="label label-info">5</span>
					</a>
					<ul class="dropdown-menu dropdown-alerts">
						<li><a href="#">
							<div><em class="fa fa-envelope"></em> 1 New Message
								<span class="pull-right text-muted small">3 mins ago</span></div>
							</a></li>
							<li class="divider"></li>
							<li><a href="#">
								<div><em class="fa fa-heart"></em> 12 New Likes
									<span class="pull-right text-muted small">4 mins ago</span></div>
								</a></li>
								<li class="divider"></li>
								<li><a href="#">
									<div><em class="fa fa-user"></em> 5 New Followers
										<span class="pull-right text-muted small">4 mins ago</span></div>
									</a></li>
								</ul>
							</li>
						</ul>
					</div>
				</div><!-- /.container-fluid -->
			</nav>
			<div id="sidebar-collapse" class="col-sm-3 col-lg-2 sidebar">
				<div class="profile-sidebar">
					<div class="profile-userpic">
						<center>
						@if(Auth::user()->avatar)
						<img src="{{ url(Auth::user()->avatar) }}" class="img-responsive" alt="">
						@else

						<img src="{{ url('assets/img/logo2.png') }}" class="img-responsive" alt="">
						@endif
						</center>
					</div>
					<div class="profile-usertitle">
						<div class="profile-usertitle-name">{{ Auth::user()->firstname }} {{ Auth::user()->lastname }}</div>
						<div class="profile-usertitle-status">
							
							<span class="indicator label-success"></span>Online
							
						</div>
					</div>
					<div class="clear"></div>
				</div>
				<div class="divider"></div>
				<form role="search">
					<div class="form-group">
						<input type="text" class="form-control" placeholder="Search">
					</div>
				</form>
				<ul class="nav menu">
					<li><a href="{{ url('dashboard') }}"><em class="fa fa-dashboard">&nbsp;</em> Dashboard</a></li>


					@if(Auth::user()->type == 'Entrepreneur' || Auth::user()->role == 'Admin')
					<li><a href="{{ url('applicants') }}"><em class="fa fa-users">&nbsp;</em> Applicants</a></li>
					@endif

					<!-- @if(Auth::user()->type == 'VA' || Auth::user()->role == 'Admin')
					<li><a href="{{ url('jobs') }}"><em class="fa fa-clone">&nbsp;</em> Jobs</a></li>
					@endif -->

					<li>
						@if(Auth::user()->type == 'Entrepreneur' || Auth::user()->role == 'Admin')
							<a href="{{ url('matches-entrepreneur') }}"><em class="fa fa-fire">&nbsp;</em> Matches</a>
						@else
							<a href="{{ url('matches-va') }}"><em class="fa fa-fire">&nbsp;</em> Matches</a>
						@endif
					</li>
					
					@if(Auth::user()->role == 'Admin')
					<li class="parent "><a data-toggle="collapse" href="#sub-item-1">
						<em class="fa fa-cog">&nbsp;</em> Manage System <span data-toggle="collapse" href="#sub-item-1" class="icon pull-right"><em class="fa fa-plus"></em></span>
					</a>
					<ul class="children collapse" id="sub-item-1">
						<li><a href="{{ url('manage-users') }}">
							Manage Users
						</a></li>
						
						<li><a href="{{ url('manage-survey') }}">
							Manage Survey
						</a></li>

						<li><a href="{{ url('survey-report') }}">
							Survey Report
						</a></li>

						<li><a href="{{ url('import-survey-report') }}">
							Import Survey Report
						</a></li>
					</ul>
					</li>
					@endif

					<li class="parent "><a data-toggle="collapse" href="#sub-item-2">
						<em class="fa fa-user">&nbsp;</em> My Profile <span data-toggle="collapse" href="#sub-item-2" class="icon pull-right"><em class="fa fa-plus"></em></span>
					</a>
					<ul class="children collapse" id="sub-item-2">
						<li><a href="{{ url('my-profile') }}">
							View Profile
						</a></li>

						<li><a href="{{ url('edit-profile') }}">
							Edit Profile
						</a></li>

						<li><a href="{{ url('change-password') }}">
							Change Password
						</a></li>
						<li><a href="{{ url('my-profile') }}">
							Export Data
						</a></li>
					</ul>
					</li>
				<li><a href="{{ url('logout') }}"><em class="fa fa-power-off">&nbsp;</em> Logout</a></li>
			</ul>
		</div><!--/.sidebar-->

		<div class="col-sm-9 col-sm-offset-3 col-lg-10 col-lg-offset-2 main">
			<div class="row">

				@if ($errors->any())
				<script>
					alert("Oops! There's an error while we were processing the data.\n\n @foreach($errors->all() as $error){{ $error }}\n @endforeach");
				</script>
				@endif

				@if(Session::get('success'))
				<script>
					alert("{{ Session::get('success') }}");
				</script>
				@endif

				@if(Session::get('error'))
				<script>
					alert("{{ Session::get('error') }}");
				</script>
				@endif