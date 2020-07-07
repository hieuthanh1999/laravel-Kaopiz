@extends('welcome')
@section('content')
<div class="features_items"><!--features_items-->
    <h2 class="title text-center">Kết quả tìm kiếm</h2>
    @foreach($timkiem as $value)
    <a href="{{asset('/chi-tiet-san-pham/'.$value['id_sp'])}}">
        <div class="col-sm-4">
            <div class="product-image-wrapper">
                <div class="single-products">
                    <div class="productinfo text-center">
                        <form action="{{asset('save-cart')}}" method="Post">
                            @csrf
                            <img src="{{asset('update_img/product/'.$value['hinhanh_sp'])}}" alt="" />
                            <h2>{{number_format($value['gia_sp']).' '.'VND'}}</h2>
                            <p>{{$value['ten_sp']}}</p>
                            <input aria-label="quantity" class="input-qty" name="cart_nber" type="hidden" min="1" max="10000" value="1">
                            <input  hidden="" name="cart_id" type="text" value="{{$value['id_sp']}}">
                            <input type="submit" name="" value="Thêm vào giỏ"  class="btn btn-default add-to-cart">
                        </form>
                    </div>
                            </div>
                            <div class="choose">
                                <ul class="nav nav-pills nav-justified">
                                    <li><a href="#"><i class="fa fa-plus-square"></i>Yêu Thích</a></li>
                                    <li><a href="#"><i class="fa fa-plus-square"></i>So Sánh</a></li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </a>
                @endforeach
            </div><!--features_items-->
            @endsection