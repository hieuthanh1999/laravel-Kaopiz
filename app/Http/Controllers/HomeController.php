<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\sanpham;
use App\danhmucsp;
use App\thuonghieusp;
class HomeController extends Controller
{
    public function index()
    {

    	$danhmuc=danhmucsp::where('trangthai_dm', '1')->orderBy('id_dm','desc')->get();
    	$thuonghieu=thuonghieusp::where('trangthai_th', '1')->orderBy('id_th','desc')->get();
    	$sanpham=sanpham::where('trangthai_sp', '1')->orderBy('id_sp','desc')->limit(6)->get();
    	
    	return view('Pages.trangchu')->with('danhmuc', $danhmuc)->with('thuonghieu', $thuonghieu)->with('sanpham', $sanpham);
    }

     public function tim_kiem(Request $request)
    {
    	$key=$request->key_work;

    	$danhmuc=danhmucsp::where('trangthai_dm', '1')->orderBy('id_dm','desc')->get();
    	$thuonghieu=thuonghieusp::where('trangthai_th', '1')->orderBy('id_th','desc')->get();
        $timkiem=sanpham::where('ten_sp', 'like' ,'%'.$key.'%')->get();
    	
    	return view('Pages.SanPham.timkiem')->with('danhmuc', $danhmuc)->with('thuonghieu', $thuonghieu)->with('timkiem',  $timkiem);
    }
}
