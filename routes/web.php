<?php
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\RoleController;
use App\Http\Controllers\AssignRoleToUserController;
use App\Http\Controllers\Backend\AdminProfileController;
use App\Http\Controllers\Frontend\CartController;
use App\Http\Controllers\Frontend\IndexController;
use App\Http\Controllers\Frontend\User\AllUserController;
use App\Http\Controllers\Frontend\User\CartPageController;
use App\Http\Controllers\Frontend\User\CashController;
use App\Http\Controllers\Frontend\User\WishlistController;
use App\Http\Controllers\User\CheckoutController;
use App\Http\Controllers\Backend\ReturnController;
use App\Http\Controllers\Frontend\BuyNowController;
use App\Http\Controllers\Frontend\User\RazorpayController;
use App\Http\Controllers\StaffController;
use App\Http\Controllers\UserForgotPasswordController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

// //forget-password
// Route::get('forget-password', [App\Http\Controllers\Frontend\ForgetPasswordController::class, 'showForgetPasswordForm'])->name('forget.password.get');
// Route::post('forget-password', [App\Http\Controllers\Frontend\ForgetPasswordController::class, 'submitForgetPasswordForm'])->name('forget.password.post'); 
// Route::get('reset-password/{token}', [App\Http\Controllers\Frontend\ForgetPasswordController::class, 'showResetPasswordForm'])->name('reset.password.get');
// Route::post('reset-password', [App\Http\Controllers\Frontend\ForgetPasswordController::class, 'submitResetPasswordForm'])->name('reset.password.post');

Route::get('/',[IndexController::class, 'index'])->name('home');
// Route::get('/about',[IndexController::class, 'about'])->name('about');
// Route::get('/contact',[IndexController::class, 'contact'])->name('contact');
// Route::get('/terms',[IndexController::class, 'terms'])->name('terms');
// Route::get('/privacy',[IndexController::class, 'privacy'])->name('privacy');
// Route::get('/return',[IndexController::class, 'return'])->name('return');
// Route::get('/support',[IndexController::class, 'support'])->name('support');
Route::get('/track_order',[IndexController::class, 'track_order'])->name('track_order');

//User Dashboard
Route::middleware(['auth:sanctum', 'verified'])->get('/dashboard', function () {
    return view('dashboard');
})->name('dashboard');
Route::get('/user/logout',[IndexController::class, 'userLogout'])->name('user.logout');
Route::get('/user/profile',[IndexController::class, 'UserProfile'])->name('user.profile');
Route::post('/user/profile/store',[IndexController::class, 'UserProfileStore'])->name('user.profile.store');
Route::get('/user/change/password',[IndexController::class, 'UserChangePassword'])->name('change.password');
Route::post('/user/password/update',[IndexController::class, 'UserPasswordUpdate'])->name('user.password.update');


//user forget-password
Route::get('user-forget-password', [UserForgotPasswordController::class, 'showForgetPasswordForm'])->name('user.forget.password.get');
Route::post('user-forget-password', [UserForgotPasswordController::class, 'submitForgetPasswordForm'])->name('user.forget.password.post'); 
Route::get('user-reset-password/{token}', [UserForgotPasswordController::class, 'showResetPasswordForm'])->name('user.reset.password.get');
Route::post('user-reset-password', [UserForgotPasswordController::class, 'submitResetPasswordForm'])->name('user.reset.password.post');

//Shop Page
// Route::get('/product/shop',[IndexController::class, 'ProductShop'])->name('product.shop');

//Offers Page
// Route::get('/product/offers',[IndexController::class, 'ProductOffers'])->name('product.offers');

//Tag Products Page
// Route::get('/product/tag/{tags}',[IndexController::class, 'ProductsbyTags'])->name('product.tag');

//Frontend Product Details Load
Route::get('/product/details/{id}/{slug}', [IndexController::class, 'ProductDetails']);

