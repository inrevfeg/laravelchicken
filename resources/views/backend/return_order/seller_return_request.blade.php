@extends('admin.admin_master')
@section('admin')
@section('title')
Return Orders List
@endsection
<div class="page-content">
    <section class="content-header">
        <div class="container-fluid">
          <div class="row mb-2">
            <div class="col-sm-6">
              <h5>Return Orders List </h5>
            </div>
            <div class="col-sm-6">
              <ol class="breadcrumb float-sm-right">
                <li class="breadcrumb-item"><a href="{{route('dashboard')}}">Home</a></li>
                <li class="breadcrumb-item active">Master</li>
                <li class="breadcrumb-item active">Return Orders List</li>
              </ol>
            </div>
          </div>
        </div><!-- /.container-fluid -->
    </section>
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    {{-- <h3 class="card-title">Return Orders List</h3> --}}
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
                                        <th>Payment Status</th>
                                        <th>Payment Method</th>
                                        <th>Status</th>
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
                                        <td><span class="badge badge-pill badge-warning">{{ $item->payment_status }} </span></td>
                                        <td>{{$item->payment_type}}</td>  
                                        <td>
                                            @if($item->return_order == 1)
                                          <span class="badge badge-pill badge-primary">Pending </span>
                                           @elseif($item->return_order == 2)
                                           <span class="badge badge-pill badge-success">Success </span>
                                            @endif
                                    
                                              </td>
                                        <td>
                                            <a href="{{ route('seller.return.approve',$item->id) }}" class="btn btn-danger">Approve </a>
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