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

				<center><h2>Profile Settings</h2></center>

			<center>
			

			<h4>{{ Auth::user()->firstname }} {{ Auth::user()->lastname }}</h4>
			<br>
			@if(Auth::user()->avatar)
			<img src="{{ url(Auth::user()->avatar) }}" width="300px" class="img img-circle">
			@else
			<img src="{{ url('assets/img/logo2.png') }}" width="300px" class="img img-circle">
			@endif

			<br><br>

			<a href="{{ url('my-profile') }}">
				<input type="button" class="btn btn-primary form-control" value="View My Profile" style="line-height: .3em; color: #333">
			</a>

			<br><br>

			<a href="{{ url('edit-profile') }}">
				<input type="button" class="btn btn-primary form-control" value="Edit My Profile" style="line-height: .3em; color: #333;background-color:#f9f9f9">
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