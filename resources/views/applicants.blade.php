@include('layouts.portal_header')
<?php
use App\Question;
use App\Answer;
use App\Choice;
use App\File;
use App\Description;
?>

<div class="container">

	<h2>Applicants</h2>

	<div class="row">
		<form action="{{ url('filter-applicants') }}" method="post">

			{{ csrf_field() }}
		<div class="col-md-4">
			<select class="form-control" name="country">
				<option>Select Country</option>
				@foreach($countries as $country)
				<option value="{{ $country->name }}">{{ $country->name }}</option>
				@endforeach
			</select>
		</div>

		<div class="col-md-4">
			<select class="form-control" name="educational_attainment">
				<option>Select Educational Attainment</option>
				<option value="High School">High School</option>
				<option value="Vocational">Vocational</option>
				<option value="College Degree">College Degree</option>
				<option value="Post Graduate">Post Graduate</option>
			</select>
		</div>

		<div class="col-md-4">
			<input type="submit" class="btn btn-primary form-control" style="line-height: .3em; color: #333" value="Search">
		</div>
		</form>

		<div class="col-md-12">
			&nbsp;
		</div>

		<div class="col-md-4">
			<a href="{{ url('advanced-filter-applicants') }}">
			Show advanced filter applicants
		</a>
		</div>

	</div>
	
	
	<table class="table table-bordered">
		<thead>
			<tr>
				<td></td>
				<td>Name</td>
				<td>Country</td>
				<td>Educational Attainment</td>
				<td>Course</td>
				<td>E-mail</td>
				<td>Mobile Number</td>
				<td>View Applicant</td>
			</tr>
		</thead>

		<tbody>
			@foreach($users as $item)
			<tr>
				<td>
					@if($item->avatar)
					<img src="{{ $item->avatar }}" width="100px" class="img img-circle">
					@else
					<img src="{{ url('assets/img/logo2.png') }}" width="100px">
					@endif
				</td>
				<td>{{ $item->firstname }} {{ $item->lastname }}</td>
				<td>{{ $item->country }}</td>
				<td>
					@if($item->educational_attainment)
					{{ $item->educational_attainment }}
					@else
					N/A
					@endif
				</td>
				<td>
					@if($item->course)
					{{ $item->course }}
					@else
					N/A
					@endif
				</td>
				<td>{{ $item->email }}</td>
				<td>{{ $item->mobile_number }}</td>
				<td>
					<a href="{{ url('view-applicant/'.$item->id) }}">
						<input type="button" class="btn btn-primary" value="View Applicant" style="color:#333;">
					</a>
				</td>
			</tr>
			@endforeach
		</tbody>
	</table>


	<center>
		{{ $users->links() }}
	</center>
</div>

@include('layouts.portal_footer')