<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\MedicineController;
use App\Http\Controllers\TransactionController;

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

Route::get("/", [UserController::class, 'showHomepage'])->name('login');
Route::get("/register", [UserController::class, 'showRegisterPage'])->middleware('guest');
Route::post("/register", [UserController::class, 'register'])->middleware('guest');
Route::post("/login", [UserController::class, 'login'])->middleware('guest');
Route::get("/logout", [UserController::class, 'logout'])->middleware('auth');

// Medicine Route
Route::get("/medicines", [MedicineController::class, 'showMedicinePage'])->middleware('auth', 'onlyAdmin');
Route::get("/add-medicine", [MedicineController::class, 'showAddMedicine'])->middleware('auth', 'onlyAdmin');
Route::post("/add-medicine", [MedicineController::class, 'addMedicine'])->middleware('auth', 'onlyAdmin');
Route::get("/medicine/{medicine}", [MedicineController::class, 'getAMedicine'])->middleware('auth', 'onlyAdmin');
Route::get("/medicine/{medicine}/edit", [MedicineController::class, 'showEditMedicine'])->middleware('auth', 'onlyAdmin');
Route::patch("/medicine/{medicine}/edit", [MedicineController::class, 'editAMedicine'])->middleware('auth', 'onlyAdmin');
Route::delete("/medicine/{medicine}", [MedicineController::class, 'deleteAMedicine'])->middleware('auth', 'onlyAdmin');
Route::get("/search/{keyword}", [MedicineController::class, 'searchMedicine'])->middleware('auth');

// Transaction Route
Route::get("/transactions", [TransactionController::class, 'showTransactionPage'])->middleware('auth');
Route::post("/add-transaction", [TransactionController::class, 'addTransaction'])->middleware('auth');
Route::delete("/transactions/{transaction}", [TransactionController::class, 'deleteTransaction'])->middleware('auth', 'can:delete,transaction');