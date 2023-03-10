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
            <li class="nav-item"><span class="current-page">Return Order</span></li>
        </ul>
    </nav>
</div>
<div class="body-content">
	<div class="container">
		<div class="row">
			 @include('frontend.common.user_sidebar')
             <div class="col-lg-9 col-md-8">
                <table class="table table-bordered">
                    <thead class="thead-dark">
                        <tr>
                            <th>Order</th>
                            <th>Date</th>
                            <th>Total</th>
                            <th>Order Reason</th>
                            <th>Order Status</th>
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
                            <td class="col-md-2">
                                <label for=""> {{ $order->return_reason }}</label>
                              </td>
                               <td class="col-md-2">
                                <label for=""> 
                                  @if($order->return_order == 0) 
                                  <span class="badge badge-pill badge-warning" style="background: #418DB9;"> No Return Request </span>
                                  @elseif($order->return_order == 1)
                                  <span class="badge badge-pill badge-warning" style="background: #800000;"> Pending </span>
                                  <span class="badge badge-pill badge-warning" style="background:red;">Return Requested </span>
                                 
                                  @elseif($order->return_order == 2)
                                   <span class="badge badge-pill badge-warning" style="background: #008000;">Success </span>
                                   @endif
              
                                  </label>
                              </td>
                    
                        </tr>
                        @php
                            $serialNo++;
                        @endphp
                        @endforeach
                    </tbody>
                </table>
            </div> <!-- My Account Tab Content End -->
			
		</div> <!-- // end row -->
		
	</div>
	
</div>
 

@endsection