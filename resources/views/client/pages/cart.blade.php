@extends('client.layouts.master')
@section('title')
    Giỏ hàng
@endsection
@section('content')
<div class="page-head_agile_info_w3l">
</div>
<!-- //banner-2 -->
<!-- page -->
<div class="services-breadcrumb">
    <div class="agile_inner_breadcrumb">
        <div class="container">
            <ul class="w3_short">
                <li>
                    <a href="/">Trang chủ</a>
                    <i>|</i>
                </li>
                <li>Giỏ hàng</li>
            </ul>
        </div>
    </div>
</div>

<div class="privacy py-sm-5 py-4">
    <div class="container py-xl-4 py-lg-2">
        <!-- tittle heading -->
        <h3 class="tittle-w3l text-center mb-lg-5 mb-sm-4 mb-3">
            <span>G</span>iỏ hàng của {{Auth::user()->name}}
        </h3>
        <!-- //tittle heading -->

        <div class="checkout-right">
            <h4 class="mb-sm-4 mb-3">Bạn có tổng cộng:
            <span>{{$cart->count()}} sản phẩm</span>
            </h4>

            {{-- add mesage when occure errors --}}
            @if(session()->has('message'))
                <div class="alert alert-success">
                    {{ session()->get('message') }}
                </div>
            @endif


            <div class="table-responsive">
                <table class="timetable_sub">
                    <thead>
                        <tr>
                            <th>STT</th>
                            <th>Hình ảnh</th>
                            <th>Số lượng</th>
                            <th>Tên sản phẩm</th>

                            <th>Đơn giá</th>
                            <th>Chỉnh sửa</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php $i=1; ?>
                        @foreach($cart as $value)
                        <tr class="rem1">
                            <td class="invert">{{$i}}</td>
                            <td class="invert-image">
                                <a href="#">
                            <img style="width: 100px" src="{{asset('img/upload/product/'.$value->attributes->img)}}" alt="{{$value->name}}">
                                </a>
                            </td>
                            <td class="invert">
                                <div class="quantity">
                                        <div class="form-group">
                                        <input type="nuber" name="quantity" class="form-control js-quantity" value="{{$value->quantity}}" p-id="{{ $value->id }}" min="1" >
                                        </div>
                                </div>
                            </td>
                            <td class="invert">{{$value->name}}</td>
                            <td class="invert">{{number_format($value->price)}}</td>
                            <td class="invert">
                                <div class="rem">
                                <a href="delete/{{$value->id}}"><i class="fas fa-trash-alt fa-2x"></i></a>
                                </div>
                            </td>
                        </tr>
                        <?php $i++; ?>
                        @endforeach
                    </tbody>
                </table>
                <table style="margin-top: 20px" class="timetable_sub">
                    <thead>
                        <tr>
                            <th>Số tiền bạn cần thanh toán:</th>
                            <th>{{Cart::getTotal()}} VND</th>
                        </tr>
                    </thead>
                </table>
            </div>
        </div>
        <div class="checkout-left">
            <div class="address_form_agile mt-sm-5 mt-4">
                <h4 class="mb-sm-4 mb-3">Thêm mới thông tin</h4>
                <form action="{{asset('buy')}}" method="post" class="creditly-card-form agileinfo_form">
                    @csrf
						<div class="creditly-wrapper wthree, w3_agileits_wrapper">
							<div class="information-wrapper">
								<div class="first-row">
									<div class="controls form-group">
                                    <input class="billing-address-name form-control" type="text" name="name" placeholder="Nhập họ tên" value="{{Auth::user()->name}}" required="">
									</div>
									<div class="w3_agileits_card_number_grids">
										<div class="w3_agileits_card_number_grid_left form-group">
											<div class="controls">
												<input type="text" class="form-control" placeholder="Nhập số điện thoại" name="phone" value="{{Auth::user()->phone}}" required="">
											</div>
                                        </div>
                                        <div class="w3_agileits_card_number_grid_right form-group">
											<div class="controls">
												<input type="text" class="form-control" placeholder="Nhập địa chỉ email" name="email" value="{{Auth::user()->email}}" readonly>
											</div>
										</div>
										<div class="w3_agileits_card_number_grid_right form-group">
											<div class="controls">
												<input type="text" class="form-control" placeholder="Nhập địa chỉ" name="address" value="{{Auth::user()->address}}" required="">
											</div>
										</div>
									</div>
								</div>
								<button type="submit" class="submit check_out btn">Tiến hành mua hàng</button>
							</div>
						</div>
					</form>
            </div>
        </div>
    </div>
</div>

@endsection

