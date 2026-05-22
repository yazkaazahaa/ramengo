<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\HomeController;
use App\Http\Controllers\MenuController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\CartController;
use App\Http\Controllers\CustomerController;
use App\Http\Controllers\CashierController;
use App\Http\Controllers\KitchenController;
use App\Http\Controllers\AdminController;

/*
|--------------------------------------------------------------------------
| HOME
|--------------------------------------------------------------------------
*/

Route::get('/', [HomeController::class,'index']);


/*
|--------------------------------------------------------------------------
| MENU CRUD
|--------------------------------------------------------------------------
*/

Route::resource('menu', MenuController::class);


/*
|--------------------------------------------------------------------------
| CART
|--------------------------------------------------------------------------
*/

Route::get('/cart', [CartController::class,'index'])
    ->name('cart.index');

Route::get('/cart/add/{id}', [CartController::class,'add'])
    ->name('cart.add');

Route::get('/cart/decrease/{id}', [CartController::class,'decrease'])
    ->name('cart.decrease');

Route::post('/checkout', [CartController::class,'checkout'])
    ->name('checkout');


/*
|--------------------------------------------------------------------------
| ORDER
|--------------------------------------------------------------------------
*/

Route::get('/order/{id}', [OrderController::class,'create'])
    ->name('order.create');

Route::post('/order', [OrderController::class,'store'])
    ->name('order.store');

Route::get('/order-status/{id}', [OrderController::class,'status'])
    ->name('order.status');


/*
|--------------------------------------------------------------------------
| CUSTOMER
|--------------------------------------------------------------------------
*/

Route::get('/customer', [CustomerController::class,'index']);

Route::get('/customer/menu', [CustomerController::class,'menu'])
    ->name('customer.menu');


/*
|--------------------------------------------------------------------------
| STATIC PAGE
|--------------------------------------------------------------------------
*/

Route::view('/about','customer.about')
    ->name('about');

Route::view('/promo','customer.promo')
    ->name('promo');

Route::view('/contact','customer.contact')
    ->name('contact');


/*
|--------------------------------------------------------------------------
| CASHIER
|--------------------------------------------------------------------------
*/

Route::get('/cashier', [CashierController::class,'index'])
    ->name('cashier.index');

Route::post('/cashier/paid/{id}', [CashierController::class,'paid'])
    ->name('cashier.paid');


/*
|--------------------------------------------------------------------------
| KITCHEN
|--------------------------------------------------------------------------
*/

Route::get(
    '/kitchen',
    [KitchenController::class,'index']
);

Route::post(
    '/kitchen/cook/{id}',
    [KitchenController::class,'cook']
)->name('kitchen.cook');

Route::post(
    '/kitchen/ready/{id}',
    [KitchenController::class,'ready']
)->name('kitchen.ready');


/*
|--------------------------------------------------------------------------
| ADMIN
|--------------------------------------------------------------------------
*/

Route::get('/admin', [AdminController::class,'index'])
    ->name('admin.index');