@include('layouts.portal_header')
<?php
use App\Question;
use App\Answer;
use App\Choice;
use App\File;
use App\Description;
?>

<div class="container">

	<h2>Manage Users</h2>

	<form action="{{ url('filter-manage-users') }}" method="post">
		
		{{ csrf_field() }}

		<div class="row">

			<div class="col-md-3">

				<select name="type" class="form-control">
					<option value="">Select User Type</option>
					<option value="VA">VA</option>
					<option value="Entrepreneur">Entrepreneur</option>
				</select>

			</div>

			<div class="col-md-3">

				<select name="country" class="form-control">
					<option value="">Select Country</option>
					@foreach($countries as $country)
					<option value="{{ $country->name }}">{{ $country->name }}</option>
					@endforeach
				</select>

			</div>

			<div class="col-md-3">

				<select name="status" class="form-control">
					<option value="">Select Account Status</option>
					<option value="1">Activated</option>
					<option value="0">Deactivated</option>
				</select>

			</div>

			<div class="col-md-3">
				<input type="submit" class="btn btn-primary form-control" style="line-height: .3em; color: #333">
			</div>

		</div>

	</form>
	
	<table class="table">
		<thead>
			<tr>
				<td>Type</td>
				<td>Name</td>
				<td>Country</td>
				<td>Educational Attainment</td>
				<td>Course</td>
				<td>E-mail</td>
				<td>Mobile Number</td>
				<td>Status</td>
				<td>Activate</td>
				<td>Deactivate</td>
			</tr>
		</thead>

		<tbody>
			@foreach($users as $item)
			<tr>
				<td>
					@if($item->type)
					{{ $item->type }}
					@else
					N/A
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
					@if($item->status == 1)
						<b style="color:green">Activated</b>
					@else
						<b style="color:red">Deactivated</b>
					@endif
				</td>
				<td>
					@if($item->status == 0)
					<a href="{{ url('activate-user/'.$item->id) }}">
						<input type="button" class="btn btn-primary" value="Activate" style="color: #333">
					</a>
					@else
					N/A
					@endif
				</td>

				<td>
					@if($item->status == 1)
					<a href="{{ url('deactivate-user/'.$item->id) }}">
						<input type="button" class="btn btn-primary" value="Deactivate" style="color: #333">
					</a>
					@else
					N/A
					@endif
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