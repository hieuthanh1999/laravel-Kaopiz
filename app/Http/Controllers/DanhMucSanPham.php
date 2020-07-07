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
class DanhMucSanPham extends Controller
{
    public function add()
    {
        return view('Admin.ThemDanhMuc');
    }


    public  function save_dm(Request $request)
    {
         $data=$request->validate([
            'ten_danhmuc'=>'required',
            'mta_danhmuc'=>'required',
        ], ['required'=>'không được để trống!']);

        $add = new danhmucsp();
        $add->ten_dm = $data['ten_danhmuc'];
        $add->mota_dm = $data['mta_danhmuc'];
        $add->trangthai_dm = $request->trangthai_dm;
        $add->save();
        session()->flash('add', 'Thêm Thành Công!');

        return Redirect::to('all_product');
    }
    //in danh muc san pham

    public function all()
    {
        $all=danhmucsp::paginate(7);

        return view('Admin.HienThiDanhMuc')->with('infor',$all);
    }

    //update khi ấn vào trạng thái sản phẩm
    //Chuyển không xem được
    public  function nott($id)
    {
        danhmucsp::where('id_dm', $id)->update(['trangthai_dm'=>0]);
        session()->flash('check1', 'Tắt trạng thái thành công!');

        return Redirect::to('all_product');
    }
    //Chuyển không xem được
    public  function untt($id)
    {
        danhmucsp::where('id_dm', $id)->update(['trangthai_dm'=>1]);
        session()->flash('check2', 'Bật trạng thái thành công!');

        return Redirect::to('all_product');
    }

    //EDit
    public function edit(Request $request)
    {
        $edit=danhmucsp::where('id_dm',$request->id_dm)->first();

        return view('Admin.CapNhapDanhMuc')->with('infor', $edit);
    }
    public function update($id_dm, Request $request)
    {

        if($request->isMethod('post'))
        {
            $up= danhmucsp::where('id_dm', $request->id_dm)->first();
            $up->ten_dm = $request->ten_dm;
            $up->mota_dm = $request->mota_dm;
            $up->save();

            session()->flash('update', 'cập nhập danh mục thành công!');

            return Redirect::to('all_product');
        }

    }

    //delete
    public function delete(Request $request)
    {
        danhmucsp::where('id_dm', $request->id_dm)->delete();
        session()->flash('delete', 'Xóa danh mục Thành Công!');
        
        return back();
    }

    //show danh mục sản phẩm Home
    public function show_danh_muc($id_dm)
    {

       $danhmuc_name=danhmucsp::where('tbl_danhmucsp.id_dm', $id_dm)->limit(1)->get();     
       $danhmuc=danhmucsp::where('trangthai_dm', '1')->orderBy('id_dm','desc')->get();
       $thuonghieu=thuonghieusp::where('trangthai_th', '1')->orderBy('id_th','desc')->get();
       
       $danhmuc_id= DB::table('tbl_sanpham')->join('tbl_danhmucsp', 'tbl_sanpham.id_dm','=', 'tbl_danhmucsp.id_dm' )->where('tbl_sanpham.id_dm', $id_dm)->get();
       $resul=json_decode($danhmuc_id, true);

       return view('Pages.DanhMucSP.show-danhmuc')->with('danhmuc_name', $danhmuc_name)->with('danhmuc', $danhmuc)->with('thuonghieu', $thuonghieu)->with('resul', $resul);
   }
}
