<div class="header-bottom" style="background-color: #0277b8;">
	<div class="container">
		<a class="visible-xs beta-menu-toggle pull-right" href="#"><span class='beta-menu-toggle-text'>Menu</span> <i class="fa fa-bars"></i></a>
		<div class="visible-xs clearfix"></div>
		<nav class="main-menu">
			<ul class="l-inline ov">
				<li><a href="{{route('user_home')}}"><span class="glyphicon glyphicon-home"></span>  Home</a></li>
				<li><a href="{{route('user_follow_match')}}"><span class="glyphicon glyphicon-send"></span>  Follow matches</a></li>

				@if(isset($user_login))
				<li><a href="{{route('user_profile')}}"><span class="glyphicon glyphicon-user"></span>  {{$user_login->name}}</a></li>
				<li><a href="{{route('log_out')}}"><span class="glyphicon glyphicon-log-out"></span>  Logout</a></li>
				@endif

			</ul>
			<div class="clearfix"></div>
		</nav>
	</div> <!-- .container -->
		</div> <!-- .header-bottom -->