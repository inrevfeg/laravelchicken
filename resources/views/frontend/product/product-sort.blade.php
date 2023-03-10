@extends('frontend.main_master')
@section('content')
@section('title')
Products by Filters | India's No 1 Online Saree Shop - Nithitex
@endsection

<div class="breadcrumb-area bg-gray">
    <div class="container">
        <div class="breadcrumb-content text-center">
            <ul>
                <li>
                    <a href="/">Home</a>
                </li>
                <li class="active">Products by Filters</li>
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
                        <p>Showing all products </p>
                    </div>                    <div class="product-sorting-wrapper">
                        <form action="{{route('product.color.sort')}}" method="get">
                            <div class="product-show shorting-style">
                                <label>Sort by color :</label>
                                <select name="color_sort" id="color_sort">
                                    <option value="">select</option>
                                    @foreach ($color as $item)
                                        <option value="{{$item->id}}">{{$item->color_name}}</option>
                                    @endforeach
                                </select>
                            </div>
                        </form>
                    </div>
                    <div class="product-sorting-wrapper">
                        <form action="{{route('product.sort')}}" method="get">
                            <div class="product-show shorting-style">
                                <label>Sort by :</label>
                                <select name="sort" id="sort" class="sort">
                                    <option value="">select</option>
                                    <option value="latest_product">Latest Product</option>
                                    <option value="product_name">Product Name</option>
                                    <option value="p_low_to_high">Price : Low To High</option>
                                    <option value="p_high_to_low">Price : High To Low</option>
                                    <option value="q_low_to_high">Quantity : Low To High</option>
                                    <option value="q_high_to_low">Quantity : High To Low</option>
                                </select>
                            </div>
                        </form>
                    </div>
                </div>
                <div class="shop-bottom-area">
                    <div class="tab-content jump">
                        <div id="shop-1" class="tab-pane active">
                            <div class="row" id="grid_view_product">
                                @include('frontend.product.product-sort_grid_view')
                            </div>
                        </div>
                        <div id="shop-2" class="tab-pane" id="list_view_product">
                            @include('frontend.product.product-sort_list_view')
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-3">
                @include('frontend.product.sidebar')
            </div>
        </div>
    </div>
</div>

@endsection