@foreach($category_details as $category_products)
<div class="col-xl-4 col-lg-4 col-md-6 col-sm-6 col-12">
    <div class="single-product-wrap mb-35">
        <div class="product-img product-img-zoom mb-15">
            <a href="{{url('product/details/'.$category_products->id.'/'.$category_products->product_slug ) }}">
                <img src="{{ asset($category_products->product_image)}}" alt="">
            </a>
            <div class="product-action-2 tooltip-style-2">
                <button title="Wishlist"><i class="icon-heart" id="{{ $category_products->id }}" onclick="addToWishList(this.id)"></i></button>
                <button type="button" data-bs-toggle="modal" data-bs-target="#exampleModal" id="{{ $category_products->id }}" onclick="productView(this.id)">
                
                    <i class="icon-size-fullscreen icons"></i></button>
            </div>
        </div>
        <div class="product-content-wrap-2 text-center">
            
            <h3><a href="{{url('product/details/'.$category_products->id.'/'.$category_products->product_slug ) }}">{{ $category_products->product_name }}</a></h3>
            <div class="product-price-2">
                <span>₹ {{ $category_products->product_discount }}</span>
            </div>
        </div>
        <div class="product-content-wrap-2 product-content-position text-center">
            
            <h3><a href="{{url('product/details/'.$category_products->id.'/'.$category_products->product_slug ) }}">{{ $category_products->product_name }}</a></h3>
            <div class="product-price-2">
                <span>₹ {{ $category_products->product_discount }}</span>
            </div>
            <div class="pro-add-to-cart">
                <input type="hidden" id="product_id" value="{{ $category_products->id }}">
                <span id="pname" hidden>{{ $category_products->product_name }}</span>
                <input type="hidden" id="qty" value="1">
               
                <button title="Add to Cart" type="submit" id="{{ $category_products->id }}" onclick="addToCartsimple(this.id)">Add To Cart</button>
                <a href="{{url('product/buynow/'.$category_products->id) }}" style="border-radius: 50px;"  class="btn btn-danger buy">Buy Now </a>
            </div>
        </div>
    </div>
</div>
@endforeach
