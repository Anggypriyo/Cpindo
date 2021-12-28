<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class C_pengadaan extends Controller
{
    public function index(){
        return view('admin/dashbord');

    }

    public function indextable(){
        return view('admin/datatable');

    }
}
