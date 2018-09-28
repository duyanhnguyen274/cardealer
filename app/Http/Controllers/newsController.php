<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
// Muon su dung doi tuong nao thi phai khai bao doi tuong do bang tu khoa use
use DB; // La class su dung de thao tac voi CSDL

class newsController extends Controller
{
	// List thong tin
	public function list_news(){
		$data["arr"] = DB::table("tbl_news")->orderBy("pk_news_id","desc")->paginate(7);
		// Goi view, truyen du lieu ra view
		return view("backend.list_news",$data);
	}
	// Edit ban ghi
	public function edit(Request $request, $id){
		// Lay mot ban ghi
		$data["arr"] = DB::table("tbl_news")->where("pk_news_id","=",$id)->first();
		// Goi view
		return view("backend.add_edit_news",$data);
	}
	// Do edit
	public function do_edit(Request $request, $id){
		$c_name = $request->get("c_name");
		$c_description = $request->get("c_description");
		$c_content = $request->get("c_content");
		$fk_category_news_id = $request->get("fk_category_news_id");
		$c_hotnews = $request->get("c_hotnews") != "" ? 1 : 0;
		// Update ban ghi
		$arr_update = array("c_name"=>$c_name,"c_description"=>$c_description,"c_content"=>$c_content,"fk_category_news_id"=>$fk_category_news_id,"c_hotnews"=>$c_hotnews);
		DB::table("tbl_news")->where("pk_news_id","=",$id)->update($arr_update);
		// Kiem tra xem user co chon anh khong, neu co chon anh thi upload anh
		if($request->hasFile("c_img")){
			$c_img = time().$request->file("c_img")->getClientOriginalName();
			// Upload anh
			$request->file("c_img")->move("upload/news",$c_img);
			// Upload vao sql
			$arr_update = array("c_img"=>$c_img);
			DB::table("tbl_news")->where("pk_news_id","=",$id)->update($arr_update);
		}
		// Quay tro lai url
		return redirect(url("admin/news"));
	}
	public function add(Request $request){
        return view("backend.add_edit_news");
    }
    public function do_add(Request $request){
        $c_name = $request->get("c_name");
        $c_description = $request->get("c_description");
        $c_content = $request->get("c_content");
        $fk_category_news_id = $request->get("fk_category_news_id");
		$c_hotnews = $request->get("c_hotnews") != "" ? 1 : 0;
		$arr_insert = array("c_name"=>$c_name,"c_description"=>$c_description,"c_content"=>$c_content,"fk_category_news_id"=>$fk_category_news_id,"c_hotnews"=>$c_hotnews);
        // Them ban ghi vao table news
        DB::table("tbl_news")->insert($arr_insert);
        // Quay tro lai trang news
        return redirect(url('admin/news'));
    }
    public function delete(Request $request,$id){
        // Delete ban ghi trong table news
        DB::table("tbl_news")->where("id","=",$id)->delete();
        // Quay tro lai trang news
        return redirect(url('admin/news'));

    }
}