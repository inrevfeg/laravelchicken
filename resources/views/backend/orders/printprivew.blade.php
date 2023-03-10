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

