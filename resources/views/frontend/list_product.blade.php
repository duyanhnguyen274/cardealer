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
				<li><a href="../news">Blog</a></li>
				<li><a href="contact.html">Contacts</a></li>
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
				
				<div class="page-header clearfix">

					<h3 class="section-title">Recent Automobiles</h3>

					<div class="layout-switcher">
						<a class="layout-grid" href="#item-grid">Grid View</a>
						<a class="layout-list" href="#item-list">List View</a>
					</div><!--/ .layout-switcher-->

				</div><!--/ .page-header-->

				<section id="change-items" class="item-grid">
					<?php 
						$record_per_page = 9;
						$product = DB::table("tbl_product")->where("fk_category_brand_id","=",$id)->paginate($record_per_page);
					 ?>
					@foreach($product as $rows)
					<article>
						
						<a href="{{ url('product/'.$rows->pk_product_id) }}" class="single-image picture video">
							<img src="{{ asset('upload/product/'.$rows->c_img) }}" style="width: 200px" alt="">
						</a>

						<div class="detailed">
							
							<h6 class="title-item">
								<a href="{{ url('product/'.$rows->pk_product_id) }}">{{ $rows->c_name }}</a>
							</h6>
							
							<span class="price">${{ number_format($rows->c_price) }}</span>
							
							<div class="clear"></div>
							
							<ul class="list-entry">
								<li><b class="label">Engine:</b><span>{{ $rows->c_trans }}</span></li>
								<li><b class="label">Mileage:</b><span>{{ $rows->c_mileage }}</span></li>	
								<li><b class="label">Year:</b><span>{{ $rows->c_yearreg }}</span></li>	
								<li><b class="label">Location:</b><span>New Jersey/ Newark</span></li>	
							</ul><!--/ .list-entry-->

							<label class="compare"><input type="checkbox" />Compare</label>
							<a href="{{ url('product/'.$rows->pk_product_id) }}" class="button orange">Details</a>
							
						</div><!--/ .detailed-->
						
					</article>
					@endforeach
				</section><!--/ #change-items-->				

				<div class="wp-pagenavi clearfix">
					<?php 
						$total = DB::table("tbl_product")->count();
						$num_page = ceil($total/$record_per_page);
						$page = isset($_GET["p"]) && $_GET["p"] > 0 ? ($_GET["p"]-1) : 1;
					 ?>
					{{ $product->links('frontend.pagination')}}
					

				</div><!--/ .wp-pagenavi-->

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
										<button name="cal" onclick="calculation()" class="button orange">Calculate</button>
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
						<script type="text/javascript">
								function calculation(){
									var loanAmount = document.getElementById('LoanAmount').value;
									var interestRate = document.getElementById('InterestRate').value;
									var numberOfYears = document.getElementById('NumberOfYears').value;
									var temp = Number(loanAmount.value) * Number(interestRate.value);
									var numberOfPayments = document.getElementById('NumberOfPayments').value;
									numberOfPayments.value = temp;
								}
							</script>
					</div><!--/ .entry-loan-->
					
				</div><!--/ .widget-container-->
				
				<div class="widget-container widget_latest">
					
					<h3 class="widget-title">Latest News</h3>
					<?php 
						$news = DB::select("select * from tbl_news order by pk_news_id desc limit 0,3");
					 ?>
					<ul>
						@foreach($news as $rows)
						<li>
							<a class="thumb single-image" href="#"><img src="{{ asset('upload/news/'.$rows->c_img) }}" alt="" /></a>
							<div class="latest-entry">
								<a href="#" class="block"><b>{!! $rows->c_description !!}</b></a>
								<a href="#" class="bold text-orange italic">Oct 3, 2012</a>	
								<p>
									
								</p>
							</div><!--/ .latest-entry-->
						</li>
						@endforeach
					</ul>
					
					<a href="#" class="see">See all news</a>
					
				</div><!--/ .widget-container-->
				
				<div class="widget-container widget_latest">
					
					<h3 class="widget-title">Latest Cars</h3>
					
					<ul>
						<li>
							<a class="thumb single-image picture video" href="#"><img src="{{ asset('frontend/images/temp/latest-thumb-1.jpg') }}" alt="" /></a>
							<div class="latest-entry">
								<a href="#" class="block"><b>Aston Martin DB9</b></a>
								<span class="block add-margin">2009 y.r., 160,000 km.</span>
								<a href="#" class="bold text-orange">$8.966</a>	
							</div><!--/ .latest-entry-->
						</li>
						<li>
							<a class="thumb single-image picture" href="#"><img src="{{ asset('frontend/images/temp/latest-thumb-2.jpg') }}" alt="" /></a>
							<div class="latest-entry">
								<a href="#" class="block"><b>Aston Martin DB9</b></a>
								<span class="block add-margin">2009 y.r., 160,000 km.</span>
								<a href="#" class="bold text-orange">$8.966</a>	
							</div><!--/ .latest-entry-->
						</li>
						<li>
							<a class="thumb single-image picture video" href="#"><img src="{{ asset('frontend/images/temp/latest-thumb-3.jpg') }}" alt="" /></a>
							<div class="latest-entry">
								<a href="#" class="block"><b>Aston Martin DB9</b></a>
								<span class="block add-margin">2009 y.r., 160,000 km.</span>
								<a href="#" class="bold text-orange">$8.966</a>	
							</div><!--/ .latest-entry-->
						</li>
					</ul>
					
					<a href="#" class="see">See all news</a>
					
				</div><!--/ .widget-container-->

			</aside><!--/ #sidebar-->

			<!-- - - - - - - - - - - - - end Sidebar - - - - - - - - - - - - - - - - -->

		</section><!--/.container -->

		<!-- - - - - - - - - - - - - end Container - - - - - - - - - - - - - - - - -->			
		
	</div><!--/ .main-->
@endsection