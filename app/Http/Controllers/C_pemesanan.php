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
            $request->validate([
            
            'id_katpem' => 'required|max:11',
            'tgl_pengambilan' => 'required',
            'status_pemesanan' => 'required|max:1',
        ]);
        $path = null;
        if($request->bukti_pengadaan)
            {
                $file = $request->file('bukti_pengadaan');
                //dd($request);
                $path = '/img/pemesanan/'.time().'-'.$file->getClientOriginalName();
                //dd($path);
                $file->move(public_path('/img/pemesanan'), $path);
            }
                $pemesanan = pemesanan::create([
                    'nama_pemesanan' => $request->nama_pemesanan,
                    'bukti_pengadaan' => $path,
                    'tgl_pengambilan' => $request->tgl_pengambilan,
                    'status_pemesanan' => $request->status_pemesanan,
                    'ket_pemesanan' => $request->ket_pemesanan,
                    'id_katpem' => $request->id_katpem,
                ]);
                $pemesanan->save();
        return redirect('admin/pemesanan')->with('status','Data Berhasil Ditambahkan!!!'); 
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

    public function update(Request $request, $id)
    {
            $request->validate([
            
            'id_katpem' => 'required|max:11',
        ]);
                $path = null;
                if($request->bukti_pengadaan)
            {
                $file = $request->file('bukti_pengadaan');
                //dd($request);
                $path = '/img/pemesanan/'.time().'-'.$file->getClientOriginalName();
                //dd($path);
                $file->move(public_path('/img/pemesanan'), $path);
            }else{
                $path = $request->bukti_pengadaan2;
            }
                pemesanan::where('id_pemesanan',$id)
                ->update([
                    'nama_pemesanan' => $request->nama_pemesanan,
                    'bukti_pengadaan' => $path,
                    'tgl_pengambilan' => $request->tgl_pengambilan,
                    'status_pemesanan' => $request->status_pemesanan,
                    'ket_pemesanan' => $request->ket_pemesanan,
                    'id_katpem' => $request->id_katpem
                ]);
        return redirect('admin/pemesanan')->with('status','Data Berhasil Diupdate!!!'); 
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
