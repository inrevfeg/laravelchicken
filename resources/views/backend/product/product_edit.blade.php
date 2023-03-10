@extends('admin.admin_master')
@section('admin')
@section('title')
Product
@endsection
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<div class="page-content">
    <section class="content-header">
        <div class="container-fluid">
          <div class="row mb-2">
            <div class="col-sm-6">
              <h4>Edit Product</h4>
            </div>
            <div class="col-sm-6">
              <ol class="breadcrumb float-sm-right">
                <li class="breadcrumb-item"><a href="{{route('admin.dashboard')}}">Home</a></li>
                <li class="breadcrumb-item active">Master</li>
                <li class="breadcrumb-item active">Edit Product</li>
              </ol>
            </div>
          </div>
        </div><!-- /.container-fluid -->
    </section>
    <form method="post" action="{{ route('product.update') }}" enctype="multipart/form-data">
        @csrf
        <input type="hidden" name="id" value="{{ $products->id }}">
       <input type="hidden" name="old_img" value="{{ $products->productImage }}">
        <div class="row">                    
            <div class="col-md-4">
                <div class="form-group">
                    <label for="txtDepartmentName">
                        Category Type</label>
                        <select id="ddlCategory" name="ddlCategory" class="form-control" title="Please Select Category Type">
                        <option value="">Select Category</option>
                            @foreach ($categories as $item)
                            <option value="{{$item->id}}"  {{ $item->id == $products->categoryId ? 'selected': '' }}>{{$item->categoryName}}</option>
                            @endforeach
                        </select>
                        @error('ddlCategoryType') 
                        <span class="text-danger">{{ $message }}</span>
                        @enderror
                </div>
            <div class="form-group">
                <label for="" class="form-label">
                    Product  Name</label>
                <input type="text" id="product_name" value="{{ $products->productName }}" name="product_name" class="form-control pt-2"
                    title="Please Enter Product Name"  placeholder="Enter Product Name" autocomplete="off" required/>
                    @error('product_name') 
                    <span class="text-danger">{{ $message }}</span>
                    @enderror
            </div>
            <div class="form-group">
                <label class="form-label">Product Description</label>
                <textarea  rows="5"  id="product_description" name="product_description" class="form-control" autocomplete="off" > {!! $products->productDescription !!}</textarea>
                    @error('product_description') 
                    <span class="text-danger">{{ $message }}</span>
                    @enderror
                
            </div>
        
            </div>
            <div class="col-md-4">
                <div class="form-group">
                    <label for="">
                        Product Unit</label>
                        <select id="product_unit" name="product_unit" class="form-control" title="Please Select Unit">
                        <option value="">Select Product Unit</option>
                            @foreach ($unit as $item)
                            <option value="{{$item->id}}"  {{ $item->id == $products->productUnitId ? 'selected': '' }}>{{$item->product_unit}}</option>
                            @endforeach
                        </select>
                        @error('product_unit') 
                        <span class="text-danger">{{ $message }}</span>
                        @enderror
                </div>     
            <div class="form-group">
                <label class="form-label">Product Price</label>
                <input type="text" id="product_price" name="product_price" class="form-control pt-2"
                title="Please Enter Product Price" value="{{ $products->productPrice }}"  placeholder="Enter Product Price" autocomplete="off" required/>
                    @error('product_price') 
                    <span class="text-danger">{{ $message }}</span>
                    @enderror
            </div> 
            <div class="form-group">
                <label class="form-label">Product Discount Price</label>
                <input type="text" id="product_dis_price" name="product_dis_price" value="{{ $products->productDiscount }}"  class="form-control pt-2"
                title="Please Enter Product Price"  placeholder="Enter Product Price" autocomplete="off" required/>
                    @error('product_dis_price') 
                    <span class="text-danger">{{ $message }}</span>
                    @enderror
            </div> 
            <div class="form-group">
                <label class="form-label">Product Shipping Charge</label>
                <input type="text" id="product_ship_charge" value="{{ $products->productShipCharge }}"  name="product_ship_charge" class="form-control pt-2"
                title="Please Enter Product Shipping Charge"  placeholder="Enter Product Shipping Charge" autocomplete="off" required/>
                    @error('product_ship_charge') 
                    <span class="text-danger">{{ $message }}</span>
                    @enderror
            </div>
            <div class="form-group">
                <div class="custom-control custom-switch">
                    <input type="checkbox" class="custom-control-input" id="customSwitch1" name="is_featured" value="1" {{ $products->is_featured == 1 ? 'checked': '' }}>
                    <label class="custom-control-label" for="customSwitch1">Featured</label>
                  </div>
                  <div class="custom-control custom-switch">
                    <input type="checkbox" class="custom-control-input" id="customSwitch2" name="is_hotDeals" value="1" {{ $products->is_hotDeals == 1 ? 'checked': '' }}>
                    <label class="custom-control-label" for="customSwitch2">Hot Deals</label>
                  </div>
            </div>
            </div>
            <div class="col-md-4">
                <div class="form-group">
                    <label class="form-label">Product Image</label>
                    <input type="file" id="product_image" name="product_image" class="form-control" onChange="mainThamUrl(this)"/>
                        @error('product_image') 
                        <span class="text-danger">{{ $message }}</span>
                        @enderror<br>
                        <img src="{{ asset($products->productImage) }}" id="mainThmb" height="100" width="100">
                </div>
                <div class="form-group">
                    <label>
                        Product Multiple Image<span class="text-danger">*</span>
                    </label>
                    <input type="file" id="multiImg" name="multi_img[]" class="form-control" multiple="">
                        @error('multi_img') 
                            <span class="text-danger">{{ $message }}</span>
                        @enderror
                        <div class="row" id="preview_img" >
                        
                        </div>
                        <div class="row row-sm">
                            @foreach($multiImgs as $img)
                            <div class="col-md-3">
            
                                <div class="card">
                                    <img src="{{ asset($img->productMultiImage) }}" class="card-img-top"  height="100" width="100" >
                                
                                    <div class="card-body">
                                        <h5 class="card-title">                                             
                                        <a href="{{ route('product.multiimg.delete',$img->id) }}" class="btn-sm btn-danger" id="delete" title="Delete Data"><i class="fa fa-trash-o" aria-hidden="true"></i> </a>
                                        </h5>
                                        {{-- <p class="card-text"> 
                                            <div class="form-group">
                                                <label class="form-control-label">Change Image <span class="tx-danger">*</span></label>
                                                <input class="form-control" type="file"  id="multiImg" name="multi_img[{{ $img->id }}]">
                                            </div> 
                                        </p>	 --}}
                                    </div>
                                </div> 		
                            
                            </div><!--  end col md 3		 -->	
                            @endforeach
                        </div>	

                    
                </div>
                <button class="btn btn-primary mt-5">Save</button>  
                <a href="{{route('product.list')}}" class="btn btn-primary mt-5">GoTo Product List</a>  
            </div>
        </div>
             
    </form>
</div>
@endsection
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
<script type="text/javascript">
    $(document).ready(function(){
      //Multiple Image
     $('#multiImg').on('change', function(){ //on file input change
        if (window.File && window.FileReader && window.FileList && window.Blob) //check File API supported browser
        {
            var data = $(this)[0].files; //this file data
             
            $.each(data, function(index, file){ //loop though each file
                if(/(\.|\/)(gif|jpe?g|png)$/i.test(file.type)){ //check supported file type
                    var fRead = new FileReader(); //new filereader
                    fRead.onload = (function(file){ //trigger function on successful read
                    return function(e) {
                        var img = $('<img/>').addClass('thumb').attr('src', e.target.result) .width(80)
                    .height(80); //create image element 
                        $('#preview_img').append(img); //append image to output element
                    };
                    })(file);
                    fRead.readAsDataURL(file); //URL representing the file's data.
                }
            });
             
        }else{
            alert("Your browser doesn't support File API!"); //if File API is absent
        }
     });
   
  
  });
  
  </script>
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