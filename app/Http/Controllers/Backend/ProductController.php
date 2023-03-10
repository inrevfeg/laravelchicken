<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Product;
use App\Models\productUnit;
use App\Models\ProductMultipleImage;
use Illuminate\Http\Request;
use App\ImageModel;
use App\Models\Order;
use App\Models\OrderItem;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Image;

class ProductController extends Controller
{
    public function ProductView()
	{
		$category = Category::latest()->get();
		$unit = productUnit::latest()->get();
        return view('backend.product.product_view',compact('category','unit'));
    }




    public function ProductStore(Request $request){
        // dd($request->all());
        $request->validate([
    		'product_name' => 'required',
    		'product_description' => 'required',
    		'ddlCategory' => 'required',
    		'product_unit' => 'required',
            'product_price'  => 'required',
            'product_ship_charge' => 'required',
            'product_image' => 'required|mimes:jpeg,png,jpg,zip,pdf|max:2048',
    		'multi_img' => 'required',
    		
    	]); 
            $image = $request->file('product_image');
            $name_gen = hexdec(uniqid()).'.'.$image->getClientOriginalExtension();
            Image::make($image)->resize(917,1000)->save('upload/products/thambnail/'.$name_gen);
            $save_url = 'upload/products/thambnail/'.$name_gen;
    
          $product_id = Product::insertGetId([
              'productName' => $request->product_name,
              'productDescription' => $request->product_description,
              'productSlug' =>strtolower(str_replace(' ', '-', $request->product_name)),

              'categoryId' => $request->ddlCategory,
              'productUnitId' => $request->product_unit,             
              'productPrice' =>  $request->product_price,
              'productShipCharge' => $request->product_ship_charge,
            
              'productImage' => $save_url,
              'productDiscount' => $request->product_dis_price,

              'is_featured' => $request->is_featured,
              'is_hotDeals' => $request->is_hotDeals,
            //   'is_offers' => $request->is_offers,
            //   'is_bestSelling' => $request->is_bestSelling,  
              'status' => 1,
            //   'created_by' => Auth::user()->id,
            //   'updated_by' => Auth::user()->id   
          ]);
    
    
          ////////// Multiple Image Upload Start ///////////
    
          $images = $request->file('multi_img');
          dd($images);
          foreach ($images as $img) {
              $make_name = hexdec(uniqid()).'.'.$img->getClientOriginalExtension();
            Image::make($img)->resize(917,1000)->save('upload/products/multi-image/'.$make_name);
            $uploadPath = 'upload/products/multi-image/'.$make_name;
    
            ProductMultipleImage::insert([
    
                'productId' => $product_id,               
                'productMultiImage' => $uploadPath
    
            ]);
    
          }
    
          ////////// Een Multiple Image Upload Start ///////////
    
    
          $notification = array(
			'message' => 'Product Created Successfully',
			'alert-type' => 'success'
		);
		
		// return redirect()->back()->with($notification);
        return redirect()->route('product.list')->with($notification);
    
    
        } // end method
        public function ProductList(){

            $products = Product::latest()->get();
            return view('backend.product.product_list',compact('products'));
        }
        public function ProductEdit($id){
            $multiImgs = ProductMultipleImage::where('productId',$id)->get();
            $categories = Category::latest()->get();
		    $unit = productUnit::latest()->get();
            $products = Product::findOrFail($id);
            return view('backend.product.product_edit',compact('categories','products','multiImgs','unit'));
    
        }
        public function ProductMultiImageDelete($id){
            $oldimg = ProductMultipleImage::findOrFail($id);
            unlink($oldimg->productMultiImage);
            ProductMultipleImage::findOrFail($id)->delete();
    
            $notification = array(
               'message' => 'Product Image Deleted Successfully',
               'alert-type' => 'success'
           );
    
           return redirect()->back()->with($notification);
    
        } // end method 
        public function ProductUpdate(Request $request){

          
            // $request->validate([
            //     'product_thambnail' => 'required|mimes:jpeg,png,jpg,zip,pdf|max:2048',
            // ]);

           $oldImage = $request->old_img;

           $product = Product::find($request->id);
           $product->productName = $request->product_name;
           $product-> productDescription = $request->product_description;

           $product->categoryId = $request->ddlCategory;
           $product->productUnitId = $request->product_unit;             
           $product->productPrice =  $request->product_price;
           $product->productShipCharge = $request->product_ship_charge;     
           $product-> productDiscount = $request->product_dis_price;
           $product-> status = 1;

          
         
           $product->is_featured = $request->is_featured;
           $product->is_hotDeals = $request->is_hotDeals;


           if ($request->file('product_image')) {
            unlink($oldImage);
            $image = $request->file('product_image');
            $name_gen = hexdec(uniqid()).'.'.$image->getClientOriginalExtension();
            Image::make($image)->resize(917,1000)->save('upload/products/thambnail/'.$name_gen);
            $save_url = 'upload/products/thambnail/'.$name_gen;

			$product->productImage =$save_url;	

           }             
		   $product->save();
           
           $imgs = $request->multi_img;
            if ($request->file('multi_img')) {
   
                foreach ($imgs as $id => $img) {
                // $imgDel = ProductMultipleImage::findOrFail($id);
                // unlink($imgDel->product_mult_image);
                    
                $make_name = hexdec(uniqid()).'.'.$img->getClientOriginalExtension();
                Image::make($img)->resize(917,1000)->save('upload/products/multi-image/'.$make_name);
                $uploadPaths = 'upload/products/multi-image/'.$make_name;
        
                    ProductMultipleImage::where('id',$id)->update([
                    'productMultiImage' => $uploadPaths
                ]);

                ProductMultipleImage::insert([
    
                    'productId' => $request->id,               
                    'productMultiImage' => $uploadPaths
        
                ]);
                }
            }

              $notification = array(
                'message' => 'Product Updated  Image Successfully',
                'alert-type' => 'success'
            );
    
            return redirect()->route('product.list')->with($notification);
        //    return redirect()->back()->with($notification);

       
    
    
        } // end method 
        public function ProductDelete($id){
            $product = Product::findOrFail($id);
            unlink($product->productImage);
            Product::findOrFail($id)->delete();
    
            $images = ProductMultipleImage::where('productId',$id)->get();
            foreach ($images as $img) {
                unlink($img->productMultiImage);
                ProductMultipleImage::where('productId',$id)->delete();
            }
    
            $notification = array(
               'message' => 'Product Deleted Successfully',
               'alert-type' => 'success'
           );
    
           return redirect()->back()->with($notification);
    
        }// end method 

