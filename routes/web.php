<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Cadmin;
use App\Http\Controllers\C_profil;
use App\Http\Controllers\C_barang;
use App\Http\Controllers\C_pemesanan;
use App\Http\Controllers\C_menu;
use App\Http\Controllers\C_pengadaan;
use App\Http\Controllers\C_detbg;
use App\Http\Controllers\C_detpem;
use App\Http\Controllers\Chome;
use App\Http\Controllers\Cmenupindo;
use App\Http\Controllers\C_otentikasi;
use App\Http\Controllers\C_pengguna;

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
Route::middleware(['guest'])->group(function () {
    //Route Landing Page
    Route::get('/', [Chome::class,'index']);
    Route::get('/home', [Chome::class,'index']);
    Route::get('/menu', [Cmenupindo::class,'index']);

    //Route Otentikasi
    Route::get('/login', [C_otentikasi::class,'login']);
    Route::post('/mengotentikasi', [C_otentikasi::class,'mengotentikasi']);
});
Route::middleware(['auth'])->group(function () {
    Route::get('/admin', [Cadmin::class,'index']);
    Route::get('/admin/home', [Cadmin::class,'index']);
    Route::get('/admin/dashbord', [Cadmin::class,'index']);

    Route::get('/admin/datatable', [Cadmin::class,'indextable']);

    //Route Otentikasi
    Route::get('/logout', [C_otentikasi::class,'logout']);

    //Route Detail Pemesanan
    Route::get('/admin/detpem',[C_detpem::class,'index']);
    Route::post('/admin/detpem/store',[C_detpem::class,'store']);
    Route::patch('/admin/detpem/update/{id}',[C_detpem::class,'update']);
    Route::delete('/admin/detpem/delete/{id}',[C_detpem::class,'destroy']);

    Route::get('/admin/pemesanan',[C_pemesanan::class,'index']);
    Route::post('/admin/pemesanan/store',[C_pemesanan::class,'store']);
    Route::patch('/admin/pemesanan/update/{id}',[C_pemesanan::class,'update']);
    Route::delete('/admin/pemesanan/delete/{id}',[C_pemesanan::class,'destroy']);

    //Route Detail Barang
    Route::get('/admin/detbg',[C_detbg::class,'index']);
    Route::post('/admin/detbg/store',[C_detbg::class,'store']);
    Route::patch('/admin/detbg/update/{id}',[C_detbg::class,'update']);
    Route::delete('/admin/detbg/delete/{id}',[C_detbg::class,'destroy']);

    // Route Pengadaan
    Route::get('/admin/pengadaan',[C_pengadaan::class,'index']);
    Route::post('/admin/pengadaan/store',[C_pengadaan::class,'store']);
    Route::patch('/admin/pengadaan/update/{id}',[C_pengadaan::class,'update']);
    Route::delete('/admin/pengadaan/delete/{id}',[C_pengadaan::class,'destroy']);
});
Route::middleware(['is_admin'])->group(function () {
    // Route Pemesanan
    Route::get('/admin/katpem',[C_pemesanan::class,'indexkatpem']);
    Route::post('/admin/katpem/store',[C_pemesanan::class,'storekatpem']);
    Route::patch('/admin/katpem/update/{id}',[C_pemesanan::class,'updatekatpem']);
    Route::delete('/admin/katpem/delete/{id}',[C_pemesanan::class,'destroykatpem']);

    //Route Barang
    Route::get('/admin/katbar',[C_barang::class,'indexkatbar']);
    Route::post('/admin/katbar/store',[C_barang::class,'storekatbar']);
    Route::patch('/admin/katbar/update/{id}',[C_barang::class,'updatekatbar']);
    Route::delete('/admin/katbar/delete/{id}',[C_barang::class,'destroykatbar']);

    Route::get('/admin/barang',[C_barang::class,'index']);
    Route::post('/admin/barang/store',[C_barang::class,'store']);
    Route::patch('/admin/barang/update/{id}',[C_barang::class,'update']);
    Route::delete('/admin/barang/delete/{id}',[C_barang::class,'destroy']);

    //Route Profil
    Route::get('/admin/katprof',[C_profil::class,'indexkatprof']);
    Route::post('/admin/katprof/store',[C_profil::class,'storekatprof']);
    Route::patch('/admin/katprof/update/{id}',[C_profil::class,'updatekatprof']);
    Route::delete('/admin/katprof/delete/{id}',[C_profil::class,'destroykatprof']);

    Route::get('/admin/profil',[C_profil::class,'index']);
    Route::post('/admin/profil/store',[C_profil::class,'store']);
    Route::patch('/admin/profil/update/{id}',[C_profil::class,'update']);
    Route::delete('/admin/profil/delete/{id}',[C_profil::class,'destroy']);

    //Route Menu
    Route::get('/admin/katmenu',[C_menu::class,'indexkatmenu']);
    Route::post('/admin/katmenu/store',[C_menu::class,'storekatmenu']);
    Route::patch('/admin/katmenu/update/{id}',[C_menu::class,'updatekatmenu']);
    Route::delete('/admin/katmenu/delete/{id}',[C_menu::class,'destroykatmenu']);

    Route::get('/admin/menu',[C_menu::class,'index']);
    Route::post('/admin/menu/store',[C_menu::class,'store']);
    Route::patch('/admin/menu/update/{id}',[C_menu::class,'update']);
    Route::delete('/admin/menu/delete/{id}',[C_menu::class,'destroy']);

    //Route Pengguna
    Route::get('/admin/pengguna',[C_pengguna::class,'index']);
    Route::post('/admin/pengguna/store',[C_pengguna::class,'store']);
    Route::patch('/admin/pengguna/update/{id}',[C_pengguna::class,'update']);
    Route::delete('/admin/pengguna/delete/{id}',[C_pengguna::class,'destroy']);
});