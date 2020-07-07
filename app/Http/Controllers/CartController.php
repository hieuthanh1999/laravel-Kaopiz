<?php

namespace App\Http\Controllers;
use Cart;
use App\sanpham;
use App\danhmucsp;
use App\thuonghieusp;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use DB;
class CartController extends Controller
{
    public function save_cart(Request $request)
    {
    	$cart_id=$request->cart_id;
    	$soluong=$request->cart_nber;
    	
    	$infor=sanpham::where('id_sp', $cart_id)->first();

    	$data['id']=$infor->id_sp;
    	$data['qty']=$soluong;
    	$data['name']=$infor->ten_sp;
    	$data['price']=$infor->gia_sp;
    	$data['weight']=$infor->gia_sp;
    	$data['options']['image']=$infor->hinhanh_sp;
		
    	Cart::add($data);
    	 //Cart::destroy();
    	return Redirect::to('/show-cart');

    	//Cart::add('123', 'Product 1', 1, 9.99, 550);
    	

    	
    }
     public function show_cart()
     {
     	$danhmuc=danhmucsp::where('trangthai_dm', '1')->orderBy('id_dm','desc')->get();
        $thuonghieu=thuonghieusp::where('trangthai_th', '1')->orderBy('id_th','desc')->get();

        return view('Pages.GioHang.show_cart')->with('danhmuc', $danhmuc)->with('thuonghieu', $thuonghieu);
     }

    public function delete_cart($rowId)
    {
    	Cart::update($rowId, 0);
    	return Redirect::to('/show-cart');

    }

    public function update_cart(Request $request)
    {
        $rowId=$request->rowId_cart;
        $soluong=$request->quantity;
        Cart::update($rowId, $soluong);

        return Redirect::to('/show-cart');

    }
        
    	
}
