<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\pengadaan;

class C_pengadaan extends Controller
{
    public function index(){
        $pengadaan = pengadaan::all();
        return view('/admin/pengadaan',compact('pengadaan'));

    }

    public function show($id)
    {
        //
    }
    public function edit($id)
    {
        //
    }

    public function store(Request $request)
    {
            $request->validate([
            'tgl_pengadaan' => 'required',
            'status_pengadaan' => 'required|max:1',
        ]);
        $path = null;
        if($request->bukti_pengadaan)
            {
                $file = $request->file('bukti_pengadaan');
                //dd($request);
                $path = '/img/pengadaan/'.time().'-'.$file->getClientOriginalName();
                //dd($path);
                $file->move(public_path('/img/pengadaan'), $path);
            }
                $pengadaan = pengadaan::create([
                    'bukti_pengadaan' => $path,
                    'tgl_pengadaan' => $request->tgl_pengadaan,
                    'status_pengadaan' => $request->status_pengadaan,
                    'ket_pengadaan' => $request->ket_pengadaan,
                ]);
                $pengadaan->save();
        return redirect('admin/pengadaan')->with('status','Data Berhasil Ditambahkan!!!'); 
    }

    public function update(Request $request, $id)
    {
            $request->validate([
            'tgl_pengadaan' => 'required',
            'status_pengadaan' => 'required|max:1',
        ]);
        $path = null;
                if($request->bukti_pengadaan)
            {
                $file = $request->file('bukti_pengadaan');
                //dd($request);
                $path = '/img/pengadaan/'.time().'-'.$file->getClientOriginalName();
                //dd($path);
                $file->move(public_path('/img/pengadaan'), $path);
            }else{
                $path = $request->bukti_pengadaan2;
            }
                pengadaan::where('id_pengadaan',$id)
                ->update([
                    'bukti_pengadaan' => $path,
                    'tgl_pengadaan' => $request->tgl_pengadaan,
                    'status_pengadaan' => $request->status_pengadaan,
                    'ket_pengadaan' => $request->ket_pengadaan,
                ]);
        return redirect('admin/pengadaan')->with('status','Data Berhasil Diupdate!!!'); 
    }

    public function destroy($id)
    {
        
        pengadaan::where('id_pengadaan',$id)->delete();
        return redirect('admin/pengadaan')->with('status','Data Berhasil Dihapus!!!');
    }
}
