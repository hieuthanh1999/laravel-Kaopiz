@extends('welcome')
@section('content')
<section id="form"><!--form-->
	<div class="container">
		<div class="row">
			<div class="col-sm-4 col-sm-offset-1">
				<div class="login-form"><!--login form-->
					<h2>Đăng nhập tài khoản</h2>
					<form action="{{URL::to('/login-customer')}}" method="Post">
						@csrf
						<input type="text" name="email_customer" placeholder="Nhập email" />
						<input type="password" name="pass_customer" placeholder="Nhập password" />
						<span>
							<input type="checkbox" class="checkbox"> 
							Ghi nhớ đăng nhập
						</span>
						<input  type="submit" class="btn btn-primary btn-sm" value="Đăng nhập">
					</form>
				</div><!--/login form-->
			</div>
			<div class="col-sm-1">
				<h2 class="or">OR</h2>
			</div>
			<div class="col-sm-4">
				<div class="signup-form"><!--sign up form-->
					<h2>Đăng ký tài khoản mới</h2>
					<form action="{{URL::to('/add-customer')}}" method="Post">
						@csrf
						<input type="text" name="custo_name" placeholder="Họ và tên"/>
						@if($errors->has('custo_name'))
						<div class="alert alert-success">
							{{$errors->first('custo_name')}}
						</div>
						@endif
						<input type="email" name="custo_email" placeholder="Địa chỉ email"/>
						@if($errors->has('custo_email'))
						<div class="alert alert-success">
							{{$errors->first('custo_email')}}
						</div>
						@endif
						<input type="text" name="custo_phone" placeholder="số điện thoại"/>
						@if($errors->has('custo_phone'))
						<div class="alert alert-success">
							{{$errors->first('custo_phone')}}
						</div>
						@endif
						<input type="password" name="custo_password" placeholder="mật khẩu"/>
						@if($errors->has('custo_password'))
						<div class="alert alert-success">
							{{$errors->first('custo_password')}}
						</div>
						@endif
						<button type="submit" style="text-align:center;" class="btn btn-default">Đăng ký</button>
					</form>
				</div><!--/sign up form-->
			</div>
		</div>
	</div>
</section><!--/form-->

@endsection