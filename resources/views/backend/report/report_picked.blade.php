@extends('admin.admin_master')
@section('admin')
@section('title')
Picked Report 
@endsection
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<div class="page-content">
    <section class="content-header">
        <div class="container-fluid">
          <div class="row mb-2">
            <div class="col-sm-6">
              <h5>Picked Report</h5>
            </div>
            <div class="col-sm-6">
              <ol class="breadcrumb float-sm-right">
                <li class="breadcrumb-item"><a href="{{route('dashboard')}}">Home</a></li>
                <li class="breadcrumb-item active">Master</li>
                <li class="breadcrumb-item active">Picked Report</li>
              </ol>
            </div>
          </div>
        </div><!-- /.container-fluid -->
    </section>
</div>

<div class="row">
    <div class="col-md-12">
        <div class="card">
            <div class="card-header">
            {{-- <h3 class="card-title">Product List</h3> --}}
            </div>
            <div class="card-body">
                <div class="row">
                    <div class="col-md-6">
                        {{-- <div>
                            <label for="product">Product</label>
                            <select id="product_id" name="product_id[]" class="form-control">
                                @foreach($products as $product)
                                <option value="{{$product->id}}">{{$product->product_name}}</option>
                                @endforeach
                            </select><br>
                        </div> --}}
                        {{-- <label for="">Date</label> --}}

                        <div class="form-group">
							<button type="button" class="btn btn-flat btn-default" id="btnDate" style="height: 36px;">
								<i data-feather="calendar" class="text-primary"></i><span id="spnDate" style="padding-left: 5px;">Today</span>
							</button> 
						</div>
                       </div>
                    <div class="col-md-6">

                       
                    </div>
                </div>

                <div class="row">
                    <div class="col-md-12">
                        <div class="table-responsive">
                            <table id="dataTablepicked" class="table table-bordered">
                                <thead>
                                    <tr>
                                        {{-- <th>Product Name</th>
                                        <th>Product Image</th>
                                        <th>Product Sku</th> --}}
                                        <th>Date </th>
                                        <th>Customer Name </th>
                                        <th>Invoice </th>
                                        <th>Amount </th>
                                        <th>Payment Status </th>
                                        <th>Payment Method </th>
                                    </tr>
                                </thead>
                                    <tbody id="tbodyList">
    
                                    </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<script type="text/javascript" src="https://cdn.jsdelivr.net/jquery/latest/jquery.min.js"></script>
<script type="text/javascript" src="https://cdn.jsdelivr.net/momentjs/latest/moment.min.js"></script>

<script type="text/javascript">
    
    var table = "";
	var FromDate = moment().format('YYYY/MM/DD');
	var ToDate = moment().format('YYYY/MM/DD');

    $(document).ready(function(){
        $("#btnDate").daterangepicker(
        {
            ranges: {
                'Today': [moment(), moment()],
                'Yesterday': [moment().subtract('days', 1), moment().subtract('days', 1)],
                'Last 7 Days': [moment().subtract('days', 6), moment()],
                'Last 30 Days': [moment().subtract('days', 29), moment()],
                'This Month': [moment().startOf('month'), moment().endOf('month')],
                'Last Month': [moment().subtract('month', 1).startOf('month'), moment().subtract('month', 1).endOf('month')]
            },
            startDate: moment(),
            endDate: moment()
        },
        function (start, end) {
            FromDate = start.format('YYYY/MM/DD')
            ToDate = end.format('YYYY/MM/DD')
            table.destroy();
            listreportpicked();
            $("#spnDate").html($(".ranges > ul > li[class='active']").text());
        }
        );
        listreportpicked();
    });


    function listreportpicked(){
    
    $.ajax({
        url: '/order/picked-wise-report',
        method: 'POST',
        data: '&FromDate=' + FromDate +'&ToDate=' + ToDate
    
    }).done(function(fees){ 
         
    $('#tbodyList tr').empty();
	
	var List="";
    $.each(fees.data,function(idx,val){  

		List +="<tr>";	
		// List +="<td>"+val.product.product_name+"</td>";
		// List +="<td>"+'<img src="../'+val.product.product_image+'" style="height:100px; width:100px;">'+"</td>";
		// List +="<td>"+val.product.product_sku+"</td>";
		List +="<td>"+val.order_date+"</td>";
		List +="<td>"+val.name+"</td>";
		List +="<td>"+val.invoice_no+"</td>";
		List +="<td>"+val.amount+"</td>";
		List +="<td>"+val.payment_status+"</td>";
		List +="<td>"+val.payment_type+"</td>";
		List +="</tr>";	
        });
				
		$('#tbodyList').html(List);
        table = $('#dataTablepicked').DataTable({
      "aLengthMenu": [
        [10, 30, 50, -1],
        [10, 30, 50, "All"]
      ],
      "iDisplayLength": 10,
      "language": {
        search: ""
      }
    });
    });
}
</script>
@endsection



