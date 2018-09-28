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
	<nav id="navigation" class="navigation">
		
		<ul>
			<li class="current-menu-item"><a href="home">Home</a></li>
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
			<li><a href="contact">Contacts</a></li>
		</ul>
		
	</nav><!--/ #navigation-->
		
</header><!--/ #header-->
@endsection
@section('content')
<div class="top-panel clearfix">
		
		<!-- - - - - - - - - - - Slider - - - - - - - - - - - - - -->	

		<div id="slider" class="flexslider clearfix">

			<ul class="slides">
				<?php 
					$arr = DB::select("select * from tbl_product order by pk_product_id desc limit 0,5");
				 ?>
				@foreach($arr as $rows)
				<li>
					<a href="{{ url('product/'.$rows->pk_product_id) }}">
						<img src="{{ asset('upload/product/'.$rows->c_img) }}" alt="" />
					</a>
					<div class="caption">
						<div class="caption-entry">

							<dl class="auto-detailed clearfix">
								<dt><span class="model">{{ $rows->c_name }}</span></dt>
								<dd class="media-hidden"><b>{{ $rows->c_trans }}</b></dd>
								<dd class="media-hidden"><b>{{ $rows->c_mileage }}</b></dd>
								<dd><span class="heading">{{ '$'.number_format($rows->c_price) }}</span></dd>
							</dl><!--/ .auto-detailed-->

							<a href="{{ url('product/'.$rows->pk_product_id) }}" class="button orange">Details &raquo;</a>

						</div><!--/ .caption-entry-->
					</div><!--/ .caption-->
				</li>
				@endforeach
				

			</ul><!--/ .slides-->

		</div><!--/ #slider-->

		<!-- - - - - - - - - - - end Slider - - - - - - - - - - - - - -->
		
		<!-- - - - - - - - - - - Search Panel - - - - - - - - - - - - - -->
		
		<div class="widget_custom_search">
			
			<h3 class="widget-title">Quick Search</h3>
			<script type="text/javascript">
				$("select")
				.change(function(){
					var category_brand = "";
					var c_trans = "";
					var c_mileage = "";
					var c_type = "";
					$( "select option:selected" ).each(function(){
						category_brand = $(this).text();
						c_trans = $(this).text();
						c_mileage = $(this).text();
						c_type = $(this).text();
					});
					$( "#display" ).text(category_brand,c_trans,c_mileage,c_type);
				})
				.trigger( "change" );
			</script>
			<?php 
				$category_brand = isset($_GET["fk_category_brand_id"]) ? $_GET["fk_category_brand_id"] : 0;
				$c_trans = isset($_GET["c_trans"]) ? $_GET["c_trans"] : 0;
				$c_mileage = isset($_GET["c_mileage"]) ? $_GET["c_mileage"] : 0;
				$c_type = isset($_GET["c_type"]) ? $_GET["c_type"] : 0;
			 ?>
			<form action="" id="boxpanel" class="form-panel">
				
				<fieldset>
					<label>Manufacturer:</label>
					<select>
						<option value="0">----</option>
						<?php 
							// Lay toan bo ban ghi
							$category = DB::select("select * from tbl_category_brand order by pk_category_brand_id desc");
						 ?>
						 @foreach($category as $rows)
						<option value="{{ $rows->pk_category_brand_id}}">{{ $rows->c_name }}
						</option>
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
					<label>Trans:</label>
					<select>
						<option value="0">----</option>
						<?php 
							$trans = DB::select("select distinct c_trans from tbl_product order by c_trans desc");
						 ?>
						@foreach($trans as $rows)
						<option value=" $c_trans = {{ $rows->c_trans }}">{{ $rows->c_trans}}</option>
						@endforeach
					</select>
				</fieldset>
				
				<fieldset>
					<label>Mileage:</label>
					<select>
						<option value="0">----</option>
						<?php 
							$mileage = DB::select("select distinct c_mileage from tbl_product order by c_mileage desc");
						 ?>
						@foreach($mileage as $rows)
						<option value=" {{ $rows->c_mileage }}">{{ $rows->c_mileage }}</option>
						@endforeach
					</select>
				</fieldset>
				
				<fieldset>
					<label>Body Type:</label>
					<select>
						<option value="0">----</option>
						<?php 
							$type = DB::select("select distinct c_type from tbl_product order by c_type desc");
						 ?>
						@foreach($type as $rows)
						<option value=" {{ $rows->c_type }}">{{ $rows->c_type }}</option>
						@endforeach
					</select>
				</fieldset>
				<div id="display"></div>
				<div class="clear"></div>
				<button id="submitSearch" class="submit-search" type="submit" onclick="search();">Search</button>
				
			</form><!--/ .form-panel-->
			
		</div><!--/ .main-search-panel-->
		
		<!-- - - - - - - - - - end Search Panel - - - - - - - - - - - - -->
		
	</div><!--/ .top-panel-->
	
	<!-- - - - - - - - - - - - - end Top Panel - - - - - - - - - - - - - - - -->	
	
	<div class="main">

		<!-- - - - - - - - - - - - - - - Container - - - - - - - - - - - - - - - - -->	

		<section class="container sbr clearfix">

			<!-- - - - - - - - - - - - - - - Content - - - - - - - - - - - - - - - - -->		

			<section id="content" class="two-thirds column">

				<h3 class="widget-title">Recent Automobiles</h3>
				
				<section id="change-items" class="item-grid">
					<?php 
						$product = DB::table("tbl_product")->orderBy("pk_product_id","desc")->paginate(9);
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


					<a href="#" class="see">See all automobiles</a>
					
				</section><!--/ .item-grid-->
				
			</section><!--/ #content-->

			<!-- - - - - - - - - - - - - - end Content - - - - - - - - - - - - - - - - -->	


			<!-- - - - - - - - - - - - - - - Sidebar - - - - - - - - - - - - - - - - -->	

			<aside id="sidebar" class="one-third column">
				
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
				
				<div class="widget-container widget_recent_entries">
					
					<h3 class="widget-title">Recent News</h3>
					<?php 
						$news = DB::table("tbl_news")->orderBy("pk_news_id","desc")->paginate(3);
					 ?>
					<ul>
						@foreach($news as $rows)
						<li><a href="{{ url('news/'.$rows->pk_news_id) }}">{{ $rows->c_name }}</a></li>
						
						@endforeach
					</ul>
					
					<a href="#" class="see">See all news</a>
					
				</div><!--/ .widget-container-->

			</aside><!--/ #sidebar-->

			<!-- - - - - - - - - - - - - end Sidebar - - - - - - - - - - - - - - - - -->

		</section><!--/.container -->

		<!-- - - - - - - - - - - - - end Container - - - - - - - - - - - - - - - - -->			
		
	</div><!--/ .main-->
@endsection