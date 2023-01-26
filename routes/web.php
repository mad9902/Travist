<?php

use App\Http\Controllers\ContentController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\TravelListController;
use Illuminate\Support\Facades\Route;

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

Route::get('/', [ContentController::class, 'home']);

Route::group(['middleware' => 'isAdmin'], function () {
    Route::get('/travel-list', [TravelListController::class, 'index'])->name('all_travel_list');
    Route::get('/travel-list/create', [TravelListController::class, 'create'])->name('create_travel_list');
    Route::post('/travel-list/create', [TravelListController::class, 'store'])->name('store_travel_list_detail');
    Route::get('/travel-list/edit/{id}', [TravelListController::class, 'edit'])->name('edit_travel_list');
    Route::put('/travel-list/edit/{id}', [TravelListController::class, 'update'])->name('update_travel_list');
    Route::delete('/travel-list/{id}', [TravelListController::class, 'destroy'])->name('destroy_travel_list');
});

Route::get('/travel-list/{id}', [TravelListController::class, 'show'])->name('travel_list_detail');
Route::post('/order/{id}', [OrderController::class, 'orderTicket'])->name('order_ticket');
Route::get('/histories', [OrderController::class, 'orderHistory'])->name('order_history');
Route::get('/success-order', [ContentController::class, 'success_order']);
Route::any('/search', [ContentController::class, 'search'])->name('search');
Route::get('/reset_password', [ContentController::class, 'resetPassword'])->name('reset_password');

Route::get('/my-profile', [ContentController::class, 'profile'])->name('show_profile')->middleware('auth');
Route::put('/my-profile', [ContentController::class, 'editProfile'])->name('edit_profile')->middleware('auth');

Auth::routes();

// Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
