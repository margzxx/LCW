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

			<center><h3>Import Survey Report</h3>
			

	<p>File must be in .csv format to be able to import.</p>
	</center>

	<br>

	<form action="{{ url('import-survey-report') }}" method="post" enctype="multipart/form-data">
		
		{{ csrf_field() }}

		<h5>CSV File</h5>
		<input type="file" name="document">

		<br>

		<input type="submit" class="btn btn-primary form-control" style="line-height: .3em">


	</form>

</div>

		</div>

		<div class="col-md-4">
			&nbsp;
		</div>

	</div>

</div>

@include('layouts.portal_footer')