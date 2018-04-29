<nav class="navbar navbar-default navbar-fixed-top">
	<div class="brand">
		<a href="/">
			<img src="/assets/img/logo-white.png" alt="Klorofil Pro Logo" class="img-responsive logo">
		</a>
	</div>
	<div class="container-fluid">
		<div id="tour-fullwidth" class="navbar-btn">
			<button type="button" class="btn-toggle-fullwidth"><i class="ti-arrow-circle-left"></i></button>
		</div>
		<div id="navbar-menu">
			<ul class="nav navbar-nav navbar-right">
				<li class="dropdown">
					<a href="#" class="dropdown-toggle" data-toggle="dropdown">
						<i class="fa fa-user"></i>
						<span>{{ $me->email }}</span>
					</a>
					<ul class="dropdown-menu logged-user-menu">
						<li><a href="{{ route('logout') }}"><i class="ti-power-off"></i> <span>Logout</span></a></li>
					</ul>
				</li>
			</ul>
		</div>
	</div>
</nav>		