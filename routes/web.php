<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\MasterController;
use App\Http\Controllers\ReportController;
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
    return redirect('/login');
});

Auth::routes();
    Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::middleware('role:1')->group(function () {
    //admin
    Route::get('/dashboard', [AdminController::class, 'dashboard'])->name('admin.dashboard');

    //product
    Route::prefix('product')->group(function () {
        Route::get('/', [ProductController::class, 'index'])->name('admin.product.index');
        Route::get('/create', [ProductController::class, 'create'])->name('admin.product.create');
        Route::post('/store', [ProductController::class, 'store'])->name('admin.product.store');
        Route::get('/edit/{id}', [ProductController::class, 'edit'])->name('admin.product.edit');
        Route::post('/updated/{id}', [ProductController::class, 'updated'])->name('admin.product.updated');
        Route::get('/delete/{id}', [ProductController::class, 'delete'])->name('admin.product.delete');
    });

    //report
    Route::prefix('report')->group(function () {
        Route::get('/', [ReportController::class, 'index'])->name('admin.report.index');
        Route::get('/export', [ReportController::class, 'export'])->name('admin.report.export');
    });
});

Route::middleware('role:0')->group(function () {
    //user
    Route::get('/list', [MasterController::class, 'index'])->name('list');
    Route::get('/detail/{id}', [MasterController::class, 'detail'])->name('detail');
    Route::post('/chart', [MasterController::class, 'chart'])->name('chart');
    Route::get('/step2', [MasterController::class, 'step2'])->name('step2');
    Route::post('/confirm', [MasterController::class, 'confirm'])->name('confirm');
    Route::get('/delProduct/{id}', [MasterController::class, 'delete'])->name('delProduct');
    Route::get('/history', [MasterController::class, 'history'])->name('history');
});

