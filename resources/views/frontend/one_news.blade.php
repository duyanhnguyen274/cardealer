@extends('frontend.layout')
@section('header')
<header id="header" class="clearfix">
		
	<a href="home" id="logo"><img src="{{ asset('frontend/images/logo.png') }}" alt="Car Dealer"></a>
	
	<div class="widget-container widget_search">
		
		<span class="call"><span>+1 234</span> 567-8901</span><br />
		
		<span class="adds">12 Street, Los Angeles, CA, 94101</span>
		<form action="#" id="searchform" method="get">
			
			<p>
				<input type="text" id="txt-search" placeholder="Search">
				<button type="submit" id="searchsubmit"></button>
			</p>

		</form><!--/ #searchform-->

	</div><!--/ .widget-container-->		
	<!-- Request::get("name") -->
	<nav id="navigation" class="navigation">
		
		<ul>
			<li><a href="../home">Home</a></li>
			<li><a href="../all-listings">Browse By</a>
				<ul>
					<li><a href="../all-listings">All Listings</a></li>
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
			<li class="current-menu-item"><a href="../news">Blog</a></li>
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
					$news = DB::table("tbl_news")->where("pk_news_id","=",$id)->first();
				 ?>
				<article class="entry clearfix single">
					
					<h2 class="title">{{ $news->c_name }}</h2>

					<div class="entry-body">
						
						<img class="entry-image" alt="" src="images/temp/temp_460x280.png">
						
						<p>{!! $news->c_description !!}</p>
						<p>{!! $news->c_content !!}</p>
						
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
						
						<p>
							Quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. 
							Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat
							nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia
							deserunt mollit anim. Consectetur adipisicing elit, sed do eiusmod tempor incididunt ut
							labore et dolore magna aliqua. Ut enim ad minim veniam.  Ut enim ad minim veniam. Excepteur sint occaecat cupidatat non proident.
						</p>

					</div><!--/ .entry-body -->

				</article><!--/ .entry-->
				
				<div class="bio clearfix">
					
					<h3 class="section-title">About the Author</h3>   
					
					<img src="images/gravatar.png" class="avatar" alt="">
					
					<div class="bio-info clearfix">
						
						<p>
							Quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor
							in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat
							cupidatat non proident, sunt in culpa qui officia deserunt mollit anim. Consectetur adipisicing elit.
						</p>
						
					</div><!--/ bio-info-->
					
				</div><!--/ .bio-->
				
				<div class="related clearfix">
					
					<h3 class="section-title">Related Posts</h3>
						
					<ul>
						
						<li>
							<a href="#"><img src="images/temp/blog_img_1.jpg" alt=""></a>
							<a href="#"><h6>2009  Aston Martin DB9</h6></a>
							<b class="heading">$ 24589</b>
						</li>
						
						<li>
							<a href="#"><img src="images/temp/blog_img_2.jpg" alt=""></a>
							<a href="#"><h6>2009  Aston Martin DB9</h6></a>
							<b class="heading">$ 24589</b>
						</li>
						
						<li>
							<a href="#"><img src="images/temp/blog_img_3.jpg" alt=""></a>
							<a href="#"><h6>2009  Aston Martin DB9</h6></a>
							<b class="heading">$ 24589</b>
						</li>
						
					</ul>
					
				</div><!--/ .related-->	
				
				<section id="comments">

					<h3 class="section-title">2 Comments</h3>

					<ol class="comments-list">

						<li class="comment">

							<article>

								<img class="avatar" alt="" src="images/gravatar.png">

								<div class="comment-body">
									
									<div class="comment-meta">

										<div class="date"><b>Date:</b>&nbsp;<span>November 27, 2011</span></div>
										<div class="author"><b>Author:</b>&nbsp;<a href="#">Admin</a></div>

									</div><!--/ .comment-meta -->

									<p>
										Quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. 
										Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu
										fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in 
										culpa qui officia deserunt mollit anim. Consectetur adipisicing elit, sed do eiusmod 
										tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam. 
										<a class="comment-reply-link" href="#">Reply</a>
									</p>
									
								</div><!--/ .comment-body -->

							</article>

							<ul class="children">

								<li class="comment">

									<article>

										<img class="avatar" alt="" src="images/gravatar.png">

										<div class="comment-body">

											<div class="comment-meta">

												<div class="date"><b>Date:</b>&nbsp;<span>November 27, 2011</span></div>
												<div class="author"><b>Author:</b>&nbsp;<a href="#">Admin</a></div>

											</div><!--/ .comment-meta -->

											<p>
												Quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. 
												Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu
												fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in 
												culpa qui officia deserunt mollit anim. Consectetur adipisicing elit, sed do eiusmod 
												tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam. 
												<a class="comment-reply-link" href="#">Reply</a>
											</p>

										</div><!--/ .comment-body -->

									</article>

								</li>

							</ul><!--/ .children-->

						</li>

						<li class="comment">

							<article>

								<img class="avatar" alt="" src="images/gravatar.png">

								<div class="comment-body">
									
									<div class="comment-meta">

										<div class="date"><b>Date:</b>&nbsp;<span>November 27, 2011</span></div>
										<div class="author"><b>Author:</b>&nbsp;<a href="#">Admin</a></div>

									</div><!--/ .comment-meta -->

									<p>
										Quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. 
										Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu
										fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in 
										culpa qui officia deserunt mollit anim. Consectetur adipisicing elit, sed do eiusmod 
										tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam. 
										<a class="comment-reply-link" href="#">Reply</a>
									</p>
									
								</div><!--/ .comment-body -->

							</article>

						</li>

					</ol>

				</section>	
				
				<section id="respond">

					<h3 class="section-title">Leave a Reply</h3>

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

				</section>	

			</section><!--/ #content-->

			<!-- - - - - - - - - - - - - - end Content - - - - - - - - - - - - - - - - -->	


			<!-- - - - - - - - - - - - - - - Sidebar - - - - - - - - - - - - - - - - -->	

			<aside id="sidebar" class="one-third column">
				
				<div class="widget-container widget_custom_search">
					
					<div class="search-heading">
							
						<h3 class="widget-title">Quick Search</h3>
						
					</div><!--/ .search-heading-->
					
					<div class="search-entry clearfix">

						<form action="http://xhtml.webtemplatemasters.com/" class="form-panel">

							<fieldset>
								<label>Make:</label>
								<select>
									<option value="0">Any</option>
									<option value="1">Lorem</option>
									<option value="2">Ipsum</option>
								</select>
							</fieldset>

							<fieldset class="not-active">
								<label>Model:</label>
								<select>
									<option value="0">Any</option>
									<option value="1">Lorem</option>
									<option value="2">Ipsum</option>
								</select>
							</fieldset>

							<fieldset>
								<label>Price <span>min</span>:</label>
								<select>
									<option value="0">No max</option>
									<option value="1">Lorem</option>
									<option value="2">Ipsum</option>
								</select>
							</fieldset>

							<fieldset>
								<label>Price <span>max</span>:</label>
								<select>
									<option value="0">Any</option>
									<option value="1">Lorem</option>
									<option value="2">Ipsum</option>
								</select>
							</fieldset>

							<fieldset>
								<label>Year <span>from</span>:</label>
								<select>
									<option value="0">Any</option>
									<option value="1">Lorem</option>
									<option value="2">Ipsum</option>
								</select>
							</fieldset>

							<fieldset>
								<label>Year <span>to</span>:</label>
								<select>
									<option value="0">Any</option>
									<option value="1">Lorem</option>
									<option value="2">Ipsum</option>
								</select>
							</fieldset>
							
							<fieldset>
								<label>Body type</label>
								<select>
									<option value="0">Any</option>
									<option value="1">Lorem</option>
									<option value="2">Ipsum</option>
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