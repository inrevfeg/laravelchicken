@extends('frontend.main_master')
@section('content')
@section('title')

@endsection
  <!--Hero Section-->
  <div class="hero-section hero-background">
    <h1 class="page-title">Nutrient Rich Meat</h1>
</div>

<!--Navigation section-->
<div class="container">
    <nav class="biolife-nav">
        <ul>
            <li class="nav-item"><a href="index-2.html" class="permal-link">Home</a></li>
            <li class="nav-item"><span class="current-page">ShoppingCart</span></li>
        </ul>
    </nav>
</div>

<div class="page-contain shopping-cart">

    <!-- Main content -->
    <div id="main-content" class="main-content">
        <div class="container">
            <!--Cart Table-->
            <div class="shopping-cart-container">
                <div class="row">
                    <div class="col-lg-9 col-md-12 col-sm-12 col-xs-12">
                        <h3 class="box-title">Your cart items</h3>
                        <form class="shopping-cart-form" action="#" method="post">
                            <table class="shop_table cart-form">
                                <thead>
                                <tr>
                                    <th class="product-name">Product Name</th>
                                    <th class="product-price">Price</th>
                                    <th class="product-quantity">Quantity</th>
                                    <th class="product-subtotal">Total</th>
                                    <th class="product-action">Action</th>
                                </tr>
                                </thead>
                                <tbody id="cartPage">
                               
                                </tbody>
                            </table>
                        </form>
                    </div>
                    <div class="col-lg-3 col-md-12 col-sm-12 col-xs-12">
                        <div class="shpcart-subtotal-block">
                            <div class="subtotal-line" id="cartTotal">
                                
                            </div>
                            {{-- <div class="subtotal-line">
                                <b class="stt-name">Shipping</b>
                                <span class="stt-price">£0.00</span>
                            </div>
                            <div class="tax-fee">
                                <p class="title">Est. Taxes & Fees</p>
                                <p class="desc">Based on 56789</p>
                            </div> --}}
                            <div class="btn-checkout">
                                <a href="{{ route('checkout') }}" class="btn checkout">Check out</a>
                            </div>
                            <div class="biolife-progress-bar">
                                <table>
                                    <tr>
                                        <td class="first-position">
                                            <span class="index">$0</span>
                                        </td>
                                        <td class="mid-position">
                                            <div class="progress">
                                                <div class="progress-bar" role="progressbar" style="width: 25%" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100"></div>
                                            </div>
                                        </td>
                                        <td class="last-position">
                                            <span class="index">$99</span>
                                        </td>
                                    </tr>
                                </table>
                            </div>
                            <p class="pickup-info"><b>Free Pickup</b> is available as soon as today More about shipping and pickup</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection