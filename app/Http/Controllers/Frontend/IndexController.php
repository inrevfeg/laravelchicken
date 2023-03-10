<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\About;
use App\Models\Category;
use App\Models\Colors;
use App\Models\Policy;
use App\Models\Product;
use App\Models\ProductMultipleImage;
use App\Models\ShopInformation;
use App\Models\Slider;
use App\Models\User;
use ElePHPant\SocialShare\SocialShare;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class IndexController extends Controller
{
    public function index()
	{
        $categories = Category::limit(4)->get();
        $products = Product::where('status',1)->inRandomOrder()->limit(12)->get();
        $top_products = Product::where('status',1)->where('productPrice',)->get();
		$slider = Slider::get();
        $is_featured = Product::where('is_featured',1)->where('status',1)->inRandomOrder()->limit(12)->get();
        $is_hotDeals = Product::where('is_hotDeals',1)->where('status',1)->inRandomOrder()->limit(8)->get();
        // $best_selling_products = Product::where('is_bestSelling',1)->where('status',1)->inRandomOrder()->limit(8)->get();
		// $about = About::limit(1)->get();
		// $shopInformation = ShopInformation::find(1);
        
        // return view('frontend.index',compact('category','products','is_featured','newarrivals','best_selling_products','about','slider','shopInformation'));
        return view('frontend.index',compact('categories','slider','products','is_hotDeals','is_featured'));
    }
	public function UserProfile(){
        $id = Auth::user()->id;
        $user = User::find($id);
        return view('frontend.profile.user_profile',compact('user'));
    }

    public function UserProfileStore(Request $request){

        $data = User::find(Auth::user()->id); 
		$data->name = $request->name;
		$data->email = $request->email;
		$data->phone = $request->phone;

		if ($request->file('profile_photo_path')) {
			$file = $request->file('profile_photo_path');
			@unlink(public_path('upload/user_images/'.$data->profile_photo_path));
			$filename = date('YmdHi').$file->getClientOriginalName();
			$file->move(public_path('upload/user_images'),$filename);
			$data['profile_photo_path'] = $filename;
		}
		$data->save();

        $notification = array(
			'message' => 'User Profile Updated Successfully',
			'alert-type' => 'success'
		);

        return redirect()->route('dashboard')->with($notification);

    } //end method


    public function UserChangePassword(){
        $id = Auth::user()->id;
        $user = User::find($id);
        return view('frontend.profile.change_password', compact('user'));
    }


    public function UserPasswordUpdate(Request $request){

		$validateData = $request->validate([
			'oldpassword' => 'required',
			'password' => 'required|confirmed',
		]);

		// $hashedPassword = Auth::user()->password;
		$hashedPassword = Auth::user()->password;
		if (Hash::check($request->oldpassword,$hashedPassword)) {
			// $admin = Admin::find(Auth::id());
			$user = User::find(Auth::id());
			$user->password = Hash::make($request->password);
			$user->save();
			Auth::logout();
			return redirect()->route('user.logout');
		}else{
			return redirect()->back();
		}


	}// end method


	//About Page
	public function about(){
        
        return view('frontend.about');
    }
	//Contact Page
	public function contact(){
        
        return view('frontend.contact');
    }

	//Terms & Conditions Page
	public function terms(){
        $policy = Policy::limit(1)->get();
        return view('frontend.terms',compact('policy'));
    }

	//Privacy Policy Page
	public function privacy(){
        $privacyPolicy = Policy::get();
        return view('frontend.privacy',compact('privacyPolicy'));
    }

	//Return Policy
	public function return(){
        $returnPolicy = Policy::limit(1)->get();
        return view('frontend.return',compact('returnPolicy'));
    }

	//Support Policy
	public function support(){
        $supportPolicy = Policy::get();
        return view('frontend.support',compact('supportPolicy'));
    }

	//Track Order
	public function track_order(){
	
		return view('frontend.traking.track_order_design');
	}

	
	//Shop Page
	public function ProductShop(Request $request){
        $shop_all_products = Product::where('status',1)->orderBy('id','DESC')->paginate(6);
		$color = Colors::get();
		//  Load More Product with Ajax
		if ($request->ajax()) { 
			$grid_view = view('frontend.product.shop_grid_view',compact('shop_all_products'))->render();
		 
			$list_view = view('frontend.product.shop_list_view',compact('shop_all_products'))->render();
			 return response()->json(['grid_view' => $grid_view, 'list_view',$list_view]);	
		}
        //  End Load More Product with Ajax
        
        return view('frontend.product.shop_details',compact('shop_all_products','color'));
    }


	//Offers Page
	public function ProductOffers(Request $request){
		$Offer_products = Product::where('status',1)->where('is_offers',1)->orderBy('id','DESC')->get();
		$color = Colors::get();
		//  Load More Product with Ajax
		if ($request->ajax()) { 
			$grid_view = view('frontend.product.offers_grid_view',compact('Offer_products'))->render();
			
			$list_view = view('frontend.product.offers_list_view',compact('Offer_products'))->render();
				return response()->json(['grid_view' => $grid_view, 'list_view',$list_view]);	
		}
		//  End Load More Product with Ajax
		
		return view('frontend.product.offers_details',compact('Offer_products','color'));
	}


	//Products by Tags Page
	public function ProductsbyTags(Request $request, $tags){
		$Tag_wise_products = Product::where('status',1)->where('tags',$tags)->orderBy('id','DESC')->paginate(6);

		//  Load More Product with Ajax 
		if ($request->ajax()) {
			$grid_view = view('frontend.product.tags_grid_view',compact('Tag_wise_products'))->render();
			
			$list_view = view('frontend.product.tags_list_view',compact('Tag_wise_products'))->render();
				return response()->json(['grid_view' => $grid_view,'list_view',$list_view]);	
			
					}
		//  End Load More Product with Ajax 

		return view('frontend.product.tag_view',compact('Tag_wise_products'));
	}


	
    public function ProductDetails($id,$slug){
		// $share = new SocialShare(url('/product/details/'.$id.'/'.$slug), 'Nithitex.adhocerp.in');
		$product = Product::with('category')->findOrFail($id);
        $multiImage = ProductMultipleImage::where('productId',$id)->get();

        $cat_id = $product->categoryId;
        $related_products = Product::with('category')->where('categoryId',$cat_id)->where('id','!=',$id)->orderBy('id','DESC')->limit(15)->get();

	 	return view('frontend.product.product_details',compact('product','multiImage','related_products'));

	}

    public function CategoryDetails(Request $request,$id){
		$category_details = Product::where('status',1)->where('categoryId',$id)->orderBy('id','DESC')->paginate(6);
		// $color = Colors::get();
        //  Load More Product with Ajax 
		if ($request->ajax()) {
			$grid_view = view('frontend.product.grid_view_product',compact('category_details'))->render();
		 
			$list_view = view('frontend.product.list_view_product',compact('category_details'))->render();
			 return response()->json(['grid_view' => $grid_view,'list_view',$list_view]);	
		 
				 }
        //  End Load More Product with Ajax 

	 	return view('frontend.product.category_details',compact('category_details'));

	}

    public function userLogout() {
        Auth::logout();
        return redirect()->route('login');
    }


    	/// Product View With Ajax
	public function ProductViewAjax($id){
		$product = Product::with('category')->findOrFail($id);
        $multiImage = ProductMultipleImage::where('product_id',$id)->get();


		// $color = $product->product_color_en;
		// $product_color = explode(',', $color);

		// $size = $product->product_size_en;
		// $product_size = explode(',', $size);

		return response()->json(array(
			'product' => $product,
			'multiImage' => $multiImage

		));

	} // end method 


	public function productSearch(Request $request)
	{
		$request->validate([
			"search" => "required"
		],[
			"search.required" => "Please Enter Some Values"
		]);
		$item = $request->search;
		$products_search = Product::where('product_name','LIKE',"%$item%")->oRwhere('product_sku','LIKE',"%$item%")->get();
		return view('frontend.product.product-search',compact('products_search'));
	}

	public function productSort(Request $request)
	{
		$color = Colors::get();
		if($request->sort == 'latest_product'){
			$product = product::orderBy('id','DESC')->get();
		}elseif ($request->sort == 'product_name') {
			$product = product::orderBy('product_name','ASC')->get();
		}elseif ($request->sort == 'p_low_to_high') {
			$product = product::orderBy('product_discount','ASC')->get();
		}elseif ($request->sort == 'p_high_to_low') {
			$product = product::orderBy('product_discount','DESC')->get();
		}elseif ($request->sort == 'q_low_to_high') {
			$product = product::orderBy('current_stock','ASC')->get();
		}elseif ($request->sort == 'q_high_to_low') {
			$product = product::orderBy('current_stock','DESC')->get();
		}

		return view('frontend.product.product-sort',compact('product','color'));
	}

	public function productColor(Request $request)
	{
		$color_details = Product::join('colors','colors.id','products.color_id')->where('color_id',$request->color_sort)->get();
		$color = Colors::get();
		if ($request->ajax()) {
			$grid_view = view('frontend.product.color_sort_grid_view',compact('category_details'))->render();
		 
			$list_view = view('frontend.product.color_sort_list_view',compact('category_details'))->render();
			return response()->json(['grid_view' => $grid_view,'list_view',$list_view]);
		}

	 	return view('frontend.product.color_detail',compact('color_details','color'));

	}
}
