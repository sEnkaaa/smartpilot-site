<div id="sidebar-nav" class="sidebar">
	<nav>
		<ul class="nav" id="sidebar-nav-menu">
			<li class="menu-group">Main</li>
			<li class="panel">
				<a href="{{ route('dashboard') }}" class="active"><i class="ti-dashboard"></i> <span class="title">Dashboard</span></a>
			</li>
			<li class="panel">
				<a href="#subLayouts" data-toggle="collapse" data-parent="#sidebar-nav-menu" class="collapsed"><i class="fa fa-twitter"></i> <span class="title">Twitter Accounts</span> <i class="icon-submenu ti-angle-left"></i></a>
				<div id="subLayouts" class="collapse ">
					<ul class="submenu">
						@foreach ($me->twitter_users()->get() as $account)
						<li><a href="{{ route('twitterAccount', ['twitter_id' => $account->twitter_id]) }}">{{ $account->screen_name }}</a></li>
						@endforeach
						@if (count($me->twitter_users()->get()) < $me->plan->twitter_user_max_count)
						<li><a class="active" href="{{ route('twitterAccountAdd') }}">Add an account</a></li>
						@endif
					</ul>
				</div>
			</li>
		</ul>
		<button type="button" class="btn-toggle-minified" title="Toggle Minified Menu"><i class="ti-arrows-horizontal"></i></button>
	</nav>
</div>