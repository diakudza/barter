<?php

use App\Http\Controllers\AdController;
use App\Http\Controllers\Admin\AdminController;
use App\Http\Controllers\Admin\CategoryController;
use App\Http\Controllers\Admin\AdController as AdminAdController;
use App\Http\Controllers\Admin\CommentController as AdminCommentController;
use App\Http\Controllers\Admin\UserRoleController;
use App\Http\Controllers\AdUserFavorites;
use App\Http\Controllers\UserController;
use App\Http\Controllers\Admin\UserController as AdminUserController;
use App\Http\Controllers\MainController;
use App\Http\Controllers\SearchController;
use App\Http\Controllers\UserProfileController;
use App\Http\Controllers\WishlistController;
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

Route::get('/about', function () {
    return view ('about');
});
Route::get('/', [MainController::class, 'index'])->name('home');
Route::get('/search', [SearchController::class, 'index'])->name('searchPage');
Route::post('/search', [SearchController::class, 'search'])->name('search');
Route::resource('ad', AdController::class);


Route::group(['middleware' => 'auth'], function () {  //for authorized users
    Route::get('/logout', [UserController::class, 'logout'])->name('logout');
    Route::controller(UserProfileController::class)->group(function () {
        Route::get('/personal', 'index')->name('user.profile');// Personal area - main page
        Route::get('/createAd', 'createAd')->name('user.profile.createAd');// Personal area - create ad
    });
    Route::resource('wishlist', WishlistController::class);
    Route::resource('favorite', AdUserFavorites::class);
});


Route::group(['middleware' => 'guest'], function () { //for not authorized users
    Route::post('/auth', [UserController::class, 'login'])->name('auth');
    Route::post('/registration', [UserController::class, 'registration'])->name('registration');
    Route::get('/login', [UserController::class, 'index'])->name('loginPage');

});


Route::group(['middleware' => ['auth', 'isUserBlocked']], function () {  //for authorized users
    Route::get('/logout', [UserController::class, 'logout'])->name('logout');
    Route::controller(UserProfileController::class)->group(function () {
        Route::get('/personal', 'index')->name('user.profile');// Personal area - main page
        Route::get('/createAd', 'createAd')->name('user.profile.createAd');// Personal area - create ad
    });
});


Route::group(['prefix' => 'admin', 'middleware' => ['isadmin', 'isUserBlocked']], function () { //for admin users (and moderators)
    Route::resource('category', CategoryController::class);
    Route::resource('ad', AdminAdController::class)->names([
        'index' => 'adIndex',
        'show' => 'adShow',
        'store' => 'adStore',
        'destroy' => 'adDestroy',
        'update' => 'adUpdate',
        'create' => 'adCreate',
        'edit' => 'adEdit',
    ]);;
    Route::resource('user', AdminUserController::class);
    Route::resource('role', UserRoleController::class);
    Route::resource('comment', AdminCommentController::class);
    Route::get('/main', [AdminController::class, 'main'])->name('adminmain');
});


