@extends('backend.layout')
@section('content')
<div class="col-md-6 col-xs-offset-3">
	<div style="margin-bottom:5px;">
		<a href="{{ url('admin/category-brand/add') }}" class="btn btn-primary">Add category brand</a>
	</div>
	<div class="panel panel-primary">
		<div class="panel-heading">Category brand</div>
		<div class="panel-body">
			<table class="table table-bordered table-hover">
				<tr>
					<th style="text-align: center;">Tên hãng</th>
					<th style="text-align: center;">Logo</th>
					<th style="width:100px; text-align: center;">Quản lý</th>
				</tr>
				@foreach($arr as $rows)
				<tr>
					<td style="text-align: center;">{{ $rows->c_name }}</td>
					<td style="text-align: center">
						@if (file_exists("upload/brand/".$rows->c_img))
						<img src="{{ asset('upload/brand/'.$rows->c_img) }}" style="width: 100px;">
						@endif
					</td>
					<td style="text-align:center;">
						<a href="{{ url('admin/category-brand/edit/'.$rows->pk_category_brand_id) }}">Edit</a>&nbsp;&nbsp;
						<a href="{{ url('admin/category-brand/delete/'.$rows->pk_category_brand_id) }}" onclick="return window.confirm('Are you sure?');">Delete</a>
					</td>
				</tr>
				@endforeach
			</table>
			<style type="text/css">
				.pagination{padding: 0px; margin: 0px;}
			</style>
			<!-- Ham appends(array("bien1"=>"giatri1","bien2"=>"giatri2")) se them cac bien vao url -->
			{{ $arr->appends(array("a"=>"1","b"=>"hello"))->links() }}
		</div>
	</div>
</div>
@endsection