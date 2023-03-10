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
            <li class="nav-item"><span class="current-page">Wishlist</span></li>
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
                    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                        <h3 class="box-title">Your Wishlist items</h3>
                        <form class="shopping-cart-form" action="#" method="post">
                            <table class="shop_table cart-form">
                                <thead>
                                <tr>
                                    <th class="product-name">Product Name</th>
                                    <th class="product-price">Price</th>
                                    <th class="product-action">Action</th>
                                </tr>
                                </thead>
                                <tbody id="wishlist">
                               
                                </tbody>
                            </table>
                        </form>
                    </div>
                   
                </div>
            </div>

        </div>
    </div>
</div>
@endsection