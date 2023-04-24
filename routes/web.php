<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\RoleController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\BoughtController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\Admin\AdminUserController;
use App\Http\Controllers\Admin\AdminProductController;
use App\Http\Controllers\JAdmin\JuniorAdminController;
use App\Http\Controllers\Admin\AdminCategoryController;

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

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth'])->name('dashboard');

require __DIR__.'/auth.php';

Route::group(['middleware' => ['auth' , 'NotAuthUser']], function() {
    Route::resource('roles', RoleController::class);
    Route::resource('users', UserController::class);
    Route::resource('products', ProductController::class);


    // Route::get('category' , [CategroyController::class , 'index'])->middleware('category-list');
    // Route::get('category/create' , [CategroyController::class , 'create'])->middleware('category-create');
    // Route::post('category/store' , [CategroyController::class , 'store'])->middleware('category-create');
    // Route::post('category/edit/{id}' , [CategroyController::class , 'edit'])->middleware('category-edit');
    // Route::post('category/update/{id}' , [CategroyController::class , 'update'])->middleware('category-edit');
    // Route::delete('category/destroy/{id}' , [CategroyController::class , 'destroy'])->middleware('category-delete');
    // Route::post('category/show/{id}' , [CategroyController::class , 'show'])->middleware('category-delete');
});

Route::group(['middleware' => ['auth']], function() {

    Route::resource('bought', BoughtController::class);
    Route::resource('category', CategoryController::class);

});


Route::group(['middleware' => ['auth' , 'admin']], function() {

    Route::get('admin/category' , [AdminCategoryController::class , 'index']);
    Route::get('admin/category/create' , [AdminCategoryController::class , 'create']);
    Route::get('admin/category/edit/{id}' , [AdminCategoryController::class , 'edit']);
    // Route::post('admin/category/update/{id}' , [AdminCategoryController::class , 'update']);
    Route::post('admin/category/delete/{id}' , [AdminCategoryController::class , 'delete']);
    Route::post('admin/category/store' , [AdminCategoryController::class , 'store']);

    Route::get('admin/products' , [AdminProductController::class , 'index']);
    Route::get('admin/products/create' , [AdminProductController::class , 'create']);
    Route::get('admin/products/edit/{id}' , [AdminProductController::class , 'edit']);
    Route::post('admin/products/update/{id}' , [AdminProductController::class , 'update']);
    Route::post('admin/products/delete/{id}' , [AdminProductController::class , 'delete']);
    Route::post('admin/products/store' , [AdminProductController::class , 'store']);

    Route::get('admin/adminUser' , [AdminUserController::class , 'index']);
    Route::get('admin/adminUser/admin' , [AdminUserController::class , 'admin']);
    Route::get('admin/adminUser/user' , [AdminUserController::class , 'user']);
    Route::get('admin/adminUser/create' , [AdminUserController::class , 'create']);
    Route::post('admin/adminUser/store' , [AdminUserController::class , 'store']);
    Route::post('admin/adminUser/delete/{id}' , [AdminUserController::class , 'delete']);
    Route::post('admin/adminUser/changeRole/{id}' , [AdminUserController::class , 'changeRole']);
    Route::post('admin/adminUser/changeCategory/{id}' , [AdminUserController::class , 'changeCategory']);
    Route::post('admin/adminUser/deleteCategory/{id}' , [AdminUserController::class , 'deleteCategory']);
    Route::post('admin/adminUser/addCategory/{id}' , [AdminUserController::class , 'addCategory']);
    Route::post('admin/adminUser/storeCategory/{id}' , [AdminUserController::class , 'storeCategory']);

});

Route::middleware(['auth'])->group(function () {
    Route::post('admin/category/update/{id}' , [AdminCategoryController::class , 'update']);


});


Route::middleware(['auth', 'jadmin'])->group(function () {
    Route::get('jadmin/category' , [JuniorAdminController::class , 'index']);
    Route::get('jadmin/category/edit/{id}' , [JuniorAdminController::class , 'edit']);
});








