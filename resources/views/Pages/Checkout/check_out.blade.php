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

		<div class="register-req">
			<p>Đăng kí hoặc đăng nhập để thanh toán giỏ hàng và xem lại lịch sử mua hàng!</p>
			 @if(session()->has('add'))
                    <div class="alert alert-success">
                        {{session()->get('add')}}
                    </div>
                @endif
		</div><!--/register-req-->

		<div class="col-sm-15 clearfix">
			<div class="bill-to">
				<p style="margin-left: 15%;">Điền thông tin gửi hàng</p>
				<div class="form-one">
					<form action="{{URL::to('/save-shiping')}}" method="post">
						@csrf
						<input type="Email" name="ship_email" placeholder="Email*">
						@if($errors->has('ship_email'))
						<div class="alert alert-success">
							{{$errors->first('ship_email')}}
						</div>
						@endif
						<input type="text" name="ship_name" placeholder="Họ và tên">
						@if($errors->has('ship_name'))
						<div class="alert alert-success">
							{{$errors->first('ship_name')}}
						</div>
						@endif
						<input type="text" name="ship_phone"placeholder="Số điện thoại">
						@if($errors->has('ship_phone'))
						<div class="alert alert-success">
							{{$errors->first('ship_phone')}}
						</div>
						@endif
						<input type="text" name="ship_address" placeholder="Địa chỉ">
						@if($errors->has('ship_address'))
						<div class="alert alert-success">
							{{$errors->first('ship_address')}}
						</div>
						@endif
						<textarea name="ship_note"  placeholder="Ghi chú" rows="16"></textarea>
						@if($errors->has('ship_note'))
						<div class="alert alert-success">
							{{$errors->first('ship_note')}}
						</div>
						@endif
						<input  type="submit" value="Gửi" class="btn btn-primary btn-sm">
					</form>
				</div>
				
			</div>
		</div>
				
	</div>
	<div class="review-payment">
		<h2>Xem lại giỏ hàng</h2>
	</div>

	<div class="table-responsive cart_info">



	</div>
	<div class="payment-options">
		<span>
			<label><input type="checkbox"> Direct Bank Transfer</label>
		</span>
		<span>
			<label><input type="checkbox"> Check Payment</label>
		</span>
		<span>
			<label><input type="checkbox"> Paypal</label>
		</span>
	</div>
</div>
</section> <!--/#cart_items-->


@endsection