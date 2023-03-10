@extends('frontend.main_master')
@section('content')
  <!--Hero Section-->
  <div class="hero-section hero-background">
    <h1 class="page-title">Organic Fruits</h1>
</div>

<!--Navigation section-->
<div class="container">
    <nav class="biolife-nav">
        <ul>
            <li class="nav-item"><a href="index-2.html" class="permal-link">Home</a></li>
            <li class="nav-item"><span class="current-page">Cancel Order</span></li>
        </ul>
    </nav>
</div>
<div class="body-content">
	<div class="container">
		<div class="row">
			 @include('frontend.common.user_sidebar')
             <div class="col-lg-9 col-md-8">

                <table class="table table-bordered">
                    <thead class="thead-light">
                        <tr>
                            <th>Order</th>
                            <th>Date</th>
                            <th>Total</th>
                            <th>Status</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @php
                        $serialNo = 1;
                        @endphp
                        @foreach($orders as $order)
                        <tr>
                            <td>{{$serialNo}}</td>
                            <td>{{ $order->order_date }}</td>
                            <td>₹ {{ $order->amount }}</td>
                            <td>
                                <label for=""> 
                                    @if($order->status == '6')        
                                    <span class="badge badge-pill badge-warning text-white" style="background: #80000b;"> Cancelled </span>
                                    @endif
                                </label>
                            </td>
                            <td>
                                <a class="btn btn-sm btn-primary" href="{{ url('user/order_details/'.$order->id ) }}" class="check-btn sqr-btn ">View</a>&nbsp;&nbsp;&nbsp;
                                <a target="_blank" href="{{ url('user/invoice_download/'.$order->id ) }}" class="btn btn-sm btn-danger" style="margin-top: 5px;"><i class="fa fa-download" style="color: white;"></i> Invoice </a>
                            </td>
                        </tr>
                        
                     
                        @endforeach
                        @php
                            $serialNo++;
                        @endphp

                    </tbody>
                    
                </table>
            </div> <!-- My Account Tab Content End -->
			
		</div> <!-- // end row -->
		
	</div>
	
</div>
 

@endsection