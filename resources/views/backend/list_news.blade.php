@extends('backend.layout')
@section('content')
<div class="col-md-10 col-xs-offset-1">
	<div style="margin-bottom:5px;">
		<a href="{{ url('admin/news/add') }}" class="btn btn-primary">Add</a>
	</div>
	<div class="panel panel-primary">
		<div class="panel-heading">News</div>
		<div class="panel-body">
			<table class="table table-hover table-bordered">
				<tr>
					<th style="width:50px;text-align: center;">STT</th>
					<th style="width:100px;text-align: center;">Ảnh</th>
					<th style="text-align: center;">Tiêu đề</th>
					<th style="width:200px;text-align: center;">Danh mục</th>
					<th style="width:70px;text-align: center;">Tin nổi bật</th>
					<th style="width:100px;"></th>
				</tr>
				<?php $stt = 0; ?>
				@foreach($arr as $rows)
				<?php $stt++; ?>
				<tr>
					<td style="text-align:center;">{{ $stt }}</td>
					<td style="text-align: center;">
						@if(file_exists("upload/news/".$rows->c_img))
						<img src="{{ asset('upload/news/'.$rows->c_img) }}" style="width: 100px;">
						@endif
					</td>
					<td>{{ $rows->c_name }}</td>
					<td style="text-align:center;">
						<?php 
							$category = DB::table("tbl_category_news")->where("pk_category_news_id","=",$rows->fk_category_news_id)->first();
							echo isset($category->c_name) ? $category->c_name : "";
						 ?>
					</td>
					<td style="text-align:center;">
						@if($rows->c_hotnews == 1)
							Hot
						@endif
					</td>
					<td style="text-align:center;">
						<a href="{{ url('admin/news/edit/'.$rows->pk_news_id) }}">Edit</a>&nbsp;
						<a href="{{ url('admin/news/delete/'.$rows->pk_news_id) }}" onclick="return window.confirm('Are you sure?');">Delete</a>
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