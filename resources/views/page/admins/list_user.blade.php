@extends('layouts.admin_master')

@section('content')
<center><h1  style="background-color:DodgerBlue;">List Users</h1></center>
<br>
<div class="col-sm-12">
	<div class="col-sm-1"></div>
	<div class="col-sm-10" id="div">
		<center>
			
			<table class="table">
				<tr>
					<th>User id</th>
					<th>User name</th>
					<th>Role</th>
					<th>Gmail</th>
					<th>APC</th>
				</tr>
				@foreach($user as $u)
				<tr>
					<th>{{$u->id}}</th>
					<th>{{$u->name}}</th>
					@if($u->role == 1)
					<th>User</th>
					@else
					<th>Admin</th>
					@endif
					<th>{{$u->email}}</th>
					<th>{{$u->apc}}</th>
				</tr>
				@endforeach
			</table>
		</center>
	</div>
	<div class="col-sm-1"></div>
</div>
<br><br><br><br><br><br><br><br><br><br><br><br><br><br>
<br><br><br><br><br><br><br><br><br><br><br><br><br><br>
<br><br><br><br><br>
@endsection
