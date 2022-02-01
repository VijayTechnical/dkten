<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\Vendor\Auth\VendorAuthController;

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


Route::prefix('vendor')->group(function () {
    Route::middleware(['guest:vendor', 'PreventHistory'])->group(function () {
        Route::post('/login',[VendorAuthController::class,'Login']);
        Route::post('/register',[VendorAuthController::class,'Register']);
    });
    Route::middleware(['auth:vendor', 'PreventHistory'])->group(function () {
    });
});
