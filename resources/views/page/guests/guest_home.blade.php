@extends('layouts.guest_master')

@section('content')
<center><h1 style="background-color:DodgerBlue;">Schedule Matches<h1></center>
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
			</tr>
			<tr>
				<th>{{$m->team1}}</th>
				<th>{{$m->team2}}</th>
				<th>{{$m->start_time}}</th>
				<th>{{$m->end_time}}</th>
				<th>{{$m->time_play}}</th>
			</tr>
		</table>
		@endforeach
	</center>
</div>
<center><div class="row">{{$match->links()}}</div></center>
<br>
@endsection