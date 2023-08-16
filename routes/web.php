<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\MedicineController;

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

Route::get("/", [UserController::class, 'showHomepage']);
Route::get("/register", [UserController::class, 'showRegisterPage']);
Route::post("/register", [UserController::class, 'register']);
Route::post("/login", [UserController::class, 'login']);
Route::get("/logout", [UserController::class, 'logout']);

// Medicine Route
Route::get("/medicines", [MedicineController::class, 'showMedicinePage']);
Route::get("/add-medicine", [MedicineController::class, 'showAddMedicine']);
Route::post("/add-medicine", [MedicineController::class, 'addMedicine']);