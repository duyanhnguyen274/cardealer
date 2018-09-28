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
				<li class="current-menu-item"><a href="news">Blog</a></li>
				<li><a href="contact">Contacts</a></li>
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
				
				<h3 class="section-title">Blog</h3>
				<?php 
					$record_per_page = 4;
					$news = DB::table("tbl_news")->orderBy("pk_news_id","desc")->paginate($record_per_page);
				 ?>
				@foreach($news as $rows)
				<article class="entry clearfix">

					<a href="{{ url('news/'.$rows->pk_news_id) }}"><img class="entry-image" alt="" src="{{ asset('upload/news/'.$rows->c_img) }}"></a>		
						
					<div class="entry-body">
							
						<a href="{{ url('news/'.$rows->pk_news_id) }}">
							<h6 class="title">{{ $rows->c_name }}</h6>
						</a>

						<p>{!! $rows->c_description !!}</p>

					</div><!--/ .entry-body -->

					<footer class="meta clearfix">
						<a href="{{ url('news/'.$rows->pk_news_id) }}" class="icon-comments">12 comments</a>
						<a href="{{ url('news/'.$rows->pk_news_id) }}" class="button dark">Details</a>
					</footer><!--/ .meta -->
			
				</article><!--/ .entry-->
				@endforeach
				
				<div class="wp-pagenavi clearfix">
					
					<?php 
						$total = DB::table("tbl_news")->count();
						$num_page = ceil($total/$record_per_page);
						$page = isset($_GET["p"]) && $_GET["p"] > 0 ? ($_GET["p"]-1) : 1;
					 ?>
					{{ $news->links('frontend.pagination')}}
					
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
				
			</aside><!--/ #sidebar-->

			<!-- - - - - - - - - - - - - end Sidebar - - - - - - - - - - - - - - - - -->

		</section><!--/.container -->

		<!-- - - - - - - - - - - - - end Container - - - - - - - - - - - - - - - - -->			
		
	</div><!--/ .main-->
@endsection