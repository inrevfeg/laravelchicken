@extends('frontend.main_master')
@section('content')
@section('title')
Return Policy | India's No 1 Online Saree Shop - Nithitex
@endsection

<div class="breadcrumb-area bg-gray">
    <div class="container">
        <div class="breadcrumb-content text-center">
            <ul>
                <li>
                    <a href="/">Home</a>
                </li>
                <li class="active">Return Policy</li>
            </ul>
        </div>
    </div>
</div>
<div class="about-us-area pt-120 pb-120">
    <div class="container">
        <div class="row">
            <div class="col-lg-12 col-md-12">
                <div class="privacy-content">
                    <h2>Return Policy</h2>
                    <h3 class="pt-10 pb-10 text-center">Welcome to NithiTex!</h3>
                    @foreach ($returnPolicy as $item)
                    <p>{{$item->return_policy}}</p>
                    @endforeach
                 </div>
            </div>
        </div>
    </div>
</div>

@endsection