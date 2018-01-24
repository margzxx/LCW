@include('layouts.portal_header')
<?php
use App\Question;
use App\Answer;
use App\Choice;
use App\File;
use App\Description;
use App\Bookmark;
?>

<div class="container" style="padding-top: 50px; padding-bottom: 70px">

	<div class="row">
		
		<div class="col-md-2">
			<a href="{{ url('dashboard') }}" style="color: #333; text-decoration: none;">
			<h3>Search</h3>
			</a>
		</div>

		<div class="col-md-2">
			<a href="{{ url('past-hires') }}" style="color: #333;text-decoration: none;">
				<h3>Past Hires</h3>
			</a>
		</div>

		<div class="col-md-8">
			<a href="{{ url('bookmarked-profiles') }}" style="color: #333;text-decoration: none;">
				<h3>Bookmarked Profiles ({{ Bookmark::where('en_id',Auth::user()->id)->count() }})</h3>
			</a>
		</div>

	</div>

	<div class="row">

		<form action="{{ url('filter-va') }}" method="post">
			
			{{ csrf_field() }}

			<div class="col-md-10">
				<input type="text" name="profession" class="form-control">
			</div>

			<div class="col-md-2">
				<input type="submit" class="btn btn-primary form-control" style="line-height: .3em">
			</div>

		</form>

	</div>

	@foreach($users as $user)

	<?php
	if(Answer::where('user_id',$user->id)->exists()){

		$skills_editorial = Answer::where('question_id',27)->where('user_id',$user->id)->first()->description;

		$skills_marketing = Answer::where('question_id',28)->where('user_id',$user->id)->first()->description;

		$skills_admin = Answer::where('question_id',29)->where('user_id',$user->id)->first()->description;

		$skills_finance = Answer::where('question_id',30)->where('user_id',$user->id)->first()->description;

		$skills_design = Answer::where('question_id',31)->where('user_id',$user->id)->first()->description;

		$skills_sales = Answer::where('question_id',32)->where('user_id',$user->id)->first()->description;

		$preferences_editorial = Answer::where('question_id',33)->where('user_id',$user->id)->first()->description;

		$preferences_marketing = Answer::where('question_id',34)->where('user_id',$user->id)->first()->description;

		$preferences_admin = Answer::where('question_id',35)->where('user_id',$user->id)->first()->description;

		$preferences_finance = Answer::where('question_id',36)->where('user_id',$user->id)->first()->description;

		$preferences_design = Answer::where('question_id',37)->where('user_id',$user->id)->first()->description;

		$preferences_sales = Answer::where('question_id',38)->where('user_id',$user->id)->first()->description;

	}
	
	?>

	@if(Answer::where('user_id',$user->id)->exists())

	<div class="row">

		<div class="col-sm-2">

						@if($user->avatar)
						<img src="{{ $user->avatar }}" width="100%">
						@else
						<img src="{{ url('assets/img/logo2.png') }}" width="100%">

						@endif

					</div>

					<div class="col-md-3">

							<big><b>{{ Answer::where('question_id',3)->where('user_id',$user->id)->first()->description }}</b></big>

							<br>

						<big><b>
							{{ Answer::where('question_id',109)->where('user_id',$user->id)->first()->description }}</b></big>

							<br>

							@if($skills_editorial == 4)
							<span class="badge badge-warning">Editorial</span>
							@endif

							@if($skills_marketing == 4)
							<span class="badge badge-warning">Marketing</span>
							@endif

							@if($skills_admin == 4)
							<span class="badge badge-warning">Admin</span>
							@endif

							@if($skills_finance == 4)
							<span class="badge badge-warning">Finance</span>
							@endif

							@if($skills_design == 4)
							<span class="badge badge-warning">Design</span>
							@endif

							@if($skills_sales == 4)
							<span class="badge badge-warning">Sales</span>
							@endif

							<br>

							<b style="margin-bottom: 0px">Online Work</b>
					{{ Answer::where('question_id',23)->where('user_id',$user->id)->first()->description }}

					<br>

					<b style="margin-bottom: 0px">Offline Work</b>
					{{ Answer::where('question_id',22)->where('user_id',$user->id)->first()->description }}
							
						</div>

						<div class="col-md-3">
							{{ Answer::where('question_id',14)->where('user_id',$user->id)->first()->description }}
						</div>

						<div class="col-md-4">
							{{ Answer::where('question_id',19)->where('user_id',$user->id)->first()->description }} 
					Desired Salary

						<br>

						{{ Answer::where('question_id',18)->where('user_id',$user->id)->first()->description }}
						</div>

	</div>

	@endif

	@endforeach

</div>

@include('layouts.portal_footer')