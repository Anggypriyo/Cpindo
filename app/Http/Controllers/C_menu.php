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
            $request->validate([
            'nama_menu' => 'required|max:30',
            'harga_menu' => 'max:11',
            'id_katmenu' => 'required|max:11',
        ]);
        $path = '/img/no_image.jpg';
        if($request->foto_menu)
            {
                $file = $request->file('foto_menu');
                //dd($request);
                $path = '/img/menu/'.time().'-'.$file->getClientOriginalName();
                //dd($path);
                $file->move(public_path('/img/menu'), $path);
            }
                $menu = menu::create([
                    'nama_menu' => $request->nama_menu,
                    'harga_menu' => $request->harga_menu,
                    'foto_menu' => $path,
                    'id_katmenu' => $request->id_katmenu,
                ]);
                $menu->save();
        return redirect('admin/menu')->with('status','Data Berhasil Ditambahkan!!!'); 
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

    public function update(Request $request, $id)
    {
            $request->validate([
            'nama_menu' => 'required|max:30',
            'harga_menu' => 'max:11',
            'id_katmenu' => 'required|max:11',
        ]);
                $path = '/img/no_image.jpg';
                if($request->foto_menu)
            {
                $file = $request->file('foto_menu');
                //dd($request);
                $path = '/img/menu/'.time().'-'.$file->getClientOriginalName();
                //dd($path);
                $file->move(public_path('/img/menu'), $path);
            }else{
                $path = $request->foto_menu2;
            }
                menu::where('id_menu',$id)
                ->update([
                    'nama_menu' => $request->nama_menu,
                    'harga_menu' => $request->harga_menu,
                    'foto_menu' => $path,
                    'id_katmenu' => $request->id_katmenu
                ]);
        return redirect('admin/menu')->with('status','Data Berhasil Diupdate!!!'); 
    }

    public function destroykatmenu($id)
    {
        
        katmenu::where('id_katmenu',$id)->delete();
        return redirect('admin/katmenu')->with('status','Data Berhasil Dihapus!!!');
    }
    public function destroy($id)
    {
        
        menu::where('id_menu',$id)->delete();
        return redirect('admin/menu')->with('status','Data Berhasil Dihapus!!!');
    }
}
