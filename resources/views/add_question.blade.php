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

			<center><h3>Add Question</h3></center>
			<br>
	
	<form action="{{ url('add-question') }}" method="post">
		
	{{ csrf_field() }}
	
	<label>Question For</label>
	<select class="form-control" name="scope">
		<option value="VA">VA</option>
		<option value="Entrepreneur">Entrepreneur</option>
	</select>

	<br>

	<label>Area</label>
	<select class="form-control" name="area_id">
		@foreach($areas as $area)
		<option value="{{ $area->id }}">{{ $area->description }}</option>
		@endforeach
	</select>

	<br>
	
	<label>Type</label>
	<select class="form-control" name="type">
		<option value="Text">Text</option>
		<option value="Textarea">Textarea</option>
		<option value="Multiple Text">Multiple Text</option>
		<option value="Dropdown">Dropdown</option>
		<option value="Yes/No">Yes/No</option>
		<option value="E-mail">E-mail</option>
		<option value="Gender">Gender</option>
		<option value="Date">Date</option>
		<option value="Number">Number</option>
		<option value="Country">Country</option>
		<option value="File">File</option>
		<option value="Marital Status">Marital Status</option>
		<option value="Ranking">Ranking</option>
	</select>

	<br>

	<label>Question</label>
	<input type="text" name="description" class="form-control">

	<br>

	<label>Order</label>
	<input type="number" name="order" class="form-control">

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