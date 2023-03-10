@extends('frontend.main_master')
@section('content')
@section('title')
India's No 1 Online Saree Shop - Nithitex
@endsection

        <div class="breadcrumb-area bg-gray">
            <div class="container">
                <div class="breadcrumb-content text-center">
                    <ul>
                        <li>
                            <a href="/">Home</a>
                        </li>
                        <li class="active">Reset Password</li>
                    </ul>
                </div>
            </div>
        </div>
        <div class="login-register-area pt-80 pb-80">
            <div class="container">
                <div class="row">
                    <div class="col-lg-7 col-md-12 ms-auto me-auto">
                        <div class="login-register-wrapper">
                            <div class="login-register-tab-list nav">
                                <a class="active" data-bs-toggle="tab" href="#lg1">
                                    <h4> Reset Password </h4>
                                </a>
                            </div>
                            <div class="tab-content">
                                <div id="lg1" class="tab-pane active">
                                    <div class="login-form-container">
                                        <div class="login-register-form">
                                            <form action="{{ route('reset.password.post') }}" method="POST">
                                                @csrf
                                                <input type="hidden" name="token" value="{{ $token }}">
                                                <input type="text" id="email_address" class="form-control" name="email" required autofocus placeholder="Enter your email">
                                                <input type="password" id="password" class="form-control" name="password" required autofocus placeholder="Enter your password">
                                                <input type="password" id="password-confirm" class="form-control" name="password_confirmation" required autofocus placeholder="Enter your Confirmation  password">
                                                <button type="submit" class="btn btn-primary">
                                                    Reset Password
                                                </button>
                                                </div>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

@endsection
