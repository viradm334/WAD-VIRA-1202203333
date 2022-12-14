<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CustomAuthController;

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
    return view('home');
});
Route::get('/login', [CustomAuthController::class, 'login']);
Route::get('/register', [CustomAuthController::class, 'register']);
Route::post('/register-user', [CustomAuthController::class, 'registerUser'])->name('register-user');
Route::post('/login-user', [CustomAuthController::class, 'loginUser'])->name('login-user');
Route::get('/home', [CustomAuthController::class, 'home']);
Route::get('/addcar', [CustomAuthController::class, 'addcar']);
Route::post('/add-car', [CustomAuthController::class, 'addNewCar'])->name('add-car');
Route::get('/profile', [CustomAuthController::class, 'profile']);
Route::post('/edit-profile', [CustomAuthController::class, 'editProfile'])->name('edit-profile');
Route::get('/cardetail/{id}', [CustomAuthController::class, 'carDetail']);
Route::post('/edit-detail/{id}', [CustomAuthController::class, 'editDetail'])->name('edit-detail');
Route::post('/delete/{id}', [CustomAuthController::class, 'delete'])->name('delete');
Route::get('/listcar', [CustomAuthController::class, 'listcar']);
Route::get('/logout', [CustomAuthController::class, 'logout']);
