<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;

class productController extends Controller{
    // List thong tin
	public function list_product(Request $request){
		$data["arr"] = DB::table("tbl_product")->orderBy("pk_product_id","desc")->paginate(7);
		// Goi view, truyen du lieu ra view
		return view("backend.list_product",$data);
	}
	public function add(Request $request){
		return view("backend.add_edit_product");
	}
	public function do_add(Request $request){
		$c_name = $request->get("c_name");
		$fk_category_brand_id = $request->get("fk_category_brand_id");
		$c_description = $request->get("c_description");
		$c_content = $request->get("c_content");
		$c_trans = $request->get("c_trans");
		$c_mileage = $request->get("c_mileage");
		$c_type = $request->get("c_type");
		$c_yearreg = $request->get("c_yearreg");
		$c_price = $request->get("c_price");
		$c_hotproduct = $request->get("c_hotproduct") != "" ? 1 : 0;
		if($request->hasFile("c_img")){
            $c_img = time().$request->file("c_img")->getClientOriginalName();
			$request->file("c_img")->move("./upload/product/",$c_img);
			$insert_arr = array("c_name"=>$c_name,"fk_category_brand_id"=>$fk_category_brand_id,"c_description"=>$c_description,"c_content"=>$c_content,"c_trans"=>$c_trans,"c_mileage"=>$c_mileage,"c_type"=>$c_type,"c_yearreg"=>$c_yearreg,"c_img"=>$c_img,"c_price"=>$c_price,"c_hotproduct"=>$c_hotproduct);
			DB::table("tbl_product")->insert($insert_arr);
		} else {
		DB::table("tbl_product")->insert(array("c_name"=>$c_name,"fk_category_brand_id"=>$fk_category_brand_id,"c_description"=>$c_description,"c_content"=>$c_content,"c_trans"=>$c_trans,"c_mileage"=>$c_mileage,"c_type"=>$c_type,"c_yearreg"=>$c_yearreg,"c_price"=>$c_price,"c_hotproduct"=>$c_hotproduct));
		}
		
		return redirect(url("admin/product"));
	}
	public function edit(Request $request, $id){
		$data["arr"] = DB::table("tbl_product")->where("pk_product_id","=",$id)->first();
		return view("backend.add_edit_product",$data);
	}
	public function do_edit(Request $request, $id){
		$c_name = $request->get("c_name");
		$fk_category_brand_id = $request->get("fk_category_brand_id");
		$c_description = $request->get("c_description");
		$c_content = $request->get("c_content");
		$c_trans = $request->get("c_trans");
		$c_mileage = $request->get("c_mileage");
		$c_type = $request->get("c_type");
		$c_yearreg = $request->get("c_yearreg");
		$c_price = $request->get("c_price");
		$c_img = $request->get("c_img");
		$c_hotproduct = $request->get("c_hotproduct") != "" ? 1 : 0;
		$update_arr = array("c_name"=>$c_name,"fk_category_brand_id"=>$fk_category_brand_id,"c_description"=>$c_description,"c_content"=>$c_content,"c_trans"=>$c_trans,"c_mileage"=>$c_mileage,"c_type"=>$c_type,"c_yearreg"=>$c_yearreg,"c_price"=>$c_price,"c_hotproduct"=>$c_hotproduct);

		DB::table("tbl_product")->where("pk_product_id","=",$id)->update($update_arr);
		if($request->hasFile("c_img")){
            $c_img = time().$request->file("c_img")->getClientOriginalName();
			$request->file("c_img")->move("./upload/product/",$c_img);
			DB::table("tbl_product")->where("pk_product_id","=",$id)->update(array("c_img"=>$c_img));
		}
		return redirect(url("admin/product"));
	}
	public function delete(Request $request, $id){
		DB::table("tbl_product")->where("pk_product_id","=",$id)->delete();
		return redirect(url("admin/product"));
	}
}
