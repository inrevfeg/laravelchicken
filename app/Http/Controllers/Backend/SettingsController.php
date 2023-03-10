<?php

namespace App\Http\Controllers\backend;

use App\Http\Controllers\Controller;
use App\Models\About;
use Illuminate\Http\Request;
use Intervention\Image\Facades\Image;

class SettingsController extends Controller
{
    public function aboutView()
    {
        $about = About::get();
        return view('backend.settings.about-us.about-us',compact('about'));
    }

    public function store(Request $request)
    {
        $request->validate([
    		'about_description' => 'required',
			'about_image' => 'image|mimes:jpeg,jpg,png,webp|min:1|max:2000'
    	]);

        $image = $request->file('about_image');
            $name_gen = hexdec(uniqid()).'.'.$image->getClientOriginalExtension();
            Image::make($image)->resize(917,1000)->save('upload/products/about-us/'.$name_gen);
            $save_url = 'upload/products/about-us/'.$name_gen;

        About::create([
            'about_description' => $request->about_description,
            'about_image' => $save_url
        ]);

        $notification = array(
			'message' => 'About Us Created Successfully',
			'alert-type' => 'success'
		);
		
		return redirect()->back()->with($notification);
    }

    public function edit($id)
    {
        $about = about::find($id);
        return view('backend.settings.about-us.about-us_edit',compact('about'));
    }

    public function update(Request $request)
    {
        $request->validate([
    		'about_description' => 'required',
			'about_image' => 'image|mimes:jpeg,jpg,png,webp|min:1|max:2000'
    	]);

        $id = $request->id;
        $oldImage = $request->old_image;

        $about = About::find($id);
        $about->about_description = $request->about_description;
        if ($request->file('about_image')) {
            unlink($oldImage);
            $image = $request->file('about_image');
            $name_gen = hexdec(uniqid()).'.'.$image->getClientOriginalExtension();
            Image::make($image)->resize(917,1000)->save('upload/products/about-us/'.$name_gen);
            $save_url = 'upload/products/about-us/'.$name_gen;	
			$about->about_image = $save_url;
           }  
		$about->save();

        $notification = array(
			'message' => 'About Us Updated Successfully',
			'alert-type' => 'success'
		);

		return redirect()->route('about.all')->with($notification);
    }

    public function delete($id)
    {
        $about = About::find($id);
        $about->delete();

        $notification = array(
			'message' => 'About Us Deleted Successfully',
			'alert-type' => 'error'
		);

		return redirect()->back()->with($notification);
    }
}
