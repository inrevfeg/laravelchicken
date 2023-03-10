@extends('frontend.main_master')
@section('content')
  <!--Hero Section-->
  <div class="hero-section hero-background">
    <h1 class="page-title">Nutrient Rich Meat</h1>
</div>

<!--Navigation section-->
<div class="container">
    <nav class="biolife-nav">
        <ul>
            <li class="nav-item"><a href="index-2.html" class="permal-link">Home</a></li>
            <li class="nav-item"><span class="current-page">User Dashboard</span></li>
        </ul>
    </nav>
</div>
<div class="body-content">
	<div class="container">
		<div class="row">
			
			@include('frontend.common.user_sidebar')

			<div class="col-md-2">
				
			</div> <!-- // end col md 2 -->


			<div class="col-md-6">
                <div class="card">
                    <h3 class="text-center"><span class="text-danger">Hi....</span><strong>{{ Auth::user()->name }}</strong> Welcome To  Online Food Delivery </h3>
                    
                </div>


				
			</div> <!-- // end col md 6 -->
			
		</div> <!-- // end row -->
		
	</div>
	
</div>
 

@endsection