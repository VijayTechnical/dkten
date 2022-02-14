<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\User\Cart\CartController;
use App\Http\Controllers\Api\Frontend\FrontendController;
use App\Http\Controllers\Api\User\Auth\UserAuthController;
use App\Http\Controllers\Api\User\Order\UserOrderController;
use App\Http\Controllers\Api\User\Checkout\CheckoutController;
use App\Http\Controllers\Api\User\Reffer\UserRefferController;
use App\Http\Controllers\Api\User\Wallet\UserWalletController;
use App\Http\Controllers\Api\Vendor\Auth\VendorAuthController;
use App\Http\Controllers\Api\Vendor\Stock\VendorStockController;
use App\Http\Controllers\Api\User\Support\AdminSupportController;
use App\Http\Controllers\Api\User\Support\VendorSupportController;
use App\Http\Controllers\Api\Vendor\AdminPayment\AdminPaymentController;
use App\Http\Controllers\Api\Vendor\Slider\VendorSliderController;
use App\Http\Controllers\Api\Vendor\Ticket\VendorTicketController;
use App\Http\Controllers\Api\Vendor\Product\VendorProductController;

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

// Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
//     return $request->user();
// });

//setting listing routes
Route::get('/general-setting', [FrontendController::class, 'getGeneralSetting']);
Route::get('/social-setting', [FrontendController::class, 'getSocialSetting']);
Route::get('/logos', [FrontendController::class, 'getLogos']);

//Product listing routes
Route::get('hot-deal-products', [FrontendController::class, 'getHotDealProduct']);
Route::get('featured-products', [FrontendController::class, 'getFeaturedProduct']);
Route::get('latest-products', [FrontendController::class, 'getLatestProduct']);
Route::get('popular-products', [FrontendController::class, 'getPopularProduct']);
Route::get('mens-collection-products', [FrontendController::class, 'getMensCollectionProduct']);
Route::get('womens-collection-products', [FrontendController::class, 'getWomensCollectionProduct']);
Route::get('bags-and-laugages-products', [FrontendController::class, 'getBagsAndLaugagesProduct']);
Route::get('recently-viewed-products', [FrontendController::class, 'getRecentlyViewedProduct']);
//Product search by category,subcategory,type,subtype,brand,sorting,searchterm,vendor
Route::post('search/products/{category_id}', [FrontendController::class, 'getProduct']);
//Product Detail
Route::get('products/{product_slug}', [FrontendController::class, 'getProductDetail']);

//get product review
Route::get('products/reviews/{product_slug}',[FrontendController::class,'getProductReview']);

//stock status
Route::get('/products/stock-status/{product_slug}',[FrontendController::class,'getProductStatus']);

//Vendor listing routes
Route::get('vendor-categories', [FrontendController::class, 'getVendorCategory']);
Route::get('vendor-categories/{category_id}', [FrontendController::class, 'getVendorType']);
Route::get('vendor-categories/{category_id}/{type_id}', [FrontendController::class, 'getVendorWithType']);


//For Particular vendor with no type included routes
Route::get('vendors', [FrontendController::class, 'getVendor']);
Route::get('vendors/{display_name}', [FrontendController::class, 'getVendorDetail']);

//Category listing route
Route::get('categories', [FrontendController::class, 'getCategory']);
Route::get('women-categories', [FrontendController::class, 'getWomenCategory']);

//Legality Routes
Route::get('legalities', [FrontendController::class, 'getLegality']);

//Contact Route
Route::post('contact', [FrontendController::class, 'saveContact']);

//Faq route
Route::get('faqs',[FrontendController::class,'getFaq']);

//Payment methods route
Route::get('payment-methods',[FrontendController::class,'getPaymentMethod']);

Route::get('sliders',[FrontendController::class,'getSlider']);

//Shipping routes
Route::get('shipping/regions',[FrontendController::class,'getRegion']);
Route::get('shipping/cities/{region_id}',[FrontendController::class,'getCity']);
Route::get('shipping/areas/{region_id}/{city_id}',[FrontendController::class,'getArea']);




