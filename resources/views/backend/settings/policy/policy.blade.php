@extends('admin.admin_master')
@section('admin')
@section('title')
Policy
@endsection
<div class="page-content">
    <section class="content-header">
        <div class="container-fluid">
          <div class="row mb-2">
            <div class="col-sm-6">
              <h5>Company Policy</h5>
            </div>
            <div class="col-sm-6">
              <ol class="breadcrumb float-sm-right">
                <li class="breadcrumb-item"><a href="{{route('admin.dashboard')}}">Home</a></li>
                <li class="breadcrumb-item active">Settings</li>
                <li class="breadcrumb-item active">Policy</li>
              </ol>
            </div>
          </div>
        </div><!-- /.container-fluid -->
    </section>
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    {{-- <h3 class="card-title">Product Category</h3> --}}
                </div>
                <div class="card-body">
                    <div class="row">
                        <div id="divCategory" class="col-md-6">
                            <form method="post" action="{{ route('policy.store') }}" >
                                @csrf
                                <div class="form-group">
                                    <label>
                                       Terms & Condition</label>
                                       <textarea id="" class="form-control" rows="10" name="terms_condition"></textarea>
                                       @error('shortdescription') 
                                       <span class="text-danger">{{ $message }}</span>
                                       @enderror
                                </div>
                                <div class="form-group">
                                    <label>
                                        Privacy Policy</label>
                                       <textarea id="" class="form-control" rows="10" name="privacy_policy"></textarea>
                                       @error('shortdescription') 
                                       <span class="text-danger">{{ $message }}</span>
                                       @enderror
                                </div>
                                <div class="form-group">
                                    <label>
                                       Return Policy</label>
                                       <textarea id="" class="form-control" rows="10" name="return_policy"></textarea>
                                       @error('shortdescription') 
                                       <span class="text-danger">{{ $message }}</span>
                                       @enderror
                                </div>
                                <div class="form-group">
                                    <label>
                                       Support Policy</label>
                                       <textarea id="" class="form-control" rows="10" name="support_policy"></textarea>
                                       @error('shortdescription') 
                                       <span class="text-danger">{{ $message }}</span>
                                       @enderror
                                </div>
                                <div class="form-group">
                                    <button type="submit" id="btnSave" class="btn btn-success">Save</button>
                                    {{-- <button type="button" class="btn btn-danger" id="btnClear" onclick="ClearData();">Clear</button> --}}
                                </div>
                            </form>
                        </div> 
                    </div>
                </div>  
            </div>
        </div>
    </div>
    <h5>About Us List</h5>
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    {{-- <h3 class="card-title">Product Category List</h3> --}}
                </div>
                <div class="card-body">
                    <div class="col-md-12">
                        <div class="table-responsive">
                            <table id="example1" class="table table-bordered">
                                <thead>
                                    <tr>
                                        <th>#</th>
                                        <th>Terms & Condition</th>
                                        <th>Privacy Policy</th>
                                        <th>Support Policy</th>
                                        <th>Return Policy</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody id="tbodyList">
                                    @php
                                        $serialNo = 1;
                                    @endphp
                                    @foreach ($policy as $item )
                                    <tr id="emptyRow" style="height: 25px;">
                                        <td>{{$serialNo}}</td>
                                        <td>{{$item->terms_condition}}</td>
                                        <td>{{$item->privacy_policy}}</td>
                                        <td>{{$item->support_policy}}</td>
                                        <td>{{$item->return_policy}}</td>
                                        <td>
                                            <a href="{{ route('policy.edit',$item->id) }}" class="btn btn-info btn-sm btn-flat" title="Edit Data"><i class="fa fa-pencil"></i> </a>
                                            <a href="{{ route('policy.delete',$item->id) }}" class="btn btn-danger btn-sm btn-flat" title="Delete Data" id="delete">
                                              <i class="fa fa-trash"></i></a>
                                        </td>
                                    </tr>
                                    @php
                                        $serialNo++;
                                    @endphp
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

 
@endsection
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script>
    $(function () {
      $('.summernote').summernote()
    })
</script>