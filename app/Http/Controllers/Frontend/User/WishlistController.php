<?php

namespace App\Http\Controllers\Frontend\User;

use App\Http\Controllers\Controller;
use App\Models\Wishlist;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class WishlistController extends Controller
{
    public function ViewWishlist(){
        if (Auth::check()) {
        return view('frontend.wishlist.view_wishlist');
        }else{
            return view('auth.login');
        }
    }

    public function GetWishlistProduct(){
        if (Auth::check()) {

        $wishlist = Wishlist::with('product')->where('user_id',Auth::id())->latest()->get();
		$wishlistQty= Wishlist::where('user_id',Auth::user()->id)->count('id');

        return response()->json(array(
			'wishlist' => $wishlist,
			'wishlistQty' => $wishlistQty
	
		));
    }else{
        return view('auth.login');
    }

        
        // return response()->json($wishlist);
    } // end mehtod 
    public function RemoveWishlistProduct($id){

        Wishlist::where('user_id',Auth::id())->where('id',$id)->delete();
        return response()->json(['success' => 'Successfully Product Remove']);
    }
}
