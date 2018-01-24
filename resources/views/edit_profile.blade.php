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
					<p><b>
						@if(Auth::user()->type == 'Entrepreneur' && $sub_area->id == 3)
						Company
						@else
						{{ $sub_area->description }}
						@endif
					</b></p>
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

			<div class="well" style="box-shadow: 0px 1px 8px 1px #dedede; background: #fff">

				<center><h3 style="color: #30c3e7">Edit Profile</h3></center>

				@if($errors->all())
				<div class="alert alert-danger" role="alert">
					Oops! We have an error.
				  @foreach($errors as $error)
				  {{ $error }}
				  @endforeach
				</div>
				@endif

				<br>



				@if(Answer::where('area_id',$area->id)->where('user_id',Auth::user()->id)->exists())

				<form action="{{ url('edit-profile') }}" method="post" enctype="multipart/form-data">

					{{ csrf_field() }}

					<input type="hidden" name="main_area_id" value="{{ $area->id }}">

					@if($area->id == 1)

						<label>Please upload a professional photograph</label>
						<input type="file" name="avatar">

						<br>

						@if(Auth::user()->type == 'VA')
						<label>Please upload your latest resume/cv or portfolio</label>
						<input type="file" name="resume">

						<br>
						@endif

					@endif

					@foreach($questions as $question)

					@if($question->type == 'File')

					<label>{{ $question->description }}</label>

					<input type="hidden" name="question_id[]" value="{{ $question->id }}">

					<input type="file" name="file[]">

					<br>

					@elseif($question->type == 'Text')
					<label>{{ $question->description }}</label>

					<input type="hidden" name="question_id[]" value="{{ $question->id }}">

					<input type="text" class="form-control" name="description[]" value="{{ Answer::where('question_id',$question->id)->where('user_id',Auth::user()->id)->first()->description }}" required>

					<br>

					@elseif($question->type == 'Multiple Text')
					<label>{{ $question->description }}</label>

					<input type="hidden" name="question_id[]" value="{{ $question->id }}">

					<input type="text" class="form-control" name="description[]" value="{{ Answer::where('question_id',$question->id)->where('user_id',Auth::user()->id)->first()->description }}" required>

					<br>

					@elseif($question->type == 'Number')
					<label>{{ $question->description }}</label>

					<input type="hidden" name="question_id[]" value="{{ $question->id }}">

					<input type="number" class="form-control" name="description[]" value="{{ Answer::where('question_id',$question->id)->where('user_id',Auth::user()->id)->first()->description }}" required>

					<br>

					@elseif($question->type == 'E-mail')
					<label>{{ $question->description }}</label>

					<input type="hidden" name="question_id[]" value="{{ $question->id }}">

					<input type="email" class="form-control" name="description[]" value="{{ Answer::where('question_id',$question->id)->where('user_id',Auth::user()->id)->first()->description }}" required>

					<br>

					@elseif($question->type == 'Textarea')
					<label>{{ $question->description }}</label>

					<input type="hidden" name="question_id[]" value="{{ $question->id }}">

					<textarea rows=7 class="form-control" name="description[]" required>{{ Answer::where('question_id',$question->id)->where('user_id',Auth::user()->id)->first()->description }}</textarea>

					<br>

					@elseif($question->type == 'Date')
					<label>{{ $question->description }}</label>

					<input type="hidden" name="question_id[]" value="{{ $question->id }}">

					<input type="date" class="form-control" name="description[]" value="{{ Answer::where('question_id',$question->id)->where('user_id',Auth::user()->id)->first()->description }}">

					<br>

					@elseif($question->type == 'Country')
					<label>{{ $question->description }}</label>

					<input type="hidden" name="question_id[]" value="{{ $question->id }}">

					<?php
					$choices = Choice::where('question_id',$question->id)->get();
					?>

					<select class="form-control" name="description[]">
						<option value="{{ Answer::where('question_id',$question->id)->where('user_id',Auth::user()->id)->first()->description }}">Currently: {{ Answer::where('question_id',$question->id)->where('user_id',Auth::user()->id)->first()->description }}</option>
						@foreach($countries as $country)
						<option value="{{ $country->name }}">{{ $country->name }}</option>
						@endforeach
					</select>

					<br>

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

					<br>

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

					<br>

					@elseif($question->type == 'Gender')
					<label>{{ $question->description }}</label>

					<input type="hidden" name="question_id[]" value="{{ $question->id }}">

					<?php
					$choices = Choice::where('question_id',$question->id)->get();
					?>

					<select class="form-control" name="description[]">
						<option value="{{ Answer::where('question_id',$question->id)->where('user_id',Auth::user()->id)->first()->description }}">Currently: {{ Answer::where('question_id',$question->id)->where('user_id',Auth::user()->id)->first()->description }}</option>
						<option value="Male">Male</option>
						<option value="Female">Female</option>
					</select>

					<br>

					@elseif($question->type == 'Yes/No')
					<label>{{ $question->description }}</label>

					<input type="hidden" name="question_id[]" value="{{ $question->id }}">

					<?php
					$choices = Choice::where('question_id',$question->id)->get();
					?>

					<select class="form-control" name="description[]">
						<option value="{{ Answer::where('question_id',$question->id)->where('user_id',Auth::user()->id)->first()->description }}">Currently: {{ Answer::where('question_id',$question->id)->where('user_id',Auth::user()->id)->first()->description }}</option>
						<option value="Yes">Yes</option>
						<option value="No">No</option>
					</select>

					<br>

					@elseif($question->type == 'Marital Status')
					<label>{{ $question->description }}</label>

					<input type="hidden" name="question_id[]" value="{{ $question->id }}">

					<?php
					$choices = Choice::where('question_id',$question->id)->get();
					?>

					<select class="form-control" name="description[]">
						<option value="{{ Answer::where('question_id',$question->id)->where('user_id',Auth::user()->id)->first()->description }}">Currently: {{ Answer::where('question_id',$question->id)->where('user_id',Auth::user()->id)->first()->description }}</option>
						<option value="Single">Single</option>
						<option value="Married">Married</option>
						<option value="Widowed">Widowed</option>
					</select>

					<br>

					@elseif($question->type == 'Ranking')
					<label>{{ $question->description }}</label>

					<?php
					$choices = Choice::where('question_id',$question->id)->get();
					?>

					<select class="form-control" name="description[]">
						<option value="{{ Answer::where('question_id',$question->id)->where('user_id',Auth::user()->id)->first()->description }}">Currently: {{ Answer::where('question_id',$question->id)->where('user_id',Auth::user()->id)->first()->description }}</option>
						@foreach($choices as $choice)
						<option value="{{ $choice->description }}">{{ $choice->description }}</option>
						@endforeach
					</select>

					<br>

					@endif

					@endforeach

					<?php
					$previous_survey = $area->id - 1;
					?>

					<center>
						@if($area->id > 1)
						<a href="{{ url('edit-profile/'.$previous_survey) }}" style="text-decoration: none">
							<input type="button" class="btn btn-primary" value="Back" style="color:#333">
						</a>
						@endif

						@if($area->id >= Area::count())
						<input type="submit" class="btn btn-primary" style="color:#333;" value="Save Changes">
						@else
						<input type="submit" class="btn btn-primary" style="color:#333;" value="Save Changes">
						@endif
					</center>

				</form>

				@else

				<form action="{{ url('submit-answers') }}" method="post" enctype="multipart/form-data">

					{{ csrf_field() }}

					<input type="hidden" name="main_area_id" value="{{ $area->id }}">

					@if($area->id == 1)

						<label>Please upload a professional photograph</label>
						<input type="file" name="avatar">

						<br>

						@if(Auth::user()->type == 'VA')
						<label>Please upload your latest resume/cv or portfolio</label>
						<input type="file" name="resume">

						<br>
						@endif

					@endif

					@foreach($questions as $question)

					@if($question->type == 'File')

					<label>{{ $question->description }}</label>

					<input type="hidden" name="question_id[]" value="{{ $question->id }}">

					<input type="file" name="description[]">

					<br>

					@elseif($question->type == 'Text')
					<label>{{ $question->description }}</label>

					<input type="hidden" name="question_id[]" value="{{ $question->id }}">

					<input type="text" class="form-control" name="description[]" required>

					<br>

					@elseif($question->type == 'Multiple Text')
					<label>{{ $question->description }}</label>

					<input type="hidden" name="question_id[]" value="{{ $question->id }}">

					<input type="text" class="form-control" name="description[]" required>

					<br>

					@elseif($question->type == 'Number')
					<label>{{ $question->description }}</label>

					<input type="hidden" name="question_id[]" value="{{ $question->id }}">

					<input type="number" class="form-control" name="description[]" required>

					<br>

					@elseif($question->type == 'E-mail')
					<label>{{ $question->description }}</label>

					<input type="hidden" name="question_id[]" value="{{ $question->id }}">

					<input type="email" class="form-control" name="description[]" required>

					<br>

					@elseif($question->type == 'Textarea')
					<label>{{ $question->description }}</label>

					<input type="hidden" name="question_id[]" value="{{ $question->id }}">

					<textarea rows=7 class="form-control" name="description[]" required></textarea>

					<br>

					@elseif($question->type == 'Date')
					<label>{{ $question->description }}</label>

					<input type="hidden" name="question_id[]" value="{{ $question->id }}">

					<input type="date" class="form-control" name="description[]">

					<br>

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

					<br>

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

					<br>
					@elseif($question->type == 'Gender')
					<label>{{ $question->description }}</label>

					<input type="hidden" name="question_id[]" value="{{ $question->id }}">

					<?php
					$choices = Choice::where('question_id',$question->id)->get();
					?>

					<select class="form-control" name="description[]">
						<option value="Male">Male</option>
						<option value="Female">Female</option>
					</select>

					<br>

					@elseif($question->type == 'Yes/No')
					<label>{{ $question->description }}</label>

					<input type="hidden" name="question_id[]" value="{{ $question->id }}">

					<?php
					$choices = Choice::where('question_id',$question->id)->get();
					?>

					<select class="form-control" name="description[]">
						<option value="Yes">Yes</option>
						<option value="No">No</option>
					</select>

					<br>

					@elseif($question->type == 'Marital Status')
					<label>{{ $question->description }}</label>

					<input type="hidden" name="question_id[]" value="{{ $question->id }}">

					<?php
					$choices = Choice::where('question_id',$question->id)->get();
					?>

					<select class="form-control" name="description[]">
						<option value="Single">Single</option>
						<option value="Married">Married</option>
						<option value="Widowed">Widowed</option>
					</select>

					<br>
					@elseif($question->type == 'Ranking')
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

					<br>

					@endif

					@endforeach

					

					<?php
					$previous_survey = $area->id - 1;
					?>

					<center>
						@if($area->id > 1)
						<a href="{{ url('edit-profile/'.$previous_survey) }}" style="text-decoration: none">
							<input type="button" class="btn btn-primary" value="Back" style="color:#333">
						</a>
						@endif

						@if($area->id >= Area::count())
						<input type="submit" class="btn btn-primary" style="color:#333;" value="Save Changes">
						@else
						<input type="submit" class="btn btn-primary" style="color:#333;" value="Save Changes">
						@endif
					</center>


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