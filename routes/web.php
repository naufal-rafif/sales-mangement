<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\ProductController;

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

/*------------------------------------------
--------------------------------------------
Superadmin Routes List
--------------------------------------------
--------------------------------------------*/
Route::middleware(['auth', 'user-access:superadmin'])->group(function () {

    Route::get('/superadmin/home', [App\Http\Controllers\Web\Superadmin\HomeController::class, 'index'])->name('superadmin.home');

    // user
    Route::controller(App\Http\Controllers\Web\Superadmin\UserController::class)->group(function () {
        Route::get('/superadmin/user', 'index')->name('superadmin.user');
        Route::get('/superadmin/user/create', 'create')->name('superadmin.user.create');
        Route::post('/superadmin/user/store', 'store')->name('superadmin.user.store');
        Route::get('/superadmin/user/show/{user}', 'show')->name('superadmin.user.show');
        Route::get('/superadmin/user/edit/{user}', 'edit')->name('superadmin.user.edit');
        Route::put('/superadmin/user/update/{user}', 'update')->name('superadmin.user.update');
        Route::delete('/superadmin/user/destroy/{user}', 'destroy')->name('superadmin.user.destroy');
    });

    // sales
    Route::controller(App\Http\Controllers\Web\Superadmin\SalesController::class)->group(function () {
        Route::get('/superadmin/sales', 'index')->name('superadmin.sales');
        Route::get('/superadmin/sales/create', 'create')->name('superadmin.sales.create');
        Route::post('/superadmin/sales/store', 'store')->name('superadmin.sales.store');
        Route::get('/superadmin/sales/show/{sales}', 'show')->name('superadmin.sales.show');
        Route::get('/superadmin/sales/edit/{sales}', 'edit')->name('superadmin.sales.edit');
        Route::put('/superadmin/sales/update/{sales}', 'update')->name('superadmin.sales.update');
        Route::delete('/superadmin/sales/destroy/{sales}', 'destroy')->name('superadmin.sales.destroy');
    });

    // branch
    Route::controller(App\Http\Controllers\Web\Superadmin\BranchController::class)->group(function () {
        Route::get('/superadmin/branch', 'index')->name('superadmin.branch');
        Route::get('/superadmin/branch/create', 'create')->name('superadmin.branch.create');
        Route::post('/superadmin/branch/store', 'store')->name('superadmin.branch.store');
        Route::get('/superadmin/branch/show/{branch}', 'show')->name('superadmin.branch.show');
        Route::get('/superadmin/branch/edit/{branch}', 'edit')->name('superadmin.branch.edit');
        Route::put('/superadmin/branch/update/{branch}', 'update')->name('superadmin.branch.update');
        Route::delete('/superadmin/branch/destroy/{branch}', 'destroy')->name('superadmin.branch.destroy');
    });
});

/*------------------------------------------
--------------------------------------------
Supervisor Routes List
--------------------------------------------
--------------------------------------------*/
Route::middleware(['auth', 'user-access:supervisor'])->group(function () {

    Route::get('/supervisor/home', [App\Http\Controllers\Web\Supervisor\HomeController::class, 'index'])->name('supervisor.home');

    // user
    Route::controller(App\Http\Controllers\Web\Supervisor\UserController::class)->group(function () {
        Route::get('/supervisor/user', 'index')->name('supervisor.user');
        Route::get('/supervisor/user/create', 'create')->name('supervisor.user.create');
        Route::post('/supervisor/user/store', 'store')->name('supervisor.user.store');
        Route::get('/supervisor/user/show/{user}', 'show')->name('supervisor.user.show');
        Route::get('/supervisor/user/edit/{user}', 'edit')->name('supervisor.user.edit');
        Route::put('/supervisor/user/update/{user}', 'update')->name('supervisor.user.update');
        Route::delete('/supervisor/user/destroy/{user}', 'destroy')->name('supervisor.user.destroy');
    });

    // sales
    Route::controller(App\Http\Controllers\Web\Supervisor\SalesController::class)->group(function () {
        Route::get('/supervisor/sales', 'index')->name('supervisor.sales');
        Route::get('/supervisor/sales/create', 'create')->name('supervisor.sales.create');
        Route::post('/supervisor/sales/store', 'store')->name('supervisor.sales.store');
        Route::get('/supervisor/sales/show/{sales}', 'show')->name('supervisor.sales.show');
        Route::get('/supervisor/sales/edit/{sales}', 'edit')->name('supervisor.sales.edit');
        Route::put('/supervisor/sales/update/{sales}', 'update')->name('supervisor.sales.update');
        Route::delete('/supervisor/sales/destroy/{sales}', 'destroy')->name('supervisor.sales.destroy');
    });

    // branch
    Route::controller(App\Http\Controllers\Web\Supervisor\BranchController::class)->group(function () {
        Route::get('/supervisor/branch', 'index')->name('supervisor.branch');
        Route::get('/supervisor/branch/create', 'create')->name('supervisor.branch.create');
        Route::post('/supervisor/branch/store', 'store')->name('supervisor.branch.store');
        Route::get('/supervisor/branch/show/{branch}', 'show')->name('supervisor.branch.show');
        Route::get('/supervisor/branch/edit/{branch}', 'edit')->name('supervisor.branch.edit');
        Route::put('/supervisor/branch/update/{branch}', 'update')->name('supervisor.branch.update');
        Route::delete('/supervisor/branch/destroy/{branch}', 'destroy')->name('supervisor.branch.destroy');
    });
});

