<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\DeleteOrderController;
use App\Http\Controllers\Admin\DeleteServiceController;
use App\Http\Controllers\Admin\CustomerSettingsController;
use App\Http\Controllers\ServiceProvider\SettingController;
use App\Http\Controllers\Admin\ServiceProviderSettingsController;
use App\Http\Controllers\ServiceProvider\ServiceCreateController;
use App\Http\Controllers\ServiceProvider\ServiceDetailController;
use App\Http\Controllers\ServiceProvider\ServiceUpdateController;

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


Route::middleware(['auth'])->group(function () {

    Route::get('service/{id}' , [ServiceDetailController::class , 'service']);
    Route::post('service/update/{id}' , [ServiceUpdateController::class , 'update']);
    Route::get('create' , [ServiceCreateController::class , 'create']);
    Route::post('store' , [ServiceCreateController::class , 'store']);
    Route::get('setting' , [SettingController::class , 'setting']);
    Route::post('setting/update' , [SettingController::class , 'update']);

    Route::post('service/delete/{id}' , [DeleteServiceController::class , 'delete']);
    Route::post('order/delete/{id}' , [DeleteOrderController::class , 'delete']);

    Route::get('customers/setting' , [CustomerSettingsController::class , 'customersSetting']);
    Route::post('customer/delete/{id}' , [CustomerSettingsController::class , 'delete']);
    Route::get('serviceProviders/setting' , [ServiceProviderSettingsController::class , 'settings']);
    Route::post('serviceProvider/delete/{id}' , [ServiceProviderSettingsController::class , 'delete']);
    Route::post('serviceProvider/change/{id}' , [ServiceProviderSettingsController::class , 'changeStatus']);
});
