@extends('layouts.user_master')

@section('content')
<center><h1 style="background-color:DodgerBlue;">Follow Matches<h1></center>
<br>
<div class="col-sm-12">
	<div class="col-sm-6" id="div">
		<center>
			
			<table class="table">
				<h1  style="background-color:DodgerBlue;">History</h1>
				<tr>
					<th>id</th>
					<th>Match_id</th>
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
							@if($ol->result == $ol->real_result)
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

			<div class="col-sm-6" id="div">
				<center>	
					
					<table class="table">
						<h1  style="background-color:DodgerBlue;">Current transaction</h1>
						<tr>
							<th>id</th>
							<th>Match_id</th>
							<th>Amount</th>
							<th>Result</th>
							<tr>
								@foreach($cuBill as $cb)
								<tr>
									<th>{{$cb->id}}</th>
									<th>{{$cb->match_id}}</th>
									<th>{{$cb->bets}}</th>
									@if($cb->result == 1)
									<th>T1 Win</th>
									@endif
									@if($cb->result == 2)
									<th>T2 Win</th>
									@endif
									@if($cb->result == 3)
									<th>Draw</th>
									@endif
								</tr>
								@endforeach	
							</table>
						</center>
					</div>
				</div>
				<br><br><br><br><br><br><br><br><br><br><br><br><br><br>
				<br><br><br><br><br><br><br><br><br><br><br><br><br><br>
				<br><br><br><br><br>
				@endsection
