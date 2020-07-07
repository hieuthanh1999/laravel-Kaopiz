@extends('Admin_layout')
@section('admin_content')
<!-- page start-->
<!-- page start-->
<div class="row">
    <div class="col-lg-12">
        <section class="panel">
            <header class="panel-heading">
                Thêm Thương Hiệu Sản Phẩm
            </header>
            <div class="panel-body">
                <div class="position-center">
                    <form role="form" action="{{route('save_th')}}" method="post">
                        @csrf
                        <div class="form-group">
                            <label for="exampleInputEmail1">Tên thươnghiệu</label>
                            <input type="text" name="ten_thuonghieu" class="form-control" id="exampleInputEmail1" placeholder="Nhập tên thương hiệu sản phẩm">
                            <span>
                                @if($errors->has('ten_thuonghieu'))
                                <div class="alert alert-success">
                                    {{$errors->first('ten_thuonghieu')}}
                                </div>
                                @endif
                            </span>
                        </div>
                        <div class="form-group">
                            <label for="exampleInputPassword1">Mô tả thương hiệu</label>
                            <textarea style="resize: none" rows="6" name="mta_thuonghieu" class="form-control" id="exampleInputPassword1" placeholder="Mô tả thương hiệu sản phẩm"></textarea>
                            <span>
                                @if($errors->has('mta_thuonghieu'))
                                <div class="alert alert-success">
                                    {{$errors->first('mta_thuonghieu')}}
                                </div>
                                @endif
                            </span>
                        </div>
                        <div class="form-group">
                            <label for="exampleInputPassword1">Hiển thị</label>
                            <select name="trangthai_th" class="form-control input-sm m-bot15">
                                <option value="0">Ẩn</option>
                                <option value="1">Hiển thị</option>
                            </select>
                        </div>

                        <button type="submit" name="them_thuonghieu" class="btn btn-info">Thêm</button>
                    </form>
                    <br>
                </div>

            </div>
        </section>
    </div>
</div>
@endsection
