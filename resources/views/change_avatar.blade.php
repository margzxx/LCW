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

			<div class="well text-center">

			<center><h3>Change Avatar</h3></center>
			<br>

	<form action="{{ url('add-avatar') }}" method="post" enctype="multipart/form-data">

			{{ csrf_field() }}

			@if(Auth::user()->avatar)
			<h5>Current Photo</h5>
			<img src="{{ Auth::user()->avatar }}" width="300px" class="img img-circle">
			<br><br>
			@else
			<h5>Photo</h5>
			<img src="{{ url('assets/img/logo2.png') }}" width="300px" class="img img-circle">
			<br><br>
			@endif
			<input type="file" name="image">

			<br><br>

			<center>
			<input type="submit" class="btn btn-primary" value="Upload Photo" style="color: #333">
			</center>
			</form>

	</center>

</div>

		</div>

		<div class="col-md-4">
			&nbsp;
		</div>

	</div>

</div>

@include('layouts.portal_footer')