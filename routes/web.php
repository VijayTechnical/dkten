<?php

use App\Http\Livewire\FaqComponent;
use App\Http\Livewire\HomeComponent;
use App\Http\Livewire\AboutComponent;
use App\Http\Livewire\EsewaComponent;
use Illuminate\Support\Facades\Route;
use App\Http\Livewire\CareerComponent;
use App\Http\Livewire\RefferComponent;
use App\Http\Livewire\ContactComponent;
use App\Http\Livewire\CheckoutComponent;
use App\Http\Livewire\ShippingComponent;
use App\Http\Livewire\ThankyouComponent;
use App\Http\Controllers\SearchController;
use App\Http\Livewire\TravelTourComponent;
use App\Http\Livewire\EmployeeAidComponent;
use App\Http\Livewire\ProductTypeComponent;
use App\Http\Livewire\EasyEserviceComponent;
use App\Http\Livewire\ReturnPolicyComponent;
use App\Http\Livewire\VendorDetailComponent;
use App\Http\Livewire\MissionVisionComponent;
use App\Http\Livewire\PrivacyPolicyComponent;
use App\Http\Livewire\ProductDetailComponent;
use App\Http\Livewire\TermConditionComponent;
use App\Http\Livewire\VendorCategoryComponent;
use App\Http\Controllers\LocalizationController;
use App\Http\Livewire\LegalInformationComponent;
use App\Http\Livewire\Admin\Faq\AdminFaqComponent;
use App\Http\Livewire\User\Auth\UserLoginComponent;
use App\Http\Livewire\Admin\Blog\AdminBlogComponent;
use App\Http\Livewire\Admin\Logo\AdminLogoComponent;
use App\Http\Livewire\Admin\Role\AdminRoleComponent;
use App\Http\Livewire\Admin\Sale\AdminSaleComponent;
use App\Http\Livewire\Admin\Type\AdminTypeComponent;
use App\Http\Livewire\User\Order\UserOrderComponent;
use App\Http\Livewire\VendorCategoryDetailComponent;
use App\Http\Livewire\Admin\Auth\AdminLoginComponent;
use App\Http\Livewire\Admin\Faq\AdminAddFaqComponent;
use App\Http\Livewire\Admin\Brand\AdminBrandComponent;
use App\Http\Livewire\Admin\Faq\AdminEditFaqComponent;
use App\Http\Livewire\Admin\Staff\AdminStaffComponent;
use App\Http\Livewire\Admin\Stock\AdminStockComponent;
use App\Http\Livewire\Admin\Vtype\AdminVtypeComponent;
use App\Http\Livewire\User\Auth\UserRegisterComponent;
use App\Http\Livewire\User\Coupon\UserCouponComponent;
use App\Http\Livewire\User\Review\UserReviewComponent;
use App\Http\Livewire\Vendor\Sale\VendorSaleComponent;
use App\Http\Livewire\Admin\Blog\AdminAddBlogComponent;
use App\Http\Livewire\Admin\Role\AdminAddRoleComponent;
use App\Http\Livewire\Admin\Type\AdminAddTypeComponent;
use App\Http\Livewire\Vendor\Auth\VendorLoginComponent;
use App\Http\Controllers\User\UserSocialLoginController;
use App\Http\Livewire\Admin\Blog\AdminEditBlogComponent;
use App\Http\Livewire\Admin\Coupon\AdminCouponComponent;
use App\Http\Livewire\Admin\Report\AdminReportComponent;
use App\Http\Livewire\Admin\Role\AdminEditRoleComponent;
use App\Http\Livewire\Admin\Sale\AdminViewSaleComponent;
use App\Http\Livewire\Admin\Slider\AdminSliderComponent;
use App\Http\Livewire\Admin\Ticket\AdminTicketComponent;
use App\Http\Livewire\Admin\Type\AdminEditTypeComponent;
use App\Http\Livewire\Admin\Vendor\AdminVendorComponent;
use App\Http\Livewire\User\Auth\ForgetPasswordComponent;
use App\Http\Livewire\User\Profile\UserProfileComponent;
use App\Http\Livewire\Vendor\Stock\VendorStockComponent;
use App\Http\Livewire\Admin\Brand\AdminAddBrandComponent;
use App\Http\Livewire\Admin\Staff\AdminAddStaffComponent;
use App\Http\Livewire\Admin\Stock\AdminAddStockComponent;
use App\Http\Livewire\Admin\Vtype\AdminAddVtypeComponent;
use App\Http\Livewire\Admin\Brand\AdminEditBrandComponent;
use App\Http\Livewire\Admin\Contact\AdminContactComponent;
use App\Http\Livewire\Admin\Payment\AdminPaymentComponent;
use App\Http\Livewire\Admin\Product\AdminProductComponent;
use App\Http\Livewire\Admin\Profile\AdminProfileComponent;
use App\Http\Livewire\Admin\Staff\AdminEditStaffComponent;
use App\Http\Livewire\Admin\Vtype\AdminEditVtypeComponent;
use App\Http\Livewire\User\Order\UserOrderDetailComponent;
use App\Http\Livewire\User\Wallet\UserLoadWalletComponent;
use App\Http\Livewire\User\Wishlist\UserWishlistComponent;
use App\Http\Livewire\Vendor\Auth\VendorRegisterComponent;
use App\Http\Livewire\Vendor\Report\VendorReportComponent;
use App\Http\Livewire\Vendor\Sale\VendorSaleViewComponent;
use App\Http\Livewire\Vendor\Slider\VendorSliderComponent;
use App\Http\Livewire\Vendor\Ticket\VendorTicketComponent;
use App\Http\Livewire\Admin\Coupon\AdminAddCouponComponent;
use App\Http\Livewire\Admin\Slider\AdminAddSliderComponent;
use App\Http\Livewire\Admin\Vendor\AdminPayVendorComponent;
use App\Http\Livewire\User\Wallet\UserWalletEsewaComponent;
use App\Http\Livewire\Vendor\Stock\VendorAddStockComponent;
use App\Http\Livewire\Admin\Category\AdminCategoryComponent;
use App\Http\Livewire\Admin\Coupon\AdminEditCouponComponent;
use App\Http\Livewire\Admin\Customer\AdminCustomerComponent;
use App\Http\Livewire\Admin\Language\AdminLanguageComponent;
use App\Http\Livewire\Admin\Legality\AdminLegalityComponent;
use App\Http\Livewire\Admin\Slider\AdminEditSliderComponent;
use App\Http\Livewire\Admin\Ticket\AdminViewTicketComponent;
use App\Http\Livewire\User\Dashboard\UserDashboardComponent;
use App\Http\Livewire\Vendor\Product\VendorProductComponent;
use App\Http\Livewire\Vendor\Profile\VendorProfileComponent;
use App\Http\Livewire\Vendor\Setting\VendorSettingComponent;
use App\Http\Livewire\Admin\Payment\AdminAddPaymentComponent;
use App\Http\Livewire\Admin\Product\AdminAddProductComponent;
use App\Http\Livewire\Admin\Stock\AdminDestroyStockComponent;
use App\Http\Livewire\User\Auth\ForgetPasswordEmailComponent;
use App\Http\Livewire\Vendor\Auth\VendorVerifyEmailComponent;
use App\Http\Livewire\Vendor\Slider\VendorAddSliderComponent;
use App\Http\Livewire\Admin\Attribute\AdminAttributeComponent;
use App\Http\Livewire\Admin\Bcategory\AdminBcategoryComponent;
use App\Http\Livewire\Admin\Dashboard\AdminDashboardComponent;
use App\Http\Livewire\Admin\Payment\AdminEditPaymentComponent;
use App\Http\Livewire\Admin\Product\AdminEditProductComponent;
use App\Http\Livewire\Admin\Product\AdminViewProductComponent;
use App\Http\Livewire\Admin\Vcategory\AdminVcategoryComponent;
use App\Http\Livewire\Admin\Vendor\AdminSlidesVendorComponent;
use App\Http\Livewire\Vendor\Slider\VendorEditSliderComponent;
use App\Http\Livewire\Vendor\Ticket\VendorViewTicketComponent;
use App\Http\Livewire\Admin\Category\AdminAddCategoryComponent;
use App\Http\Livewire\Admin\Esewa\AdminVendorPayEsewaComponent;
use App\Http\Livewire\Vendor\Auth\VendorResetPasswordComponent;
use App\Http\Livewire\Vendor\Product\VendorAddProductComponent;
use App\Http\Livewire\Vendor\Stock\VendorDestroyStockComponent;
use App\Http\Livewire\Admin\Category\AdminEditCategoryComponent;
use App\Http\Livewire\Admin\Language\AdminEditLanguageComponent;
use App\Http\Livewire\Admin\Permission\AdminPermissionComponent;
use App\Http\Livewire\Admin\Setting\AdminSocialSettingComponent;
use App\Http\Livewire\Vendor\Dashboard\VendorDashboardComponent;
use App\Http\Livewire\Vendor\Product\VendorEditProductComponent;
use App\Http\Livewire\Admin\Attribute\AdminAddAttributeComponent;
use App\Http\Livewire\Admin\Bcategory\AdminAddBcategoryComponent;
use App\Http\Livewire\Admin\Setting\AdminGeneralSettingComponent;
use App\Http\Livewire\Admin\Vcategory\AdminAddVcategoryComponent;
use App\Http\Livewire\Admin\Vendor\AdminCommisionVendorComponent;
use App\Http\Livewire\User\Wallet\UserProceedWalletLoadComponent;
use App\Http\Livewire\Admin\Attribute\AdminEditAttributeComponent;
use App\Http\Livewire\Admin\Bcategory\AdminEditBcategoryComponent;
use App\Http\Livewire\Admin\Vcategory\AdminEditVcategoryComponent;
use App\Http\Livewire\Admin\Permission\AdminAddPermissionComponent;
use App\Http\Livewire\Vendor\Payment\VendorUpdateMerchantComponent;
use App\Http\Livewire\Admin\Permission\AdminEditPermissionComponent;
use App\Http\Livewire\Vendor\Payment\VendorPaymentFromAdminComponent;
use App\Http\Livewire\User\SupportTicket\UserAdminSupportTicketComponent;
use App\Http\Livewire\User\SupportTicket\UserVendorSupportTicketComponent;
use App\Http\Livewire\User\SupportTicket\UserAdminViewSupportTicketComponent;
use App\Http\Livewire\User\SupportTicket\UserVendorViewSupportTicketComponent;

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

