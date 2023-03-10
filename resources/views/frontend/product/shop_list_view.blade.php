@foreach($shop_all_products as $shop_all_product)
    <div class="shop-list-wrap mb-30">
        <div class="row">
            <div class="col-xl-4 col-lg-5 col-md-6 col-sm-6">
                <div class="product-list-img">
                    <a href="{{url('product/details/'.$shop_all_product->id.'/'.$shop_all_product->product_slug ) }}">
                        <img src="{{ asset($shop_all_product->product_image)}}" alt="Product Style">
                    </a>
                    <div class="product-list-quickview">
                            <button type="button" data-bs-toggle="modal" data-bs-target="#exampleModal" id="{{ $shop_all_product->id }}" onclick="productView(this.id)">
                            <i class="icon-size-fullscreen icons"></i></button>
                    </div>
                </div>
            </div>
            <div class="col-xl-8 col-lg-7 col-md-6 col-sm-6">
                <div class="shop-list-content">
                    <h3><a href="{{url('product/details/'.$shop_all_product->id.'/'.$shop_all_product->product_slug ) }}">{{ $shop_all_product->product_name }}</a></h3>
                    <div class="pro-list-price">
                        <span>₹ {{ $shop_all_product->product_discount }}</span>
                    </div>
                    
                    <p>{{ $shop_all_product->short_description }}</p>
                    <div class="product-list-action">
                        <input type="hidden" id="product_id" value="{{ $shop_all_product->id }}">
                        <span id="pname" hidden>{{ $shop_all_product->product_name }}</span>
                        <input type="hidden" id="qty" value="1">
                        <button title="Add To Cart" type="submit" id="{{ $shop_all_product->id }}" onclick="addToCartsimple(this.id)"><i class="icon-basket-loaded"></i></button>
                        <button title="Wishlist"><i class="icon-heart" id="{{ $shop_all_product->id }}" onclick="addToWishList(this.id)"></i></button>
                        <div>
                            <a href="{{url('product/buynow/'.$shop_all_product->id) }}" style="border-radius: 50px;"  class="btn btn-danger buy mt-2">Buy Now </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endforeach