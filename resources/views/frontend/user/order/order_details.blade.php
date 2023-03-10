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
            <li class="nav-item"><span class="current-page">Order </span></li>
            <li class="nav-item"><span class="current-page">Order Details</span></li>
        </ul>
    </nav>
</div>
<div class="body-content">
	<div class="container">
		<div class="row">
			 @include('frontend.common.user_sidebar')
             <div class="col-lg-10 col-md-10">
                <div class="row">
                    <div class="col-lg-6 col-md-6 col-sm-6">
                      <img src="{{ asset('frontend/assets/images/chicken-logo.jpg')}}" class="img-responsive" alt="" width="60%"/>
                    </div>
                    <div class="col-lg-6 col-md-6 col-sm-6 d-flex align-items-center justify-content-center text-center">
                        <h4 class="pr-5"><span>Order ID: </span>{{$order->invoice_no}}</h4>
                    </div>
                </div>

                <div class="container">
                    <h5 class="mb-3 mt-5" style="color: green;">Order Summary</h5>
                            <div class="row mt-3">
                                <div class="col-lg-10 col-md-12 col-sm-10">
                                    <table class="table" >
                                    <thead style="background-color: green; color:#FFFFFF;">
                                        <tr>
                                        <th>Image</th>
                                        <th>Product Name</th>
                                        <th>Quantity</th>
                                        <th>Price</th>
                                        </tr>
                                    </thead>
                                    <tbody>                 
                                        @foreach($orderItem as $item)
                                        <tr>
                                            <td><label for=""><img src="{{ asset($item->product->productImage) }}" height="50px;" width="50px;"> </label></td>
                                            <td><label for=""> {{ $item->product->productName }}</label></td>            
                                            <td><label for=""> {{ $item->qty }}</label></td>
                                            <td><label for=""> ₹ {{ $item->price }} </label></td>
                                        </tr>
                                        @endforeach
                                    </tbody>               
                                    </table>
                                </div>
                            </div>
                </div>  
                <div class="container">
                    <div class="row mt-3">
                        <div class="col-lg-8 col-md-8 col-sm-8">
                          
                        </div>
                        <div class="col-lg-4 col-md-4 col-sm-4" style="float-right;">
                            {{-- <b>Shipping Address:</b> --}}
                              <p class="font">
                                <h5><span style="color: green;">Subtotal:</span><span style="font-family: DejaVu Sans; sans-serif;">&#8377;</span>{{ $order->sub_total }}</h5>
                                <h5><span style="color: green;">Shipping Charge:</span><span style="font-family: DejaVu Sans; sans-serif;">&#8377;</span>{{ $order->shipping_charge }}</h5>
                                <h5><span style="color: green;">Total:</span><span style="font-family: DejaVu Sans; sans-serif;">&#8377;</span>{{ $order->amount }}</h5>
                              </p>
                        </div>
                    </div>
                </div>
                <div class="container">
                    <div class="row mt-3">
                        <div class="col-lg-8 col-md-8 col-sm-8">
                          <b>Order Details:</b>
                            <p class="font">
                              <strong>Name:</strong> {{ $order->name }}<br>
                              <strong>Email:</strong> {{ $order->email }} <br>
                              <strong>Phone:</strong> {{ $order->phone }} <br>
                              <strong>Payment Type:</strong> {{ $order->payment_type }} <br>
                              <strong>Payment Status:</strong> {{ $order->payment_status }} <br>
                              <strong>Order Status:</strong> <label for=""> 
                
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
                          
                                    @endif
                            
                                     @else
                              <span class="badge badge-pill badge-warning" style="background: #FF0000;"> Cancel </span>
                            
                                  @endif
                            </label><br>
                          
                              
                              {{-- <strong>Address:</strong> {{ $order->door_no}},{{$order->street_address }}.{{$order->city_name }}.{{$order->state_name }} <br>
                              <strong>Post Code:</strong> {{ $order->pin_code }} --}}
                            </p>
                        </div>
                        <div class="col-lg-4 col-md-4 col-sm-4" style="float-right;">
                            <b>Shipping Address:</b>
                              <p class="font">
                                <strong>Name:</strong> {{ $order->name }}<br>
                                <strong>Email:</strong> {{ $order->email }} <br>
                                <strong>Phone:</strong> {{ $order->phone }} <br>
                                <strong>Address:</strong> {{ $order->door_no}},{{$order->street_address }}.{{$order->city_name }}.{{$order->state_name }} <br>
                                <strong>Post Code:</strong> {{ $order->pin_code }}
                              </p>
                        </div>
                    </div>
                </div>

              

               
                <div class="container">
                    
                    <div class="row mt-3">
                        <div class="col-lg-4 col-md-4 col-sm-4" style="float-right;">
                            @if($order->status !== "5")

                            @else
                            @php 
                            $return_order = App\Models\Order::where('id',$order->id)->where('return_order','=',1)->first();
                            @endphp
                            @php 
                            $order = App\Models\Order::where('id',$order->id)->where('return_reason','=',NULL)->first();
                            @endphp
                    

                    
                            @if($order)
                           
                            <form action=" {{ route('return.order',$order->id) }}" method="post">
                            @csrf
                    
                            <div class="form-group">
                                <b> Order Return Reason:</b>
                                <textarea name="return_reason" id="Return Reason" placeholder="" class="form-control" cols="30" rows="05"></textarea>    
                            </div><br>
                                <button type="submit" class="btn btn-danger">Order Return</button>
                            
                            </form>
                            @elseif($return_order)
                            <span class="badge badge-pill badge-warning" style="background: red">You Have send return request for this product</span>
                            @else
                            <span class="badge badge-pill badge-warning" style="background: green">Accept Your Order</span>
                            @endif 
                            @endif       
                        </div>
                    </div>
                </div>

                
            </div> <!-- My Account Tab Content End -->
   
			
		</div> <!-- // end row -->
		
	</div>
	
</div>
 

@endsection