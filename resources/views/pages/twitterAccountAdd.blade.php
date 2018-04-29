@extends('layout')

@section('content')

<div class="content-heading clearfix">
	<div class="heading-left">
		<h1 class="page-title">Add Twitter account</h1>
		<p class="page-subtitle">Add your Twitter account</p>
	</div>
	<ul class="breadcrumb">
		<li><a href="#"><i class="fa fa-home"></i> Add Twitter account</a></li>
	</ul>
</div>
<div class="container-fluid">

	<div class="row">
		<div class="col-md-12">
			@if ($errors->any())
		    <div class="alert alert-danger">
		        <ul>
		            @foreach ($errors->all() as $error)
		                <li>{{ $error }}</li>
		            @endforeach
		        </ul>
		    </div>
			@endif
			<div class="widget">
				<div id="wizard-step-1" class="progress-semicircle" data-max="500" @if ($errors->any()) style="display: none" @endif>
					<span class="content">
						<span class="value">Step 1 / 4</span>
						<h4 class="heading">Make sure you are signed in to the Twitter account you wish to use with SMARTPILOT on Twitter, then go to :</h4>
						<a href="https://apps.twitter.com/app/new" target="_blank"><h1>https://apps.twitter.com/app/new</h1> (Click to open in a new tab)</a>
						<br><br>
						<button onclick="goToStep2()" type="button" class="btn btn-primary">Next step</button>
						<br><br>
					</span>
				</div>
				<div id="wizard-step-2" class="progress-semicircle" data-max="500" style="display: none">
					<span class="content">
						<span class="value">Step 2 / 4</span>
						<h4 class="heading">Now copy the values below, and paste them into the corresponding fields in the form on Twitter's site:</h4>
						<br>
						<div class="row">
							<div class="col-md-6">
								<div class="form-group">
									<label class="control-label pull-left" for="inputName">Name</label>
									<input type="text" class="form-control" id="inputName" value="{{ substr( sha1(uniqid('')), 0, 20 ) }}" disabled>
								</div>
								<div class="form-group">
									<label class="control-label pull-left" for="inputDescription">Description</label>
									<input type="text" class="form-control" id="inputDescription" value="{{ substr( sha1(uniqid('')), 0, 20 ) }}" disabled>
								</div>
								<div class="form-group">
									<label class="control-label pull-left" for="inputWebsite">Website</label>
									<input type="text" class="form-control" id="inputWebsite" value="http://127.0.0.1/" disabled>
								</div>
								<div class="form-group">
									<label class="control-label pull-left" for="inputCallback">Callback URL</label>
									<input type="text" class="form-control" id="inputCallback" value="http://127.0.0.1/" disabled>
								</div>
							</div>
							<div class="col-md-6">
								<img src="/assets/img/pages/TwitterAccountAdd/1.jpg">
							</div>
						</div>
						<br>
						<h4 class="heading">After having pasted all the values into the form, don't forget to click on the button to accept the terms! After that, click on the button to create the application.</h4>
						<img src="/assets/img/pages/TwitterAccountAdd/2.jpg">
						<br>
						<button onclick="goToStep1()" type="button" class="btn btn-default">Previous step</button> <button onclick="goToStep3()" type="button" class="btn btn-primary">Next step</button>
						<br><br>
					</span>
				</div>
				<div id="wizard-step-3" class="progress-semicircle" data-max="500" style="display: none">
					<span class="content">
						<span class="value">Step 3 / 4</span>
						<h4 class="heading">You will now be taken to a details page for the app you've just created. Click on the 'Keys and Access Tokens' tabs. Scroll down the page, and click on the 'Create my Access Token'button.</h4>
						<img src="/assets/img/pages/TwitterAccountAdd/3.jpg">
						<br><br>
						<button onclick="goToStep2()" type="button" class="btn btn-default">Previous step</button> <button onclick="goToStep4()" type="button" class="btn btn-primary">Next step</button>
						<br><br>
					</span>
				</div>
				<div id="wizard-step-4" class="progress-semicircle" data-max="500" @if ($errors->any()) style="display: block" @else style="display: none" @endif>
					<span class="content">
						<span class="value">Step 4 / 4</span>
						<h4 class="heading">Almost finished! While still on the 'Keys and Access Tokens' page, please copy the codes highlighted below from Twitter, and paste them into the form below. That's it !</h4>
						<br>
						<div class="row">
							<div class="col-md-6">
								<img src="/assets/img/pages/TwitterAccountAdd/4.jpg">
							</div>
							<div class="col-md-6">
								<form method="POST">
									@csrf
									<div class="form-group">
										<label class="control-label pull-left" for="inputConsumerKey">Consumer Key (API Key)</label>
										<input name="consumer_key" type="text" class="form-control" id="inputConsumerKey" required>
									</div>
									<div class="form-group">
										<label class="control-label pull-left" for="inputConsumerSecret">Consumer Secret (API Secret)</label>
										<input name="consumer_secret" type="text" class="form-control" id="inputConsumerSecret" required>
									</div>
									<div class="form-group">
										<label class="control-label pull-left" for="inputAccessToken">Access Token</label>
										<input name="access_token" type="text" class="form-control" id="inputAccessToken" required>
									</div>
									<div class="form-group">
										<label class="control-label pull-left" for="inputAccessTokenSecret">Access Token Secret</label>
										<input name="access_token_secret" type="text" class="form-control" id="inputAccessTokenSecret" required>
									</div>
									<input type="submit" class="btn btn-block btn-primary" value="Let's go !">
								</form>
							</div>
						</div>
						<br>
						<button onclick="goToStep3()" type="button" class="btn btn-default">Previous step</button>
						<br><br>
					</span>
				</div>
			</div>
		</div>
	</div>

</div>

<script>

	function goToStep1() {
		$('#wizard-step-1').show()
		$('#wizard-step-2').hide()
		$('#wizard-step-3').hide()
		$('#wizard-step-4').hide()
	}

	function goToStep2() {
		$('#wizard-step-1').hide()
		$('#wizard-step-2').show()
		$('#wizard-step-3').hide()
		$('#wizard-step-4').hide()
	}

	function goToStep3() {
		$('#wizard-step-1').hide()
		$('#wizard-step-2').hide()
		$('#wizard-step-3').show()
		$('#wizard-step-4').hide()
	}

	function goToStep4() {
		$('#wizard-step-1').hide()
		$('#wizard-step-2').hide()
		$('#wizard-step-3').hide()
		$('#wizard-step-4').show()
	}

</script>

@endsection