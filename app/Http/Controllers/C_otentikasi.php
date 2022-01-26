<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class C_otentikasi extends Controller
{
    public function login()
    {
        return view('admin.data-admin.login-admin');
    }

    public function mengotentikasi(Request $request)
    {
	$request->validate([
	    'email' => 'required|email',
	    'password' => 'required',
        ]);

	$email = $request->email;
	$password = $request->password;

	if (Auth::attempt(['email' => $email, 'password' => $password])) {
            $request->session()->regenerate();
	    return redirect()->intended('/admin');
        }

        return back()->withErrors([
            'login' => 'Kredensial yang diberikan tidak sesuai dengan catatan kami.',
        ]);
    }

    public function logout(Request $request)
    {
    	Auth::logout();

    	$request->session()->invalidate();

   	$request->session()->regenerateToken();

    	return redirect('/login');
    }
}