//Category Products Load
Route::get('category/product/{id}', [IndexController::class, 'CategoryDetails']);
// Route::get('/product/view/modal/{id}', [IndexController::class, 'ProductViewAjax']);
// Route::post('/cart/data/store/{id}', [CartController::class, 'AddToCart']);
Route::post('/simplecart/data/store/{id}', [CartController::class, 'simpleAddToCart']);
Route::get('/product/mini/cart/', [CartController::class, 'AddMiniCart']);
Route::get('/minicart/product-remove/{rowId}', [CartController::class, 'RemoveMiniCart']); 
Route::post('/add-to-wishlist/{product_id}', [CartController::class, 'AddToWishlist']);
// Buy Now Button
Route::get('/product/buynow/{id}', [BuyNowController::class, 'ProductBuyNow']);

Route::group(['prefix'=>'user','middleware' => ['user','auth'],'namespace'=>'User'],function(){
    Route::get('/wishlist', [WishlistController::class, 'ViewWishlist'])->name('wishlist');
    Route::get('/wishlist-remove/{id}', [WishlistController::class, 'RemoveWishlistProduct']);
    Route::post('/cash/order', [CashController::class, 'CashOrder'])->name('cash.order');
    Route::post('/razorpay/order', [RazorpayController::class, 'RazorpayOrder'])->name('razorpay.order');
    Route::post('/razorpay/complete', [RazorpayController::class, 'RazorpayComplete'])->name('razorpay.complete');
    Route::get('/my/orders', [AllUserController::class, 'MyOrders'])->name('my.orders');
    Route::get('/order_details/{order_id}', [AllUserController::class, 'OrderDetails']);
    Route::get('/invoice_download/{order_id}', [AllUserController::class, 'InvoiceDownload']);
    Route::post('/order/tracking', [AllUserController::class, 'OrderTraking'])->name('order.tracking'); 
    Route::post('/return/order/{order_id}', [AllUserController::class, 'ReturnOrder'])->name('return.order');
    Route::get('/return/order/list', [AllUserController::class, 'ReturnOrderList'])->name('return.order.list');
    Route::get('/cancel/orders', [AllUserController::class, 'CancelOrders'])->name('cancel.orders');
});
Route::get('/get-wishlist-product', [WishlistController::class, 'GetWishlistProduct']);

Route::get('/checkout', [CartController::class, 'CheckoutCreate'])->name('checkout');
Route::post('/checkout/store', [CheckoutController::class, 'CheckoutStore'])->name('checkout.store');


Route::get('/mycart', [CartPageController::class, 'MyCart'])->name('mycart');
Route::get('/user/get-cart-product', [CartPageController::class, 'GetCartProduct']);
Route::get('/cart-remove/{rowId}', [CartPageController::class, 'RemoveCartProduct']);
Route::get('/cart-increment/{id}', [CartPageController::class, 'CartIncrement']);
Route::get('/cart-decrement/{id}', [CartPageController::class, 'CartDecrement']);

