@extends('welcome')
@section('content')

<section id="cart_items">
	<div class="container">
		<div class="breadcrumbs">
			<ol class="breadcrumb">
				<li><a href="{{asset('/')}}">Trang Chủ</a></li>
				<li class="active">Giỏ Hàng Của Bạn</li>
			</ol>
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
		</div>
	</section> <!--/#cart_items-->

	<section id="do_action">
		<div class="container">
			
			<div class="row">
				
				<div class="col-sm-6">
					<div class="total_area">
						<ul>
							<li>Tổng <span>{{ Cart::subtotal(0).' '.'VND'}}</span></li>
							<li>Thuế<span>{{ Cart::tax(0, 0).' '.'VND'}}</span></li>
							<li>Phí vận chuyển <span>Free</span></li>
							<li>Thành Tiền <span>{{ Cart::total(0).' '.'VND'}}</span></li>
						</ul>
						<!-- <a class="btn btn-default update" href="">Update</a> -->
						      <!-- /check thanh toán -->
                                <?php 
                                $check_id=Session::get('custo_id');
                                if($check_id!=Null){
                                    ?>
                                 <a class="btn btn-default check_out" href="{{URL::to('/check-out')}}">Thanh Toán</a>
                                 <?php

                                }else{
                                    ?>
                                    <a class="btn btn-default check_out" href="{{URL::to('/login-checkout')}}">Thanh Toán</a>
                                <?php
                                }
                                ?>
                               
						
					</div>
				</div>
			</div>
		</div>
	</section><!--/#do_action-->


	@endsection