<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\user\AuthController as user;
use App\Http\Controllers\user\DoctorsController as users;
use App\Http\Controllers\user\PharmacyController;
use App\Http\Controllers\user\OfferController;
use App\Http\Controllers\admin\AuthController;
use App\Http\Controllers\user\ReservationController;
use App\Http\Controllers\user\profileContrpller;
use App\Http\Controllers\user\ReportAproblemController;
/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/
//==============//_______________________________________________________________________________________________
Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
    });
    //user login//_________________________________________________________________________________________________
    Route::post('register',        [user::class,'register']);
    Route::post('login',           [user::class,'login']);
    Route::post('logout',          [user::class,'logout']);
    Route::post('forgotPass',      [user::class,'forgotPassword']);
    //admin login//________________________________________________________________________________________________
    Route::post('/login-admin',    [AuthController::class, 'login']);
    Route::post('/register-admin', [AuthController::class, 'register']);
    Route::group(['middleware' =>   ['auth:sanctum', 'auth.admin']], function () {
    Route::post('/logout-admin',   [AuthController::class, 'logout']);
    });
    //______________________________________________________________________________________________________________
    Route::group(['middleware'=> ['auth:sanctum']], function () {
    //doctors//_____________________________________________________________________________________________________
    Route::get('index',             [users::class,'index']);
    Route::get('show/{id}',         [users::class,'show']);
    Route::post('gitCity',          [users::class,'gitCity']);
    Route::post('gitspecialization',[users::class,'gitspecialization']);
    //pharmacies//__________________________________________________________________________________________________
    Route::get('index-pharmacy',      [PharmacyController::class,'index']);
    Route::get('show-pharmacy/{id}',  [PharmacyController::class,'show']);
    //offer//________________________________________________________________________________________________________
    Route::get('index-offer',         [OfferController::class,'index']);
    Route::get('show-offer/{id}',     [OfferController::class,'show']);
    //Reservations//__________________________________________________________________________________________________
    Route::get('index-rservation',          [ReservationController::class, 'index']);
    Route::post('store-rservation',         [ReservationController::class, 'store']);
    Route::get('show-rservation/{id}',      [ReservationController::class, 'show']);
    Route::post('update-rservation/{id}',   [ReservationController::class, 'update']);
    Route::delete('destroy-rservation/{id}',[ReservationController::class, 'destroy']);
    //userinfo//________________________________________________________________________________________________________
    
    Route::get('index-profile',              [profileContrpller::class, 'index']);
    Route::post('change-profile',            [profileContrpller::class, 'changepassword']);
    Route::post('update-profile/{id}',       [profileContrpller::class, 'update']);
    //problem//_____________________________________________________________________________________________________________
    
    Route::get('index-problem',          [ReportAproblemController::class, 'index']);
    Route::post('store-problem',         [ReportAproblemController::class, 'store']);
    Route::get('show-problem/{id}',      [ReportAproblemController::class, 'show']);
    Route::post('update-problem/{id}',   [ReportAproblemController::class, 'update']);
    Route::delete('destroy-problem/{id}',[ReportAproblemController::class, 'destroy']);
    //_________________________________________________________________________________________________________________________
});

