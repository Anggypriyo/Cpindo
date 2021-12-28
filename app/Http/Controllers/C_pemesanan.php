<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\katpem;
use App\Models\pemesanan;

class C_pemesanan extends Controller
{
    public function index(){
        $pemesanan = pemesanan::all();
        $katpem = katpem::all();
        //dump($pegawai);
        return view('/admin/pemesanan',compact('pemesanan','katpem'));

    }

    public function indexkatpem(){
        $katpem = katpem::all();
        return view('/admin/katpem',compact('katpem'));

    }

    public function storekatpem(Request $request)
    {
        $request->validate([
            'nama_katpem' => 'required|max:25',
        ]);
        katpem::create($request->all());
        return redirect('admin/katpem')->with('status','Data Berhasil Ditambahkan!!!'); 
    }

    public function store(Request $request)
    {
            
    }

    public function show($id)
    {
        //
    }
    public function edit($id)
    {
        //
    }

    public function updatekatpem(Request $request, $id)
    {
        $request->validate([
            'nama_katpem' => 'required|max:25',
        ]);
        katpem::where('id_katpem',$id)
        ->update([
            'nama_katpem' => $request->nama_katpem
        ]);
        return redirect('admin/katpem')->with('status','Data Berhasil Diedit!!!'); 
    }

    public function destroykatpem($id)
    {
        
        katpem::where('id_katpem',$id)->delete();
        return redirect('admin/katpem')->with('status','Data Berhasil Dihapus!!!');
    }
    public function destroy($id)
    {
        
        katpem::where('id_pemesanan',$id)->delete();
        return redirect('admin/pemesanan')->with('status','Data Berhasil Dihapus!!!');
    }
}
