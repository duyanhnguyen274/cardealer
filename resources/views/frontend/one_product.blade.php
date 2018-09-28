@extends('frontend.layout')
@section('header')
<header id="header" class="clearfix">
		
	<a href="" id="logo"><img src="{{ asset('frontend/images/logo.png') }}" alt="Car Dealer"></a>
	
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
			<li><a href="../">Home</a></li>
			<li class="current-menu-item"><a href="../all-listings">Browse By</a>
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
			<li><a href="../news">Blog</a></li>
			<li><a href="../contact">Contacts</a></li>
		</ul>
		
	</nav><!--/ #navigation-->
	
</header><!--/ #header-->
@endsection
@section('content')
<div class="main">

		<!-- - - - - - - - - - - - - - - Container - - - - - - - - - - - - - - - - -->	

		<section class="container sbl clearfix">

			<!-- - - - - - - - - - - - - - - Content - - - - - - - - - - - - - - - - -->		

			<section id="content" class="two-thirds column">
				<?php 
					$product = DB::table("tbl_product")->where("pk_product_id","=",$id)->first();
				 ?>
				<article class="item clearfix">
					
					<h2 class="title">{{ $product->c_name }}</h2>
					
					<div id="gallery" class="gallery">

						<div class="slideshow-container">
							<div id="loading" class="loader"></div>
							<div id="slideshow" class="slideshow clearfix"></div>
						</div><!--/ .slideshow-container-->

						<div id="thumbs" class="clearfix">

							<ul class="thumbumbs list-image clearfix">

								<li>
									<a class="thumb" name="leaf" href="{{ asset('upload/product/'.$product->c_img) }}" title="Title 0">
										<img src="{{ asset('upload/product/'.$product->c_img) }}" alt="{{ $product->c_name }}" />
									</a>
								</li>



							</ul><!--/ .thumbs-->

						</div><!--/ #thumbs-->

					</div><!--/ #gallery-->
	
					<div class="extra">
						
						<b class="heading">Price:</b>
						
						<span class="cost">${{ number_format($product->c_price) }}</span>
						
						<ul class="list type-1">
							<li><b>Mileage: </b><span>{{ $product->c_mileage }}</span></li>
							<li><b>Body Type: </b><span>{{ $product->c_type }}</span></li>
							<li><b>Register Year: </b><span>{{ $product->c_yearreg }}</span></li>
							<li><b>Trans: </b><span>{{ $product->c_trans }}</span></li>
						</ul>
						
						<ul class="addthis-toolbox clearfix">
							<li><a class="addthis_button_facebook_like" fb:like:layout="button_count"></a></li>
							<li><a class="addthis_button_tweet"></a></li>
							<li><a class="addthis_button_google_plusone" g:plusone:size="medium"></a></li>
							<li><a class="addthis_counter addthis_pill_style"></a></li>
						</ul>

						<script type="text/javascript" src="../../s7.addthis.com/js/250/addthis_widget.js#pubid=xa-4f3c188f442f3bf2"></script>
						
					</div><!--/ .extra-->					
					
					<div class="entry-item">
						
						<div class="video-box">
							
							<b class="heading">Video:</b>

							<a href="http://www.youtube.com/embed/CNP8DMCDjgw?feature=player_detailpage" class="video-image video-icon">
								<img src="{{ asset('images/temp/list-thumb-1.jpg') }}" alt="" />
							</a>							
							
						</div><!--/ .video-box-->
						
						<h3 class="section-title">VIN Information</h3>
						
						<p>
							Consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.
							Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo
							consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat
							nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt
							mollit anim. Consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore
							magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco.
						</p>
						
						<p>
							Labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris
							nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit
							esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt
							in culpa qui officia deserunt mollit anim. Consectetur adipisicing elit, sed do eiusmod tempor
							incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam.
						</p>
						
						<div class="entry-tabs">

							<ul class="tabs-nav">

								<li><a href="#tab1">Specifications</a></li>
								<li><a href="#tab2">Safety</a></li>
								<li><a href="#tab3">Convenience</a></li>
								<li><a href="#tab4">Comfort</a></li>
								<li><a href="#tab5">Entertainment</a></li>

							</ul><!--/ .tabs-nav -->

							<div class="tabs-container">

								<div class="tab-content clearfix" id="tab1">
									
									<div class="five columns">
									
										<ul class="list type-1">
											<li><b>Body Style: </b><span>SEDAN 4-DR</span></li>
											<li><b>Driveline: </b><span>FWD</span></li>
											<li><b>Fuel Economy-city: </b><span>30-32 miles/gallon</span></li>
											<li><b>Anti-Brake System: </b><span>Non-ABS | 4-Wheel | ABS</span></li>
											<li><b>Front Brake Type: </b><span>Disc</span></li>
											<li><b>Turning Diameter: </b><span>36.10 in.</span></li>
											<li><b>Rear Suspension: </b><span>Semi</span></li>
											<li><b>Rear Spring Type: </b><span>Coil</span></li>
											<li><b>Front Headroom: </b><span>39.10 in.</span></li>
											<li><b>Front Legroom: </b><span>41.30 in.</span></li>
											<li><b>Front Shoulder Room: </b><span>53.10 in.</span></li>
											<li><b>Front Hip Room: </b><span>51.90 in.</span></li>
											<li><b>Curb Weight-automatic: </b><span>2568 lbs</span></li>
											<li><b>Overall Length: </b><span>178.30 in.</span></li>
										</ul>									
										
									</div>
									
									<div class="five columns">
									
										<ul class="list type-1">
											<li><b>Overall Height: </b><span>58.50 in.</span></li>
											<li><b>Ground Clearance: </b><span>5.70 in.</span></li>
											<li><b>Track Front: </b><span>58.30 in.</span></li>
											<li><b>Standard Seating: </b><span>5</span></li>
											<li><b>Cargo Volume: </b><span>13.60 ft.</span></li>
											<li><b>Maximum Towing: </b><span>1500 lbs</span></li>
											<li><b>Basic-distance: </b><span>36.000 mile</span></li>
											<li><b>Engine Type: </b><span>1.8L L4 DOHC 16V</span></li>
										</ul>									
										
									</div>
									
								</div><!--/ .tab-content -->

								<div class="tab-content clearfix" id="tab2">
									
									<div class="five columns">
									
										<ul class="list type-1">
											<li><b>Fuel Economy-city: </b><span>30-32 miles/gallon</span></li>
											<li><b>Anti-Brake System: </b><span>Non-ABS | 4-Wheel | ABS</span></li>
											<li><b>Front Brake Type: </b><span>Disc</span></li>
											<li><b>Turning Diameter: </b><span>36.10 in.</span></li>
											<li><b>Rear Suspension: </b><span>Semi</span></li>
										</ul>									
										
									</div>
									
									<div class="five columns">
									
										<ul class="list type-1">
											<li><b>Overall Height: </b><span>58.50 in.</span></li>
											<li><b>Ground Clearance: </b><span>5.70 in.</span></li>
											<li><b>Track Front: </b><span>58.30 in.</span></li>
											<li><b>Standard Seating: </b><span>5</span></li>
											<li><b>Cargo Volume: </b><span>13.60 ft.</span></li>
											<li><b>Maximum Towing: </b><span>1500 lbs</span></li>
											<li><b>Basic-distance: </b><span>36.000 mile</span></li>
											<li><b>Engine Type: </b><span>1.8L L4 DOHC 16V</span></li>
										</ul>									
										
									</div>
								
								</div><!--/ .tab-content -->

								<div class="tab-content clearfix" id="tab3">
									
									<div class="five columns">
									
										<ul class="list type-1">
											<li><b>Body Style: </b><span>SEDAN 4-DR</span></li>
											<li><b>Driveline: </b><span>FWD</span></li>
											<li><b>Fuel Economy-city: </b><span>30-32 miles/gallon</span></li>
											<li><b>Anti-Brake System: </b><span>Non-ABS | 4-Wheel | ABS</span></li>
											<li><b>Rear Suspension: </b><span>Semi</span></li>
											<li><b>Rear Spring Type: </b><span>Coil</span></li>
											<li><b>Front Headroom: </b><span>39.10 in.</span></li>
											<li><b>Front Legroom: </b><span>41.30 in.</span></li>
											<li><b>Front Shoulder Room: </b><span>53.10 in.</span></li>
											<li><b>Front Hip Room: </b><span>51.90 in.</span></li>
											<li><b>Curb Weight-automatic: </b><span>2568 lbs</span></li>
										</ul>									
										
									</div>
									
									<div class="five columns">
									
										<ul class="list type-1">
											
											<li><b>Cargo Volume: </b><span>13.60 ft.</span></li>
											<li><b>Maximum Towing: </b><span>1500 lbs</span></li>
											<li><b>Basic-distance: </b><span>36.000 mile</span></li>
											<li><b>Engine Type: </b><span>1.8L L4 DOHC 16V</span></li>
										</ul>									
										
									</div>
			
								</div><!--/ .tab-content -->

								<div class="tab-content clearfix" id="tab4">
									
									<div class="five columns">
									
										<ul class="list type-1">
											<li><b>Rear Suspension: </b><span>Semi</span></li>
											<li><b>Rear Spring Type: </b><span>Coil</span></li>
											<li><b>Front Headroom: </b><span>39.10 in.</span></li>
											<li><b>Front Legroom: </b><span>41.30 in.</span></li>
											<li><b>Front Shoulder Room: </b><span>53.10 in.</span></li>
											<li><b>Front Hip Room: </b><span>51.90 in.</span></li>
											<li><b>Curb Weight-automatic: </b><span>2568 lbs</span></li>
											<li><b>Overall Length: </b><span>178.30 in.</span></li>
										</ul>									
										
									</div>
									
									<div class="five columns">
									
										<ul class="list type-1">
											<li><b>Overall Height: </b><span>58.50 in.</span></li>
											<li><b>Ground Clearance: </b><span>5.70 in.</span></li>
											<li><b>Track Front: </b><span>58.30 in.</span></li>
											<li><b>Standard Seating: </b><span>5</span></li>
											<li><b>Cargo Volume: </b><span>13.60 ft.</span></li>
											<li><b>Maximum Towing: </b><span>1500 lbs</span></li>
											<li><b>Basic-distance: </b><span>36.000 mile</span></li>
											<li><b>Engine Type: </b><span>1.8L L4 DOHC 16V</span></li>
										</ul>									
										
									</div>
			
								</div><!--/ .tab-content -->

								<div class="tab-content clearfix" id="tab5">
									
									<div class="five columns">
									
										<ul class="list type-1">
											<li><b>Body Style: </b><span>SEDAN 4-DR</span></li>
											<li><b>Driveline: </b><span>FWD</span></li>
											<li><b>Fuel Economy-city: </b><span>30-32 miles/gallon</span></li>
											<li><b>Anti-Brake System: </b><span>Non-ABS | 4-Wheel | ABS</span></li>
											<li><b>Rear Spring Type: </b><span>Coil</span></li>
											<li><b>Front Headroom: </b><span>39.10 in.</span></li>
											<li><b>Front Legroom: </b><span>41.30 in.</span></li>
											<li><b>Front Shoulder Room: </b><span>53.10 in.</span></li>
											<li><b>Front Hip Room: </b><span>51.90 in.</span></li>
											<li><b>Curb Weight-automatic: </b><span>2568 lbs</span></li>
										</ul>									
										
									</div>
									
									<div class="five columns">
									
										<ul class="list type-1">
											<li><b>Track Front: </b><span>58.30 in.</span></li>
											<li><b>Standard Seating: </b><span>5</span></li>
											<li><b>Cargo Volume: </b><span>13.60 ft.</span></li>
											<li><b>Maximum Towing: </b><span>1500 lbs</span></li>
											<li><b>Basic-distance: </b><span>36.000 mile</span></li>
											<li><b>Engine Type: </b><span>1.8L L4 DOHC 16V</span></li>
										</ul>									
										
									</div>
			
								</div><!--/ .tab-content -->

							</div><!--/ .tabs-container -->	

						</div><!--/ .entry-tabs-->
						
						<h3 class="section-title">Contact Us regarding this car</h3>
						
							<form method="post" action="#" class="comments-form">

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
									<label for="comments">You Message: (required)</label>
									<textarea name="comments" id="comments" cols="30" rows="10"></textarea>	
								</p>

								<p class="input-block">
									<button class="button orange" type="submit" id="submit">Submit</button>
								</p>

							</form><!--/ .contact-form-->	
						
					</div><!--/ .entry-item-->
					
				</article><!--/ .item-->
				
			</section><!--/ #content-->

			<!-- - - - - - - - - - - - - - end Content - - - - - - - - - - - - - - - - -->	


			<!-- - - - - - - - - - - - - - - Sidebar - - - - - - - - - - - - - - - - -->	

			<aside id="sidebar" class="one-third column">
				
				<div class="widget-container widget_custom_search">
					
					<div class="search-heading">
							
						<h3 class="widget-title">Quick Search</h3>
						
					</div><!--/ .search-heading-->
					
					<div class="search-entry clearfix">

						<form action="" class="form-panel">

							<fieldset>
								<label>Make:</label>
								<select>
									<option value="0">----</option>
									<?php 
										$category = DB::select("select * from tbl_category_brand order by pk_category_brand_id desc");
									 ?>
									 @foreach($category as $rows)
									<option value="{{ $rows->pk_category_brand_id}}">{{ $rows->c_name }}
									</option>
									@endforeach
								</select>
							</fieldset>

							<fieldset class="not-active">
								<label>Model:</label>
								<select>
									<option value="0">----</option>
									<?php 
										$c_name = DB::select("select distinct c_name from tbl_product order by c_name desc");
									 ?>
									@foreach($c_name as $rows)
									<option value=" $c_name = {{ $rows->c_name }}">{{ $rows->c_name }}</option>
									@endforeach
								</select>
							</fieldset>

							<fieldset>
								<label>Price <span>min</span>:</label>
								<select>
									<option value="0">----</option>
									<?php 
										$c_price = DB::select("select distinct c_price from tbl_product order by c_price desc");
									 ?>
									@foreach($c_price as $rows)
									<option value=" $c_price = {{ $rows->c_price }}">{{ $rows->c_price }}</option>
									@endforeach
								</select>
							</fieldset>

							<fieldset>
								<label>Price <span>max</span>:</label>
								<select>
									<option value="0">----</option>
									<?php 
										$c_price = DB::select("select distinct c_price from tbl_product order by c_price desc");
									 ?>
									@foreach($c_price as $rows)
									<option value=" $c_price = {{ $rows->c_price }}">{{ $rows->c_price }}</option>
									@endforeach
								</select>
							</fieldset>

							<fieldset>
								<label>Year <span>from</span>:</label>
								<select>
									<option value="0">----</option>
									<?php 
										$c_yearreg = DB::select("select distinct c_yearreg from tbl_product order by c_yearreg desc");
									 ?>
									@foreach($c_yearreg as $rows)
									<option value=" $c_yearreg = {{ $rows->c_yearreg }}">{{ $rows->c_yearreg }}</option>
									@endforeach
								</select>
							</fieldset>

							<fieldset>
								<label>Year <span>to</span>:</label>
								<select>
									<option value="0">----</option>
									<?php 
										$c_yearreg = DB::select("select distinct c_yearreg from tbl_product order by c_yearreg desc");
									 ?>
									@foreach($c_yearreg as $rows)
									<option value=" $c_yearreg = {{ $rows->c_yearreg }}">{{ $rows->c_yearreg }}</option>
									@endforeach
								</select>
							</fieldset>
							
							<fieldset>
								<label>Body type</label>
								<select>
									<option value="0">----</option>
									<?php 
										$c_type = DB::select("select distinct c_type from tbl_product order by c_type desc");
									 ?>
									@foreach($c_type as $rows)
									<option value=" $c_type = {{ $rows->c_type }}">{{ $rows->c_type }}</option>
									@endforeach
								</select>
							</fieldset>

							<div class="clear"></div>
							
							<button id="submitSearch" class="submit-search" type="submit">Search</button>
							
							<a href="#" class="advanced">Advanced Search</a>

						</form><!--/ .form-panel-->						

					</div><!--/ .search-entry-->

				</div><!--/ .widget-container-->
				
				<div class="widget-container widget_loan_calculator">
					
					<div class="widget-head">
						
						<h3 class="widget-title">Loan Calculator</h3>
						
					</div>
					
					<div class="entry-loan">
						
						<form action="#" method="POST" name="myform" id="loan">

							<table>
								<tr>
									<td><label for="LoanAmount">Car Loan Amount</label></td>
									<td><input name="LoanAmount" id="LoanAmount" type="text" value="3000" /></td>
									<td>$</td>
								</tr>
								<tr>
									<td><label for="InterestRate">Annual Interest Rate</label></td>
									<td><input name="InterestRate" id="InterestRate" type="text" value="7.0" /></td>
									<td>%</td>
								</tr>
								<tr>
									<td><label for="NumberOfYears">Term of Car Loan</label></td>
									<td><input name="NumberOfYears" id="NumberOfYears" type="text" value="4" /></td>
									<td>Years</td>
								</tr>
								<tr>
									<td>
										<button name="cal" class="button orange">Calculate</button>
									</td>
								</tr>
								<tr>
									<td><label for="NumberOfPayments">Number of Car Payments</label></td>
									<td><input readonly="readonly" type="text" id="NumberOfPayments" name="NumberOfPayments" /></td>
									<td></td>
								</tr>
								<tr>
									<td><label for="MonthlyPayment">Monthly Payment</label></td>
									<td><input readonly="readonly" type="text" id="MonthlyPayment" name="MonthlyPayment" /></td>
									<td>$</td>
								</tr>
							</table>					
							
						</form>
						
					</div><!--/ .entry-loan-->
					
				</div><!--/ .widget-container-->
				
				<div class="widget-container widget_latest">
					
					<h3 class="widget-title">Latest Cars</h3>
					
					<ul>
						<li>
							<a class="thumb single-image picture video" href="#"><img src="images/temp/latest-thumb-1.jpg" alt="" /></a>
							<div class="latest-entry">
								<a href="#" class="block"><b>Aston Martin DB9</b></a>
								<span class="block add-margin">2009 y.r., 160,000 km.</span>
								<a href="#" class="bold text-orange">$8.966</a>	
							</div><!--/ .latest-entry-->
						</li>
						<li>
							<a class="thumb single-image picture" href="#"><img src="images/temp/latest-thumb-2.jpg" alt="" /></a>
							<div class="latest-entry">
								<a href="#" class="block"><b>Aston Martin DB9</b></a>
								<span class="block add-margin">2009 y.r., 160,000 km.</span>
								<a href="#" class="bold text-orange">$8.966</a>	
							</div><!--/ .latest-entry-->
						</li>
						<li>
							<a class="thumb single-image picture video" href="#"><img src="images/temp/latest-thumb-3.jpg" alt="" /></a>
							<div class="latest-entry">
								<a href="#" class="block"><b>Aston Martin DB9</b></a>
								<span class="block add-margin">2009 y.r., 160,000 km.</span>
								<a href="#" class="bold text-orange">$8.966</a>	
							</div><!--/ .latest-entry-->
						</li>
					</ul>
					
					<a href="#" class="see">See all news</a>
					
				</div><!--/ .widget-container-->
				
				<div class="widget-container widget_recent_entries">
					
					<h3 class="widget-title">Recent News</h3>
					
					<ul>
						<li><a href="#">Lorem ipsum dolor sit amet, consectetur adipisicing</a></li>
						<li><a href="#">Ipsum dolor sit amet, consectetur adipisicing</a></li>
						<li><a href="#">Set magna ipsum dolor sit amet, consectetur adipisicing</a></li>
					</ul>
					
					<a href="#" class="see">See all news</a>
					
				</div><!--/ .widget-container-->
				
			</aside><!--/ #sidebar-->

			<!-- - - - - - - - - - - - - end Sidebar - - - - - - - - - - - - - - - - -->

		</section><!--/.container -->

		<!-- - - - - - - - - - - - - end Container - - - - - - - - - - - - - - - - -->			
		
	</div><!--/ .main-->
@endsection