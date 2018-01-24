@include('layouts.portal_header')

<div class="container" style="padding-top: 50px; padding-bottom: 70px">

		<div class="row">

			<div class="col-md-3">
				&nbsp;
			</div>

			<div class="col-md-6">

				<div class="well" style="box-shadow: 0px 1px 8px 1px #dedede; background: #fff">

				<center>
				<h3 style="color:#333;">Awesome!</h3>
				</center>

				<br>

				<center>
				<h3 style="color:#333;">Thank you for completing your profile!</h3>
				<p>We can now accurately find the best match for you based on the information that you have provided. We will get back to you after 3-7 days with the list of employers that matched your profile. Watch out for our E-mail!</p>

				<br>

				<a href="{{ url('my-profile') }}">
				<input type="button" class="btn btn-primary" value="Go To Profile" style="color: #333;">
				</a>
				</center>


				</div>

			</div>

			<div class="col-md-3">
				&nbsp;
			</div>

		</div>


</div>


@include('layouts.portal_footer')