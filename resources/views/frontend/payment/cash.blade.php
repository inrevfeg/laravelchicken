@extends('frontend.main_master')
@section('content')
@section('title')
@endsection
<!--Hero Section-->
<div class="hero-section hero-background">
    <h1 class="page-title">Organic Fruits</h1>
</div>
 <!--Navigation section-->
 <div class="container">
    <nav class="biolife-nav">
        <ul>
            <li class="nav-item"><a href="index-2.html" class="permal-link">Home</a></li>
            <li class="nav-item"><span class="current-page">Cash</span></li>
        </ul>
    </nav>
</div>
<div class="page-contain checkout">

    <!-- Main content -->
    <div id="main-content" class="main-content">
        <div class="container sm-margin-top-37px">
        <div class="row">
				<div class="col-lg-5 col-md-5">
					 <!--Order Summary-->
					 
						<input type="hidden" name="cart_true" id="cart_true" value="{{$cart_true}}">
						<div class="order-summary sm-margin-bottom-80px">
							<div class="title-block">
								<h3 class="title">Order Summary</h3>
								{{-- <a href="#" class="link-forward">Edit cart</a> --}}
							</div>
							<form action="{{ route('cash.order') }}" method="post" id="payment-form">
								@csrf
								<input type="hidden" name="cart_true" id="cart_true" value="{{$cart_true}}">
								
								<input type="hidden" name="name" value="{{ $data['shipping_name'] }}">
										<input type="hidden" name="email" value="{{ $data['shipping_email'] }}">
										<input type="hidden" name="phone" value="{{ $data['shipping_phone'] }}">
										<input type="hidden" name="door_no" value="{{ $data['door_no'] }}">
										<input type="hidden" name="street_address" value="{{ $data['street_address'] }}">
										<input type="hidden" name="city_name" value="{{ $data['city_name'] }}">
										<input type="hidden" name="state_name" value="{{ $data['state_name'] }}">
										<input type="hidden" name="pin_code" value="{{ $data['pin_code'] }}"> 
							@if($cart_true==1)
							<input type="hidden" name="shipping_charge" id="shipping_charge" value="{{ $shipping_charge }}">
							<div class="cart-list-box short-type">
								{{-- <span class="number">2 items</span> --}}
								<ul class="cart-list">
									@foreach($carts as $item)
									<li class="cart-elem">
										<div class="cart-item">
											<div class="product-thumb">
												<a class="prd-thumb" href="#">
													<figure><img src="{{ asset($item->image) }}" width="113" height="113" alt="shop-cart" ></figure>
												</a>
											</div>
											<div class="info">
												<span class="txt-quantity">{{ $item->qty }}X</span>
												<a href="#" class="pr-name">{{$item->name }} </a>
											</div>
											<div class="price price-contain">
												<ins><span class="price-amount"><span class="currencySymbol">₹</span> {{ $item->price }} </span></ins>
											</div>
										</div>
									</li>
									@endforeach 
								</ul>
								<ul class="subtotal">
									<li>
										<div class="subtotal-line">
											<b class="stt-name">Subtotal</b>
											<span class="stt-price">₹ {{ $cartTotal }} </span>
											<input type="hidden" name="cart_subtotal" id="cart_subtotal" value="{{ $cartTotal }}">
										</div>
									</li>
									<li>
										<div class="subtotal-line">
											<b class="stt-name">Shipping</b>
											<span class="stt-price">₹{{ $shipping_charge }}</span>
										</div>
									</li>
									{{-- <li>
										<div class="subtotal-line">
											<b class="stt-name">Tax</b>
											<span class="stt-price">₹0.00</span>
										</div>
									</li>
									<li>
										<div class="subtotal-line">
											<a href="#" class="link-forward">Promo/Gift Certificate</a>
										</div>
									</li> --}}
									<li>
										<div class="subtotal-line">
											<b class="stt-name">total:</b>
											<span class="stt-price">₹ {{ $cart_total }} </span>
											<input type="hidden" name="cart_total" id="cart_total" value="{{ $cart_total }}">
										</div>
									</li>
								</ul>
							   
							</div>
							@else
							<div class="cart-list-box short-type">
								{{-- <span class="number">2 items</span> --}}
								<ul class="cart-list">
									
									<li class="cart-elem">
										<div class="cart-item">
											<div class="product-thumb">
												<a class="prd-thumb" href="#">
													<figure><img src="{{ asset($buy_product_image) }}" width="113" height="113" alt="shop-cart" ></figure>
												</a>
											</div>
											<div class="info">
												<span class="txt-quantity">{{ $buy_product_qty }}X</span>
												<a href="#" class="pr-name">{{ $buy_product_name }}  </a>
											</div>
											<div class="price price-contain">
												<ins><span class="price-amount"> ₹{{ $buy_price }}</span></ins>
											</div>
										</div>
									</li>
								  
								</ul>
								<ul class="subtotal">
									<li>
										<div class="subtotal-line">
											<b class="stt-name">Subtotal</b>
											<span class="stt-price">₹ {{ $buy_price }} </span>
										</div>
									</li>
									<li>
										<div class="subtotal-line">
											<b class="stt-name">Shipping</b>
											<span class="stt-price">₹{{ $buy_shipping_charge }}</span>
										</div>
									</li>
									<li>
										<div class="subtotal-line">
											<b class="stt-name">Tax</b>
											<span class="stt-price">₹0.00</span>
										</div>
									</li>
									<li>
										<div class="subtotal-line">
											<a href="#" class="link-forward">Promo/Gift Certificate</a>
										</div>
									</li>
									<li>
										<div class="subtotal-line">
											<b class="stt-name">total:</b>
											<span class="stt-price">₹ {{ $buy_total }} </span>
										</div>
									</li>
									<input type="hidden" name="buy_now_price" id="buy_now_price" value="{{ $buy_price }}">
								<input type="hidden" name="buy_now_product_name" id="buy_now_product_name" value="{{ $buy_product_name }}">
								<input type="hidden" name="buy_now_product_qty" id="buy_now_product_qty" value="{{ $buy_product_qty }}">
								<input type="hidden" name="buy_now_product_id" id="buy_now_product_id" value="{{ $buy_product_id }}">
								<input type="hidden" name="shipping_charge" id="shipping_charge" value="{{ $buy_shipping_charge }}">
								<input type="hidden" name="buy_now_total" id="buy_now_total" value="{{ $buy_total }}">
								</ul>
							   
							</div>
							@endif 
						</div>		
				</div>
				<div class="col-lg-7 col-md-7">
					<div class="col d-flex justify-content-center align-items-center">
						<img src="{{ asset('frontend/assets/images/logo/cod.png') }}" class="img-responsive" alt="">
					</div>
					<br>
							<div class="d-flex justify-content-center align-items-center mt-20 floar-right">
								<input type="hidden">
							{{-- <a href="#">Place Order</a> --}}
							<button type="submit" class="btn btn-flat btn-danger text-right pt-5" title="Add to Cart">Confirm Order</button>
						</div>
					</form>
				</div>
        	</div>	
		</div>
	</div>
</div>
@endsection

