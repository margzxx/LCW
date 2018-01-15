@include('layouts.portal_header')
<?php
use App\Question;
use App\Answer;
use App\Choice;
use App\File;
use App\Description;
?>

<div class="container">

	<h2>Manage Areas</h2>

	<a href="{{ url('add-area') }}" style="text-decoration: none;">
		<input type="button" class="btn btn-primary" value="Add Area" style="color: #333;">
	</a>

	<br><br>
	
	<table class="table">
		<thead>
			<tr>
				<td>ID</td>
				<td>Name</td>
				<td>Created At</td>
				<td>Last Updated At</td>
				<td>Edit</td>
				<td>Delete</td>
			</tr>
		</thead>

		<tbody>
			@foreach($areas as $item)
			<tr>
				<td>
					{{ $item->id }}
				</td>
				<td>{{ $item->description }}</td>
				<td>{{ $item->created_at }}</td>
				<td>{{ $item->updated_at }}</td>
				<td>
					<a href="{{ url('edit-area/'.$item->id) }}">
						<input type="button" class="btn btn-primary" value="Edit" style="color: #333">
					</a>
				</td>

				<td>
					<a href="{{ url('delete-area/'.$item->id) }}">
						<input type="button" class="btn btn-primary" value="Delete" style="color: #333">
					</a>
				</td>
			</tr>
			@endforeach
		</tbody>
	</table>


	<center>
		{{ $areas->links() }}
	</center>
</div>

@include('layouts.portal_footer')