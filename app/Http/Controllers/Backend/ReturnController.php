<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Order;
use Illuminate\Http\Request;

class ReturnController extends Controller
{
    public function ReturnRequest(){

    	$orders = Order::where('return_order',1)->orderBy('id','DESC')->get();
    	return view('backend.return_order.return_request',compact('orders'));
    }

    public function sellerReturnRequest()
    {
    	$orders = Order::where('return_order',1)->where('user_id',request()->user_id)->orderBy('id','DESC')->get();
    	return view('backend.return_order.seller_return_request',compact('orders'));
    }

    public function ReturnRequestApprove($order_id){

    	Order::where('id',$order_id)->update(['return_order' => 2]);

    	$notification = array(
            'message' => 'Return Order Successfully',
            'alert-type' => 'success'
        );

        return redirect()->back()->with($notification);


    } // end mehtod 

    public function sellerReturnRequestApprove($order_id){

    	Order::where('id',$order_id)->update(['return_order' => 2]);

    	$notification = array(
            'message' => 'Return Order Successfully',
            'alert-type' => 'success'
        );

        return redirect()->back()->with($notification);
    }

    public function ReturnAllRequest(){

    	$orders = Order::where('return_order',2)->orderBy('id','DESC')->get();
    	return view('backend.return_order.all_return_request',compact('orders'));

    }

    public function sellerReturnAllRequest()
    {
    	$orders = Order::where('return_order',2)->orderBy('id','DESC')->get();
    	return view('backend.return_order.seller_all_return_request',compact('orders'));
    }

}
