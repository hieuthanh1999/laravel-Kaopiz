@extends('Admin_layout')
@section('admin_content')
<!-- page start-->
<!-- page start-->
<div class="row">
    <div class="col-lg-12">
        <section class="panel">
            <header class="panel-heading">
                Thêm Sản Phẩm
            </header>
            <div class="panel-body">
                <div class="position-center">
                    <form role="form" action="{{route('save_sp')}}" method="post" enctype="multipart/form-data">
                        @csrf
                        <div class="form-group">
                            <label for="exampleInputEmail1">Tên sản phẩm</label>
                            <input type="text" name="ten_sanpham" class="form-control" id="" placeholder="Nhập tên sản phẩm">
                            <span>
                                @if($errors->has('ten_sanpham'))
                                <div class="alert alert-success">
                                    {{$errors->first('ten_sanpham')}}
                                </div>
                                @endif
                            </span>
                        </div>
                        <div class="form-group">
                            <label for="exampleInputEmail1">Giá sản phẩm</label>
                            <input type="text" name="gia_sanpham" class="form-control" id="" placeholder="Nhập giá sản phẩm">
                            <span>
                                @if($errors->has('gia_sanpham'))
                                <div class="alert alert-success">
                                    {{$errors->first('gia_sanpham')}}
                                </div>
                                @endif
                            </span>
                        </div>
                        <div class="form-group">
                            <label for="exampleInputEmail1">Hình ảnh sản phẩm</label>
                            <input type="file" name="hinhanh_sanpham" class="form-control" id="">
                            
                        </div>

                        <div class="form-group">
                            <label for="exampleInputPassword1">Mô tả sản phẩm</label>
                            <textarea style="resize: none" rows="6" name="mota_sanpham" class="form-control" id="" placeholder="Mô tả sản phẩm"></textarea>
                            <span>
                                @if($errors->has('mota_sanpham'))
                                <div class="alert alert-success">
                                    {{$errors->first('mota_sanpham')}}
                                </div>
                                @endif
                            </span>
                        </div>
                        <div class="form-group">
                            <label for="exampleInputPassword1">Nội dung sản phẩm</label>
                            <textarea style="resize: none" rows="6" name="noidung_sanpham" class="form-control" id="" placeholder="Mô tả sản phẩm"></textarea>
                            <span>
                                @if($errors->has('noidung_sanpham'))
                                <div class="alert alert-success">
                                    {{$errors->first('noidung_sanpham')}}
                                </div>
                                @endif
                            </span>
                        </div>
                        <div class="form-group">
                            <label for="exampleInputPassword1">Danh mục</label>
                            <select name="danh_muc_sp" class="form-control input-sm m-bot15">
                                @foreach($danh_muc as $value)
                                <option value="{{$value['id_dm']}}">{{$value['ten_dm']}}</option>
                                @endforeach
                            </select>
                            
                        </div>
                        <div class="form-group">
                            <label for="exampleInputPassword1">Thương hiệu</label>
                            <select name="thuong_hieu_sp" class="form-control input-sm m-bot15">
                                @foreach($thuong_hieu as $value)
                                <option value="{{$value['id_th']}}">{{$value['ten_th']}}</option>
                                @endforeach
                            </select>

                        </div>
                        <div class="form-group">
                            <label for="exampleInputPassword1">Trạng Thái</label>
                            <select name="trangthai_sanpham" class="form-control input-sm m-bot15">
                                <option value="0">Ẩn</option>
                                <option value="1">Hiển thị</option>
                            </select>
                        </div>

                        <button type="submit" name="them_sanpham" class="btn btn-info">Thêm</button>
                    </form>
                    <br>
                </div>

            </div>
        </section>
    </div>
</div>
@endsection
