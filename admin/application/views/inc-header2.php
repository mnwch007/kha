<!DOCTYPE html>
<html lang="en" >
	<!-- begin::Head -->
	<head>
		<base href="<?php echo base_url(); ?>" />
		<meta charset="utf-8" />
		<title>
            <?php echo SITENAME; ?><?php echo (!empty($page_text)) ? ' - ' . $page_text : ''; ?>
		</title>
		<meta name="description" content="<?php echo SITENAME; ?><?php echo (!empty($page_text)) ? ' - ' . $page_text : ''; ?>">
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
        <!--begin::Page Vendors -->
		<link href="<?php echo base_url('assets/vendors/custom/fullcalendar/fullcalendar.bundle.css'); ?>" rel="stylesheet" type="text/css" />
		<!--end::Page Vendors -->
        <!--begin::Base Styles -->
		<link href="<?php echo base_url('assets/vendors/base/vendors.bundle.css'); ?>" rel="stylesheet" type="text/css" />
		<link href="<?php echo base_url('assets/demo/default/base/style.bundle.css'); ?>" rel="stylesheet" type="text/css" />
		<link href="<?php echo base_url('assets/css/ui/trumbowyg.min.css'); ?>" rel="stylesheet" type="text/css" />
		<link href="<?php echo base_url('assets/css/ui/trumbowyg.table.min.css'); ?>" rel="stylesheet" type="text/css" />
		<?php echo $css; ?>
		<!--end::Base Styles -->
		<link rel="icon" type="image/png" href="<?php echo base_url('assets/img/favicon.ico'); ?>" />
		<!--begin::Base Scripts -->
		<script src="<?php echo base_url('assets/vendors/base/vendors.bundle.js'); ?>" type="text/javascript"></script>
		<script src="<?php echo base_url('assets/demo/default/base/scripts.bundle.js'); ?>" type="text/javascript"></script>
		<!--end::Base Scripts -->
		<!-- ckeditor -->
		<script type="text/javascript" src="<?php echo base_url('assets/plugins/ckeditor/ckeditor.js'); ?>" charset="utf-8" accept-charset="UTF-8"></script>
		<!-- wygsiwig -->
		<script src="<?php echo base_url('assets/js/trumbowyg.min.js'); ?>" type="text/javascript"></script>
		<script src="<?php echo base_url('assets/js/plugins/cleanpaste/trumbowyg.cleanpaste.min.js'); ?>" type="text/javascript"></script>
		<script src="<?php echo base_url('assets/js/plugins/pasteimage/trumbowyg.pasteimage.min.js'); ?>" type="text/javascript"></script>
		<script src="<?php echo base_url('assets/js/plugins/upload/trumbowyg.upload.min.js'); ?>" type="text/javascript"></script>
		<script src="<?php echo base_url('assets/js/plugins/resizimg/trumbowyg.resizimg.min.js'); ?>" type="text/javascript"></script>
		<script src="<?php echo base_url('assets/js/plugins/lineheight/trumbowyg.lineheight.min.js'); ?>" type="text/javascript"></script>
		<script src="<?php echo base_url('assets/js/plugins/preformatted/trumbowyg.preformatted.min.js'); ?>" type="text/javascript"></script>
		<script src="<?php echo base_url('assets/js/plugins/table/trumbowyg.table.min.js'); ?>" type="text/javascript"></script>
		<script src="<?php echo base_url('assets/js/plugins/base64/trumbowyg.base64.min.js'); ?>" type="text/javascript"></script>
		<script src="<?php echo base_url('assets/js/plugins/pasteembed/trumbowyg.pasteembed.js'); ?>" type="text/javascript"></script>
		<script src="<?php echo base_url('assets/js/plugins/noembed/trumbowyg.noembed.js'); ?>" type="text/javascript"></script>
		<script src="<?php echo base_url('assets/js/plugins/allowtagsfrompaste/trumbowyg.allowtagsfrompaste.min.js'); ?>" type="text/javascript"></script>
                <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBGdG1sJi8quw-XUXd3pMFPgebvDhUrCvM&libraries=places"></script> 

		<script>var base_url = '<?php echo base_url() ?>';</script>
	</head>
	<!-- end::Head -->
    <!-- end::Body -->
	<body  class="m-page--fluid m--skin- m-content--skin-light2 m-header--fixed m-header--fixed-mobile m-aside-left--enabled m-aside-left--skin-dark m-aside-left--offcanvas m-footer--push m-aside--offcanvas-default"  >
		<!-- begin:: Page -->
		<div class="m-grid m-grid--hor m-grid--root m-page">
			<!-- BEGIN: Header -->
			<header id="m_header" class="m-grid__item    m-header "  m-minimize-offset="200" m-minimize-mobile-offset="200" >
				<div class="m-container m-container--fluid m-container--full-height">
					<div class="m-stack m-stack--ver m-stack--desktop">
						<!-- BEGIN: Brand -->
						<div class="m-stack__item m-brand  m-brand--skin-dark ">
							<div class="m-stack m-stack--ver m-stack--general">
								<div class="m-stack__item m-stack__item--middle m-brand__logo">
									<div class="m--font-est">
										Management
									</div>
								</div>
								<div class="m-stack__item m-stack__item--middle m-brand__tools">
									<!-- BEGIN: Left Aside Minimize Toggle -->
									<a href="javascript:;" id="m_aside_left_minimize_toggle" class="m-brand__icon m-brand__toggler m-brand__toggler--left m--visible-desktop-inline-block">
										<span></span>
									</a>
									<!-- END -->
							        <!-- BEGIN: Responsive Aside Left Menu Toggler -->
									<a href="javascript:;" id="m_aside_left_offcanvas_toggle" class="m-brand__icon m-brand__toggler m-brand__toggler--left m--visible-tablet-and-mobile-inline-block">
										<span></span>
									</a>
									<!-- END -->
							        <!-- BEGIN: Responsive Header Menu Toggler -->
									<a id="m_aside_header_menu_mobile_toggle" href="javascript:;" class="m-brand__icon m-brand__toggler m--visible-tablet-and-mobile-inline-block">
										<span></span>
									</a>
									<!-- END -->
			                        <!-- BEGIN: Topbar Toggler -->
									<a id="m_aside_header_topbar_mobile_toggle" href="javascript:;" class="m-brand__icon m--visible-tablet-and-mobile-inline-block">
										<i class="flaticon-more"></i>
									</a>
									<!-- BEGIN: Topbar Toggler -->
								</div>
							</div>
						</div>
						<!-- END: Brand -->
						<div class="m-stack__item m-stack__item--fluid m-header-head" id="m_header_nav">

							<a href="" class="m-brand__icon m-brand__toggler m-brand__toggler--left m--visible-desktop-inline-block">
								<img src="<?php echo base_url('assets/img/logo_estar.jpg'); ?>" class="center-block img-responsive" style="max-width: 100%; max-height: 70px;" />
							</a>
							<!-- BEGIN: Horizontal Menu -->
							<button class="m-aside-header-menu-mobile-close  m-aside-header-menu-mobile-close--skin-dark " id="m_aside_header_menu_mobile_close_btn">
								<i class="la la-close"></i>
							</button>
							<!-- <div id="m_header_menu" class="m-header-menu m-aside-header-menu-mobile m-aside-header-menu-mobile--offcanvas  m-header-menu--skin-light m-header-menu--submenu-skin-light m-aside-header-menu-mobile--skin-dark m-aside-header-menu-mobile--submenu-skin-dark "  >
								<ul class="m-menu__nav  m-menu__nav--submenu-arrow ">
									<li class="m-menu__item  m-menu__item--submenu m-menu__item--rel"  m-menu-submenu-toggle="click" m-menu-link-redirect="1" aria-haspopup="true">
										<a  href="javascript:;" class="m-menu__link m-menu__toggle">
											<i class="m-menu__link-icon flaticon-line-graph"></i>
											<span class="m-menu__link-text">
												Reports
											</span>
											<i class="m-menu__hor-arrow la la-angle-down"></i>
											<i class="m-menu__ver-arrow la la-angle-right"></i>
										</a>
										<div class="m-menu__submenu  m-menu__submenu--fixed m-menu__submenu--left" style="width:1000px">
											<span class="m-menu__arrow m-menu__arrow--adjust"></span>
											<div class="m-menu__subnav">
												<ul class="m-menu__content">
													<li class="m-menu__item">
														<h3 class="m-menu__heading m-menu__toggle">
															<span class="m-menu__link-text">
																Finance Reports
															</span>
															<i class="m-menu__ver-arrow la la-angle-right"></i>
														</h3>
														<ul class="m-menu__inner">
															<li class="m-menu__item "  m-menu-link-redirect="1" aria-haspopup="true">
																<a  href="../header/actions.html" class="m-menu__link ">
																	<i class="m-menu__link-icon flaticon-map"></i>
																	<span class="m-menu__link-text">
																		Annual Reports
																	</span>
																</a>
															</li>
															<li class="m-menu__item "  m-menu-link-redirect="1" aria-haspopup="true">
																<a  href="../header/actions.html" class="m-menu__link ">
																	<i class="m-menu__link-icon flaticon-user"></i>
																	<span class="m-menu__link-text">
																		HR Reports
																	</span>
																</a>
															</li>
															<li class="m-menu__item "  m-menu-link-redirect="1" aria-haspopup="true">
																<a  href="../header/actions.html" class="m-menu__link ">
																	<i class="m-menu__link-icon flaticon-clipboard"></i>
																	<span class="m-menu__link-text">
																		IPO Reports
																	</span>
																</a>
															</li>
															<li class="m-menu__item "  m-menu-link-redirect="1" aria-haspopup="true">
																<a  href="../header/actions.html" class="m-menu__link ">
																	<i class="m-menu__link-icon flaticon-graphic-1"></i>
																	<span class="m-menu__link-text">
																		Finance Margins
																	</span>
																</a>
															</li>
															<li class="m-menu__item "  m-menu-link-redirect="1" aria-haspopup="true">
																<a  href="../header/actions.html" class="m-menu__link ">
																	<i class="m-menu__link-icon flaticon-graphic-2"></i>
																	<span class="m-menu__link-text">
																		Revenue Reports
																	</span>
																</a>
															</li>
														</ul>
													</li>
													<li class="m-menu__item">
														<h3 class="m-menu__heading m-menu__toggle">
															<span class="m-menu__link-text">
																Project Reports
															</span>
															<i class="m-menu__ver-arrow la la-angle-right"></i>
														</h3>
														<ul class="m-menu__inner">
															<li class="m-menu__item "  m-menu-link-redirect="1" aria-haspopup="true">
																<a  href="../header/actions.html" class="m-menu__link ">
																	<i class="m-menu__link-bullet m-menu__link-bullet--line">
																		<span></span>
																	</i>
																	<span class="m-menu__link-text">
																		Coca Cola CRM
																	</span>
																</a>
															</li>
															<li class="m-menu__item "  m-menu-link-redirect="1" aria-haspopup="true">
																<a  href="../header/actions.html" class="m-menu__link ">
																	<i class="m-menu__link-bullet m-menu__link-bullet--line">
																		<span></span>
																	</i>
																	<span class="m-menu__link-text">
																		Delta Airlines Booking Site
																	</span>
																</a>
															</li>
															<li class="m-menu__item "  m-menu-link-redirect="1" aria-haspopup="true">
																<a  href="../header/actions.html" class="m-menu__link ">
																	<i class="m-menu__link-bullet m-menu__link-bullet--line">
																		<span></span>
																	</i>
																	<span class="m-menu__link-text">
																		Malibu Accounting
																	</span>
																</a>
															</li>
															<li class="m-menu__item "  m-menu-link-redirect="1" aria-haspopup="true">
																<a  href="../header/actions.html" class="m-menu__link ">
																	<i class="m-menu__link-bullet m-menu__link-bullet--line">
																		<span></span>
																	</i>
																	<span class="m-menu__link-text">
																		Vineseed Website Rewamp
																	</span>
																</a>
															</li>
															<li class="m-menu__item "  m-menu-link-redirect="1" aria-haspopup="true">
																<a  href="../header/actions.html" class="m-menu__link ">
																	<i class="m-menu__link-bullet m-menu__link-bullet--line">
																		<span></span>
																	</i>
																	<span class="m-menu__link-text">
																		Zircon Mobile App
																	</span>
																</a>
															</li>
															<li class="m-menu__item "  m-menu-link-redirect="1" aria-haspopup="true">
																<a  href="../header/actions.html" class="m-menu__link ">
																	<i class="m-menu__link-bullet m-menu__link-bullet--line">
																		<span></span>
																	</i>
																	<span class="m-menu__link-text">
																		Mercury CMS
																	</span>
																</a>
															</li>
														</ul>
													</li>
													<li class="m-menu__item">
														<h3 class="m-menu__heading m-menu__toggle">
															<span class="m-menu__link-text">
																HR Reports
															</span>
															<i class="m-menu__ver-arrow la la-angle-right"></i>
														</h3>
														<ul class="m-menu__inner">
															<li class="m-menu__item "  m-menu-link-redirect="1" aria-haspopup="true">
																<a  href="../header/actions.html" class="m-menu__link ">
																	<i class="m-menu__link-bullet m-menu__link-bullet--dot">
																		<span></span>
																	</i>
																	<span class="m-menu__link-text">
																		Staff Directory
																	</span>
																</a>
															</li>
															<li class="m-menu__item "  m-menu-link-redirect="1" aria-haspopup="true">
																<a  href="../header/actions.html" class="m-menu__link ">
																	<i class="m-menu__link-bullet m-menu__link-bullet--dot">
																		<span></span>
																	</i>
																	<span class="m-menu__link-text">
																		Client Directory
																	</span>
																</a>
															</li>
															<li class="m-menu__item "  m-menu-link-redirect="1" aria-haspopup="true">
																<a  href="../header/actions.html" class="m-menu__link ">
																	<i class="m-menu__link-bullet m-menu__link-bullet--dot">
																		<span></span>
																	</i>
																	<span class="m-menu__link-text">
																		Salary Reports
																	</span>
																</a>
															</li>
															<li class="m-menu__item "  m-menu-link-redirect="1" aria-haspopup="true">
																<a  href="../header/actions.html" class="m-menu__link ">
																	<i class="m-menu__link-bullet m-menu__link-bullet--dot">
																		<span></span>
																	</i>
																	<span class="m-menu__link-text">
																		Staff Payslips
																	</span>
																</a>
															</li>
															<li class="m-menu__item "  m-menu-link-redirect="1" aria-haspopup="true">
																<a  href="../header/actions.html" class="m-menu__link ">
																	<i class="m-menu__link-bullet m-menu__link-bullet--dot">
																		<span></span>
																	</i>
																	<span class="m-menu__link-text">
																		Corporate Expenses
																	</span>
																</a>
															</li>
															<li class="m-menu__item "  m-menu-link-redirect="1" aria-haspopup="true">
																<a  href="../header/actions.html" class="m-menu__link ">
																	<i class="m-menu__link-bullet m-menu__link-bullet--dot">
																		<span></span>
																	</i>
																	<span class="m-menu__link-text">
																		Project Expenses
																	</span>
																</a>
															</li>
														</ul>
													</li>
													<li class="m-menu__item">
														<h3 class="m-menu__heading m-menu__toggle">
															<span class="m-menu__link-text">
																Reporting Apps
															</span>
															<i class="m-menu__ver-arrow la la-angle-right"></i>
														</h3>
														<ul class="m-menu__inner">
															<li class="m-menu__item "  m-menu-link-redirect="1" aria-haspopup="true">
																<a  href="../header/actions.html" class="m-menu__link ">
																	<span class="m-menu__link-text">
																		Report Adjusments
																	</span>
																</a>
															</li>
															<li class="m-menu__item "  m-menu-link-redirect="1" aria-haspopup="true">
																<a  href="../header/actions.html" class="m-menu__link ">
																	<span class="m-menu__link-text">
																		Sources & Mediums
																	</span>
																</a>
															</li>
															<li class="m-menu__item "  m-menu-link-redirect="1" aria-haspopup="true">
																<a  href="../header/actions.html" class="m-menu__link ">
																	<span class="m-menu__link-text">
																		Reporting Settings
																	</span>
																</a>
															</li>
															<li class="m-menu__item "  m-menu-link-redirect="1" aria-haspopup="true">
																<a  href="../header/actions.html" class="m-menu__link ">
																	<span class="m-menu__link-text">
																		Conversions
																	</span>
																</a>
															</li>
															<li class="m-menu__item "  m-menu-link-redirect="1" aria-haspopup="true">
																<a  href="../header/actions.html" class="m-menu__link ">
																	<span class="m-menu__link-text">
																		Report Flows
																	</span>
																</a>
															</li>
															<li class="m-menu__item "  m-menu-link-redirect="1" aria-haspopup="true">
																<a  href="../header/actions.html" class="m-menu__link ">
																	<span class="m-menu__link-text">
																		Audit & Logs
																	</span>
																</a>
															</li>
														</ul>
													</li>
												</ul>
											</div>
										</div>
									</li>
								</ul>
							</div> -->
							<!-- END: Horizontal Menu -->								<!-- BEGIN: Topbar -->
							<div id="m_header_topbar" class="m-topbar  m-stack m-stack--ver m-stack--general">
								<div class="m-stack__item m-topbar__nav-wrapper">
									<ul class="m-topbar__nav m-nav m-nav--inline">
										<!-- <li class="
											m-nav__item m-dropdown m-dropdown--large m-dropdown--arrow m-dropdown--align-center m-dropdown--mobile-full-width m-dropdown--skin-light	m-list-search m-list-search--skin-light" 
											m-dropdown-toggle="click" id="m_quicksearch" m-quicksearch-mode="dropdown" m-dropdown-persistent="1">
											<a href="#" class="m-nav__link m-dropdown__toggle">
												<span class="m-nav__link-icon">
													<i class="flaticon-search-1"></i>
												</span>
											</a>
											<div class="m-dropdown__wrapper">
												<span class="m-dropdown__arrow m-dropdown__arrow--center"></span>
												<div class="m-dropdown__inner ">
													<div class="m-dropdown__header">
														<form  class="m-list-search__form">
															<div class="m-list-search__form-wrapper">
																<span class="m-list-search__form-input-wrapper">
																	<input id="m_quicksearch_input" autocomplete="off" type="text" name="q" class="m-list-search__form-input" value="" placeholder="Search...">
																</span>
																<span class="m-list-search__form-icon-close" id="m_quicksearch_close">
																	<i class="la la-remove"></i>
																</span>
															</div>
														</form>
													</div>
													<div class="m-dropdown__body">
														<div class="m-dropdown__scrollable m-scrollable" data-scrollable="true" data-max-height="300" data-mobile-max-height="200">
															<div class="m-dropdown__content"></div>
														</div>
													</div>
												</div>
											</div>
										</li> -->
										<li class="m-nav__item m-topbar__user-profile m-topbar__user-profile--img  m-dropdown m-dropdown--medium m-dropdown--arrow m-dropdown--header-bg-fill m-dropdown--align-right m-dropdown--mobile-full-width m-dropdown--skin-light" m-dropdown-toggle="click">
											<a href="#" class="m-nav__link m-dropdown__toggle">
												<span class="m-topbar__userpic">
													<img src="<?php echo ($this->session->userdata('scu_photo') ? base_url('assets/img/default-user.png') : base_url('assets/img/default-user.png')); ?>" class="m--img-rounded m--marginless m--img-centered" alt=""/>
												</span>
												<span class="m-topbar__username m--hide">
													Nick
												</span>
											</a>
											<div class="m-dropdown__wrapper">
												<span class="m-dropdown__arrow m-dropdown__arrow--right m-dropdown__arrow--adjust"></span>
												<div class="m-dropdown__inner">
													<div class="m-dropdown__header m--align-center" style="background: url(<?php echo base_url('assets/img/user_profile_bg.jpg'); ?>); background-size: cover;">
														<div class="m-card-user m-card-user--skin-dark">
															<div class="m-card-user__pic">
																<img src="<?php echo $this->session->userdata('scu_photo'); ?>" class="m--img-rounded m--marginless" alt=""/>
															</div>
															<div class="m-card-user__details">
																<span class="m-card-user__name m--font-weight-500 m--font-black">
																	Hi, <?php echo ($this->session->userdata('scu_firstname') == '' ? $this->session->userdata('scu_firstname') : $this->session->userdata('scu_firstname')); ?>
																</span>
																<a href="mailto:<?php echo ($this->session->userdata('scu_email') == '' ? $this->session->userdata('scu_email') : $this->session->userdata('scu_email')); ?>" class="m-card-user__email m--font-weight-300 m-link m--font-m--font-grey">
																	<?php echo ($this->session->userdata('scu_email') == '' ? $this->session->userdata('scu_email') : $this->session->userdata('scu_email')); ?>
																</a>
															</div>
														</div>
													</div>
													<div class="m-dropdown__body">
														<div class="m-dropdown__content">
															<ul class="m-nav m-nav--skin-light">
																<li class="m-nav__section m--hide">
																	<span class="m-nav__section-text">
																		Section
																	</span>
																</li>
																<li class="m-nav__item">
																	<a href="<?php echo base_url('account/password'); ?>" class="m-nav__link">
																		<i class="m-nav__link-icon flaticon-lock"></i>
																		<span class="m-nav__link-title">
																			<span class="m-nav__link-wrap">
																				<span class="m-nav__link-text">
																					Change Password
																				</span>
																				<!-- <span class="m-nav__link-badge">
																					<span class="m-badge m-badge--success">
																						0
																					</span>
																				</span> -->
																			</span>
																		</span>
																	</a>
																</li>
																<li class="m-nav__separator m-nav__separator--fit"></li>
																<li class="m-nav__item">
																	<a href="<?php echo base_url('logout'); ?>" class="btn m-btn--pill m-btn m-btn--gradient-from-danger m-btn--gradient-to-warning m-setfont__main">
																		Logout
																	</a>
																</li>
															</ul>
														</div>
													</div>
												</div>
											</div>
										</li>
									</ul>
								</div>
							</div>
							<!-- END: Topbar -->
						</div>
					</div>
				</div>
			</header>
			<!-- END: Header -->