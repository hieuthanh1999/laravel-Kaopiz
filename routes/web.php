<?php

use Illuminate\Support\Facades\Route;

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
//Font-End
Route::get('/','HomeController@index');
Route::get('/trang-chu','HomeController@index');
//tim kiem
Route::post('/tim-kiem','HomeController@tim_kiem');


//DanhMuc SanPham
Route::get('/danh-muc-san-pham/{id_dm}','DanhMucSanPham@show_danh_muc');
//Thuong Hieu San pham
Route::get('/thuong-hieu-san-pham/{id_th}','ThuongHieuSanPham@show_thuong_hieu');
//Chi Tiết Sản phẩm
Route::get('/chi-tiet-san-pham/{id_sp}','SanPhamController@details_product');



// giỏ hàng

//luu 
Route::post('/save-cart','CartController@save_cart');
//show cart
Route::get('/show-cart','CartController@show_cart');
Route::get('/delete-cart/{row_Id}','CartController@delete_cart');
//luu thay doi 
Route::post('/update-cart','CartController@update_cart')->name("update_cart");




//Check out

Route::get('/login-checkout','checkoutController@login_checkout');
Route::post('/add-customer','checkoutController@add_customer');

//thanh toan
Route::get('/check-out','checkoutController@check_out');
Route::post('/save-shiping','checkoutController@save_shiping');
Route::get('/pay-ment','checkoutController@pay_ment');
//đăng xuất
Route::get('/logout-checkout','checkoutController@logout_checkout');
//đăng nhập khách hàng
Route::post('/login-customer','checkoutController@login_customer');
//Thanh toan
Route::get('/pay-ment','checkoutController@pay_ment'); 
//hinhthuc
Route::post('/hinh-thuc','checkoutController@hinh_thuc');


//Back-End

//1-ADMINLOGIN
Route::get('/login', 'Admincontroller@index')->name('login');
// Route::middleware('auth')->group(function(){

	
	Route::get('/quantriAdmin', 'Admincontroller@showAdmin');
	Route::post('quantri_admin','Admincontroller@checkadmin');
//logout
	Route::get('/logout', 'Admincontroller@checklogout');

// Danh Mục Sản Phẩm
//begin
	Route::get('/add_product', 'DanhMucSanPham@add');
	Route::get('/all_product', 'DanhMucSanPham@all');

//Trạng thái danh mục
	Route::get('no_tt/{id_dm}','DanhMucSanPham@nott');
	Route::get('un_tt/{id_dm}','DanhMucSanPham@untt');

//Thêm Danh Mục
	Route::post('/save_dm', 'DanhMucSanPham@save_dm')->name("save_dm");

// Cập Nhập Danh Mục
	Route::get('/edit/{id_dm}','DanhMucSanPham@edit');
	Route::post('/update_dm/{id_dm}','DanhMucSanPham@update')->name('update_dm');

// Xóa Danh mục
	Route::get('/delete/{id_dm}','DanhMucSanPham@delete');
//end

// Thương Hiệu Sản Phẩm
//begin
	Route::get('/add_th', 'ThuongHieuSanPham@add');
	Route::get('/all_th', 'ThuongHieuSanPham@index');

//sửa hiển thị
	Route::get('no_th/{id_th}','ThuongHieuSanPham@noth');
	Route::get('un_th/{id_th}','ThuongHieuSanPham@unth');

// Thêm thương Hiệu
	Route::post('/save_th', 'ThuongHieuSanPham@store')->name("save_th");

//cập nhập thương hiệu
	Route::get('/edit_th/{id_th}','ThuongHieuSanPham@edit');
	Route::post('/update_th/{id_th}','ThuongHieuSanPham@update')->name('update_th');

//delete thương hiệu
	Route::get('/delete_th/{id_th}','ThuongHieuSanPham@delete');
//end


// Sản phẩm
//begin
	Route::get('/add_sp', 'SanPhamController@add');
	Route::get('/all_sp', 'SanPhamController@all');

//sửa hiển thị
	Route::get('no_sp/{id_sp}','SanPhamController@nosp');
	Route::get('un_sp/{id_sp}','SanPhamController@unsp');

// Thêm  Sản phẩm
	Route::post('/save_sp', 'SanPhamController@store')->name("save_sp");

//cập nhập  Sản phẩm
	Route::get('/edit_sp/{id_sp}','SanPhamController@edit');
	Route::post('/update_sp/{id_sp}','SanPhamController@update')->name('update');

//delete  Sản phẩm
	Route::get('/delete_sp/{id_sp}','SanPhamController@delete');
//end

// });
