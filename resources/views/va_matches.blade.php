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
			</tr>
		</thead>

		<tbody>
			@foreach($matches as $item)
			<tr>
				<td>
					@if(User::find($item->entrepreneur_id)->type)
					{{ User::find($item->entrepreneur_id)->type }}
					@else
					N/A
					@endif
				</td>
				<td>{{ User::find($item->entrepreneur_id)->firstname }} {{ User::find($item->entrepreneur_id)->lastname }}</td>
				<td>{{ User::find($item->entrepreneur_id)->country }}</td>
				<td>
					@if(User::find($item->entrepreneur_id)->educational_attainment)
					{{ User::find($item->entrepreneur_id)->educational_attainment }}
					@else
					N/A
					@endif
				</td>
				<td>
					@if(User::find($item->entrepreneur_id)->course)
					{{ User::find($item->entrepreneur_id)->course }}
					@else
					N/A
					@endif
				</td>
				<td>{{ User::find($item->entrepreneur_id)->email }}</td>
				<td>{{ User::find($item->entrepreneur_id)->mobile_number }}</td>
				<td>
					@if(User::find($item->entrepreneur_id)->status == 1)
						<b style="color:green">Matched</b>
					@else
						<b style="color:red">Removed</b>
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