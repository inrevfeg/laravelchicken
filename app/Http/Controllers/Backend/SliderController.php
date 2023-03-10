<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Slider;
use Illuminate\Http\Request;
use Image;

class SliderController extends Controller
{
    public function index()
    {
        $slider = Slider::get();
        return view('backend.settings.slider.slider_view',compact('slider'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'slider_image' => 'max:2048'
        ]);

        $image = $request->file('slider_image');
        $name_gen = hexdec(uniqid()).'.'.$image->getClientOriginalExtension();
        Image::make($image)->resize(1920,650)->save('upload/products/slider/'.$name_gen);
        $save_url = 'upload/products/slider/'.$name_gen;

        Slider::create([
            'slider_image' => $save_url
        ]);

        $notification = array(
			'message' => 'Slider Created Successfully',
			'alert-type' => 'success'
		);
		
		return redirect()->back()->with($notification);
    }

    public function edit($id)
    {
        $slider = Slider::find($id);
        return view('backend.settings.slider.slider_edit',compact('slider'));
    }

    public function update(Request $request)
    {
        $request->validate([
            'slider_image' => 'max:2048'
        ]);

        $oldImage = $request->old_img;

        $id = $request->id;
        $slider = Slider::find($id);
        if ($request->file('slider_image')) {
            unlink($oldImage);
            $image = $request->file('slider_image');
            $name_gen = hexdec(uniqid()).'.'.$image->getClientOriginalExtension();
            Image::make($image)->resize(1920,650)->save('upload/products/slider/'.$name_gen);
            $save_url = 'upload/products/slider/'.$name_gen;
			$slider->slider_image =$save_url;	
           } 
        $slider->save();

        $notification = array(
			'message' => 'Slider Updated Successfully',
			'alert-type' => 'success'
		);

		return redirect()->route('slider.all')->with($notification);
    }

    public function delete($id)
    {
        $slider = Slider::find($id);
        $slider->delete();

        $notification = array(
			'message' => 'Slider Deleted Successfully',
			'alert-type' => 'error'
		);

		return redirect()->back()->with($notification);
    }
}
