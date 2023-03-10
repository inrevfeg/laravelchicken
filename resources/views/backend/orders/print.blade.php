<div class="container">
    <div class="row">
        <div class="col-md-8">
            <h1>From</h1>
            <h2>Arasa guru,<br>
            301,ambedkarnagar 3rd Street,<br> 
            Sundaravelpuram West,<br>
            Tuticorin,<br>
            tamilnadu,<br>
            628002,<br>
            9894252874.</h2>
        </div>  
        <div class="col-md-4">
            <h1>To</h1>
            <h2>@if($order->userrole_id == 1){{$order->user->name}} @else {{$order->seller->name}}@endif,<br>
            {{$order->door_no}},
            {{$order->street_address}},<br> 
            {{$order->city_name}},<br>
            {{$order->state_name}},<br>
            {{$order->pin_code}},<br>
            {{$order->phone}}.</h2>                    
        </div>
    </div> 
</div>
<center><a href="{{ route('prnpriview',$order->id) }}" class="btnprn btn btn-info btn-sm btn-flat"><i class="fa fa-print" style="font-size:36px;color:rgba(0, 30, 255, 0.921)"></i></a></center>              
         
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<link rel="stylesheet" href="{{ asset('frontend/assets/css/vendor/bootstrap.min.css')}}">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script src="{{ asset('backend/print/jquery.printpage.js') }}"></script>
<script src="{{ asset('backend/print/scripts.js') }}"></script>
<script type="text/javascript">
    $(document).ready(function(){
    $('.btnprn').printPage();
    });
</script>


