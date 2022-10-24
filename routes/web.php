<?php

use App\Http\Controllers\AdController;
use App\Http\Controllers\Admin\AdmCityController;
use App\Http\Controllers\Admin\AdminController;
use App\Http\Controllers\Admin\CategoryController;
use App\Http\Controllers\Admin\AdController as AdminAdController;
use App\Http\Controllers\Admin\AdminChatController;
use App\Http\Controllers\Admin\CommentController as AdminCommentController;
use App\Http\Controllers\Admin\SysController;
use App\Http\Controllers\Admin\UserRoleController;
use App\Http\Controllers\AdUserFavorites;
use App\Http\Controllers\ChatController;
use App\Http\Controllers\CityController;
use App\Http\Controllers\PaymentController;
use App\Http\Controllers\PaymentYookassaController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\Admin\UserController as AdminUserController;
use App\Http\Controllers\ComplainController;
use App\Http\Controllers\MainController;
use App\Http\Controllers\SearchController;
use App\Http\Controllers\UserProfileController;
use App\Http\Controllers\WishlistController;
use App\Http\Middleware\isAdmin;
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
    return view('about');
})->name('about');

Route::get('/', [MainController::class, 'index'])->name('home');
Route::get('/payment', [MainController::class, 'payment'])->name('payment');
Route::get('/search', [SearchController::class, 'index'])->name('searchPage');
Route::post('/search', [SearchController::class, 'search'])->name('search');
Route::resource('ad', AdController::class);
Route::get('/getcities', [CityController::class, 'getAllCitiesByRegion']);
Route::get('/getregions', [CityController::class, 'getRegions']);
Route::post('/setcity', [CityController::class, 'setUserCity']);

Route::group(['middleware' => 'auth'], function () {  //for authorized users
    Route::get('/logout', [UserController::class, 'logout'])->name('logout');
    Route::controller(UserProfileController::class)->group(function () {
        Route::get('/personal', 'index')->name('user.profile'); // Personal area - main page
        Route::get('/createAd', 'createAd')->name('user.profile.createAd'); // Personal area - create ad
        Route::get('/listAds', 'listAds')->name('user.profile.listAds'); // Personal area - view all ads for autorized user
        Route::get('/editAd', 'editAd')->name('user.profile.editAd'); // Personal area - edit ad
        Route::get('/publicInfo/{id}', 'publicInfo')->name('user.public'); // Users public info
        Route::get('/yourwishlist', 'wishlist')->name('user.wishlist'); // Users public info
        Route::get('/yourfavoritelist', 'favoriteList')->name('user.favoritelist'); // Users public info
        Route::get('personalData', 'personalData')->name('user.profile.personalData'); //Personal area - view and edit personal data
        Route::get('resetPassword', 'resetPassword')->name('user.profile.resetPassword'); //Personal area - reset password
        Route::get('/rateUser/{id}', 'rateUser')->name('user.profile.rateUser')->middleware('userCanRateAnotherUser');
    });

    Route::post('/wishlist/store', [WishlistController::class, 'store'])->name('wishlist.store');
    Route::delete('/wishlist/destroy/{ad_id}', [WishlistController::class, 'destroy'])->name('wishlist.destroy');

    Route::resource('favorite', AdUserFavorites::class);
    Route::post('chatFormAd', [ChatController::class, 'chatFormAd'])->name('chat.from.ad');
    Route::post('storeAdComplain', [ChatController::class, 'storeAdComplain'])->name('storeAdComplain');
    Route::post('storeUserComplain', [ChatController::class, 'storeUserComplain'])->name('storeUserComplain');
    Route::post('storeSupportTicket', [ChatController::class, 'storeSupportTicket'])->name('storeSupportTicket');
    Route::resource('chat', ChatController::class);
    //--PayPal
    Route::post('/payment', [PaymentController::class,'payWithpaypal'])->name('payment');
    Route::get('/payment/status',[PaymentController::class, 'getPaymentStatus'])->name('status');
    //---- YooKassa
    Route::get('/payments',[PaymentYookassaController::class, 'index'])->name('payment.form.yookassa');
    Route::post('/payments',[PaymentYookassaController::class, 'create'])->name('payment.create.yookassa');

});
Route::post('/payments/callback',[PaymentYookassaController::class, 'callback'])->name('payment.callback.yookassa');

