<!DOCTYPE html>
<html lang="en">

<head>

	<!-- META ============================================= -->
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="keywords" content="" />
	<meta name="author" content="{{ config('app.name', 'LinksOf') }}" />
	<meta name="robots" content="" />
	
	<!-- DESCRIPTION -->
	<meta name="description" content="@yield('meta_description', config('app.name'))" />
	
	<!-- OG -->
	<meta property="og:title" content="@yield('meta_og_title', config('app.name'))" />
	<meta property="og:description" content="@yield('meta_og_description', config('app.name'))" />
	<meta property="og:image" content="" />
	<meta name="format-detection" content="telephone=no">
	<meta name="keyword" content="@yield('meta_keyword', config('app.name'))">

	<!-- FAVICONS ICON ============================================= -->
	<link rel="icon" href="{{asset('assets/images/favicon.ico')}}" type="image/x-icon" />
	<link rel="shortcut icon" type="image/x-icon" href="{{asset('assets/images/favicon.png')}}" />
	
	<!-- PAGE TITLE HERE ============================================= -->
	<title>@yield('title', config('app.name'))</title>
	
	<!-- MOBILE SPECIFIC ============================================= -->
	<meta name="viewport" content="width=device-width, initial-scale=1">
	
	<!--[if lt IE 9]>
	{!! Html::script("assets/js/html5shiv.min.js") !!}
	{!! Html::script("assets/js/respond.min.js") !!}
	<![endif]-->
	
	<!-- All PLUGINS CSS ============================================= -->
	{!! Html::style('assets/css/assets.css') !!}
	
	<!-- TYPOGRAPHY ============================================= -->
	{!! Html::style('assets/css/typography.css') !!}
	
	<!-- SHORTCODES ============================================= -->
	{!! Html::style('assets/css/shortcodes/shortcodes.css') !!}
	
	<!-- STYLESHEETS ============================================= -->
	{!! Html::style('assets/css/style.css') !!}
	{!! Html::style('assets/css/color/color-1.css') !!}
	
	<!-- REVOLUTION SLIDER CSS ============================================= -->
	{!! Html::style('assets/vendors/revolution/css/layers.css') !!}
	{!! Html::style('assets/vendors/revolution/css/settings.css') !!}
	{!! Html::style('assets/vendors/revolution/css/navigation.css') !!}

	{!! Html::style('css/typeaheadjs.css') !!}

	@stack('styles')
	
	<!-- REVOLUTION SLIDER END -->	
