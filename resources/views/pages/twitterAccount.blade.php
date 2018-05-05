@extends('layout')

@section('content')

<div class="content-heading clearfix">
	<div class="heading-left">
		<h1 class="page-title">Twitter account</h1>
		<p class="page-subtitle">Manage your Twitter Account</p>
	</div>
	<ul class="breadcrumb">
		<li class="active">Twitter Account</li>
	</ul>
</div>
<div class="container-fluid">

	<div class="row">
		<div class="col-md-12">

			<div class="panel panel-profile">
				<div class="clearfix">
					<!-- LEFT COLUMN -->
					<div class="profile-left">
						<!-- PROFILE HEADER -->
						<div class="profile-header">
							<div class="overlay"></div>
							<div class="profile-main">
								<img src="{{ $twitterAccount->profile_image_url }}" class="img-circle" alt="Avatar">
								<h3 class="name">{{ $twitterAccount->name }}</h3>
								<span>{{ '@' . $twitterAccount->screen_name }}</span>
							</div>
							<div class="profile-stat">
								<div class="row">
									<div class="col-md-4 stat-item">
										{{ $twitterAccount->statuses_count }}
										<span>Tweets</span>
									</div>
									<div class="col-md-4 stat-item">
										{{ $twitterAccount->followings_count }}
										<span>Followings</span>
									</div>
									<div class="col-md-4 stat-item">
										{{ $twitterAccount->followers_count }}
										<span>Followers</span>
									</div>
								</div>
							</div>
						</div>
						<!-- END PROFILE HEADER -->
						<!-- PROFILE DETAIL -->
						<div class="profile-detail">
							<div class="profile-info">
								
								<div class="row">
									<div class="col-md-6">
										@if ($twitterAccount->running == false)
										<a href="{{ route('twitterAccount', ['twitter_id' => $twitterAccount->twitter_id]) }}/start" class="btn btn-block btn-success">
											<i class="fa fa-play"></i>
											<span>Start bot</span>
										</a>
										@else
										<a href="{{ route('twitterAccount', ['twitter_id' => $twitterAccount->twitter_id]) }}/stop" class="btn btn-block btn-danger">
											<i class="fa fa-square"></i>
											<span>Stop bot</span>
										</a>
										@endif
									</div>
									<div class="col-md-6">
										<a href="{{ route('twitterAccountSettings', ['twitter_id' => $twitterAccount->twitter_id]) }}" class="btn btn-block btn-default">
											<i class="fa fa-cog"></i>
											<span>Settings</span>
										</a>
									</div>
								</div>
							</div>

						</div>

						<!-- END PROFILE DETAIL -->
					</div>
					<!-- END LEFT COLUMN -->
					<!-- RIGHT COLUMN -->
					<div class="profile-right">
						<h4 class="heading">Bot information</h4>
						<div class="row">
							<div class="col-md-12">
								<ul class="list-unstyled list-justify">
									<li>Status
										@if ($twitterAccount->running == true)
										<span class="badge badge-success">RUNNING</span>
										@else
										<span class="badge badge-default">STOPPED</span>
										@endif
									</li>
									<li>Keywords
										@foreach ($twitterAccount->keywords as $keyword)
										<span>{{ $keyword->name}}&nbsp;</span>
										@endforeach
									</li>
								</ul>
							</div>
						</div>
						<h4 class="heading">Statistics</h4>
						<!-- Stats -->
						<div class="row">
							<div class="col-md-12">
								Coming soon
							</div>
						</div>
						<!-- /Stats -->
						<br>
						<br>
						<br>
						<br>
						<br>
						<br>
						<br>
						<br>
						<br>
						
					</div>
					<!-- END RIGHT COLUMN -->
				</div>
			</div>
		</div>

	</div>

</div>

@endsection