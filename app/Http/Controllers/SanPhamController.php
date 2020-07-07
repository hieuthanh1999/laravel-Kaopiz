<?php

namespace App\Http\Controllers;

use App\sanpham;
use App\danhmucsp;
use App\thuonghieusp;
use Session;
use DB;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Http\Request;

session_start();
class SanPhamController extends Controller
{
    public function add()
    {
        $danh_muc=danhmucsp::all();
        $thuong_hieu=thuonghieusp::all();
        return view('Admin.ThemSanPham')->with('danh_muc', $danh_muc)->with('thuong_hieu', $thuong_hieu);
    }


    public  function store(Request $request)
    {
        $data=$request->validate([
            'ten_sanpham'=>'required',
            'gia_sanpham'=>'required',
            'mota_sanpham'=>'required',
            'noidung_sanpham'=>'required',
        ], ['required'=>'không được để trống!']);
        $get_img=$request->file('hinhanh_sanpham');
        if($get_img) {

            $add = new sanpham();

            $get_name= $get_img->getClientOriginalName();
            $name_img=current(explode('.', $get_name));     // $get_img.rand(0, 99)
            $new_img=  $name_img.'.'.$get_img->getClientOriginalExtension();
            $get_img->move('update_img/product', $new_img);


            $add->ten_sp = $data['ten_sanpham'];
            $add->mota_sp = $data['mota_sanpham'];
            $add->noidung_sp = $data['noidung_sanpham'];
            $add->gia_sp = $data['gia_sanpham'];
            $add->hinhanh_sp = $new_img;
            $add->id_dm =$request ->danh_muc_sp;
            $add->id_th = $request->thuong_hieu_sp;
            $add->trangthai_sp =  $request->trangthai_sanpham;
            $add->save();
            session()->flash('add', 'Thêm Sản Phẩm Thành Công!');
            return Redirect::to('all_sp');
        }
    }
    //in danh muc san pham

    public function all()
    {
        $danh_muc=danhmucsp::all();
        $thuong_hieu=thuonghieusp::all();
        $san_pham=sanpham::paginate(5);
          
        return view('Admin.HienThiSanPham')->with('san_pham', $san_pham)->with('danh_muc', $danh_muc)->with('thuong_hieu', $thuong_hieu);

    }

    //update khi ấn vào trạng thái sản phẩm
    //Chuyển không xem được
    public  function nosp($id)
    {
        sanpham::where('id_sp', $id)->update(['trangthai_sp'=>0]);
        session()->flash('check1', 'Tắt trạng thái thành công!');
        return Redirect::to('all_sp');
    }
    //Chuyển không xem được
    public  function unsp($id)
    {
        sanpham::where('id_sp', $id)->update(['trangthai_sp'=>1]);
        session()->flash('check2', 'Bật trạng thái thành công!');
        return Redirect::to('all_sp');
    }

    //EDit
    public function edit($id_sp)
    {
        $sanpham=sanpham::where('id_sp',$id_sp)->orderBy('id_sp', 'desc')->first();
        $danhmuc=danhmucsp::orderBy('id_dm', 'desc')->get();
        $thuonghieu=thuonghieusp::orderBy('id_th', 'desc')->get();
        return view('Admin.CapNhapSanPham')->with('sanpham', $sanpham)->with('danhmuc', $danhmuc)                               ->with('thuonghieu', $thuonghieu);
    }
    public function update($id_sp, Request $request)
    {
        $up= sanpham::where('id_sp', $request->id_sp)->first();
        $get_img=$request->file('hinhanh_sanpham');

        if($get_img) {

            $get_name= $get_img->getClientOriginalName();
                $name_img=current(explode('.', $get_name));     // $get_img.rand(0, 99)
                $new_img=  $name_img.'.'.$get_img->getClientOriginalExtension();
                $get_img->move('update_img/product', $new_img);

                $up->ten_sp = $request->ten_sanpham;
                $up->gia_sp = $request->gia_sanpham;
                $up->mota_sp = $request->mota_sanpham;
                $up->noidung_sp = $request->noidung_sanpham;
                $up->hinhanh_sp = $new_img;
                $up->id_dm=$request->danhmuc_sp;
                $up->id_th=$request->thuonghieu_sp;

                $up->save();

                session()->flash('add', 'Cập Nhập Sản Phẩm Thành Công!');

                return Redirect::to('all_sp');
            }
            return Redirect::to('all_sp');
        }

    //delete
        public function delete(Request $request)
        {
            sanpham::where('id_sp', $request->id_sp)->delete();
            session()->flash('delete', 'Xóa Sản Phẩm Thành Công!');
            return back();
        }


    //// Font_end
        public function details_product($id_sp)
        {

            $danhmuc=danhmucsp::where('trangthai_dm', '1')->orderBy('id_dm','desc')->get();
            $thuonghieu=thuonghieusp::where('trangthai_th', '1')->orderBy('id_th','desc')->get();
        //$sanpham=sanpham::where('trangthai_sp', '1')->orderBy('id_sp','desc')->limit(6)->get();
            $detail= DB::table('tbl_sanpham')->join('tbl_danhmucsp','tbl_sanpham.id_dm','=','tbl_danhmucsp.id_dm')
            ->join('tbl_thuonghieusp',  'tbl_sanpham.id_th', '=', 'tbl_thuonghieusp.id_th')->where("id_sp", $id_sp)->get();
            $details=json_decode($detail, true);

        //Sản Phẩm Liên quan
            foreach($detail as $value) {
                $id_lqdm= $value->id_dm;
            }
            $sp_lq= DB::table('tbl_sanpham')->join('tbl_danhmucsp','tbl_sanpham.id_dm','=','tbl_danhmucsp.id_dm')
            ->join('tbl_thuonghieusp',  'tbl_sanpham.id_th', '=', 'tbl_thuonghieusp.id_th')->where("tbl_danhmucsp.id_dm", $id_lqdm)->whereNotIn('tbl_sanpham.id_sp',[$id_sp] )->get();  
           // dd($sp_lienquan);
            //dd($details);
            $sp_lienquan=json_decode($sp_lq, true);
            return view('Pages.SanPham.chitiet_sanpham')->with('danhmuc', $danhmuc)->with('thuonghieu', $thuonghieu)->with('details', $details)->with('sp_lienquan', $sp_lienquan);
        }
    }
