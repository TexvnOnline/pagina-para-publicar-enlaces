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
	<link rel="icon" href="assets/images/favicon.ico" type="image/x-icon" />
	<link rel="shortcut icon" type="image/x-icon" href="assets/images/favicon.png" />
	
	<!-- PAGE TITLE HERE ============================================= -->
	<title>@yield('title', config('app.name'))</title>
	
	<!-- MOBILE SPECIFIC ============================================= -->
	<meta name="viewport" content="width=device-width, initial-scale=1">
	
	<!--[if lt IE 9]>
        {!! Html::script('assets/js/html5shiv.min.js') !!}
        {!! Html::script('assets/js/respond.min.js') !!}
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
	

</head>
<body id="bg">
<div class="page-wraper">
	<div id="loading-icon-bx"></div>
	<div class="account-form">
		<div class="account-head" style="background-image:url({{asset('assets/images/banner/banner3.jpg')}});">
			<a href="{{route('client.index')}}"><img src="{{asset('assets/images/logo-white.png')}}" alt=""></a>
		</div>
        @yield('content')
		{{--  <div class="account-form-inner">
			<div class="account-container">
				<div class="heading-bx left">
					<h2 class="title-head">Forget <span>Password</span></h2>
					<p>Login Your Account <a href="{{route('login')}}">Click here</a></p>
				</div>
                @if (session('status'))
                <div class="alert alert-success" role="alert">
                    {{ session('status') }}
                </div>
                @endif
				<form class="contact-bx" method="POST" action="{{ route('password.email') }}">
                    @csrf
					<div class="row placeani">
						<div class="col-lg-12">
							<div class="form-group">
								<div class="input-group">
									<label>Your Email Address</label>
									<input id="email" name="email" type="email" value="{{ old('email') }}" required="" class="form-control @error('email') is-invalid @enderror" autocomplete="email" autofocus>

                                    @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror

								</div>
							</div>
						</div>
						<div class="col-lg-12 m-b30">
							<button name="submit" type="submit" value="Submit" class="btn button-md">Submit</button>
						</div>
					</div>
				</form>
			</div>
		</div>  --}}
	</div>
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

</body>

</html>