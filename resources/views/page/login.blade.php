@extends('layouts.guest_master')

@section('content')

<div class="container">
	<div id="content">
		<form action="{{route('post_login')}}" method="post" class="beta-form-checkout">
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
			@if(Session::has('thanhcong'))
			<div class="alert alert-success">{{Session::get('thanhcong')}}</div>
			@endif
			@if(Session::has('thatbai'))
			<div class="alert alert-danger">{{Session::get('thatbai')}}</div>
			@endif
			<div class="row">
				<div class="col-sm-3">
				</div>
				<div class="col-sm-6">
					<h4>Form Login</h4>
					<div class="space20">&nbsp;</div>
					<div class="form-block">
						<label for="email">Email address*</label>
						<input type="email" id="email" name="email" required>
					</div>
					<div class="form-block">
						<label for="password">Password*</label>
						<input type="password" id="password" name="password" required>
					</div>
					<div class="form-block">
						<button type="submit" class="btn btn-primary">Login</button>
					</div>
				</div>
				<div class="col-sm-3">
					<img src="source/image/welcome/welcome1.gif">
				</div>
			</div>
		</form>
	</div>
</div> <!-- .container-->
@endsection