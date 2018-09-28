@extends('backend.layout')
@section('content')
<div class="col-md-8 col-xs-offset-2">	
	<div class="panel panel-primary">
		<div class="panel-heading">Add edit category brand</div>
		<div class="panel-body">
		<form method="post" action="" enctype="multipart/form-data">
		<input type="hidden" name="_token" value="{{ csrf_token() }}">
			<!-- rows -->
			<div class="row" style="margin-top:5px;">
				<div class="col-md-2">Tên hãng</div>
				<div class="col-md-10">
					<input type="text" value="{{ isset($arr->c_name) ? $arr->c_name : '' }}" name="c_name" class="form-control" required>
				</div>
			</div>
			<!-- end rows -->
			<!-- rows -->
			<div class="row" style="margin-top:5px;">
				<div class="col-md-2">Logo</div>
				<div class="col-md-10">
					<input type="file" name="c_img">
				</div>
			</div>
			<!-- end rows -->
			<!-- rows -->
			<div class="row" style="margin-top:5px;">
				<div class="col-md-2"></div>
				<div class="col-md-10">
					<a href="'upload/brand/'.$arr->c_img"></a>
				</div>
			</div>
			<!-- end rows -->
			<!-- rows -->
			<div class="row" style="margin-top:5px;">
				<div class="col-md-2"></div>
				<div class="col-md-10">
					<input type="submit" value="Process" class="btn btn-primary">
				</div>
			</div>
			<!-- end rows -->
		</form>
		</div>
	</div>
</div>
@endsection