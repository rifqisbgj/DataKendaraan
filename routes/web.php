<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\VehicleController;

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

Route::get('/', function ()
{
    return redirect('kendaraan');
});
Route::prefix('kendaraan')->group(function()
{
    Route::get('/',[VehicleController::class,'index'])->name('kendaraan');
    Route::get('/tambah',[VehicleController::class,'create'])->name('kendaraan.tambah');
    Route::post('/store',[VehicleController::class,'store'])->name('kendaraan.store');
    Route::get('/edit/{vehicle}',[VehicleController::class,'edit'])->name('kendaraan.edit');
    Route::put('/update/{vehicle}',[VehicleController::class,'update'])->name('kendaraan.update');
});
