@extends('layouts.user_master')

@section('content')
<center><h1 style="background-color:DodgerBlue;">Schedule and betting<h1></center>
<br>
<div>
	<center>		
		@foreach($match as $m)
		<img src="source/image/matches/{{$m->banner}}">
		<table>
			<tr>
				<th>Team 1 </th>
				<th>Team 2</th>
				<th>Time start beting</th>
				<th>Time end betting</th>
				<th>Play  time </th>
				<th>Ratio T1 win</th>
				<th>Ratio T1 lose</th>
				<th>Draw</th>
				<th><span class="glyphicon glyphicon-user"></span></th>
			</tr>
			<tr> 
				<th>{{$m->team1}}</th>
				<th>{{$m->team2}}</th>
				<th>{{$m->start_time}}</th> 
				<th>{{$m->end_time}}</th>
				<th>{{$m->time_play}}</th>
				<th>{{$m->ratio_1_win}}</th>
				<th>{{$m->ratio_1_lose}}</th>
				<th>{{$m->ratio_equal}}</th>
				<th><p id="bCount"></p></th>
			</tr>
		</table>
	</center>
</div>
<div class="col-sm-12">
	<div class="col-sm-1"></div>
	<div class="col-sm-6">
		<br>
		<!-- <p><span class="glyphicon glyphicon-hand-right"></span>  <button type="button" class="btn btn-warning">Add to cart</button></p> -->
		<form action="{{route('post_bet')}}" method="post">
			<input type="hidden" name="_token" value="{{csrf_token()}}"> 

			<button type="button" class="btn btn-success">Team 1 Win</button>	<input class="input" type="radio" name="ratio" value="1">
			<button type="button" class="btn btn-danger">Team 1 Lose</button>	<input class="input" type="radio" name="ratio" value="2">
			<button type="button" class="btn btn-warning">Draw       </button>	<input class="input" type="radio" name="ratio" value="3"><br><br>
			
			<input type="number" value="0" min="10" max="5000" name="amount">  APC</input>
			<button type="submit" class="btn btn-default" value="{{$m->id}}" name="code"><span class="glyphicon glyphicon-hand-left"></span></button>
			<br>
			<p style="color:red;">Please choose APC to bet. Goodluck to you!</p>
			<br><br>
		</form>
	</div>
	<br>
	<div class="col-sm-5" style="backgroud-color:red;">
		<table>
			<tr>
				<th>Name</th>
				<th>APC</th>
			</tr>
			<tr>
				<th>{{$user_login->name}}</th>
				@foreach($user as $u)
				<th>{{$u->apc}}</th>
				@endforeach
			</tr>
		</table>
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
		<div class="alert alert-success col-sm-9">{{Session::get('thanhcong')}}</div>
		@endif
	</div>
</div>
@section('script')
<script>
$(document).ready(function(){
	var count = {{$m->id}};
	// alert(count);
	$.get("ajax/count/",function(data){
		alert(data);
		//$("#bCount").html(data);
	});
});
</script>
@endsection

@endforeach
<center><div class="row">{{$match->links()}}</div></center>
<br>
@endsection