Route::group(['middleware' => 'guest'], function () { //for not authorized users
    Route::post('/auth', [UserController::class, 'login'])->name('auth');
    Route::post('/registration', [UserController::class, 'registration'])->name('registration');
    Route::get('/login', [UserController::class, 'index'])->name('loginPage');

//--------------
    Route::post('/forgot-password', [UserController::class, 'forgotpassword'])->name('password.email');
    Route::post('/reset-password', [UserController::class, 'passwordUpdate'])->name('password.update');

    Route::get('/forgot-password', function () {
        return view('forgetPassword');
    })->name('password.request');

    Route::get('/reset-password/{token}', function ($token) {
        return view('passwordReset', ['token' => $token]);
    })->name('password.reset');


});

Route::group(['middleware' => ['auth', 'isUserBlocked']], function () {  //for authorized users

    Route::controller(UserController::class)->group(function () {
        Route::get('/logout', 'logout')->name('logout');
        Route::put('/updateUserData', 'updateUserData')->name('user.updateUserData');
        Route::put('/updateUserPassword', 'updateUserPassword')->name('user.updateUserPassword');
        Route::put('/updateUserRating', 'updateUserRating')->name('user.updateUserRating');
    });

    Route::controller(UserProfileController::class)->group(function () {
        Route::get('/personal', 'index')->name('user.profile'); // Personal area - main page
        Route::get('/createAd', 'createAd')->name('user.profile.createAd'); // Personal area - create ad
    });

    Route::controller(ComplainController::class)->group(function () {
        Route::get('/complainAd/{id}', 'createAdComplain')->name('complainAd');
        Route::get('/complainUser/{id}', 'createUserComplain')->name('complainUser');
        Route::get('/getSupport', 'createSupportTicket')->name('getSupport');
    });
});

Route::group(['prefix' => 'admin', 'middleware' => ['isAdmin', 'isUserBlocked']], function () {
    Route::resource('category', CategoryController::class);
    Route::resource('ad', AdminAdController::class)->names([
        'index' => 'adIndex',
        'show' => 'adShow',
        'store' => 'adStore',
        'destroy' => 'adDestroy',
        'update' => 'adUpdate',
        'create' => 'adCreate',
        'edit' => 'adEdit',
    ])->withoutMiddleware([isAdmin::class])->middleware('isModerator');
    Route::resource('user', AdminUserController::class);
    Route::resource('role', UserRoleController::class);
    Route::resource('comment', AdminCommentController::class);

    Route::get('adminChat', [AdminChatController::class, 'index'])->name('adminChat')
        ->withoutMiddleware([isAdmin::class])
        ->middleware('isModerator');
    Route::get('/main', [AdminController::class, 'main'])->name('adminmain')
        ->withoutMiddleware([isAdmin::class])
        ->middleware('isModerator');
    Route::get('/system', [SysController::class, 'index'])->name('admin.system')
        ->withoutMiddleware([isAdmin::class])->middleware('isDeveloper');
    Route::get('/system/action/{action}', [SysController::class, 'action'])->name('admin.system.action')
        ->withoutMiddleware([isAdmin::class])->middleware('isDeveloper');

    Route::controller(AdmCityController::class)->group(function () {
        Route::get('/cities', 'getAllCities')->name('admin.cities');
        Route::get('/regions', 'getAllRegions')->name('admin.regions');
        Route::post('/city', 'storeCity')->name('admin.city.store');
        Route::delete('/city/{id}', 'destroyCity')->name('admin.city.destroy');
        Route::put('/city/{id}', 'updateCity')->name('admin.city.update');
    });


});
