@extends('admin.admin_master')
@section('admin')
@section('title')
Confirmed Order List 
@endsection
<div class="page-content">
    <section class="content-header">
        <div class="container-fluid">
          <div class="row mb-2">
            <div class="col-sm-6">
              <h5>Confirmed Order List </h5>
            </div>
            <div class="col-sm-6">
              <ol class="breadcrumb float-sm-right">
                <li class="breadcrumb-item"><a href="{{route('dashboard')}}">Home</a></li>
                <li class="breadcrumb-item active">Master</li>
                <li class="breadcrumb-item active">Confirmed Order List</li>
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
                                        {{-- <th>Product</th> --}}
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
                                    @foreach($orders as $item)
                                    <tr id="emptyRow" style="height: 25px;">
                                        <td>{{$serialNo}}</td>
                                        <td>{{$item->invoice_no}}</td>
                                        <td>@if($item->userrole_id == 1){{$item->user->name}} @else {{$item->seller->name}}@endif</td>
                                        <td>{{$item->amount}}</td>
                                        <td>
                                        <label for="">                              
                                                <span  class="badge badge-pill badge-warning text-white" style="background: #0000FF;"> Confirmed </span>
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
                                        <td><button type="button" class="btn btn-success" data-toggle="modal" data-target=".bd-example-modal-xl">Print</button></td>
                                        <td>
                                            <a href="{{ route('seller.confirmed.order.approve',$item->id) }}" class="btn btn-info" title="Edit Data"><i class="fa fa-eye"></i> Approve</a>
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