@extends('layouts.admin_master')

@section('content')
<center><h1 style="background-color:DodgerBlue;">Summary<h1></center>
<br>
<div class="col-sm-12">
	<div class="col-sm-1"></div>
	<div class="col-sm-10" id="div">
		<center>
			
			<table class="table">
				<tr>
					<th>id</th>
					<th>Match ID</th>
					<th>User ID</th>
					<th>Amount</th>
					<th>Result</th>
					<th>Real result</th>
					<th>APC Plus</th> 
					<th>APC Minus</th>
					<tr>
						@foreach($olBill as $ol)
						<tr>
							<th>{{$ol->id}}</th> 
							<th>{{$ol->match_id}}</th>
							<th>{{$ol->user_id}}</th>
							<th>{{$ol->bets}}</th>
							@if($ol->result == 1)
							<th>T1 Win</th>
							@endif
							@if($ol->result == 2)
							<th>T2 Win</th>
							@endif
							@if($ol->result == 3)
							<th>Draw</th>
							@endif
							@if($ol->real_result == 1)
							<th>T1 Win</th>
							@endif
							@if($ol->real_result == 2)
							<th>T2 Win</th>
							@endif
							@if($ol->real_result == 3)
							<th>Draw</th>
							@endif
							@if($ol->real_result == null)
							<th>loading ...</th>
							@endif 
							@if($ol->real_result == null)
							<th>loading ...</th>
							<th>loading ...</th>
							<th>loading ...</th>
							@elseif($ol->result == $ol->real_result)
									@if($ol->result == 1)
									<th>{{$ol->bets+$ol->bets*$ol->ratio_1_win}}</th>
									<th>0</th>
									@elseif($ol->result == 2)
									<th>{{$ol->bets+$ol->bets*$ol->ratio_1_lose}}</th>
									<th>0</th>
									@else
									<th>{{$ol->bets+$ol->bets*$ol->ratio_equal}}</th>
									<th>0</th>
									@endif
								@else
								<th>0</th>
								<th>{{$ol->bets}}</th>
								@endif
						</tr>
						@endforeach	
					</table>
				</center>
			</div>

			<div class="col-sm-1">
			</div>
		</div>
		<br><br><br><br><br><br><br><br><br><br><br><br><br><br>
		<br><br><br><br><br><br><br><br><br><br><br><br><br><br>
		<br><br><br><br><br>
		@endsection
