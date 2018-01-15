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

			<center><h3>Change Password</h3></center>
			<br>

	<form action="{{ url('change-password') }}" method="post" enctype="multipart/form-data">
		
		{{ csrf_field() }}

		<label>Old Password</label>
		<input type="password" class="form-control" name="old_password" placeholder="Old Password">

		<br>

		<label>New Password</label>
		<input type="password" class="form-control" name="new_password" placeholder="New Password">

		<br>

		<label>Confirm New Password</label>
		<input type="password" class="form-control" name="confirm_new_password" placeholder="Confirm New Password">

		<br>

		<input type="submit" class="btn btn-primary form-control" style="line-height: .3em; color:#333">

	</form>


		</div>

		</div>

		<div class="col-md-4">
			&nbsp;
		</div>

	</div>

</div>

@include('layouts.portal_footer')