<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;

class AuthController extends Controller
{
    public function login()
    {
        return view('auth.login');
    }

    public function loginUser(Request $request)
    {
        $request->validate([            
            'email'=>'required|email:users',
            'passwordd'=>'required'
        ],
        [
            'email.required' => 'Email harus diisi!',
            'email.email' => 'Email tidak valid!',
            'passwordd.required' => 'Password harus diisi!'
        ]);

        $user = User::where('email','=',$request->email)->first();
        if($user){
            if(Hash::check($request->passwordd, $user->password)){
                $request->session()->put('loginId', $user->id_user);
                $request->session()->put('loginSuccess', 'Login Berhasil!');
                return redirect('dashboard');
            } else {
                return back()->with('fail','Email atau password salah!');
            }
        } else {
            return back()->with('fail','Email belum terdaftar.');
        }        
    }

    public function logout()
    {
        $data = array();
        if(Session::has('loginId')){
            Session::pull('loginId');
            Session::put('logoutSuccess', 'Logout Berhasil!');
            return redirect('login');
        }
    }
}