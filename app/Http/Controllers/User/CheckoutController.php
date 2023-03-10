<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\Cart;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\str;
use Razorpay\Api\Api;
use Carbon\Carbon;
use App\Models\Order;
use App\Models\OrderItem;
use Illuminate\Support\Facades\Mail;
use App\Mail\OrderMail;
use App\Models\Product;
use App\Models\ShippingCharge;
use App\Models\User;
use Pdf;
use Anand\LaravelPaytmWallet\Facades\PaytmWallet;
use App\Paytm;


class CheckoutController extends Controller
{
    private $razorpayId ="rzp_test_bUcyzVDkdztvea";
    private $razorpaykey="s1BI0kDv3nEaTehLWoLPQQGJ";

    public function CheckoutStore(Request $request){

        if ($request->payment_method == 'razorpay') {
          $cart_true=$request->cart_true;
          $shipping_charge=$request->cartShipping_charge;
          if($request->cart_true==1)
          {
            $cartTotal= Cart::where('user_id',Auth::user()->id)->sum('total');
            $sub_total= $cartTotal;
            $total_amount=$cartTotal + $shipping_charge; 
          }else{
          $buy_price= $request->buy_now_price;
          $sub_total= $buy_price;
          $total_amount=$buy_price + $shipping_charge;
          }
            
            $receiptId= Str::random(20);
            $api = new Api($this->razorpayId, $this->razorpaykey);
            $order= $api->order->create([
               'receipt' => $receiptId,
               'amount' => $total_amount * 100,
               'currency' => 'INR',
             ]); 
   
             $response = [
              "order_id"          => $order['id'],
              "razorpayId"          => $this->razorpayId,
              "amount"            => $total_amount * 100,
              "name"            => $request->shipping_name,
              'currency' => 'INR',
              "email"   => $request->shipping_email,
              "phone"   => $request->shipping_phone
              // "address"   => $request->address,
   
   
             ];
          //  $total_amount= Cart::where('user_id',Auth::user()->id)->sum('total');
            $data = array();
            $data['shipping_name'] = $request->shipping_name;
            $data['cart_true'] = $request->cart_true;
            $data['buy_now_product_name'] = $request->buy_now_product_name;
            $data['buy_now_product_qty'] = $request->buy_now_product_qty;
            $data['buy_now_product_id'] = $request->buy_now_product_id;
            $data['buy_now_price'] = $request->buy_now_price;
            $data['total_amount'] = $total_amount;
            $data['sub_total'] = $sub_total;
            $data['shipping_charge'] = $shipping_charge;
            $data['shipping_email'] = $request->shipping_email;
            $data['shipping_phone'] = $request->shipping_phone;
            $data['door_no']     =    $request->door_no;
            $data['street_address'] = $request->street_address;
            $data['city_name'] = $request->city_name;
            $data['state_name'] = $request->state_name;
            $data['pin_code'] = $request->pin_code;
            $carts = Cart::where('user_id',Auth::user()->id)->get();
            $cartTotal= Cart::where('user_id',Auth::user()->id)->sum('total');
  
   
   
            return view('frontend.payment.razorpay_button', compact('response','data','carts','cartTotal'));
        }
        elseif($request->payment_method == 'paytm'){

          $cart_true=$request->cart_true;
         
          if($request->cart_true==1)
          {
          $shipping_charge=$request->cartShipping_charge;
            $cartTotal= Cart::where('user_id',Auth::user()->id)->sum('total');
            $sub_total= $cartTotal;
            $total_amount=$cartTotal + $shipping_charge; 
          }else{
          $buy_price= $request->buy_now_price;
          $sub_total= $buy_price;
          $shipping_charge=$request->buy_now_ship_charge;
          $total_amount=$request->buy_now_total;
          $buy_product_id=$request->buy_now_product_id;
          $buy_product_qty=$request->buy_now_product_qty;
          
          }

          
            // $amount = 1500; //Amount to be paid

            $userData = [
                'order_id' => $request->shipping_phone."_".rand(1,1000), //Order id
                'user_id' => Auth::id(),
                'door_no' => $request->door_no,
                'street_address' => $request->street_address,
                'city_name' => $request->city_name,
                'state_name' => $request->state_name,
                'name' => $request->shipping_name,
                'email' => $request->shipping_email,
                'phone' => $request->shipping_phone,
                'pin_code' => $request->pin_code,
                'payment_type' => 'Razorpay',
                'payment_status' => 'paid',
                // 'r_payment_id' => $request->all()['razorpay_payment_id'],
  
                'currency' =>  'INR',
                'amount' => $total_amount,
                'sub_total' => $request->sub_total,
               'shipping_charge' => $shipping_charge,
       
                'invoice_no' => 'Food'.mt_rand(10000000,99999999),
                'order_date' => Carbon::now()->format('d F Y'),
                'order_month' => Carbon::now()->format('F'),
                'order_year' => Carbon::now()->format('Y'),
                'status' => 'pending',
                'created_at' => Carbon::now(),	 
            ];

            $paytmuser = Order::create($userData); // creates a new database record
            // dd($paytmuser);



            $payment = PaytmWallet::with('receive');
    
            $payment->prepare([
                'order' => $userData['order_id'], 
                'user' => $paytmuser->id,
                'mobile_number' => $userData['phone'],
                'email' => $userData['email'], // your user email address
                'amount' => $total_amount, // amount will be paid in INR.
                'callback_url' => route('status') // callback URL
            ]);

            if($request->cart_true==1){
              $carts = Cart::where('user_id',Auth::user()->id)->get();
               foreach ($carts as $cart) {
                 OrderItem::insert([
                   'order_id' => $paytmuser->id, 
                   'product_id' => $cart->product_id,
                   'qty' => $cart->qty,
                   'price' => $cart->price,
                   'created_at' => Carbon::now(),
                 ]);
           
             
               }
             }else{
           
                 OrderItem::insert([
                   'order_id' => $paytmuser->id, 
                   'product_id' => $buy_product_id,
                   'qty' => $buy_product_qty,
                   'price' => $buy_price,
                   'created_at' => Carbon::now(),
                 ]);
           
               
             }

            if(Auth::user()->door_no == NULL){
              $user= User::where('id', Auth::user()->id)->first();
              $user->door_no = $request->door_no;
              $user->street_address = $request->street_address;
              $user->city_name = $request->city_name;
              $user->state_name = $request->state_name;
              $user->pin_code = $request->pin_code;
              $user->name = $request->shipping_name;
              $user->phone = $request->shipping_phone;
              $user->update();
              }
          
          //  Start Send Email 
		$order = Order::with('user')->where('id',$paytmuser->id)->where('user_id',Auth::id())->first();
		$orderItem = OrderItem::with('product')->where('order_id',$paytmuser->id)->orderBy('id','DESC')->get();
		
		$pdf = PDF::loadView('frontend.user.order.order_invoice',compact('order','orderItem'));
		Mail::to($request->email)->send(new OrderMail($pdf));
		
          
              //  End Send Email 
            if($request->cart_true==1){
              $rowId= Cart::where('user_id',Auth::user()->id)->get();
              Cart::destroy($rowId);
              // foreach ($rowId as $Id) {
              // 	Cart::find($Id->id)->delete();
              // }
            }
            return $payment->receive();  // initiate a new payment

        }
        else{

          $cart_true=$request->cart_true;
          $data = array();
          $shipping_charge=$request->cartShipping_charge;  
          $data['shipping_name'] = $request->shipping_name;
          // $data['total_amount'] = $total_amount;
          $data['shipping_email'] = $request->shipping_email;
          $data['shipping_phone'] = $request->shipping_phone;
          $data['door_no'] = $request->door_no;
          $data['street_address'] = $request->street_address;
          $data['city_name'] = $request->city_name;
          $data['state_name'] = $request->state_name;
          $data['pin_code'] = $request->pin_code;
          $carts = Cart::where('user_id',Auth::user()->id)->get();
          $cartTotal= Cart::where('user_id',Auth::user()->id)->sum('total');
          $cart_total=$cartTotal + $shipping_charge;


          $buy_product_image=$request->buy_now_image;
          $buy_product_name=$request->buy_now_product_name;
          $buy_product_qty=$request->buy_now_product_qty;
          $buy_price=$request->buy_now_price;
          $buy_product_id=$request->buy_now_product_id;
          $buy_total=$request->buy_now_total;
          $buy_shipping_charge=$request->buy_now_ship_charge;  

          return view('frontend.payment.cash',compact('data','cartTotal','carts','cart_true','buy_product_name','buy_product_qty','buy_price','buy_product_id','shipping_charge','buy_total','cart_total','buy_product_image','buy_shipping_charge'));

        }

    }


