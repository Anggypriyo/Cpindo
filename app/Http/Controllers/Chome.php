<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\profil;

class Chome extends Controller
{
    public function index(){
        $profiltentang = profil::all();
        $profilutama = profil::where('id_katprof',5)->get();
        $profilfoto = profil::Where('id_katprof',2)->get();
        $profillokasi = profil::where('id_katprof',3)->get();
        return view('home', compact('profiltentang','profilutama','profilfoto','profillokasi'));
    }
}
