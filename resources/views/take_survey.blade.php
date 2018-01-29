@include('layouts.portal_header')
<?php
use App\Question;
use App\Answer;
use App\Country;
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

				<center><h3 style="color: #30c3e7">Create Profile</h3></center>

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

				<form action="{{ url('update-answers') }}" method="post" enctype="multipart/form-data">

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

					@if($question->id == 77)
					<h5>Rate the business that you want most need assistance with (by priority)</h5>

					(1 = no priority, 4 = high priority)
					<br><br>
					@endif

					@if($question->id == 27)
					<h5>Rate the roles below according to your skills and work experience (not what you enjoy the most)</h5>

					(1 = no experience, 4 = highly experienced)
					<br><br>
					@endif

					@if($question->id == 33 || $question->id == 83)
					<h5>Rate the roles below according to what you least enjoy (not skill or experience)</h5>
					(1 = enjoy least, 4 = enjoy most)
					<br><br>
					@endif

					<!-- GOALS -->
					@if($question->id == 46 || $question->id == 97)
					<h5>Rate this according to which is most important to you?</h5>

					(1 = least important, 4 = most important)
					<br><br>
					@endif
					<!-- GOALS -->

					<div class="row">

						<div class="col-md-3">
							<label>{{ $question->description }}</label>
						</div>

					

					<?php
					$choices = Choice::where('question_id',$question->id)->get();
					?>

					<div class="col-md-9">

					<select class="form-control" name="description[]">
						<option value="{{ Answer::where('question_id',$question->id)->where('user_id',Auth::user()->id)->first()->description }}">Currently: {{ Answer::where('question_id',$question->id)->where('user_id',Auth::user()->id)->first()->description }}</option>
						@foreach($choices as $choice)
						<option value="{{ $choice->description }}">{{ $choice->description }}</option>
						@endforeach
					</select>

				</div>

					</div>

					@endif

					@endforeach

					<?php
					$previous_survey = $area->id - 1;
					?>

					<center>
						@if($area->id > 1)
						<a href="{{ url('take-survey/'.$previous_survey) }}" style="text-decoration: none">
							<input type="button" class="btn btn-primary" value="Back" style="color:#333">
						</a>
						@endif

						@if($area->id >= Area::count())
						<input type="submit" class="btn btn-primary" style="color:#333;" value="Done">
						@else
						<input type="submit" class="btn btn-primary" style="color:#333;" value="Next">
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

					@if($question->id == 3 || $question->id == 58)
						<input type="text" class="form-control" name="description[]" value="{{ Auth::user()->firstname }} {{ Auth::user()->lastname }}" required>
					@elseif($question->id == 4 || $question->id == 59)
						<input type="text" class="form-control" name="description[]" value="{{ Auth::user()->mobile_number }}" required>
					@elseif($question->id == 5 || $question->id == 60)
						<input type="text" class="form-control" name="description[]" value="+{{ Country::where('name',Auth::user()->country)->first()->calling_code }}" required>
					@elseif($question->id == 9 || $question->id == 64)
						<input type="text" class="form-control" name="description[]" value="{{ Country::where('name',Auth::user()->country)->first()->citizenship }}" required>
					@elseif($question->id == 10 || $question->id == 63)
						<input type="text" class="form-control" name="description[]" value="{{ Country::where('name',Auth::user()->country)->first()->capital }}" required>
					@else
						<input type="text" class="form-control" name="description[]" required>
					@endif

					<br>

					@elseif($question->type == 'Multiple Text')
					<label>{{ $question->description }}</label>

					<input type="hidden" name="question_id[]" value="{{ $question->id }}">

					<input type="text" class="form-control" name="description[]" required>

					<br>

					@elseif($question->type == 'Number')
					<label>{{ $question->description }}</label>

					<input type="hidden" name="question_id[]" value="{{ $question->id }}">

					<input type="number" class="form-control" name="description[]" value=0 min=0 required>

					<br>

					@elseif($question->type == 'E-mail')
					<label>{{ $question->description }}</label>

					<input type="hidden" name="question_id[]" value="{{ $question->id }}">

					@if($question->id == 2 || $question->id == 57)
						<input type="email" class="form-control" name="description[]" value="{{ Auth::user()->email }}" required>
					@else
						<input type="email" class="form-control" name="description[]" required>
					@endif

					<br>

					@elseif($question->type == 'Textarea')
					<label>{{ $question->description }}</label>

					<input type="hidden" name="question_id[]" value="{{ $question->id }}">

					<textarea rows=7 class="form-control" name="description[]" required></textarea>

					<br>

					@elseif($question->type == 'Date')
					<label>{{ $question->description }}</label>

					<input type="hidden" name="question_id[]" value="{{ $question->id }}">

					<input type="date" class="form-control" name="description[]" required>

					<br>

					@elseif($question->type == 'Country')
					<label>{{ $question->description }}</label>

					<input type="hidden" name="question_id[]" value="{{ $question->id }}">

					<?php
					$choices = Choice::where('question_id',$question->id)->get();
					?>

					<select class="form-control" name="description[]">
						@foreach($countries as $country)
						<option value="{{ Auth::user()->country }}">Currently: {{ Auth::user()->country }}</option>
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

					<!-- SKILLS -->
					@if($question->id == 77)
					<h5>Rate the business that you want most need assistance with (by priority)</h5>

					(1 = no priority, 4 = high priority)
					<br><br>
					@endif

					@if($question->id == 27)
					<h5>Rate the roles below according to your skills and work experience (not what you enjoy the most)</h5>

					(1 = no experience, 4 = highly experienced)
					<br><br>
					@endif

					@if($question->id == 33 || $question->id == 83)
					<h5>Rate the roles below according to what you least enjoy (not skill or experience)</h5>
					(1 = enjoy least, 4 = enjoy most)
					<br><br>
					@endif
					<!-- SKILLS -->

					<!-- GOALS -->
					@if($question->id == 46 || $question->id == 97)
					<h5>Rate this according to which is most important to you?</h5>

					(1 = least important, 4 = most important)
					<br><br>
					@endif
					<!-- GOALS -->

					<div class="row">

						<div class="col-md-3">
							<label>{{ $question->description }}</label>
						</div>

					

					<input type="hidden" name="question_id[]" value="{{ $question->id }}">

					<?php
					$choices = Choice::where('question_id',$question->id)->get();
					?>

					<div class="col-md-9">

					<select class="form-control" name="description[]">
						@foreach($choices as $choice)

						<option value="{{ $choice->description }}">{{ $choice->description }}</option>
						@endforeach
					</select>

				</div>

					</div>

					

					@endif

					@endforeach

					

					<?php
					$previous_survey = $area->id - 1;
					?>

					<center>
						@if($area->id > 1)
						<a href="{{ url('take-survey/'.$previous_survey) }}" style="text-decoration: none">
							<input type="button" class="btn btn-primary" value="Back" style="color:#333">
						</a>
						@endif

						@if($area->id >= Area::count())
						<input type="submit" class="btn btn-primary" style="color:#333;" value="Done">
						@else
						<input type="submit" class="btn btn-primary" style="color:#333;" value="Next">
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