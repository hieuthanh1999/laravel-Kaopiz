@extends('Admin_layout')
@section('admin_content')
    <!-- page start-->
    <!-- page start-->
    <div class="row">
        <div class="col-lg-12">
            <section class="panel">
                <header class="panel-heading">
                    Cập Nhập Danh Mục Sản Phẩm
                </header>
                {{--   <?='<pre>';
                   print_r($infor);
                   ?>--}}
                <div class="panel-body">
                    <div class="position-center">

                        <form role="form" action="{{URL::to('/update_dm/'.$infor['id_dm'])}}" method="post">
                            @csrf
                            <div class="form-group">
{{--                                <input type="text" name="id" hidden="" value="{{$infor['id_dm']}}"> <br>--}}
                                <label for="exampleInputEmail1">Tên danh mục</label>
                                <input type="text" name="ten_dm" class="form-control" value="{{$infor['ten_dm']}}">

                            </div>
                            <div class="form-group">
                                <label for="exampleInputPassword1">Mô tả danh mục</label>
                                <textarea style="resize: none" rows="6" name="mota_dm" class="form-control">{{$infor['mota_dm']}}</textarea>
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
