<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\katbar;
use App\Models\barang;
use Illuminate\Support\Facades\Storage;

class C_barang extends Controller
{
    public function index(){
        $barang = barang::all();
        $katbar = katbar::all();
        //dump($pegawai);
        return view('admin/barang',compact('barang','katbar'));

    }

    public function indexkatbar(){
        $katbar = katbar::all();
        return view('admin/katbar',compact('katbar'));

    }

    public function storekatbar(Request $request)
    {
        $request->validate([
            'nama_katbar' => 'required|max:25',
        ]);
        katbar::create($request->all());
        return redirect('admin/katbar')->with('status','Data Berhasil Ditambahkan!!!'); 
    }

    public function store(Request $request)
    {
            $request->validate([
            'nama_barang' => 'required|max:30',
            'id_katbar' => 'required|max:11',
        ]);
                $file = $request->file('foto_barang');
                //dd($request);
                $path = '/img/barang/'.time().'-'.$file->getClientOriginalName();
                //dd($path);
                $file->move(public_path('/img/barang'), $path);
                $barang = barang::create([
                    'nama_barang' => $request->nama_barang,
                    'foto_barang' => $path,
                    'id_katbar' => $request->id_katbar,
                ]);
                $barang->save();
        return redirect('admin/barang')->with('status','Data Berhasil Ditambahkan!!!'); 
    }

    public function show($id)
    {
        //
    }
    public function edit($id)
    {
        //
    }

    public function updatekatbar(Request $request, $id)
    {
        $request->validate([
            'nama_katbar' => 'required|max:25',
        ]);
        katbar::where('id_katbar',$id)
        ->update([
            'nama_katbar' => $request->nama_katbar
        ]);
        return redirect('/admin/katbar')->with('status','Data Berhasil Diedit!!!'); 
    }

    public function destroykatbar($id)
    {
        
        katbar::where('id_katbar',$id)->delete();
        return redirect('/admin/katbar')->with('status','Data Berhasil Dihapus!!!');
    }
    public function destroy($id)
    {
        
        barang::where('id_barang',$id)->delete();
        return redirect('/admin/barang')->with('status','Data Berhasil Dihapus!!!');
    }
}
