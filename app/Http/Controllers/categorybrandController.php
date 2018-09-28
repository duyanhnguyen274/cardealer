<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;

class categorybrandController extends Controller{
    // List category brand
    public function list_category(Request $request){
    	$data["arr"] = DB::table("tbl_category_brand")->orderBy("pk_category_brand_id","desc")->paginate(7);
    	return view("backend.list_category_brand",$data);
    }
    public function add(Request $request){
    	return view("backend.add_edit_category_brand");
    }
    public function do_add(Request $request){
    	$c_name = $request->get("c_name");
    	$c_img = time().$request->file("c_img")->getClientOriginalName();
        $request->file("c_img")->move("upload/brand/",$c_img);
    	DB::table("tbl_category_brand")->insert(array("c_name"=>$c_name, "c_img"=>$c_img));
    	return redirect(url('admin/category-brand'));
    }
    public function edit(Request $request, $id){
    	$data["arr"] = DB::table("tbl_category_brand")->where("pk_category_brand_id","=",$id)->first();
    	return view("backend.add_edit_category_brand",$data);
    }
    public function do_edit(Request $request, $id){
    	$c_name = $request->get("c_name");
    	DB::table("tbl_category_brand")->where("pk_category_brand_id","=",$id)->update(array("c_name"=>$c_name));
        if($request->hasFile("c_img")){
            $c_img = time().$request->file("c_img")->getClientOriginalName();
            $request->file("c_img")->move("./upload/brand/",$c_img);
            DB::table("tbl_category_brand")->where("pk_category_brand_id","=",$id)->update(array("c_img"=>$c_img));
        }
    	return redirect(url('admin/category-brand'));
    }
    public function delete(Request $request, $id){
    	DB::table("tbl_category_brand")->where("pk_category_brand_id","=",$id)->delete();
    }
}
// Xu ly javscript