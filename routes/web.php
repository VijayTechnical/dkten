<?php

use Illuminate\Support\Facades\Route;
use App\Http\Livewire\User\Auth\UserLoginComponent;
use App\Http\Livewire\Admin\Auth\AdminLoginComponent;
use App\Http\Livewire\User\Auth\UserRegisterComponent;
use App\Http\Livewire\Vendor\Auth\VendorLoginComponent;
use App\Http\Livewire\Vendor\Auth\VendorRegisterComponent;
use App\Http\Livewire\Admin\Dashboard\AdminDashboardComponent;


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
    Route::middleware(['guest:web','PreventHistory'])->group(function () {
        Route::get('/login', UserLoginComponent::class)->name('login');
        Route::get('/register', UserRegisterComponent::class)->name('register');
    });
    Route::middleware(['auth:web','PreventHistory'])->group(function () {
        Route::view('/dashboard', 'user.dashboard')->name('dashboard');
    });
});
Route::prefix('vendor')->name('vendor.')->group(function () {
    Route::middleware(['guest','PreventHistory'])->group(function () {
        Route::get('/login', VendorLoginComponent::class)->name('login');
        Route::get('/register', VendorRegisterComponent::class)->name('register');
    });
    Route::middleware(['auth','PreventHistory'])->group(function () {
        Route::view('/dashboard', 'vendor.dashboard')->name('dashboard');
    });
});

Route::prefix('admin')->name('admin.')->group(function () {
    Route::middleware(['guest:admin','PreventHistory'])->group(function () {
        Route::get('/login', AdminLoginComponent::class)->name('login');
    });
    Route::middleware(['auth:admin','PreventHistory'])->group(function () {
        Route::get('/dashboard', AdminDashboardComponent::class)->name('dashboard');
    });
});
