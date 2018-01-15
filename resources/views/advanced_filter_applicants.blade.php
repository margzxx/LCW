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

			<center>
		<h3>Applicants - Advanced Filter</h3>
	</center>

	<div class="row">

		<div class="well">

			

		<form action="{{ url('advanced-filter-applicants') }}" method="post">

			{{ csrf_field() }}
		<div class="col-md-12">
			<label>Country</label>
			<select class="form-control" name="country">
				<option>Select Country</option>
				@foreach($countries as $country)
				<option value="{{ $country->name }}">{{ $country->name }}</option>
				@endforeach
			</select>

			<br>
		</div>

		<div class="col-md-12">
			<label>Educational Attainment</label>
			<select class="form-control" name="educational_attainment">
				<option>Select Educational Attainment</option>
				<option value="High School">High School</option>
				<option value="Vocational">Vocational</option>
				<option value="College Degree">College Degree</option>
				<option value="Post Graduate">Post Graduate</option>
			</select>

			<br>
		</div>

		<div class="col-md-12">
			<label>Employment Status</label>
			<?php
			$choices = Choice::where('question_id',14)->get();
			?>
			<select class="form-control" name="educational_attainment">
				<option>Select Employment Status</option>
				@foreach($choices as $choice)
				<option value="{{ $choice->description }}">{{ $choice->description }}</option>
				@endforeach
			</select>

			<br>
		</div>

		<div class="col-md-12">
			<h4>Skills and work experience</h4>
		</div>

		<div class="col-md-12">
			<label>Editorial</label>
			<?php
			$choices = Choice::where('question_id',15)->get();
			?>
			<select class="form-control" name="educational_attainment">
				<option>Select Editorial</option>
				@foreach($choices as $choice)
				<option value="{{ $choice->description }}">{{ $choice->description }}</option>
				@endforeach
			</select>

			<br>
		</div>

		<div class="col-md-12">
			<label>Marketing</label>
			<?php
			$choices = Choice::where('question_id',16)->get();
			?>
			<select class="form-control" name="educational_attainment">
				<option>Select Marketing</option>
				@foreach($choices as $choice)
				<option value="{{ $choice->description }}">{{ $choice->description }}</option>
				@endforeach
			</select>

			<br>
		</div>

		<div class="col-md-12">
			<label>Admin</label>
			<?php
			$choices = Choice::where('question_id',17)->get();
			?>
			<select class="form-control" name="educational_attainment">
				<option>Select Admin</option>
				@foreach($choices as $choice)
				<option value="{{ $choice->description }}">{{ $choice->description }}</option>
				@endforeach
			</select>

			<br>
		</div>

		<div class="col-md-12">
			<label>Finance</label>
			<?php
			$choices = Choice::where('question_id',18)->get();
			?>
			<select class="form-control" name="educational_attainment">
				<option>Select Finance</option>
				@foreach($choices as $choice)
				<option value="{{ $choice->description }}">{{ $choice->description }}</option>
				@endforeach
			</select>

			<br>
		</div>

		<div class="col-md-12">
			<label>Design</label>
			<?php
			$choices = Choice::where('question_id',19)->get();
			?>
			<select class="form-control" name="educational_attainment">
				<option>Select Design</option>
				@foreach($choices as $choice)
				<option value="{{ $choice->description }}">{{ $choice->description }}</option>
				@endforeach
			</select>

			<br>
		</div>

		<div class="col-md-12">
			<label>CRM</label>
			<?php
			$choices = Choice::where('question_id',20)->get();
			?>
			<select class="form-control" name="educational_attainment">
				<option>Select CRM</option>
				@foreach($choices as $choice)
				<option value="{{ $choice->description }}">{{ $choice->description }}</option>
				@endforeach
			</select>

			<br>
		</div>

		<div class="col-md-12">
			<h4>What you enjoy the most</h4>
		</div>

		<div class="col-md-12">
			<label>Editorial</label>
			<?php
			$choices = Choice::where('question_id',21)->get();
			?>
			<select class="form-control" name="educational_attainment">
				<option>Select Editorial</option>
				@foreach($choices as $choice)
				<option value="{{ $choice->description }}">{{ $choice->description }}</option>
				@endforeach
			</select>

			<br>
		</div>

		<div class="col-md-12">
			<label>Marketing</label>
			<?php
			$choices = Choice::where('question_id',22)->get();
			?>
			<select class="form-control" name="educational_attainment">
				<option>Select Marketing</option>
				@foreach($choices as $choice)
				<option value="{{ $choice->description }}">{{ $choice->description }}</option>
				@endforeach
			</select>

			<br>
		</div>

		<div class="col-md-12">
			<label>Admin</label>
			<?php
			$choices = Choice::where('question_id',23)->get();
			?>
			<select class="form-control" name="educational_attainment">
				<option>Select Admin</option>
				@foreach($choices as $choice)
				<option value="{{ $choice->description }}">{{ $choice->description }}</option>
				@endforeach
			</select>

			<br>
		</div>

		<div class="col-md-12">
			<label>Finance</label>
			<?php
			$choices = Choice::where('question_id',24)->get();
			?>
			<select class="form-control" name="educational_attainment">
				<option>Select Finance</option>
				@foreach($choices as $choice)
				<option value="{{ $choice->description }}">{{ $choice->description }}</option>
				@endforeach
			</select>

			<br>
		</div>

		<div class="col-md-12">
			<label>Design</label>
			<?php
			$choices = Choice::where('question_id',25)->get();
			?>
			<select class="form-control" name="educational_attainment">
				<option>Select Design</option>
				@foreach($choices as $choice)
				<option value="{{ $choice->description }}">{{ $choice->description }}</option>
				@endforeach
			</select>

			<br>
		</div>

		<div class="col-md-12">
			<label>CRM</label>
			<?php
			$choices = Choice::where('question_id',26)->get();
			?>
			<select class="form-control" name="educational_attainment">
				<option>Select CRM</option>
				@foreach($choices as $choice)
				<option value="{{ $choice->description }}">{{ $choice->description }}</option>
				@endforeach
			</select>

			<br>
		</div>

		<div class="col-md-12">
			<h4>Importance</h4>
		</div>

		<div class="col-md-12">
			<label>Wealth</label>
			<?php
			$choices = Choice::where('question_id',33)->get();
			?>
			<select class="form-control" name="educational_attainment">
				<option>Select Wealth</option>
				@foreach($choices as $choice)
				<option value="{{ $choice->description }}">{{ $choice->description }}</option>
				@endforeach
			</select>

			<br>
		</div>

		<div class="col-md-12">
			<label>Success</label>
			<?php
			$choices = Choice::where('question_id',34)->get();
			?>
			<select class="form-control" name="educational_attainment">
				<option>Select Success</option>
				@foreach($choices as $choice)
				<option value="{{ $choice->description }}">{{ $choice->description }}</option>
				@endforeach
			</select>

			<br>
		</div>

		<div class="col-md-12">
			<label>Freedom</label>
			<?php
			$choices = Choice::where('question_id',35)->get();
			?>
			<select class="form-control" name="educational_attainment">
				<option>Select Freedom</option>
				@foreach($choices as $choice)
				<option value="{{ $choice->description }}">{{ $choice->description }}</option>
				@endforeach
			</select>

			<br>
		</div>

		<div class="col-md-12">
			<label>Stability</label>
			<?php
			$choices = Choice::where('question_id',36)->get();
			?>
			<select class="form-control" name="educational_attainment">
				<option>Select Stability</option>
				@foreach($choices as $choice)
				<option value="{{ $choice->description }}">{{ $choice->description }}</option>
				@endforeach
			</select>

			<br>
		</div>

		<div class="col-md-12">
			&nbsp;
		</div>

		<div class="col-md-12">
			<input type="submit" class="btn btn-primary form-control" value="Search" style="color: #333; line-height: .3em">
		</div>
		</form>

	</div>

		</div>

		<div class="col-md-4">
			&nbsp;
		</div>

	</div>
	</div>
</div>

@include('layouts.portal_footer')