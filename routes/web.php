<?php

use App\Models\User;
use Illuminate\Auth\Events\PasswordReset;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Password;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\admin\OrdersController;
use App\Http\Controllers\admin\menuController;
use App\Http\Controllers\frontend\CartController;
use App\Http\Controllers\frontend\UserController;
use App\Http\Controllers\admin\FrontendController;
use App\Http\Controllers\frontend\FrontController;
use App\Http\Controllers\admin\DashboardController;
use App\Http\Controllers\frontend\RatingController;
use App\Http\Controllers\frontend\ReviewController;
use App\Http\Controllers\admin\CategoriesController;
use App\Http\Controllers\frontend\CheckoutController;
use App\Http\Controllers\frontend\WishlistController;
use Illuminate\Foundation\Auth\EmailVerificationRequest;
use Illuminate\Http\Request;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RoutemenuProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

//Route::get('/', function () {
    //return view('welcome');
//});
Route::get('/email/verify', function () {
    return view('auth.verify');
})->middleware('auth')->name('verification.notice');

Route::get('/', [FrontController::class, 'index']);
Route::get('/about-us', [FrontController::class, 'about']);

Route::get('/view-categories', [FrontController::class, 'categories']);
Route::get('/view-categories/{slug}', [FrontController::class, 'viewcategories']);
Route::get('/view-categories/{cate_slug}/{menu_slug}', [FrontController::class, 'viewmenu']);

Route::get('/menu-list', [FrontController::class, 'menuajax']);
Route::post('/search-menu', [FrontController::class, 'search']);


Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home')->middleware('verified');

//Route::group(['middleware' => ['auth','isAdmin']], function () {
//    Route::get('/dashboard', function () {
//       return view('admin.dashboard');
//    });
//});

Route::middleware( ['auth','isAdmin', 'verified'])->group(function () {
    Route::get('/dashboard', [FrontendController::class, 'index']);

    route::get('categories', [CategoriesController::class, 'index']);
    route::get('add-categories', [CategoriesController::class, 'add']);
    route::post('insert-categories', [CategoriesController::class, 'insert']);
    route::get('edit-categories/{id}', [CategoriesController::class, 'edit']);
    route::get('delete-categories/{id}', [CategoriesController::class, 'destroy']);
    route::put('update-categories/{id}', [CategoriesController::class, 'update']);

    route::get('menu', [menuController::class, 'index']);
    route::get('add-menu', [menuController::class, 'add']);
    route::post('insert-menu', [menuController::class, 'insert']);
    route::get('edit-menu/{id}', [menuController::class, 'edit']);
    route::get('delete-menu/{id}', [menuController::class, 'destroy']);
    route::put('update-menu/{id}', [menuController::class, 'update']);

    route::get('users-list', [FrontController::class, 'users']);

    route::get('orders-list', [OrdersController::class, 'index']);
    route::get('admin/view-order/{id}', [OrdersController::class, 'view']);
    route::put('update-order/{id}', [OrdersController::class, 'update']);
    route::get('order-history', [OrdersController::class, 'history']);

    route::get('users-list', [DashboardController::class, 'users']);
    route::get('view-users/{id}', [DashboardController::class, 'view']);

    route::get('chat', [DashboardController::class, 'chat']);
    route::get('add-chat', [DashboardController::class, 'addchat']);
    route::post('insert-chat', [DashboardController::class, 'insertchat']);
    route::get('edit-chat/{id}', [DashboardController::class, 'editchat']);
    route::get('delete-chat/{id}', [DashboardController::class, 'destroychat']);
    route::put('update-chat/{id}', [DashboardController::class, 'updatechat']);

});





Route::middleware( ['auth', 'verified'])->group(function () {
    route::get('cart', [CartController::class, 'viewCart']);
    route::post('add-to-cart', [CartController::class, 'addCart']);
    route::post('delete-cart-item', [CartController::class, 'deleteitem']);
    route::post('update-cart', [CartController::class, 'updateitem']);
    route::get('load-cart-count', [CartController::class, 'cartcount']);

    route::post('add-to-wishlist', [WishlistController::class, 'addwish']);
    route::post('delete-wishlist-item', [WishlistController::class, 'deleteitem']);
    route::get('load-wishlist-count', [WishlistController::class, 'wishlistcount']);

    route::get('checkout', [CheckoutController::class, 'index']);
    route::post('order', [CheckoutController::class, 'order']);

    route::get('my-order', [UserController::class, 'index']);
    route::get('view-order/{id}', [UserController::class, 'view']);

    route::get('wishlist', [WishlistController::class, 'index']);
    route::get('review/{menu_slug}/user-review', [ReviewController::class, 'add']);
    route::post('review/', [ReviewController::class, 'create']);
    route::get('edit-review/{menu_slug}/user-review', [ReviewController::class, 'edit']);
    route::put('update-review', [ReviewController::class, 'update']);
    route::get('model/{id}', [FrontController::class, 'model']);
    
    route::post('proceed-to-pay', [CheckoutController::class, 'gopay']);

    route::post('rating', [RatingController::class, 'add']);
    route::get('chatbot', [UserController::class, 'chatbot']);
    route::post('/chat-process', [UserController::class, 'chatprocess']);
});
