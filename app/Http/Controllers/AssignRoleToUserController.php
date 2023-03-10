<?php

namespace App\Http\Controllers;
use App\Models\PermissionGroup;
use App\Models\Staff;
use Spatie\Permission\Models\Role;
use Illuminate\Http\Request;

class AssignRoleToUserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $users = Staff::with('roles')->get();
        return view('admin.assign_users_roles.list',compact('users'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $users = Staff::get();
        $roles = Role::get();
        return view('admin.assign_users_roles.create',compact('users','roles'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
     $user = Staff::find($request->user_id);
     $user->syncRoles($request->role_names);
  
     return redirect()->back()->with('message'," Role Assigned to $user->email Successfully!");
    }


    
    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
         $selecteduser = Staff::with('roles')->find($id);
         $users = Staff::get();
         $roles = Role::get();
         return view('admin.assign_users_roles.edit',compact('selecteduser','users','roles'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
       
        $user = Staff::find($id);
        // $role = Role::find($request->role_id); 
        $user->syncRoles($request->role_id);
        return redirect()->back()->with('message'," Role Updated to $user->email Successfully!");
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
