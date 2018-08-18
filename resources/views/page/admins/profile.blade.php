@extends('layouts.admin_master')

@section('content')
<br>
<div class="col-sm-12">

	<div class="col-sm-6">
		<center>
			
			<table class="table">
				<h1 style="background-color:DodgerBlue;">Profile<h1>
					<tr>
						<th>Name</th>
						<th>Gmail</th>
						<tr> 
							<tr>
								<th>{{$user_login->name}}</th>
								<th>{{$user_login->email}}</th>
							</tr>
						</table>
						@if ($errors->any()) 
						<div class="col-sm-1"></div>
						<div class="alert alert-danger col-sm-10">
							<ul>
								@foreach ($errors->all() as $error)
								<li>{{ $error }}</li>
								@endforeach
							</ul>
						</div>
						<div class="col-sm-1"></div>
						@endif
						@if(Session::has('thanhcong'))
						<div class="col-sm-1"></div>
						<div class="alert alert-success col-sm-10">{{Session::get('thanhcong')}}</div>
						<div class="col-sm-1"></div>
						@endif
					</center>
				</div>

				<div class="col-sm-6">
					<center>	
						<form action="{{route('admin_post_profile')}}" method="post">
							<input type="hidden" name="_token" value="{{csrf_token()}}">
							<div class="form-group">
								<label for="name">Name:</label>
								<input type="text" class="form-control" id="email" placeholder="you want to fix name" name="name">
							</div>
							<div class="form-group">
								<label for="password">Password:</label>
								<input type="password" class="form-control" id="pwd" placeholder="you want to fix pass" name="password">
							</div>
							<div class="form-group">
								<label for="email">Gmail:</label>
								<input type="email" class="form-control" id="pwd" placeholder="you want to fix mail" name="email">
							</div>

							<button type="submit" class="btn btn-success">Change!</button>
						</form>
					</center>
				</div>
			</div>
			<br>
			<br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br>
			@endsection
