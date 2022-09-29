<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\AdminLoginController;
use App\Http\Controllers\DashBoardController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\SubCategoryController;
use App\Http\Controllers\BrandController;
use App\Http\Controllers\UnitController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\CartControlller;
use App\Http\Controllers\CheckoutController;
use App\Http\Controllers\CustomerAuthController;
use App\Http\Controllers\CustomerDashBoardController;
use App\Http\Controllers\SslCommerzPaymentController;
use App\Http\Controllers\ColorController;
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

Route::get('/', [HomeController::class,'index'])->name('home');
Route::get('/category_product', [HomeController::class,'category'])->name('category');
Route::get('/product-details/{id}', [HomeController::class,'details'])->name('details');
Route::get('/contact', [HomeController::class,'contact'])->name('contact');
Route::get('/error', [HomeController::class,'error'])->name('error');

Route::post('/add-to-cart/{id}', [CartControlller::class,'index'])->name('add-to-cart');
Route::get('/show-cart', [CartControlller::class,'show'])->name('show-cart');
Route::post('/update-to-cart/{id}', [CartControlller::class,'update'])->name('update-to-cart');
Route::get('/remove-cart-product/{id}', [CartControlller::class,'remove'])->name('remove-cart-product');

Route::get('/checkout', [CheckoutController::class,'index'])->name('checkout');
Route::post('/new-order', [CheckoutController::class,'newOrder'])->name('new-order');
Route::get('/complete-order', [CheckoutController::class,'CompleteOrder'])->name('complete-order');

Route::get('/customer-login', [CustomerAuthController::class,'login'])->name('customer-login');
Route::get('/logout', [CustomerAuthController::class,'logout'])->name('logout');
Route::get('/customer-Register', [CustomerAuthController::class,'Register'])->name('customer-Register');
Route::post('/new-customer', [CustomerAuthController::class,'newcustomer'])->name('new-customer');
Route::post('/customer-signIn', [CustomerAuthController::class,'SignIn'])->name('customer-signIn');

Route::middleware(['logincheck'])->group(function (){
    Route::get('/customer-dashboard', [CustomerDashBoardController::class,'index'])->name('customer-dashboard');
    Route::get('/customer-profile', [CustomerDashBoardController::class,'profile'])->name('customer-profile');
    Route::get('/customer-account', [CustomerDashBoardController::class,'Account'])->name('customer-Account');
});

Route::resource('color',ColorController::class);

Route::middleware(['auth:sanctum', config('jetstream.auth_session'), 'verified'])->group(function () {

    Route::get('/dashboard', [DashBoardController::class,'index'])->name('dashboard');
    Route::get('/forgot-password', [AdminLoginController::class,'login'])->name('forgotpassword');

    Route::get('/add-category', [CategoryController::class,'index'])->name('add-category');
    Route::post('/new-category', [CategoryController::class,'create'])->name('category.new');
    Route::get('/edit-category/{id}', [CategoryController::class,'edit'])->name('category.edit');
    Route::post('/update-category/{id}', [CategoryController::class,'update'])->name('category.update');
    Route::get('/delete-category{id}', [CategoryController::class,'delete'])->name('category.delete');
    Route::get('/manage-category', [CategoryController::class,'manage'])->name('manage-category');

    Route::get('/add-subcategory', [SubCategoryController::class,'index'])->name('add-subcategory');
    Route::post('/new-subcategory', [SubCategoryController::class,'create'])->name('subcategory.new');
    Route::get('/edit-subcategory/{id}', [SubCategoryController::class,'edit'])->name('subcategory.edit');
    Route::post('/update-subcategory/{id}', [SubCategoryController::class,'update'])->name('subcategory.update');
    Route::get('/delete-subcategory{id}', [SubCategoryController::class,'delete'])->name('subcategory.delete');
    Route::get('/manage-subcategory', [SubCategoryController::class,'manage'])->name('manage-subcategory');

    Route::get('/add-brand', [BrandController::class,'index'])->name('add-brand');
    Route::post('/new-brand', [BrandController::class,'create'])->name('brand.new');
    Route::get('/edit-brand/{id}', [BrandController::class,'edit'])->name('brand.edit');
    Route::post('/update-brand/{id}', [BrandController::class,'update'])->name('brand.update');
    Route::get('/delete-brand{id}', [BrandController::class,'delete'])->name('brand.delete');
    Route::get('/manage-brand', [BrandController::class,'manage'])->name('manage-brand');

    Route::get('/add-unit', [UnitController::class,'index'])->name('add-unit');
    Route::post('/new-unit', [UnitController::class,'create'])->name('unit.new');
    Route::get('/edit-unit/{id}', [UnitController::class,'edit'])->name('unit.edit');
    Route::post('/update-unit/{id}', [UnitController::class,'update'])->name('unit.update');
    Route::get('/delete-unit{id}', [UnitController::class,'delete'])->name('unit.delete');
    Route::get('/manage-unit', [UnitController::class,'manage'])->name('manage-unit');

    Route::get('/add-product', [ProductController::class,'index'])->name('add-product');
    Route::post('/new-product', [ProductController::class,'create'])->name('product.new');
    Route::post('/get-sub-category', [ProductController::class,'getSubCategory'])->name('product.get-sub-category');
    Route::get('/edit-product/{id}', [ProductController::class,'edit'])->name('product.edit');
    Route::get('/detail-product/{id}', [ProductController::class,'detail'])->name('product.detail');
    Route::post('/update-product/{id}', [ProductController::class,'update'])->name('product.update');
    Route::get('/delete-product{id}', [ProductController::class,'delete'])->name('product.delete');
    Route::get('/manage-product', [ProductController::class,'manage'])->name('manage-product');

    Route::get('/manage-order', [OrderController::class,'manage'])->name('manage-order');
    Route::get('/detail/{id}', [OrderController::class,'detail'])->name('admin-order.detail');
    Route::get('/view-invoice/{id}', [OrderController::class,'viewinvoice'])->name('admin-order.view-invoice');
    Route::get('/download-invoice/{id}', [OrderController::class,'downloadinvoice'])->name('admin-order.download-invoice');
    Route::get('/edit/{id}', [OrderController::class,'edit'])->name('admin-order.edit');
    Route::get('/admin-order.delete/{id}', [OrderController::class,'delete'])->name('admin-order.delete');
    Route::post('/update/{id}', [OrderController::class,'update'])->name('admin-order.update');

    Route::get('/delete/{id}', [UserController::class,'delete'])->name('admin-user.delete');
    Route::get('/manage-user', [UserController::class,'manage'])->name('manage-user');
});
// SSLCOMMERZ Start
Route::get('/example1', [SslCommerzPaymentController::class, 'exampleEasyCheckout']);
Route::get('/example2', [SslCommerzPaymentController::class, 'exampleHostedCheckout']);

Route::post('/pay', [SslCommerzPaymentController::class, 'index']);
Route::post('/pay-via-ajax', [SslCommerzPaymentController::class, 'payViaAjax']);

Route::post('/success', [SslCommerzPaymentController::class, 'success']);
Route::post('/fail', [SslCommerzPaymentController::class, 'fail']);
Route::post('/cancel', [SslCommerzPaymentController::class, 'cancel']);

Route::post('/ipn', [SslCommerzPaymentController::class, 'ipn']);
//SSLCOMMERZ END
