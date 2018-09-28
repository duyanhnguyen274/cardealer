@extends('frontend.layout')
@section('header')
<header id="header" class="clearfix">
		
	<a href="home" id="logo"><img src="{{ asset('frontend/images/logo.png') }}" alt="Car Dealer"></a>
	
	<div class="widget-container widget_search">
		
		<span class="call"><span>+1 234</span> 567-8901</span><br />
		
		<span class="adds">12 Street, Los Angeles, CA, 94101</span>

		<form action="#" id="searchform" method="get">

			<p>
				<input type="text" id="s" placeholder="Search">
				<button type="submit" id="searchsubmit"></button>
			</p>

		</form><!--/ #searchform-->

	</div><!--/ .widget-container-->		
	
	<nav id="navigation" class="navigation">
		
		<ul>
			<li><a href="home">Home</a></li>
			<li><a href="all-listings">Browse By</a>
				<ul>
					<li><a href="all-listings">All Listings</a></li>
					<li><a href="#">Manufacturer</a>
						<?php 
							$category = DB::select("select * from tbl_category_brand order by pk_category_brand_id asc");
						 ?>
						<ul>
							@foreach($category as $rows)
							<li><a href="{{ url('/brand/'.$rows->pk_category_brand_id) }}">{{ $rows->c_name }}</a></li>
							@endforeach
						</ul>
					</li>
				</ul>
			</li>
			<li><a href="news">Blog</a></li>
			<li class="current-menu-item"><a href="contact">Contacts</a></li>
		</ul>
		
	</nav><!--/ #navigation-->
	
</header><!--/ #header-->
@endsection
@section('content')
<div class="main">
		
	<iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d1861.9027294983787!2d105.77335273131686!3d21.040468695716715!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x313454c9755033dd%3A0xf13b328d1266f239!2zMTQ3IFBo4buRIE1haSBE4buLY2gsIE1haSBE4buLY2gsIEPhuqd1IEdp4bqleSwgSMOgIE7hu5lpLCBWaeG7h3QgTmFt!5e0!3m2!1svi!2s!4v1537026452929" width="100%" height="450" frameborder="0" style="border:0" allowfullscreen></iframe>

		<!-- - - - - - - - - - - - - - - Container - - - - - - - - - - - - - - - - -->	

		<section class="container clearfix">
			
			<div class="four columns">
				
				<div class="widget_contacts">

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
							<b>Email: <a href="mailto:duyanhnguyen274@gmail.com">duyanhnguyen274</a></b>
						</li>

					</ul><!--/ .our-contacts-->

				</div><!--/ .widget-container-->
				
			</div><!--/ .four .columns-->
			
			<div class="twelve columns">

				<div id="contact">

					<h3 class="widget-title">Contact Us</h3>

					<form method="post" action="#" class="contact-form" id="contactform">

						<p class="input-block">
							<label for="name">Your Name (required)</label>
							<input type="text" name="name" id="name" />
						</p>

						<p class="input-block">
							<label for="email">Your Email (required)</label>
							<input type="text" name="email" id="email" />
						</p>

						<p class="input-block">
							<label for="web">Website</label>
							<input type="text" name="web" id="web" />
						</p>

						<p class="input-block">
							<label for="message">You Message: (required)</label>
							<textarea name="message" id="message" cols="30" rows="10"></textarea>	
						</p>

						<p class="input-block">
							<label for="verify">Are you human?</label>
							<iframe src="#" height="29" width="80" scrolling="no" frameborder="0" marginheight="0" marginwidth="0" class="capcha_image_frame" name="capcha_image_frame"></iframe>
							<input class="verify" type="text" id="verify" name="verify" />
						</p>
						
						<p class="input-block">
							<label>&nbsp;</label>
							<button class="button orange" type="submit" id="submit">Submit</button>
						</p>
						
					</form><!--/ .contact-form-->			   

				</div><!--/ #contact-->
					
			</div><!--/ .twelve .columns-->
			


		</section><!--/.container -->

		<!-- - - - - - - - - - - - - end Container - - - - - - - - - - - - - - - - -->			
		
	</div><!--/ .main-->
@endsection