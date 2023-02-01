<?php

use Illuminate\Support\Facades\Route ;
use App\Http\Controllers\AdminController ;
use App\Http\Controllers\ProductsController ;

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
    return view('login');
});

//Admin Login
Route::get('/sign-in', [AdminController::class, 'sign_in']);

Route::post('/login', [AdminController::class, 'login']);

Route::get('/sign-up', [AdminController::class, 'sign_up']);

Route::post('/sign-up-new-user', [AdminController::class, 'signUpNewUser']);
 
Route::get('/logout', [AdminController::class, 'logout']);

Route::get('/dashboard', [AdminController::class, 'dashboard']);

Route::get('/getAllUsers', [AdminController::class, 'getAllUsers']);

// Products Routes
Route::get('/getAllProducts', [ProductsController::class, 'getAllProducts']);

Route::get('/add-product', [ProductsController::class, 'addProduct']);

Route::post('/product-details-add', [ProductsController::class, 'addProductDetails']);

Route::get('/removeProduct/{id}', [ProductsController::class, 'removeProduct']);

Route::get('/editProduct/{id}', [ProductsController::class, 'getSingleProductDetails']);

Route::post('/product-details-edit', [ProductsController::class, 'editProductDetails']);

Route::post('/addToCrt', [ProductsController::class, 'addtoCart']);

Route::get('/my-cart', [ProductsController::class, 'myCart']);

Route::get('/removeProductFromCart/{id}', [ProductsController::class, 'removeProductFromCart']);