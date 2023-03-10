<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\ShopInformation;
use Illuminate\Http\Request;
use Image;

class ShopInformationController extends Controller
{
    public function index()
    {
        $shopInformation = ShopInformation::find(1);
        return view('backend.settings.shopinformation.shopinformation_view',compact('shopInformation'));
    }

    public function update(Request $request)
    {
        $request->validate([
            // 'announcement'      =>  'required',
            // 'address_line_1'    =>  'required',
            // 'address_line_2'    =>  'required',
            // 'pincode'           =>  'required',
            // 'mobile_number'     =>  'required',
            // 'email'             =>  'required',
            'contact_image'     =>  'max:2048',
            // 'andriod_link'      =>  'required',
            // 'ios_link'          =>  'required',
            // 'facebook'          =>  'required',
            // 'twitter'           =>  'required',
            // 'instagram'         =>  'required',
            // 'youtube'           =>  'required'
        ]);

        $oldImage = $request->old_img;

        $id = $request->id;
        $shopInformation = ShopInformation::find($id);
        $shopInformation->announcement = $request->announcement;
        $shopInformation->address_line_1 = $request->address1;
        $shopInformation->address_line_2 = $request->address2;
        $shopInformation->pincode = $request->pincode;
        $shopInformation->mobile_number = $request->mobile;
        $shopInformation->email = $request->email;
        $shopInformation->andriod_link = $request->andriod;
        $shopInformation->ios_link = $request->ios;
        $shopInformation->facebook = $request->facebook;
        $shopInformation->twitter = $request->twitter;
        $shopInformation->instagram = $request->instagram;
        $shopInformation->youtube = $request->youtube;

        if ($request->file('contact_image')) {
            unlink($oldImage);
            $image = $request->file('contact_image');
            $name_gen = hexdec(uniqid()).'.'.$image->getClientOriginalExtension();
            Image::make($image)->resize(800,700)->save('upload/products/contact/'.$name_gen);
            $save_url = 'upload/products/contact/'.$name_gen;
			$shopInformation->slider_image =$save_url;	
           } 
        $shopInformation->save();

        // $shopInformation = ShopInformation::find($id)->updateorcreate([
        //     'announcement' => $request->announcement,
        //     'address_line_1' => $request->address1,
        //     'address_line_2' => $request->address2,
        //     'pincode' => $request->pincode,
        //     'mobile_number' => $request->mobile,
        //     'email' => $request->email,
        //     'andriod_link' => $request->andriod,
        //     'ios_link' => $request->ios,
        //     'facebook' => $request->facebook,
        //     'twitter' => $request->twitter,
        //     'instagram' => $request->instagram,
        //     'youtube' => $request->youtube
            
        // ]);
        // if ($request->file('contact_image')) {
        //     unlink($oldImage);
        //     $image = $request->file('contact_image');
        //     $name_gen = hexdec(uniqid()).'.'.$image->getClientOriginalExtension();
        //     Image::make($image)->resize(800,700)->save('upload/products/contact/'.$name_gen);
        //     $save_url = 'upload/products/contact/'.$name_gen;
        //     'contact_image' => $save_url	
        //    } 

        $notification = array(
			'message' => 'Shop Information Updated Successfully',
			'alert-type' => 'success'
		);

		return redirect()->back()->with($notification);
    }
}
