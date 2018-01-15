@include('layouts.portal_header')
<?php
use App\Question;
use App\Answer;
use App\Choice;
use App\File;
use App\Description;
use App\User;
?>

<div class="container">

	<h2>Matches</h2>
	
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
				<td>Interview</td>
				<td>Remove</td>
			</tr>
		</thead>

		<tbody>
			@foreach($matches as $item)
			<tr>
				<td>
					@if(User::find($item->va_id)->type)
					{{ User::find($item->va_id)->type }}
					@else
					N/A
					@endif
				</td>
				<td>{{ User::find($item->va_id)->firstname }} {{ User::find($item->va_id)->lastname }}</td>
				<td>{{ User::find($item->va_id)->country }}</td>
				<td>
					@if(User::find($item->va_id)->educational_attainment)
					{{ User::find($item->va_id)->educational_attainment }}
					@else
					N/A
					@endif
				</td>
				<td>
					@if(User::find($item->va_id)->course)
					{{ User::find($item->va_id)->course }}
					@else
					N/A
					@endif
				</td>
				<td>{{ User::find($item->va_id)->email }}</td>
				<td>{{ User::find($item->va_id)->mobile_number }}</td>
				<td>
					@if(User::find($item->va_id)->status == 1)
						<b style="color:green">Matched</b>
					@else
						<b style="color:red">Removed</b>
					@endif
				</td>

				<td>
					@if(User::find($item->va_id)->status == 1)
					<a href="{{ url('set-interview/'.User::find($item->va_id)->id) }}">
						<input type="button" class="btn btn-primary" value="Interview">
					</a>
					@else
					N/A
					@endif
				</td>

				<td>
					@if(User::find($item->va_id)->status == 1)
					<a href="{{ url('remove-match/'.User::find($item->va_id)->id) }}">
						<input type="button" class="btn btn-danger" value="Remove">
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
		{{ $matches->links() }}
	</center>
</div>

@include('layouts.portal_footer')