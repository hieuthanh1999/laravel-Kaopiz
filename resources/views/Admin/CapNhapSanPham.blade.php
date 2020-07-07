@extends('Admin_layout')
@section('admin_content')
    <!-- page start-->
    <!-- page start-->
    <div class="row">
        <div class="col-lg-12">
            <section class="panel">
                <header class="panel-heading">
                   Cập Nhập Sản Phẩm
                </header>
                <div class="panel-body">
                    <div class="position-center">
                        <form role="form" action="{{asset('/update_sp/'.$sanpham['id_sp'])}}" method="post" enctype="multipart/form-data">
                            @csrf
                            <div class="form-group">
                                <label for="exampleInputEmail1">Tên sản phẩm</label>
                                <input type="text" name="ten_sanpham" class="form-control" id="" value="{{$sanpham['ten_sp']}}">
                            </div>
                            <div class="form-group">
                                <label for="exampleInputEmail1">Giá sản phẩm</label>
                                <input type="text" name="gia_sanpham" class="form-control" id="" value="{{$sanpham['gia_sp']}}">
                            </div>
                            <div class="form-group">
                                <label for="exampleInputEmail1">Hình ảnh sản phẩm</label>
                                <input type="file" name="hinhanh_sanpham" class="form-control" id="">
                                <img style="margin: 10px;" height="200" width="200" src="{{asset('update_img/product/'.$sanpham['hinhanh_sp'])}}" alt="" />
                            </div>

                            <div class="form-group">
                                <label for="exampleInputPassword1">Mô tả sản phẩm</label>
                                <textarea style="resize: none" rows="6" name="mota_sanpham" class="form-control" id="" value="" >{{$sanpham['mota_sp']}}</textarea>
                            </div>
                            <div class="form-group" >
                                <label for="exampleInputPassword1">Nội dung sản phẩm</label>
                                <textarea style="resize: none" rows="6" name="noidung_sanpham" class="form-control" id="" value="">{{$sanpham['noidung_sp']}}</textarea>
                            </div>
                            <div class="form-group">
                                <label for="exampleInputPassword1">Danh mục</label>
                                <select name="danhmuc_sp" class="form-control input-sm m-bot15">
                                    @foreach($danhmuc as $value)
                                        @if($sanpham['id_dm'] == $value['id_dm'])
                                            <option selected  value="{{$value['id_dm']}}">{{$value['ten_dm']}}</option>
                                        @else     
                                            <option value="{{$value['id_dm']}}">{{$value['ten_dm']}}</option>
                                        @endif
                                    @endforeach
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="exampleInputPassword1">Thương hiệu</label>
                                <select name="thuonghieu_sp" class="form-control input-sm m-bot15">
                                    @foreach($thuonghieu as $value)
                                        @if($sanpham['id_th'] == $value['id_th'])
                                           <option selected value="{{$value['id_th']}}">{{$value['ten_th']}}</option>
                                        @else     
                                           <option value="{{$value['id_th']}}">{{$value['ten_th']}}</option>
                                        @endif
                                        
                                    @endforeach
                                </select>
                            </div>
                       

                            <button type="submit" name="them_sanpham" class="btn btn-info">Cập nhập</button>
                        </form>
                        <br>
                    </div>

                </div>
            </section>
        </div>
    </div>
@endsection
