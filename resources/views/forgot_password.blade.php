@include('layouts.header')

<div class="container" style="padding-top: 50px; padding-bottom: 70px">

	<form action="{{ url('forgot-password') }}" method="post">

		{{ csrf_field() }}

		<div class="row">

			<div class="col-md-4">
				&nbsp;
			</div>

			<div class="col-md-4">

				<div class="well" style="box-shadow: 0px 1px 8px 1px #dedede; background: #fff">

				<center>
				<h3 style="color:#333;">Forgot Password</h3>
				</center>

				@if($errors->any() || Session::get('error'))
				<div class="alert alert-danger" role="alert">
				  ERROR: The password you entered is incorrect. <a href="{{ url('forgot-password') }}">Lost your password?</a>
				</div>
				@endif

				<br>

				<label style="color:#333;">Username or Email</label>
				<input type="email" name="email" class="form-control" placeholder="Email" required>

					<br><br>

					<input type="submit" class="btn btn-primary form-control" value="Submit" style=" background: #fffa00;
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

					<a href="#" style="color:#333;">
					Have an account already? Log In
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