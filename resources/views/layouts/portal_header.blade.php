<?php
use App\Verification;
?>

<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<title>Connected Women – Virtual Assistants For Entrepreneurs – Find the perfect match with the Connected Women app. Sign up now for early access!</title>
	<meta name="viewport" content="width=device-width, initial-scale=1.0" />
	<meta name="description" content="Find the perfect match with the Connected Women app. Sign up now for early access!" />
	<meta name="author" content="Connected Women" />
	<!-- css -->
	<link href="{{ url('assets/css/bootstrap.min.css') }}" rel="stylesheet" />
	<link href="{{ url('assets/css/fancybox/jquery.fancybox.css') }}" rel="stylesheet"> 
	<link href="{{ url('assets/css/flexslider.css') }}" rel="stylesheet" /> 
	<link href="{{ url('assets/css/style.css') }}" rel="stylesheet" />

	<!-- HTML5 shim, for IE6-8 support of HTML5 elements -->
<!--[if lt IE 9]>
      <script src="http://html5shim.googlecode.com/svn/trunk/html5.js"></script>
  <![endif]-->

</head>
<body>
	<div id="wrapper" class="home-page">

		<!-- start header -->
		<header>
			<div class="navbar navbar-default navbar-static-top">
				<div class="container">
					<div class="navbar-header">
						<button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
							<span class="icon-bar"></span>
							<span class="icon-bar"></span>
							<span class="icon-bar"></span>
						</button>
						<a class="navbar-brand" href="{{ url('/') }}"><img src="{{ url('assets/img/logo.png') }}" alt="logo"/ width="130px"></a>
					</div>
					<div class="navbar-collapse collapse ">
						<ul class="nav navbar-nav">

							@if(Verification::where('user_id',Auth::user()->id)->exists())

							<!-- <li><a href="{{ url('dashboard') }}"><em class="fa fa-dashboard">&nbsp;</em> Dashboard</a></li> -->


							@if(Auth::user()->type == 'Entrepreneur' || Auth::user()->role == 'Admin')
							<!-- <li><a href="{{ url('applicants') }}"><em class="fa fa-users">&nbsp;</em> Applicants</a></li> -->
							@endif

					<!-- @if(Auth::user()->type == 'VA' || Auth::user()->role == 'Admin')
					<li><a href="{{ url('jobs') }}"><em class="fa fa-clone">&nbsp;</em> Jobs</a></li>
					@endif -->

					<!-- <li>
						@if(Auth::user()->type == 'Entrepreneur' || Auth::user()->role == 'Admin')

						<a href="{{ url('matches-entrepreneur') }}"><em class="fa fa-fire">&nbsp;</em> Matches</a>
						@else
						<a href="{{ url('matches-va') }}"><em class="fa fa-fire">&nbsp;</em> Matches</a>
						@endif

					</li> -->
					
					@if(Auth::user()->role == 'Admin')

					<li class="dropdown">
						<a href="#" data-toggle="dropdown" class="dropdown-toggle">

							
							<em class="fa fa-cog">&nbsp;</em> Manage System <b class="caret"></b></a>
						<ul class="dropdown-menu">

							<li><a href="{{ url('manage-users') }}">
							Manage Users
						</a></li>
						
						<li><a href="{{ url('manage-survey') }}">
							Manage Survey
						</a></li>

						<li><a href="{{ url('manage-areas') }}">
							Manage Areas
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

				

				<ul class="nav navbar-nav">
					<li class="dropdown">
						<a href="#" data-toggle="dropdown" class="dropdown-toggle">

							@if(Auth::user()->avatar)
							<img src="{{ url(Auth::user()->avatar) }}" width="30px" class="img img-circle"> 
							@else
							<img src="{{ url('assets/img/avatar.png') }}" width="20px" class="img img-circle">
							@endif

							<!-- {{ Auth::user()->firstname }} {{ Auth::user()->lastname }}  -->
							<b class="caret"></b></a>
						<ul class="dropdown-menu">

							@if(Auth::user()->role == 'Admin' || Auth::user()->type == 'Entrepreneur')
							<li><a href="{{ url('dashboard') }}">
								<i class="fa fa-search"></i> Dashboard
							</a></li>
							@endif

							@if(Auth::user()->type == 'VA' || Auth::user()->type == 'Entrepreneur')
							<li><a href="{{ url('my-profile') }}">
								View Profile
							</a></li>
							@endif

							<li><a href="{{ url('edit-profile/1') }}">
								Edit Profile
							</a></li>

							<!-- <li><a href="{{ url('profile-settings') }}">
								<i class="fa fa-user"></i> Profile Settings
							</a></li> -->

							<!-- <li><a href="{{ url('account-settings') }}">
								<i class="fa fa-lock"></i> Account Settings
							</a></li> -->

							<li><a href="{{ url('change-password') }}">
								<i class="fa fa-lock"></i> Change Password
							</a></li>

							@if(Auth::user()->role == 'Admin')
							<!-- <li><a href="{{ url('my-profile') }}">
								<i class="fa fa-file"></i> Export Data
							</a></li> -->
							@endif
							<li><a href="{{ url('logout') }}"><em class="fa fa-power-off">&nbsp;</em> Logout</a></li>
						</ul>

					
				</ul>

				@endif
			</div>
		</div>
	</div>
</header>
	<!-- end header -->