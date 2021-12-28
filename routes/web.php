<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Cadmin;
use App\Http\Controllers\C_profil;
use App\Http\Controllers\C_barang;
use App\Http\Controllers\C_pemesanan;
use App\Http\Controllers\C_menu;

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

Route::get('/', [Cadmin::class,'index']);
Route::get('/home', [Cadmin::class,'index']);
Route::get('/admin/dashbord', [Cadmin::class,'index']);

Route::get('/admin/datatable', [Cadmin::class,'indextable']);

// Route Pemesanan
Route::get('/admin/katpem',[C_pemesanan::class,'indexkatpem']);
Route::post('/admin/katpem/store',[C_pemesanan::class,'storekatpem']);
Route::patch('/admin/katpem/update/{id}',[C_pemesanan::class,'updatekatpem']);
Route::delete('/admin/katpem/delete/{id}',[C_pemesanan::class,'destroykatpem']);

Route::get('/admin/pemesanan',[C_pemesanan::class,'index']);
Route::post('/admin/pemesanan/store',[C_pemesanan::class,'store']);
Route::patch('/admin/pemesanan/update/{id}',[C_pemesanan::class,'update']);
Route::delete('/admin/pemesanan/delete/{id}',[C_pemesanan::class,'destroy']);

// Route Pengadaan

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

//Route Barang
Route::get('/admin/katbar',[C_barang::class,'indexkatbar']);
Route::post('/admin/katbar/store',[C_barang::class,'storekatbar']);
Route::patch('/admin/katbar/update/{id}',[C_barang::class,'updatekatbar']);
Route::delete('/admin/katbar/delete/{id}',[C_barang::class,'destroykatbar']);

Route::get('/admin/barang',[C_barang::class,'index']);
Route::post('/admin/barang/store',[C_barang::class,'store']);
Route::patch('/admin/barang/update/{id}',[C_barang::class,'update']);
Route::delete('/admin/barang/delete/{id}',[C_barang::class,'destroy']);
