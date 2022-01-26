<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;

class C_pengguna extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $pengguna = User::all();
	return view('admin/pengguna',compact('pengguna'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'nama_pengguna' => 'required',
	    'email_pengguna' => 'required|unique:users,email|email',
	    'role_pengguna' => 'required',
        ]);
        User::create([
	    'name' => $request->nama_pengguna,
            'email' => $request->email_pengguna,
            'is_admin' => $request->role_pengguna,
	    'password' => Bcrypt("password"),
        ]);
        return redirect('admin/pengguna')->with('status','Data Berhasil Ditambahkan!!!'); 
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
	$request->validate([
            'nama_pengguna' => 'required',
	    'email_pengguna' => 'required|unique:users,email|email',
	    'role_pengguna' => 'required',
        ]);
        User::find($id)->update([
            'name' => $request->nama_pengguna,
            'email' => $request->email_pengguna,
            'is_admin' => $request->role_pengguna,
        ]);
	return redirect('admin/pengguna')->with('status','Data Berhasil Diupdate!!!'); 
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        User::find($id)->delete();
        return redirect('/admin/pengguna')->with('status','Data Berhasil Dihapus!!!');
    }
}