//Admin Login
Route::group(['prefix'=> 'admin', 'middleware'=>['admin:admin']], function(){
	Route::get('/login', [AdminController::class, 'loginForm']);
	Route::post('/login',[AdminController::class, 'store'])->name('admin.login');
});
//Admin Dashboard
Route::middleware(['auth:admin'])->group(function(){
Route::middleware(['auth:sanctum,admin', 'verified'])->get('/admin/dashboard', function () {
        return view('admin.index');
    })->name('admin.dashboard');

 // Admin All Routes 
 Route::get('/admin/profile', [AdminProfileController::class, 'AdminProfile'])->name('admin.profile');
 Route::get('/admin/profile/edit', [AdminProfileController::class, 'AdminProfileEdit'])->name('admin.profile.edit');
 Route::post('/admin/profile/store', [AdminProfileController::class, 'AdminProfileStore'])->name('admin.profile.store');
 Route::get('/admin/change/password', [AdminProfileController::class, 'AdminChangePassword'])->name('admin.change.password');
 Route::post('/update/change/password', [AdminProfileController::class, 'AdminUpdateChangePassword'])->name('update.change.password');
 Route::get('/admin/logout', [AdminController::class, 'destroy'])->name('admin.logout');
}); 
//Stock Maintanence
Route::get('/product', [\App\Http\Controllers\Backend\ProductController::class, 'ProductStock'])->name('product.stock');
Route::post('/product/quantity/update', [\App\Http\Controllers\Backend\ProductController::class, 'stockupdate'])->name('product.quantity.update');
//Sales Report
Route::get('/report/sales', [\App\Http\Controllers\Backend\ProductController::class, 'ReportSale'])->name('report.sales');
Route::post('/product/sale-wise-report', [\App\Http\Controllers\Backend\ProductController::class, 'saleReport'])->name('product.sale-wise-report');
//Pending Report
Route::get('/report/pending', [\App\Http\Controllers\Backend\ProductController::class, 'ReportPending'])->name('report.pending');
Route::post('/order/pending-wise-report', [\App\Http\Controllers\Backend\ProductController::class, 'pendingReport'])->name('order.pending-wise-report');
//Picked Report
Route::get('/report/picked', [\App\Http\Controllers\Backend\ProductController::class, 'ReportPicked'])->name('report.picked');
Route::post('/order/picked-wise-report', [\App\Http\Controllers\Backend\ProductController::class, 'PickedReport'])->name('order.picked-wise-report');
//Cancel Report
Route::get('/report/cancel', [\App\Http\Controllers\Backend\ProductController::class, 'ReportCancel'])->name('report.cancel');
Route::post('/order/cancel-wise-report', [\App\Http\Controllers\Backend\ProductController::class, 'CancelReport'])->name('order.cancel-wise-report');
//Return Report
Route::get('/report/return', [\App\Http\Controllers\Backend\ProductController::class, 'ReportReturn'])->name('report.return');
Route::post('/order/return-wise-report', [\App\Http\Controllers\Backend\ProductController::class, 'ReturnReport'])->name('order.return-wise-report');
//Product Out Of Stock Report
Route::get('/report/out_of_stock', [\App\Http\Controllers\Backend\ProductController::class, 'ReportOutofStock'])->name('report.out_of_stock');
//Product  Stock  Report
Route::get('/report/stock', [\App\Http\Controllers\Backend\ProductController::class, 'Reportstock'])->name('report.stock');
Route::post('/product/stock-wise-report', [\App\Http\Controllers\Backend\ProductController::class, 'stockReport'])->name('product.stock-wise-report');

//Reseller-Request
Route::get('/reseller/view',[\App\Http\Controllers\Backend\SellerApproveController::class,'ResellerView'])->name('resellers.all');
Route::get('/reseller/request',[\App\Http\Controllers\Backend\SellerApproveController::class,'ResellerRequest'])->name('resellers.request');
Route::get('/reseller/approve/{id}',[\App\Http\Controllers\Backend\SellerApproveController::class,'ResellerApprove'])->name('resellers.approve');
Route::get('/reseller/deny/{id}',[App\Http\Controllers\Backend\SellerApproveController::class,'ResellerDelete'])->name('reseller.deny');


