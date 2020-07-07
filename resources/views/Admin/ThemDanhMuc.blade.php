@extends('Admin_layout')
@section('admin_content')
<!-- page start-->
<!-- page start-->
<div class="row">
    <div class="col-lg-12">
        <section class="panel">
            <header class="panel-heading">
                Thêm Danh Mục Sản Phẩm
            </header>
            <div class="panel-body">
                <div class="position-center">
                    <form role="form" action="{{route('save_dm')}}" method="post">
                        @csrf
                        <div class="form-group">
                            <label for="exampleInputEmail1">Tên danh mục</label>
                            <input type="text" name="ten_danhmuc" class="form-control" id="exampleInputEmail1" placeholder="Nhập tên danh mục sản phẩm">
                            <span>
                                @if($errors->has('ten_danhmuc'))
                                <div class="alert alert-success">
                                    {{$errors->first('ten_danhmuc')}}
                                </div>
                                @endif
                            </span>
                        </div>
                        <div class="form-group">
                            <label for="exampleInputPassword1">Mô tả danh mục</label>
                            <textarea style="resize: none" rows="6" name="mta_danhmuc" class="form-control" id="exampleInputPassword1" placeholder="Mô tả danh mục sản phẩm"></textarea>
                            <span>
                                @if($errors->has('mta_danhmuc'))
                                <div class="alert alert-success">
                                    {{$errors->first('mta_danhmuc')}}
                                </div>
                                @endif
                            </span>
                        </div>
                        <div class="form-group">
                            <label for="exampleInputPassword1">Hiển thị</label>
                            <select name="trangthai_dm" class="form-control input-sm m-bot15">
                                <option value="0">Ẩn</option>
                                <option value="1">Hiển thị</option>
                            </select>
                        </div>

                        <button type="submit" name="them_danhmuc" class="btn btn-info">Thêm</button>
                    </form>
                    <br>
                </div>

            </div>
        </section>
    </div>
</div>
@endsection
