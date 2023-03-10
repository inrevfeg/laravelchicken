@foreach($products_search as $search)
<div class="col-xl-4 col-lg-4 col-md-6 col-sm-6 col-12">
    <div class="single-product-wrap mb-35">
        <div class="product-img product-img-zoom mb-15">
            <a href="{{url('product/details/'.$search->id.'/'.$search->product_slug ) }}">
                <img src="{{ asset($search->product_image)}}" alt="">
            </a>
            <div class="product-action-2 tooltip-style-2">
                <button title="Wishlist"><i class="icon-heart" id="{{ $search->id }}" onclick="addToWishList(this.id)"></i></button>
              
                    <button type="button" data-bs-toggle="modal" data-bs-target="#exampleModal" id="{{ $search->id }}" onclick="productView(this.id)">
                    <i class="icon-size-fullscreen icons"></i></button>
            </div>
        </div>
        <div class="product-content-wrap-2 text-center">
            
            <h3><a href="{{url('product/details/'.$search->id.'/'.$search->product_slug ) }}">{{ $search->product_name }}</a></h3>
            <div class="product-price-2">
                <span>₹ {{ $search->product_discount }}</span>
            </div>
        </div>
        <div class="product-content-wrap-2 product-content-position text-center">
            
            <h3><a href="{{url('product/details/'.$search->id.'/'.$search->product_slug ) }}">{{ $search->product_name }}</a></h3>
            <div class="product-price-2">
                <span>₹ {{ $search->product_discount }}</span>
            </div>
            <div class="pro-add-to-cart">
                <button title="Add to Cart">Add To Cart</button>
            </div>
        </div>
    </div>
</div>
@endforeach
