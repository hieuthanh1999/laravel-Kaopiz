@extends('welcome')
@section('content')
                 <div class="features_items"><!--features_items-->
                     @foreach($danhmuc_name as $value)
                            <h2 class="title text-center">{{$value['ten_dm']}}</h2>
                     @endforeach
                    
                  
                    @foreach($resul as $value)
                        <a href="{{asset('/chi-tiet-san-pham/'.$value['id_sp'])}}">
                        <div class="col-sm-4">
                        <div class="product-image-wrapper">
                            <div class="single-products">
                                <div class="productinfo text-center">
                                    <img src="{{asset('/update_img/product/'.$value['hinhanh_sp'])}}" alt="" />
                                    <h2> {{number_format($value['gia_sp']).' '.'VND'}} </h2>
                                    <p> {{$value['ten_sp']}} </p>
                                    <a href="#" class="btn btn-default add-to-cart"><i class="fa fa-shopping-cart"></i>Thêm vào giỏ</a>
                                </div>
                              <!--   <div class="product-overlay">
                                    <div class="overlay-content">
                                        <h2> {{number_format($value['gia_sp']).' '.'VND'}} </h2>
                                        <p> {{$value['ten_sp']}} </p>
                                        <a href="#" class="btn btn-default add-to-cart"><i class="fa fa-shopping-cart"></i>Thêm vào giỏ</a>
                                    </div>
                                </div> -->
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