Route::get('/', HomeComponent::class)->name('home');
Route::get('/product/detail/{product_slug}', ProductDetailComponent::class)->name('product.detail');
Route::get('/vendor/detail/{vendor_display_name}', VendorDetailComponent::class)->name('vendor.detail');
//Eservice Routes
Route::get('vendor/categories/{vcategory_slug}', VendorCategoryComponent::class)->name('vendor.category');
Route::get('vendor/categories/{vcategory_slug}/{vtype_slug}', VendorCategoryDetailComponent::class)->name('vendor.category.detail');

//Reffer and earn Route
Route::get('/reffer', RefferComponent::class)->name('reffer');
//Contact Route
Route::get('/contact', ContactComponent::class)->name('contact');

//Header Search route
Route::get('/header-search', [SearchController::class, 'headerSearch']);

//Checkout Route
Route::get('/checkout', CheckoutComponent::class)->name('checkout');

//Thankyou Route
Route::get('/thankyou', ThankyouComponent::class)->name('thankyou');

//Esewa Route
Route::get('/checkout/esewa-verify', EsewaComponent::class . '@verify')->name('esewa.verify');

//Search Route
Route::get('/autocomplete-search', [SearchController::class, 'getProduct']);

//Product Category Routes
Route::get('/product/{category_id}/{sub_category_id?}/{type_id?}/{sub_type_id?}', ProductTypeComponent::class)->name('product.type');


