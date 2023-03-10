@extends('admin.admin_master')
@section('admin')
@section('title')
Product
@endsection
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
<div class="page-content">
    <section class="content-header">
        <div class="container-fluid">
          <div class="row mb-2">
            <div class="col-sm-6">
              <h4>Add New Products</h4>
            </div>
            <div class="col-sm-6">
              <ol class="breadcrumb float-sm-right">
                <li class="breadcrumb-item"><a href="{{route('admin.dashboard')}}">Home</a></li>
                <li class="breadcrumb-item active">Product</li>
                <li class="breadcrumb-item active">Add Product</li>
              </ol>
            </div>
          </div>
        </div><!-- /.container-fluid -->
    </section>
    <form method="post" action="{{ route('product.store') }}" enctype="multipart/form-data">
        @csrf
<div class="row">                    
    <div class="col-md-4">
        <div class="form-group">
            <label for="">
                Category </label>
                <select id="ddlCategory" name="ddlCategory" class="form-control" title="Please Select Category">
                 <option value="">Select Category</option>
                    @foreach ($category as $item)
                    <option value="{{$item->id}}">{{$item->categoryName}}</option>
                    @endforeach
                </select>
                @error('ddlCategoryType') 
                <span class="text-danger">{{ $message }}</span>
                @enderror
        </div>     
    <div class="form-group">
        <label for="" class="form-label">
            Product  Name</label>
        <input type="text" id="product_name" name="product_name" class="form-control pt-2"
            title="Please Enter Product Name"  placeholder="Enter Product Name" autocomplete="off" required/>
            @error('product_name') 
            <span class="text-danger">{{ $message }}</span>
            @enderror
    </div>
    <div class="form-group">
        <label class="form-label">Product Description</label>
        <textarea  rows="5"  id="product_description" name="product_description" class="form-control" autocomplete="off" ></textarea>
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
                    <option value="{{$item->id}}">{{$item->product_unit}}</option>
                    @endforeach
                </select>
                @error('product_unit') 
                <span class="text-danger">{{ $message }}</span>
                @enderror
        </div>     
    <div class="form-group">
        <label class="form-label">Product Price</label>
        <input type="text" id="product_price" name="product_price" class="form-control pt-2"
        title="Please Enter Product Price"  placeholder="Enter Product Price" autocomplete="off" required/>
            @error('product_price') 
            <span class="text-danger">{{ $message }}</span>
            @enderror
    </div> 
    <div class="form-group">
        <label class="form-label">Product Discount Price</label>
        <input type="text" id="product_dis_price" name="product_dis_price" class="form-control pt-2"
        title="Please Enter Product Price"  placeholder="Enter Product Price" autocomplete="off" required/>
            @error('product_dis_price') 
            <span class="text-danger">{{ $message }}</span>
            @enderror
    </div> 
    <div class="form-group">
        <label class="form-label">Product Shipping Charge</label>
        <input type="text" id="product_ship_charge" name="product_ship_charge" class="form-control pt-2"
        title="Please Enter Product Shipping Charge"  placeholder="Enter Product Shipping Charge" autocomplete="off" required/>
            @error('product_ship_charge') 
            <span class="text-danger">{{ $message }}</span>
            @enderror
    </div>
    </div>
    <div class="col-md-4">
        <div class="form-group">
            <label class="form-label">Product Image</label>
            <input type="file" id="product_image" name="product_image" class="form-control" onChange="mainThamUrl(this)" required/>
                @error('product_image') 
                <span class="text-danger">{{ $message }}</span>
                @enderror<br>
                <img src="" id="mainThmb">
        </div>
        <div class="form-group">
            <label>
                Product Multiple Image<span class="text-danger">*</span>
            </label>
            <input type="file" id="multiImg" name="multi_img[]" class="form-control" multiple="">
                @error('multi_img') 
                    <span class="text-danger">{{ $message }}</span>
                @enderror
                <div class="row" id="preview_img">
                </div>
        </div>
        <div class="form-group">
            <div class="custom-control custom-switch">
                <input type="checkbox" class="custom-control-input" id="customSwitch1" name="is_featured" value="1">
                <label class="custom-control-label" for="customSwitch1">Featured</label>
              </div>
              <div class="custom-control custom-switch">
                <input type="checkbox" class="custom-control-input" id="customSwitch2" name="is_hotDeals" value="1">
                <label class="custom-control-label" for="customSwitch2">Hot Deals</label>
              </div>
        </div>
        <button type="submit" class="btn btn-primary mt-5">Save</button>  
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
<script>
    $(function () {
      // Summernote
      $('#summernote').summernote()

    })
  </script>