@include('layouts.portal_header')
<?php
use App\Question;
use App\Answer;
use App\Choice;
use App\File;
use App\Description;
use App\Verification;
?>

<div class="container">

	<h2>Survey Report</h2>

	<button id="btnExport" class="btn btn-primary">Export to Excel</button>
	<br><br>
<div id="table_wrapper">
	
	<table class="table table-bordered" id="list">
		<thead>
			<tr>
				<td style="border:1px solid #333">Name</td>
				@foreach($questions as $question)
				<td style="border:1px solid #333"><span style="white-space: nowrap;
				overflow: hidden;
				text-overflow: ellipsis;
				display: inline-block;
				max-width: 100%;">{{ $question->description }}</span></td>

				@endforeach
				<td style="border:1px solid #333"><span style="white-space: nowrap;
				overflow: hidden;
				text-overflow: ellipsis;
				display: inline-block;
				max-width: 100%;">
				Status
				</span>
			</td>

				<td style="border:1px solid #333"><span style="white-space: nowrap;
				overflow: hidden;
				text-overflow: ellipsis;
				display: inline-block;
				max-width: 100%;">
				Approve
				</span>
			</td>

				<td style="border:1px solid #333"><span style="white-space: nowrap;
				overflow: hidden;
				text-overflow: ellipsis;
				display: inline-block;
				max-width: 100%;">
					Disapprove
					</span>
				</td>
			</tr>
		</thead>

		<tbody>
			
			@foreach($users as $user)
			<tr>
			<td style="border:1px solid #333"><span style="white-space: nowrap;
				overflow: hidden;
				text-overflow: ellipsis;
				display: inline-block;
				max-width: 100%;">
				{{ $user->firstname }} {{ $user->lastname }}
				</span>
			</td>

			@foreach($questions as $question)
			@if(Answer::where('question_id',$question->id)->where('user_id',$user->id)->exists())
			<td style="border:1px solid #333"><span style="white-space: nowrap;
				overflow: hidden;
				text-overflow: ellipsis;
				display: inline-block;
				max-width: 100%;">
				{{ Answer::where('question_id',$question->id)->where('user_id',$user->id)->first()->description }}</span>
			</td>
			@else
			<td style="border:1px solid #333"><span style="white-space: nowrap;
				overflow: hidden;
				text-overflow: ellipsis;
				display: inline-block;
				max-width: 100%;">
				N/A</span>
			</td>
			@endif

			@endforeach
			<td style="border:1px solid #333"><span style="white-space: nowrap;
				overflow: hidden;
				text-overflow: ellipsis;
				display: inline-block;
				max-width: 100%;">
				@if(Verification::where('user_id',$user->id)->exists())

					@if(Verification::where('user_id',$user->id)->first()->status == 1)
						<b style="color:green">Approved</b>
					@else
						<b style="color:red">Disapproved</b>
					@endif
				@else
					N/A
				@endif
				</span>
			</td>

			<td style="border:1px solid #333"><span style="white-space: nowrap;
				overflow: hidden;
				text-overflow: ellipsis;
				display: inline-block;
				max-width: 100%;">

				@if(Verification::where('user_id',$user->id)->exists())

					N/A

				@else
					<a href="{{ url('approve-user-survey/'.$user->id) }}">
					Approve
					</a>
				@endif
				</span>
			</td>
			<td style="border:1px solid #333"><span style="white-space: nowrap;
				overflow: hidden;
				text-overflow: ellipsis;
				display: inline-block;
				max-width: 100%;">

				@if(Verification::where('user_id',$user->id)->exists())

				N/A

				@else
					<a href="{{ url('disapprove-user-survey/'.$user->id) }}">
				Disapprove
				</a>
				@endif
				</span>
			</td>

			</tr>
			@endforeach


			
		</tbody>
	</table>


</div>

</div>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.2/jquery.min.js"></script>

<script>
    $(document).ready(function() {
  $("#btnExport").click(function(e) {
    e.preventDefault();

    //getting data from our table
    var data_type = 'data:application/vnd.ms-excel';
    var table_div = document.getElementById('table_wrapper');
    var table_html = table_div.outerHTML.replace(/ /g, '%20');

    var a = document.createElement('a');
    a.href = data_type + ', ' + table_html;
    a.download = 'exported_table_' + Math.floor((Math.random() * 9999999) + 1000000) + '.xls';
    a.click();
  });
});
</script>

@include('layouts.portal_footer')