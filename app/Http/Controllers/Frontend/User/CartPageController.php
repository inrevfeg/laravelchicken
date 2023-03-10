<?php

namespace App\Http\Controllers\Frontend\User;

use App\Http\Controllers\Controller;
use App\Models\Cart;
// use Gloudemans\Shoppingcart\Facades\Cart;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CartPageController extends Controller
{
    public function MyCart(){
		if (Auth::check()) {
    	return view('frontend.cartlist.view_mycart');
		}

    }
    public function GetCartProduct(){
		if (Auth::check()) {
        $carts = Cart::where('user_id',Auth::user()->id)->get();
		$cartTotal= Cart::where('user_id',Auth::user()->id)->sum('total');
		$cartQty= Cart::where('user_id',Auth::user()->id)->count('id');

    	return response()->json(array(
    		'carts' => $carts,
    		'cartQty' => $cartQty,
    		'cartTotal' => $cartTotal,

    	));
	}

    } //end method 
	public function RemoveCartProduct($rowId){
        // Cart::remove($rowId);
		$Cart = Cart::findOrFail($rowId);
    	$Cart->delete();
        // if (Session::has('coupon')) {
        //     Session::forget('coupon');
        //  }
 
        return response()->json(['success' => 'Successfully Remove From Cart']);
    }
		// Cart Increment 
		public function CartIncrement($id){
		$row = Cart::find($id);
		$qtys= $row->qty + 1;
		$totalcart= $row->price * $qtys;
		// $total=
		Cart::findOrFail($id)->update([
			'qty' => $qtys,
			'total' => $totalcart
    	]);
		// Cart::update($rowId, $row->qty + 1);


		return response()->json('increment');

	} // end mehtod 

	// Cart Decrement  
	public function CartDecrement($id){

	$row = Cart::find($id);
	$qtys= $row->qty - 1;
	$totalcart= $row->price * $qtys;
	Cart::findOrFail($id)->update([
		'qty' => $qtys,
		'total' => $totalcart
	]);
	// Cart::update($rowId, $row->qty - 1);

	return response()->json('Decrement');

	}// end mehtod 
}
