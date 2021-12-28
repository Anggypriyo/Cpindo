<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\katmenu;
use App\Models\menu;

class C_menu extends Controller
{
    public function index(){
        $menu = menu::all();
        $katmenu = katmenu::all();
        //dump($pegawai);
        return view('/admin/menu',compact('menu','katmenu'));

    }

    public function indexkatmenu(){
        $katmenu = katmenu::all();
        return view('/admin/katmenu',compact('katmenu'));

    }

    public function storekatmenu(Request $request)
    {
        $request->validate([
            'nama_katmenu' => 'required|max:25',
        ]);
        katmenu::create($request->all());
        return redirect('admin/katmenu')->with('status','Data Berhasil Ditambahkan!!!'); 
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

    public function updatekatmenu(Request $request, $id)
    {
        $request->validate([
            'nama_katmenu' => 'required|max:25',
        ]);
        katmenu::where('id_katmenu',$id)
        ->update([
            'nama_katmenu' => $request->nama_katmenu
        ]);
        return redirect('admin/katmenu')->with('status','Data Berhasil Diedit!!!'); 
    }

    public function destroykatmenu($id)
    {
        
        katmenu::where('id_katmenu',$id)->delete();
        return redirect('admin/katmenu')->with('status','Data Berhasil Dihapus!!!');
    }
    public function destroy($id)
    {
        
        katmenu::where('id_menu',$id)->delete();
        return redirect('admin/menu')->with('status','Data Berhasil Dihapus!!!');
    }
}
