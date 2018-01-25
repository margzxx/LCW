@include('layouts.header')

<div class="container" style="padding-top: 50px; padding-bottom: 70px">

	<form action="{{ url('reset-password') }}" method="post">

		{{ csrf_field() }}

		<input type="hidden" name="user_id" value="{{ $user->id }}">

		<div class="row">

			<div class="col-md-4">
				&nbsp;
			</div>

			<div class="col-md-4">

				<div class="well" style="box-shadow: 0px 1px 8px 1px #dedede; background: #fff">

				<center>
				<h3 style="color:#333;">Reset Password</h3>
				</center>

				@if($errors->any() || Session::get('error'))
				<div class="alert alert-danger" role="alert">
				  ERROR: The password you entered is incorrect.
				</div>
				@endif

				<br>

				<label style="color:#333;">Old Password</label>
				<input type="password" name="old_password" class="form-control" placeholder="Password" required>

				<br>

				<label style="color:#333;">New Password</label>
				<input type="password" name="new_password" class="form-control" placeholder="Password" required>

				<br>

				<label style="color:#333;">Confirm New Password</label>
				<input type="password" name="confirm_new_password" class="form-control" placeholder="Password" required>

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