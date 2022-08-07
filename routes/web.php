<?php

use App\Http\Controllers\AdController;
use App\Http\Controllers\Admin\Category;
use App\Http\Controllers\Admin\AdController as AdminAdController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\MainController;
use App\Http\Controllers\SearchController;
use App\Http\Controllers\UserProfileController;
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

Route::get('/', [MainController::class, 'index'])->name('home');
Route::get('/search', [SearchController::class, 'index'])->name('searchPage');
Route::post('/search', [SearchController::class, 'search'])->name('search');
Route::resource('ad', AdController::class);

Route::group(['middleware'=>'auth'],function (){  //for authorized users
    Route::get('/logout', [UserController::class, 'logout'])->name('logout');
    Route::controller(UserProfileController::class)->group(function(){
        Route::get('/personal', 'index')->name('user.profile');
        Route::get('/add', 'addOffer')->name('user.profile.addOffer');
    });
});

Route::group(['middleware'=>'guest'],function () { //for not authorized users
    Route::post('/auth', [UserController::class, 'login'])->name('auth');
    Route::post('/registration', [UserController::class, 'registration'])->name('registration');
    Route::get('/login', [UserController::class, 'index'])->name('loginPage');

});

Route::group(['prefix'=>'admin','middleware'=>'isadmin'],function (){ //for admin users (and moderators)
    Route::resource('category', Category::class);
    Route::resource('ad', AdminAdController::class);


});
