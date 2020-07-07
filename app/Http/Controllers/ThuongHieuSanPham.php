<?php
namespace App\Http\Controllers;
use App\sanpham;
use App\danhmucsp;
use App\thuonghieusp;
use Illuminate\Http\Request;
use DB;
use Illuminate\Support\Facades\Redirect;
use Session;
session_start();
class ThuongHieuSanPham extends Controller
{
    public function add()
    {
        return view('Admin.ThemThuongHieu');
    }

    public  function store(Request $request)
    {
       $data=$request->validate([
        'ten_thuonghieu'=>'required',
        'mta_thuonghieu'=>'required',
    ], ['required'=>'không được để trống!']);

       $add = new thuonghieusp();
       $add->ten_th = $data['ten_thuonghieu'];
       $add->mota_th = $data['mta_thuonghieu'];
       $add->trangthai_th = $request->trangthai_th;
       $add->save();
       session()->flash('add', 'Thêm Thương Hiệu Thành Công!');

       return Redirect::to('all_th');
   }

    //in danh muc san pham
   public function index()
   {
    $resul=thuonghieusp::paginate(5);

    return view('Admin.HienThiThuongHieu')->with('infor', $resul);
}

    //update khi ấn vào trạng thái sản phẩm
    //Chuyển không xem được
public  function noth($id_th)
{
    thuonghieusp::where('id_th', $id_th)->update(['trangthai_th'=>0]);
    session()->flash('check1', 'Tắt trạng thái thành công!');
    return Redirect::to('all_th');
}
    //Chuyển không xem được
public  function unth($id_th)
{
    thuonghieusp::where('id_th', $id_th)->update(['trangthai_th'=>1]);
    session()->flash('check2', 'Bật trạng thái thành công!');
    return Redirect::to('all_th');
}

    //EDit
public function edit(Request $request)
{
    $edit=thuonghieusp::where('id_th',$request->id_th)->first();
    return view('Admin.CapNhapThuongHieu')->with('infor', $edit);
}
public function update($id_th, Request $request)
{
    $up= thuonghieusp::where('id_th', $request->id_th)->first();
    $up->ten_th = $request->ten_th;
    $up->mota_th = $request->mota_th;
    $up->save();
    session()->flash('update', 'Cập Nhập Thương Hiệu Thành Công!');
            //echo 'thafnhc ông';
    return Redirect::to('all_th');

}
    //delete
public function delete(Request $request)
{
    thuonghieusp::where('id_th', $request->id_th)->delete();
    session()->flash('delete', 'Xóa Thương Hiệu Thành Công!');

    return back();
}
      //show thương Hiệu sản phẩm Home
public function show_thuong_hieu($id_th)
{
    $thuonghieu_name=thuonghieusp::where('tbl_thuonghieusp.id_th', $id_th)->limit(1)->get();
    $danhmuc=danhmucsp::where('trangthai_dm', '1')->orderBy('id_dm','desc')->get();
    $thuonghieu=thuonghieusp::where('trangthai_th', '1')->orderBy('id_th','desc')->get();
    $thuonghieu_id= DB::table('tbl_sanpham')->join('tbl_thuonghieusp', 'tbl_sanpham.id_th','=', 'tbl_thuonghieusp.id_th' )->where('tbl_sanpham.id_th', $id_th)->get();

    $resul=json_decode($thuonghieu_id, true);

    return view('Pages.ThuongHieuSP.show-thuonghieu')->with('thuonghieu_name', $thuonghieu_name)->with('danhmuc', $danhmuc)->with('thuonghieu', $thuonghieu)->with('resul', $resul);
}
}
