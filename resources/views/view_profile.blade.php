@include('layouts.portal_header')
@include('layouts.modals')
<?php
use App\Question;
use App\Answer;
use App\Choice;
use App\File;
use App\Bookmark;
use App\Description;
use App\Verification;

$strengths = Description::where('type','Strength')->where('user_id',Auth::user()->id)->get();
$essentials = Description::where('type','Essential')->where('user_id',Auth::user()->id)->get();
?>

<div class="container" style="padding-top: 50px; padding-bottom: 70px">

	@if(Session::get('success'))
	<div class="alert alert-success" role="alert">
	  <i class="fa fa-envelope"></i> {{ Session::get('success') }}
	</div>
	@endif

	<div class="well" style="box-shadow: 0px 1px 8px 1px #dedede; background: #fff">

		<?php
		if($user->type == 'VA'){

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
		}else if($user->type == 'Entrepreneur'){

			$skills_editorial = Answer::where('question_id',77)->where('user_id',$user->id)->first()->description;

			$skills_marketing = Answer::where('question_id',78)->where('user_id',$user->id)->first()->description;

			$skills_admin = Answer::where('question_id',79)->where('user_id',$user->id)->first()->description;

			$skills_finance = Answer::where('question_id',80)->where('user_id',$user->id)->first()->description;

			$skills_design = Answer::where('question_id',81)->where('user_id',$user->id)->first()->description;

			$skills_sales = Answer::where('question_id',82)->where('user_id',$user->id)->first()->description;

			$preferences_editorial = Answer::where('question_id',83)->where('user_id',$user->id)->first()->description;

			$preferences_marketing = Answer::where('question_id',85)->where('user_id',$user->id)->first()->description;

			$preferences_admin = Answer::where('question_id',86)->where('user_id',$user->id)->first()->description;

			$preferences_finance = Answer::where('question_id',87)->where('user_id',$user->id)->first()->description;

			$preferences_design = Answer::where('question_id',88)->where('user_id',$user->id)->first()->description;

			$preferences_sales = Answer::where('question_id',88)->where('user_id',$user->id)->first()->description;
		}
		?>

		<div class="row">

			<div class="col-md-9">

				<div class="row">

					<div class="col-sm-3">

						@if($user->avatar)
						<img src="{{ url($user->avatar) }}" width="100%">
						@else
						<img src="{{ url('assets/img/logo2.png') }}" width="100%">

						@endif

					</div>

					<div class="col-md-5">

						@if($user->type == 'VA')
							<h3>{{ Answer::where('question_id',3)->where('user_id',$user->id)->first()->description }} @if(Bookmark::where('en_id',Auth::user()->id)->where('va_id',$user->id)->exists())
							<a href="{{ url('unbookmark-va/'.$user->id) }}" style="text-decoration: none;">
							<i class="fa fa-star"></i>
						</a></h3> 
							
							@else
							<a href="{{ url('bookmark-va/'.$user->id) }}" style="text-decoration: none;">
							<i class="fa fa-star-o"></i>
						</a>
						@endif
						@else
							<h3>{{ Answer::where('question_id',58)->where('user_id',$user->id)->first()->description }}</h3>
						@endif

						@if($user->type == 'VA')
						<h3>
							{{ Answer::where('question_id',109)->where('user_id',$user->id)->first()->description }}</h3>
							@else
							<h3>
								{{ Answer::where('question_id',70)->where('user_id',$user->id)->first()->description }}
							</h3>
							@endif

							@if($skills_editorial == 4)
							<span class="badge badge-warning" style="background: #fbae5c">Editorial</span>
							@endif

							@if($skills_marketing == 4)
							<span class="badge badge-warning" style="background: #fff568">Marketing</span>
							@endif

							@if($skills_admin == 4)
							<span class="badge badge-warning" style="background: #79d3ed">Admin</span>
							@endif

							@if($skills_finance == 4)
							<span class="badge badge-warning" style="background: #abd373">Finance</span>
							@endif

							@if($skills_design == 4)
							<span class="badge badge-warning" style="background: #e4b9e6">Design</span>
							@endif

							@if($skills_sales == 4)
							<span class="badge badge-warning" style="background: #f4989d">Sales</span>
							@endif
							
						</div>

						<div class="col-md-4">
							@if(File::where('type','Resume')->where('user_id',$user->id)->exists())
								<a href="{{ url(File::where('type','Resume')->where('user_id',$user->id)->first()->document) }}">
							<input type="button" class="btn btn-primary" value="VIEW CV / PORTFOLIO" style="color: #333;background:#30c3e7;border: 1px solid #30c3e7;">
							</a>
							@else
								<a href="#">
							<input type="button" class="btn btn-primary" value="VIEW CV / PORTFOLIO" style="color: #333;background:#30c3e7;border: 1px solid #30c3e7;">
							</a>
							@endif

						</div>

					</div>

					<hr>

					<h3>About</h3>
					@if($user->type == 'VA')
					{{ Answer::where('question_id',14)->where('user_id',$user->id)->first()->description }}
					@else
					{{ Answer::where('question_id',65)->where('user_id',$user->id)->first()->description }}
					@endif

					<hr>

					<!-- PROGRESS BAR SECTION -->
					<div class="row">

						<div class="col-md-6">

							<h3>Skills</h3>

							<div class="row">

								<div class="col-md-4">
									<big><b>Editorial</b></big>
								</div>

								<div class="col-md-8">

									<div class="progress">

										@if($skills_editorial == 1)
										<div class="progress-bar bg-success" role="progressbar" style="width: 25%;background: #fbae5c" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100"></div>
										@elseif($skills_editorial == 2)
										<div class="progress-bar bg-success" role="progressbar" style="width: 50%;background: #fbae5c" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100"></div>
										@elseif($skills_editorial == 3)
										<div class="progress-bar bg-success" role="progressbar" style="width: 75%;background: #fbae5c" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100"></div>
										@elseif($skills_editorial == 4)
										<div class="progress-bar bg-success" role="progressbar" style="width: 100%;background: #fbae5c" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100"></div>
										@endif
									</div>



								</div>

								<div class="col-md-12">
									&nbsp;
								</div>

								<div class="col-md-4">
									<big><b>Marketing</b></big>
								</div>

								<div class="col-md-8">
									<div class="progress">
										@if($skills_marketing == 1)
										<div class="progress-bar bg-success" role="progressbar" style="width: 25%;background: #fff568" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100"></div>
										@elseif($skills_marketing == 2)
										<div class="progress-bar bg-success" role="progressbar" style="width: 50%;background: #fff568" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100"></div>
										@elseif($skills_marketing == 3)
										<div class="progress-bar bg-success" role="progressbar" style="width: 75%;background: #fff568" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100"></div>
										@elseif($skills_marketing == 4)
										<div class="progress-bar bg-success" role="progressbar" style="width: 100%;background: #fff568" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100"></div>
										@endif
									</div>
								</div>

								<div class="col-md-12">
									&nbsp;
								</div>

								<div class="col-md-4">
									<big><b>Admin</b></big>
								</div>

								<div class="col-md-8">
									<div class="progress">
										@if($skills_admin == 1)
										<div class="progress-bar bg-success" role="progressbar" style="width: 25%;background: #79d3ed" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100"></div>
										@elseif($skills_admin == 2)
										<div class="progress-bar bg-success" role="progressbar" style="width: 50%;background: #79d3ed" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100"></div>
										@elseif($skills_admin == 3)
										<div class="progress-bar bg-success" role="progressbar" style="width: 75%;background: #79d3ed" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100"></div>
										@elseif($skills_admin == 4)
										<div class="progress-bar bg-success" role="progressbar" style="width: 100%;background: #79d3ed" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100"></div>
										@endif
									</div>
								</div>

								<div class="col-md-12">
									&nbsp;
								</div>

								<div class="col-md-4">
									<big><b>Finance</b></big>
								</div>

								<div class="col-md-8">
									<div class="progress">
										@if($skills_finance == 1)
										<div class="progress-bar bg-success" role="progressbar" style="width: 25%;background: #abd373" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100"></div>
										@elseif($skills_finance == 2)
										<div class="progress-bar bg-success" role="progressbar" style="width: 50%;background: #abd373" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100"></div>
										@elseif($skills_finance == 3)
										<div class="progress-bar bg-success" role="progressbar" style="width: 75%;background: #abd373" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100"></div>
										@elseif($skills_finance == 4)
										<div class="progress-bar bg-success" role="progressbar" style="width: 100%;background: #abd373" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100"></div>
										@endif
									</div>
								</div>

								<div class="col-md-12">
									&nbsp;
								</div>

								<div class="col-md-4">
									<big><b>Design</b></big>
								</div>

								<div class="col-md-8">
									<div class="progress">
										@if($skills_design == 1)
										<div class="progress-bar bg-success" role="progressbar" style="width: 25%;background: #e4b9e6" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100"></div>
										@elseif($skills_design == 2)
										<div class="progress-bar bg-success" role="progressbar" style="width: 50%;background: #e4b9e6" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100"></div>
										@elseif($skills_design == 3)
										<div class="progress-bar bg-success" role="progressbar" style="width: 75%;background: #e4b9e6" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100"></div>
										@elseif($skills_design == 4)
										<div class="progress-bar bg-success" role="progressbar" style="width: 100%;background: #e4b9e6" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100"></div>
										@endif
									</div>
								</div>

								<div class="col-md-12">
									&nbsp;
								</div>

								<div class="col-md-4">
									<big><b>Sales / CRM</b></big>
								</div>

								<div class="col-md-8">

									<div class="progress">
										@if($skills_sales == 1)
										<div class="progress-bar bg-success" role="progressbar" style="width: 25%;background: #f4989d" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100"></div>
										@elseif($skills_sales == 2)
										<div class="progress-bar bg-success" role="progressbar" style="width: 50%;background: #f4989d" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100"></div>
										@elseif($skills_sales == 3)
										<div class="progress-bar bg-success" role="progressbar" style="width: 75%;background: #f4989d" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100"></div>
										@elseif($skills_sales == 4)
										<div class="progress-bar bg-success" role="progressbar" style="width: 100%;background: #f4989d" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100"></div>
										@endif
									</div>

								</div>

								<div class="col-md-12">
									&nbsp;
								</div>

							</div>

						</div>

						<div class="col-md-6">

							<h3>Preferences</h3>

							<div class="row">

								<div class="col-md-4">
									<big><b>Editorial</b></big>
								</div>

								<div class="col-md-8">
									<div class="progress">
										@if($preferences_editorial == 1)
										<div class="progress-bar bg-success" role="progressbar" style="width: 25%;background: #fbae5c" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100"></div>
										@elseif($preferences_editorial == 2)
										<div class="progress-bar bg-success" role="progressbar" style="width: 50%;background: #fbae5c" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100"></div>
										@elseif($preferences_editorial == 3)
										<div class="progress-bar bg-success" role="progressbar" style="width: 75%;background: #fbae5c" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100"></div>
										@elseif($preferences_editorial == 4)
										<div class="progress-bar bg-success" role="progressbar" style="width: 100%;background: #fbae5c" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100"></div>
										@endif
									</div>
								</div>

								<div class="col-md-12">
									&nbsp;
								</div>

								<div class="col-md-4">
									<big><b>Marketing</b></big>
								</div>

								<div class="col-md-8">
									<div class="progress">
										@if($preferences_marketing == 1)
										<div class="progress-bar bg-success" role="progressbar" style="width: 25%;background: #fff568" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100"></div>
										@elseif($preferences_marketing == 2)
										<div class="progress-bar bg-success" role="progressbar" style="width: 50%;background: #fff568" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100"></div>
										@elseif($preferences_marketing == 3)
										<div class="progress-bar bg-success" role="progressbar" style="width: 75%;background: #fff568" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100"></div>
										@elseif($preferences_marketing == 4)
										<div class="progress-bar bg-success" role="progressbar" style="width: 100%;background: #fff568" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100"></div>
										@endif
									</div>
								</div>

								<div class="col-md-12">
									&nbsp;
								</div>

								<div class="col-md-4">
									<big><b>Admin</b></big>
								</div>

								<div class="col-md-8">
									<div class="progress">
										@if($preferences_admin == 1)
										<div class="progress-bar bg-success" role="progressbar" style="width: 25%;background: #79d3ed" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100"></div>
										@elseif($preferences_admin == 2)
										<div class="progress-bar bg-success" role="progressbar" style="width: 50%;background: #79d3ed" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100"></div>
										@elseif($preferences_admin == 3)
										<div class="progress-bar bg-success" role="progressbar" style="width: 75%;background: #79d3ed" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100"></div>
										@elseif($preferences_admin == 4)
										<div class="progress-bar bg-success" role="progressbar" style="width: 100%;background: #79d3ed" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100"></div>
										@endif
									</div>
								</div>

								<div class="col-md-12">
									&nbsp;
								</div>

								<div class="col-md-4">
									<big><b>Finance</b></big>
								</div>

								<div class="col-md-8">

									<div class="progress">
										@if($preferences_finance == 1)
										<div class="progress-bar bg-success" role="progressbar" style="width: 25%;background: #abd373" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100"></div>
										@elseif($preferences_finance == 2)
										<div class="progress-bar bg-success" role="progressbar" style="width: 50%;;background: #abd373" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100"></div>
										@elseif($preferences_finance == 3)
										<div class="progress-bar bg-success" role="progressbar" style="width: 75%;;background: #abd373" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100"></div>
										@elseif($preferences_finance == 4)
										<div class="progress-bar bg-success" role="progressbar" style="width: 100%;;background: #abd373" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100"></div>
										@endif
									</div>

								</div>

								<div class="col-md-12">
									&nbsp;
								</div>

								<div class="col-md-4">
									<big><b>Design</b></big>
								</div>

								<div class="col-md-8">

									<div class="progress">
										@if($preferences_design == 1)
										<div class="progress-bar bg-success" role="progressbar" style="width: 25%;background: #e4b9e6" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100"></div>
										@elseif($preferences_design == 2)
										<div class="progress-bar bg-success" role="progressbar" style="width: 50%;background: #e4b9e6" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100"></div>
										@elseif($preferences_design == 3)
										<div class="progress-bar bg-success" role="progressbar" style="width: 75%;background: #e4b9e6" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100"></div>
										@elseif($preferences_design == 4)
										<div class="progress-bar bg-success" role="progressbar" style="width: 100%;background: #e4b9e6" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100"></div>
										@endif
									</div>

								</div>

								<div class="col-md-12">
									&nbsp;
								</div>

								<div class="col-md-4">
									<big><b>Sales / CRM</b></big>
								</div>

								<div class="col-md-8">

									<div class="progress">
										@if($preferences_sales == 1)
										<div class="progress-bar bg-success" role="progressbar" style="width: 25%;background: #f4989d" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100"></div>
										@elseif($preferences_sales == 2)
										<div class="progress-bar bg-success" role="progressbar" style="width: 50%;background: #f4989d" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100"></div>
										@elseif($preferences_sales == 3)
										<div class="progress-bar bg-success" role="progressbar" style="width: 75%;background: #f4989d" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100"></div>
										@elseif($preferences_sales == 4)
										<div class="progress-bar bg-success" role="progressbar" style="width: 100%;background: #f4989d" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100"></div>
										@endif
									</div>

								</div>

								<div class="col-md-12">
									&nbsp;
								</div>

							</div>

						</div>

					</div>
					<!-- PROGRESS BAR SECTION -->

					<!-- ESSENTIALS SECTION -->
					<div class="row">

						<div class="col-md-6">
							@if(Auth::user()->type == 'VA')
							<h4>Essential Tools</h4>
							@else
							<h4>Tools For The Role</h4>
							@endif

							@foreach($essentials as $essential)
							{{ $essential->content }}
							<br>
							@endforeach
						</div>

						<div class="col-md-6">
							@if(Auth::user()->type == 'VA')
							<h4>Strengths</h4>
							@else
							<h4>Strengths For The Role</h4>
							@endif

							@foreach($strengths as $strength)
							{{ $strength->content }}
							<br>
							@endforeach
						</div>

					</div>
					<!-- ESSENTIALS SECTION -->

					<hr>

					<div class="row">

						@if($user->type == 'VA')
						<div class="col-md-6">

							<h4>Highest Position Held</h4>

							<h5>
								{{ Answer::where('question_id',24)->where('user_id',$user->id)->first()->description }}
							</h5>

						</div>

						<div class="col-md-6">
							<h4>Education</h4>

							<h5>
								{{ Answer::where('question_id',20)->where('user_id',$user->id)->first()->description }}
							</h5>


						</div>
						@else
						<div class="col-md-12">
							<h4>Company</h4>

							{{ Answer::where('question_id',65)->where('user_id',$user->id)->first()->description }}

							<br><br>
							<a href="{{ Answer::where('question_id',75)->where('user_id',$user->id)->first()->description }}">{{ Answer::where('question_id',75)->where('user_id',$user->id)->first()->description }}</a>
						</div>
						@endif

					</div>

				</div>

				<div class="col-md-3">
					@if($user->type == 'VA')
					<h4 style="margin-bottom: 0px">{{ Answer::where('question_id',19)->where('user_id',$user->id)->first()->description }}</h4>
					Desired Salary Per Month
					@else
					<h4 style="margin-bottom: 0px">{{ Answer::where('question_id',69)->where('user_id',$user->id)->first()->description }}</h4>
					Maximum Budget Per Month
					@endif

					<br><br>
					<input type="button" class="btn btn-primary" value="CONTACT" style="color: #333;background:#30c3e7;border: 1px solid #30c3e7;" data-toggle="modal" data-target="#contactModal">
					<br><br>
					Contacted last {{ date('m/d/Y',strtotime(Verification::where('user_id',$user->id)->first()->created_at)) }}
					<br>

					@if($user->type == 'Entrepreneur')
					<h4 style="margin-bottom: 0px">Employed</h4>
					{{ Answer::where('question_id',72)->where('user_id',$user->id)->first()->description }}
					@endif

					@if($user->type == 'Entrepreneur')
					<h4 style="margin-bottom: 0px">Business</h4>
					{{ Answer::where('question_id',73)->where('user_id',$user->id)->first()->description }}
					@endif

					@if($user->type == 'VA')
					<h4 style="margin-bottom: 0px">Online Work</h4>
					{{ Answer::where('question_id',23)->where('user_id',$user->id)->first()->description }}
					<br>
					@endif

					

					@if($user->type == 'VA')
					<h4 style="margin-bottom: 0px">Offline Work</h4>
					{{ Answer::where('question_id',22)->where('user_id',$user->id)->first()->description }}
					<br><br>
					@endif

					

					<h3>Availability</h3>
					@if($user->type == 'VA')
					<h4 style="margin-bottom: 0px">Available</h4>
					{{ Answer::where('question_id',18)->where('user_id',$user->id)->first()->description }}
					@endif

					<h4 style="margin-bottom: 0px">Voice Calls</h4>
					@if($user->type == 'VA')
					{{ Answer::where('question_id',39)->where('user_id',$user->id)->first()->description }}
					@else
					{{ Answer::where('question_id',90)->where('user_id',$user->id)->first()->description }}
					@endif

					<br><br>

					@if($user->type == 'VA')
					<h4 style="margin-bottom: 0px">English Proficiency</h4>
					{{ Answer::where('question_id',108)->where('user_id',$user->id)->first()->description }}
					@else
					<h4 style="margin-bottom: 0px">Training Preference</h4>
					Some - I can do training
					@endif

					<br><br>

					<form action="#" method="post">
						<input type="text" name="description" class="form-control" placeholder="Search">
					</form>
				</div>


			</div>

		</div>


	</div>

	<!-- Modal -->
