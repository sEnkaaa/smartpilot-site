<!doctype html>
<html lang="en">
	<head>
		<title>SmartPilot</title>
		<meta charset="utf-8">
		<meta http-equiv="X-UA-Compatible" content="IE=edge, chrome=1">
		<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0">
		<!-- VENDOR CSS -->
		<link rel="stylesheet" href="/assets/vendor/bootstrap/css/bootstrap.min.css">
		<link rel="stylesheet" href="/assets/vendor/font-awesome/css/font-awesome.min.css">
		<link rel="stylesheet" href="/assets/vendor/themify-icons/css/themify-icons.css">
		<link rel="stylesheet" href="/assets/vendor/pace/themes/orange/pace-theme-minimal.css">
		<link rel="stylesheet" href="/assets/vendor/select2/css/select2.min.css">
		<link rel="stylesheet" href="/assets/vendor/sweetalert2/sweetalert2.css">
		<!-- MAIN CSS -->
		<link rel="stylesheet" href="/assets/css/main.css">
		<link rel="stylesheet" href="/assets/css/skins/sidebar-nav-darkgray.css" type="text/css">
		<link rel="stylesheet" href="/assets/css/skins/navbar3.css" type="text/css">
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
		<script src="/assets/vendor/select2/js/select2.min.js"></script>
		<script src="/assets/scripts/klorofilpro-common.js"></script>
		<script src="/assets/vendor/sweetalert2/sweetalert2.js"></script>
		<!-- DEMO PANEL -->

		<script type="text/javascript">

			$(function() {
				$('.select-basic').select2();
				if ($('#keywords_count').html() != 0) {
					$('#keywordsTable').show()
					$('#keywordsEmpty').hide()
				} else {
					$('#keywordsTable').hide()
					$('#keywordsEmpty').show()
				}

				@if (session('sweet_alert_success'))
				swal(
					'Good job!',
					'{{session('sweet_alert_success')}}',
					'success'
				).catch(swal.noop);
				@endif

				@if (session('sweet_alert_error'))
				swal(
					'Error!',
					'{{session('sweet_alert_error')}}',
					'error'
				).catch(swal.noop);
				@endif

			})

			function removeKeyword(context) {

				var k = $(context).parent().parent().children().eq(0).html();
				var l = $(context).parent().parent().children().eq(1).html();

				$.ajax({url: "settings/remove/keyword/" + encodeURI(k) + '/' + l, success: function(result) {
			        console.log(result)
			    }});

				$(context).parent().parent().remove();
				var c = $('#keywords_count').html();
				c--;
				if (c != $('#keywords_max_count').html()) {
					$('#keywords_count_badge').addClass('badge-success').removeClass('badge-default');
					$('#addKeywordButton').prop("disabled", false);
				}
				$('#keywords_count').html(c);

				if ($('#keywords_count').html() != 0) {
					$('#keywordsTable').show()
					$('#keywordsEmpty').hide()
				} else {
					$('#keywordsTable').hide()
					$('#keywordsEmpty').show()
				}

			}

			function addKeyword() {
			
				if ($('#keywordInput').val() && $('#keywordInput').val().length > 1) {
					$('#keywordsTable tbody').append('<tr><td>'+ $('#keywordInput').val() + '</td><td>' + $('#langSelector').find(":selected").text() + '</td><td><button onclick="removeKeyword(this)" type="button" class="btn btn-danger btn-xs">Remove</button></td></tr>');
					var c = $('#keywords_count').html();
					c++;
					if (c == $('#keywords_max_count').html()) {
						$('#keywords_count_badge').addClass('badge-default').removeClass('badge-success');
						$('#addKeywordButton').prop("disabled", true);
					}
					

					// add keyword ajax
					$.ajax({url: "settings/add/keyword/" + encodeURI($('#keywordInput').val()) + '/' + $('#langSelector').find(":selected").val(), success: function(result) {
				        alert(result)
				    }});

					$('#keywordInput').val('')
					$('#keywords_count').html(c);

					if ($('#keywords_count').html() != 0) {
					$('#keywordsTable').show()
					$('#keywordsEmpty').hide()
					} else {
						$('#keywordsTable').hide()
						$('#keywordsEmpty').show()
					}
				}

			}

		</script>
	</body>
</html>