<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\profil;

class Chome extends Controller
{
    public function index(){
        $profiltentang = profil::Where('id_katprof',4)->get();
        $profilutama = profil::where('id_katprof',2)->get();
        $profilfoto = profil::Where('id_katprof',2)->get();
        $profillokasi = profil::where('id_katprof',3)->get();
        return view('landingpage/home', compact('profiltentang','profilutama','profilfoto','profillokasi'));
    }
}
