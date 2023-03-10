@extends('admin.admin_master')
@section('admin')
@section('title')
Order Details 
@endsection
<div class="page-content">
    <section class="content-header">
        <div class="container-fluid">
          <div class="row mb-2">
            <div class="col-sm-6">
              {{-- <h5>Order List </h5> --}}
            </div>
            <div class="col-sm-6">
              <ol class="breadcrumb float-sm-right">
                <li class="breadcrumb-item"><a href="{{route('dashboard')}}">Home</a></li>
                <li class="breadcrumb-item active">Master</li>
                <li class="breadcrumb-item active">Order Details</li>
              </ol>
            </div>
          </div>
        </div><!-- /.container-fluid -->
    </section>
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <h3 class="card-title">Order Details</h3>
                    <a href="{{route('order.all')}}" class="btn-dark btn-md btn" style="float: right;">Back</a>
                </div>
                <div class="card-body">
                  <form action="{{route('order.update')}}" method="POST">
                    @csrf

                    <div class="row">
                      <div class="col-md-4"></div>
                      <div class="col-md-4"></div>
                      <div class="col-md-4">
                        <div class="form-group">
                          <input type="hidden" name="order_id" value="{{$order->id}}"> 
                          <select  name="order_status" id="order_status" class="form-control order_status">
                            <option {{$order->status == '0'? 'selected':'' }} value="0">Pending</option>
                            <option {{$order->status == '1'? 'selected':'' }} value="1">Confirmed</option>
                            <option {{$order->status == '2'? 'selected':'' }} value="2">Processing</option>
                            <option {{$order->status == '3'? 'selected':'' }} value="3">Picked</option>
                            <option {{$order->status == '4'? 'selected':'' }} value="4">Shipped</option>
                            <option {{$order->status == '5'? 'selected':'' }} value="5">Delivered</option>
                            <option {{$order->status == '6'? 'selected':'' }} value="6">Cancelled</option>
                          </select>
                          
                          @error('order_status') 
                          <span class="text-danger">{{ $message }}</span>
                          @enderror

                          <input type="hidden" id="hidstatus" value="{{$order->status}}" />
                          <input type="hidden" id="hidpaystatus" value="{{$order->payment_status}}" />
                          </div>
                          
                          <div style="display: none" class="trackno form-group">
                            <input type="text" id="track_no" name="track_no" value="" class="form-control" title="Enter Order Tracking NO" placeholder="Enter Order Tracking No" autocomplete="off"/>
                          </div>

                          <div class="col-md-1 apply-submit d-flex justify-content-right" style="display: none">
                            <button type="submit" class="btn btn-success btn-flat" style="float: right;">Apply</button>
                          </div>
                      </div>
                    </div>

                  </form>
                  <div class="row">
                      <div class="col-lg-6 col-md-6 col-sm-6">
                        <img src="{{ asset('frontend/assets/images/chicken-logo.jpg')}}" class="img-responsive" alt="" width="50%"/>
                      </div>
                      <div class="col-lg-6 col-md-6 col-sm-6 d-flex align-items-center justify-content-center text-right">
                          <h6 class="pr-5"><span>Order ID: </span>{{$order->invoice_no}}</h6>
                      </div>
                  </div>
                  <div class="container">
                  <div class="row mt-3">
                      <div class="col-lg-8 col-md-8 col-sm-8">
                        <b>Billing Address:</b>
                          <p class="font">
                            <strong>Name:</strong> {{ $order->name }}<br>
                            <strong>Email:</strong> {{ $order->email }} <br>
                            <strong>Phone:</strong> {{ $order->phone }} <br>
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
                  </div>

                  <div class="container">
                        <h6 class="mb-3 mt-5" style="color: green;">Order Summary</h6>
                      <div class="row">
                          <div class="col-lg-12 col-md-12 col-sm-12">
                            <table class="table" width="100%">
                              <thead style="background-color: green;">
                                <tr>
                                  <th style="color:#FFF;">Image</th>
                                  <th style="color:#FFF;">Product Name</th>
                                  <th style="color:#FFF;">Quantity</th>
                                  <th style="color:#FFF;">Price</th>
                                </tr>
                              </thead>
                              <tbody>                 
                                @foreach($orderItem as $item)
                                  <tr>
                                    <td><img src="{{ asset($item->product->productImage) }}" height="50px;" width="50px;"></td>
                                    <td> {{ $item->product->productName }}</td>            
                                    <td> {{ $item->qty }}</td>
                                    <td> ₹ {{ $item->price }} </td>
                                  </tr>
                                @endforeach
                              </tbody>               
                            </table>
                          </div>
                      </div>
                  </div>
                  <div class="container">
                    <div class="row mt-3">
                        <div class="col-lg-9 col-md-9 col-sm-9">
                          
                        </div>
                        <div class="col-lg-3 col-md-3 col-sm-3" style="float-right;">
                            {{-- <b>Shipping Address:</b> --}}
                              <p class="font">
                                <h5><span style="color: green;">Subtotal:</span><span style="font-family: DejaVu Sans; sans-serif;">&#8377;</span>{{ $order->sub_total }}</h5>
                                <h5><span style="color: green;">Shipping Charge:</span><span style="font-family: DejaVu Sans; sans-serif;">&#8377;</span>{{ $order->shipping_charge }}</h5>
                                <h5><span style="color: green;">Total:</span><span style="font-family: DejaVu Sans; sans-serif;">&#8377;</span>{{ $order->amount }}</h5>
                              </p>
                        </div>
                    </div>
                </div>

                </div>
            </div>
        </div>
</div>
@endsection
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script type="text/javascript">
$(document).ready(function() {
  var dropdownFieldValue=$("#hidstatus").val();
  var paydropdownFieldValue=$("#hidpaystatus").val();

    if (dropdownFieldValue == 3) {
        $('.trackno').show();
          }  
      else {
        $('.trackno').hide();
        }
        if (dropdownFieldValue == 5) {
        $('.apply-submit').hide();
          }  
      else {
        $('.apply-submit').show();
        }
          
    if (dropdownFieldValue == 5) {
        $('#order_status').attr('disabled', true);
    }
    else {
        $('#order_status').attr('disabled', false);
    }  
     $('#order_status').on('change', function () {      
        if ($('#order_status option:selected').val() == 3) {
            $('.trackno').show();
        }  
        else {
            $('.trackno').hide();
        }  
        });
 });
</script>