@extends('frontend.main_master')
@section('content')
@section('title')
Track Order | Food Delivery
@endsection
 <!--Hero Section-->
 <div class="hero-section hero-background">
    <h1 class="page-title">Order Tracking</h1>
</div>

<!--Navigation section-->
<div class="container">
    <nav class="biolife-nav">
        <ul>
            <li class="nav-item"><a href="index-2.html" class="permal-link">Home</a></li>
            <li class="nav-item"><span class="current-page">Order Tracking</span></li>
        </ul>
    </nav>
</div>
<!-- order tracking start -->
<div class="order-tracking-area pt-110 pb-120 text-center">
    <div class="container">
        <div class="row">
            <div class="col-md-3">
            </div>
            <div class="col-md-6">
                <div class="order-tracking-content text-center">
                    <p>To track your order please enter your Order ID in the box below and press the "Track" button. This was given to you on your receipt and in the confirmation email you should have received.</p>
                    <div class="order-tracking-form">
                        <form method="post" action="{{ route('order.tracking') }}">
                            @csrf
                            <div class="sin-order-tracking">
                                <label>Order ID</label>
                                <input type="text" id="code" name="code" class="form-control" placeholder="Please Enter Order Id">
                            </div><br>
                            <div class="order-track-btn">
                                {{-- <a href="#">Track Now</a> --}}
                                <button class="btn btn-danger" type="submit" style="margin-left: 17px;"> Track Now </button>
                            </div>
                            <br>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection