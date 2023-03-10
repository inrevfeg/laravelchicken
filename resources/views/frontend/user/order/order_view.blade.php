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
            <li class="nav-item"><span class="current-page">My Order</span></li>
        </ul>
    </nav>
</div>
<div class="body-content">
	<div class="container">
		<div class="row">
			 @include('frontend.common.user_sidebar')

       {{-- <div class="col-md-2">
       </div> --}}

       <div class="col-md-10">
        <div class="card">
            {{-- <h3 class="text-center"><span class="text-danger">Hi....</span><strong>{{ Auth::user()->name }}</strong>  Your Order Details</h3> --}}
        <div class="table-responsive">
          <table class="table">
            <tbody>
  
              <tr style="background: #e2e2e2;">
                <td class="col-md-1">
                  <label for=""> Date</label>
                </td>

                <td class="col-md-3">
                  <label for=""> Total</label>
                </td>

                <td class="col-md-3">
                  <label for=""> Payment</label>
                </td>


                <td class="col-md-2">
                  <label for=""> Invoice</label>
                </td>

                 <td class="col-md-2">
                  <label for=""> Order</label>
                </td>

                 <td class="col-md-1">
                  <label for=""> Action </label>
                </td>
                
              </tr>


              @foreach($orders as $order)
       <tr>
                <td class="col-md-1">
                  <label for=""> {{ $order->order_date }}</label>
                </td>

                <td class="col-md-3">
                  <label for=""> ₹{{ $order->amount }}</label>
                </td>


                 <td class="col-md-3">
                  <label for=""> {{ $order->payment_status }}</label>
                </td>

                <td class="col-md-2">
                  <label for=""> {{ $order->invoice_no }}</label>
                </td>

         <td class="col-md-2">
          <label for=""> 

    @if($order->status == '0')        
        <span class="badge badge-pill badge-warning" style="background: #800080;"> Pending </span>
        @elseif($order->status == '1')
         <span class="badge badge-pill badge-warning" style="background: #0000FF;"> Confirm </span>

          @elseif($order->status == '2')
         <span class="badge badge-pill badge-warning" style="background: #FFA500;"> Processing </span>

          @elseif($order->status == '3')
         <span class="badge badge-pill badge-warning" style="background: #808000;"> Picked </span>

          @elseif($order->status == '4')
         <span class="badge badge-pill badge-warning" style="background: #808080;"> Shipped </span>

          @elseif($order->status == '5')
         <span class="badge badge-pill badge-warning" style="background: #008000;"> Delivered </span>

          @if($order->return_order == 1) 
           <span class="badge badge-pill badge-warning" style="background:red;">Return Requested </span>
         @elseif($order->return_order == 2)
         <span class="badge badge-pill badge-warning" style="background:green;">Return Requested Approve </span>

          @endif

         @else
  <span class="badge badge-pill badge-warning" style="background: #FF0000;"> Cancel </span>

      @endif
            </label>
        </td>

         <td class="col-md-1">
          <a href="{{ url('user/order_details/'.$order->id ) }}" class="btn btn-sm btn-primary"><i class="fa fa-eye"></i> View</a>

           <a target="_blank" href="{{ url('user/invoice_download/'.$order->id ) }}" class="btn btn-sm btn-danger" style="margin-top: 5px;"><i class="fa fa-download" style="color: white;"></i> Invoice </a>
          
        </td>
                
              </tr>
              @endforeach





            </tbody>
            
          </table>
          
        </div>


        </div>

         
       </div> <!-- / end col md 8 -->

		 

		 
			
		</div> <!-- // end row -->
		
	</div>
	
</div>
 

@endsection