//Legality Routes
Route::get('/about-us', AboutComponent::class)->name('about');
Route::get('/privacy-policy', PrivacyPolicyComponent::class)->name('privacy');
Route::get('/terms-condition', TermConditionComponent::class)->name('term');
Route::get('legal-information', LegalInformationComponent::class)->name('legal');
Route::get('/mission-vision', MissionVisionComponent::class)->name('mission');
Route::get('/careers', CareerComponent::class)->name('career');
Route::get('return-policy', ReturnPolicyComponent::class)->name('return');
Route::get('travel-tours', TravelTourComponent::class)->name('travel');
Route::get('employee-aid', EmployeeAidComponent::class)->name('employee_aid');
Route::get('easy-eservice', EasyEserviceComponent::class)->name('easy_eservice');
Route::get('shipping', ShippingComponent::class)->name('shipping');
Route::get('faq', FaqComponent::class)->name('faq');


Route::prefix('user')->name('user.')->group(function () {
    Route::middleware(['guest:web', 'PreventHistory'])->group(function () {
        Route::get('/login', UserLoginComponent::class)->name('login');
        Route::get('/register', UserRegisterComponent::class)->name('register');
        //social Login
        Route::get('/login/{provider}', [UserSocialLoginController::class, 'redirectToProvider'])->name('socialLogin.redirect');
        Route::get('/login/{provider}/callback', [UserSocialLoginController::class, 'handleProviderCallback'])->name('socialLogin.callback');

        //Forget password
        Route::get('verify-email', ForgetPasswordEmailComponent::class)->name('verify.email');
        Route::get('reset-password/{token}', ForgetPasswordComponent::class)->name('forget.password');
    });
    Route::middleware(['auth:web', 'PreventHistory'])->group(function () {
        Route::get('/dashboard', UserDashboardComponent::class)->name('dashboard');

        Route::get('/profile/edit', UserProfileComponent::class)->name('profile.edit');

        //Support Routes
        Route::get('/support_admin', UserAdminSupportTicketComponent::class)->name('support.admin');
        Route::get('/support_admin/{ticket_id}', UserAdminViewSupportTicketComponent::class)->name('support.admin.view');
        Route::get('/support_vendor', UserVendorSupportTicketComponent::class)->name('support.vendor');
        Route::get('/support_vendor/{ticket_id}/{vendor_id}', UserVendorViewSupportTicketComponent::class)->name('support.vendor.view');

        //Coupon Routes
        Route::get('/coupon', UserCouponComponent::class)->name('coupon');

        //Wishlist routes
        Route::get('/wishlist', UserWishlistComponent::class)->name('wishlist');

        //Order route
        Route::get('/orders', UserOrderComponent::class)->name('order');
        Route::get('/orders/{order_id}', UserOrderDetailComponent::class)->name('order.detail');

        //Review Route
        Route::get('/review/{order_item_id}', UserReviewComponent::class)->name('review');

        //Wallet route
        Route::get('/load-wallet', UserLoadWalletComponent::class)->name('load.wallet');
        Route::get('/proceed-wallet-load', UserProceedWalletLoadComponent::class)->name('load.wallet.proceed');
        //Esewa Route
        Route::get('/load-wallet/esewa-verify', UserWalletEsewaComponent::class . '@verify');
    });
});

