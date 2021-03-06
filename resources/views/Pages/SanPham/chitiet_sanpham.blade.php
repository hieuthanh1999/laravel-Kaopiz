@extends('welcome')
@section('content')

@foreach($details as $value)

<div class="product-details"><!--product-details-->
	<div class="col-sm-5">
		<div class="view-product">
			<img src="{{asset('update_img/product/'.$value['hinhanh_sp'])}}" alt="" />
			<!-- <h3>ZOOM</h3> -->
		</div>
		<div id="similar-product" class="carousel slide" data-ride="carousel">

			<!-- Wrapper for slides -->
			<div class="carousel-inner">
				<!-- <div class="item active">
					<a href=""><img src="{{asset('update_img/product/'.$value['hinhanh_sp'])}}" alt=""></a>
					<a href=""><img src="{{asset('update_img/product/'.$value['hinhanh_sp'])}}" alt=""></a>
					<a href=""><img src="{{asset('update_img/product/'.$value['hinhanh_sp'])}}" alt=""></a>
				</div>
			-->
		</div>

		<!-- Controls -->
		<a class="left item-control" href="#similar-product" data-slide="prev">
			<i class="fa fa-angle-left"></i>
		</a>
		<a class="right item-control" href="#similar-product" data-slide="next">
			<i class="fa fa-angle-right"></i>
		</a>
	</div>

</div>
<div class="col-sm-7">
	<div class="product-information"><!--/product-information-->
		<img src="images/product-details/new.jpg" class="newarrival" alt="" />
		<h2>{{$value['ten_sp']}}</h2>
		<p>Mã sản phẩm: {{$value['id_sp']}}</p>
		<!-- <img src="images/product-details/rating.png" alt="" /> -->
		<form action="{{asset('save-cart')}}" method="Post">
			@csrf
		<span>
			<span>{{number_format($value['gia_sp']).' '.'VND'}}</span>
		</br>
			<div class="buttons_added">
				<input class="minus is-form" type="button" value="-">
				<input aria-label="quantity" class="input-qty" name="cart_nber" type="number" min="1" max="10000" value="1">
				<input  hidden="" name="cart_id" type="text" value="{{$value['id_sp']}}">
				</br>
				<input class="plus is-form" type="button" value="+">
			</div>
			<button type="Submit" class="btn btn-fefault cart">
				<i class="fa fa-shopping-cart"></i>
				Thêm Giỏ Hàng
			</button>
		</span>
		</form>
		<p><b>Tình trạng:</b> còn hàng</p>
		<p><b>Điều kiện:</b> Mới</p>
		<p><b>Thương hiệu:</b>{{$value['ten_th']}}</p>
		<a href=""><img src="images/product-details/share.png" class="share img-responsive"  alt="" /></a>
	</div><!--/product-information-->
</div>
</div><!--/product-details-->

<div class="category-tab shop-details-tab"><!--category-tab-->
	<div class="col-sm-12">
		<ul class="nav nav-tabs">
			<li class="active"><a href="#details" data-toggle="tab">Mô Tả Sản Phẩm</a></li>
			<li><a href="#companyprofile" data-toggle="tab">Tổng Quan Sản Phẩm</a></li>
			<li ><a href="#reviews" data-toggle="tab">Đánh Giá</a></li>
		</ul>
	</div>
	<div class="tab-content">
		<div class="tab-pane fade active in " id="details" >
			<p style="padding-left: 10px; ">{!! $value['mota_sp'] !!}</p>
		</div>

		<div class="tab-pane fade" id="companyprofile" >
			<p style="padding-left: 10px; ">{!! $value['noidung_sp'] !!}</p>
		</div>

		<div class="tab-pane fade" id="reviews" >
			<div class="col-sm-12">
				<ul>
					<li><a href=""><i class="fa fa-user"></i>EUGEN</a></li>
					<li><a href=""><i class="fa fa-clock-o"></i>12:41 PM</a></li>
					<li><a href=""><i class="fa fa-calendar-o"></i>31 DEC 2014</a></li>
				</ul>
				<p><b>Write Your Review</b></p>

				<form action="#">
					<span>
						<input type="text" placeholder="Your Name"/>
						<input type="email" placeholder="Email Address"/>
					</span>
					<textarea name="" ></textarea>
					<b>Rating: </b> <img src="images/product-details/rating.png" alt="" />
					<button type="button" class="btn btn-default pull-right">
						Submit
					</button>
				</form>
			</div>
		</div>

	</div>
</div><!--/category-tab-->
@endforeach
<div class="recommended_items"><!--recommended_items-->
	<h2 class="title text-center">Sản Phẩm Liên Quan</h2>

	<div id="recommended-item-carousel" class="carousel slide" data-ride="carousel">
		<div class="carousel-inner">
			<div class="item active">
			@foreach($sp_lienquan as $value)	
				<div class="col-sm-4">
					<div class="product-image-wrapper">
						<div class="single-products">
							<div class="productinfo text-center">
								<img src="{{asset('update_img/product/'.$value['hinhanh_sp'])}}" alt="" />
								<h2>{{number_format($value['gia_sp']).' '.'VND'}}</h2>
								<p>{{$value['ten_sp']}}</p>
								<button type="button" class="btn btn-default add-to-cart"><i class="fa fa-shopping-cart"></i>Thêm Giỏ Hàng</button>
							</div>
						</div>
					</div>
				</div>
				
		@endforeach

			</div>
		</div>
		<a class="left recommended-item-control" href="#recommended-item-carousel" data-slide="prev">
			<i class="fa fa-angle-left"></i>
		</a>
		<a class="right recommended-item-control" href="#recommended-item-carousel" data-slide="next">
			<i class="fa fa-angle-right"></i>
		</a>			
	</div>
</div><!--/recommended_items-->
@endsection