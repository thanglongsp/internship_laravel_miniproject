@extends('layouts.admin_master')

@section('content')
<center><h1 style="background-color:DodgerBlue;">All schedule and matches<h1></center>
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
				<th>Status</th>
			</tr>
			<tr>
				<th>{{$m->team1}}</th>
				<th>{{$m->team2}}</th>
				<th>{{$m->start_time}}</th>
				<th>{{$m->end_time}}</th>
				<th>{{$m->time_play}}</th>
				@if($m->status == 0)
				<th>Not public</th>
				@else
				<th>Public</th>
				@endif
			</tr>
		</table>
		@endforeach
	</center>
</div>
<center><div class="row">{{$match->links()}}</div></center>
<br>
@endsection
