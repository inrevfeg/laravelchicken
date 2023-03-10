<?php

namespace App\Http\Controllers\backend;

use App\Http\Controllers\Controller;
use App\Models\Policy;
use Illuminate\Http\Request;

class PolicyController extends Controller
{
    public function index()
    {
        $policy = Policy::get();
        return view('backend.settings.policy.policy',compact('policy'));
    }

    public function store(Request $request)
    {
        Policy::create([
            'terms_condition' => strip_tags($request->terms_condition),
            'privacy_policy'  => strip_tags($request->privacy_policy),
            'return_policy'   => strip_tags($request->return_policy),
            'support_policy'  => strip_tags($request->support_policy)
        ]);

        $notification = array(
			'message' => 'Policy Created Successfully',
			'alert-type' => 'success'
		);
		
		return redirect()->back()->with($notification);
    }

    public function edit($id)
    {
        $policy = Policy::find($id);
        return view('backend.settings.policy.policy_edit',compact('policy'));
    }

    public function update(Request $request)
    {

        $id = $request->id;
        Policy::findOrFail($id)->update([
            'terms_condition' => strip_tags($request->terms_condition),
            'privacy_policy'  => strip_tags($request->privacy_policy),
            'return_policy'   => strip_tags($request->return_policy),
            'support_policy'  => strip_tags($request->support_policy)
        ]);

        $notification = array(
			'message' => 'Policy Updated Successfully',
			'alert-type' => 'success'
		);

        return redirect()->route('policy.all')->with($notification);
    }

    public function delete($id)
    {
        $policy = Policy::find($id);
        $policy->delete();

        $notification = array(
			'message' => 'Policy Deleted Successfully',
			'alert-type' => 'error'
		);

		return redirect()->back()->with($notification);
    }
}