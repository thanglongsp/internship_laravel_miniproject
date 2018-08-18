@extends('layouts.admin_master')

@section('content')
<br>
<div class="col-sm-12">
	<div class="col-sm-2" id="div">

		<center>
			<p  style="background-color:DodgerBlue;"><strong>Update Matche</strong></p>	
			<form action="{{route('admin_post_match')}}" method="post">
				<input type="hidden" name="_token" value="{{csrf_token()}}">

				<div class="form-group">
					<label for="u_id_match">ID Matches:</label>
					<input type="number" class="form-control" id="id_match" name="u_id_match">
				</div>

				<div class="form-group">
					<label for="u_team1">Team 1:</label>
					<input type="text" class="form-control" id="u_team1" name="u_team1">
				</div>

				<div class="form-group">
					<label for="u_team2">Team 2:</label>
					<input type="text" class="form-control" id="u_team2" name="u_team2">
				</div>

				<div class="form-group">
					<label for="u_time_start">Time Sart:</label>
					<input type="datetime-local" class="form-control" id="u_time_start" name="u_time_start">
				</div>
				<div class="form-group">
					<label for="u_time_end">Time End:</label>
					<input type="datetime-local" class="form-control" id="time_end" name="u_time_end">
				</div>

				<div class="form-group">
					<label for="u_time_play">Time Playing:</label>
					<input type="datetime-local" class="form-control" id="time_play" name="u_time_play">
				</div>

				<div class="form-group">
					<label for="u_1win">Ratio 1 win:</label>
					<input type="number" class="form-control" id="u_1win" name="u_1win">
				</div>
				
				<div class="form-group">
					<label for="u_1lose">Ratio 1 lose:</label>
					<input type="number" class="form-control" id="u_1lose" name="u_1lose">
				</div>

				<div class="form-group">
					<label for="u_draw">Ratio draw:</label>
					<input type="number" class="form-control" id="u_draw" name="u_draw">
				</div>

				<div class="form-group">
					<label for="u_result">Result</label>
					<input type="number" class="form-control" id="u_result" name="u_result">
				</div>

				<div class="form-group">
					<label for="u_status">Status</label>
					<input type="number" class="form-control" id="u_status" name="u_status">
				</div>

				<button type="submit" class="btn btn-success">Update</button>
			</form>
		</center>
	</div>
	<div class="col-sm-2" id="div">
		<center> 
			<p  style="background-color:DodgerBlue;"><strong>Add Matche</strong></p>	
			<form action="{{route('admin_post_match')}}" method="post">
				<input type="hidden" name="_token" value="{{csrf_token()}}">

				<div class="form-group">
					<label for="a_id_match">ID Matches:</label>
					<input type="number" class="form-control" id="a_id_match" name="a_id_match">
				</div>

				<div class="form-group">
					<label for="a_team1">Team 1:</label>
					<input type="text" class="form-control" id="a_team1" name="a_team1">
				</div>

				<div class="form-group">
					<label for="a_team2">Team 2:</label>
					<input type="text" class="form-control" id="a_team2" name="a_team2">
				</div>

				<div class="form-group">
					<label for="a_time_start">Time Sart:</label>
					<input type="datetime-local" class="form-control" id="a_time_start" name="a_time_start">
				</div>
				<div class="form-group">
					<label for="a_time_end">Time End:</label>
					<input type="datetime-local" class="form-control" id="a_time_end" name="a_time_end">
				</div>

				<div class="form-group">
					<label for="a_time_play">Time Playing:</label>
					<input type="datetime-local" class="form-control" id="a_time_play" name="a_time_play">
				</div>
				<div class="form-group">
					<label for="a_1win">Ratio 1 win:</label>
					<input type="number" class="form-control" id="a_1win" name="a_1win" min="1" max="10">
				</div>
				
				<div class="form-group">
					<label for="a_1lose">Ratio 1 lose:</label>
					<input type="number" class="form-control" id="a_1lose" name="a_1lose" min="1" max="10">
				</div>

				<div class="form-group">
					<label for="a_draw">Ratio draw:</label>
					<input type="number" class="form-control" id="a_draw" name="a_draw" min="1" max="10">
				</div>
				
				<div class="form-group">
					<label for="a_status">Status</label>
					<select name="a_status" class="form-control">
						<option value="3">Not public</option>
						<option value="1">Public</option>
						<option value="2">End</option>
					</select>
				</div>

				<button type="submit" class="btn btn-success">Add</button>
			</form>
		</center>
	</div>
	<div class="col-sm-8" id="div">
		<center>
			
			<table class="table">
				<h1  style="background-color:DodgerBlue;">List Matches</h1>
				<tr>
					<th>id</th>
					<th>Team 1</th>
					<th>Team 2</th>
					<th>Start betting</th>
					<th>End betting</th>
					<th>Start playing</th>
					<th>Ratio T1 win</th>
					<th>Ratio T1 lose</th>
					<th>Ratio draw</th>
					<th>Result</th>
					<th>Status</th>
					<tr>
						@foreach($match as $m)
						<tr>
							<th>{{$m->id}}</th>
							<th>{{$m->team1}}</th>
							<th>{{$m->team2}}</th>
							<th>{{$m->start_time}}</th>
							<th>{{$m->end_time}}</th>
							<th>{{$m->time_play}}</th>
							<th>{{$m->ratio_1_win}}</th>
							<th>{{$m->ratio_1_lose}}</th>
							<th>{{$m->ratio_equal}}</th>
							@if($m->real_result == 3)
								<th>Draw</th>
							@elseif($m->real_result == 1)
								<th>T1 win</th>
							@elseif($m->real_result == 2)
								<th>T2 win</th>
							@else
								<th>loading ...</th>
							@endif
							<th>{{$m->status}}</th>
						</tr>
						@endforeach	
					</table>
				</center>
				<ul class="alert alert-danger">
					<li>Status = 1 : trận đấu đang diễn ra</li>
					<li>Status = 2 : trận đấu đã kết thúc</li>
					<li>Status = 3 : trận đấu chưa công khai để đặt cược</li>
					<li>loading ...: đang chờ đợi kết quả</li>
					<li>Result = 1 : team 1 win</li>
					<li>Result = 2 : team 2 win</li>
					<li>Result = 3 : tỷ số hòa</li>

				</ul>

				@if(Session::has('thanhcong'))
				<div class="alert alert-success col-sm-12">{{Session::get('thanhcong')}}</div>
				@endif
				@if(Session::has('thatbai'))
				<div class="alert alert-danger col-sm-12">{{Session::get('thatbai')}}</div>
				@endif
			</div>

		</div>
	</div>
	<br><br><br><br><br><br><br><br><br><br><br><br><br><br>
	<br><br><br><br><br><br><br><br><br><br><br><br><br><br>
	<br><br>
	@endsection

