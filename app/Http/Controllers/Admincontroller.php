<?php

namespace App\Http\Controllers;
use DB;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;
use Session;

session_start();
class Admincontroller extends Controller
{
    public function index()
    {
    	return view('AdminLogin');
    }
    public  function showAdmin()
    {
        return view('Admin.quantriadmin');
    }
    //check login
    public  function checkadmin(Request $request)
    {
       $email=$request->admin_email;
       $pass=md5($request->admin_password);
       $resul=DB::table('tbl_admin')->where('admin_email', $email)->where('admin_password', $pass)->first();
       /*echo '<pre>';
       print_r($resul);*/
//
        if($resul)
        {
           $name=Session::put('admin_name', $resul->admin_name);
           $id=Session::put('admin_id', $resul->admin_id);
            return view('Admin.quantriadmin',compact('name', 'id'));
        }
        else {
           $mess=Session::put('message', 'mật khẩu hoặc tài khoản sai. Yêu cầu nhập lại!');
          return view('AdminLogin',['message'=>$mess]);
        }
    }
    //check logout
    public  function checklogout()
    {
        Session::put('admin_name', null);
        Session::put('admin_id', null);
        return view('AdminLogin');
      //  return back();
    }
}
