@extends('frontend.main_master')
@section('content')
<!-- @php
$user = DB::table('users')->where('id',Auth::user()->id)->first();
@endphp -->
  <!--Hero Section-->
  <div class="hero-section hero-background">
    <h1 class="page-title">Organic Fruits</h1>
</div>

<!--Navigation section-->
<div class="container">
    <nav class="biolife-nav">
        <ul>
            <li class="nav-item"><a href="index-2.html" class="permal-link">Home</a></li>
            <li class="nav-item"><span class="current-page">User Change Password</span></li>
        </ul>
    </nav>
</div>
<div class="body-content">
	<div class="container">
		<div class="row">
      
		 @include('frontend.common.user_sidebar')
 
			{{-- <div class="col-md-1">
				
			</div> <!-- // end col md 2 --> --}}


			<div class="col-md-8">
  <div class="card">
  	<h3 class="text-center"><span class="text-danger">Change Password</span><strong> </strong>   </h3>

  	<div class="card-body">
  		


  		<form method="post" action="{{ route('user.password.update') }}">
  			@csrf


         <div class="form-group">
            <label class="info-title" for="exampleInputEmail1">Current Password <span> </span></label>
            <input type="password" id="current_password" name="oldpassword" class="form-control" >
        </div>

        <div class="form-group">
            <label class="info-title" for="exampleInputEmail1">New Password <span> </span></label>
            <input type="password" id="password" name="password" class="form-control">
        </div>


        <div class="form-group">
            <label class="info-title" for="exampleInputEmail1">Confirm Password <span> </span></label>
            <input type="password" id="password_confirmation" name="password_confirmation" class="form-control">
        </div>

         

         <div class="form-group">            
           <button type="submit" class="btn btn-danger">Update</button>
        </div>         
 

  			
  		</form>  		
  	</div>

 
  	
  </div>
				
			</div> <!-- // end col md 6 -->
			
		</div> <!-- // end row -->
		
	</div>
	
</div>
 

@endsection