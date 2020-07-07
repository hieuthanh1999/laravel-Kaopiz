@extends('Admin_layout')
@section('admin_content')
    <div class="table-agile-info">
        <div class="panel panel-default">
            <div class="panel-heading">
                Liệt Kê Danh Mục Sản Phẩm
            </div>
            <div class="row w3-res-tb">
                <div class="col-sm-5 m-b-xs">
                     <select class="input-sm form-control w-sm inline v-middle">
                         <option value="0">Bulk action</option>
                         <option value="1">Delete selected</option>
                         <option value="2">Bulk edit</option>
                         <option value="3">Export</option>
                     </select>
                     <button class="btn btn-sm btn-default">Apply</button>
                </div>
                <div class="col-sm-4">
                </div>
                <div class="col-sm-3">
                    <div class="input-group">
                        <input type="text" class="input-sm form-control" placeholder="Search">
                        <span class="input-group-btn">
            <button class="btn btn-sm btn-default" type="button">Go!</button>
          </span>
                    </div>
                </div>
            </div>
            <div class="table-responsive">
                @if(session()->has('add'))
                    <div class="alert alert-success">
                        {{session()->get('add')}}
                    </div>
                @endif
                @if(session()->has('update'))
                    <div class="alert alert-success">
                        {{session()->get('update')}}
                    </div>
                @endif
                @if(session()->has('delete'))
                    <div class="alert alert-success">
                        {{session()->get('delete')}}
                    </div>
                @endif
                    @if(session()->has('check1'))
                        <div class="alert alert-success">
                            {{session()->get('check1')}}
                        </div>
                    @endif
                    @if(session()->has('check2'))
                        <div class="alert alert-success">
                            {{session()->get('check2')}}
                        </div>
                    @endif
                <table class="table table-striped b-t b-light">
                    <thead>
                    <tr>
                        <th style="width:20px;">
                            <label class="i-checks m-b-none">
                                <input type="checkbox"><i></i>
                            </label>
                        </th>
                        <th>Tên danh mục</th>
                        <th>Trạng thái</th>
                        {{--<th>Mô Tả</th>--}}
                        <th>Chức năng</th>
                        <th style="width:30px;"></th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($infor as $value )
                        <tr>
                            <td><label class="i-checks m-b-none"><input type="checkbox" name="post[]"><i></i></label></td>
                            <td>{{$value['ten_dm']}}</td>
                            <td><span class="text-ellipsis">
                                  @if($value['trangthai_dm']>0)
                                        <a href="/no_tt/{{$value['id_dm']}}"><span class="fa-thumb-styling-up fa fa-eye"></span></a>
                                    @else
                                        <a href="/un_tt/{{$value['id_dm']}}"><span class="fa-thumb-styling-down fa fa-eye-slash"></span></a>
                                    @endif
                                </span></td>
                            {{--<td><span class="text-ellipsis">{{$value['mota_dm']}}</span></td>--}}
                            <td>
                                <a href="/edit/{{$value['id_dm']}}" class="active x" ui-toggle-class="">
                                    <i class="fa fa-pencil-square-o text-success text-active"></i>
                                </a>


                                <a onclick="return confirm('Xác nhận xóa?')" href="/delete/{{$value['id_dm']}}" class="active y" ui-toggle-class="">
                                    <i class="fa fa-times text-danger text"></i></a>
                            </td>
                        </tr>
                    @endforeach

                    </tbody>
                </table>
            </div> 
        </div>
        <span>{!! $infor->links() !!}</span>
    </div>
@endsection
