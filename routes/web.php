<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\GameController;
use App\Http\Controllers\DeveloperController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\CartController;
use App\Http\Controllers\CheckoutController;
use App\Http\Controllers\AuthController;

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

Auth::routes();

Route::get('/', [HomeController::class, 'index'])->name('home');
Route::get('/about-us', [HomeController::class, 'aboutUs']);

Route::get('/admin', [DashboardController::class, 'index'])->middleware(['admin']);

Route::get('/admin/games', [GameController::class, 'index'])->middleware(['admin']);
Route::get('/admin/games/create', [GameController::class, 'create'])->middleware(['admin']);
Route::post('/admin/games/create', [GameController::class, 'store'])->middleware(['admin']);
Route::get('/admin/games/edit/{id}', [GameController::class, 'edit'])->middleware(['admin']);
Route::post('/admin/games/edit/{id}', [GameController::class, 'update'])->middleware(['admin']);
Route::delete('/admin/games/delete/{id}', [GameController::class, 'destroy'])->middleware(['admin']);

Route::get('/admin/developers', [DeveloperController::class, 'index'])->middleware(['admin']);
Route::get('/admin/developers/create', [DeveloperController::class, 'create'])->middleware(['admin']);
Route::post('/admin/developers/create', [DeveloperController::class, 'store'])->middleware(['admin']);
Route::get('/admin/developers/edit/{id}', [DeveloperController::class, 'edit'])->middleware(['admin']);
Route::post('/admin/developers/edit/{id}', [DeveloperController::class, 'update'])->middleware(['admin']);
Route::delete('/admin/developers/delete/{id}', [DeveloperController::class, 'destroy'])->middleware(['admin']);

Route::get('/admin/categories', [CategoryController::class, 'index'])->middleware(['admin']);
Route::get('/admin/categories/create', [CategoryController::class, 'create'])->middleware(['admin']);
Route::post('/admin/categories/create', [CategoryController::class, 'store'])->middleware(['admin']);
Route::get('/admin/categories/edit/{id}', [CategoryController::class, 'edit'])->middleware(['admin']);
Route::post('/admin/categories/edit/{id}', [CategoryController::class, 'update'])->middleware(['admin']);
Route::delete('/admin/categories/delete/{id}', [CategoryController::class, 'destroy'])->middleware(['admin']);


// Mohon dirapikan ini temporary
Route::get('/game/{id}', [GameController::class, 'details']);
Route::get('/store', [GameController::class, 'showGame']);
Route::get('/store/{id}', [GameController::class, 'showGameBasedOnCategory']);
// Route::get('/sign-in', [HomeController::class, 'signIn']);
Route::post('/login', [AuthController::class, 'logIn'])->middleware(['guest']);
Route::post('/register', [AuthController::class, 'register'])->middleware(['guest']);
Route::post('/logout', [AuthController::class, 'logOut'])->middleware(['auth']);
Route::post('/add-cart', [CartController::class, 'store'])->middleware(['auth']);

Route::get('/cart', [CartController::class, 'index'])->middleware(['auth']);
Route::post('/checkout', [CheckoutController::class, 'store'])->middleware(['auth']);
Route::get('/library', [GameController::class, 'showLibrary'])->middleware(['auth']);
Route::get('/profile', [AuthController::class, 'showProfile'])->middleware(['auth']);
Route::get('/update-profile', [AuthController::class, 'updateProfile'])->middleware(['auth']);
Route::post('/update-profile', [AuthController::class, 'saveProfile'])->middleware(['auth']);

