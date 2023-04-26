<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\DropdownController;
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

Route::get('/', function () {
    return view('welcome');
});

Route::get('admin/login', [AuthController::class, 'showAdmin'])->name('admin.login')->middleware(['guest']);
Route::post('admin/login', [AuthController::class, 'authenticateAdmin']);


Route::get('login', [AuthController::class, 'show'])->name('login')->middleware(['guest']);
Route::post('login', [AuthController::class, 'authenticate']);
Route::get('register', [AuthController::class, 'showRegister'])->name('register');
Route::post('register', [AuthController::class, 'createUser']);

Route::get('logout', [AuthController::class, 'show'])->name('logout')->middleware(['auth']);

Route::prefix('admin')->middleware(['admins'])->group(function () {
    Route::get('/',  [AdminController::class, 'show'])->name('admin.dashboard');
    Route::get('/hostels',  [AdminController::class, 'hostels'])->name('admin.hostels');
});

Route::middleware(['auth'])->group(function () {
    Route::get('/dashboard',  [DashboardController::class, 'show'])->name('dashboard');
    Route::get('/reserve',  [DashboardController::class, 'reserve'])->name('reserve');
    Route::get('/checkout',  [DashboardController::class, 'checkout'])->name('checkout');
    Route::get('/hostel/{hostel}',  [DropdownController::class, 'hostel'])->name('hostel');
    Route::get('/floor/{floor}',  [DropdownController::class, 'floor'])->name('floor');
    Route::get('/room/{room}',  [DropdownController::class, 'room'])->name('room');
});