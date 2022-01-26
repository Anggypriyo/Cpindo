<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\menu;

class Cmenupindo extends Controller
{
    public function index(){
        $menu = menu::all();
        return view('landingpage/menu-pindo', compact('menu'));
    }
}
