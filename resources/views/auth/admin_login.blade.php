<!doctype html>
<html lang="en">

    <head>
        
        <meta charset="utf-8" />
        <title></title>
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta content="Premium Multipurpose Admin & Dashboard Template" name="description" />
        <meta content="Themesdesign" name="author" />

        <link href="{{asset('backend/admin_login/css/style.css')}}" id="app-style" rel="stylesheet" type="text/css" />
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/css/bootstrap.min.css">
        <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.2/css/all.css">
    </head>

    <body>
        <div class="wrapper">
            <div class="logo">
                <img src="{{asset('backend/admin_login/images/chicken-logo.jpg')}}" alt="">
            </div>
            <div class="text-center mt-4 name">
                Admin Login
            </div>
            <form class="forms-sample" method="POST" action="{{ isset($guard) ? url($guard.'/login') : route('login') }}">
                @csrf
                <div class="form-field d-flex align-items-center">
                    <span class="far fa-user"></span>
                    <input type="email" name="email" id="userName" placeholder="Useremail">
                </div>
                <div class="form-field d-flex align-items-center">
                    <span class="fas fa-key"></span>
                    <input type="password" name="password" id="pwd" placeholder="Password">
                </div>
                <button type="submit" class="btn mt-3">Login</button>
            </form>
            <div class="text-center fs-6">
                {{-- <a href="#">Forget password?</a> or <a href="#">Sign up</a> --}}
            </div>
        </div>
         <!-- JAVASCRIPT -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/js/bootstrap.bundle.min.js"></script>

<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    </body>
</html>
