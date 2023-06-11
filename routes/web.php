<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LandingPage\HomeController;
use App\Http\Controllers\Auth\RazenStyle\LoginController;

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

// Route::get('/', function () {
//     return view('welcome');
// });

// Auth::routes();

// Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Auth::routes(['register' => false, 'login' => false]);

Route::get('/', [HomeController::class, 'beranda'])->name('beranda');
Route::get('/perusahaan', [HomeController::class, 'perusahaan'])->name('perusahaan');
Route::get('/produk', [HomeController::class, 'produk'])->name('produk');
Route::get('/kontak', [HomeController::class, 'kontak'])->name('kontak');

Route::get('/login',[LoginController::class, 'showLoginForm'])->name('razen-style.login');
Route::post('/login', [LoginController::class, 'login'])->name('razen-style.login.submit');
Route::get('/logout', [LoginController::class, 'logout'])->name('razen-style.logout');

Route::group(['middleware' => 'auth:razen_style'], function(){
    @include('razen-style.php');
});
