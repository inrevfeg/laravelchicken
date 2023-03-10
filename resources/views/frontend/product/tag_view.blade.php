@extends('frontend.main_master')
@section('content')
@section('title')
Popular Tags | India's No 1 Online Saree Shop - Nithitex
@endsection

<div class="breadcrumb-area bg-gray">
    <div class="container">
        <div class="breadcrumb-content text-center">
            <ul>
                <li>
                    <a href="/">Home</a>
                </li>
                <li class="active">Popular Tags</li>
            </ul>
        </div>
    </div>
</div>
<div class="shop-area pt-80 pb-80">
    <div class="container">
        <div class="row flex-row-reverse">
            <div class="col-lg-9">
                <div class="shop-topbar-wrapper">
                    <div class="shop-topbar-left">
                        <div class="view-mode nav">
                            <a class="active" href="#shop-1" data-bs-toggle="tab"><i class="icon-grid"></i></a>
                            <a href="#shop-2" data-bs-toggle="tab"><i class="icon-menu"></i></a>
                        </div>
                        <p>Showing products by Popular Tags </p>
                    </div>
                    {{-- <div class="product-sorting-wrapper">
                        <div class="product-shorting shorting-style">
                            <label>View :</label>
                            <select>
                                <option value=""> 20</option>
                                <option value=""> 23</option>
                                <option value=""> 30</option>
                            </select>
                        </div>
                        <div class="product-show shorting-style">
                            <label>Sort by :</label>
                            <select>
                                <option value="">Default</option>
                                <option value="">Name</option>
                                <option value="">price</option>
                            </select>
                        </div>
                    </div> --}}
                </div>
                <div class="shop-bottom-area">
                    <div class="tab-content jump">
                        <div id="shop-1" class="tab-pane active">
                            <div class="row" id="grid_view_product">
                                @include('frontend.product.tags_grid_view')
                            </div>
                        </div>
                        <div id="shop-2" class="tab-pane" id="list_view_product">
                            @include('frontend.product.tags_list_view')
                        </div>
                    </div>
                    {{-- <div class="pro-pagination-style text-center mt-10">
                        <ul>
                            <li><a class="prev" href="#"><i class="icon-arrow-left"></i></a></li>
                            <li><a class="active" href="#">1</a></li>
                            <li><a href="#">2</a></li>
                            <li><a class="next" href="#"><i class="icon-arrow-right"></i></a></li>
                        </ul>
                    </div> --}}
                    <div class="ajax-loadmore-product text-center" style="display:none;">
                        <img src="{{ asset('frontend/assets/images/logo/Spinner-1s-200px.svg') }}" style="width: 120px; height: 120px;" alt="">
                    </div>
                </div>
            </div>
            <div class="col-lg-3">
                @include('frontend.product.sidebar')
            </div>
        </div>
    </div>
</div>

<script>
    function loadmoreProduct(page){
      $.ajax({
        type: "get",
        url: "?page="+page,
        beforeSend: function(response){
          $('.ajax-loadmore-product').show();
        }
      })
      .done(function(data){
        if (data.grid_view == " " || data.list_view == " ") {
          return;
        }
         $('.ajax-loadmore-product').hide();
         $('#grid_view_product').append(data.grid_view);
         $('#list_view_product').append(data.list_view);
      })
      .fail(function(){
        alert('Something Went Wrong');
      })
    }
    var page = 1;
    $(window).scroll(function (){
      if ($(window).scrollTop() +$(window).height() >= $(document).height()){
        page ++;
        loadmoreProduct(page);
      }
    });
</script>

@endsection