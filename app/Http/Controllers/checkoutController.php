<?php

namespace App\Http\Controllers;
use App\sanpham;
use App\danhmucsp;
use App\thuonghieusp;
use App\khachhang;
use App\shipping;
use App\payment;
use App\order;
use App\order_detail;
use Illuminate\Http\Request;
use Session;
use DB;
use Cart;
use Illuminate\Support\Facades\Redirect;

session_start();
class checkoutController extends Controller
{
	public function login_checkout()
	{

		$danhmuc=danhmucsp::where('trangthai_dm', '1')->orderBy('id_dm','desc')->get();
		$thuonghieu=thuonghieusp::where('trangthai_th', '1')->orderBy('id_th','desc')->get();

		return view('Pages.Checkout.login_checkout')->with('danhmuc', $danhmuc)->with('thuonghieu', $thuonghieu);
	}
	public function add_customer(Request $request)
	{
		//echo('xin chào');
		$data=$request->validate([
			'custo_name'=>'required|min:6',
			'custo_email'=>'required|email',
			'custo_phone'=>'required',
			'custo_password'=>'required|min:6',
		], ['required'=>'không được để trống!',
		'min'=>'tối thiểu 6 kí tự!'
	]);

		$add= new khachhang();
		$add->custo_name=$data['custo_name'];
		$add->custo_email=$data['custo_email'];
		$add->custo_phone=$data['custo_phone'];
		$add->custo_password=md5($data['custo_password']);
		$add->save();
		// session()->flash('add', 'Thêm Sản Phẩm Thành Công!');
		$custo_id=khachhang::first();
		Session::put('custo_id', $custo_id);
		Session::put('custo_name', $data['custo_name']);

		return Redirect::to('/check-out');
	}
	public function check_out()
	{
		$danhmuc=danhmucsp::where('trangthai_dm', '1')->orderBy('id_dm','desc')->get();
		$thuonghieu=thuonghieusp::where('trangthai_th', '1')->orderBy('id_th','desc')->get();

		return view('Pages.Checkout.check_out')->with('danhmuc', $danhmuc)->with('thuonghieu', $thuonghieu);
	}

	public function save_shiping(Request $request)
	{
		//echo('xin chào');
		$data=$request->validate([
			'ship_name'=>'required|min:6',
			'ship_email'=>'required|email',
			'ship_phone'=>'required',
			'ship_address'=>'required|min:6',
			'ship_note'=>'required|min:6',
		], ['required'=>'không được để trống!',
		'min'=>'tối thiểu 6 kí tự!'
	]);

		$add= new shipping();
		$add->ship_name=$data['ship_name'];
		$add->ship_email=$data['ship_email'];
		$add->ship_phone=$data['ship_phone'];
		$add->ship_address=$data['ship_address'];
		$add->ship_note=$data['ship_note'];
		$add->save();
		//session()->flash('add', 'Thêm Đơn Hàng Thành Công!');

		$id=$add->ship_id;
		Session::put('ship_id', $id);

		return Redirect::to('/pay-ment');
	}

	public function pay_ment()
	{
		$danhmuc=danhmucsp::where('trangthai_dm', '1')->orderBy('id_dm','desc')->get();
		$thuonghieu=thuonghieusp::where('trangthai_th', '1')->orderBy('id_th','desc')->get();

		return view('Pages.Checkout.payment')->with('danhmuc', $danhmuc)->with('thuonghieu', $thuonghieu);
	}

	public function logout_checkout()
	{
		Session::flush();
		return Redirect::to('/login-checkout');
	}

	public function login_customer(Request $request)
	{

		$email=$request->email_customer;
		$pass=md5($request->pass_customer);
			//echo($email.$pass);
		$check=khachhang::where('custo_email', $email)->where( 'custo_password', $pass)->first();
		
		if($check) {
			Session::put('custo_id', $check->custo_id);
			return Redirect::to('/check-out');
		}
		else  return Redirect::to('/login-checkout');

	}


	public function hinh_thuc(Request $request)
	{
		// $content=Cart::Content();
		// echo($content);
		lay hinh thuc thanh toan
		$add_payment=new payment();
		$add_payment->payment_method=$request->payment_options;
		$add_payment->payment_status='đang xử lý';
		$add_payment->save();
		$payment_id=$add_payment->payment_id;

		$add_order= new order();
		$add_order->custo_id=Session::get('custo_id');
		$add_order->ship_id=Session::get('ship_id');
		$add_order->payment_id=$payment_id;
		$add_order->order_total=Cart::total();
		$add_order->order_status='đang xử lý';
		$add->save();
		$order_id=$add_order->order_id;

		foreach ($content as $value) {
			$add_order_detail= new order_detail();
			$add_order_detail->order_id=$order_id;
			$add_order_detail->product_id=$value->id;
			$add_order_detail->product_name=$value->name;
			$add_order_detail->product_price=$value->price;
			$add_order_detail->product_sale_quantity=$value->qty;
			$add_order_detail->save();

		}
		

		

		return Redirect::to('/pay-ment');
	}

}
