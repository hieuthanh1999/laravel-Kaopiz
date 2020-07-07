@extends('Admin_layout')
@section('admin_content')
    <!-- page start-->
    <!-- page start-->
    <div class="row">
        <div class="col-lg-12">
            <section class="panel">
                <header class="panel-heading">
                    Cập Nhập Thương Hiệu Sản Phẩm
                </header>
                {{--   <?='<pre>';
                   print_r($infor);
                   ?>--}}
                <div class="panel-body">
                    <div class="position-center">

                        <form role="form" action="{{URL::to('/update_th/'.$infor['id_th'])}}" method="post">
                            @csrf
                            <div class="form-group">
                                {{--                                <input type="text" name="id" hidden="" value="{{$infor['id_dm']}}"> <br>--}}
                                <label for="exampleInputEmail1">Tên danh mục</label>
                                <input type="text" name="ten_th" class="form-control" value="{{$infor['ten_th']}}">

                            </div>
                            <div class="form-group">
                                <label for="exampleInputPassword1">Mô tả danh mục</label>
                                <textarea style="resize: none" rows="6" name="mota_th" class="form-control">{{$infor['mota_th']}}</textarea>
                            </div>

                            <button type="submit" class="btn btn-info">Cập nhập</button>
                        </form>
                        <br>
                    </div>
                </div>
            </section>
        </div>
    </div>
@endsection
