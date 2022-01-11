<?php

use Illuminate\Support\Facades\Route;
use App\Http\Livewire\User\Auth\UserLoginComponent;
use App\Http\Livewire\Admin\Logo\AdminLogoComponent;
use App\Http\Livewire\Admin\Mall\AdminMallComponent;
use App\Http\Livewire\Admin\Type\AdminTypeComponent;
use App\Http\Livewire\Admin\Auth\AdminLoginComponent;
use App\Http\Livewire\Admin\Brand\AdminBrandComponent;
use App\Http\Livewire\User\Auth\UserRegisterComponent;
use App\Http\Livewire\Admin\Mall\AdminAddMallComponent;
use App\Http\Livewire\Admin\Type\AdminAddTypeComponent;
use App\Http\Livewire\Vendor\Auth\VendorLoginComponent;
use App\Http\Livewire\Admin\Coupon\AdminCouponComponent;
use App\Http\Livewire\Admin\Mall\AdminEditMallComponent;
use App\Http\Livewire\Admin\Type\AdminEditTypeComponent;
use App\Http\Livewire\Admin\Brand\AdminAddBrandComponent;
use App\Http\Livewire\Admin\Brand\AdminEditBrandComponent;
use App\Http\Livewire\Admin\Gvendor\AdminGvendorComponent;
use App\Http\Livewire\Admin\Payment\AdminPaymentComponent;
use App\Http\Livewire\Admin\Product\AdminProductComponent;
use App\Http\Livewire\Admin\Profile\AdminProfileComponent;
use App\Http\Livewire\Vendor\Auth\VendorRegisterComponent;
use App\Http\Livewire\Admin\Coupon\AdminAddCouponComponent;
use App\Http\Livewire\Admin\Category\AdminCategoryComponent;
use App\Http\Livewire\Admin\Coupon\AdminEditCouponComponent;
use App\Http\Livewire\Admin\Eservice\AdminEserviceComponent;
use App\Http\Livewire\Admin\Gvendor\AdminAddGvendorComponent;
use App\Http\Livewire\Admin\Payment\AdminAddPaymentComponent;
use App\Http\Livewire\Admin\Product\AdminAddProductComponent;
use App\Http\Livewire\Admin\Attribute\AdminAttributeComponent;
use App\Http\Livewire\Admin\Bcategory\AdminBcategoryComponent;
use App\Http\Livewire\Admin\Dashboard\AdminDashboardComponent;
use App\Http\Livewire\Admin\Gvendor\AdminEditGvendorComponent;
use App\Http\Livewire\Admin\Payment\AdminEditPaymentComponent;
use App\Http\Livewire\Admin\Product\AdminEditProductComponent;
use App\Http\Livewire\Admin\Product\AdminViewProductComponent;
use App\Http\Livewire\Admin\Vcategory\AdminVcategoryComponent;
use App\Http\Livewire\Admin\Category\AdminAddCategoryComponent;
use App\Http\Livewire\Admin\Eservice\AdminAddEserviceComponent;
use App\Http\Livewire\Admin\Category\AdminEditCategoryComponent;
use App\Http\Livewire\Admin\Eservice\AdminEditEserviceComponent;
use App\Http\Livewire\Admin\Attribute\AdminAddAttributeComponent;
use App\Http\Livewire\Admin\Bcategory\AdminAddBcategoryComponent;
use App\Http\Livewire\Admin\Vcategory\AdminAddVcategoryComponent;
use App\Http\Livewire\Admin\Attribute\AdminEditAttributeComponent;
use App\Http\Livewire\Admin\Bcategory\AdminEditBcategoryComponent;
use App\Http\Livewire\Admin\Vcategory\AdminEditVcategoryComponent;


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

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

// Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');


Route::prefix('user')->name('user.')->group(function () {
    Route::middleware(['guest:web', 'PreventHistory'])->group(function () {
        Route::get('/login', UserLoginComponent::class)->name('login');
        Route::get('/register', UserRegisterComponent::class)->name('register');
    });
    Route::middleware(['auth:web', 'PreventHistory'])->group(function () {
        Route::view('/dashboard', 'user.dashboard')->name('dashboard');
    });
});
Route::prefix('vendor')->name('vendor.')->group(function () {
    Route::middleware(['guest', 'PreventHistory'])->group(function () {
        Route::get('/login', VendorLoginComponent::class)->name('login');
        Route::get('/register', VendorRegisterComponent::class)->name('register');
    });
    Route::middleware(['auth', 'PreventHistory'])->group(function () {
        Route::view('/dashboard', 'vendor.dashboard')->name('dashboard');
    });
});

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

        //PRofile Routes
        Route::get('/profile', AdminProfileComponent::class)->name('profile');

        //Product Routes
        Route::get('/product', AdminProductComponent::class)->name('product');
        Route::get('/product/show/{slug}', AdminViewProductComponent::class)->name('product.show');
        Route::get('/product/add', AdminAddProductComponent::class)->name('product.add');
        Route::get('/product/edit/{slug}', AdminEditProductComponent::class)->name('product.edit');

        //Coupon Routes
        Route::get('/coupon', AdminCouponComponent::class)->name('coupon');
        Route::get('/coupon/add', AdminAddCouponComponent::class)->name('coupon.add');
        Route::get('/coupon/edit/{coupon_id}', AdminEditCouponComponent::class)->name('coupon.edit');

        //Mall Routes
        Route::get('/mall', AdminMallComponent::class)->name('mall');
        Route::get('/mall/add', AdminAddMallComponent::class)->name('mall.add');
        Route::get('/mall/edit/{mall_slug}', AdminEditMallComponent::class)->name('mall.edit');

        //Eservice Routes
        Route::get('/eservice', AdminEserviceComponent::class)->name('eservice');
        Route::get('/eservice/add', AdminAddEserviceComponent::class)->name('eservice.add');
        Route::get('/eservice/edit/{eservice_slug}', AdminEditEserviceComponent::class)->name('eservice.edit');

        //Gvendor Routes
        Route::get('/gvendor', AdminGvendorComponent::class)->name('gvendor');
        Route::get('/gvendor/add', AdminAddGvendorComponent::class)->name('gvendor.add');
        Route::get('/gvendor/edit/{gvendor_slug}', AdminEditGvendorComponent::class)->name('gvendor.edit');

        //Vcategory Routes
        Route::get('/vcategory', AdminVcategoryComponent::class)->name('vcategory');
        Route::get('/vcategory/add', AdminAddVcategoryComponent::class)->name('vcategory.add');
        Route::get('/vcategory/edit/{vcategory_slug}', AdminEditVcategoryComponent::class)->name('vcategory.edit');

        //Frontend Setting routes
        Route::get('/logo', AdminLogoComponent::class)->name('logo');
        Route::get('/payment', AdminPaymentComponent::class)->name('payment');
        Route::get('/payment/add', AdminAddPaymentComponent::class)->name('payment.add');
        Route::get('/payment/edit/{payment_id}', AdminEditPaymentComponent::class)->name('payment.edit');


        //Blog Routes
        Route::get('/bcategory', AdminBcategoryComponent::class)->name('bcategory');
        Route::get('/bcategory/add', AdminAddBcategoryComponent::class)->name('bcategory.add');
        Route::get('/bcategory/edit/{bcategory_slug}', AdminEditBcategoryComponent::class)->name('bcategory.edit');
    });
});
