@extends('layouts.guest_master')
@section('content')
<div class="container">
	<div id="content">
		
		<form action="{{route('post_signup')}}" method="post" class="beta-form-checkout">
			<input type="hidden" name="_token" value="{{csrf_token()}}">
			@if ($errors->any())
			<div class="alert alert-danger">
				<ul>
					@foreach ($errors->all() as $error)
					<li>{{ $error }}</li>
					@endforeach
				</ul>
			</div>
			@endif
			
			<div class="row">
				<div class="col-sm-3">
					
					<img src="source/image/welcome/kane.gif">
					
				</div>
				<div class="col-sm-6">
					<h4>Form signup</h4>
					<div class="space20">&nbsp;</div>

					<div class="form-block">
						<label for="name">User name*</label>
						<input type="text" id="name" name="name" required>
					</div>

					<div class="form-block">
						<label for="email">Email address*</label>
						<input type="email" id="email"  name="email" required>
					</div>

					<div class="form-block">
						<label for="password">Password*</label>
						<input type="password" id="password" name="password" required>
					</div>
					<div class="form-block">
						<label for="re_password">Re password*</label>
						<input type="password" id="re_password" name="re_password" required>
					</div>
					<div class="form-block">
						<button type="submit" class="btn btn-primary">Register</button>
					</div>
				</div>
				<div class="col-sm-3">
					<img src="source/image/welcome/aguero.gif">
				</div>
			</div>
		</form>
	</div> <!-- #content -->
</div> <!-- .container -->
@endsection