</head>
<body id="bg">
<div class="page-wraper">
<div id="loading-icon-bx"></div>
	<!-- Header Top ==== -->
    <header class="header rs-nav">
		<div class="top-bar">
			<div class="container">
				<div class="row d-flex justify-content-between">
					<div class="topbar-left">
						<ul>
							<li><a href="{{route('publishing_rules')}}"><i class="fa fa-question-circle"></i>Publishing Rules</a></li>
							{{--  <li><a href="javascript:;"><i class="fa fa-envelope-o"></i>Support@website.com</a></li>  --}}
						</ul>
					</div>
					<div class="topbar-right">
						<ul>
							{{--  <li>
								<select class="header-lang-bx">
									<option data-icon="flag flag-uk">English UK</option>
									<option data-icon="flag flag-us">English US</option>
								</select>
							</li>  --}}

							@guest
							<li><a href="{{route('login')}}">Login</a></li>
							<li><a href="{{route('register')}}">Register</a></li>
							@else
							<li><a href="{{route('dashboard')}}">My account</a></li>
							@endguest
						</ul>
					</div>
				</div>
			</div>
		</div>
		<div class="sticky-header navbar-expand-lg">
            <div class="menu-bar clearfix">
                <div class="container clearfix">
					<!-- Header Logo ==== -->
					<div class="menu-logo">
						<a href="{{route('client.index')}}"><img src="{{asset('assets/images/logo.png')}}" alt=""></a>
					</div>
					<!-- Mobile Nav Button ==== -->
                    <button class="navbar-toggler collapsed menuicon justify-content-end" type="button" data-toggle="collapse" data-target="#menuDropdown" aria-controls="menuDropdown" aria-expanded="false" aria-label="Toggle navigation">
						<span></span>
						<span></span>
						<span></span>
					</button>
					<!-- Author Nav ==== -->
                    <div class="secondary-menu">
                        <div class="secondary-inner">
                            <ul>
								{{--  <li><a href="javascript:;" class="btn-link"><i class="fa fa-facebook"></i></a></li>
								<li><a href="javascript:;" class="btn-link"><i class="fa fa-google-plus"></i></a></li>
								<li><a href="javascript:;" class="btn-link"><i class="fa fa-linkedin"></i></a></li>  --}}
								<!-- Search Button ==== -->
								<li class="search-btn"><button id="quik-search-btn" type="button" class="btn-link"><i class="fa fa-search"></i></button></li>
							</ul>
						</div>
                    </div>
					<!-- Search Box ==== -->
                    <div class="nav-search-bar">
                        <form action="{{route('search_posts')}}" method="GET">
                            <input name="dzName" value="" type="text" class="form-control" placeholder="Escriba para buscar" required>
                            <span><i class="ti-search"></i></span>
                        </form>
						<span id="search-remove"><i class="ti-close"></i></span>
                    </div>
					<!-- Navigation Menu ==== -->
                    <div class="menu-links navbar-collapse collapse justify-content-start" id="menuDropdown">
						<div class="menu-logo">
							<a href="{{route('client.index')}}"><img src="{{asset('assets/images/logo.png')}}" alt=""></a>
						</div>
                        <ul class="nav navbar-nav">	

							<li class="{!! active_class(route('client.index')) !!}"><a href="{{route('client.index')}}">Home</a></li>
							
							<li class="{!! active_class(route('all.links')) !!}"><a href="{{route('all.links')}}">last links</a></li>

							<li class=""><a href="javascript:;">categories <i class="fa fa-chevron-down"></i></a>
								<ul class="sub-menu">
									@foreach ($web_categories as $web_category)
									<li>
										@if ($web_category->has_subcategory())
										<a href="javascript:;">{{$web_category->title}}<i class="fa fa-angle-right"></i></a>
										<ul class="sub-menu">
											@include('layouts._subcategory',[
												'collection' => $web_category
											])
										</ul>
										@else
										<a href="{{route('by_category', $web_category)}}">{{$web_category->title}}</a>
										@endif
									</li>
									@endforeach
								</ul>
							</li>

							{{--  <li class="{!! active_class(route('all_categories')) !!}"><a href="{{route('all_categories')}}">All Categories</a></li>  --}}

						</ul>
						<div class="nav-social-link">
							<a href="javascript:;"><i class="fa fa-facebook"></i></a>
							<a href="javascript:;"><i class="fa fa-google-plus"></i></a>
							<a href="javascript:;"><i class="fa fa-linkedin"></i></a>
						</div>
                    </div>
					<!-- Navigation Menu END ==== -->
                </div>
            </div>
        </div>
    </header>
    <!-- Header Top END ==== -->
    <!-- Content -->
    <div class="page-content bg-white">
		@yield('content')
    </div>
    <!-- Content END-->
	<!-- Footer ==== -->
    <footer>
        <div class="footer-top">
			<div class="pt-exebar">
				<div class="container">
					<div class="d-flex align-items-stretch">
						<div class="pt-logo mr-auto">
							<a href="{{route('client.index')}}"><img src="{{asset('assets/images/logo-white.png')}}" alt=""/></a>
						</div>
						{{--  <div class="pt-social-link">
							<ul class="list-inline m-a0">
								<li><a href="#" class="btn-link"><i class="fa fa-facebook"></i></a></li>
								<li><a href="#" class="btn-link"><i class="fa fa-twitter"></i></a></li>
								<li><a href="#" class="btn-link"><i class="fa fa-linkedin"></i></a></li>
								<li><a href="#" class="btn-link"><i class="fa fa-google-plus"></i></a></li>
							</ul>
						</div>
						<div class="pt-btn-join">
							<a href="#" class="btn ">Join Now</a>
						</div>  --}}
					</div>
				</div>
			</div>
            <div class="container">
                <div class="row">
					{{--  <div class="col-lg-4 col-md-12 col-sm-12 footer-col-4">
                        <div class="widget">
                            <h5 class="footer-title">Sign Up For A Newsletter</h5>
							<p class="text-capitalize m-b20">Weekly Breaking news analysis and cutting edge advices on job searching.</p>
                            <div class="subscribe-form m-b20">
								<form class="subscription-form" action="http://educhamp.themetrades.com/demo/assets/script/mailchamp.php" method="post">
									<div class="ajax-message"></div>
									<div class="input-group">
										<input name="email" required="required"  class="form-control" placeholder="Your Email Address" type="email">
										<span class="input-group-btn">
											<button name="submit" value="Submit" type="submit" class="btn"><i class="fa fa-arrow-right"></i></button>
										</span> 
									</div>
								</form>
							</div>
                        </div>
                    </div>  --}}
					{{--  <div class="col-12 col-lg-5 col-md-7 col-sm-12">  --}}
					<div class="col-12 col-lg-12 col-md-12 col-sm-12">
						<div class="row">
							{{--  <div class="col-4 col-lg-4 col-md-4 col-sm-4">
								<div class="widget footer_widget">
									<h5 class="footer-title">Company</h5>
									<ul>
										<li><a href="index.html">Home</a></li>
										<li><a href="about-1.html">About</a></li>
										<li><a href="faq-1.html">FAQs</a></li>
										<li><a href="contact-1.html">Contact</a></li>
									</ul>
								</div>
							</div>
							<div class="col-4 col-lg-4 col-md-4 col-sm-4">
								<div class="widget footer_widget">
									<h5 class="footer-title">Get In Touch</h5>
									<ul>
										<li><a href="http://educhamp.themetrades.com/admin/index.html">Dashboard</a></li>
										<li><a href="blog-classic-grid.html">Blog</a></li>
										<li><a href="portfolio.html">Portfolio</a></li>
										<li><a href="event.html">Event</a></li>
									</ul>
								</div>
							</div>  --}}
							<div class="col-4 col-lg-4 col-md-4 col-sm-4">
								<div class="widget footer_widget">
									<h5 class="footer-title">About</h5>
									<ul>
										<li><a href="{{route('privacy_policies')}}">Policies and privacy</a></li>
										{{--  <li><a href="courses-details.html">Details</a></li>
										<li><a href="membership.html">Membership</a></li>
										<li><a href="profile.html">Profile</a></li>  --}}
									</ul>
								</div>
							</div>
						</div>
                    </div>
					{{--  <div class="col-12 col-lg-3 col-md-5 col-sm-12 footer-col-4">
                        <div class="widget widget_gallery gallery-grid-4">
                            <h5 class="footer-title">Our Gallery</h5>
                            <ul class="magnific-image">
								<li><a href="{{asset('assets/images/gallery/pic1.jpg')}}" class="magnific-anchor"><img src="{{asset('assets/images/gallery/pic1.jpg')}}" alt=""></a></li>
								<li><a href="{{asset('assets/images/gallery/pic2.jpg')}}" class="magnific-anchor"><img src="{{asset('assets/images/gallery/pic2.jpg')}}" alt=""></a></li>
								<li><a href="{{asset('assets/images/gallery/pic3.jpg')}}" class="magnific-anchor"><img src="{{asset('assets/images/gallery/pic3.jpg')}}" alt=""></a></li>
								<li><a href="{{asset('assets/images/gallery/pic4.jpg')}}" class="magnific-anchor"><img src="{{asset('assets/images/gallery/pic4.jpg')}}" alt=""></a></li>
								<li><a href="{{asset('assets/images/gallery/pic5.jpg')}}" class="magnific-anchor"><img src="{{asset('assets/images/gallery/pic5.jpg')}}" alt=""></a></li>
								<li><a href="{{asset('assets/images/gallery/pic6.jpg')}}" class="magnific-anchor"><img src="{{asset('assets/images/gallery/pic6.jpg')}}" alt=""></a></li>
								<li><a href="{{asset('assets/images/gallery/pic7.jpg')}}" class="magnific-anchor"><img src="{{asset('assets/images/gallery/pic7.jpg')}}" alt=""></a></li>
								<li><a href="{{asset('assets/images/gallery/pic8.jpg')}}" class="magnific-anchor"><img src="{{asset('assets/images/gallery/pic8.jpg')}}" alt=""></a></li>
							</ul>
                        </div>
                    </div>  --}}
                </div>
            </div>
        </div>
        <div class="footer-bottom">
            <div class="container">
                <div class="row">
                    <div class="col-lg-12 col-md-12 col-sm-12 text-center"><a target="_blank" href="#">Copyright © 2021 LinksOf. Todos los Derechos Reservados.</a></div>

                </div>
            </div>
        </div>
    </footer>
    <!-- Footer END ==== -->
    <button class="back-to-top fa fa-chevron-up" ></button>
