<!DOCTYPE html>
<!--[if lte IE 8]>              <html class="ie8 no-js" lang="en">     <![endif]-->
<!--[if IE 9]>					<html class="ie9 no-js" lang="en">     <![endif]-->
<!--[if (gte IE 9)|!(IE)]><!--> <html class="not-ie no-js" lang="en">  <!--<![endif]-->

<!-- Giao dien duoc chia se mien phi tai www.ptheme.net [Free HTML Download]. SKYPE[ptheme.net] - EMAIL[ptheme.net@gmail.com].-->
<head>
	<link href='http://fonts.googleapis.com/css?family=Yanone+Kaffeesatz|Open+Sans:400,600,700|Oswald|Electrolize' rel='stylesheet' type='text/css'>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
	
	<title>Car Dealer | Home</title>
	
	<meta name="description" content="">
	<meta name="author" content="">
	
	<link rel="shortcut" href="{{ asset('frontend/images/favicon.html') }}" />
	<link rel="stylesheet" href="{{ asset('frontend/css/style.css') }}" media="screen" />
	<link rel="stylesheet" href="{{ asset('frontend/css/skeleton.css') }}" media="screen" />
	<link rel="stylesheet" href="{{ asset('frontend/sliders/flexslider/flexslider.css') }}" media="screen" />
	<link rel="stylesheet" href="{{ asset('frontend/fancybox/jquery.fancybox.css') }}" media="screen" />

	<!-- HTML5 Shiv + detect touch events -->
	<script type="text/javascript" src="{{ asset('frontend/js/modernizr.custom.js') }}"></script>
</head>
<body class="menu-1 h-style-1 text-1">

<div class="wrap">
	
	<!-- - - - - - - - - - - - - - Header - - - - - - - - - - - - - - - - -->	
	
	@yield('header')
	
	<!-- - - - - - - - - - - - - - end Header - - - - - - - - - - - - - - - - -->	
	
	
	<!-- - - - - - - - - - - - - - Top Panel - - - - - - - - - - - - - - - - -->	
	
	@yield('content')

	
	<!-- - - - - - - - - - - - - - - Footer - - - - - - - - - - - - - - - - -->	
	
	<footer id="footer" class="container clearfix">
		
		<section class="container clearfix">
			
			<div class="four columns">

				<div class="widget-container widget_text">

					<h3 class="widget-title">About Us</h3>

					<div class="textwidget">

						<p class="white">
							Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor. 
						</p>	

						<p>
							Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor 
							incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud
							exercitation.
						</p>

					</div><!--/ .textwidget-->

					<a href="#" class="see">Read more</a>

				</div><!--/ .widget-container-->	

			</div><!--/ .four .columns-->

			<div class="four columns">

				<div class="widget-container widget_text">

					<h3 class="widget-title">Our Hours</h3>

					<div class="textwidget">

						<ul class="hours">

							<li>Monday <span>8 am to 7 pm</span></li>
							<li>Tuesday <span>8 am to 9 pm</span></li>
							<li>Wednesday <span>8 am to 9 pm</span></li>
							<li>Thursday <span>8 am to 9 pm</span></li>
							<li>Friday <span>8 am to 9 pm</span></li>
							<li>Saturday <span>8 am to 9 pm</span></li>
							<li>Sunday <span>Closed</span></li>

						</ul><!--/ .hours-->

					</div><!--/ .textwidget-->

				</div><!--/ .widget-container-->

			</div><!--/ .four .columns-->

			<div class="four columns">

				<div class="widget-container widget_contacts">

					<h3 class="widget-title">Our Contacts</h3>			

					<ul class="our-contacts">

						<li class="address">
							<b>Address Info 1:</b>
							<p>Lorem ipsum Dolor sit amet, 658 Consectetur, Adipisicing 56 D</p>
						</li>
						<li class="phone">
							<b>Phone:</b>&nbsp;<span>+1 (234) 567-8901</span> <br />
							<b>FAX:</b>&nbsp;<span>+1 (234) 567-8902</span>
						</li>
						<li>
							<b>Email: <a href="mailto:testmail@sitename.com">testmail@sitename.com</a></b>
						</li>
						<li>
							<ul class="social-icons clearfix">
								<li class="twitter"><a title="twitter" href="#">Twitter</a></li>
								<li class="facebook"><a title="facebook" href="#">Facebook</a></li>
								<li class="rss"><a title="rss" href="#">Rss</a></li>
							</ul><!--/ .social-icons-->
						</li>

					</ul><!--/ .our-contacts-->

				</div><!--/ .widget-container-->

			</div><!--/ .four .columns-->

			<div class="four columns">

				<div id="gMap"></div>

			</div><!--/ .four .columns-->
			
			<div class="adjective clearfix">

				<p class="copyright">Copyright &copy; 2012. ThemeMakers. All rights reserved</p>

				<p class="developed">developed by <a href="http://webtemplatemasters.com/" target="_blank">ThemeMakers</a></p>
				
			</div><!--/ .adjective-->

		</section><!--/ .container-->
		
	</footer><!--/ #footer-->
	
	<!-- - - - - - - - - - - - - - - end Footer - - - - - - - - - - - - - - - - -->		
	
</div><!--/ .wrap-->

<div class="account-wrapper">
	
	<form class="form-reg" method="post" action="#">
		
		<a href="admin/user" class="log">Login</a>
		
		<p>
			<label>Username*</label>
			<input class="input-medium" type="text" />
		</p>
		
		<p>
			<label>Password*</label>
			<input class="input-medium" type="password" />
		</p>
		
		<p class="forgot-pass">
			<a href="#">Forgot your password?</a>
		</p>
		
		<p>
			<a href="#" class="button dark enter-btn">Login</a>
			<a href="#" class="button dark enter-btn">Create an account</a>
		</p>
		
		
	</form><!--/ .form-reg-->
	
</div><!--/ .account-wrapper-->

<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.7.2/jquery.min.js"></script>
<script>window.jQuery || document.write('<script src="frontend/js/jquery-1.7.2.min.js"><\/script>')</script>
<!--[if lt IE 9]>
	<script src="js/selectivizr-and-extra-selectors.min.js"></script>
<![endif]-->
<script src="{{ asset('frontend/sliders/flexslider/jquery.flexslider-min.js') }}"></script>
<script src="http://maps.google.com/maps/api/js?sensor=false"></script>
<script src="{{ asset('frontend/js/jquery.gmap.min.js') }}"></script>
<script src="{{ asset('frontend/js/jquery-impromptu.js') }}"></script>
<script src="{{ asset('frontend/js/custom.js') }}"></script>
</body>

<!-- Giao dien duoc chia se mien phi tai www.ptheme.net [Free HTML Download]. SKYPE[ptheme.net] - EMAIL[ptheme.net@gmail.com].-->
</html>
