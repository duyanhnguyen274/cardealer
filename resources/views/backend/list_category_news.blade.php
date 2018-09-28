@extends('backend.layout')
@section('content')
<div class="col-md-6 col-xs-offset-3">
	<div style="margin-bottom:5px;">
		<a href="{{ url('admin/category-news/add') }}" class="btn btn-primary">Add category news</a>
	</div>
	<div class="panel panel-primary">
		<div class="panel-heading">Category news</div>
		<div class="panel-body">
			<table class="table table-bordered table-hover">
				<tr>
					<th>Tên danh mục</th>
					<th style="width:100px;">Quản lý</th>
				</tr>
				@foreach($arr as $rows)
				<tr>
					<td>{{ $rows->c_name }}</td>
					<td style="text-align:center;">
						<a href="{{ url('admin/category-news/edit/'.$rows->pk_category_news_id) }}">Edit</a>&nbsp;&nbsp;
						<a href="{{ url('admin/category-news/delete/'.$rows->pk_category_news_id) }}" onclick="return window.confirm('Are you sure?');">Delete</a>
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