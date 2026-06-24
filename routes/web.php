<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\MenuController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\CartController;
use App\Http\Controllers\CustomerController;
use App\Http\Controllers\CashierController;
use App\Http\Controllers\KitchenController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\AdminMejaController;
use App\Http\Controllers\AdminOrderController;
use App\Http\Controllers\WebsiteContentController;

/*
|--------------------------------------------------------------------------
| PUBLIC ROUTES
|--------------------------------------------------------------------------
| Route di bawah ini tetap bisa diakses pelanggan tanpa login admin.
*/

Route::get('/', [HomeController::class, 'index']);

Route::get('/customer', [CustomerController::class, 'index']);
Route::get('/customer/menu', [CustomerController::class, 'menu'])
    ->name('customer.menu');
Route::get('/table/{id}', [CustomerController::class, 'scanMeja'])
    ->name('table.scan');

Route::get('/about', [CustomerController::class, 'about'])
    ->name('about');
Route::get('/berita', [CustomerController::class, 'berita'])
    ->name('berita');
Route::get('/promo', function () {
    return redirect()->route('berita');
});
Route::get('/contact', [CustomerController::class, 'contact'])
    ->name('contact');

Route::get('/cart', [CartController::class, 'index'])
    ->name('cart.index');
Route::get('/cart/add/{id}', [CartController::class, 'add'])
    ->name('cart.add');
Route::get('/cart/decrease/{id}', [CartController::class, 'decrease'])
    ->name('cart.decrease');
Route::post('/checkout', [CartController::class, 'checkout'])
    ->name('checkout');

Route::get('/order/{id}', [OrderController::class, 'create'])
    ->name('order.create');
Route::post('/order', [OrderController::class, 'store'])
    ->name('order.store');
Route::get('/order-status', [OrderController::class, 'status']);

/*
|--------------------------------------------------------------------------
| PROTECTED INTERNAL ROUTES
|--------------------------------------------------------------------------
| Admin, kasir, dapur, laporan, meja, konten, dan CRUD menu wajib login.
*/

Route::middleware(['auth'])->group(function () {
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');

    /*
    |--------------------------------------------------------------------------
    | Profile Breeze
    |--------------------------------------------------------------------------
    */

    Route::get('/profile', [ProfileController::class, 'edit'])
        ->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])
        ->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])
        ->name('profile.destroy');

    /*
    |--------------------------------------------------------------------------
    | Menu CRUD Internal
    |--------------------------------------------------------------------------
    */

    Route::resource('menu', MenuController::class);

    Route::get('/admin/menu', [MenuController::class, 'index'])
        ->name('admin.menu.index');
    Route::get('/admin/menu/create', [MenuController::class, 'create'])
        ->name('admin.menu.create');
    Route::post('/admin/menu', [MenuController::class, 'store'])
        ->name('admin.menu.store');
    Route::get('/admin/menu/{id}/edit', [MenuController::class, 'edit'])
        ->name('admin.menu.edit');
    Route::put('/admin/menu/{id}', [MenuController::class, 'update'])
        ->name('admin.menu.update');
    Route::delete('/admin/menu/{id}', [MenuController::class, 'destroy'])
        ->name('admin.menu.destroy');

    /*
    |--------------------------------------------------------------------------
    | Cashier
    |--------------------------------------------------------------------------
    */

    Route::get('/cashier', [CashierController::class, 'index'])
        ->name('cashier.index');
    Route::post('/cashier/paid/{id}', [AdminOrderController::class, 'lunas'])
        ->name('cashier.paid');
    Route::get('/cashier/history', [CashierController::class, 'history'])
        ->name('cashier.history');
    Route::get('/admin/kasir/{id}/detail', [CashierController::class, 'detail'])
        ->name('cashier.detail');
    Route::post('/admin/kasir/{id}/proses-bayar', [CashierController::class, 'prosesBayar'])
        ->name('cashier.proses-bayar');

    /*
    |--------------------------------------------------------------------------
    | Kitchen
    |--------------------------------------------------------------------------
    */

    Route::get('/kitchen', [KitchenController::class, 'index'])
        ->name('kitchen.index');
    Route::post('/kitchen/cook/{id}', [AdminOrderController::class, 'masak'])
        ->name('kitchen.cook');
    Route::post('/kitchen/ready/{id}', [AdminOrderController::class, 'hidangkan'])
        ->name('kitchen.ready');

    /*
    |--------------------------------------------------------------------------
    | Admin
    |--------------------------------------------------------------------------
    */

    Route::get('/admin', [AdminController::class, 'index'])
        ->name('admin.index');
    Route::get('/admin/content', [WebsiteContentController::class, 'index'])
        ->name('content.index');
    Route::get('/admin/content/{id}/edit', [WebsiteContentController::class, 'edit'])
        ->name('admin.content.edit');
    Route::put('/admin/content/{id}', [WebsiteContentController::class, 'update'])
        ->name('admin.content.update');
    Route::post('/admin/content/update/{id}', [WebsiteContentController::class, 'update'])
        ->name('content.update');
    Route::post('/admin/content/store', [WebsiteContentController::class, 'store'])
        ->name('content.store');
    Route::post('/admin/content/delete/{id}', [WebsiteContentController::class, 'delete'])
        ->name('content.delete');

    Route::get('/admin/report', [AdminController::class, 'report'])
        ->name('admin.report');

    Route::get('/admin/meja', [AdminMejaController::class, 'index'])
        ->name('admin.meja.index');
    Route::post('/admin/meja', [AdminMejaController::class, 'store'])
        ->name('admin.meja.store');
    Route::delete('/admin/meja/{meja}', [AdminMejaController::class, 'destroy'])
        ->name('admin.meja.destroy');
    Route::get('/admin/meja/cetak', [AdminMejaController::class, 'cetak'])
        ->name('admin.meja.cetak');
});

/*
|--------------------------------------------------------------------------
| AUTH BREEZE
|--------------------------------------------------------------------------
*/

require __DIR__.'/auth.php';
