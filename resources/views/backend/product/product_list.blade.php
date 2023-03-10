@extends('admin.admin_master')
@section('admin')
@section('title')
Product List 
@endsection
<div class="page-content">
    <section class="content-header">
        <div class="container-fluid">
          <div class="row mb-2">
            <div class="col-sm-6">
              <h5>Product List </h5>
            </div>
            <div class="col-sm-6">
              <ol class="breadcrumb float-sm-right">
                <li class="breadcrumb-item"><a href="{{route('dashboard')}}">Home</a></li>
                <li class="breadcrumb-item active">Master</li>
                <li class="breadcrumb-item active">Product List</li>
              </ol>
            </div>
          </div>
        </div><!-- /.container-fluid -->
    </section>
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    {{-- <h3 class="card-title">Product List</h3> --}}
                </div>
                <div class="card-body">
                    <div class="col-md-12">
                        <div class="table-responsive">
                            <table id="dataTableExample" class="table table-bordered">
                                <thead>
                                    <tr>
                                        <th>#</th>
                                        <th>Image </th>
                                        <th>Product</th>
                                        <th>Actual Price</th>
                                        <th>Sale Price</th>
                                      
                                        <th>Discount</th>
                                        <th>Status</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody id="tbodyList">
                                    @php
                                        $serialNo = 1;
                                    @endphp
                                    @foreach ($products as $item )
                                    <tr id="emptyRow" style="height: 25px;">
                                        <td>{{$serialNo}}</td>
                                        <td><img src="{{ asset($item->productImage) }}" style="width: 60px; height: 50px;"></td>
                                        <td>{{$item->productName}}</td>
                                        <td>{{$item->productPrice}}</td>
                                        <td>{{$item->productDiscount}}</td>
                                      
                                        <td>
                                            @if($item->productDiscount == NULL)
                                            <span class="badge badge-pill badge-danger">No Discount</span>
                               
                                            @else
                                            @php
                                            $amount = $item->productPrice - $item->productDiscount;
                                            $discount = ($amount/$item->productPrice) * 100;
                                            @endphp
                                  <span class="badge badge-pill badge-danger">{{ round($discount)  }} %</span>
                               
                                            @endif
                               
                                        </td>
                                        <td>
                                            @if($item->status == 1)
                                            <span class="badge badge-pill badge-success"> Active </span>    
                                            @else
                                            <span class="badge badge-pill badge-danger"> InActive </span>
                                            @endif
                                        </td>
                                        <td>
                                            <a href="{{ route('product.edit',$item->id) }}" class="btn btn-info btn-sm btn-flat" title="Edit Data">Edit </a>
                                            <a href="{{ route('product.delete',$item->id) }}" class="btn btn-danger btn-sm btn-flat" title="Delete Data" id="delete">Delete</a>
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