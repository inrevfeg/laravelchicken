<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Seller;
use Illuminate\Http\Request;

class SellerApproveController extends Controller
{
    public function ResellerView(){
        $data = Seller::where('is_verified',1)->get();
        return view('admin.admin_resellers_view',compact('data'));
    }
    public function ResellerRequest(){
        $data=Seller::where('is_verified',0)->get();
        return view('admin.admin_resellers_request',compact('data'));
    }
    public function ResellerApprove($id){
        Seller::where('id',$id)->update([
            'is_verified'=> 1
        ]);
        $notification = array(
            'message' => 'Seller Approved Successfully',
            'alert-type' => 'success'
        );
        return redirect()->back()->with($notification);
    }
    public function ResellerDelete($id){
        $nafil = Seller::find($id);
        $nafil->delete();
        return back();
    }
}
