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

			<center><h3>Edit Area</h3></center>
			<br>
	
	<form action="{{ url('edit-area') }}" method="post">
		
	{{ csrf_field() }}

	<input type="hidden" name="area_id" value="{{ $area->id }}">

	<label>Area</label>
	<input type="text" name="description" class="form-control" value="{{ $area->description }}">

	<br>

	<input type="submit" class="btn btn-primary form-control" style="color: #333;line-height: .3em">

	</form>

</div>

		</div>

		<div class="col-md-4">
			&nbsp;
		</div>

	</div>

</div>

@include('layouts.portal_footer')