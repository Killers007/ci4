
<!DOCTYPE html>
<html class="loading" lang="en" data-textdirection="ltr">
<!-- BEGIN: Head-->

<head>
	<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0">
	<meta name="description" content="Frest admin is super flexible, powerful, clean &amp; modern responsive bootstrap 4 admin template with unlimited possibilities.">
	<meta name="keywords" content="admin template, Frest admin template, dashboard template, flat admin template, responsive admin template, web app">
	<meta name="author" content="PIXINVENT">
	<title>Error 404</title>
	<link rel="apple-touch-icon" href="/app-assets/images/ico/apple-icon-120.png">
	<link rel="shortcut icon" type="image/x-icon" href="/app-assets/images/ico/favicon.ico">
	<link href="https://fonts.googleapis.com/css?family=Rubik:300,400,500,600%7CIBM+Plex+Sans:300,400,500,600,700" rel="stylesheet">

	<!-- BEGIN: Vendor CSS-->
	<link rel="stylesheet" type="text/css" href="/app-assets/vendors/css/vendors.min.css">
	<!-- END: Vendor CSS-->

	<!-- BEGIN: Theme CSS-->
	<link rel="stylesheet" type="text/css" href="/app-assets/css/bootstrap.css">
	<link rel="stylesheet" type="text/css" href="/app-assets/css/bootstrap-extended.css">
	<link rel="stylesheet" type="text/css" href="/app-assets/css/colors.css">
	<link rel="stylesheet" type="text/css" href="/app-assets/css/components.css">
	<link rel="stylesheet" type="text/css" href="/app-assets/css/themes/dark-layout.css">
	<link rel="stylesheet" type="text/css" href="/app-assets/css/themes/semi-dark-layout.css">
	<!-- END: Theme CSS-->

	<!-- BEGIN: Page CSS-->
	<link rel="stylesheet" type="text/css" href="/app-assets/css/core/menu/menu-types/vertical-menu.css">
	<!-- END: Page CSS-->

	<!-- BEGIN: Custom CSS-->
	<link rel="stylesheet" type="text/css" href="/assets/css/style.css">
	<!-- END: Custom CSS-->

</head>
<!-- END: Head-->

<!-- BEGIN: Body-->

<body class="vertical-layout vertical-menu-modern 1-column  navbar-sticky footer-static bg-full-screen-image  blank-page blank-page" data-open="click" data-menu="vertical-menu-modern" data-col="1-column">
	<!-- BEGIN: Content-->
	<div class="app-content content">
		<div class="content-overlay"></div>
		<div class="content-wrapper">
			<div class="content-header row">
			</div>
			<div class="content-body">
				<!-- error 404 -->
				<section class="row flexbox-container">
					<div class="col-xl-6 col-md-7 col-9">
						<div class="card bg-transparent shadow-none">
							<div class="card-content">
								<div class="card-body text-center bg-transparent miscellaneous">
									<h1 class="error-title">Page Not Found :(</h1>
									<p class="pb-3">
										<?php if (! empty($message) && $message !== '(null)') : ?>
											<?= esc($message) ?>
											<?php else : ?>
												Sorry! Cannot seem to find the page you were looking for.
											<?php endif ?>   
										</p>
										<img class="img-fluid" src="/app-assets/images/pages/404.png" alt="404 error">
										<a href="<?php echo @$_SERVER['HTTP_REFERER'] ?>" class="btn btn-primary round glow mt-3">BACK
											TO
										HOME</a>
									</div>
								</div>
							</div>
						</div>
					</section>
					<!-- error 404 end -->
				</div>
			</div>
		</div>
		<!-- END: Content-->


		<!-- BEGIN: Vendor JS-->
		<script src="/app-assets/vendors/js/vendors.min.js"></script>
		<script src="/app-assets/fonts/LivIconsEvo/js/LivIconsEvo.tools.js"></script>
		<script src="/app-assets/fonts/LivIconsEvo/js/LivIconsEvo.defaults.js"></script>
		<script src="/app-assets/fonts/LivIconsEvo/js/LivIconsEvo.min.js"></script>
		<!-- BEGIN Vendor JS-->

		<!-- BEGIN: Page Vendor JS-->
		<!-- END: Page Vendor JS-->

		<!-- BEGIN: Theme JS-->
		<script src="/app-assets/js/scripts/configs/vertical-menu-light.js"></script>
		<script src="/app-assets/js/core/app-menu.js"></script>
		<script src="/app-assets/js/core/app.js"></script>
		<script src="/app-assets/js/scripts/components.js"></script>
		<script src="/app-assets/js/scripts/footer.js"></script>
		<!-- END: Theme JS-->

		<!-- BEGIN: Page JS-->
		<!-- END: Page JS-->

	</body>
	<!-- END: Body-->

	</html>