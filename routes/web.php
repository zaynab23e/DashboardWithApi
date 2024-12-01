<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\routeecontroller;
use App\Http\Controllers\admin\DoctorsController;
use App\Http\Controllers\admin\PharmaciesController;
use App\Http\Controllers\admin\OffersController;
use App\Http\Controllers\admin\AdminLogin;
use App\Http\Controllers\admin\ReservationController;
use App\Http\Controllers\admin\CityController;
use App\Http\Controllers\admin\SpecialtiesContrpller;
use App\Http\Controllers\admin\problemController;
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

Route::get('admin/login',[AdminLogin::class,'Loginform'])->name('login');
Route::post('admin/login',[AdminLogin::class,'login'])->name('loginUser');

Route::group(['middleware'=> ['auth.admin']], function () {

// Route::resource('/admin',DoctorsController::class);___________________________________________________________________________
Route::get('/admin/dash',                   [AdminLogin::class,'dash'])->              name('admin.dash');
Route::get('/admin/doctors/index',          [DoctorsController::class,'index'])->      name('admin.doctors.index');
Route::get('/admin/doctors/create',         [DoctorsController::class,'create'])->     name('admin.doctors.create');
Route::post('/admin/doctors',               [DoctorsController::class,'store'])->      name('admin.doctors.store');
Route::get('/admin/doctors/show/{id}',      [DoctorsController::class, 'show'])->      name('admin.doctors.show');
Route::get('/admin/doctors/edit/{id}',      [DoctorsController::class, 'edit'])->      name('admin.doctors.edit');
Route::put('/admin/doctors/update/{id}',    [DoctorsController::class, 'update'])->    name('admin.doctors.update');
Route::delete('/admin/doctors/delete/{id}', [DoctorsController::class, 'destroy'])->   name('admin.doctors.delete');

//Pharmacies_____________________________________________________________________________________________________________________

Route::get('/admin/Pharmacies/index',          [PharmaciesController::class,'index'])->  name('Pharmacies');
Route::get('/admin/Pharmacies/create',         [PharmaciesController::class,'create'])-> name('Pharmacies.create');
Route::post('/admin/Pharmacies/store',         [PharmaciesController::class,'store'])->  name('Pharmacies.store');
Route::get('/admin/Pharmacies/show/{id}',      [PharmaciesController::class,'show'])->   name('Pharmacies.show');
Route::get('/admin/Pharmacies/edit/{id}',      [PharmaciesController::class,'edit'])->   name('Pharmacies.edit');
Route::put('/admin/Pharmacies/update/{id}',    [PharmaciesController::class, 'update'])->name('Pharmacies.update');
Route::delete('/admin/Pharmacies/delete/{id}', [PharmaciesController::class,'destroy'])->name('Pharmacies.delete');

//offerController________________________________________________________________________________________________________________

Route::get('/admin/offer/index',               [OffersController::class,'index'])->     name('offers.index');
Route::get('/admin/offer/create',              [OffersController::class,'create'])->    name('offers.create');
Route::post('/admin/offer/store',              [OffersController::class,'store'])->     name('offers.store');
Route::get('/admin/offer/show/{id}',           [OffersController::class,'show'])->      name('offers.show');
Route::get('/admin/offer/edit/{id}',           [OffersController::class,'edit'])->      name('offers.edit');
Route::put('/admin/offer/update/{id}',         [OffersController::class, 'update'])->   name('offers.update');
Route::delete('/admin/offer/delete/{id}',      [OffersController::class,'destroy'])->   name('offers.delete');

//login admin _____________________________________________________________________________________________________________________________________

Route::get('admin/logout',[AdminLogin::class,'logout'])->name('logout');

//Reservation//_____________________________________________________________________________________________________________________________________

Route::get('/admin/reservation/index',         [ReservationController::class,'index'])->   name('reservation.index');
Route::get('/admin/reservation/show/{id}',     [ReservationController::class,'show'])->    name('reservation.show');
Route::delete('/admin/reservation/delete/{id}',[ReservationController::class,'destroy'])-> name('reservation.delete');
//cities//_________________________________________________________________________________________________________________________________________

Route::get('/admin/city/index',               [CityController::class,'index'])->     name('city.index');
Route::get('/admin/city/create',              [CityController::class,'create'])->    name('city.create');
Route::post('/admin/city/store',              [CityController::class, 'store'])->    name('city.store');
Route::get('/admin/city/show/{id}',           [CityController::class,'show'])->      name('city.show');
Route::get('/admin/city/edit/{id}',           [CityController::class,'edit'])->      name('city.edit');
Route::put('/admin/city/update/{id}',         [CityController::class, 'update'])->   name('city.update');
Route::delete('/admin/city/delete/{id}',      [CityController::class,'destroy'])->   name('city.delete');

//Specialties//_______________________________________________________________________________________________________________________________________

Route::get('/admin/Specialties/index',               [SpecialtiesContrpller::class,'index'])->     name('Specialties.index');
Route::get('/admin/Specialties/create',              [SpecialtiesContrpller::class,'create'])->    name('Specialties.create');
Route::post('/admin/Specialties/store',              [SpecialtiesContrpller::class, 'store'])->    name('Specialties.store');
Route::get('/admin/Specialties/show/{id}',           [SpecialtiesContrpller::class,'show'])->      name('Specialties.show');
Route::get('/admin/Specialties/edit/{id}',           [SpecialtiesContrpller::class,'edit'])->      name('Specialties.edit');
Route::put('/admin/Specialties/update/{id}',         [SpecialtiesContrpller::class, 'update'])->   name('Specialties.update');
Route::delete('/admin/Specialties/delete/{id}',      [SpecialtiesContrpller::class,'destroy'])->   name('Specialties.delete');
//problems//__________________________________________________________________________________________________________________________________________
Route::get('/admin/problem/index',               [problemController::class,'index'])->     name('problem.index');
Route::get('/admin/problem/show/{id}',           [problemController::class,'show'])->      name('problem.show');
Route::delete('/admin/problem/delete/{id}',      [problemController::class,'destroy'])->   name('problem.delete');
//____________________________________________________________________________________________________________________________________________________
});
