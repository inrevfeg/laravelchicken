@extends('admin.admin_master')
@section('admin')
@section('title')
Edit Staff
@endsection

<div class="page-content">
    <section class="content-header">
        <div class="container-fluid">
          <div class="row mb-2">
            <div class="col-sm-6">
              <h5>Edit Staff</h5>
            </div>
            <div class="col-sm-6">
              <ol class="breadcrumb float-sm-right">
                <li class="breadcrumb-item"><a href="#">Home</a></li>
                <li class="breadcrumb-item active">Master</li>
                <li class="breadcrumb-item active">Edit Staff</li>
              </ol>
            </div>
          </div>
        </div><!-- /.container-fluid -->
    </section>
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    {{-- <h3 class="card-title">Edit User</h3> --}}
                </div>
                <div class="card-body">
                    <div class="row">
                        
                        <div id="divTax" class="col-md-4">
                            <form  action = "{{url('user')}}/{{$user->id}}"  method ="POST" >
                                @csrf
                                @method('PUT')
                            <div class="form-group">
                                <label for="exampleInputEmail1">
                                    User Name</label>
                                <input type="text" id="name"  name="name"  value ="{{$user->name}}" class="form-control"
                                    title="Please Enter User Name"/>
                                    @error('name') 
                                    <span class="text-danger">{{ $message }}</span>
                                    @enderror 
                            </div>
                            <div class="form-group">
                                <label for="exampleInputEmail1">
                                    Email Address</label>
                                <input type="text" id="email" name="email" class="form-control"  value ="{{$user->email}}"
                                    control="numeric" title="Please Enter Email"/>
                                    @error('email') 
                                    <span class="text-danger">{{ $message }}</span>
                                    @enderror
                            </div>
        
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="exampleInputEmail1">
                                    Password</label>
                                <input type="password" id="password" name="password" class="form-control" 
                                    title="Please Enter password" maxlength="20" />
                                    @error('password') 
                                    <span class="text-danger">{{ $message }}</span>
                                    @enderror
                            </div>
                       
                        </div>
                    </div>
                    <div class="form-group">
                        <button type="submit" id="btnSave" class="btn btn-success">Save</button>
                        {{-- <button type="button" class="btn btn-danger" id="btnClear" onclick="ClearData();">Clear</button> --}}
                    </div>
                </div>  
            </form>
            </div>
        </div>
    </div>
</div>

 
@endsection