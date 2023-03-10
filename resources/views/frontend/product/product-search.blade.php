@extends('frontend.main_master')
@section('content')
@section('title')
Search Results | India's No 1 Online Saree Shop - Nithitex
@endsection

<div class="breadcrumb-area bg-gray">
    <div class="container">
        <div class="breadcrumb-content text-center">
            <ul>
                <li>
                    <a href="/">Home</a>
                </li>
                <li class="active">Search Results</li>
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
                    </div>
                </div>
                <div class="shop-bottom-area">
                    <div class="tab-content jump">
                        <div id="shop-1" class="tab-pane active">
                            <div class="row" id="grid_view_product">
                                @include('frontend.product.product-search_grid_view')
                            </div>
                        </div>
                        <div id="shop-2" class="tab-pane" id="list_view_product">
                            @include('frontend.product.product-search_list_view')
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