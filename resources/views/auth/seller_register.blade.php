<!doctype html>
<html lang="en">

    <head>
        
        <meta charset="utf-8" />
        <title>ReSeller Register | Nithi Tex | India's No 1 Online Saree Shop</title>
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta content="Premium Multipurpose Admin & Dashboard Template" name="description" />
        <meta content="Themesdesign" name="author" />

        <!-- App favicon -->
        <link rel="shortcut icon" href="{{asset('backend/assets/images/favicon.png')}}">

        <link rel="stylesheet" href="{{asset('backend/assets/vendors/core/core.css')}}">
        <link rel="stylesheet" href="{{asset('backend/assets/fonts/feather-font/css/iconfont.css')}}">
        <link rel="stylesheet" href="{{asset('backend/assets/css/demo_1/style.css')}}">

    </head>

    <body class="sidebar-dark bg-secondary">
        <div class="main-wrapper">
            <div class="page-wrapper full-page">
          <h4 class="text-center text-primary mt-5 mb-3">ReSeller Registration</h4>

                <div class="page-content d-flex align-items-center justify-content-center">
    
                    <div class="row w-100 mx-0 auth-page">

                        <div class="col-md-8 col-xl-6 mx-auto">
                            <div class="card">
                                <div class="row">
                    <div class="col-md-4 pr-md-0">
                      <div class="auth-left-wrapper">
                        <img src="{{asset('backend/assets/images/nithi-seller-register.png')}}" class="img-responsive" alt="">
                      </div>
                    </div>
                    <div class="col-md-8 pl-md-0">
                      <div class="auth-form-wrapper px-4 py-5">
                        <a href="/" class="noble-ui-logo d-block mb-2"><img src="{{asset('backend/assets/images/nithi-logo.png')}}" height="70" class="logo-light mx-auto" alt=""></a>
                        <h5 class="text-muted font-weight-normal mb-4">Welcome!. Please Register as a ReSeller Here.</h5>
                        <form class="forms-sample" method="POST" action="{{ route('seller.register.store')}}">
                          @csrf
                          <div class="form-group">
                            <label for="name">Name</label>
                            <input type="text" name="name" id="name" value="{{old('name')}}" class="form-control @error('name') is-invalid @enderror" placeholder="Username" required>
                            @error('name')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                          </div>
                          <div class="form-group">
                            <label for="shopname">Shop Name</label>
                            <input type="text" name="shopname" value="{{old('shopname')}}" id="shopname" class="form-control @error('shopname') is-invalid @enderror" placeholder="Shopname" required>
                            @error('shopname')
                              <span class="invalid-feedback" role="alert">
                              <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                          </div>
                          <div class="form-group">
                            <label for="holdername">Account Holder Name</label>
                            <input type="text" name="holdername" value="{{old('holdername')}}" id="holdername" class="form-control @error('shopname') is-invalid @enderror" placeholder="holdername" required>
                            @error('holdername')
                              <span class="invalid-feedback" role="alert">
                              <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                          </div>
                          <div class="form-group">
                            <label for="accountnumber">Account Number</label>
                            <input type="text" name="accountnumber" value="{{old('accountnumber')}}" id="accountnumber" class="form-control @error('accountnumber') is-invalid @enderror" placeholder="accountnumber" required>
                            @error('accountnumber')
                              <span class="invalid-feedback" role="alert">
                              <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                          </div>
                          <div class="form-group">
                            <label for="ifsccode">IFSC Code</label>
                            <input type="text" name="ifsccode" value="{{old('ifsccode')}}" id="ifsccode" class="form-control @error('ifsccode') is-invalid @enderror" placeholder="ifsccode" required>
                            @error('ifsccode')
                              <span class="invalid-feedback" role="alert">
                              <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                          </div>
                          <div class="form-group">
                            <label for="phone">Phone</label>
                            <input type="text" name="phone" value="{{old('phone')}}" id="phone" class="form-control @error('phone') is-invalid @enderror" placeholder="Mobile number" required>
                            @error('phone')
                              <span class="invalid-feedback" role="alert">
                              <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                          </div>
                          <div class="form-group">
                            <label for="email">Email</label>
                            <input type="email" name="email" value="{{old('email')}}" id="email" class="form-control @error('email') is-invalid @enderror" placeholder="email" required>
                            @error('email')
                            <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                          </span>
                          @enderror
                          </div>
                          <div class="form-group">
                            <label for="password">Password</label>
                            <input type="password" name="password" value="{{old('password')}}" id="password" class="form-control @error('password') is-invalid @enderror" placeholder="password" required>
                            @error('password')
                            <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                          </span>
                          @enderror
                          </div>
                          <div class="form-group">
                            <label for="password">Password Confirmation</label>
                            <input type="password" name="password_confirmation" value="{{old('password')}}" class="form-control @error('password') is-invalid @enderror" id="password_confirmation" placeholder="password confirmation" required>
                            @error('password')
                            <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                          </span>
                          @enderror
                          </div>
                          {{-- <div class="form-check form-check-flat form-check-primary">
                            <label class="form-check-label">
                              <input type="checkbox" class="form-check-input">
                              Remember me
                            </label>
                          </div> --}}
                          {{-- <div class="mt-3">
                            <a href="{{ route('admin.login') }}" class="btn btn-primary mr-2 mb-2 mb-md-0 text-white">Login</a>
                            <button type="submit" class="btn btn-outline-primary btn-icon-text mb-2 mb-md-0">
                              <i class="btn-icon-prepend" data-feather="twitter"></i>
                              Login with twitter
                            </button>
                          </div> --}}
                          <button type="submit" class="btn btn-outline-primary btn-icon-text mb-2 mb-md-0">Register</button>
                        </form>
                        <a href="{{ route('seller.login') }}" class="d-block mt-3 text-muted">Already Registered? Login Here! </br><button type="button" class="btn btn-outline-primary btn-icon-text mb-2 mb-md-0">Login</button></a>
                      </div>
                    </div>
                  </div>
                            </div>
                        </div>
                    </div>
    
                </div>
            </div>
        </div>
    
        <script src="{{asset('backend/assets/vendors/core/core.js')}}"></script>
        <script src="{{asset('backend/assets/vendors/core/core.js')}}"></script>
        <script src="{{asset('backend/assets/vendors/feather-icons/feather.min.js')}}"></script>
        <script src="{{asset('backend/assets/js/template.js')}}"></script>
    </body>
</html>
