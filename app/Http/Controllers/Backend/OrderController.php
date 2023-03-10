<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Order;
use App\Models\OrderItem;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class OrderController extends Controller
{
    public function orderView(){
		$orders = Order::with('user')->orderBy('id','DESC')->get();
		return view('backend.orders.all_orders',compact('orders'));

	} // end mehtod 

   
    // Pending Order Details 
    public function OrdersDetails($order_id){

        $order = Order::with('user')->where('id',$order_id)->first();
        // dd($order);
        $orderItem = OrderItem::with('product')->where('order_id',$order_id)->orderBy('id','DESC')->get();
        return view('backend.orders.orders_details',compact('order','orderItem'));

    } // end method 

   
    public function OrderStatusUpdate(Request $request){
            $id = $request->order_id;
            Order::findOrFail($id)->update([
                'status' => $request->order_status,
                // 'payment_status' => $request->payment_status,
            ]);
            // $mobile = Order::where('id', $id)->pluck('phone')->first();
            if($request->order_status == 0){
                // Http::post('http://pay4sms.in/sendsms/?token=9a2edf41bc2760c4c5bb0b592eaf7bfb&credit=2&sender=NITHTX&message=Your order is pending and will be Confirmed shortly. Check your status here: https://nithitex.com/track-your-order , Nithitex&number='.$mobile.'');
                
            }elseif($request->order_status == 1){

                Order::findOrFail($id)->update([
                    'confirmed_date' => Carbon::now()
                ]);

            }elseif($request->order_status == 2){

                Order::findOrFail($id)->update([
                    'processing_date' => Carbon::now()
                ]);

            }elseif($request->order_status == 3){

                Order::findOrFail($id)->update([
                    'picked_date' => Carbon::now()
                ]);

            }elseif($request->order_status == 4){

                Order::findOrFail($id)->update([
                    'shipped_date' => Carbon::now()
                ]);

            }elseif($request->order_status == 5){

                Order::findOrFail($id)->update([
                    'delivered_date' => Carbon::now()
                ]);

            }elseif($request->order_status == 6){

                Order::findOrFail($id)->update([
                    'cancel_date' => Carbon::now()
                ]);
            }
    
            $notification = array(
                'message' => 'Order Updated Successfully',
                'alert-type' => 'success'
            );
    
            return redirect()->back()->with($notification);

    } // end mehtod 



    public function PaymentunApprove($order_id){

    	Order::where('id',$order_id)->update([
            'payment_status' => "Unpaid"
         ]);

    	$notification = array(
            'message' => 'Payment Unpaid Successfully',
            'alert-type' => 'success'
        );

        return redirect()->back()->with($notification);


    } // end mehtod 

  
    public function PaymentpaidApprove($order_id){

    	Order::where('id',$order_id)->update([
            'payment_status' => "paid"
        ]);

    	$notification = array(
            'message' => 'Payment Paid Successfully',
            'alert-type' => 'success'
        );

        return redirect()->back()->with($notification);


    } // end mehtod 

  
    // Pending Orders 
	public function PendingOrders(){
		$orders = Order::where('status','0')->orderBy('id','DESC')->get();

		return view('backend.orders.pending_orders',compact('orders'));

	} // end mehtod 

   
    public function PendingApprove($order_id)
    {
    	Order::where('id',$order_id)->update([
            'status' => 1
        ]);

    	$notification = array(
            'message' => 'Order Confirmed  Successfully',
            'alert-type' => 'success'
        );

        return redirect()->back()->with($notification);
    }
   

        // Confirmed Orders 
	public function ConfirmedOrders(){
		$orders = Order::where('status','1')->orderBy('id','DESC')->get();
		return view('backend.orders.confirmed_orders',compact('orders'));


	} // end mehtod 

 
    public function confirmedApprove($order_id){

    	Order::where('id',$order_id)->update([
            'status' => 2,
            'confirmed_date' => Carbon::now()
        ]);

    	$notification = array(
            'message' => 'Order Processing Successfully',
            'alert-type' => 'success'
        );

        return redirect()->back()->with($notification);


    } // end mehtod 

   

	// Processing Orders 
	public function ProcessingOrders(){
		$orders = Order::where('status','2')->orderBy('id','DESC')->get();
		return view('backend.orders.processing_orders',compact('orders'));

	} // end mehtod 

    
    public function ProcessingApprove(Request $request){

    	

        $id = $request->order_id;
        Order::findOrFail($id)->update([
            'track_number' => $request->track_number
        ]);


    	$notification = array(
            'message' => 'Order Confirm Successfully',
            'alert-type' => 'success'
        );

        return redirect()->back()->with($notification);


    } // end mehtod 

  

		// Picked Orders 
	public function PickedOrders(){
		$orders = Order::where('status','3')->orderBy('id','DESC')->get();
		return view('backend.orders.picked_orders',compact('orders'));

	} // end mehtod 
   
    public function pickedApprove($order_id){

    	Order::where('id',$order_id)->update([
            'status' => 4
        ]);

    	$notification = array(
            'message' => 'Order Confirm Successfully',
            'alert-type' => 'success'
        );

        return redirect()->back()->with($notification);


    } // end mehtod 

   
			// Shipped Orders 
	public function ShippedOrders(){
		$orders = Order::where('status','4')->orderBy('id','DESC')->get();
		return view('backend.orders.shipped_orders',compact('orders'));

	} // end mehtod 

  
    
    public function shippedApprove($order_id){

    	Order::where('id',$order_id)->update([
            'status' => 5
        ]);

    	$notification = array(
            'message' => 'Order Confirm Successfully',
            'alert-type' => 'success'
        );

        return redirect()->back()->with($notification);


    } // end mehtod 

  

			// Delivered Orders 
	public function DeliveredOrders(){
		$orders = Order::where('status','5')->orderBy('id','DESC')->get();
		return view('backend.orders.delivered_orders',compact('orders'));

	} // end mehtod 
    // public function deliveredApprove($order_id){

    // 	Order::where('id',$order_id)->update([
    //         'status' => 6
    //     ]);

    // 	$notification = array(
    //         'message' => 'Payment Paid Successfully',
    //         'alert-type' => 'success'
    //     );

    //     return redirect()->back()->with($notification);


    // } // end mehtod 


	// Cancel Orders 
	public function CancelOrders(){
		$orders = Order::where('status','6')->orderBy('id','DESC')->get();
		return view('backend.orders.cancel_orders',compact('orders'));

	} // end mehtod 

    // public function cancelApprove($order_id){

    // 	Order::where('id',$order_id)->update([
    //         'payment_status' => "paid"
    //     ]);

    // 	$notification = array(
    //         'message' => 'Payment Paid Successfully',
    //         'alert-type' => 'success'
    //     );

    //     return redirect()->back()->with($notification);


    // } // end mehtod 


     	/// Product View With Ajax
	public function OrderprintAjax($id){
		$order = Order::with('user')->findOrFail($id);
        $orderitems = OrderItem::where('order_id',$order->id)->get();
        return view('backend.orders.print',compact('order'));
		// return response()->json(array(
		// 	'order' => $order,
		// 	'orderitems' => $orderitems

		// ));

	} // end method 
    public function prnpriview($id){
		$order = Order::with('user')->findOrFail($id);
        $orderitems = OrderItem::where('order_id',$order->id)->get();
        return view('backend.orders.printprivew',compact('order'));
		// return response()->json(array(
		// 	'order' => $order,
		// 	'orderitems' => $orderitems

		// ));

	} // end method


}