Route::prefix('user')->group(function () {
    Route::middleware(['guest:web'])->group(function () {
        Route::post('/login', [UserAuthController::class, 'Login']);
        Route::post('/register', [UserAuthController::class, 'Register']);

        //Forget Password
        Route::post('/forget-password/confirm-email', [UserAuthController::class, 'getEmailForForgetPassword']);
        Route::post('/forget-password/set-password', [UserAuthController::class, 'getTokenForForgetPassword']);
    });
    Route::middleware(['auth:sanctum', 'type.customer'])->group(function () {

        //Logout route
        Route::post('logout',[UserAuthController::class,'Logout']);

        //Profile related routes
        Route::get('/profile', [UserAuthController::class, 'getProfile']);
        Route::post('/profile/update', [UserAuthController::class, 'updateProfile']);
        Route::post('/password/update', [UserAuthController::class, 'updatePassword']);
        Route::post('/image/update',[UserAuthController::class,'uploadProfileImage']);

        //Cart and Wishlist related routes
        Route::post('/store-to-cart', [CartController::class, 'storeCart']);
        Route::post('/store-to-wishlist', [CartController::class, 'storeWishlist']);
        Route::post('/store-to-compare', [CartController::class, 'storeCompare']);
        Route::get('cart',[CartController::class,'getCartlist']);
        Route::get('wishlist',[CartController::class,'getWishlist']);
        Route::get('compare',[CartController::class,'getComparelist']);
        Route::post('cart/increase-quantity',[CartController::class,'increaseCartlist']);
        Route::post('cart/decrease-quantity',[CartController::class,'decreaseCartlist']);
        Route::post('cart/remove',[CartController::class,'removeCartItem']);
        Route::post('wishlist/remove',[CartController::class,'removeWishlistItem']);
        Route::post('compare/remove',[CartController::class,'removeCompareItem']);

        //Admin tickets related routes
        Route::get('admin-tickets',[AdminSupportController::class,'getAdminTicket']);
        Route::post('admin-tickets/store',[AdminSupportController::class,'storeAdminTicket']);
        Route::get('admin-tickets/{ticket_id}',[AdminSupportController::class,'getAdminTicketDetail']);
        Route::post('admin-tickets/{ticket_id}',[AdminSupportController::class,'replyAdminTicket']);

        //vendor ticket related routes
        Route::get('vendor-tickets',[VendorSupportController::class,'getVendorTicket']);
        Route::post('vendor-tickets/store',[VendorSupportController::class,'storeVendorTicket']);
        Route::get('vendor-tickets/{ticket_id}/{vendor_id}',[VendorSupportController::class,'getVendorTicketDetail']);
        Route::post('vendor-tickets/{ticket_id}/{vendor_id}',[VendorSupportController::class,'replyVendorTicket']);

        //Order related routes
        Route::get('orders',[UserOrderController::class,'getOrder']);
        Route::get('orders/{sale_code}',[UserOrderController::class,'getOrderDetail']);
        Route::post('orders/cancel-order',[UserOrderController::class,'cancelOrder']);
        Route::get('orders/payment/{sale_code}',[UserOrderController::class,'getPayment']);

        //review related route
        Route::post('orders/review',[UserOrderController::class,'saveReview']);

        //reffer and earn 
        Route::post('reffer',[UserRefferController::class,'sendReffer']);

        //Load related routes
        Route::post('load-wallet/verify-email',[UserWalletController::class,'verifyEmail']);
        Route::post('load-wallet/verify-otp',[UserWalletController::class,'verifyOtp']);

        //Coupon route
        Route::post('apply-coupon',[CheckoutController::class,'applyCouponCode']);

        //Checkout session amount
        Route::post('checkout-amount',[CheckoutController::class,'getCheckoutAmount']);
        Route::post('proceed-to-checkout',[CheckoutController::class,'proceedToCheckout']);

        Route::get('proceed-to-checkout/esewa-verify',[CheckoutController::class,'verifyEsewaRequest']);
    });
});



Route::prefix('vendor')->group(function () {
    Route::middleware(['guest:vendor'])->group(function () {
        Route::post('/login', [VendorAuthController::class, 'Login']);
        Route::post('/register', [VendorAuthController::class, 'Register']);

        //Forget Password
        Route::post('/forget-password/confirm-email', [VendorAuthController::class, 'getEmailForForgetPassword']);
        Route::post('/forget-password/set-password', [VendorAuthController::class, 'getTokenForForgetPassword']);
    });
    Route::middleware(['auth:sanctum', 'type.vendor'])->group(function () {

        //Logout route
        Route::post('logout',[VendorAuthController::class,'Logout']);

        //Profile related routes
        Route::get('profile',[VendorAuthController::class,'Profile']);
        Route::post('profile-update',[VendorAuthController::class,'updateProfile']);
        Route::post('password-update',[VendorAuthController::class,'updatePassword']);
        Route::post('seo-setting-update',[VendorAuthController::class,'updateSeoSetting']);
        Route::post('social-setting-update',[VendorAuthController::class,'updateSocialSetting']);
        Route::post('image-setting-update',[VendorAuthController::class,'updateImageSetting']);
        Route::post('merchant-update',[VendorAuthController::class,'updateMerchant']);

        //Slider related routes
        Route::get('sliders',[VendorSliderController::class,'getSlider']);
        Route::post('/sliders/store',[VendorSliderController::class,'storeSlider']);
        Route::post('/sliders/update/{slider_id}',[VendorSliderController::class,'updateSlider']);
        Route::post('sliders/update-status',[VendorSliderController::class,'updateSliderStatus']);
        Route::post('sliders/delete',[VendorSliderController::class,'deleteSlider']);

        //Ticket related routes
        Route::get('tickets',[VendorTicketController::class,'getTicket']);
        Route::get('tickets/{ticket_id}/{user_id}',[VendorTicketController::class,'getTicketDetail']);
        Route::post('tickets/{ticket_id}/{user_id}',[VendorTicketController::class,'replyToTicket']);
        Route::post('tickets/delete',[VendorTicketController::class,'deleteTicket']);

        //Product related routes
        Route::get('products',[VendorProductController::class,'getProduct']);
        Route::post('products/add',[VendorProductController::class,'storeProduct']);
        Route::post('products/edit/{product_id}',[VendorProductController::class,'editProduct']);
        Route::post('products/update-featured',[VendorProductController::class,'editProductFeatured']);
        Route::post('products/update-status',[VendorProductController::class,'editProductStatus']);
        Route::post('products/delete',[VendorProductController::class,'deleteProduct']);

        //Product stock related routes
        Route::get('product-stocks',[VendorStockController::class,'getStock']);
        Route::post('product-stocks/create',[VendorStockController::class,'createStock']);
        Route::post('product-stocks/destroy',[VendorStockController::class,'destroyStock']);
        Route::post('product-stocks/delete',[VendorStockController::class,'deleteStock']);

        //Payment from Admin
        Route::get('admin-payments',[AdminPaymentController::class,'getPayment']);
        Route::post('admin-payments/delete',[AdminPaymentController::class,'deletePayment']);
    });
});
