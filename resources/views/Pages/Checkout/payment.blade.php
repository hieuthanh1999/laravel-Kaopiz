@extends('welcome')
@section('content')
<section id="cart_items">
	<div class="container">
		<div class="breadcrumbs">
			<ol class="breadcrumb">
				<li><a href="{{asset('/')}}">Trang Chủ</a></li>
				<li class="active">Thanh toán của bạn</li>
			</ol>
		</div>

		
	<div class="review-payment">
		<h4 style="margin-bottom: 30px;">Xem lại giỏ hàng</h4>
	</div>

	
	<div  class="table-responsive cart_info">
			<?php
			$content=Cart::Content();

			?>
			<table  class="table table-condensed">
				<thead>
					<tr class="cart_menu">
						<td class="image">Hình ảnh sản phẩm</td>
						<td class="description">Mô tả</td>
						<td class="price">Giá</td>
						<td class="quantity">Số lượng</td>
						<td class="total">Tổng tiền</td>
						<td></td>
					</tr>
				</thead>
				@foreach($content as $value)
				<tbody>
					<tr>
						<td class="cart_product">
							<a href=""><img src="{{asset('/update_img/product/'.$value->options->image)}}" width="100" alt=""></a>
						</td>
						<td class="cart_description">
							<h4>{{$value->name}}</h4>
							<p>ID:{{$value->id}}</p>
						</td>
						<td class="cart_price">
							<p>{{number_format($value->price).' '.'VND'}}</p>
						</td>
						<td class="cart_quantity">
							<div class="cart_quantity_button">
								<form action="{{URL::to('/update-cart')}}" method="Post">
									@csrf
									<input width="50px;" class="cart_quantity_input" type="text" name="quantity" value="{{$value->qty}}">
									<input type="hidden" value="{{$value->rowId}}" name="rowId_cart" class="form-control">

									<input style="margin-left: 15px;" type="submit" value="Cập nhập" name="update-cart" class="btn btn-default btn-sm">
								</form>
							</div>
						</td>
						<td class="cart_total">
							<p class="cart_total_price">
								<?=
								number_format($value->price * $value->qty).' '.'VND';
								?></p>
							</td>
							<td class="cart_delete">
								<a class="cart_quantity_delete" href="{{asset('/delete-cart/'.$value->rowId)}}"><i class="fa fa-times"></i></a>
							</td>
						</tr>
					</tbody>
					@endforeach
				</table>
			</div>
	<h4 style="margin-top: : 30px; margin-bottom: 50px;">Hình thức thanh toán</h4>
	<form action="{{URL::to('hinh-thuc')}}" method="post">
		@csrf
	<div class="payment-options">
		<span>
			<label><input name="payment_options" value="1" type="checkbox"> Trả bằng thẻ ATM</label>
		</span>
		<span> 
			<label><input  name="payment_options" value="2" type="checkbox"> Tiền mặt</label>
		</span>
		</br>
		<input  type="submit" value="Đặt hàng" class="btn btn-primary btn-sm">



		<!-- <span>
			<label><input type="checkbox"> </label>
		</span> -->
	</div>
	</form>
</div>
</section> <!--/#cart_items-->


@endsection