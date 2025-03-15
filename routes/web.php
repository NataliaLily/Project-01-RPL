<?php

use Illuminate\Support\Facades\Route;
use \App\Http\Controllers;
use App\Http\Controllers\CategoryController;

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

        
/*Categories*/
Route::get('/category',[CategoryController::class, 'index'])->name('category.index');
Route::get('/category/add',[CategoryController::class, 'add'])->name('category.add');
Route::post('/category/store',[CategoryController::class, 'store'])->name('category.store');
// Route::get('/category/edit{id}',[CategoryController::class, 'edit'])->name('category.edit');
// Route::post('/category/update',[CategoryController::class, 'update'])->name('category.update');
// Route::post('/category/delete',[CategoryController::class, 'delete'])->name('category.delete');
    });
});