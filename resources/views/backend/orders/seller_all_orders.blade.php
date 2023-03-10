@extends('admin.admin_master')
@section('admin')
@section('title')
Order List 
@endsection
<div class="page-content">
    <section class="content-header">
        <div class="container-fluid">
          <div class="row mb-2">
            <div class="col-sm-6">
              <h5>Order List </h5>
            </div>
            <div class="col-sm-6">
              <ol class="breadcrumb float-sm-right">
                <li class="breadcrumb-item"><a href="{{route('dashboard')}}">Home</a></li>
                <li class="breadcrumb-item active">Master</li>
                <li class="breadcrumb-item active">Order List</li>
              </ol>
            </div>
          </div>
        </div><!-- /.container-fluid -->
    </section>
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    {{-- <h3 class="card-title">Order List</h3> --}}
                </div>
                <div class="card-body">
                    <div class="col-md-12">
                        <div class="table-responsive">
                            <table id="dataTableExample" class="table table-bordered">
                                <thead>
                                    <tr>
                                        <th>#</th>
                                        <th>Invoice</th>
                                        <th>Customer</th>
                                        <th>Total Price</th>
                                        <th>Delivery Status</th>
                                        <th>Payment Status</th>
                                        <th>Payment Method</th>
                                        <th>Shipping Label</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody id="tbodyList">
                                    @php
                                        $serialNo = 1;
                                    @endphp
                                    @foreach($sellerorders as $item)
                                    <tr id="emptyRow" style="height: 25px;">
                                        <td>{{$serialNo}}</td>
                                        <td>{{$item->invoice_no}}</td>
                                        <td>@if($item->userrole_id == 1){{$item->user->name}} @else {{$item->seller->name}}@endif</td>
                                        <td>{{$item->amount}}</td>
                                        <td>
                                        <label for="">                            
                                            @if($item->status == 'pending')        
                                                <span class="badge badge-pill badge-warning text-white" style="background: #800080;"> Pending </span>
                                                @elseif($item->status == 'confirmed')
                                                 <span class="badge badge-pill badge-warning text-white" style="background: #0000FF;"> Confirm </span>
                                                  @elseif($item->status == 'processing')
                                                 <span class="badge badge-pill badge-warning text-white" style="background: #FFA500;"> Processing </span>
                                        
                                                  @elseif($item->status == 'picked')
                                                 <span class="badge badge-pill badge-warning text-white" style="background: #808000;"> Picked </span>
                                        
                                                  @elseif($item->status == 'shipped')
                                                 <span class="badge badge-pill badge-warning text-white" style="background: #808080;"> Shipped </span>
                                        
                                                  @elseif($item->status == 'delivered')
                                                 <span class="badge badge-pill badge-warning text-white" style="background: #008000;"> Delivered </span>
                                                 @elseif($item->status == 'cancelled')
                                                 <span class="badge badge-pill badge-warning text-white" style="background: #80000b;"> Cancelled </span>
                                            @endif    
                                        </label>
                                    </td>
                                        {{-- <td> <span class="badge badge-pill badge-primary">{{ $item->status }} </span>  </td> --}}
                                        <td>
                                            <label for="">
                                            @if($item->payment_status == 'paid')
                                            <a class="badge badge-pill badge-warning text-white" style="background: #008000;" href="{{ route('seller.order.unpaid_status.update',$item->id) }}"> Paid </a>
                                            @elseif($item->payment_status == 'Unpaid')
                                            <a class="badge badge-pill badge-warning text-white" style="background: #f50418;" href="{{ route('seller.order.paid_status.update',$item->id) }}"> UnPaid </a>
                                            @endif
                                            </label>                   
                                        </td>
                                        <td>{{$item->payment_type}}</td>    
                                        <td><a class="btn btn-success" href="{{ route('order.print.modal',$item->id) }}"  class="btn btn-success">Print</a></td>
                                        <td>
                                            <a href="{{ route('seller.order.details',$item->id) }}" class="btn btn-info" title="Edit Data"><i class="fa fa-eye"></i>Edit </a>
                                        </td>        
                                    </tr>
                                    @php
                                        $serialNo++;
                                    @endphp
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection