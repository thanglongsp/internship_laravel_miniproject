@extends('layouts.user_master')

@section('content')
<center><h1 style="background-color:DodgerBlue;">Profile<h1></center>
<br>
<div>

	<div class="col-sm-5">
		<center>	
			<table>
				<tr>
					<th>Name</th>
					<th>Gmail</th>
					<th>APC</th>
					<tr>
						<tr>
							<th>{{$user_login->name}}</th>
							<th>{{$user_login->email}}</th>
							@foreach($user as $u)
							<th>{{$u->apc}}</th>
							@endforeach
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

			<div class="col-sm-5">
				<center>	
					<form action="{{route('user_post_profile')}}" method="post">
						<input type="hidden" name="_token" value="{{csrf_token()}}">
						<div class="form-group">
							<label for="name">Name:</label>
							<input type="text" class="form-control" placeholder="you want to fix name" name="name">
						</div>
						<div class="form-group">
							<label for="password">Password:</label>
							<input type="password" class="form-control" placeholder="you want to fix pass" name="password">
						</div>
						<div class="form-group">
							<label for="email">Gmail:</label>
							<input type="email" class="form-control"  placeholder="you want to fix mail" name="email">
						</div>

						<button type="submit" class="btn btn-success">Change!</button>
					</form>
				</center>
			</div>
		</div>
		<br>
		<br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br>
		@endsection
