@extends('backend.layout')
@section('content')
<div class="col-md-12 col-xs-offset-1">
	<div style="margin-bottom:5px;">
		<a href="{{ url('admin/product/add') }}" class="btn btn-primary">Add</a>
	</div>
	<div class="panel panel-primary">
		<div class="panel-heading">Product</div>
		<div class="panel-body">
			<table class="table table-hover table-bordered">
				<tr>
					<th style="width:50px;text-align: center;">STT</th>
					<th style="width:100px;text-align: center;">Ảnh</th>
					<th style="width:130px;text-align: center;">Tên sản phẩm</th>
					<th style="width:70px;text-align: center;">Hãng</th>
					<th style="width:70px;text-align: center;">Hộp số</th>
					<th style="width:70px;text-align: center;">Số km đã đi</th>
					<th style="width:70px;text-align: center;">Dòng xe</th>
					<th style="width:70px;text-align: center;">Năm đăng ký</th>
					<th style="width:100px;text-align: center;">Giá</th>
					<th style="width:20px;text-align: center;">Sản phẩm nổi bật</th>
					<th style="width:50px;text-align: center;">Quản lý</th>
				</tr>
				<?php $stt = 0; ?>
				@foreach($arr as $rows)
				<?php $stt++; ?>
				<tr>
					<td style="text-align:center;">{{ $stt }}</td>
					<td style="text-align: center">
						@if (file_exists("upload/product/".$rows->c_img))
						<img src="{{ asset('upload/product/'.$rows->c_img) }}" style="width: 150px;">
						@endif
					</td>
					<td style="text-align: center;">
						{{ $rows->c_name }}
					</td>
					<td style="text-align:center;">
						<?php 
							$category = DB::table("tbl_category_brand")->where("pk_category_brand_id","=",$rows->fk_category_brand_id)->first();
							echo isset($category->c_name) ? $category->c_name : "";
						 ?>
					</td>
					<td style="text-align: center">
						{{ $rows->c_trans }}
					</td>
					<td style="text-align: center">
						{{ $rows->c_mileage }}
					</td>
					<td style="text-align: center">
						{{ $rows->c_type }}
					</td>
					<td style="text-align: center;">
						{{ $rows->c_yearreg }}
					</td>
					<td style="text-align: center;">
						{{ number_format($rows->c_price) }}
					</td>
					<td style="text-align:center;">
						@if($rows->c_hotproduct == 1)
							Hot
						@endif
					</td>
					<td style="text-align:center;">
						<a href="{{ url('admin/product/edit/'.$rows->pk_product_id) }}">Edit</a>&nbsp;
						<a href="{{ url('admin/product/delete/'.$rows->pk_product_id) }}" onclick="return window.confirm('Are you sure?');">Delete</a>
					</td>
				</tr>
				@endforeach
			</table>
			<style type="text/css">
				.pagination{padding:0px; margin:0px;}			
			</style>
			{{ $arr->render() }}
		</div>
	</div>
</div>
@endsection