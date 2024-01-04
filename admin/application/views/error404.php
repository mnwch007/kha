<!DOCTYPE html>
<html lang="en" >
	<!-- begin::Head -->
	<head>
		<meta charset="utf-8" />
		<title>
            <?php echo SITENAME; ?><?php echo (!empty($page_text)) ? ' - ' . $page_text : ''; ?>
		</title>
		<meta name="description" content="Latest updates and statistic charts">
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
		<!--begin::Web font -->
		<script src="https://ajax.googleapis.com/ajax/libs/webfont/1.6.16/webfont.js"></script>
		<script>
          WebFont.load({
            google: {"families":["Prompt:300,400,500,600,700","Poppins:300,400,500,600,700","Roboto:300,400,500,600,700"]},
            active: function() {
                sessionStorage.fonts = true;
            }
          });
		</script>
		<!--end::Web font -->
        <!--begin::Base Styles -->
		<link href="<?php echo base_url('assets/vendors/base/vendors.bundle.css'); ?>" rel="stylesheet" type="text/css" />
		<link href="<?php echo base_url('assets/demo/default/base/style.bundle.css'); ?>" rel="stylesheet" type="text/css" />
		<!--end::Base Styles -->
		<link rel="icon" type="image/png" href="<?php echo base_url('assets/img/sti_fav.png'); ?>" />
	</head>
	<!-- end::Head -->
    <!-- end::Body -->
	<body  class="m--skin- m-header--fixed m-header--fixed-mobile m-aside-left--enabled m-aside-left--skin-dark m-aside-left--offcanvas m-footer--push m-aside--offcanvas-default"  >
		<!-- begin:: Page -->
		<div class="m-grid m-grid--hor m-grid--root m-page">
			<div class="m-grid__item m-grid__item--fluid m-grid  m-error-1" style="background-image: url(<?php echo base_url('assets/app/media/img//error/bg1.jpg'); ?>);">
				<div class="m-error_container">
					<span class="m-error_number">
						<h1 class="m--font-danger">
							404
						</h1>
					</span>
					<p class="m-error_desc">
                        Page not found please check your url
                    </p>
                    <p class="m-error_desc">
                        <a href="<?php echo base_url(); ?>" class="btn m-btn m-btn--gradient-from-danger m-btn--gradient-to-warning">
                            Back to Dashboard
                        </a>
                    </p>
				</div>
			</div>
		</div>
		<!-- end:: Page -->
    	<!--begin::Base Scripts -->
		<script src="<?php echo base_url('assets/vendors/base/vendors.bundle.js'); ?>" type="text/javascript"></script>
		<script src="<?php echo base_url('assets/demo/default/base/scripts.bundle.js'); ?>" type="text/javascript"></script>
		<!--end::Base Scripts -->
	</body>
	<!-- end::Body -->
</html>