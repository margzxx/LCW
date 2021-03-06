@include('layouts.header')

<div class="container" style="padding-top: 50px; padding-bottom: 70px">

	<form action="{{ url('login') }}" method="post">

		{{ csrf_field() }}

		<div class="row">

			<div class="col-md-4">
				&nbsp;
			</div>

			<div class="col-md-4">

				<div class="well" style="box-shadow: 0px 1px 8px 1px #dedede; background: #fff">

				<center>
				<h3 style="color:#333;">Sign In</h3>
				</center>

				@if($errors->any() || Session::get('error'))
				<div class="alert alert-danger" role="alert">
				  ERROR:  {{ Session::get('error') }}</a>
				</div>
				@endif

				@if($errors->any() || Session::get('invalid-error'))
				<div class="alert alert-danger" role="alert">
				  ERROR: {{ Session::get('invalid-error') }} <a href="{{ url('forgot-password') }}">Lost your password?</a>
				</div>
				@endif

				<br>

				<label style="color:#333;">Username or Email</label>
				<input type="email" name="email" class="form-control" placeholder="Email" required>

				<br>

				<label style="color:#333;">Password</label>
				<input type="password" name="password" class="form-control" placeholder="Password" required>

				<br>
				

					<input type="checkbox" name="is_signed"> Keep me signed in

					<br><br>

					<input type="submit" class="btn btn-primary form-control" value="Login" style=" background: #fffa00;
					line-height: .3em;
    box-shadow: none;
    border: none;
    padding: 27px;
    border-radius: 0 !important;
    font-size: 14px;
    text-shadow: none;
    color: #000;
    box-sizing: border-box;
    text-transform: uppercase;">

				<center>

				<br><br>

					<a href="{{ url('forgot-password') }}" style="color:#333;">
					Forgot your password?
					</a>

					<br><br><br>
				
					Don't have an account yet? <a href="{{ url('register') }}">Sign Up</a>
				</center>

			</div>

			</div>

			<div class="col-md-4">
				&nbsp;
			</div>

		</div>

	</form>





</div>


@include('layouts.footer')