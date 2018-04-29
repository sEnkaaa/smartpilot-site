<!doctype html>
<html lang="en">
	<head>
		<title>Dashboard v3 | Klorofil Pro - Bootstrap Admin Dashboard Template</title>
		<meta charset="utf-8">
		<meta http-equiv="X-UA-Compatible" content="IE=edge, chrome=1">
		<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0">
		<!-- VENDOR CSS -->
		<link rel="stylesheet" href="/assets/vendor/bootstrap/css/bootstrap.min.css">
		<link rel="stylesheet" href="/assets/vendor/font-awesome/css/font-awesome.min.css">
		<link rel="stylesheet" href="/assets/vendor/themify-icons/css/themify-icons.css">
		<link rel="stylesheet" href="/assets/vendor/pace/themes/orange/pace-theme-minimal.css">
		<link rel="stylesheet" href="/assets/css/vendor/animate/animate.min.css">
		<link rel="stylesheet" href="/assets/vendor/chartist/css/chartist-custom.css">
		<link rel="stylesheet" href="/assets/vendor/datatables/css-main/jquery.dataTables.min.css">
		<link rel="stylesheet" href="/assets/vendor/datatables/css-bootstrap/dataTables.bootstrap.min.css">
		<link rel="stylesheet" href="/assets/vendor/datatables-tabletools/css/dataTables.tableTools.css">
		<link rel="stylesheet" href="/assets/vendor/toastr/toastr.min.css">
		<!-- MAIN CSS -->
		<link rel="stylesheet" href="/assets/css/main.css">
		<link rel="stylesheet" href="/assets/css/skins/sidebar-nav-darkgray.css" type="text/css">
		<link rel="stylesheet" href="/assets/css/skins/navbar3.css" type="text/css">
		<!-- FOR DEMO PURPOSES ONLY. You should/may remove this in your project -->
		<link rel="stylesheet" href="/assets/css/demo.css">
		<link rel="stylesheet" href="/demo-panel/style-switcher.css">
		<!-- ICONS -->
		<link rel="apple-touch-icon" sizes="76x76" href="/assets/img/apple-icon.png">
		<link rel="icon" type="image/png" sizes="96x96" href="/assets/img/favicon.png">

		<!-- Global site tag (gtag.js) - Google Analytics -->
		<script async src="https://www.googletagmanager.com/gtag/js?id=UA-118348111-1"></script>
		<script>
		  window.dataLayer = window.dataLayer || [];
		  function gtag(){dataLayer.push(arguments);}
		  gtag('js', new Date());
		  gtag('config', 'UA-118348111-1');
		</script>

	</head>
	<body>
		<!-- WRAPPER -->
		<div id="wrapper">
			<!-- NAVBAR -->
			@include('partials/navbar')
			<!-- END NAVBAR -->

			<!-- LEFT SIDEBAR -->
			@include('partials/sidebar')
			<!-- /LEFT SIDEBAR -->

			<!-- MAIN -->
			<div class="main">
				<!-- MAIN CONTENT -->
				<div class="main-content">
					@yield('content')
				</div>
				<!-- END MAIN CONTENT -->
			</div>
			<!-- END MAIN -->
			<div class="clearfix"></div>
			<footer>
				<div class="container-fluid">
					<p class="copyright">&copy; 2018 SMARTPILOT. All Rights Reserved.</p>
				</div>
			</footer>
		</div>
		<!-- END WRAPPER -->
		<!-- Javascript -->
		<script src="/assets/vendor/jquery/jquery.min.js"></script>
		<script src="/assets/vendor/bootstrap/js/bootstrap.min.js"></script>
		<script src="/assets/vendor/pace/pace.min.js"></script>
		<script src="/assets/vendor/jquery.easy-pie-chart/jquery.easypiechart.min.js"></script>
		<script src="/assets/vendor/chartist/js/chartist.min.js"></script>
		<script src="/assets/vendor/raphael/raphael.min.js"></script>
		<script src="/assets/vendor/jquery-mapael/js/jquery.mapael.min.js"></script>
		<script src="/assets/vendor/jquery-mapael/js/maps/world_countries.min.js"></script>
		<script src="/assets/vendor/datatables/js-main/jquery.dataTables.min.js"></script>
		<script src="/assets/vendor/datatables/js-bootstrap/dataTables.bootstrap.min.js"></script>
		<script src="/assets/vendor/datatables-tabletools/js/dataTables.tableTools.js"></script>
		<script src="/assets/vendor/chart-js/Chart.min.js"></script>
		<script src="/assets/vendor/Flot/jquery.flot.js"></script>
		<script src="/assets/vendor/Flot/jquery.flot.resize.js"></script>
		<script src="/assets/vendor/jquery-slimscroll/jquery.slimscroll.min.js"></script>
		<script src="/assets/scripts/klorofilpro-common.js"></script>
		<script src="/assets/vendor/toastr/toastr.min.js"></script>

	</body>
</html>