//user-role-permission
    // Route::middleware(['auth','role:Super Admin'])->group(function(){

        Route::resource('user', StaffController::class);
        Route::resource('role', RoleController::class);
        Route::resource('assign_role_users', AssignRoleToUserController::class);
    // });
    
    Route::prefix('master')->group(function( ){
    //Categorries
        Route::get('category/view', [\App\Http\Controllers\Backend\CategoryController::class, 'CategoryView'])->name('category.all');
        Route::post('category/store', [\App\Http\Controllers\Backend\CategoryController::class, 'CategoryStore'])->name('category.store');
        Route::get('category/edit/{id}', [\App\Http\Controllers\Backend\CategoryController::class, 'CategoryEdit'])->name('category.edit');
        Route::post('category/update', [\App\Http\Controllers\Backend\CategoryController::class, 'CategoryUpdate'])->name('category.update');
        Route::get('category/delete/{id}', [\App\Http\Controllers\Backend\CategoryController::class, 'CategoryDelete'])->name('category.delete');
    });

    Route::prefix('product')->group(function( ){
    //Colors
    Route::get('view', [\App\Http\Controllers\Backend\ProductController::class, 'ProductView'])->name('product.all');
    Route::post('store', [\App\Http\Controllers\Backend\ProductController::class, 'ProductStore'])->name('product.store');
    Route::get('list', [\App\Http\Controllers\Backend\ProductController::class, 'ProductList'])->name('product.list');
    Route::get('edit/{id}', [\App\Http\Controllers\Backend\ProductController::class, 'ProductEdit'])->name('product.edit');
    Route::get('multiimg/delete/{id}', [\App\Http\Controllers\Backend\ProductController::class, 'ProductMultiImageDelete'])->name('product.multiimg.delete');   

    Route::post('update', [\App\Http\Controllers\Backend\ProductController::class, 'ProductUpdate'])->name('product.update');
    
    Route::get('delete/{id}', [\App\Http\Controllers\Backend\ProductController::class, 'ProductDelete'])->name('product.delete');

    Route::get('/color/variant/ajax/{color_id}',[\App\Http\Controllers\Backend\ProductController::class, 'getColorValue']);

    });

    Route::prefix('settings')->group(function( ){
        
        //about_us
        Route::get('about-view',[\App\Http\Controllers\Backend\SettingsController::class, 'aboutView'])->name('about.all');
        Route::post('about/store',[\App\Http\Controllers\Backend\SettingsController::class, 'store'])->name('about.store');
        Route::get('about/edit/{id}', [\App\Http\Controllers\Backend\SettingsController::class, 'edit'])->name('about.edit');
        Route::post('about/update', [\App\Http\Controllers\Backend\SettingsController::class, 'update'])->name('about.update');
        Route::get('about/delete/{id}', [\App\Http\Controllers\Backend\SettingsController::class, 'delete'])->name('about.delete');

        //Terms & Condition
        Route::get('policy-view',[\App\Http\Controllers\Backend\PolicyController::class, 'index'])->name('policy.all');
        Route::post('policy/store',[\App\Http\Controllers\Backend\PolicyController::class, 'store'])->name('policy.store');
        Route::get('policy/edit/{id}', [\App\Http\Controllers\Backend\PolicyController::class, 'edit'])->name('policy.edit');
        Route::post('policy/update', [\App\Http\Controllers\Backend\PolicyController::class, 'update'])->name('policy.update');
        Route::get('policy/delete/{id}', [\App\Http\Controllers\Backend\PolicyController::class, 'delete'])->name('policy.delete');

        //slider
        Route::get('slider-view',[\App\Http\Controllers\Backend\SliderController::class,'index'])->name('slider.all');
        Route::post('slider/store',[\App\Http\Controllers\Backend\SliderController::class, 'store'])->name('slider.store');
        Route::get('slider/edit/{id}', [\App\Http\Controllers\Backend\SliderController::class, 'edit'])->name('slider.edit');
        Route::post('slider/update', [\App\Http\Controllers\Backend\SliderController::class, 'update'])->name('slider.update');
        Route::get('slider/delete/{id}', [\App\Http\Controllers\Backend\SliderController::class, 'delete'])->name('slider.delete');

        //shop Inforamtion 
        Route::get('information-view',[\App\Http\Controllers\Backend\ShopInformationController::class,'index'])->name('information.all');
        Route::post('information/update', [\App\Http\Controllers\Backend\ShopInformationController::class, 'update'])->name('information.update');
    });
        //user-order-list
        Route::prefix('order')->group(function(){
        Route::get('all',[\App\Http\Controllers\Backend\OrderController::class, 'orderView'])->name('order.all');
        Route::get('details/{order_id}', [\App\Http\Controllers\Backend\OrderController::class, 'OrdersDetails'])->name('order.details');
        Route::get('/unpaid_status/update/{order_id}', [\App\Http\Controllers\Backend\OrderController::class, 'PaymentunApprove'])->name('order.unpaid_status.update');
        Route::get('/paid_status/update/{order_id}', [\App\Http\Controllers\Backend\OrderController::class, 'PaymentpaidApprove'])->name('order.paid_status.update');
        Route::post('update',  [\App\Http\Controllers\Backend\OrderController::class, 'OrderStatusUpdate'])->name('order.update');


        Route::get('/pending', [\App\Http\Controllers\Backend\OrderController::class, 'PendingOrders'])->name('orders-pending');
        Route::get('/confirmed', [\App\Http\Controllers\Backend\OrderController::class, 'ConfirmedOrders'])->name('orders-confirmed');

        Route::get('/processing', [\App\Http\Controllers\Backend\OrderController::class, 'ProcessingOrders'])->name('orders-processing');

        Route::get('/picked', [\App\Http\Controllers\Backend\OrderController::class, 'PickedOrders'])->name('orders-picked');

        Route::get('/shipped', [\App\Http\Controllers\Backend\OrderController::class, 'ShippedOrders'])->name('orders-shipped');

        Route::get('/delivered', [\App\Http\Controllers\Backend\OrderController::class, 'DeliveredOrders'])->name('orders-delivered');

        Route::get('/cancel', [\App\Http\Controllers\Backend\OrderController::class, 'CancelOrders'])->name('orders-cancel');
    });
    Route::get('/pending/update/{order_id}', [\App\Http\Controllers\Backend\OrderController::class, 'pendingApprove'])->name('pending.order.approve');
    Route::get('/confirmed/order/update/{order_id}', [\App\Http\Controllers\Backend\OrderController::class, 'confirmedApprove'])->name('confirmed.order.approve');
    Route::post('/Processing/order/update', [\App\Http\Controllers\Backend\OrderController::class, 'ProcessingApprove'])->name('Processing.order.approve');
    Route::get('/picked/order/update/{order_id}', [\App\Http\Controllers\Backend\OrderController::class, 'pickedApprove'])->name('picked.order.approve');
    Route::get('/shipped/order/update/{order_id}', [\App\Http\Controllers\Backend\OrderController::class, 'shippedApprove'])->name('shipped.order.approve');
    // Route::get('/delivered/order/update/{order_id}', [\App\Http\Controllers\Backend\OrderController::class, 'deliveredApprove'])->name('delivered.order.approve');
    // Route::get('/cancel/order/update/{order_id}', [\App\Http\Controllers\Backend\OrderController::class, 'cancelApprove'])->name('cancel.order.approve');
    


    //Order print
    Route::get('/order/print/modal/{id}', [\App\Http\Controllers\Backend\OrderController::class, 'OrderprintAjax'])->name('order.print.modal');
    Route::get('/prnpriview/{id}',[\App\Http\Controllers\Backend\OrderController::class, 'prnpriview'])->name('prnpriview');
   
    // Admin Return Order Routes 
    Route::prefix('return')->group(function(){

        Route::get('/admin/request', [ReturnController::class, 'ReturnRequest'])->name('return.request');
        Route::get('/admin/return/approve/{order_id}', [ReturnController::class, 'ReturnRequestApprove'])->name('return.approve');

    Route::get('/admin/all/request', [ReturnController::class, 'ReturnAllRequest'])->name('all.request');

    });

//Social Login
Route::get('auth/google', [\App\Http\Controllers\Frontend\GoogleController::class, 'redirectToGoogle']);
Route::get('auth/google/callback', [\App\Http\Controllers\Frontend\GoogleController::class, 'handleGoogleCallback']);

Route::get('auth/facebook', [\App\Http\Controllers\Frontend\FacebookController::class, 'redirectToFacebook']);
Route::get('auth/facebook/callback', [\App\Http\Controllers\Frontend\FacebookController::class, 'handleFacebookCallback']);


//product-search
Route::get('/product/search', [\App\Http\Controllers\Frontend\IndexController::class, 'ProductSearch'])->name('product.search');

//product-sort
Route::get('/product/sort', [\App\Http\Controllers\Frontend\IndexController::class, 'productSort'])->name('product.sort');

//product-color
Route::get('/product/color/sort', [\App\Http\Controllers\Frontend\IndexController::class, 'productColor'])->name('product.color.sort'); 

//firebase
Route::get('phone_auth', [\App\Http\Controllers\Frontend\FirebaseController::class, 'phone_auth']);

Route::post('/payment/status', [\App\Http\Controllers\User\CheckoutController::class, 'paymentCallback'])->name('status');