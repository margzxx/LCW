@include('layouts.header')

<div class="container" style="padding-top: 50px; padding-bottom: 70px">

		<div class="row">

			<div class="col-md-3">
				&nbsp;
			</div>

			<div class="col-md-6">

				<div class="well" style="box-shadow: 0px 1px 8px 1px #dedede; background: #fff">

				<center>
				<h3 style="color:#333;">Welcome To Connected Women</h3>
				</center>

				<br>

				<center>
				<h3 style="color:#333;">Password successfuly updated</h3>
				<p>Thank you for providing your details. You may now login your credentials to our website.</p>

				<br>

				<a href="{{ url('login') }}">
				<input type="button" class="btn btn-primary" value="Go Back To Login" style="color: #333;">
				</a>
				</center>


				</div>

			</div>

			<div class="col-md-3">
				&nbsp;
			</div>

		</div>


</div>


@include('layouts.footer')