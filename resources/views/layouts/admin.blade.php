<!DOCTYPE html>
<html lang="es">

<head>

	<!-- META ============================================= -->
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="keywords" content="" />
	<meta name="author" content="" />
	<meta name="robots" content="" />
	
	<!-- DESCRIPTION -->
	<meta name="description" content="@yield('meta_description', config('app.name'))" />
	
	<!-- OG -->
	<meta property="og:title" content="@yield('meta_og_title', config('app.name'))" />
	<meta property="og:description" content="@yield('meta_og_description', config('app.name'))" />
	<meta property="og:image" content="" />
	<meta name="format-detection" content="telephone=no">
	
	<!-- FAVICONS ICON ============================================= -->
	<link rel="icon" href="../error-404.html" type="image/x-icon" />
	<link rel="shortcut icon" type="image/x-icon" href="{{asset('admin/assets/images/favicon.png')}}" />
	
	<!-- PAGE TITLE HERE ============================================= -->
	<title>@yield('title', config('app.name'))</title>
	
	<!-- MOBILE SPECIFIC ============================================= -->
	<meta name="viewport" content="width=device-width, initial-scale=1">
	
	<!--[if lt IE 9]>
	{!! Html::script('admin/assets/js/html5shiv.min.js') !!}
	{!! Html::script('admin/assets/js/respond.min.js') !!}
	<![endif]-->
	
	<!-- All PLUGINS CSS ============================================= -->
	{!! Html::style('admin/assets/css/assets.css') !!}
	{!! Html::style('admin/assets/vendors/calendar/fullcalendar.css') !!}
	
	<!-- TYPOGRAPHY ============================================= -->
	{!! Html::style('admin/assets/css/typography.css') !!}
	
	<!-- SHORTCODES ============================================= -->
	{!! Html::style('admin/assets/css/shortcodes/shortcodes.css') !!}
	
	<!-- STYLESHEETS ============================================= -->
	{!! Html::style('admin/assets/css/style.css') !!}
	{!! Html::style('admin/assets/css/dashboard.css') !!}
	{!! Html::style('admin/assets/css/color/color-1.css') !!}

	@stack('styles')
	
