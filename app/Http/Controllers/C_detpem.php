<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\detail_pemesanan;
use App\Models\pemesanan;
use App\Models\menu;
use Illuminate\Support\Facades\Storage;

class C_detpem extends Controller
{
    public function index(){
        $detpem = detail_pemesanan::all();
        $pemesanan = pemesanan::all();
        $menu = menu::all();
        return view('admin/detpem',compact('pemesanan','detpem','menu'));

    }

    public function store(Request $request)
    {
            $request->validate([
            'total_harga' => 'required|max:11',
            'id_pemesanan' => 'required|max:11',
            'id_menu' => 'required|max:11',
        ]);
                $detpem = detail_pemesanan::create([
                    'total_harga' => $request->total_harga,
                    'id_pemesanan' => $request->id_pemesanan,
                    'id_menu' => $request->id_menu,
                ]);
                $detpem->save();
        return redirect('admin/detpem')->with('status','Data Berhasil Ditambahkan!!!'); 
    }

    public function show($id)
    {
        //
    }
    public function edit($id)
    {
        //
    }

    public function update(Request $request, $id)
    {
            $request->validate([
            'total_harga' => 'required|max:11',
            'id_pemesanan' => 'required|max:11',
            'id_menu' => 'required|max:11',
        ]);
                detail_pemesanan::where('id_detpem',$id)
                ->update([
                    'total_harga' => $request->total_harga,
                    'id_pemesanan' => $request->id_pemesanan,
                    'id_menu' => $request->id_menu,
                ]);
        return redirect('admin/detpem')->with('status','Data Berhasil Diupdate!!!'); 
    }

    public function destroy($id)
    {
        
        detail_pemesanan::where('id_detpem',$id)->delete();
        return redirect('/admin/detpem')->with('status','Data Berhasil Dihapus!!!');
    }
}
