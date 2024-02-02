<?php

use App\Http\Controllers\userController;
use App\Http\Controllers\adminController;
use Illuminate\Support\Facades\Route;

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

Route::get('/', [userController::class, 'parkNow']);
Route::get('/register', [userController::class, 'register']); //register account
Route::post('/register/save', [userController::class, 'registerSave']); //saved accound
Route::get('/login', [userController::class, 'login']); //login page
Route::post('/loginUser', [userController::class, 'auth']); //loging proccess
Route::get('/logout', [userController::class, 'logout']); //logout proccess

Route::get('/profile', [userController::class, 'profile'])->middleware('islogin'); //profile page
Route::get('/menu', [userController::class, 'menu'])->middleware('islogin'); //menu page
Route::get('/tambah/kendaraan', [userController::class, 'createTransport'])->middleware('islogin'); //rule of add transport page
Route::get('/checkin/', [userController::class, 'checkin'])->middleware('islogin'); //checkin page
Route::post('/shooter/', [userController::class, 'shooter'])->middleware('islogin'); //checkin page
Route::get('/status/', [userController::class, 'status'])->middleware('islogin'); //checkin page
Route::get('/detail/{idPenitipan}/penitip', [userController::class, 'detailPenitip'])->middleware('islogin'); //checkin page


Route::post('/user/admin/search', [adminController::class, 'user'])->middleware('islogin');
Route::get('/checkin/admin', [adminController::class, 'checkin'])->middleware('islogin');
Route::post('/plat/checkin', [adminController::class, 'checkinPlat'])->middleware('islogin');
Route::get('/user/admin', [adminController::class, 'user'])->middleware('islogin');
Route::get('/detail/{idClient}/admin', [adminController::class, 'detail'])->middleware('islogin');
Route::get('/edit/{idClient}/admin', [adminController::class, 'editProfile'])->middleware('islogin');
Route::put('/update/{idClient}/admin', [adminController::class, 'update'])->middleware('islogin');
Route::get('/add/{idClient}/admin', [adminController::class, 'addData'])->middleware('islogin');
Route::get('/History/admin', [adminController::class, 'statusAdmin'])->middleware('islogin');
Route::post('/add/transport/{idClient}/admin', [adminController::class, 'createTransport'])->middleware('islogin');
Route::post('/delete/transport/admin', [adminController::class, 'deleteTransport'])->middleware('islogin');
