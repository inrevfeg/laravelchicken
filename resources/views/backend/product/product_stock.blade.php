
@extends('admin.admin_master')
@section('admin')
@section('title')
Product List 
@endsection
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
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
                                        <th>Product Sku</th>
                                        <th>Sale Price</th>
                                        <th>Product Stock Update</th>
                                    </tr>
                                </thead>
                                <tbody id="tbodyList">
                                    @php
                                        $serialNo = 1;
                                    @endphp
                                    @foreach ($products as $item )
                                    <tr id="emptyRow" style="height: 25px;">
                                        <td>{{$serialNo}}</td>
                                        <td><img src="{{ asset($item->product_image) }}" style="width: 60px; height: 50px;"></td>
                                        <td>{{$item->product_name}}</td>
                                        <td>{{$item->product_sku}}</td>               
                                        <td>{{$item->product_discount}}</td>
                                        
                                       <td>
                                        <table>
                                            <tr>
                                           <td>
                                            <form action="{{route('product.quantity.update')}}" method="POST">
                                                @csrf
                                            <input type="text"  name="current_qty" id="current_qty" class="form-control" maxlength="50" title="Please enter Quantity" value=" {{$item->current_stock}}">
                                           </td>
                                           <td>                                      
                                                <input type="hidden" name="product_id" value="{{$item->id}}">
                                                <button  type="submit" title="Delete" class="btn btn-info"><i class="fa fa-eye"></i>Update</button>
                                            </form>
                                            </td>
                                        </tr></table>
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
{{-- <script>
     $(document).ready(function() { 

$("#product_sku").change(function() { 
     //your route
     $.get("student/getTableRows/"+$(this).val(), function(html) { 
         // append the "ajax'd" data to the table body 
         $("#products-table tbody").append(html); 

    }); 

}); 
});
</script> --}}
{{-- <script>
    $(document).ready(function() {
      $('#upazila_id').on('change', function() {
        getFilterData();
      });
      $('#fiscal_year').on('change', function (e) {
                  getFilterData();
      });
  });
  function getFilterData() {

    $.ajax({
      type: "GET",
      data: {
       upazila_id: $("[name=upazila_id]").val(),
       fiscal_year: $("[name=fiscal_year]").val()
      },
      url: "{{url('adc/upazila-wise-report')}}",
      success:function(data) {
        $("#report_data_table").html(data);
      }
    });
  }
</script> --}}

@endsection
