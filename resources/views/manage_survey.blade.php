@include('layouts.portal_header')
<?php
use App\Question;
use App\Answer;
use App\Choice;
use App\File;
use App\Area;
use App\Description;
?>

<div class="container">

	<h2>Manage Survey</h2>

	<a href="{{ url('add-question') }}" style="text-decoration: none">
		<input type="button" class="btn btn-primary" value="Add Question" style="color: #333;">
	</a>

	<br><br>

	<form action="{{ url('filter-manage-survey') }}" method="post">

		{{ csrf_field() }}

	<div class="row">

		<div class="col-md-10">
			<input type="text" name="description" class="form-control" placeholder="Search question here...">
		</div>

		<div class="col-md-2">
			<input type="submit" class="btn btn-primary form-control" value="Search" style="color: #333;line-height: .3em">
		</div>

	</div>

	</form>
	
	<table class="table table-bordered">
		<thead>
			<tr>
				<td>ID</td>
				<td>For</td>
				<td>Area</td>
				<td>Type</td>
				<td>Question</td>
				<td>Choice/s</td>
				<td>Edit</td>
				<td>Delete</td>
			</tr>
		</thead>

		<tbody>
			@foreach($questions as $item)
			<?php
			$choices = Choice::where('question_id',$item->id)->get();
			?>
			<tr>
				<td>{{ $item->id }}</td>
				<td>{{ $item->scope }}</td>
				<td>{{ Area::find($item->area_id)->description }}</td>
				<td>{{ $item->type }}</td>
				<td>{{ $item->description }}</td>
				<td>
					@if($item->type == 'Text' || $item->type == 'Textarea' || $item->type == 'Date' || $item->type == 'Country' || $item->type == 'Number' || $item->type == 'E-mail' || $item->type == 'Marital Status' || $item->type == 'Gender' || $item->type == 'Multiple Text' || $item->type == 'Yes/No' )
						N/A
					@elseif($item->type == 'Dropdown')
						@foreach($choices as $choice)
						<li>{{ $choice->description }} <a href="{{ url('remove-choice/'.$choice->id) }}" onclick="javascript:return confirm('Are you sure you want to delete this?')">Remove</a></li>
						@endforeach
						<a href="{{ url('add-choice/'.$item->id) }}">Add choice</a>
					@else
						@foreach($choices as $choice)
						<li>{{ $choice->description }}</li>
						@endforeach
					@endif
				</td>
				<td>
					<a href="{{ url('edit-question/'.$item->id) }}">
						<input type="button" class="btn btn-primary" style="color: #333;" value="Edit">
					</a>
				</td>
				<td>
					<a href="{{ url('delete-question/'.$item->id) }}">
						<input type="button" class="btn btn-primary" style="color: #333;" value="Delete" onclick="javascript:return confirm('Are you sure you want to delete this?')">
					</a>
				</td>
			</tr>
			@endforeach
		</tbody>
	</table>


	<center>
		{{ $questions->links() }}
	</center>
</div>

@include('layouts.portal_footer')