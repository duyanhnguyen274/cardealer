<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
// Muon su dung doi tuong nao thi phai khai bao doi tuong do bang tu khoa use
use DB; // La class su dung de thao tac voi CSDL
use Hash; // La class su dung de ma hoa password

class userController extends Controller
{
    // List user
    public function list_user(Request $request){
        // Lay tat ca cac ban ghi
        // Kien truc: DB::table(tenbang)->where("tencot","sosanh","giatri")->orderBy("tencot","asc/desc")->offset(lay-tu-ban-ghi)->limit(so-luong-ban-ghi-can-lay) -> ..
        // -> get() Lay tat ca cac ban ghi
        // -> first() Lay mot ban ghi
        // -> Count() Tra ve so luong ban ghi
        // -> paginate(so-luong-ban-ghi-tren-mot-trang) Phan trang
        // Lay cac ban ghi trong table user co phan trang
        $data["arr"] = DB::table("users")->orderBy("id","desc")->paginate(4);
        // Goi view
        return view("backend.list_user",$data);
    }
    // Edit user
    public function edit(Request $request,$id){
        // Lay 1 ban ghi tuong ung voi id truyen vao
        $data["arr"] = DB::table("users")->where("id","=",$id)->first();
        // Goi view
        return view("backend.add_edit_user",$data);
    }
    // Do edit user
    public function do_edit(Request $request,$id){
        $name = $request->get("name");
        $password = $request->get("password");
        // Update cot name
        DB::table("users")->where("id","=",$id)->update(array("name"=>$name));
        // Neu nguoi dung nhap password thi update password
        if($password != ""){
            // Ma hoa password theo laravel
            $password = Hash::make($password);
            // Update password
            DB::table("users")->where("id","=",$id)->update(array("password"=>$password));
        }
        // Quay tro lai trang user
        return redirect(url('admin/user'));
    }
    public function add(Request $request){
        return view("backend.add_edit_user");
    }
    public function do_add(Request $request){
        $name = $request->get("name");
        $password = $request->get("password");
        $email = $request->get("email");
        // Them ban ghi vao table users
        DB::table("users")->insert(array("name"=>$name,"email"=>$email,"password"=>$password));
        // Quay tro lai trang user
        return redirect(url('admin/user'));
    }
    public function delete(Request $request,$id){
        // Delete ban ghi trong table users
        DB::table("users")->where("id","=",$id)->delete();
        // Quay tro lai trang user
        return redirect(url('admin/user'));

    }
}
