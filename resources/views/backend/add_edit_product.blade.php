@extends('backend.layout')
@section('content')
<div class="col-md-8 col-xs-offset-2">
	<div class="panel panel-primary">
		<div class="panel-heading">Add edit product</div>
		<div class="panel-body">
			<form method="post" action="" enctype= "multipart/form-data">
			<input type="hidden" name="_token" value="{{ csrf_token() }}">
			<!-- row -->
			<div class="row" style="margin-top:5px;">
				<div class="col-md-3">Tiêu đề</div>
				<div class="col-md-9">
					<input type="text" name="c_name" class="form-control" value="{{ isset($arr->c_name) ? $arr->c_name : '' }}">
				</div>
			</div>
			<!-- end row -->
			<!-- row -->
			<div class="row" style="margin-top:5px;">
				<div class="col-md-3">Thuộc danh mục</div>
				<div class="col-md-9">
					<select name="fk_category_brand_id">
						<?php 
							// Lay toan bo ban ghi
							$category = DB::select("select * from tbl_category_brand order by pk_category_brand_id desc");
						 ?>
						 @foreach($category as $rows)
						<option 
						@if(isset($arr->fk_category_brand_id) && $arr->fk_category_brand_id == $rows->pk_category_brand_id)
						selected
						@endif
						value="{{ $rows->pk_category_brand_id}}">{{ $rows->c_name }}
						</option>
						@endforeach
					</select>
				</div>
			</div>
			<!-- end row -->
			<!-- row -->
			<div class="row" style="margin-top:5px;">
				<div class="col-md-3">Giới thiệu</div>
				<div class="col-md-9">
					<textarea name="c_description" class="form-control" style="height:250px;">	
					{{ isset($arr->c_description) ? $arr->c_description : '' }}					
					</textarea>
					<script type="text/javascript">
						CKEDITOR.replace("c_description")
					</script>
				</div>
			</div>
			<!-- end row -->
			<!-- row -->
			<div class="row" style="margin-top:5px;">
				<div class="col-md-3">Chi tiết</div>
				<div class="col-md-9">
					<textarea name="c_content" class="form-control" style="height:300px;">
						{{ isset($arr->c_content) ? $arr->c_content : '' }}
					</textarea>
					<script type="text/javascript">
						CKEDITOR.replace("c_content")
					</script>
				</div>
			</div>
			<!-- end row -->
			<!-- row -->
			<div class="row" style="margin-top:5px;">
				<div class="col-md-3">Transmission</div>
				<div class="col-md-9">
					<input type="text" name="c_trans" value="{{ isset($arr->c_trans) ? $arr->c_trans : '' }}" >
				</div>
			</div>
			<!-- end row -->
			<!-- row -->
			<div class="row" style="margin-top:5px;">
				<div class="col-md-3">Mileage</div>
				<div class="col-md-9">
					<input type="number" name="c_mileage" value="{{ isset($arr->c_mileage) ? $arr->c_mileage : '' }}">
				</div>
			</div>
			<!-- end row -->
			<!-- row -->
			<div class="row" style="margin-top:5px;">
				<div class="col-md-3">Body Type</div>
				<div class="col-md-9">
					<input type="text" name="c_type" value="{{ isset($arr->c_type) ? $arr->c_type : '' }}" >
				</div>
			</div>
			<!-- end row -->
			<!-- row -->
			<div class="row" style="margin-top:5px;">
				<div class="col-md-3">Year Reg</div>
				<div class="col-md-9">
					<input type="number" name="c_yearreg" value="{{ isset($arr->c_yearreg) ? $arr->c_yearreg : '' }}" required>
				</div>
			</div>
			<!-- end row -->
			<!-- row -->
			<div class="row" style="margin-top:5px;">
				<div class="col-md-3">Price</div>
				<div class="col-md-9">
					<input type="number" name="c_price" value="{{ isset($arr->c_yearreg) ? $arr->c_price : '' }}" required> ($)
				</div>
			</div>
			<!-- end row -->

			<!-- row -->
			<div class="row" style="margin-top:5px;">
				<div class="col-md-3"></div>
				<div class="col-md-9">
					<input type="checkbox" @if(isset($arr->c_hotproduct) && $arr->c_hotproduct==1) checked @endif name="c_hotproduct" id="c_hotproduct"> <label for="c_hotproduct">Tin nổi bật</label>
				</div>
			</div>
			<!-- end row -->
			<!-- row -->
			<div class="row" style="margin-top:5px;">
				<div class="col-md-3">Ảnh đại diện</div>
				<div class="col-md-9">
					<input type="file" name="c_img">
				</div>
			</div>
			<!-- end row -->
			<!-- row -->
			<div class="row" style="margin-top:5px;">
				<div class="col-md-3">Thumb 1</div>
				<div class="col-md-9">
					<input type="file" name="c_item1">
				</div>
			</div>
			<!-- end row -->
			<!-- row -->
			<div class="row" style="margin-top:5px;">
				<div class="col-md-3">Thumb 2</div>
				<div class="col-md-9">
					<input type="file" name="c_item2">
				</div>
			</div>
			<!-- end row -->
			<!-- row -->
			<div class="row" style="margin-top:5px;">
				<div class="col-md-3">Thumb 3</div>
				<div class="col-md-9">
					<input type="file" name="c_item3">
				</div>
			</div>
			<!-- end row -->
			<!-- row -->
			<div class="row" style="margin-top:5px;">
				<div class="col-md-3">Thumb 4</div>
				<div class="col-md-9">
					<input type="file" name="c_item4">
				</div>
			</div>
			<!-- end row -->
			<!-- row -->
			<div class="row" style="margin-top:5px;">
				<div class="col-md-3">Thumb 5</div>
				<div class="col-md-9">
					<input type="file" name="c_item5">
				</div>
			</div>
			<!-- end row -->
			<!-- row -->
			<div class="row" style="margin-top:5px;">
				<div class="col-md-3">Thumb 6</div>
				<div class="col-md-9">
					<input type="file" name="c_item6">
				</div>
			</div>
			<!-- end row -->			
			<!-- row -->
			<div class="row" style="margin-top:5px;">
				<div class="col-md-3"></div>
				<div class="col-md-9">
					<input type="submit" class="btn btn-primary" value="Process">
				</div>
			</div>
			<!-- end row -->
			</form>
		</div>
	</div>
</div>
@endsection