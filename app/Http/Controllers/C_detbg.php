<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\detail_barang;
use App\Models\barang;
use App\Models\pengadaan;
use Illuminate\Support\Facades\Storage;

class C_detbg extends Controller
{
    public function index(){
        $detbg = detail_barang::all();
        $barang = barang::all();
        $pengadaan = pengadaan::all();
        return view('admin/detbg',compact('barang','detbg','pengadaan'));

    }

    public function store(Request $request)
    {
            $request->validate([
            'stok_barang' => 'required|max:11',
            'id_barang' => 'required|max:11',
            'id_pengadaan' => 'required|max:11',
        ]);
                $detbg = detail_barang::create([
                    'stok_barang' => $request->stok_barang,
                    'id_barang' => $request->id_barang,
                    'id_pengadaan' => $request->id_pengadaan,
                ]);
                $detbg->save();
        return redirect('admin/detbg')->with('status','Data Berhasil Ditambahkan!!!'); 
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
            'stok_barang' => 'required|max:11',
            'id_barang' => 'required|max:11',
            'id_pengadaan' => 'required|max:11',
        ]);
                detail_barang::where('id_detbg',$id)
                ->update([
                    'stok_barang' => $request->stok_barang,
                    'id_barang' => $request->id_barang,
                    'id_pengadaan' => $request->id_pengadaan,
                ]);
        return redirect('admin/detbg')->with('status','Data Berhasil Diupdate!!!'); 
    }

    public function destroy($id)
    {
        
        detail_barang::where('id_detbg',$id)->delete();
        return redirect('/admin/detbg')->with('status','Data Berhasil Dihapus!!!');
    }
}
