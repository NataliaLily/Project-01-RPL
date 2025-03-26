<?php

use Illuminate\Support\Facades\Route;
use \App\Http\Controllers;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\PostController;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Response;

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

Route::get('dashboard', [\App\Http\Controllers\DashboardController::class, 'index']);
Route::post('biodata', [\App\Http\Controllers\DashboardController::class, 'simpan'])->name('biodata.simpan');
Route::get('/login', [\App\Http\Controllers\AuthController::class, 'index'])->name('auth.index');
Route::post('/login', [\App\Http\Controllers\AuthController::class, 'verify'])->name('auth.verify');
Route::get('/reset-password',[DashboardController::class,'resetPassword'])->name('dashboard.resetPassword');
Route::post('/reset-password',[DashboardController::class,'prosesResetPassword'])->name('dashboard.ProsesResetPassword');

Route::get('/logout',[AuthController::class, 'logout'])->name('auth.logout');

Route::group(['middleware' => ['auth:user']], function () {
    Route::prefix('admin')->group(function () {
        Route::get('/', [\App\Http\Controllers\DashboardController::class, 'index'])->name('admin.index');

        /*Categories*/
        Route::get('/category', [CategoryController::class, 'index'])->name('category.index');
        Route::get('/category/add', [CategoryController::class, 'add'])->name('category.add');
        Route::post('/category/store', [CategoryController::class, 'store'])->name('category.store');
        Route::get('/category/edit{id}', [CategoryController::class, 'edit'])->name('category.edit');
        Route::post('/category/update', [CategoryController::class, 'update'])->name('category.update');
        Route::post('/category/delete', [CategoryController::class, 'delete'])->name('category.delete');


        /*Post*/
        Route::get('/post', [App\Http\Controllers\PostController::class, 'index'])->name('post.index');
        Route::get('/post/add', [App\Http\Controllers\PostController::class, 'add'])->name('post.add');
        Route::post('/post/store', [App\Http\Controllers\PostController::class, 'store'])->name('post.store');
        Route::get('/post/edit{id}', [App\Http\Controllers\PostController::class, 'edit'])->name('post.edit');
        Route::post('/post/update', [App\Http\Controllers\PostController::class, 'update'])->name('post.update');
        Route::post('/post/delete{id}', [App\Http\Controllers\PostController::class, 'delete'])->name('post.delete');
    });
});

Route::get('files/{filename}', function ($filename) {
    $path = storage_path('app/public/' . $filename);
    if (!File::exists($path)) {
        abort(404);
    }
    $file = File::get($path);
    $type = File::mimeType($path);
    $response = Response::make($file, 200);
    $response->header("Content-Type", $type);
    return $response;
})->name('storage');
