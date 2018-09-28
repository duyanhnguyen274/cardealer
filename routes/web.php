<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/
Route::get('one-products',function(){
	return view('frontend.one_product');
});
Route::get('/', function () {
    return view('welcome');
});
Route::get('',function(){
	return view("frontend.home");
});
Route::get('home',function(){
	return view("frontend.home");
});

Auth::routes();
// Route::get('/home', 'HomeController@index')->name('home');

Route::get('pwd',function(){
	echo Hash::make('123');
});
Route::get('admin',function(){
	return redirect(url('login'));
});
// Route::get('login',function(){
// 	return redirect(url('admin/user'));
// });
Route::get('news',function(){
	return view("frontend.list_news");
});
Route::get('news/{id}',function($id){
	$data["id"] = $id;
	return view("frontend.one_news",$data);
});
Route::get('all-listings',function(){
	return view("frontend.all_listings");
});
Route::get('product/{id}',function($id){
	$data["id"] = $id;
	return view("frontend.one_product",$data);
});
Route::get('brand/{id}',function($id){
	$data["id"] = $id;
	return view("frontend.list_product",$data);
});
Route::get('contact',function(){
	return view("frontend.contact");
});
Route::group(array("prefix"=>"admin","middleware"=>"auth"),function(){
	Route::get('logout',function(){
		Auth::logout();
		return redirect(url('admin/user'));
	});
	//------------
	//list user
	Route::get("user","userController@list_user");
	// Edit user
	Route::get("user/edit/{id}","userController@edit");
	// Do edit user
	Route::post("user/edit/{id}","userController@do_edit");
	// Add user
	Route::get("user/add","userController@add");
	// Do add user
	Route::post("user/add","userController@do_add");
	// Delete user
	Route::get("user/delete/{id}","userController@delete");
	//------------
	//------------
	//list category news
	Route::get("category-news","categorynewsController@list_category");
	// Edit category
	Route::get("category-news/edit/{id}","categorynewsController@edit");
	// Do edit category
	Route::post("category-news/edit/{id}","categorynewsController@do_edit");
	// Add category
	Route::get("category-news/add","categorynewsController@add");
	// Do add category
	Route::post("category-news/add","categorynewsController@do_add");
	// Delete category
	Route::get("category-news/delete/{id}","categorynewsController@delete");
	//------------
	//------------
	//list news
	Route::get("news","newsController@list_news");
	// Edit news
	Route::get("news/edit/{id}","newsController@edit");
	// Do edit news
	Route::post("news/edit/{id}","newsController@do_edit");
	// Add news
	Route::get("news/add","newsController@add");
	// Do add news
	Route::post("news/add","newsController@do_add");
	// Delete news
	Route::get("news/delete/{id}","newsController@delete");
	//------------
	//list category brand
	Route::get("category-brand","categorybrandController@list_category");
	// Edit category
	Route::get("category-brand/edit/{id}","categorybrandController@edit");
	// Do edit category
	Route::post("category-brand/edit/{id}","categorybrandController@do_edit");
	// Add category
	Route::get("category-brand/add","categorybrandController@add");
	// Do add category
	Route::post("category-brand/add","categorybrandController@do_add");
	// Delete category
	Route::get("category-brand/delete/{id}","categorybrandController@delete");
	//------------
	//------------
	//list product
	Route::get("product","productController@list_product");
	// Edit product
	Route::get("product/edit/{id}","productController@edit");
	// Do edit product
	Route::post("product/edit/{id}","productController@do_edit");
	// Add product
	Route::get("product/add","productController@add");
	// Do add product
	Route::post("product/add","productController@do_add");
	// Delete product
	Route::get("product/delete/{id}","productController@delete");
	//------------
});