//Vendor Routes
Route::prefix('vendor')->name('vendor.')->group(function () {
    Route::middleware(['guest:vendor', 'PreventHistory'])->group(function () {
        Route::get('/login', VendorLoginComponent::class)->name('login');
        Route::get('/register', VendorRegisterComponent::class)->name('register');

        //Forget password
        Route::get('verify-email', VendorVerifyEmailComponent::class)->name('verify.email');
        Route::get('reset-password/{token}', VendorResetPasswordComponent::class);
    });
    Route::middleware(['auth:vendor', 'PreventHistory'])->group(function () {
        Route::get('/dashboard', VendorDashboardComponent::class)->name('dashboard');

        //Slider Setting Route
        Route::get('/slider', VendorSliderComponent::class)->name('slider');
        Route::get('/slider/add', VendorAddSliderComponent::class)->name('slider.add');
        Route::get('/slider/edit/{slider_id}', VendorEditSliderComponent::class)->name('slider.edit');

        //Profile Routes
        Route::get('/profile', VendorProfileComponent::class)->name('profile');

        //Setting Route
        Route::get('/setting', VendorSettingComponent::class)->name('setting');

        //Product Routes
        Route::get('/product', VendorProductComponent::class)->name('product');
        Route::get('/product/add', VendorAddProductComponent::class)->name('product.add');
        Route::get('/product/edit/{slug}', VendorEditProductComponent::class)->name('product.edit');

        //Product Stock Routes
        Route::get('/stock', VendorStockComponent::class)->name('stock');
        Route::get('/stock/add', VendorAddStockComponent::class)->name('stock.add');
        Route::get('/stock/destroy', VendorDestroyStockComponent::class)->name('stock.destroy');

        //Product Stock Report 
        Route::get('/report', VendorReportComponent::class)->name('report');

        //Ticket Routes
        Route::get('/ticket', VendorTicketComponent::class)->name('ticket');
        Route::get('/ticket/view/{ticket_id}/{user_id}', VendorViewTicketComponent::class)->name('ticket.view');

        //Sales Route
        Route::get('/sales', VendorSaleComponent::class)->name('sale');
        Route::get('/sales/show/{sale_id}', VendorSaleViewComponent::class)->name('sale.show');

        //Admin Payment Routes 
        Route::get('update-esewa-merchant', VendorUpdateMerchantComponent::class)->name('merchant.update');
        Route::get('payment-from-admin', VendorPaymentFromAdminComponent::class)->name('payment.admin');
    });
});

