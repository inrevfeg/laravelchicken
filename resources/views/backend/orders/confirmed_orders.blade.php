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
                                            <a class="badge badge-pill badge-warning text-white" style="background: #008000;" href=""> Paid </a>
                                            {{-- {{ route('order.unpaid_status.update',$item->id) }} --}}
                                            @elseif($item->payment_status == 'Unpaid')
                                            <a class="badge badge-pill badge-warning text-white" style="background: #f50418;" href="{{ route('order.paid_status.update',$item->id) }}"> UnPaid </a>
                                            @endif
                                            </label>                   
                                        </td>
                                        <td>{{$item->payment_type}}</td> 
                                        <td>
                                            {{-- <button type="button" class="btn btn-success" data-toggle="modal" data-target=".bd-example-modal-xl">Print</button> --}}
                                            <a class="btn btn-success" href="{{ route('order.print.modal',$item->id) }}"  class="btn btn-success">Print</a>
                                        </td>
                                        <td>
                                            <a href="{{ route('confirmed.order.approve',$item->id) }}" class="btn btn-info" title="Edit Data"><i class="fa fa-eye"></i> Approve</a>
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

<!-- Modal -->
<div class="modal fade bd-example-modal-xl" tabindex="-1" role="dialog" aria-labelledby="myExtraLargeModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-xl">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Print Shipping Label</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="row">
                    <div class="col-lg-6">
                        <h2>From</h2>
                        <h6 class="pl-5">Arasa guru,</br>
                        301,ambedkarnagar 3rd Street,</br> 
                        Sundaravelpuram West,</br>
                        Tuticorin,</br>
                        tamilnadu,</br>
                        628002,</br>
                        9894252874.</h6>
                    </div>  
                    <div class="col-lg-6">
                        <h2>To</h2>
                        <h6 class="pl-5">Arasa guru,</br>
                        301,ambedkarnagar 3rd Street,</br> 
                        Sundaravelpuram West,</br>
                        Tuticorin,</br>
                        tamilnadu,</br>
                        628002,</br>
                        9894252874.</h6>
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-success">Print</button>
                <button type="button" class="btn btn-dark" data-dismiss="modal">Close</button>
                {{-- <button type="button" class="btn btn-primary">Save changes</button> --}}
            </div>
        </div>
    </div>
</div>
<!-- Modal end -->

@endsection