      public function paymentCallback()
      {
          $transaction = PaytmWallet::with('receive');

          $response = $transaction->response();
          
          $order_id = $transaction->getOrderId(); // return a order id
        
          $transaction->getTransactionId(); // return a transaction id
      
          // update the db data as per result from api call
          if ($transaction->isSuccessful()) {
            Order::where('order_id', $order_id)->update(['paytm_status' => 1, 'transaction_id' => $transaction->getTransactionId()]);
              // return redirect(route('initiate.payment'))->with('message', "Your payment is successfull.");
              $notification = array(
                'message' => 'Your payment is successfull.',
                'alert-type' => 'success'
              );
                return redirect(route('dashboard'))->with($notification);

          } else if ($transaction->isFailed()) {
            Order::where('order_id', $order_id)->update(['paytm_status' => 0, 'transaction_id' => $transaction->getTransactionId()]);

            $notification = array(
              'message' => 'Your payment is failed.',
              'alert-type' => 'success'
            );
              return redirect(route('checkout'))->with($notification);
              // return redirect(route('initiate.payment'))->with('message', "Your payment is failed.");
              
          } else if ($transaction->isOpen()) {
            Order::where('order_id', $order_id)->update(['paytm_status' => 2, 'transaction_id' => $transaction->getTransactionId()]);
            
            $notification = array(
              'message' => 'Your payment is processing.',
              'alert-type' => 'success'
          );
              return redirect(route('checkout'))->with($notification);
          }
          $transaction->getResponseMessage(); //Get Response Message If Available
          
          // $transaction->getOrderId(); // Get order id
      }
}
