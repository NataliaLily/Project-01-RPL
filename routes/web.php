<?php

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

Route::get('/', function () {
    return view('welcome');
});

Route::get('dashboard', [\App\Http\Controllers\DashboardController::class,'index']);
Route::post('biodata', [\App\Http\Controllers\DashboardController::class,'simpan']) ->name('biodata.simpan'); 
Route::get('/login',[\App\Http\Controllers\AuthController::class,'index'])->name('auth.login');
Route::post('/login', [\App\Http\Controllers\AuthController::class,'verify'])->name('auth.varivy');

Route::group(['middleware' => ['auth:user']], function () {
    Route::prefix('admin')->group(function () {
        Route::get('/',[\App\Http\Controllers\DashboardController::class, 'index'])->name('admin.index');
    });
});