</div>

<!-- External JavaScripts -->
{!! Html::script("assets/js/jquery.min.js") !!}
{!! Html::script("assets/vendors/bootstrap/js/popper.min.js") !!}
{!! Html::script("assets/vendors/bootstrap/js/bootstrap.min.js") !!}
{!! Html::script("assets/vendors/bootstrap-select/bootstrap-select.min.js") !!}
{!! Html::script("assets/vendors/bootstrap-touchspin/jquery.bootstrap-touchspin.js") !!}
{!! Html::script("assets/vendors/magnific-popup/magnific-popup.js") !!}
{!! Html::script("assets/vendors/counter/waypoints-min.js") !!}
{!! Html::script("assets/vendors/counter/counterup.min.js") !!}
{!! Html::script("assets/vendors/imagesloaded/imagesloaded.js") !!}
{!! Html::script("assets/vendors/masonry/masonry.js") !!}
{!! Html::script("assets/vendors/masonry/filter.js") !!}
{!! Html::script("assets/vendors/owl-carousel/owl.carousel.js") !!}
{!! Html::script("assets/js/functions.js") !!}
{!! Html::script("assets/js/contact.js") !!}
{!! Html::script('assets/vendors/switcher/switcher.js') !!}

{!! Html::script('js/typeahead.bundle.js') !!}


@stack('scripts')

</body>

</html>
