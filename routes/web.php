<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\SwapController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\ApiUserController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\BilanganController;
use App\Http\Controllers\RegisterController;

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

// Route::get('/', function () {
//     return view('welcome');
// });

Route::get('/dashboard', function () {
    return view('dashboard.index');
})->name('dashboard')->middleware('auth');

Route::get('/', [LoginController::class, 'login'])->name('login');
Route::post('/signin', [LoginController::class, 'execlogin'])->name('execlogin');
Route::post('/logout', [LoginController::class, 'logout'])->name('logout');

// Route::get('/login', [LoginController::class, 'login'])->name('login');
Route::get('/form-register', [RegisterController::class, 'FormRegister'])->name('form-register');
Route::post('/register', [RegisterController::class, 'register'])->name('register');

Route::resource('/user', UserController::class);
Route::resource('/user-api', ApiUserController::class);
Route::get('/api', [ApiUserController::class, 'get_user'])->name('get-user');

Route::get('/swap-index', [SwapController::class, 'index'])->name('swap-index');
Route::post('/swap-exec', [SwapController::class, 'exec'])->name('swap-exec');

Route::get('/bilangan', [BilanganController::class, 'index'])->name('bilangan');
Route::post('/bilangan-exec', [BilanganController::class, 'exec'])->name('bilangan-exec');

Route::get('/product', [ProductController::class, 'index'])->name('product');
Route::post('/result-product', [ProductController::class, 'result'])->name('result-product');