@extends('admin.admin_master')
@section('admin')
@section('title')
Company Policies
@endsection
<div class="page-content">
    <section class="content-header">
        <div class="container-fluid">
          <div class="row mb-2">
            <div class="col-sm-6">
              <h5>Edit Company Policies</h5>
            </div>
            <div class="col-sm-6">
              <ol class="breadcrumb float-sm-right">
                <li class="breadcrumb-item"><a href="{{route('admin.dashboard')}}">Home</a></li>
                <li class="breadcrumb-item active">Settings</li>
                <li class="breadcrumb-item active">Company Policies</li>
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
                            <form method="post" action="{{ route('policy.update') }}" >
                                @csrf
                                <input type="hidden" name="id" value="{{$policy->id}}">
                                <div class="form-group">
                                    <label>
                                        Terms & Condition</label>
                                       <textarea id="" class="form-control" rows="10" name="terms_condition">{{$policy->terms_condition}}</textarea>
                                </div>
                                <div class="form-group">
                                    <label>
                                        Privacy Policy</label>
                                       <textarea id="" class="form-control" rows="10" name="privacy_policy">{{$policy->privacy_policy}}</textarea>
                                </div>
                                <div class="form-group">
                                    <label>
                                        Return Policy</label>
                                       <textarea id="" class="form-control" rows="10" name="return_policy">{{$policy->return_policy}}</textarea>
                                </div>
                                <div class="form-group">
                                    <label>
                                        Support Policy</label>
                                       <textarea id="" class="form-control" rows="10" name="support_policy">{{$policy->support_policy}}</textarea>
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
</div>

 
@endsection
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script>
    $(function () {
      $('.summernote').summernote()
    })
</script>