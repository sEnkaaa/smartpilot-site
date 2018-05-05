@extends('layout')

@section('content')

<div class="content-heading clearfix">
	<div class="heading-left">
		<h1 class="page-title">Twitter Account Settings</h1>
		<p class="page-subtitle">Manage your bot settings</p>
	</div>
	<ul class="breadcrumb">
		<li><a href="{{ route('twitterAccount', ['twitter_id' => $twitterAccount->twitter_id]) }}">Twitter Account</a></li>
		<li class="active">Settings</li>
	</ul>
</div>
<div class="container-fluid">
	<div class="row">
		<div class="col-md-12">

			<div class="panel">
				<div class="panel-heading">
					<h3 class="panel-title">General settings</h3>
				</div>
				<div class="panel-body">
		
					<fieldset>
						<legend>Keywords
							@if ($keywordsCount < $me->plan->keyword_max_count)
								<span id="keywords_count_badge" class="badge badge-success pull-right">
								<span id="keywords_count">{{ $keywordsCount }}</span> / <span id="keywords_max_count">{{ $me->plan->keyword_max_count }}</span> Keywords</span>
							@else
								<span id="keywords_count_badge" class="badge badge-default pull-right">
								<span id="keywords_count">{{ $keywordsCount }}</span> / <span id="keywords_max_count">{{ $me->plan->keyword_max_count }}</span> Keywords</span>
							@endif
						</legend>
						<div class="row">
							<div class="col-md-6">
								<p>Put a keyword, #Hashtag or phrase in the input box bellow</p>
								
								<div class="row">
									<div class="col-md-3">
										<select id="langSelector" class="select-basic" style="width: 100%;">
											@foreach ($langs as $lang)
											<option value="{{ $lang->code }}" @if ($lang->id === $twitterAccount->lang->id) selected @endif>{{ $lang->name }}</option>
											@endforeach
										</select>
									</div>
									<div class="col-md-9">
										<div class="input-group">
											<input id="keywordInput" class="form-control" type="text" placeholder="marketing, #bitcoin, donald trump...">
											<span class="input-group-btn">
												@if ($keywordsCount < $me->plan->keyword_max_count)
												<button id="addKeywordButton" onclick="addKeyword()" class="btn btn-primary" type="button">Add</button>
												@else
												<button id="addKeywordButton" onclick="addKeyword()" class="btn btn-primary" type="button" disabled>Add</button>
												@endif
											</span>
										</div>
									</div>
								</div>
									
							</div>
							<div class="col-md-6 text-center">
								<table id="keywordsTable" class="table table-condensed" style="display: none">
									<thead>
										<tr>
											<th>Keyword</th>
											<th>Language</th>
											<th>Action</th>
										</tr>
									</thead>
									<tbody>
										@foreach($keywords as $keyword)
										<tr>
											<td>{{ $keyword->name }}</td>
											<td>{{ $keyword->lang->name }}</td>
											<td>
												<button onclick="removeKeyword(this)" type="button" class="btn btn-danger btn-xs">Remove</button>
											</td>
										</tr>
										@endforeach
									</tbody>
								</table>
								<p id="keywordsEmpty" class="text-muted" style="display: none">You don't have any keyword yet</p>
							</div>
						</div>

					</fieldset>
	
				</div>
				<div class="panel-footer">
				
						<a href="{{ route('twitterAccount', ['twitter_id' => $twitterAccount->twitter_id]) }}" class="btn btn-primary btn-block">Save settings</a>

				</div>
			</div>

		</div>
	</div>

</div>

@endsection