<div class="modal fade" id="contactModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">

      <div class="modal-body">

        <center>
        <h3>Contact</h3>
        </center>
        
        <form action="{{ url('send-email-to-va') }}" method="post">
          
          {{ csrf_field() }}

          <input type="hidden" name="user_id" value="{{ $user->id }}">

          <label>Fullname</label>
          <input type="text" name="name" class="form-control" value="{{ Answer::where('question_id',3)->where('user_id',$user->id)->first()->description }}">

          <br>

          <label>Return To Email</label>
          <input type="email" name="email" value="{{ Auth::user()->email }}" class="form-control">

          <br>

          <label>Subject</label>
          <input type="text" name="subject" value="Are you available for work?" class="form-control">

          <br>

          <label>Use Email Template</label>
          <select name="email_template" class="form-control">
            <option value="Are you available for work">Are you available for work?</option>
          </select>

          <br>

          <label>Message</label>
          <textarea name="description" class="form-control" rows="7">Hi!

          Hope you are having a great day. Just wondering if you are currently available for a part time job? If so please let me know and I will contact you about the details.

          Thanks.

          {{ Auth::user()->firstname }} {{ Auth::user()->lastname }}
          </textarea>

          <br>

          <input type="submit" class="form-control btn btn-primary" value="Send Message" style="color: #333;background:#30c3e7;border: 1px solid #30c3e7; line-height: .3em">

        </form>

      </div>

    </div>
  </div>
</div>
<!-- Modal -->

	@include('layouts.portal_footer')