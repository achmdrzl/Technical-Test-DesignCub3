<?php

use App\Http\Controllers\DropdownController;
use App\Http\Controllers\SubscriptionController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/dropdown', function () {
    return view('index');
});

Route::get('/subscribe', function(){
    return view('subscribe');
});


Route::post('/subscribe', [SubscriptionController::class, 'subscribe'])->name('subscribe');

Route::get('/get-province', DropdownController::class. '@getProvince');
Route::get('/get-kota/{provinsiId}', [DropdownController::class, 'getKota']);
Route::get('/get-kecamatan/{kotaId}', [DropdownController::class, 'getKecamatan']);
Route::get('/get-kelurahan/{kecamatanId}', [DropdownController::class, 'getKelurahan']);

