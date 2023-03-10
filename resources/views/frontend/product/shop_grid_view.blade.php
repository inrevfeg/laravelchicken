@foreach($shop_all_products as $shop_all_product)
<div class="col-xl-4 col-lg-4 col-md-6 col-sm-6 col-12">
    <div class="single-product-wrap mb-35">
        <div class="product-img product-img-zoom mb-15">
            <a href="{{url('product/details/'.$shop_all_product->id.'/'.$shop_all_product->product_slug ) }}">
                <img src="{{ asset($shop_all_product->product_image)}}" alt="">
            </a>
            <div class="product-action-2 tooltip-style-2">
                <button title="Wishlist"><i class="icon-heart" id="{{ $shop_all_product->id }}" onclick="addToWishList(this.id)"></i></button>
                
                    <button type="button" data-bs-toggle="modal" data-bs-target="#exampleModal" id="{{ $shop_all_product->id }}" onclick="productView(this.id)">
                    <i class="icon-size-fullscreen icons"></i></button>
            </div>
        </div>
        <div class="product-content-wrap-2 text-center">
           
            <h3><a href="{{url('product/details/'.$shop_all_product->id.'/'.$shop_all_product->product_slug ) }}">{{ $shop_all_product->product_name }}</a></h3>
            <div class="product-price-2">
                <span>₹ {{ $shop_all_product->product_discount }}</span>
            </div>
        </div>
        <div class="product-content-wrap-2 product-content-position text-center">
           
            <h3><a href="{{url('product/details/'.$shop_all_product->id.'/'.$shop_all_product->product_slug ) }}">{{ $shop_all_product->product_name }}</a></h3>
            <div class="product-price-2">
                <span>₹ {{ $shop_all_product->product_discount }}</span>
            </div>
            <div class="pro-add-to-cart">
                <input type="hidden" id="product_id" value="{{ $shop_all_product->id }}">
                <span id="pname" hidden>{{ $shop_all_product->product_name }}</span>
                <input type="hidden" id="qty" value="1">
                <button title="Add to Cart"  type="submit" id="{{ $shop_all_product->id }}" onclick="addToCartsimple(this.id)" >Add To Cart</button>
                <a href="{{url('product/buynow/'.$shop_all_product->id) }}" style="border-radius: 50px;" class="btn btn-danger buy">Buy Now </a>
            </div>
        </div>
    </div>
</div>
@endforeach
