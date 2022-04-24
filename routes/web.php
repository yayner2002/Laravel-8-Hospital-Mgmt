<?php

use App\Http\Controllers\homeController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\adminController;

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

/* Route::get('/', function () {
    return view('welcome');
}); */

Route::get('/',[homeController::class,'index']);

Route::get('/home',[homeController::class,'redirect'])->middleware('auth','verified');

Route::middleware(['auth:sanctum', 'verified'])->get('/dashboard', function () {
    return view('dashboard');
})->name('dashboard');
Route::get('addDoc',[adminController::class,'addDoctor']);
Route::post('uploadDoctor',[adminController::class,'uploadDoctor']);
Route::post('appointment',[homeController::class,'appointment']);
Route::get('myappointment',[homeController::class,'myAppointment']);
Route::get('cancelAppointment/{id}',[homeController::class,'cancelAppointment']);
Route::get('viewAppointments',[adminController::class,'viewAppointments']);
Route::get('approveAppointment/{id}',[adminController::class,'approveAppointment']);
Route::get('cancellAppointment/{id}',[adminController::class,'cancellAppointment']);
Route::get('viewDoctor',[adminController::class,'viewDoctor']);
Route::get('deleteDoctor/{id}',[adminController::class,'deleteDoctor']);
Route::get('updateDoctor/{id}',[adminController::class,'updateDoctor']);
Route::post('editDoctor/{id}',[adminController::class,'editDoctor']);
Route::get('composeEmail/{id}',[adminController::class,'composeEmail']);
Route::post('sendEmail/{id}',[adminController::class,'sendEmail']);