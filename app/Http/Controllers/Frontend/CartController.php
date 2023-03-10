<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Cart;
use App\Models\CartItem;
use App\Models\City;
use App\Models\Country;
use App\Models\Product;
use App\Models\State;
use App\Models\Wishlist;
use Carbon\Carbon;
// use Gloudemans\Shoppingcart\Facades\Cart;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CartController extends Controller
{
    public function AddToCart(Request $request, $id){
		if (Auth::check()) {

    	$product = Product::findOrFail($id);
		// dd($request->quantity);

    	if ($product->product_discount == 0.00) {
			$quantity=$request->quantity;
			$price=$product->product_price;
			$cart_total=$price *$quantity;
				Cart::create([
    			'product_id' => $id, 
    			'user_id' => Auth::user()->id,
    			'name' => $request->product_name, 
    			'qty' => $request->quantity, 
    			'price' => $product->product_price,
				'total' =>$cart_total,
    			'image' =>$product->product_image,
    			'shipping_charge' =>$product->productShipCharge
    			// 'options' => [
    			// 	'image' => $product->product_image
    			// ],
    		]);
			// $user_car_total= Cart::where('user_id',Auth::user()->id)->sum('total');
			
			// CartItem::createOrUpdate([
    		// 	'user_id' => Auth::user()->id,
    		// 	'total_amount' => $user_car_total
    		// ]);


    		return response()->json(['success' => 'Successfully Added on Your Cart']);
    	}else{
             $quantity=$request->quantity;
             $price=$product->product_discount;
			 $cart_total=$price *$quantity;
    		Cart::create([
    			'product_id' => $id, 
    			'user_id' => Auth::user()->id,
    			'name' => $request->product_name, 
    			'qty' => $request->quantity, 
    			'price' => $product->product_discount,
    			'total' =>$cart_total,
    			'image' =>$product->product_image,
    			'shipping_charge' =>$product->productShipCharge

    			// 'options' => [
    			// 	'image' => $product->product_image
    			// ],
    		]);
    		return response()->json(['success' => 'Successfully Added on Your Cart']);
    	}
		}else{
		
			return response()->json(['error' => 'At First Login Your Account']);

		}

    } // end mehtod 
	public function simpleAddToCart(Request $request, $id){
		if (Auth::check()) {

    	$product = Product::findOrFail($id);
		// dd($product);

    	if ($product->productDiscount == 0.00) {
			$quantity=1;
			$price=$product->productPrice;
			$cart_total=$price *$quantity;
				Cart::create([
    			'product_id' => $id, 
    			'user_id' => Auth::user()->id,
    			'name' => $product->productName, 
    			'qty' => 1, 
    			'price' => $product->productPrice,
				'total' =>$cart_total,
    			'image' =>$product->productImage,
    			'shipping_charge' =>$product->productShipCharge

    		]);

    		return response()->json(['success' => 'Successfully Added on Your Cart']);
    	}else{
             $quantity=1;
             $price=$product->productDiscount;
			 $cart_total=$price *$quantity;
    		Cart::create([
    			'product_id' => $id, 
    			'user_id' => Auth::user()->id,
    			'name' => $product->productName, 
    			'qty' => 1, 
    			'price' => $product->productDiscount,
    			'total' =>$cart_total,
    			'image' =>$product->productImage,
    			'shipping_charge' =>$product->productShipCharge

    			
    		]);
    		return response()->json(['success' => 'Successfully Added on Your Cart']);
    	}
		}else{
		
			return response()->json(['error' => 'At First Login Your Account']);

		}

    } // end mehtod 


	public function AddMiniCart(){
		if (Auth::check()) {

		$carts = Cart::where('user_id',Auth::user()->id)->get();
		$cartTotal= Cart::where('user_id',Auth::user()->id)->sum('total');
		$cartQty= Cart::where('user_id',Auth::user()->id)->get()->count('id');

		// $carts = Cart::content();
		// $cartQty = Cart::count();
		// $cartTotal = Cart::total();
	
		return response()->json(array(
			'carts' => $carts,
			'cartQty' => $cartQty,
			'cartTotal' => $cartTotal,
	
		));
	}else{
		
		return response()->json(['error' => 'At First Login Your Account']);

	}
	} // end method 
	/// remove mini cart 
	public function RemoveMiniCart($rowId){
		// Cart::remove($rowId);
		$Cart = Cart::findOrFail($rowId);
    	$Cart->delete();
		return response()->json(['success' => 'Product Remove from Cart']);
	
	} 
	public function AddToWishlist(Request $request, $product_id){


		if (Auth::check()) {
	
			$exists = Wishlist::where('user_id',Auth::id())->where('product_id',$product_id)->first();
			if (!$exists) {
			Wishlist::insert([
				'user_id' => Auth::id(), 
				'product_id' => $product_id, 
				'is_favourite' =>1, 
				'created_at' => Carbon::now(), 
			]);

			$wishlistQty= Wishlist::where('user_id',Auth::user()->id)->count('id');

			// return response()->json(array(
			// 	'carts' => $wishlistQty,
			// 	'cartQty' => $cartQty,
			// 	'cartTotal' => $cartTotal,
		
			// ));
		   return response()->json(['wishlistQty' => $wishlistQty,'success' => 'Successfully Added On Your Wishlist']);
		   
		}else{
	
			return response()->json(['error' => 'This Product has Already on Your Wishlist']);
	
		}            
	
	
		}else{
	
			return response()->json(['error' => 'At First Login Your Account']);
	
		}
	
	} // end method
	        // Checkout Method 
			public function CheckoutCreate(){

				if (Auth::check()) {
				   $cartsubTotal= Cart::where('user_id',Auth::user()->id)->sum('total');
					if ($cartsubTotal > 0) {
				$carts = Cart::where('user_id',Auth::user()->id)->get();
				$cartQty= Cart::where('user_id',Auth::user()->id)->get()->count('id');
				$cartShipTotal= Cart::where('user_id',Auth::user()->id)->sum('shipping_charge');
				$cartTotal= $cartsubTotal + $cartShipTotal;


				
				// $carts = Cart::content();
				// $cartQty = Cart::count();
				// $cartTotal = Cart::total();
				$cart_true=1;
				return view('frontend.checkout.checkout_view',compact('carts','cartQty','cartsubTotal','cart_true','cartShipTotal','cartTotal'));
	
					}else{
	
					$notification = array(
					'message' => 'Shopping At list One Product',
					'alert-type' => 'error'
				);
	
				return redirect()->to('/')->with($notification);
	
					}
	
	
				}else{
	
					$notification = array(
					'message' => 'You Need to Login First',
					'alert-type' => 'error'
				);
	
				return redirect()->route('login')->with($notification);
	
				}
	
			} // end method 
			
}