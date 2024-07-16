<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\EmployeeController;
use App\Http\Controllers\JadwalController;
use App\Http\Controllers\KategoriController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\MekanikController;
use App\Http\Controllers\ServiceController;
use App\Http\Controllers\SparepartController;

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

// auth
Route::get('/login', [LoginController::class, 'login'])->name('login');
Route::post('/loginproses', [LoginController::class, 'loginproses'])->name('loginproses');
Route::get('/register', [LoginController::class, 'register'])->name('register');
Route::post('/registeruser', [LoginController::class, 'registeruser'])->name('registeruser');
Route::get('/logout', [LoginController::class, 'logout'])->name('logout');
// user
Route::get('/dashboard', [LoginController::class, 'dashboard'])->name('dashboard');
Route::get('/datahistori', [ServiceController::class, 'datahistori'])->name('datahistori')->middleware('auth');
Route::get('/tambahserviceuser', [ServiceController::class, 'tambahserviceuser'])->name('tambahserviceuser')->middleware('auth');
Route::post('/insertserviceuser', [ServiceController::class, 'insertserviceuser'])->name('insertserviceuser')->middleware('auth');

Route::get('/tampilkanuser/{id}', [LoginController::class, 'tampilkanuser'])->name('tampilkanuser');
Route::post('/updateuser/{id}', [LoginController::class, 'updateuser'])->name('updateuser');

Route::get('/pegawai', [EmployeeController::class, 'index'])->name('pegawai');
Route::get('/tambahpegawai', [EmployeeController::class, 'tambahpegawai'])->name('tambahpegawai');
Route::post('/insertdata', [EmployeeController::class, 'insertdata'])->name('insertdata');
Route::get('/tampilkandata/{id}', [EmployeeController::class, 'tampilkandata'])->name('tampilkandata');
Route::post('/updatedata/{id}', [EmployeeController::class, 'updatedata'])->name('updatedata');
Route::get('/deletedata/{id}', [EmployeeController::class, 'deletedata'])->name('deletedata');
// 

Route::middleware(['auth', 'hakakses:admin'])->group(function () {
    Route::get('/dataservice', [ServiceController::class, 'dataservice'])->name('dataservice')->middleware('auth');
    Route::get('/tampilkanservice/{id}', [ServiceController::class, 'tampilkanservice'])->name('tampilkanservice')->middleware('auth');
    Route::get('/tambahserviceadmin', [ServiceController::class, 'tambahserviceadmin'])->name('tambahserviceadminr')->middleware('auth');
    Route::post('/insertserviceadmin', [ServiceController::class, 'insertserviceadmin'])->name('insertserviceadmin')->middleware('auth');
    Route::post('/updateservice/{id}', [ServiceController::class, 'updateservice'])->name('updateservice')->middleware('auth');
    Route::get('/deleteservice/{id}', [ServiceController::class, 'deleteservice'])->name('deleteservice');
    Route::get('/invoice/{id}', [ServiceController::class, 'invoice'])->name('invoice');
    Route::get('/exportpdf/{id}', [ServiceController::class, 'exportpdf'])->name('exportpdf');

    Route::get('/datasparepart', [SparepartController::class, 'datasparepart'])->name('datasparepart')->middleware('auth');
    Route::get('/tambahsparepart', [SparepartController::class, 'tambahsparepart'])->name('tambahsparepart')->middleware('auth');
    Route::post('/insertsparepart', [SparepartController::class, 'insertsparepart'])->name('insertsparepart')->middleware('auth');
    Route::get('/tampilkansparepart/{id}', [SparepartController::class, 'tampilkansparepart'])->name('tampilkansparepart')->middleware('auth');
    Route::post('/updatesparepart/{id}', [SparepartController::class, 'updatesparepart'])->name('updatesparepart')->middleware('auth');
    Route::get('/deletesparepart/{id}', [SparepartController::class, 'deletesparepart'])->name('deletesparepart')->middleware('auth');
    Route::get('/exportpdfsparepart', [SparepartController::class, 'exportpdfsparepart'])->name('exportpdfsparepart');

    Route::get('/datamekanik', [MekanikController::class, 'datamekanik'])->name('datamekanik')->middleware('auth');
    Route::get('/tambahmekanik', [MekanikController::class, 'tambahmekanik'])->name('tambahmekanik')->middleware('auth');
    Route::post('/insertmekanik', [MekanikController::class, 'insertmekanik'])->name('insertmekanik')->middleware('auth');
    Route::get('/tampilkanmekanik/{id}', [MekanikController::class, 'tampilkanmekanik'])->name('tampilkanmekanik')->middleware('auth');
    Route::post('/updatemekanik/{id}', [MekanikController::class, 'updatemekanik'])->name('updatemekanik')->middleware('auth');
    Route::get('/deletemekanik/{id}', [MekanikController::class, 'deletemekanik'])->name('deletemekanik')->middleware('auth');
    Route::get('/exportpdfmekanik', [MekanikController::class, 'exportpdfmekanik'])->name('exportpdfmekanik');

    Route::get('/datakategori', [KategoriController::class, 'datakategori'])->name('datakategori')->middleware('auth');
    Route::get('/tambahkategori', [KategoriController::class, 'tambahkategori'])->name('tambahkategori')->middleware('auth');
    Route::post('/insertkategori', [KategoriController::class, 'insertkategori'])->name('insertkategori')->middleware('auth');
    Route::get('/tampilkankategori/{id}', [KategoriController::class, 'tampilkankategori'])->name('tampilkankategori')->middleware('auth');
    Route::post('/updatekategori/{id}', [KategoriController::class, 'updatekategori'])->name('updatekategori')->middleware('auth');
    Route::get('/deletekategori/{id}', [KategoriController::class, 'deletekategori'])->name('deletekategori')->middleware('auth');
    Route::get('/exportpdfkategori', [KategoriController::class, 'exportpdfkategori'])->name('exportpdfkategori');

    Route::get('/datajadwal', [JadwalController::class, 'datajadwal'])->name('datajadwal')->middleware('auth');
    Route::get('/tambahjadwal', [JadwalController::class, 'tambahjadwal'])->name('tambahjadwal')->middleware('auth');
    Route::post('/insertjadwal', [JadwalController::class, 'insertjadwal'])->name('insertjadwal')->middleware('auth');
    Route::get('/tampilkanjadwal/{id}', [JadwalController::class, 'tampilkanjadwal'])->name('tampilkanjadwal')->middleware('auth');
    Route::post('/updatejadwal/{id}', [JadwalController::class, 'updatejadwal'])->name('updatejadwal')->middleware('auth');
    Route::get('/deletejadwal/{id}', [JadwalController::class, 'deletejadwal'])->name('deletejadwal')->middleware('auth');
    Route::get('/exportpdfjadwal', [JadwalController::class, 'exportpdfjadwal'])->name('exportpdfjadwal');
});
