<?php

namespace App\Http\Controllers\Frontend\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Razorpay\Api\Api;
use Carbon\Carbon;
use App\Models\Order;
use App\Models\OrderItem;
use Illuminate\Support\Facades\Mail;
use App\Mail\OrderMail;
use App\Models\Cart;
use App\Models\Product;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\str;
use Pdf;

class RazorpayController extends Controller
{
    // private $razorpayId ="rzp_live_sKMVtuSlUa5XJl";
    // private $razorpaykey="UlM9jDy4Z14DxtWtTUOudPL2";
    private $razorpayId ="rzp_test_bUcyzVDkdztvea";
    private $razorpaykey="s1BI0kDv3nEaTehLWoLPQQGJ";
    
    // public function RazorpayOrder(Request $request)
    // {
    //     $receiptId= Str::random(20);
    //      $api = new Api($this->razorpayId,$this->razorpaykey);
    //      $order= $api->order->create([
    //         'receipt' => $receiptId,
    //         'amount' => $request->amount * 100,
    //         'currency' => 'INR'
    //       ]); 

    //       $response = [
    //         "order_id"          => $order['id'],
    //         "razorpayId"          => $this->razorpayId,
    //         "amount"            => $request->amount * 100,
    //         "name"            => $request->name,
    //         'currency' => 'INR',
    //         "email"   => $request->email,
    //         "phone"   => $request->phone
    //         // "address"   => $request->address,


    //       ];
	// 	$total_amount= Cart::where('user_id',Auth::user()->id)->sum('total');
    //       $data = array();
    //       $data['shipping_name'] = $request->name;
    //       $data['total_amount'] = $total_amount;
    //       $data['shipping_email'] = $request->email;
    //       $data['shipping_phone'] = $request->phone;
    //       $data['door_no']     =    $request->door_no;
    //       $data['street_address'] = $request->street_address;
    //       $data['city_name'] = $request->city_name;
    //       $data['state_name'] = $request->state_name;
    //       $data['pin_code'] = $request->pin_code;
    //       $carts = Cart::where('user_id',Auth::user()->id)->get();
    //       $cartTotal= Cart::where('user_id',Auth::user()->id)->sum('total');



    //       return view('frontend.payment.razorpay_button', compact('response','data','carts','cartTotal'));

    // }
        public function RazorpayComplete(Request $request){
           $signatureStatus= $this->signatureVerify(
            $request->all()['razorpay_signature'],
            $request->all()['razorpay_payment_id'],
            $request->all()['razorpay_order_id']
           );
           if($signatureStatus==true){
            
            $order_id = Order::insertGetId([
                'user_id' => Auth::id(),
                'userrole_id' => Auth::user()->userrole_id,
                'door_no' => $request->door_no,
                'street_address' => $request->street_address,
                'city_name' => $request->city_name,
                'state_name' => $request->state_name,
                'name' => Auth::user()->name,
                'email' => $request->email,
                'phone' => $request->phone,
                'pin_code' => $request->pin_code,
                'payment_type' => 'Razorpay',
                'payment_status' => 'paid',
                'r_payment_id' => $request->all()['razorpay_payment_id'],

                'currency' =>  'INR',
                'amount' => $request->amount/100,
                'sub_total' => $request->sub_total,
     	        'shipping_charge' => $request->shipping_charge,
       
                'invoice_no' => 'Food'.mt_rand(10000000,99999999),
                'order_date' => Carbon::now()->format('d F Y'),
                'order_month' => Carbon::now()->format('F'),
                'order_year' => Carbon::now()->format('Y'),
                'status' => 'pending',
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

                $buy_product_name=$request->buy_now_product_name;
                $buy_product_qty=$request->buy_now_product_qty;
                $buy_price=$request->buy_now_price;
                $buy_product_id=$request->buy_now_product_id;
           
                       OrderItem::insert([
                           'order_id' => $order_id, 
                           'product_id' => $buy_product_id,
                           'qty' => $buy_product_qty,
                           'price' => $buy_price,
                           'created_at' => Carbon::now(),
                       ]);
           
                  
               }



                // Start Send Email 
                // $order = Order::with('user')->where('id',$order_id)->where('user_id',Auth::id())->first();
                // $orderItem = OrderItem::with('product')->where('order_id',$order_id)->orderBy('id','DESC')->get();
               
                //  $pdf = PDF::loadView('frontend.user.order.order_invoice',compact('order','orderItem'));
                //  Mail::to($request->email)->send(new OrderMail($pdf));

                //  Http::post('http://pay4sms.in/sendsms/?token=9a2edf41bc2760c4c5bb0b592eaf7bfb&credit=2&sender=NITHTX&message=Thank you for your purchase!. Your order is placed and its pending and will be Confirmed shortly. Nithitex. &number=7845037463');	

                // End Send Email 
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
                    

                    if($request->cart_true==1){
                $rowId= Cart::where('user_id',Auth::user()->id)->get();
		        Cart::destroy($rowId);
                    }

                // foreach ($rowId as $Id) {
                //  Cart::find($Id->id)->delete();
                // }
                $notification = array(
                    'message' => 'Your Order could  Place Successfully',
                    'alert-type' => 'success'
                );
    
            return redirect()->route('dashboard')->with($notification);
           }
           else{
            $notification = array(
                'message' => 'Your Order could not be Place Successfully',
                'alert-type' => 'success'
            );
    
            return redirect()->route('dashboard')->with($notification);

           }
        }
        private function signatureVerify($_signature,$_paymentId,$_orderId)
        {
            try{
                $api = new Api($this->razorpayId,$this->razorpaykey);
                $attributes  = array('razorpay_signature'  => $_signature,  'razorpay_payment_id'  => $_paymentId ,  'razorpay_order_id' => $_orderId);
                $order  = $api->utility->verifyPaymentSignature($attributes);
                return true;
            }
            catch(\Exception $e)
            {
                return false;
            }
            

        }
        
    
}
