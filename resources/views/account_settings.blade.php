@include('layouts.portal_header')
<?php
use App\Question;
use App\Answer;
use App\Choice;
use App\File;
use App\Description;
?>

<div class="container" style="padding-top: 50px; padding-bottom: 70px">

	

	<div class="row">

		<div class="col-md-4">
			&nbsp;
		</div>

		<div class="col-md-4">

			<div class="well">

				<center><h2>Account Settings</h2></center>

			<center>
			

			<h4>{{ Auth::user()->firstname }} {{ Auth::user()->lastname }}</h4>
			<br>
			@if(Auth::user()->avatar)
			<img src="{{ url(Auth::user()->avatar) }}" width="300px" class="img img-circle">
			@else
			<img src="{{ url('assets/img/logo2.png') }}" width="300px" class="img img-circle">
			@endif

			<br><br>

			<a href="{{ url('change-password') }}">
				<input type="button" class="btn btn-primary" value="Change Password" style=" color: #333">
			</a>

			</center>

		</div>

		</div>

		<div class="col-md-4">
			&nbsp;
		</div>

	</div>

</div>

@include('layouts.portal_footer')