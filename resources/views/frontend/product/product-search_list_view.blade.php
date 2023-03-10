@foreach($products_search as $search)
    <div class="shop-list-wrap mb-30">
        <div class="row">
            <div class="col-xl-4 col-lg-5 col-md-6 col-sm-6">
                <div class="product-list-img">
                    <a href="{{url('product/details/'.$search->id.'/'.$search->product_slug ) }}">
                        <img src="{{ asset($search->product_image)}}" alt="Product Style">
                    </a>
                    <div class="product-list-quickview">
                        
                            <button type="button" data-bs-toggle="modal" data-bs-target="#exampleModal" id="{{ $search->id }}" onclick="productView(this.id)">
                            <i class="icon-size-fullscreen icons"></i></button>
                    </div>
                </div>
            </div>
            <div class="col-xl-8 col-lg-7 col-md-6 col-sm-6">
                <div class="shop-list-content">
                    <h3><a href="{{url('product/details/'.$search->id.'/'.$search->product_slug ) }}">{{ $search->product_name }}</a></h3>
                    <div class="pro-list-price">
                        <span>₹ {{ $search->product_discount }}</span>
                    </div>
                    
                    <p>{{ $search->short_description }}</p>
                    <div class="product-list-action">
                        <button title="Add To Cart"><i class="icon-basket-loaded"></i></button>
                        <button title="Wishlist"><i class="icon-heart" id="{{ $search->id }}" onclick="addToWishList(this.id)"></i></button>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endforeach