<?php

namespace App\Http\Controllers\backend;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Product;
use Illuminate\Http\Request;
use Intervention\Image\Facades\Image;

class CategoryController extends Controller
{
    public function CategoryView()
	{
		
        $categories =Category::orderBy('id','ASC')->get();
        return view('backend.category.category_view',compact('categories'));
    }

    public function CategoryStore(Request $request)
	{
    	$request->validate([
    		'category' => 'required',
			'category_image' => 'image|mimes:jpeg,jpg,png,webp|min:1|max:2000'
    	]);

		$image = $request->file('category_image');
            $name_gen = hexdec(uniqid()).'.'.$image->getClientOriginalExtension();
            Image::make($image)->resize(917,1000)->save('upload/products/category/'.$name_gen);
            $save_url = 'upload/products/category/'.$name_gen;

		Category::create([
			'categoryName' => $request->category,
			'categorySlug' => strtolower(str_replace(' ', '-',$request->category)),
			'categoryDescription' => $request->category_description,
			'categoryImage' => $save_url
    	]);

	    $notification = array(
			'message' => 'Category Created Successfully',
			'alert-type' => 'success'
		);
		
		return redirect()->back()->with($notification);

    }

    public function CategoryEdit($id)
	{
    	$categories = Category::findOrFail($id);
    	return view('backend.category.category_edit',compact('categories'));
    }

    public function CategoryUpdate(Request $request)
	{   	
		$request->validate([
    		'category' => 'required',
			'category_image' => 'image|mimes:jpeg,jpg,png,webp|min:1|max:2000'
    	]);
    	$category_id = $request->id;
		$oldImage = $request->old_image;
		   
    	$category = Category::find($category_id);
		$category->categoryName = $request->category;
		$category->categorySlug = strtolower(str_replace(' ', '-', $request->category));
		$category->categoryDescription = $request->category_description;

		
		if ($request->file('category_image')) {
            unlink($oldImage);
            $image = $request->file('category_image');
            $name_gen = hexdec(uniqid()).'.'.$image->getClientOriginalExtension();
            Image::make($image)->resize(917,1000)->save('upload/products/category/'.$name_gen);
            $save_url = 'upload/products/category/'.$name_gen;	
			$category->categoryImage = $save_url;
           }  
		$category->save();

	    $notification = array(
			'message' => 'Category Updated Successfully',
			'alert-type' => 'success'
		);

		return redirect()->route('category.all')->with($notification);
    } 

	public function CategoryDelete($id)
	{
    	$category = Category::findOrFail($id);
    	$category->delete();

    	 $notification = array(
			'message' => 'Category Deleted Successfully',
			'alert-type' => 'error'
		);

		return redirect()->back()->with($notification);
    } 
}
