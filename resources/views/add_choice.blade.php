@include('layouts.portal_header')
<?php
use App\Question;
use App\Answer;
use App\Choice;
use App\File;
use App\Description;
?>

<div class="container" style="padding-top: 50px; padding-bottom: 70px">

	<form action="{{ url('add-choice') }}" method="post">

		{{ csrf_field() }}

		<div class="row">

			<div class="col-md-3">
				&nbsp;
			</div>

			<div class="col-md-6">

				<div class="well">

					<center>
						<a href="{{ url('manage-survey') }}">
							<input type="button" class="btn btn-primary" value="Go Back" style="color:#333;">
						</a>

						<h3 style="color:#333;">Add Choice</h3>
					</center>

					<form action="{{ url('add-choice') }}" method="post">

						{{ csrf_field() }}

						<input type="hidden" name="question_id" value="{{ $question->id }}">

						<center>
						<label>{{ $question->description }}</label>
						@foreach($choices as $choice)
						<li>{{ $choice->description }} <a href="{{ url('remove-choice/'.$choice->id) }}" onclick="javascript:return confirm('Are you sure you want to delete this?')">Remove</a></li>
						@endforeach
						</center>

						<br>

						<label>Choice</label>
						<input type="text" name="description" class="form-control" autofocus>

						<br>

						<input type="submit" class="btn btn-primary form-control" style="color:#333;line-height: .3em">

					</div>

				</div>

				<div class="col-md-3">
					&nbsp;
				</div>

			</div>

		</form>





	</div>

	@include('layouts.portal_footer')