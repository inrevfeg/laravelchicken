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
            <li class="nav-item"><span class="current-page">Checkout</span></li>
        </ul>
    </nav>
</div>

<div class="page-contain checkout">

    <!-- Main content -->
    <div id="main-content" class="main-content">
        <div class="container sm-margin-top-37px">
            <div class="row">
                <form class="register-form" action="{{ route('checkout.store') }}" method="POST">
                    @csrf
                  <!--checkout progress box-->
                  <div class="col-lg-7 col-md-7 col-sm-6 col-xs-12">
                    <div class="checkout-progress-wrap">
                        <ul class="steps">
                            <li class="step 1st">
                                <div class="checkout-act active">
                                    <h3 class="title-box"><span class="number">1</span>Customer</h3>
                                    <div class="box-content">
                                        {{-- <p class="txt-desc">Checking out as a <a class="pmlink" href="#">Guest?</a> You’ll be able to save your details to create an account with us later.</p> --}}
                                        <div class="login-on-checkout">
                                           
                                                <div class="form-group">
                                                    <label for="" class="form-label">
                                                     Name</label>
                                                    <input type="text" id="shipping_name" name="shipping_name" class="form-control pt-2"
                                                        title="Please Enter Name" value="{{ Auth::user()->name }}"  placeholder="Enter Your Name" autocomplete="off" required/>
                                                </div>
                                                {{-- <div>
                                                    <label for="input_email">Name</label>
                                                    <input type="name" name="shipping_name" id="shipping_name" value="{{ Auth::user()->name }}" placeholder="Your Name">
                                                </div> --}}
                                                   
                                                <div class="form-group">
                                                    <label for="" class="form-label">
                                                        Phone</label>
                                                    <input type="text" id="shipping_phone" name="shipping_phone" class="form-control pt-2"
                                                        title="Please Enter Name" value="{{ Auth::user()->phone }}"  placeholder="Enter Your Phone" autocomplete="off" required/>
                                                </div>
                                              
                                                <div class="form-group">
                                                    <label for="" class="form-label">
                                                        Email Address</label>
                                                    <input type="text" id="shipping_email" name="shipping_email" class="form-control pt-2"
                                                        title="Please Enter Name" value="{{ Auth::user()->email }}"  placeholder="Enter Your Email" autocomplete="off" required/>
                                                </div>
                                              
                                                <p class="msg">Already have an account? <a href="{{route('login')}}" class="link-forward">Sign in now</a></p>
                                            
                                        </div>
                                    </div>
                                </div>
                            </li>
                            <li class="step 3rd">
                                <div class="checkout-act active"><h3 class="title-box"><span class="number">2</span>Billing</h3>
                                    <div class="box-content">
                                        {{-- <p class="txt-desc">Checking out as a <a class="pmlink" href="#">Guest?</a> You’ll be able to save your details to create an account with us later.</p> --}}
                                        <div class="login-on-checkout">
                                           
                                                <div class="form-group">
                                                    <label for="" class="form-label">
                                                        Door No. / Flat No. / Floor No.</label>
                                                    <input type="text" id="door_no" name="door_no" class="form-control pt-2"
                                                        title="Please Enter Name" value="{{ Auth::user()->door_no }}"  placeholder="Door No. / Flat No. / Floor No." autocomplete="off" required/>
                                                </div>
                                                <div class="form-group">
                                                    <label for="" class="form-label">
                                                        Street Address</label>
                                                    <input type="text" id="street_address" name="street_address" class="form-control pt-2"
                                                        title="Please Enter Street Address" value="{{ Auth::user()->street_address }}"  placeholder="Enter Street Address" autocomplete="off" required/>
                                                </div>
                                                
                                                <div class="form-group">
                                                    <label for="" class="form-label">
                                                        State  </label>
                                                    <input type="text" id="state_name" name="state_name" class="form-control pt-2"
                                                        title="Please Enter State Name" placeholder="Enter State Name"  value="{{ Auth::user()->state_name }}" autocomplete="off" required/>
                                                </div>
                                                
                                                <div class="form-group">
                                                    <label for="" class="form-label">
                                                        City</label>
                                                    <input type="text" id="city_name" name="city_name" class="form-control pt-2"
                                                        title="Please Enter Name" placeholder="Enter City Name" type="text"   value="{{ Auth::user()->city_name }} "autocomplete="off" required/>
                                                </div>
                                                
                                                <div class="form-group">
                                                    <label for="" class="form-label">
                                                        Pin Code</label>
                                                    <input type="text" class="form-control pt-2"
                                                        title="Please Enter Name" name="pin_code" id="pin_code"   value="{{ Auth::user()->pin_code }}"  required="" placeholder="Enter Pincode" autocomplete="off" required/>
                                                </div>
                                                {{-- <div class="form-group">

                                                </div> --}}
                                            
                                        </div>
                                    </div>
                                </div>
                            </li>
                        </ul>
                    </div>
                </div>

                <!--Order Summary-->
                <div class="col-lg-5 col-md-5 col-sm-6 col-xs-12 sm-padding-top-48px sm-margin-bottom-0 xs-margin-bottom-15px">
                    <input type="hidden" name="cart_true" id="cart_true" value="{{$cart_true}}">
                    <div class="order-summary sm-margin-bottom-80px">
                        <div class="title-block">
                            <h3 class="title">Order Summary</h3>
                            {{-- <a href="#" class="link-forward">Edit cart</a> --}}
                        </div>
                        @if($cart_true==1)
                        
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
                                        <span class="stt-price">₹ {{ $cartsubTotal }} </span>
                                    </div>
                                    <input type="hidden" name="cartsub_total" id="cartsub_total" value="{{ $cartsubTotal }}">
                                </li>
                                <li>
                                    <div class="subtotal-line">
                                        <b class="stt-name">Shipping</b>
                                        <span class="stt-price">₹{{ $cartShipTotal }}</span>
                                    </div>
                                    <input type="hidden" id="cartShipping_charge" name="cartShipping_charge" value="{{ $cartShipTotal }}">
                                </li>
                                {{-- <li>
                                    <div class="subtotal-line">
                                        <b class="stt-name">Tax</b>
                                        <span class="stt-price">₹0.00</span>
                                    </div>
                                </li> --}}
                                {{-- <li>
                                    <div class="subtotal-line">
                                        <a href="#" class="link-forward">Promo/Gift Certificate</a>
                                    </div>
                                </li> --}}
                                <li>
                                    <div class="subtotal-line">
                                        <b class="stt-name">total:</b>
                                        <span class="stt-price">₹ {{ $cartTotal }} </span>
                                    </div>
                                    <input type="hidden" id="carttotal" name="carttotal" value="{{ $cartTotal }}">
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
                                                <figure><img src="{{ asset($product->productImage) }}" width="113" height="113" alt="shop-cart" ></figure>
                                            </a>
                                        </div>
                                        <div class="info">
                                            <span class="txt-quantity">{{ $quantity }}X</span>
                                            <a href="#" class="pr-name">{{ $product->productName }} </a>
                                        </div>
                                        <div class="price price-contain">
                                            <ins><span class="price-amount"><span class="currencySymbol">₹</span> {{ $buynow_price }} </span></ins>
                                        </div>
                                    </div>
                                </li>
                              
                            </ul>
                            <ul class="subtotal">
                                <li>
                                    <div class="subtotal-line">
                                        <b class="stt-name">Subtotal</b>
                                        <span class="stt-price">₹ {{ $buynow_price }} </span>
                                    </div>
                                </li>
                                <li>
                                    <div class="subtotal-line">
                                        <b class="stt-name">Shipping</b>
                                        <span class="stt-price">₹ {{ $product_shipping_charge }}</span>
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
                                        <span class="stt-price">₹ {{ $total }} </span>
                                    </div>
                                </li>
                                <input type="hidden" name="buy_now_image" id="buy_now_image" value="{{ $product->productImage }}">
                                <input type="hidden" name="buy_now_price" id="buy_now_price" value="{{ $buynow_price }}">
                                <input type="hidden" name="buy_now_ship_charge" id="buy_now_ship_charge" value="{{ $product_shipping_charge }}">
                                <input type="hidden" name="buy_now_total" id="buy_now_total" value="{{ $total }}">
                                <input type="hidden" name="buy_now_product_id" id="buy_now_product_id" value="{{ $product_id }}">
                                <input type="hidden" name="buy_now_product_name" id="buy_now_product_name" value="{{ $product->productName }}">
                                <input type="hidden" name="buy_now_product_qty" id="buy_now_product_qty" value="{{ $quantity }}">
                            </ul>
                           
                        </div>
                        @endif 
                    </div>
                  
                       
                       
                    <div class="checkout-progress-wrap">
                        <ul class="steps">
                            <li class="step 4th">
                                <div class="checkout-act active"><h3 class="title-box"><span class="number">3</span>Payment</h3>
                                    <div class="box-content">
                                        <div class="payment-method">
                                            <div class="pay-top sin-payment">
                                                <input id="payment-method-3" class="input-radio" type="radio" value="cash" name="payment_method">
                                                <label for="payment-method-3">Cash on delivery </label>
                                                <div class="payment-box payment_method_bacs">
                                                    <p>Make your payment directly into our bank account. Please use your Order ID as the payment reference.</p>
                                                </div>
                                            </div>
                                            <div class="pay-top sin-payment">
                                                <input id="payment-method-3" class="input-radio" type="radio" value="paytm" name="payment_method">
                                                <label for="payment-method-3">Online Payment </label>
                                                <div class="payment-box payment_method_bacs">
                                                    <p>Make your payment directly into our bank account. Please use your Order ID as the payment reference.</p>
                                                </div>
                                            </div>
                                            {{-- <div class="pay-top sin-payment sin-payment-3">
                                                <input id="payment-method-4" class="input-radio" type="radio" value="razorpay" name="payment_method">
                                                <label for="payment-method-4">Online Payment</label>
                                                <div class="payment-box payment_method_bacs">
                                                    <p>Make your payment directly into our bank account. Please use your Order ID as the payment reference.</p>
                                                </div>
                                            </div> --}}
                                        </div>
                                       
                                        <div class="text-right mb-5 pb-5">
                                            <button type="submit" name="btn-sbmt  btn-lg" class="btn-danger">Place Order</button>
                                        </div>
                                    </div>
                                </div>
                            </li>                            
                        </ul>
                       
                    </div>
                   
                </div>
            </div>
        </form>
        </div>
    </div>
</div>
@endsection
