<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\SliderController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\VerificationController;
use App\Http\Controllers\UserController;

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


Route::get("/", [HomeController::class,"index"]);
Route::get("/about", [HomeController::class,"about"]);
Route::get("/alumni", [HomeController::class,"alumni"]);
Route::get("/contact", [HomeController::class,"contact"]);
Route::get("/mahasiswa", [HomeController::class,"mahasiswa"]);
Route::get("/profil", [HomeController::class,"profil"]);
Route::get("/services", [HomeController::class,"services"]);

//auth
Route::get("/login", [AuthController::class,"login"])->name('login');
Route::get("register", [AuthController::class,"register"])->name('register');
Route::post("register", [AuthController::class,"create_user"])->name('create-user');
Route::post("/login", [AuthController::class,"authenticated"]);
Route::get("/logout", [AuthController::class,"logout"]);


//dashboard
Route::get('dashboard', [DashboardController::class, 'index'])->middleware('auth');

Route::resource('sliders', SliderController::class) ->middleware('auth');


Route::get('/verify/{token}', [VerificationController::class, 'verify'])->name('verify');

Route::get('/users', [UserController::class, 'showUsers'])->name('users.index');
Route::get('/users', [UserController::class, 'showUsers'])->name('users.index');
Route::get('/users/delete/{id}', [UserController::class, 'deleteUser'])->name('users.delete');
