<?php

use App\Http\Controllers\Customer\OrderController as CustomerOrderController;
use App\Http\Controllers\Customer\ProductController as CustomerProductController;
use App\Http\Controllers\Merchant\ProductController;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;

// Route::get('/', function () {
//     return view('welcome');
// });

Route::get('/', function () {
    return redirect()->route('login');
});

// Route::get('/dashboard', function () {
//     return view('dashboard');
// })->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware(['auth', 'verified', 'checkrole:Merchant'])->group(function () {
    Route::get('/merchant-dashboard', function () {
        return view('merchant.dashboard');
    })->name('merchant.dashboard');

    Route::resource('/merchant-product', ProductController::class);

    Route::middleware('auth')->group(function () {
        Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
        Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
        Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
    });
});

Route::middleware(['auth', 'verified', 'checkrole:Customer'])->group(function () {
    Route::get('/customer-dashboard', function () {
        return view('customer.dashboard');
    })->name('customer.dashboard');

    Route::resource('/customer-product', CustomerProductController::class);
    // Route::resource('/customer-order', CustomerOrderController::class);
    Route::get('/customer-order/index', [CustomerOrderController::class, 'index'])->name('customer-order.index');
    Route::get('/customer-order/create/{id}', [CustomerOrderController::class, 'create'])->name('customer-order.create');
    Route::post('/customer-order/store', [CustomerOrderController::class, 'store'])->name('customer-order.store');
    Route::get('/customer-order/show/{id}', [CustomerOrderController::class, 'show'])->name('customer-order.show');
});



require __DIR__ . '/auth.php';
