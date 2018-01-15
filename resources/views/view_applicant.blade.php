@include('layouts.portal_header')
<?php
use App\Question;
use App\Answer;
use App\Choice;
use App\File;
use App\Description;
use App\Match;
?>

<div class="container">

	<h1>View Applicant</h1>

	<div class="row">

		<div class="col-sm-3">

			@if($user->avatar)
			<img src="{{ url($user->avatar) }}" width="100%">
			@else
			<img src="{{ url('assets/img/logo2.png') }}" width="100%">
			@endif

			<br><br>

			@if(Match::where('entrepreneur_id',Auth::user()->id)->where('va_id',$user->id)->exists())
				You are now matched with this applicant
			@else
				
				<a href="{{ url('match-va/'.$user->id) }}">
				<input type="button" class="btn btn-primary form-control" value="Match VA" style="line-height: .3em; color: #333">
				</a>
			@endif

		</div>

		<div class="col-sm-9">

			<big><b>Personal Information</b></big>


			<h5>E-mail Address</h5>
			{{ $user->email }}
			<br>

			<h5>Firstname</h5>
			{{ $user->firstname }}
			<br>

			<h5>Lastname</h5>
			{{ $user->lastname }}
			<br>

			<h5>Mobile Number</h5>
			{{ $user->mobile_number }}
			<br>

			<div class="row">

				<div class="col-md-6">
					<h5>Gender</h5>
					{{ $user->gender }}
					<br>
				</div>

				<div class="col-md-6">
					<h5>Date of Birth</h5>
					@if($user->birth_date)
					{{ $user->birth_date }}
					@else
					N/A
					@endif
					<br>
				</div>

				<div class="col-md-6">
					<h5>Marital Status</h5>
					@if($user->marital_status)
					{{ $user->marital_status }}
					@else
					N/A
					@endif
					<br>
				</div>

				<div class="col-md-6">
					<h5>Nationality</h5>
					@if($user->nationality)
					{{ $user->nationality }}
					@else
					N/A
					@endif
					<br>
				</div>

				<div class="col-md-12">
					<h5>Residence</h5>
					@if($user->residence)
					{{ $user->residence }}
					@else
					N/A
					@endif
					<br>
				</div>

			</div>

			<h5>No. of Dependents</h5>
			@if($user->no_of_dependents)
			{{ $user->no_of_dependents }}
			@else
			N/A
			@endif
			<br>

			<h5>Short Summary</h5>
			@if(Description::where('type','Short Summary')->where('user_id',$user->id)->exists())
			{{ Description::where('type','Short Summary')->where('user_id',$user->id)->first()->content }}
			@else
			N/A
			@endif


			<h5>About Me</h5>
			@if(Description::where('type','About Me')->where('user_id',$user->id)->exists())
			{{ Description::where('type','About Me')->where('user_id',$user->id)->first()->content }}
			@else
			N/A
			@endif
			

			<hr>
			<?php
			$field = 1;
			?>

			@foreach($answers as $item)
			@if($field == 1)
			<hr>
			<big><b>{{ $item->area }}</b></big>

			<?php
			$field = 0;
			$last_area = $item->area;
			?>
			@else
			@if($last_area == $item->area)

			@else
			<?php
			$field = 1;
			?>

			@endif
			@endif
			<h5>{{ Question::find($item->question_id)->description }}</h5>
			{{ $item->description }}

			<br><br>

			@endforeach

		</div>
		
	</div>

</div>

@include('layouts.portal_footer')