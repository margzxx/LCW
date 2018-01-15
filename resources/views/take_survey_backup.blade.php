@include('layouts.portal_header')
<?php
use App\Question;
use App\Answer;
use App\Choice;
use App\File;
use App\Area;
use App\Description;
?>

<style type="text/css">
.stepwizard-step p {
	margin-top: 0px;
	color:#666;
}
.stepwizard-row {
	display: table-row;
}
.stepwizard {
	display: table;
	width: 800px;
	position: relative;
}
.stepwizard-step button[disabled] {
    /*opacity: 1 !important;
    filter: alpha(opacity=100) !important;*/
}
.stepwizard .btn.disabled, .stepwizard .btn[disabled], .stepwizard fieldset[disabled] .btn {
	opacity:1 !important;
	color:#bbb;
}
.stepwizard-row:before {
	top: 20px;
	bottom: 0;
	position: absolute;
	content:" ";
	height: 1px;
	background-color: #ccc;
	z-index: 0;
}
.stepwizard-step {

	display: table-cell;
	text-align: center;
	position: relative;
}
</style>

<div class="container" style="padding-top: 50px; padding-bottom: 70px">

	<center>

		<div class="stepwizard">
			<div class="stepwizard-row setup-panel">
				@foreach($areas as $sub_area)
				<div class="stepwizard-step col-xs-2">
					<center>
						@if($sub_area->id <= $area->id)
						<div class="well" style="background: #30c3e7; border-radius: 0px; width: 50px;color: #fff; height: 50px;line-height: .7em"> 
							<b>{{ $sub_area->id }}</b>
						</div>
						@else
						<div class="well" style="border-radius: 0px; width: 50px; height: 50px;line-height: .7em"> 
							<b>{{ $sub_area->id }}</b>
						</div>
						@endif
					</center>
					<p><b>{{ $sub_area->description }}</b></p>
				</div>
				@endforeach
			</div>
		</div>

	</center>

	<br><br>

	<div class="row">

		<div class="col-md-3">
			&nbsp;
		</div>

		<div class="col-md-6">

			<div class="well">

				<center><h3 style="color: #30c3e7">Create Profile</h3></center>
				<br>

				@if(Answer::where('area_id',$area->id)->where('user_id',Auth::user()->id)->exists())

				<form action="{{ url('update-answers') }}" method="post">

					{{ csrf_field() }}

					<input type="hidden" name="area_id" value="{{ $area->id }}">

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

					

					<?php
					$choices = Choice::where('question_id',$question->id)->get();
					?>

					<input type="hidden" name="question_id[]" value="{{ $question->id }}">

					@foreach($choices as $choice)

					<input type="radio" name="description[]" value="{{ $choice->description }}">&nbsp;&nbsp;{{ $choice->description }}&nbsp;&nbsp;
					@endforeach

					<hr>

					@endif

					@endforeach

					<input type="submit" class="btn btn-primary" style="color:#333;">

				</form>

				@else

				<form action="{{ url('submit-answers') }}" method="post" enctype="multipart/form-data">

					{{ csrf_field() }}

					<input type="hidden" name="main_area_id" value="{{ $area->id }}">

					@foreach($questions as $question)

					@if($question->type == 'File')

					<label>{{ $question->description }}</label>

					<input type="hidden" name="question_id[]" value="{{ $question->id }}">

					<input type="file" name="description[]">

					<hr>

					@elseif($question->type == 'Text')
					<label>{{ $question->description }}</label>

					<input type="hidden" name="question_id[]" value="{{ $question->id }}">

					<input type="text" class="form-control" name="description[]">

					<hr>

					@elseif($question->type == 'Textarea')
					<label>{{ $question->description }}</label>

					<input type="hidden" name="question_id[]" value="{{ $question->id }}">

					<textarea rows=7 class="form-control" name="description[]"></textarea>

					<hr>

					@elseif($question->type == 'Date')
					<label>{{ $question->description }}</label>

					<input type="hidden" name="question_id[]" value="{{ $question->id }}">

					<input type="date" class="form-control" name="description[]">

					<hr>

					@elseif($question->type == 'Country')
					<label>{{ $question->description }}</label>

					<input type="hidden" name="question_id[]" value="{{ $question->id }}">

					<?php
					$choices = Choice::where('question_id',$question->id)->get();
					?>

					<select class="form-control" name="description[]">
						@foreach($countries as $country)

						<option value="{{ $country->name }}">{{ $country->name }}</option>
						@endforeach
					</select>

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

					<div class="row">

						@foreach($choices as $choice)
						<div class="col-md-3">
							<br>
							{{ $choice->description }}
							<br><br>
							<input type="radio" name="description[{{ $question->id }}]" value="{{ $choice->description }}">
						</div>
						@endforeach

					</div>

					<hr>

					@endif

					@endforeach

					<input type="submit" class="btn btn-primary" style="color:#333;" value="Next">

				</form>

				@endif

				<br>

			</div>

		</div>

		<div class="col-md-3">
			&nbsp;
		</div>

	</div>

</div>

</div>

@include('layouts.portal_footer')