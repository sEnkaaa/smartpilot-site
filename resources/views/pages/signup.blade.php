<!doctype html>
<html lang="en" class="fullscreen-bg">
	<head>
		<title>Register | Klorofil Pro - Bootstrap Admin Dashboard Template</title>
		<meta charset="utf-8">
		<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
		<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0">
		<!-- VENDOR CSS -->
		<link rel="stylesheet" href="assets/vendor/bootstrap/css/bootstrap.min.css">
		<link rel="stylesheet" href="assets/vendor/font-awesome/css/font-awesome.min.css">
		<link rel="stylesheet" href="assets/vendor/themify-icons/css/themify-icons.css">
		<!-- MAIN CSS -->
		<link rel="stylesheet" href="assets/css/main.css">
		<!-- FOR DEMO PURPOSES ONLY. You should remove this in your project -->
		<link rel="stylesheet" href="assets/css/demo.css">
		<!-- GOOGLE FONTS -->
		<link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700" rel="stylesheet">
		<!-- ICONS -->
		<link rel="apple-touch-icon" sizes="76x76" href="assets/img/apple-icon.png">
		<link rel="icon" type="image/png" sizes="96x96" href="assets/img/favicon.png">
	</head>
	<body>
		<!-- WRAPPER -->
		<div id="wrapper" style="background-image: url('/landing/img/background2.jpg');">
			<div class="vertical-align-wrap">
				<div class="vertical-align-middle">
					<div class="auth-box register">
						<div class="content">
							<div class="header">
								<div class="logo text-center">
									<a href="{{ route('landing') }}">
										<img src="/landing/img/logo.png" alt="Klorofil Logo">
									</a>
								</div>
								<p class="lead">Create an account</p>
							</div>
							@if ($errors->any())
							    <div class="alert alert-danger">
							        <ul>
							            @foreach ($errors->all() as $error)
							                <li>{{ $error }}</li>
							            @endforeach
							        </ul>
							    </div>
							@endif
							<form class="form-auth-small" method="POST">
								@csrf
								<div class="form-group">
									<label for="signup-email" class="control-label sr-only">Email</label>
									<input name="email" type="email" class="form-control" id="signup-email" placeholder="Your email" value="{{ Session::get('_old_input')['email'] }}">
								</div>
								<div class="form-group">
									<label for="signup-password" class="control-label sr-only">Password</label>
									<input name="password" type="password" class="form-control" id="signup-password" placeholder="Password">
								</div>
								<div class="form-group">
									<label for="signup-password" class="control-label sr-only">Confirm password</label>
									<input name="password_confirmation" type="password" class="form-control" id="signup-password-confirm" placeholder="Password confirmation">
								</div>
								<button type="submit" class="btn btn-primary btn-lg btn-block">REGISTER</button>
								<div class="bottom">
									<span class="helper-text">Already have an account ? <a href="{{ route('signin') }}">Login</a></span>
								</div>
							</form>
							
						</div>
					</div>
				</div>
			</div>
		</div>
		<!-- END WRAPPER -->
	</body>
</html>