/*------------------------------------------
--------------------------------------------
Sub Supervisor Routes List
--------------------------------------------
--------------------------------------------*/
Route::middleware(['auth', 'user-access:sub_supervisor'])->group(function () {

    Route::get('/sub_supervisor/home', [App\Http\Controllers\Web\Sub_supervisor\HomeController::class, 'index'])->name('sub_supervisor.home');
    // user
    Route::controller(App\Http\Controllers\Web\Sub_supervisor\UserController::class)->group(function () {
        Route::get('/sub_supervisor/user', 'index')->name('sub_supervisor.user');
        Route::get('/sub_supervisor/user/create', 'create')->name('sub_supervisor.user.create');
        Route::post('/sub_supervisor/user/store', 'store')->name('sub_supervisor.user.store');
        Route::get('/sub_supervisor/user/show/{user}', 'show')->name('sub_supervisor.user.show');
        Route::get('/sub_supervisor/user/edit/{user}', 'edit')->name('sub_supervisor.user.edit');
        Route::put('/sub_supervisor/user/update/{user}', 'update')->name('sub_supervisor.user.update');
        Route::delete('/sub_supervisor/user/destroy/{user}', 'destroy')->name('sub_supervisor.user.destroy');
    });

    // sales
    Route::controller(App\Http\Controllers\Web\Sub_supervisor\SalesController::class)->group(function () {
        Route::get('/sub_supervisor/sales', 'index')->name('sub_supervisor.sales');
        Route::get('/sub_supervisor/sales/create', 'create')->name('sub_supervisor.sales.create');
        Route::post('/sub_supervisor/sales/store', 'store')->name('sub_supervisor.sales.store');
        Route::get('/sub_supervisor/sales/show/{sales}', 'show')->name('sub_supervisor.sales.show');
        Route::get('/sub_supervisor/sales/edit/{sales}', 'edit')->name('sub_supervisor.sales.edit');
        Route::put('/sub_supervisor/sales/update/{sales}', 'update')->name('sub_supervisor.sales.update');
        Route::delete('/sub_supervisor/sales/destroy/{sales}', 'destroy')->name('sub_supervisor.sales.destroy');
    });

    // branch
    Route::controller(App\Http\Controllers\Web\Sub_supervisor\BranchController::class)->group(function () {
        Route::get('/sub_supervisor/branch', 'index')->name('sub_supervisor.branch');
        Route::get('/sub_supervisor/branch/create', 'create')->name('sub_supervisor.branch.create');
        Route::post('/sub_supervisor/branch/store', 'store')->name('sub_supervisor.branch.store');
        Route::get('/sub_supervisor/branch/show/{branch}', 'show')->name('sub_supervisor.branch.show');
        Route::get('/sub_supervisor/branch/edit/{branch}', 'edit')->name('sub_supervisor.branch.edit');
        Route::put('/sub_supervisor/branch/update/{branch}', 'update')->name('sub_supervisor.branch.update');
        Route::delete('/sub_supervisor/branch/destroy/{branch}', 'destroy')->name('sub_supervisor.branch.destroy');
    });
});

/*------------------------------------------
--------------------------------------------
Sales Routes List
--------------------------------------------
--------------------------------------------*/
Route::middleware(['auth', 'user-access:sales'])->group(function () {

    Route::get('/sales/home', [App\Http\Controllers\Web\Sales\HomeController::class, 'index'])->name('sales.home');

    // sales
    Route::controller(App\Http\Controllers\Web\Sales\SalesController::class)->group(function () {
        Route::get('/sales/sales', 'index')->name('sales.sales');
        Route::get('/sales/sales/create', 'create')->name('sales.sales.create');
        Route::post('/sales/sales/store', 'store')->name('sales.sales.store');
        Route::get('/sales/sales/show/{sales}', 'show')->name('sales.sales.show');
        Route::get('/sales/sales/edit/{sales}', 'edit')->name('sales.sales.edit');
        Route::put('/sales/sales/update/{sales}', 'update')->name('sales.sales.update');
        Route::delete('/sales/sales/destroy/{sales}', 'destroy')->name('sales.sales.destroy');
    });
});

/*------------------------------------------
--------------------------------------------
Reseller Routes List
--------------------------------------------
--------------------------------------------*/
Route::middleware(['auth', 'user-access:reseller'])->group(function () {

    Route::get('/reseller/home', [App\Http\Controllers\Web\Reseller\HomeController::class, 'index'])->name('reseller.home');

    // sales
    Route::controller(App\Http\Controllers\Web\Reseller\SalesController::class)->group(function () {
        Route::get('/reseller/sales', 'index')->name('reseller.sales');
        Route::get('/reseller/sales/create', 'create')->name('reseller.sales.create');
        Route::post('/reseller/sales/store', 'store')->name('reseller.sales.store');
        Route::get('/reseller/sales/show/{sales}', 'show')->name('reseller.sales.show');
        Route::get('/reseller/sales/edit/{sales}', 'edit')->name('reseller.sales.edit');
        Route::put('/reseller/sales/update/{sales}', 'update')->name('reseller.sales.update');
        Route::delete('/reseller/sales/destroy/{sales}', 'destroy')->name('reseller.sales.destroy');
    });
});


// Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
// Route::resource('products', ProductController::class);
// branch
Route::controller(ProductController::class)->group(function () {
    Route::get('/products', 'index')->name('products');
    Route::get('/products/create', 'create')->name('products.create');
    Route::post('/products/store', 'store')->name('products.store');
    Route::get('/products/show/{product}', 'show')->name('products.show');
    Route::get('/products/edit/{product}', 'edit')->name('products.edit');
    Route::put('/products/update/{product}', 'update')->name('products.update');
    Route::delete('/products/destroy/{product}', 'destroy')->name('products.destroy');
});
