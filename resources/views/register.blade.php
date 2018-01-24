@include('layouts.header')

<div class="container" style="padding-top: 50px; padding-bottom: 70px">

	<div class="row">

		<div class="col-md-4">
			&nbsp;
		</div>

		<div class="col-md-4">

			<div class="well" style="box-shadow: 0px 1px 8px 1px #dedede;">

				<center>
					<h3 style="color: #333">Sign Up</h3>
				</center>

				@if($errors->any())
				<div class="alert alert-danger" role="alert">
					<b>Oops! We have an error here.</b>
					@foreach($errors->all() as $error)
				  	<li>{{ $error }}</li>
				  	@endforeach
				</div>
				@endif

				<br><br>

				<form action="{{ url('register') }}" method="post">

					{{ csrf_field() }}


					<label style="color:#333;">Firstname</label>
					<input type="text" name="firstname" class="form-control" placeholder="Firstname" required>

					<br>


					<label style="color:#333;">Lastname</label>
					<input type="text" name="lastname" class="form-control" placeholder="Lastname" required>

					<br>

					<label style="color:#333;">Email</label>
					<input type="email" name="email" class="form-control" placeholder="Email" required>

					<br>

					<label style="color:#333;">Password</label>
					<input type="password" name="password" class="form-control" placeholder="Password" required>

					<br>

					<label style="color:#333;">Confirm Password</label>
					<input type="password" name="confirm_password" class="form-control" placeholder="Confirm Password" required>

					<br>

					<label style="color:#333;">Country</label>
					<select name="country" class="form-control">
						@foreach($countries as $item)
						<option value="{{ $item->name }}">{{ $item->name }}</option>
						@endforeach
					</select>

					<br>

					<label style="color:#333;">Mobile Number</label>
					<input type="text" name="mobile_number" class="form-control" placeholder="Mobile Number" required>

					<br>

					<label style="color:#333;">Gender</label>
					<br>
					<input type="radio" name="gender" value="Male"> Male
					&nbsp;&nbsp;
					<input type="radio" name="gender" value="Female" checked> Female

					<br><br>

					<label style="color:#333;">Type</label>
					<br>
					<input type="radio" name="type" value="Entrepreneur"> Hire
					&nbsp;&nbsp;
					<input type="radio" name="type" value="VA" checked> Work

					<br><br>

					<input type="submit" class="btn btn-primary form-control" style=" background: #fffa00;
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

				</form>

			</div>

		</div>

		<div class="col-md-4">
			&nbsp;
		</div>
	</div>

</div>

@include('layouts.footer')