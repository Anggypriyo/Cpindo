<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\katprof;
use App\Models\profil;

class C_profil extends Controller
{
    public function index(){
        $profil = profil::all();
        $katprof = katprof::all();
        //dump($pegawai);
        return view('/admin/profil',compact('profil','katprof'));

    }

    public function indexkatprof(){
        $katprof = katprof::all();
        return view('/admin/katprof',compact('katprof'));

    }

    public function storekatprof(Request $request)
    {
        $request->validate([
            'nama_katprof' => 'required|max:25',
        ]);
        katprof::create($request->all());
        return redirect('admin/katprof')->with('status','Data Berhasil Ditambahkan!!!'); 
    }

    public function store(Request $request)
    {
            $request->validate([
            'judul_profil' => 'required|max:30',
            'id_katprof' => 'required|max:11',
        ]);
        
        $path = null;
                if($request->tampilan_utama)
            {
                $file = $request->file('tampilan_utama');
                $path = '/img/profil/'.time().'-'.$file->getClientOriginalName();
                //dd($path);
                $file->move(public_path('img/profil'), $path);
            }
            else if($request->lokasi){
                $file = $request->file('lokasi');
                $path = '/img/profil/'.time().'-'.$file->getClientOriginalName();
                //dd($path);
                $file->move(public_path('img/profil'), $path);
            }else if($request->foto_deskripsi){
                $file = $request->file('foto_deskripsi');
                $path = '/img/profil/'.time().'-'.$file->getClientOriginalName();
                //dd($path);
                $file->move(public_path('img/profil'), $path);
            }
                $profil = profil::create([
                    'judul_profil' => $request->judul_profil,
                    'path_profil' => $path,
                    'id_katprof' => $request->id_katprof,
                ]);
                $profil->save();
        return redirect('admin/profil')->with('status','Data Berhasil Ditambahkan!!!'); 
    }

    public function show($id)
    {
        //
    }
    public function edit($id)
    {
        //
    }

    public function updatekatprof(Request $request, $id)
    {
        $request->validate([
            'nama_katprof' => 'required|max:25',
        ]);
        katprof::where('id_katprof',$id)
        ->update([
            'nama_katprof' => $request->nama_katprof
        ]);
        return redirect('admin/katprof')->with('status','Data Berhasil Diedit!!!'); 
    }

    public function update(Request $request, $id)
    {
        
        $request->validate([
            'judul_profil' => 'required|max:30',
            'id_katprof' => 'required|max:11',
        ]);
        
        $path = null;
                if($request->tampilan_utama)
            {
                $file = $request->file('tampilan_utama');
                $path = '/img/profil/'.time().'-'.$file->getClientOriginalName();
                //dd($path);
                $file->move(public_path('img/profil'), $path);
            }else if($request->tampilan_utama2){
                $path = $request->tampilan_utama2;
            }
            else if($request->lokasi){
                $file = $request->file('lokasi');
                $path = '/img/profil/'.time().'-'.$file->getClientOriginalName();
                //dd($path);
                $file->move(public_path('img/profil'), $path);
            }else if($request->lokasi2){
                $path = $request->lokasi2;
            }
            else if($request->foto_deskripsi){
                $file = $request->file('foto_deskripsi');
                $path = '/img/profil/'.time().'-'.$file->getClientOriginalName();
                //dd($path);
                $file->move(public_path('img/profil'), $path);
            }else if($request->foto_deskripsi2){
                $path = $request->foto_deskripsi2;
            }
        profil::where('id_profil',$id)
        ->update([
            'judul_profil' => $request->judul_profil,
            'path_profil' => $path,
            'id_katprof' => $request->id_katprof,
        ]);
        return redirect('admin/profil')->with('status','Data Berhasil Di Update!!!'); 
    }

    public function destroykatprof($id)
    {
        
        katprof::where('id_katprof',$id)->delete();
        return redirect('admin/katprof')->with('status','Data Berhasil Dihapus!!!');
    }
    public function destroy($id)
    {
        
        profil::where('id_profil',$id)->delete();
        return redirect('admin/profil')->with('status','Data Berhasil Dihapus!!!');
    }
}
