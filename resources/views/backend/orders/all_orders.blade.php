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
                                        {{-- <th>Shipping Label</th> --}}
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody id="tbodyList">
                                    @php
                                        $serialNo = 1;
                                    @endphp
                                    @foreach($orders as $item)
                                    <tr style="height: 25px;">
                                        <td>{{$serialNo}}</td>
                                        <td>{{$item->invoice_no}}</td>
                                        <td>{{$item->user->name}}</td>
                                        <td>{{$item->amount}}</td>
                                        <td>
                                        <label for="">                            
                                            @if($item->status == '0')        
                                                <span class="badge badge-pill badge-warning text-white" style="background: #800080;"> Pending </span>
                                                @elseif($item->status == '1')
                                                 <span class="badge badge-pill badge-warning text-white" style="background: #0000FF;"> Confirm </span>
                                                  @elseif($item->status == '2')
                                                 <span class="badge badge-pill badge-warning text-white" style="background: #FFA500;"> Processing </span>
                                        
                                                  @elseif($item->status == '3')
                                                 <span class="badge badge-pill badge-warning text-white" style="background: #808000;"> Picked </span>
                                        
                                                  @elseif($item->status == '4')
                                                 <span class="badge badge-pill badge-warning text-white" style="background: #808080;"> Shipped </span>
                                        
                                                  @elseif($item->status == '5')
                                                 <span class="badge badge-pill badge-warning text-white" style="background: #008000;"> Delivered </span>
                                                 @elseif($item->status == '6')
                                                 <span class="badge badge-pill badge-warning text-white" style="background: #80000b;"> Cancelled </span>
                                            @endif    
                                        </label>
                                    </td>
                                        {{-- <td> <span class="badge badge-pill badge-primary">{{ $item->status }} </span>  </td> --}}
                                        <td>
                                            <label for="">
                                            @if($item->payment_status == 'paid')
                                            <a class="badge badge-pill badge-warning text-white" style="background: #008000;" href="{{ route('order.unpaid_status.update',$item->id) }}"> Paid </a>
                                            @elseif($item->payment_status == 'Unpaid')
                                            <a class="badge badge-pill badge-warning text-white" style="background: #f50418;" href="{{ route('order.paid_status.update',$item->id) }}"> UnPaid </a>
                                            @endif
                                            </label>                   
                                        </td>
                                        <td>{{$item->payment_type}}</td>    
                                        {{-- <td>
                                            <a class="btn btn-success" href="{{ route('order.print.modal',$item->id) }}"  class="btn btn-success">Print</a>
                                            <button id="{{ $item->id }}" onclick="doprintorder(this.id)">Print</button>
                                        </td> --}}
                                        <td>
                                            <a href="{{ route('order.details',$item->id) }}" class="btn btn-info" title="View / Edit Data"><i class="fa fa-eye"></i>View / Edit </a>
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

{{-- <!-- Modal -->
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
                        <h6 class="pl-5"><span id="street_add"></span>,</br> 
                        <span id="city_name"></span>,</br>
                        <span id="state_name"></span>,</br>
                         <span id="pin_code"></span>,</br>
                         <span id="phone"></span>.</h6>                    
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                {{-- <button type="button" class="btn btn-success ">Print</button> --}}
{{--                 
                 <button type="submit" onclick="window.print();" id="print" class="btn btn-success" >Print</button>
                <script src="{{ asset('backend/nafil/js/jquery.js') }}"></script>
                <script src="{{ asset('backend/nafil/js/jquery.print.js') }}"></script>
                <script src="{{ asset('backend/nafil/js/scripts.js') }}"></script> --}}
               
                {{-- <button type="button" class="btn btn-dark" data-dismiss="modal">Close</button> --}}
                {{-- <button type="button" class="btn btn-primary">Save changes</button> --}}
            </div>
        </div>
    </div>
</div>
<!-- Modal end -->
<script>
//     function doprintorder(id){
//     $.ajax({
//         type: 'GET',
//         url: '/order/print/modal/'+id,
//         dataType:'json',
//         success:function(data){
//             // console.log(data)
         
//         }
//     })
 
// }
// function doprintorder(OID){
//         window.open("backend/orders/print?id=" + OID);
//     }
</script> 
@endsection