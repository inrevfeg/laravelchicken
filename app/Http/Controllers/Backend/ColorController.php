<?php

namespace App\Http\Controllers\backend;

use App\Http\Controllers\Controller;
use App\Models\Colors;
use Illuminate\Http\Request;

class ColorController extends Controller
{
    public function ColorView()
	{
        $colors = Colors::orderBy('id','ASC')->get();
        return view('backend.color.color_view',compact('colors'));
    }

    public function ColorStore(Request $request)
	{
    	$request->validate([
    		'color' => 'required',
    	]);

		Colors::create([
			'color_name' => $request->color,
			'color_code' => $request->code,
    	]);

	    $notification = array(
			'message' => 'Color Created Successfully',
			'alert-type' => 'success'
		);
		
		return redirect()->back()->with($notification);

    }

    public function ColorEdit($id)
	{
    	$colors = Colors::findOrFail($id);
    	return view('backend.color.color_edit',compact('colors'));
    }

    public function ColorUpdate(Request $request)
	{   	
		$request->validate([
    		'color' => 'required',
    	]);
    	$color_id = $request->id;
    	Colors::findOrFail($color_id)->update([
			'color_name' => $request->color,
    	]);

	    $notification = array(
			'message' => 'Color Updated Successfully',
			'alert-type' => 'success'
		);

		return redirect()->route('color.all')->with($notification);
    } 

	public function ColorDelete($id)
	{
    	$color = Colors::findOrFail($id);
    	$color->delete();

    	 $notification = array(
			'message' => 'Color Deleted Successfully',
			'alert-type' => 'error'
		);

		return redirect()->back()->with($notification);
    } 

}