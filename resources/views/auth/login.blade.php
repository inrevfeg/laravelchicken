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
            <li class="nav-item"><span class="current-page">Authentication</span></li>
        </ul>
    </nav>
</div>

<div class="page-contain login-page">

<div id="main-content" class="main-content">
    <div class="container">

        <div class="row">

            <!--Form Sign In-->
            <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                <div class="signin-container">
                    <h3 class="text-dark">Sign in</h3>
                    <p class="">Hello, Welcome to your account.</p>
                    <form method="POST" action="{{ isset($guard) ? url($guard.'/login') : route('login') }}">
                        @csrf
                        <p class="form-row">
                            <label for="fid-name">Email Address:<span class="requite">*</span></label>
                            <input type="email" id="fid-name" name="email" class="txt-input">
                        </p>
                        <p class="form-row">
                            <label for="fid-pass">Password:<span class="requite">*</span></label>
                            <input type="password" id="fid-pass" name="password" class="txt-input">
                        </p>
                        <p class="form-row wrap-btn">
                            <button class="btn btn-submit btn-bold" type="submit">sign in</button>
                            <a href="#" class="link-to-help">Forgot your password</a>
                        </p>
                    </form>
                </div>
            </div>

            <!--Go to Register form-->
            <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                <div class="signin-container">
                    <h3 class="checkout-subtitle">Create a new account</h3>
                <p class="text title-tag-line">Create your new account.</p>
                    <form method="POST" action="{{ route('register') }}">
                        @csrf
                        <p class="form-row">
                            <label for="fid-name">User Name:<span class="requite">*</span></label>
                            <input type="text" id="fid-name" name="name" value="" class="txt-input">
                        </p>
                        <p class="form-row">
                            <label for="fid-name">Email Address:<span class="requite">*</span></label>
                            <input type="email" id="fid-name" name="email" value="" class="txt-input">
                        </p>
                        <p class="form-row">
                            <label for="fid-pass">Password:<span class="requite">*</span></label>
                            <input type="password" id="fid-pass" name="password" value="" class="txt-input">
                        </p>
                        <p class="form-row">
                            <label for="fid-pass">Confirm Password:<span class="requite">*</span></label>
                            <input type="password" id="fid-pass" name="password_confirmation" value="" class="txt-input">
                        </p>
                        <p class="form-row">
                            <label for="fid-pass">Phone:<span class="requite">*</span></label>
                            <input type="text" id="fid-phone" name="phone" value="" class="txt-input">
                        </p>
                        <p class="form-row wrap-btn">
                            <button class="btn btn-submit btn-bold" type="submit">sign Up</button>
                            
                        </p>
                    </form>
                </div>
            </div>

        </div>

    </div>

</div>
</div>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
@endsection