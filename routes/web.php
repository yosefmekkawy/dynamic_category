<?php

use App\Http\Controllers\CategoryController;
use App\Http\Controllers\ProductController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LoginController;
use Illuminate\Support\Facades\Auth;
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

// Start of Auth Routes

Route::get('/login',function (){
    return view('auth.login');
});

Route::post('/login',[LoginController::class,'login'])->name('login');

Route::post('/logout', function (){
    Auth::logout();
    return redirect('/login');
})->name('logout');

// end of Auth Routes

Route::resources([
    'products' => ProductController::class,
    'categories'=>CategoryController::class,
]);


