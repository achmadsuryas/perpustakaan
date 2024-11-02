<?php

use App\Http\Controllers\DashboardController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\TAdminController;
use App\Http\Controllers\TAnggotaController;
use App\Http\Controllers\TBukuController;
use App\Http\Controllers\TKategoriController;
use App\Http\Controllers\TPeminjamanController;
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

Route::get('/', [HomeController::class, 'index'])->name('home');
Route::get('/book', [HomeController::class, 'book'])->name('listbook');
Route::get('/riwayat/{id}', [TPeminjamanController::class, 'riwayat'])->name('riwayat');

Route::get('/login', [LoginController::class, 'index'])->name('login-user')->middleware('guest');
Route::post('/login', [LoginController::class, 'loginAnggota'])->name('loginActionUser');

Route::get('/login-admin-pustakawan', [LoginController::class, 'index2'])->name('login-admin-pustakawan')->middleware('guest');
Route::post('/login-admin-pustakawan', [LoginController::class, 'LoginAdminPustakawan'])->name('loginActionAdminPustakawan');

Route::post('/logout', [LoginController::class, 'logoutAction'])->name('logoutAction');

//admin page

//view (a)
Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard')->middleware('adminpustakawan');
Route::get('/a-book', [TBukuController::class, 'index'])->name('book')->middleware('admin');

Route::get('/a-categories', [TKategoriController::class, 'index'])->name('categories')->middleware('admin');

Route::get('/a-rent', [TPeminjamanController::class, 'index'])->name('rent')->middleware('adminpustakawan');
Route::get('/a-return', [TPeminjamanController::class, 'index2'])->name('return')->middleware('adminpustakawan');

Route::get('/a-user', [TAnggotaController::class, 'index'])->name('user')->middleware('admin');
Route::get('/a-pustakawan', [TAdminController::class, 'index'])->name('admin-pustakawan')->middleware('admin');

Route::get('/a-report', [TPeminjamanController::class, 'report'])->name('report')->middleware('adminpustakawan');
//endview


//create (c)
Route::get('/dashboard/c-book', [TBukuController::class, 'create'])->name('cv-book')->middleware('admin');
Route::post('/dashboard/c-book', [TBukuController::class, 'store'])->name('c-book');
Route::get('/dashboard/c-category', [TKategoriController::class, 'create'])->name('cv-category')->middleware('admin');
Route::post('/dashboard/c-category', [TKategoriController::class, 'store'])->name('c-category');
Route::get('/dashboard/c-rent', [TPeminjamanController::class, 'create'])->name('cv-rent')->middleware('adminpustakawan');
Route::post('/dashboard/c-rent', [TPeminjamanController::class, 'store'])->name('c-rent');
Route::get('/dashboard/c-user', [TAnggotaController::class, 'create'])->name('cv-user')->middleware('admin');
Route::post('/dashboard/c-user', [TAnggotaController::class, 'store'])->name('c-user');
Route::get('/dashboard/c-pustakawan', [TAdminController::class, 'create'])->name('cv-pustakawan')->middleware('admin');
Route::post('/dashboard/c-pustakawan', [TAdminController::class, 'store'])->name('c-pustakawan');
//creatend


//edit(e) update (u)
Route::get('/dashboard/e-book/{id}', [TBukuController::class, 'edit'])->name('e-book')->middleware('admin');
Route::post('/dashboard/e-book/{id}', [TBukuController::class, 'update'])->name('u-book');
Route::get('/dashboard/e-category/{id}', [TKategoriController::class, 'edit'])->name('e-category')->middleware('admin');
Route::post('/dashboard/e-category/{id}', [TKategoriController::class, 'update'])->name('u-category');
Route::get('/dashboard/e-user/{id}', [TAnggotaController::class, 'edit'])->name('e-user')->middleware('admin');
Route::post('/dashboard/e-user/{id}', [TAnggotaController::class, 'update'])->name('u-user');
Route::get('/dashboard/e-user-password/{id}', [TAnggotaController::class, 'editpassword'])->name('ep-user')->middleware('admin');
Route::post('/dashboard/e-user-password/{id}', [TAnggotaController::class, 'updatepassword'])->name('up-user');
Route::get('/dashboard/e-pustakawan/{id}', [TAdminController::class, 'edit'])->name('e-pustakawan')->middleware('admin');
Route::post('/dashboard/e-pustakawan/{id}', [TAdminController::class, 'update'])->name('u-pustakawan');
Route::get('/dashboard/e-pustakawan-password/{id}', [TAdminController::class, 'editpassword'])->name('ep-pustakawan')->middleware('admin');
Route::post('/dashboard/e-pustakawan-password/{id}', [TAdminController::class, 'updatepassword'])->name('up-pustakawan');
//endedit update (u)


//delete(d)
Route::delete('/a-book{id}', [TBukuController::class, 'destroy'])->name('d-book');
Route::delete('/a-category{id}', [TKategoriController::class, 'destroy'])->name('d-category');
Route::delete('/a-user{id}', [TAnggotaController::class, 'destroy'])->name('d-user');
Route::delete('/a-pustakawan{id}', [TAdminController::class, 'destroy'])->name('d-pustakawan');
// Route::delete('/dashboard/a-report', [TPeminjamanController::class, 'destroy'])->name('d-report');
//deleteend

//return(r)
Route::post('/a-return{id}', [TPeminjamanController::class, 'return'])->name('r-return');
//returnend

//report
Route::get('/pdf', [TPeminjamanController::class, 'pdf'])->name('pdf');
//reportend

//end admin page