//Admin Routes

Route::prefix('admin')->name('admin.')->group(function () {
    Route::middleware(['guest:admin', 'PreventHistory'])->group(function () {
        Route::get('/login', AdminLoginComponent::class)->name('login');
    });
    Route::middleware(['auth:admin', 'PreventHistory'])->group(function () {
        Route::get('/dashboard', AdminDashboardComponent::class)->name('dashboard');

        //Category Routes
        Route::get('/category', AdminCategoryComponent::class)->name('category');
        Route::get('/category/add', AdminAddCategoryComponent::class)->name('category.add');
        Route::get('/category/edit/{category_slug}/{sub_category_slug?}', AdminEditCategoryComponent::class)->name('category.edit');

        //Brand Routes
        Route::get('/brand', AdminBrandComponent::class)->name('brand');
        Route::get('/brand/add', AdminAddBrandComponent::class)->name('brand.add');
        Route::get('/brand/edit/{slug}', AdminEditBrandComponent::class)->name('brand.edit');

        //Type Routes
        Route::get('/type', AdminTypeComponent::class)->name('type');
        Route::get('/type/add', AdminAddTypeComponent::class)->name('type.add');
        Route::get('/type/edit/{type_slug}/{sub_type_slug?}', AdminEditTypeComponent::class)->name('type.edit');

        //Attribute Routes
        Route::get('/attribute', AdminAttributeComponent::class)->name('attribute');
        Route::get('/attribute/add', AdminAddAttributeComponent::class)->name('attribute.add');
        Route::get('/attribute/edit/{attribute_name}', AdminEditAttributeComponent::class)->name('attribute.edit');

        //Profile Routes
        Route::get('/profile', AdminProfileComponent::class)->name('profile');

        //Product Routes
        Route::get('/product', AdminProductComponent::class)->name('product');
        Route::get('/product/show/{slug}', AdminViewProductComponent::class)->name('product.show');
        Route::get('/product/add', AdminAddProductComponent::class)->name('product.add');
        Route::get('/product/edit/{slug}', AdminEditProductComponent::class)->name('product.edit');

        //Product Stock Routes
        Route::get('/stock', AdminStockComponent::class)->name('stock');
        Route::get('/stock/add', AdminAddStockComponent::class)->name('stock.add');
        Route::get('/stock/destroy', AdminDestroyStockComponent::class)->name('stock.destroy');

        //Product Stock Report  Routes
        Route::get('/report', AdminReportComponent::class)->name('report');

        //Customer routes
        Route::get('/customers', AdminCustomerComponent::class)->name('customer');

        //Contact Routes
        Route::get('/contact', AdminContactComponent::class)->name('contact');

        //Ticket Routes
        Route::get('/ticket', AdminTicketComponent::class)->name('ticket');
        Route::get('/ticket/view/{user_id}/{ticket_id}', AdminViewTicketComponent::class)->name('ticket.view');

        //Coupon Routes
        Route::get('/coupon', AdminCouponComponent::class)->name('coupon');
        Route::get('/coupon/add', AdminAddCouponComponent::class)->name('coupon.add');
        Route::get('/coupon/edit/{coupon_id}', AdminEditCouponComponent::class)->name('coupon.edit');

        //Admin Vendor Route
        Route::get('/vendor', AdminVendorComponent::class)->name('vendor');
        Route::get('/vendor/commision', AdminCommisionVendorComponent::class)->name('vendor.commision');
        Route::get('/vendor/slider', AdminSlidesVendorComponent::class)->name('vendor.slider');
        Route::get('/vendor/payment', AdminPayVendorComponent::class)->name('vendor.pay_vendor');

        //Esewa Route for vendor payment
        Route::get('/vendor-payment/esewa-verify', AdminVendorPayEsewaComponent::class . '@verify')->name('esewa.verify');

        //Vendor Types Routes
        Route::get('/vtype', AdminVtypeComponent::class)->name('vtype');
        Route::get('/vtype/add', AdminAddVtypeComponent::class)->name('vtype.add');
        Route::get('/vtype/edit/{vtype_slug}', AdminEditVtypeComponent::class)->name('vtype.edit');

        //Vcategory Routes
        Route::get('/vcategory', AdminVcategoryComponent::class)->name('vcategory');
        Route::get('/vcategory/add', AdminAddVcategoryComponent::class)->name('vcategory.add');
        Route::get('/vcategory/edit/{vcategory_slug}', AdminEditVcategoryComponent::class)->name('vcategory.edit');

        //Frontend Setting routes
        Route::get('/logo', AdminLogoComponent::class)->name('logo');
        Route::get('/payment', AdminPaymentComponent::class)->name('payment');
        Route::get('/payment/add', AdminAddPaymentComponent::class)->name('payment.add');
        Route::get('/payment/edit/{payment_id}', AdminEditPaymentComponent::class)->name('payment.edit');
        Route::get('legelity', AdminLegalityComponent::class)->name('legality');
        Route::get('/faq', AdminFaqComponent::class)->name('faq');
        Route::get('/faq/add', AdminAddFaqComponent::class)->name('faq.add');
        Route::get('/faq/edit/{faq_id}', AdminEditFaqComponent::class)->name('faq.edit');

        //Setting Route
        Route::get('/setting/general', AdminGeneralSettingComponent::class)->name('gsetting');
        Route::get('/setting/social', AdminSocialSettingComponent::class)->name('ssetting');

        //sales Route
        Route::get('/sales', AdminSaleComponent::class)->name('sale');
        Route::get('/sales/show/{sale_id}', AdminViewSaleComponent::class)->name('sale.show');


        //Blog Routes
        Route::get('/bcategory', AdminBcategoryComponent::class)->name('bcategory');
        Route::get('/bcategory/add', AdminAddBcategoryComponent::class)->name('bcategory.add');
        Route::get('/bcategory/edit/{bcategory_slug}', AdminEditBcategoryComponent::class)->name('bcategory.edit');
        Route::get('/blog', AdminBlogComponent::class)->name('blog');
        Route::get('/blog/add', AdminAddBlogComponent::class)->name('blog.add');
        Route::get('/blog/edit/{blog_slug}', AdminEditBlogComponent::class)->name('blog.edit');

        //Permission Routes
        Route::get('/permission', AdminPermissionComponent::class)->name('permission');
        Route::get('/permission/add', AdminAddPermissionComponent::class)->name('permission.add');
        Route::get('/permission/edit/{permission_id}', AdminEditPermissionComponent::class)->name('permission.edit');
        //Role Routes
        Route::get('/role', AdminRoleComponent::class)->name('role');
        Route::get('/role/add', AdminAddRoleComponent::class)->name('role.add');
        Route::get('/role/edit/{role_id}', AdminEditRoleComponent::class)->name('role.edit');
        //Staff Routes
        Route::get('/staff', AdminStaffComponent::class)->name('staff');
        Route::get('/staff/add', AdminAddStaffComponent::class)->name('staff.add');
        Route::get('/staff/edit/{staff_id}', AdminEditStaffComponent::class)->name('staff.edit');

        //Slider Route
        Route::get('/slider', AdminSliderComponent::class)->name('slider');
        Route::get('/slider/add', AdminAddSliderComponent::class)->name('slider.add');
        Route::get('/slider/edit/{slider_id}', AdminEditSliderComponent::class)->name('slider.edit');

        //Language Route
        Route::get('/language',AdminLanguageComponent::class)->name('language');
        Route::get('/language/edit/{field}/{id}',AdminEditLanguageComponent::class)->name('language.edit');
    });
});
