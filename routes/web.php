<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\AuthController;
use App\Http\Controllers\FooditemController;
use App\Http\Controllers\ShopifyController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\RestaurentController;
use App\Http\Controllers\EmailController;
use App\Http\Controllers\VehicleController;
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
Route::get('login', [AuthController::class, 'index'])->name('login');
Route::post('post-login', [AuthController::class, 'postLogin'])->name('login.post');

Route::get('registration', [AuthController::class, 'registration'])->name('register');
Route::post('post-registration', [AuthController::class, 'postRegistration'])->name('register.post');

Route::get('dashboard', [AuthController::class, 'dashboard']);
Route::get('logout', [AuthController::class, 'logout'])->name('logout');


Route::get('/dashboard', [FooditemController::class, 'index'])->name('fooditems.index');
Route::resource('fooditems', FooditemController::class)->except(['index']);
Route::get('/get-shopify-products', [ShopifyController::class, 'getProducts']);

// Route::resource('dashboard', FooditemController::class);


//products
Route::get('/productscreate', [ProductController::class, 'createproducts'])->name('products.create');
Route::post('/productsstore', [ProductController::class, 'store'])->name('products.store');
// Route::get('/productsshow', [ProductController::class, 'productsshow'])->name('products.show');





//returent'
// Route::get('/viewrestaurent', [ProductController::class, 'viewrestaurent']);


Route::get('/restaurents', [RestaurentController::class, 'index'])->name('restaurents.index');



Route::get('/restaurants', [RestaurentController::class, 'index'])->name('restaurants.index');
Route::get('/restaurants/{id}', [RestaurentController::class, 'show'])->name('restaurants.show');
//end returent

Route::get('/mailform', [ProductController::class, 'mailview']);
Route::post('/mailsend', [ProductController::class, 'mailsend'])->name('mail.send');


//
Route::get('/send-email', [EmailController::class, 'index']);
//



Route::get('/insert-data', [VehicleController::class, 'login']);
Route::post('/insert-data', [VehicleController::class, 'logincheck'])->name('mylogin.form');
Route::get('/fetch-data', [VehicleController::class, 'fetchData']);

// routes/web.php  'mylogin.form

// routes/web.php

// Route::post('/authenticate', 'AuthController@authenticate');
