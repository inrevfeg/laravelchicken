<?php

namespace App\Http\Controllers\Frontend\User;

use App\Http\Controllers\Controller;
use App\Mail\OrderMail;
use App\Models\Cart;
use App\Models\Order;
use App\Models\OrderItem;
use App\Models\Product;
use App\Models\User;
use Pdf;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Mail;
class CashController extends Controller
{
    public function CashOrder(Request $request){
	// $total_amount= Cart::where('user_id',Auth::user()->id)->sum('total');
	$cart_true=$request->cart_true;
	$shippingCharge=$request->shipping_charge;

	$buy_product_name=$request->buy_now_product_name;
	$buy_product_qty=$request->buy_now_product_qty;
	$buy_product_id=$request->buy_now_product_id;

	$buy_price=$request->buy_now_price;
	$buy_total=$request->buy_now_total;

	$cart_subtotal=$request->cart_subtotal;
	$cart_total=$request->cart_total;

    if($request->cart_true==1)
    {
    $total_amount= $cart_total;
    $sub_total= $cart_subtotal;
    }else{
    $total_amount= $buy_total;
	$sub_total= $buy_price;

    }

     $order_id = Order::insertGetId([
     	'user_id' => Auth::user()->id,
     	'door_no' => $request->door_no,
     	'street_address' => $request->street_address,
     	'city_name' => $request->city_name,
     	'state_name' => $request->state_name,
     	'name' => $request->name,
     	'email' => $request->email,
     	'phone' => $request->phone,
     	'pin_code' => $request->pin_code,

     	'payment_type' => 'Cash On Delivery',
     	'payment_status' => 'Unpaid',
     	// 'customer_type' => 'Unpaid',

     	'currency' =>  'INR',
     	'amount' => $total_amount,
     	'sub_total' => $sub_total,
     	'shipping_charge' => $shippingCharge,


     	'invoice_no' => 'Food'.mt_rand(10000000,99999999),
     	'order_date' => Carbon::now()->format('d F Y'),
     	'order_month' => Carbon::now()->format('F'),
     	'order_year' => Carbon::now()->format('Y'),
     	'status' => '0',
     	'created_at' => Carbon::now(),	 

     ]);
	 if($request->cart_true==1){
	 $carts = Cart::where('user_id',Auth::user()->id)->get();
		foreach ($carts as $cart) {
			OrderItem::insert([
				'order_id' => $order_id, 
				'product_id' => $cart->product_id,
				'qty' => $cart->qty,
				'price' => $cart->price,
				'created_at' => Carbon::now(),
			]);

	
		}
	}else{

			OrderItem::insert([
				'order_id' => $order_id, 
				'product_id' => $buy_product_id,
				'qty' => $buy_product_qty,
				'price' => $buy_price,
				'created_at' => Carbon::now(),
			]);

		
	}



    //  Start Send Email 
		// $order = Order::with('user')->where('id',$order_id)->where('user_id',Auth::id())->first();
		// $orderItem = OrderItem::with('product')->where('order_id',$order_id)->orderBy('id','DESC')->get();
		
		// $pdf = PDF::loadView('frontend.user.order.order_invoice',compact('order','orderItem'));
		// Mail::to($request->email)->send(new OrderMail($pdf));
		
		
		
		if(Auth::user()->door_no == NULL){
		$user= User::where('id', Auth::user()->id)->first();
		$user->door_no = $request->door_no;
		$user->street_address = $request->street_address;
		$user->city_name = $request->city_name;
		$user->state_name = $request->state_name;
		$user->pin_code = $request->pin_code;
		$user->name = $request->name;
		$user->phone = $request->phone;
		$user->update();
		}



    //  End Send Email 
	if($request->cart_true==1){
		$rowId= Cart::where('user_id',Auth::user()->id)->get();
		Cart::destroy($rowId);
		// foreach ($rowId as $Id) {
		// 	Cart::find($Id->id)->delete();
		// }
	}

     $notification = array(
			'message' => 'Your Order Place Successfully',
			'alert-type' => 'success'
		);

		return redirect()->route('dashboard')->with($notification);


    } // end method 

}