     // product Stock 
     public function ProductStock(){

        $products = Product::latest()->get();
        return view('backend.product.product_stock',compact('products'));
      }

 
    public function stockupdate(Request $request){
        $id = $request->product_id;
        Product::findOrFail($id)->update([
            'current_stock' => $request->current_qty
        ]);


        $notification = array(
            'message' => 'Product Quantity Updated Successfully',
            'alert-type' => 'success'
        );

        return redirect()->back()->with($notification);

    } // end mehtod 
    public function ReportSale(){

        $products = Product::latest()->get();
        $categories = Category::latest()->get();
        return view('backend.report.report_sale',compact('products','categories'));
      }


      public function saleReport(Request $request){

        $startDate=$request->FromDate;
        $endDate=$request->ToDate;
       
      

        // $salesorderitem=OrderItem::with('product')->select('orders.order_date','orders.invoice_no','order_items.price','orders.payment_status','orders.payment_type',DB::raw('group_concat( DISTINCT order_items.product_id) as product_id'), 'users.name','orders.user_id')->join('orders','orders.id','=', 'order_items.order_id')->join('users','users.id','=', 'orders.user_id')->whereBetween('orders.created_at', [$startDate, $endDate])->groupby('orders.order_date','order_items.product_id','orders.invoice_no','order_items.price','orders.payment_status','orders.payment_type','users.name','orders.user_id')->where('orders.status',5)->get();


        $salesorderitem=OrderItem::with('product')->select('orders.order_date','orders.invoice_no','orders.amount','orders.payment_status','orders.payment_type','users.name','orders.user_id')->join('orders','orders.id','=', 'order_items.order_id')->join('users','users.id','=', 'orders.user_id')->whereBetween('orders.created_at', [$startDate, $endDate])->groupby('orders.order_date','orders.invoice_no','orders.amount','orders.payment_status','orders.payment_type','users.name','orders.user_id')->where('orders.status',5)->get();
      
    
        return response()->json(array(
                'data' => $salesorderitem
            ));
        }
        public function ReportPending(Request $request){

        $products = Product::latest()->get();
        $categories = Category::latest()->get();
        return view('backend.report.report_pending',compact('products','categories'));
        }
        public function pendingReport(Request $request){

            $startDate=$request->FromDate;
            $endDate=$request->ToDate;
           
            // $salesorder=order::select('orders.order_date','orders.invoice_no','orders.amount','orders.payment_status','orders.payment_type','order_items.product_id')->join('order_items','order_items.order_id','=', 'orders.id')
            // ->whereBetween('orders.created_at', [$startDate, $endDate])->get();
    
            $salesorderitem=OrderItem::with('product')->select('orders.order_date','orders.invoice_no','orders.amount','orders.payment_status','orders.payment_type','users.name','orders.user_id')->join('orders','orders.id','=', 'order_items.order_id')->join('users','users.id','=', 'orders.user_id')->whereBetween('orders.created_at', [$startDate, $endDate])->groupby('orders.order_date','orders.invoice_no','orders.amount','orders.payment_status','orders.payment_type','users.name','orders.user_id')->where('orders.status',0)->get();
        
            return response()->json(array(
                    'data' => $salesorderitem
                ));
            }
            public function ReportPicked(Request $request){

                $products = Product::latest()->get();
                $categories = Category::latest()->get();
                return view('backend.report.report_picked',compact('products','categories'));
                }
            public function PickedReport(Request $request){
    
                $startDate=$request->FromDate;
                $endDate=$request->ToDate;
            
                // $salesorder=order::select('orders.order_date','orders.invoice_no','orders.amount','orders.payment_status','orders.payment_type','order_items.product_id')->join('order_items','order_items.order_id','=', 'orders.id')
                // ->whereBetween('orders.created_at', [$startDate, $endDate])->get();
        
                $salesorderitem=OrderItem::with('product')->select('orders.order_date','orders.invoice_no','orders.amount','orders.payment_status','orders.payment_type','users.name','orders.user_id')->join('orders','orders.id','=', 'order_items.order_id')->join('users','users.id','=', 'orders.user_id')->whereBetween('orders.created_at', [$startDate, $endDate])->groupby('orders.order_date','orders.invoice_no','orders.amount','orders.payment_status','orders.payment_type','users.name','orders.user_id')->where('orders.status',3)->get();
            
                return response()->json(array(
                        'data' => $salesorderitem
                    ));
                }
            public function ReportCancel(Request $request){

                $products = Product::latest()->get();
                $categories = Category::latest()->get();
                return view('backend.report.report_cancel',compact('products','categories'));
                }
                public function CancelReport(Request $request){
        
                    $startDate=$request->FromDate;
                    $endDate=$request->ToDate;
                    
                    // $salesorder=order::select('orders.order_date','orders.invoice_no','orders.amount','orders.payment_status','orders.payment_type','order_items.product_id')->join('order_items','order_items.order_id','=', 'orders.id')
                    // ->whereBetween('orders.created_at', [$startDate, $endDate])->get();
            
                    $salesorderitem=OrderItem::with('product')->select('orders.order_date','orders.invoice_no','orders.amount','orders.payment_status','orders.payment_type','users.name','orders.user_id')->join('orders','orders.id','=', 'order_items.order_id')->join('users','users.id','=', 'orders.user_id')->whereBetween('orders.created_at', [$startDate, $endDate])->groupby('orders.order_date','orders.invoice_no','orders.amount','orders.payment_status','orders.payment_type','users.name','orders.user_id')->where('orders.status',6)->get();
                
                    return response()->json(array(
                            'data' => $salesorderitem
                        ));
                    }
                public function ReportReturn(Request $request){

                    $products = Product::latest()->get();
                    $categories = Category::latest()->get();
                    return view('backend.report.report_return',compact('products','categories'));
                    }
                public function ReturnReport(Request $request){
        
                    $startDate=$request->FromDate;
                    $endDate=$request->ToDate;
                    
                    // $salesorder=order::select('orders.order_date','orders.invoice_no','orders.amount','orders.payment_status','orders.payment_type','order_items.product_id')->join('order_items','order_items.order_id','=', 'orders.id')
                    // ->whereBetween('orders.created_at', [$startDate, $endDate])->get();
            
                    $salesorderitem=OrderItem::with('product')->select('orders.order_date','orders.invoice_no','orders.amount','orders.payment_status','orders.payment_type','users.name','orders.user_id')->join('orders','orders.id','=', 'order_items.order_id')->join('users','users.id','=', 'orders.user_id')->whereBetween('orders.created_at', [$startDate, $endDate])->groupby('orders.order_date','orders.invoice_no','orders.amount','orders.payment_status','orders.payment_type','users.name','orders.user_id')->where('orders.return_order',1,2)->get();
                
                    return response()->json(array(
                            'data' => $salesorderitem
                        ));
                    }

                    public function ReportOutofStock(){

                        $products = Product::where('current_stock',0)->latest()->get();
                        return view('backend.report.out_of_stock',compact('products'));
                      }
                      public function Reportstock(){
                        $categories = Category::latest()->get();
                        return view('backend.report.stock',compact('categories'));
                      }

                      public function stockReport(Request $request){

                        $category_id=$request->category_id;
                         $product = Product::with('category')->where('current_stock','!=',0)->where('category_id', $category_id)->latest()->get();
                    
                        return response()->json(array(
                                'data' => $product
                            ));
                        }
        
        
}
