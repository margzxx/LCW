@include('layouts.portal_header')
<?php
use App\Question;
use App\Answer;
use App\Choice;
use App\File;
use App\Description;
?>

<div class="container">

	<h1>Dashboard</h1>

	@if(Auth::user()->avatar && Description::where('type','Short Summary')->where('user_id',Auth::user()->id)->exists() && Description::where('type','About Me')->where('user_id',Auth::user()->id)->exists() && Answer::where('area','Preferences')->where('user_id',Auth::user()->id)->exists() && Answer::where('area','Experience')->where('user_id',Auth::user()->id)->exists() && Answer::where('area','Skills')->where('user_id',Auth::user()->id)->exists() && Answer::where('area','Goals')->where('user_id',Auth::user()->id)->exists() && Answer::where('area','Feedbacks')->where('user_id',Auth::user()->id)->exists())

	Current Profile Progress: 100%
		<br><br>
		<div class="progress">
			<div class="progress-bar" role="progressbar" aria-valuenow="100" aria-valuemin="0" aria-valuemax="100" style="width: 100%;">
				<span class="sr-only">100% Complete</span>
			</div>
		</div>

	@elseif(Auth::user()->avatar && Description::where('type','Short Summary')->where('user_id',Auth::user()->id)->exists() && Description::where('type','About Me')->where('user_id',Auth::user()->id)->exists() && Answer::where('area','Preferences')->where('user_id',Auth::user()->id)->exists() && Answer::where('area','Experience')->where('user_id',Auth::user()->id)->exists() && Answer::where('area','Skills')->where('user_id',Auth::user()->id)->exists() && Answer::where('area','Goals')->where('user_id',Auth::user()->id)->exists())

	Current Profile Progress: 95%
		<br><br>
		<div class="progress">
			<div class="progress-bar" role="progressbar" aria-valuenow="95" aria-valuemin="0" aria-valuemax="100" style="width: 95%;">
				<span class="sr-only">95% Complete</span>
			</div>
		</div>

	@elseif(Auth::user()->avatar && Description::where('type','Short Summary')->where('user_id',Auth::user()->id)->exists() && Description::where('type','About Me')->where('user_id',Auth::user()->id)->exists() && Answer::where('area','Preferences')->where('user_id',Auth::user()->id)->exists() && Answer::where('area','Experience')->where('user_id',Auth::user()->id)->exists() && Answer::where('area','Skills')->where('user_id',Auth::user()->id)->exists())

	Current Profile Progress: 75%
		<br><br>
		<div class="progress">
			<div class="progress-bar" role="progressbar" aria-valuenow="75" aria-valuemin="0" aria-valuemax="100" style="width: 75%;">
				<span class="sr-only">75% Complete</span>
			</div>
		</div>

	@elseif(Auth::user()->avatar && Description::where('type','Short Summary')->where('user_id',Auth::user()->id)->exists() && Description::where('type','About Me')->where('user_id',Auth::user()->id)->exists() && Answer::where('area','Preferences')->where('user_id',Auth::user()->id)->exists() && Answer::where('area','Experience')->where('user_id',Auth::user()->id)->exists())

	Current Profile Progress: 65%
		<br><br>
		<div class="progress">
			<div class="progress-bar" role="progressbar" aria-valuenow="65" aria-valuemin="0" aria-valuemax="100" style="width: 65%;">
				<span class="sr-only">65% Complete</span>
			</div>
		</div>

	@elseif(Auth::user()->avatar && Description::where('type','Short Summary')->where('user_id',Auth::user()->id)->exists() && Description::where('type','About Me')->where('user_id',Auth::user()->id)->exists() && Answer::where('area','Preferences')->where('user_id',Auth::user()->id)->exists())

		Current Profile Progress: 55%
		<br><br>
		<div class="progress">
			<div class="progress-bar" role="progressbar" aria-valuenow="55" aria-valuemin="0" aria-valuemax="100" style="width: 55%;">
				<span class="sr-only">55% Complete</span>
			</div>
		</div>

	@elseif(Auth::user()->avatar && Description::where('type','Short Summary')->where('user_id',Auth::user()->id)->exists() && Description::where('type','About Me')->where('user_id',Auth::user()->id)->exists())
		Current Profile Progress: 45%
		<br><br>
		<div class="progress">
			<div class="progress-bar" role="progressbar" aria-valuenow="45" aria-valuemin="0" aria-valuemax="100" style="width: 45%;">
				<span class="sr-only">45% Complete</span>
			</div>
		</div>
	@elseif(Auth::user()->avatar && Description::where('type','Short Summary')->where('user_id',Auth::user()->id)->exists())
		Current Profile Progress: 40%
		<br><br>
		<div class="progress">
			<div class="progress-bar" role="progressbar" aria-valuenow="40" aria-valuemin="0" aria-valuemax="100" style="width: 40%;">
				<span class="sr-only">40% Complete</span>
			</div>
		</div>
	@elseif(Auth::user()->avatar)
		Current Profile Progress: 30%
		<br><br>
		<div class="progress">
			<div class="progress-bar" role="progressbar" aria-valuenow="30" aria-valuemin="0" aria-valuemax="100" style="width: 30%;">
				<span class="sr-only">30% Complete</span>
			</div>
		</div>
	@else
		Current Profile Progress: 25%
		<br><br>
		<div class="progress">
			<div class="progress-bar" role="progressbar" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100" style="width: 25%;">
				<span class="sr-only">25% Complete</span>
			</div>
		</div>
	@endif

	<hr>

	<div class="row">

		<div class="col-sm-3">

			<div class="list-group">
				<a href="{{ url('dashboard') }}" class="list-group-item list-group-item-action">
					Personal
				</a>
				<a href="{{ url('preferences') }}" class="list-group-item list-group-item-action">Preferences</a>
				<a href="{{ url('experience') }}" class="list-group-item list-group-item-action active">Experience</a>
				<a href="{{ url('skills') }}" class="list-group-item list-group-item-action">Skills</a>
				<a href="{{ url('goals') }}" class="list-group-item list-group-item-action">Goals</a>
				<a href="{{ url('feedbacks') }}" class="list-group-item list-group-item-action">Feedbacks</a>
			</div>

		</div>

		<div class="col-sm-9">

			<h3>Experience</h3>

			@if(Answer::where('area','Experience')->where('user_id',Auth::user()->id)->exists())

				<form action="{{ url('update-answers') }}" method="post">

				{{ csrf_field() }}

				@foreach($questions as $question)

				@if($question->type == 'Text')
					<label>{{ $question->description }}</label>

					<input type="hidden" name="question_id[]" value="{{ $question->id }}">

					<input type="text" class="form-control" name="description[]" value="{{ Answer::where('question_id',$question->id)->where('user_id',Auth::user()->id)->first()->description }}">

					<hr>

				@elseif($question->type == 'Dropdown')
					<label>{{ $question->description }}</label>

					<input type="hidden" name="question_id[]" value="{{ $question->id }}">

					<?php
					$choices = Choice::where('question_id',$question->id)->get();
					?>

					<select class="form-control" name="description[]">
					<option value="{{ Answer::where('question_id',$question->id)->where('user_id',Auth::user()->id)->first()->description }}">Currently: {{ Answer::where('question_id',$question->id)->where('user_id',Auth::user()->id)->first()->description }}</option>
					@foreach($choices as $choice)
					<option value="{{ $choice->description }}">{{ $choice->description }}</option>
					@endforeach
					</select>

					<hr>
				@elseif($question->type == 'Ranking')
					<label>{{ $question->description }}</label>

					<input type="hidden" name="question_id[]" value="{{ $question->id }}">

					<?php
					$choices = Choice::where('question_id',$question->id)->get();
					?>

					@foreach($choices as $choice)
					<input type="radio" name="description[]" value="{{ $choice->description }}">&nbsp;&nbsp;{{ $choice->description }}&nbsp;&nbsp;
					@endforeach

					<hr>

				@endif

				@endforeach

				<input type="submit" class="btn btn-primary">

			</form>

			@else

			<form action="{{ url('submit-answers') }}" method="post">

				{{ csrf_field() }}

				@foreach($questions as $question)

				@if($question->type == 'Text')
					<label>{{ $question->description }}</label>

					<input type="hidden" name="question_id[]" value="{{ $question->id }}">

					<input type="text" class="form-control" name="description[]">

					<hr>

				@elseif($question->type == 'Dropdown')
					<label>{{ $question->description }}</label>

					<input type="hidden" name="question_id[]" value="{{ $question->id }}">

					<?php
					$choices = Choice::where('question_id',$question->id)->get();
					?>

					<select class="form-control" name="description[]">
					@foreach($choices as $choice)

					<option value="{{ $choice->description }}">{{ $choice->description }}</option>
					@endforeach
					</select>

					<hr>
					@elseif($question->type == 'Ranking')
					<label>{{ $question->description }}</label>

					<input type="hidden" name="question_id[]" value="{{ $question->id }}">

					<?php
					$choices = Choice::where('question_id',$question->id)->get();
					?>

					@foreach($choices as $choice)
					<input type="radio" name="description[]" value="{{ $choice->description }}">&nbsp;&nbsp;{{ $choice->description }}&nbsp;&nbsp;
					@endforeach

					<hr>
					
				@endif

				@endforeach

				<input type="submit" class="btn btn-primary" style="color:#333;">

			</form>

			@endif

			<br>

		</div>
		
	</div>

</div>

@include('layouts.portal_footer')