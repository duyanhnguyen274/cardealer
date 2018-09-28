<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
// Muon su dung doi tuong nao thi phai khai bao doi tuong do bang tu khoa use
use DB; // La class su dung de thao tac voi CSDL
use Hash; // La class su dung de ma hoa password
// Khai bao class model co ten category de su dung
use App\category;

class categorynewsController extends Controller{
	// List category
	public function list_category(Request $request){
		// Khai bao object cua class 
		$cat = new category();
		// Lay cac ban ghi co phan trang
		// $cat se tuong duong voi DB::table("ten-table") trong query builder, con tat ca thanh phan khac deu giong nhau
		$data["arr"] = $cat->orderBy("pk_category_news_id","desc")->paginate(4);
		return view("backend.list_category_news",$data);
	}
	public function edit(Request $request,$id){
		// Khai bao object cua class category de su dung
		$cat = new category();
		// Lay mot ban ghi
		$data["arr"] = $cat->where("pk_category_news_id","=",$id)->first();
		return view("backend.add_edit_category_news",$data);
	}
	public function do_edit(Request $request,$id){
		// Khai bao object cua class category de su dung
		$cat = new category();
		$c_name = $request->get("c_name");
		// Sua ban ghi
		$cat->where("pk_category_news_id","=",$id)->update(array("c_name"=>$c_name));
		return redirect(url('admin/category-news'));
	}
	public function add(Request $request){
		return view("backend.add_edit_category_news");
	}
	public function do_add(Request $request){
		// Khai bao object cua class category de su dung
		$cat = new category();
		$c_name = $request->get("c_name");
		$cat->insert(array("c_name"=>$c_name));
		return redirect(url('admin/category-news'));
	}
	public function delete(Request $request,$id){
		// Khai bao object cua class category de su dung
		$cat = new category();
		$cat->where("pk_category_news_id","=",$id)->delete();
	}
}