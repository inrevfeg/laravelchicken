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
            <li class="nav-item"><a href="#" class="permal-link">Category</a></li>
            <li class="nav-item"><span class="current-page">Category Details</span></li>
        </ul>
    </nav>
</div>

<div class="page-contain category-page no-sidebar">
    <div class="container">
        <div class="row">

            <!-- Main content -->
            <div id="main-content" class="main-content col-lg-12 col-md-12 col-sm-12 col-xs-12">

                

                <div class="product-category grid-style">

                    

                    <div class="row">
                        <ul class="products-list">
                            @foreach ($category_details as $product)
                            <li class="product-item col-lg-3 col-md-3 col-sm-4 col-xs-6">
                                <div class="contain-product layout-default">
                                    <div class="product-thumb">
                                        <a href="#" class="link-to-product">
                                            <img src="{{ asset($product->productImage) }}" alt="dd" width="270" height="270" class="product-thumnail">
                                        </a>
                                    </div>
                                    <div class="info">
                                        <b class="categories">{{$product->categoryName}}</b>
                                        <h4 class="product-title"><a href="#" class="pr-name">{{$product->productName}}</a></h4>
                                        <div class="price">
                                            <ins><span class="price-amount"><span class="currencySymbol">₹</span>{{ $product->productPrice }}</span></ins>
                                            <del><span class="price-amount"><span class="currencySymbol">₹</span>{{ $product->productDiscount }}</span></del>
                                        </div>
                                        <div class="shipping-info">
                                            <p class="shipping-day">3-Day Shipping</p>
                                            <p class="for-today">Pree Pickup Today</p>
                                        </div>
                                        <div class="slide-down-box">
                                            <p class="message">All products are carefully selected to ensure food safety.</p>
                                            <div class="buttons">
                                                <a  class="btn wishlist-btn" id="{{ $product->id }}" onclick="addToWishList(this.id)"><i class="fa fa-heart" aria-hidden="true"></i></a>
                                                <a href="#" class="btn add-to-cart-btn" id="{{ $product->id }}" onclick="addToCartsimple(this.id)"><i class="fa fa-cart-arrow-down" aria-hidden="true"></i>Add To Cart</a>
                                                <a href="{{url('product/buynow/'.$product->id) }}" class="btn add-to-cart-btn"><i class="fa-sharp fa-solid fa-cart-shopping"></i>Buy Now</a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </li>
                            @endforeach 

                        </ul>
                    </div>

                    {{-- <div class="biolife-panigations-block">
                        <ul class="panigation-contain">
                            <li><span class="current-page">1</span></li>
                            <li><a href="#" class="link-page">2</a></li>
                            <li><a href="#" class="link-page">3</a></li>
                            <li><span class="sep">....</span></li>
                            <li><a href="#" class="link-page">20</a></li>
                            <li><a href="#" class="link-page next"><i class="fa fa-angle-right" aria-hidden="true"></i></a></li>
                        </ul>
                    </div> --}}

                </div>

            </div>

        </div>
    </div>
</div>


@endsection