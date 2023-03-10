<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class BuyNowController extends Controller
{
    public function ProductBuyNow($id){
      if (Auth::check()) {
        $product = Product::with('category')->findOrFail($id);
        $cart_true=0;
        $quantity=1;
        if ($product->productDiscount == 0.00) {
          $buynow_price=$product->productPrice;
        }else{
          $buynow_price=$product->productDiscount;
        }
        $product_id=$product->id;
        $product_shipping_charge =$product->productShipCharge;
        $total=$buynow_price + $product_shipping_charge;
        return view('frontend.checkout.checkout_view',compact('product','cart_true','quantity','buynow_price','product_id','product_shipping_charge','total'));
      }else{
	
					$notification = array(
					'message' => 'You Need to Login First',
					'alert-type' => 'error'
				);
	
				return redirect()->route('login')->with($notification);
      }
	  } // end method 
}
