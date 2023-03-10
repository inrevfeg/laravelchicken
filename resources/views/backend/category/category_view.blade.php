@extends('admin.admin_master')
@section('admin')
@section('title')
Product Category
@endsection
<div class="page-content pt-5">
    <section class="content-header">
        <div class="container-fluid">
          <div class="row mb-2">
            <div class="col-sm-6">
              <h5>Product Category</h5>
            </div>
            <div class="col-sm-6">
              <ol class="breadcrumb float-sm-right">
                <li class="breadcrumb-item"><a href="{{route('admin.dashboard')}}">Home</a></li>
                <li class="breadcrumb-item active">Master</li>
                <li class="breadcrumb-item active">Product Category</li>
              </ol>
            </div>
          </div>
        </div><!-- /.container-fluid -->
    </section>
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    {{-- <h3 class="card-title">Product Category</h3>     --}}
                </div>
                <div class="card-body">
                    <div class="row">
                        <div id="divCategory" class="col-lg-4 col-md-4">
                            <form method="post" action="{{ route('category.store') }}" enctype="multipart/form-data">
                                @csrf
                            <div class="form-group">
                                <label for="exampleInputEmail1">
                                    Category Name</label>
                                <input type="text" id="category" name="category" class="form-control"
                                    title="Please Enter Category Name" placeholder="Enter Category Name" autocomplete="off" required/>
                                    @error('Category') 
                                    <span class="text-danger">{{ $message }}</span>
                                    @enderror
                            </div>
                            <div class="form-group">
                                <label>Category Image</label>
                                <input type="file" id="category_image" name="category_image" class="form-control" onChange="mainThamUrl(this)" required/>
                                    @error('category_image') 
                                    <span class="text-danger">{{ $message }}</span>
                                    @enderror<br>
                                    <img src="" id="mainThmb">
                            </div> 
                            <div class="form-group">
                                <label>Category Description</label>
                                <textarea  id="category_description" name="category_description" class="form-control" autocomplete="off" ></textarea>
                                    @error('category_description') 
                                    <span class="text-danger">{{ $message }}</span>
                                    @enderror
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
    </div>
    <h5 class="pb-3 pt-5">PRODUCT CATEGORY LIST</h5>
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    {{-- <h3 class="card-title">Product Category List</h3> --}}
                </div>
                <div class="card-body">
                    <div class="col-md-12">
                        <div class="table-responsive">
                            <table id="dataTableExample" class="table table-bordered">
                                <thead>
                                    <tr>
                                        <th>#</th>
                                        <th>Product Category Image</th>
                                        <th>Product Category Name</th>
                                        <th>Product Categroy Description</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody id="tbodyList">
                                    @php
                                        $serialNo = 1;
                                    @endphp
                                    @foreach ($categories as $item )
                                    <tr id="emptyRow" style="height: 25px;">
                                        <td>{{$serialNo}}</td>
                                        <td><img src="{{ asset($item->categoryImage) }}" style="width: 60px; height: 50px;"></td>
                                        <td>{{$item->categoryName}}</td>
                                        <td>{{$item->categoryDescription}}</td>
                                        <td>
                                            <a href="{{ route('category.edit',$item->id) }}" class="btn btn-info btn-sm btn-flat" title="Edit Data">Edit</a>
                                            <a href="{{ route('category.delete',$item->id) }}" class="btn btn-danger btn-sm btn-flat" title="Delete Data" id="delete">Delete</a>
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
<script type="text/javascript">
    function mainThamUrl(input){
      if (input.files && input.files[0]) {
          var reader = new FileReader();
          reader.onload = function(e){
              $('#mainThmb').attr('src',e.target.result).width(80).height(80);
          };
          reader.readAsDataURL(input.files[0]);
      }
  }
</script>