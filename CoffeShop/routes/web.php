<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CategoriesController;
use App\Http\Controllers\platsController;
use App\Http\Controllers\RoleController;
use Illuminate\Routing\RouteGroup;
use Illuminate\Support\Facades\DB;

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

//route verify email
Route::get('/email/verify', function () {
    return view('auth.verify-email');
})->middleware(['auth'])->name('verification.notice');

Route::get('/', function () {
    $plats = DB::table('plats')
        ->join('model_categories','plats.id_category','model_categories.id')
        ->select('plats.*','model_categories.name_category')->get();
        $categories =DB::table('model_categories')->get();
    return view('welcome',compact('plats','categories'));
});

// Route categories
Route::middleware(['auth','CheckAdmin'])->controller(CategoriesController::class)->group(function(){
    Route::get('/category/all','index')->name('all.category');
    Route::post('/category/add','store')->name('store.category');
    Route::get('/category/show/{id}','show')->name('show.category');
    Route::post('/category/delete/{id}','delete')->name('delete.category');
    Route::post('/category/update/{id}','update')->name('update.category');
});

// Route Plats
Route::middleware(['auth','CheckAdmin'])->resource('plats',PlatsController::class);

// Route::middleware(['auth','CheckAdmin'])->controller(platsController::class)->group(function(){
//     Route::get('/plats/all','index')->name('all.plats');
//     Route::post('/plats/add','store')->name('store.plats');
//     Route::get('/plats/show/{id}','show')->name('show.plats');
//     Route::get('/plats/delete/{id}','delete')->name('delete.plats');
//     Route::post('/plats/update/{id}','update')->name('update.plats');
// });

// Route check (user or admin)
Route::get('users','App\Http\Controllers\RoleController@isAdmin')->middleware('auth','verified');

// Route redirect dashboard user
Route::get('/dashboard/user', function () {
    return view('users.dashboard');
})->name('dashboard.user')->middleware('auth','CheckUser','verified');

Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified'
])->group(function () {
    Route::get('/dashboard', function () {
        return view('admin.dashboard');
    })->name('dashboard')->middleware('auth','CheckAdmin');
});

