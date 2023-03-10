<?php

use App\Http\Controllers\API\ApiController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::post('register', [App\Http\Controllers\API\UserController::class, 'register']);
Route::post('login', [App\Http\Controllers\API\UserController::class, 'login']);  

Route::group(['middleware' => ['auth:api']], function () {
    Route::post('logout',[App\Http\Controllers\API\UserController::class, 'logout']);
    Route::get('product/category',[App\Http\Controllers\API\CategoryController::class,'category']);
    Route::get('category/list/{id}',[App\Http\Controllers\API\CategoryController::class,'categoryList']);
    Route::get('feature/product',[App\Http\Controllers\API\FeatureController::class,'feature']);
    Route::get('best-selling/product',[App\Http\Controllers\API\BestsellingController::class,'bestSelling']);
    Route::get('new-arrival/product',[App\Http\Controllers\API\NewArrivalController::class,'newArrival']);
    Route::get('product/detail/{id}',[App\Http\Controllers\API\ProductController::class,'product']);
    Route::post('wishlist/add',[App\Http\Controllers\API\WishlistController::class,'addToWishlist']);
    Route::get('wishlist/product',[App\Http\Controllers\API\WishlistController::class,'wishlistProducts']);
    Route::get('search/{search_value}',[App\Http\Controllers\API\ProductController::class,'search']);
    Route::post('cart/{id}',[App\Http\Controllers\API\CartController::class,'cart']);
    Route::get('cart/delete/{id}',[App\Http\Controllers\API\CartController::class,'cartDelete']);
    Route::get('get/cartlist',[App\Http\Controllers\API\CartController::class,'cartlist']);
    Route::post('cart/increase/{id}',[App\Http\Controllers\API\CartController::class,'CartIncrement']);
    Route::post('cart/decrease/{id}',[App\Http\Controllers\API\CartController::class,'CartDecrement']);
    Route::get('contact',[App\Http\Controllers\API\ApiController::class,'contact']);
    Route::get('order/list',[App\Http\Controllers\API\ApiController::class,'orderList']);
    Route::post('order/{id}',[App\Http\Controllers\API\ApiController::class,'returnOrder']);
    Route::get('return/orderlist',[App\Http\Controllers\API\ApiController::class,'returnOrderList']);
    Route::get('cancel/orderlist',[App\Http\Controllers\API\ApiController::class,'cancelOrders']);
    Route::post('/user/password/update',[App\Http\Controllers\API\ApiController::class, 'UserPasswordUpdate']);
    Route::post('/user/profile',[App\Http\Controllers\API\ApiController::class, 'UserProfileStore']);
    Route::post('checkout',[App\Http\Controllers\API\ApiController::class, 'placeOrder']);
    Route::post('razorpay',[App\Http\Controllers\API\ApiController::class, 'razorpay']);
    Route::get('slider',[App\Http\Controllers\API\ApiController::class, 'slider']);
    Route::get('order/details/{order_id}',[App\Http\Controllers\API\ApiController::class, 'orderDetail']);
    Route::get('related/product/{id}',[App\Http\Controllers\API\ApiController::class, 'relatedProducts']);
    Route::get('latest/product/sort',[App\Http\Controllers\API\ApiController::class, 'latestSort']);
    Route::get('product/name/sort',[App\Http\Controllers\API\ApiController::class, 'nameSort']);
    Route::get('product/lth/sort',[App\Http\Controllers\API\ApiController::class, 'priceLowSort']);
    Route::get('product/htl/sort',[App\Http\Controllers\API\ApiController::class, 'priceHighSort']);
    Route::get('product/qlth/sort',[App\Http\Controllers\API\ApiController::class, 'priceQtyLowSort']);
    Route::get('product/qhtl/sort',[App\Http\Controllers\API\ApiController::class, 'priceQtyHighSort']);
    Route::get('color/sort/{color_id}',[App\Http\Controllers\API\ApiController::class, 'colorSort']);
    Route::get('color/list',[App\Http\Controllers\API\ApiController::class, 'colorList']);



    

    //image
    // Route::get('category/image/{id}', [App\Http\Controllers\API\CategoryController::class,'categoryImage']);
    // Route::get('feature/product/image/{id}', [App\Http\Controllers\API\FeatureController::class,'featureImage']);
    // Route::get('best-selling/product/image/{id}', [App\Http\Controllers\API\BestsellingController::class,'bestSellingImage']);
    // Route::get('new-arrival/product/image/{id}', [App\Http\Controllers\API\NewArrivalController::class,'newArrivalImage']);
    // Route::get('product/image/{id}', [App\Http\Controllers\API\ProductController::class,'productImage']);
});