</head>
<body class="ttr-opened-sidebar ttr-pinned-sidebar">
	
	<!-- header start -->
	<header class="ttr-header">
		<div class="ttr-header-wrapper">
			<!--sidebar menu toggler start -->
			<div class="ttr-toggle-sidebar ttr-material-button">
				<i class="ti-close ttr-open-icon"></i>
				<i class="ti-menu ttr-close-icon"></i>
			</div>
			<!--sidebar menu toggler end -->
			<!--logo start -->
			<div class="ttr-logo-box">
				<div>
					<a href="{{route('dashboard')}}" class="ttr-logo">
						<img class="ttr-logo-mobile" alt="" src="{{asset('admin/assets/images/logo-mobile.png')}}" width="30" height="30">
						<img class="ttr-logo-desktop" alt="" src="{{asset('admin/assets/images/logo-white.png')}}" width="160" height="27">
					</a>
				</div>
			</div>
			<!--logo end -->
			<div class="ttr-header-menu">
				<!-- header left menu start -->
				<ul class="ttr-header-navigation">
					<li>
						<a href="{{route('client.index')}}" class="ttr-material-button ttr-submenu-toggle" target="_blank">HOME</a>
					</li>
					{{--  <li>
						<a href="#" class="ttr-material-button ttr-submenu-toggle">QUICK MENU <i class="fa fa-angle-down"></i></a>
						<div class="ttr-header-submenu">
							<ul>
								<li><a href="../courses.html">Our Courses</a></li>
								<li><a href="../event.html">New Event</a></li>
								<li><a href="../membership.html">Membership</a></li>
							</ul>
						</div>
					</li>  --}}
				</ul>
				<!-- header left menu end -->
			</div>
			<div class="ttr-header-right ttr-with-seperator">
				<!-- header right menu start -->
				<ul class="ttr-header-navigation">
					{{--  <li>
						<a href="#" class="ttr-material-button ttr-search-toggle"><i class="fa fa-search"></i></a>
					</li>  --}}
					{{--  <li>
						<a href="#" class="ttr-material-button ttr-submenu-toggle"><i class="fa fa-bell"></i></a>
						<div class="ttr-header-submenu noti-menu">
							<div class="ttr-notify-header">
								<span class="ttr-notify-text-top">9 New</span>
								<span class="ttr-notify-text">User Notifications</span>
							</div>
							<div class="noti-box-list">
								<ul>
									<li>
										<span class="notification-icon dashbg-gray">
											<i class="fa fa-check"></i>
										</span>
										<span class="notification-text">
											<span>Sneha Jogi</span> sent you a message.
										</span>
										<span class="notification-time">
											<a href="#" class="fa fa-close"></a>
											<span> 02:14</span>
										</span>
									</li>
									<li>
										<span class="notification-icon dashbg-yellow">
											<i class="fa fa-shopping-cart"></i>
										</span>
										<span class="notification-text">
											<a href="#">Your order is placed</a> sent you a message.
										</span>
										<span class="notification-time">
											<a href="#" class="fa fa-close"></a>
											<span> 7 Min</span>
										</span>
									</li>
									<li>
										<span class="notification-icon dashbg-red">
											<i class="fa fa-bullhorn"></i>
										</span>
										<span class="notification-text">
											<span>Your item is shipped</span> sent you a message.
										</span>
										<span class="notification-time">
											<a href="#" class="fa fa-close"></a>
											<span> 2 May</span>
										</span>
									</li>
									<li>
										<span class="notification-icon dashbg-green">
											<i class="fa fa-comments-o"></i>
										</span>
										<span class="notification-text">
											<a href="#">Sneha Jogi</a> sent you a message.
										</span>
										<span class="notification-time">
											<a href="#" class="fa fa-close"></a>
											<span> 14 July</span>
										</span>
									</li>
									<li>
										<span class="notification-icon dashbg-primary">
											<i class="fa fa-file-word-o"></i>
										</span>
										<span class="notification-text">
											<span>Sneha Jogi</span> sent you a message.
										</span>
										<span class="notification-time">
											<a href="#" class="fa fa-close"></a>
											<span> 15 Min</span>
										</span>
									</li>
								</ul>
							</div>
						</div>
					</li>  --}}

					<li>
						<a href="#" class="ttr-material-button ttr-submenu-toggle"><span class="ttr-user-avatar"><img alt="" src="{{ Auth::user()->avatary }}" width="32" height="32"></span></a>
						<div class="ttr-header-submenu">
							<ul>
								{{--  <li><a href="user-profile.html">My profile</a></li>
								<li><a href="list-view-calendar.html">Activity</a></li>
								<li><a href="mailbox.html">Messages</a></li>  --}}
								<li>
									<a href="{{ route('logout') }}" 
									onclick="event.preventDefault();
									document.getElementById('logout-form').submit();"
									>Logout</a>
									<form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                        @csrf
                                    </form>
								</li>
							</ul>
						</div>
					</li>

					{{--  <li class="ttr-hide-on-mobile">
						<a href="#" class="ttr-material-button"><i class="ti-layout-grid3-alt"></i></a>
						<div class="ttr-header-submenu ttr-extra-menu">
							<a href="#">
								<i class="fa fa-music"></i>
								<span>Musics</span>
							</a>
							<a href="#">
								<i class="fa fa-youtube-play"></i>
								<span>Videos</span>
							</a>
							<a href="#">
								<i class="fa fa-envelope"></i>
								<span>Emails</span>
							</a>
							<a href="#">
								<i class="fa fa-book"></i>
								<span>Reports</span>
							</a>
							<a href="#">
								<i class="fa fa-smile-o"></i>
								<span>Persons</span>
							</a>
							<a href="#">
								<i class="fa fa-picture-o"></i>
								<span>Pictures</span>
							</a>
						</div>
					</li>  --}}
				</ul>
				<!-- header right menu end -->
			</div>
			<!--header search panel start -->
			<div class="ttr-search-bar">
				<form class="ttr-search-form">
					<div class="ttr-search-input-wrapper">
						<input type="text" name="qq" placeholder="search something..." class="ttr-search-input">
						<button type="submit" name="search" class="ttr-search-submit"><i class="ti-arrow-right"></i></button>
					</div>
					<span class="ttr-search-close ttr-search-toggle">
						<i class="ti-close"></i>
					</span>
				</form>
			</div>
			<!--header search panel end -->
		</div>
	</header>
	<!-- header end -->
	<!-- Left sidebar menu start -->
	<div class="ttr-sidebar">
		<div class="ttr-sidebar-wrapper content-scroll">
			<!-- side menu logo start -->
			<div class="ttr-sidebar-logo">
				<a href="{{route('dashboard')}}"><img alt="" src="{{asset('admin/assets/images/logo.png')}}" width="122" height="27"></a>
				<!-- <div class="ttr-sidebar-pin-button" title="Pin/Unpin Menu">
					<i class="material-icons ttr-fixed-icon">gps_fixed</i>
					<i class="material-icons ttr-not-fixed-icon">gps_not_fixed</i>
				</div> -->
				<div class="ttr-sidebar-toggle-button">
					<i class="ti-arrow-left"></i>
				</div>
			</div>
			<!-- side menu logo end -->
			<!-- sidebar menu start -->
			@include('layouts.sidebar_menu')
			<!-- sidebar menu end -->
		</div>
	</div>
	<!-- Left sidebar menu end -->

	<!--Main container start -->
    @yield('content')
	<div class="ttr-overlay"></div>

<!-- External JavaScripts -->
{!! Html::script('admin/assets/js/jquery.min.js') !!}
{!! Html::script('admin/assets/vendors/bootstrap/js/popper.min.js') !!}
{!! Html::script('admin/assets/vendors/bootstrap/js/bootstrap.min.js') !!}
{!! Html::script('admin/assets/vendors/bootstrap-select/bootstrap-select.min.js') !!}
{!! Html::script('admin/assets/vendors/bootstrap-touchspin/jquery.bootstrap-touchspin.js') !!}
{!! Html::script('admin/assets/vendors/magnific-popup/magnific-popup.js') !!}
{!! Html::script('admin/assets/vendors/counter/waypoints-min.js') !!}
{!! Html::script('admin/assets/vendors/counter/counterup.min.js') !!}
{!! Html::script('admin/assets/vendors/imagesloaded/imagesloaded.js') !!}
{!! Html::script('admin/assets/vendors/masonry/masonry.js') !!}
{!! Html::script('admin/assets/vendors/masonry/filter.js') !!}
{!! Html::script('admin/assets/vendors/owl-carousel/owl.carousel.js') !!}
{!! Html::script('admin/assets/vendors/scroll/scrollbar.min.js') !!}
{!! Html::script('admin/assets/js/functions.js') !!}
{!! Html::script('admin/assets/vendors/chart/chart.min.js') !!}
{!! Html::script('admin/assets/js/admin.js') !!}
{!! Html::script('admin/assets/vendors/calendar/moment.min.js') !!}
{!! Html::script('admin/assets/vendors/calendar/fullcalendar.js') !!}
{!! Html::script('admin/assets/vendors/switcher/switcher.js') !!}

@include('sweetalert::alert')

@stack('scripts')

</body>

</html>