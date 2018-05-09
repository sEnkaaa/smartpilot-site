@extends('layout')

@section('content')

<div class="content-heading clearfix">
	<div class="heading-left">
		<h1 class="page-title">Dashboard</h1>
		<p class="page-subtitle">Manage your bot</p>
	</div>
	<ul class="breadcrumb">
		<li><a href="#"><i class="fa fa-home"></i> Dashboard</a></li>
	</ul>
</div>
<div class="container-fluid">
	<div class="row">
		<div class="col-md-6">

			<div class="panel">
				<div class="panel-heading">
					<h4 class="panel-title">My twitter accounts</h4>
					<div class="right">
						<span @if (count($TwitterAccounts) < $me->plan->twitter_user_max_count) class="label label-success" @else class="label label-default" @endif>
							{{ count($TwitterAccounts) }} / {{ $me->plan->twitter_user_max_count }} Twitter accounts
						</span>
					</div>
				</div>
				<div class="panel-body no-padding">
					@if ( count($TwitterAccounts) !== 0 )
					<div class="table-responsive">
						<table class="table table-minimal table-fullwidth table-striped">
							<thead>
								<tr>
									<th></th>
									<th>SCREEN NAME</th>
									<th>FOLLOWINGS</th>
									<th>FOLLOWERS</th>
									<th>STATUS</th>
								</tr>
							</thead>
							<tbody>

								@foreach ( $TwitterAccounts as $account )
								<tr>
									<td><img width="50" class="img-circle" src="{{ $account->profile_image_url }}" /></td>
									<td><a href="{{ route('twitterAccount', ['twitter_id' => $account->twitter_id]) }}">{{ $account->screen_name }}</a></td>
									<td>{{ $account->followings_count }}</td>
									<td>{{ $account->followers_count }}</td>
									<td>
										@if ($account->running == 1)
										<span class="badge badge-success">RUNNING</span>
										@else
										<span class="badge badge-default">STOPPED</span>
										@endif
									</td>
								</tr>
								@endforeach
							
							</tbody>
						</table>
					</div>
					@else
					<div id="progress-share" class="progress-semicircle" style="padding: 30px;" data-max="500">
						<span class="content">
							<i class="fa fa-twitter icon"></i>
							<h4 class="heading">You have not registered a Twitter account yet</h4>
							<p class="text-muted">Start by clicking the button bellow</p>
						</span>
					</div>
					@endif

				</div>
				@if (count($TwitterAccounts) < $me->plan->twitter_user_max_count)
				<div class="panel-footer">
					<div class="row">
						<div class="col-md-12">
							<a href="{{ route('twitterAccountAdd') }}" class="btn btn-primary btn-block"><span class="fa fa-twitter"></span> Add a Twitter account</a>
						</div>
					</div>
				</div>
				@endif
			</div>

		</div>
	</div>

</div>

@endsection