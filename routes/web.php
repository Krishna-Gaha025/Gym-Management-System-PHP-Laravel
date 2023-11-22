<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\StoreController;
use App\Http\Controllers\EquipmentController;
use App\Http\Controllers\MemberController;
use App\Http\Controllers\StaffController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\AuthController1;
use App\Http\Controllers\AdvertisementController;

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


Route::middleware(['loginCheck'])->group(function (){
// -------------------------Admin Store---------------------------
Route::get('/admin/store', [StoreController::class, 'view']);
Route::get('/admin/store/view/{id}', [StoreController::class, 'show']);
Route::put('/admin/store/update/{id}', [StoreController::class, 'update']);
Route::post('/admin/store/insert', [StoreController::class, 'store']);
Route::get('/admin/store/delete/{id}', [StoreController::class, 'destroy']);
Route::get('/admin/store/force-delete/{id}', [StoreController::class, 'forceDestroy']);
Route::get('/admin/trash/restore/{id}', [StoreController::class, 'restore']);
//-----------------------------------------------------------

// ------------------------Admin Equipments----------------------
Route::get('/admin/equipment', [EquipmentController::class, 'view']);
Route::post('/admin/equipment/insert', [EquipmentController::class, 'store']);
Route::get('/admin/equipment/delete/{id}', [EquipmentController::class, 'delete']);
// --------------------------------------------------------------

// -------------------------Admin Staff----------------------
Route::get('/admin/staff', [StaffController::class, 'view']);
Route::get('/admin/staff/view/{id}', [StaffController::class, 'show']);
Route::post('/admin/staff/insert', [StaffController::class, 'store']);
Route::put('/admin/staff/update/{id}', [StaffController::class, 'update']);
Route::get('/admin/staff/delete/{id}', [StaffController::class, 'destroy']);
Route::get('/admin/trash', [StaffController::class, 'trash']); //Trashes from Store and Staff tables
// ---------------------------------------------------------------

// -------------------------Admin Advertisement-------------------
Route::get('/admin/advertisement', [AdvertisementController::class, 'view']);
Route::post('/admin/advertisement/insert', [AdvertisementController::class, 'store']);
// ---------------------------------------------------------------

// -------------------------Admin Dashboard----------------------
Route::get('/admin', [DashboardController::class, 'transaction']);
// ---------------------------------------------------------------
});

// -------------------------Admin Login----------------------
Route::middleware(['afterlogin'])->group(function (){
Route::get('/admin/login', [AuthController::class, 'view']);
Route::post('/admin/check', [AuthController::class, 'login']);
});
Route::get('/admin/logout', [AuthController::class, 'logout']);
// ---------------------------------------------------------------


// ----------------------------------------------------------------------------------------------------------
// ----------------------------------------------------------------------------------------------------------
// ----------------------------------------------------------------------------------------------------------


Route::middleware(['memberLoginCheck'])->group(function(){
// ---------------------------Member Home-----------------------------
Route::get('/home', [MemberController::class, 'index']);
Route::get('/home/view/{id}', [MemberController::class, 'view']);
Route::post('/home/buy/{id}', [MemberController::class, 'buy']);
Route::get('/home/hire/{id}', [MemberController::class, 'hire']);
Route::get('/home/hire/cancel/{id}', [MemberController::class, 'cancelHire']);
Route::get('/home/profile/{id}', [MemberController::class, 'profile']);
Route::put('/home/profile/update', [AuthController1::class, 'update']);
Route::get('/home/epay',[AuthController1::class, 'epay']);
// -------------------------------------------------------------------
});


Route::middleware(['memberAfterlogin'])->group(function(){
// ---------------------Member Login/Registration--------------------
Route::get('/',[AuthController1::class, 'view']);
Route::post('/login',[AuthController1::class, 'login']);
Route::get('/signup',[AuthController1::class, 'create']);
Route::post('/signup/register',[AuthController1::class, 'register']);
});
Route::get('/logout',[AuthController1::class, 'logout']);
// ------------------------------------------------------------------


Route::get('get-all-session', function () {
    $session = session()->all();
    echo '<pre>';
    print_r($session);
    echo '</pre>';
});
