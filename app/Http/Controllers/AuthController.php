<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{
    public function prosesloginasn(Request $request)
    {
        // $pass = 198707102023211034;
        // echo Hash::make($pass);

        if (Auth::guard('asn')->attempt(['nip' => $request->nip, 'password' => $request->password])) {
            // echo "Berhasil Login";
            return redirect('/panelasn/dashboardasn');
        } else {
            return redirect('/panelasn')->with(['warning' => 'NIP / Password Salah']);
        }
    }

    public function proseslogoutasn()
    {
        if (Auth::guard('asn')->check()) {
            Auth::guard('asn')->logout();
            return redirect('/panelasn');
        }
    }

    public function prosesloginadmin(Request $request)
    {
        if(Auth::guard('user')->attempt(['email' =>$request->email, 'password' => $request->password])){
            return redirect('/panel/dashboardadmin');
        } else {
            return redirect('/panel')->with(['warning' => 'Email / Password Salah']);
        }
    }

    public function proseslogoutadmin(){
        if(Auth::guard('user')->check()){
            Auth::guard('user')->logout();
            return redirect('/panel');
        }
    }

    public function prosesloginhonorer(Request $request)
    {
        // $pass = 3309051007879003;
        // echo Hash::make($pass);

        if (Auth::guard('honorer')->attempt(['nik' => $request->nik, 'password' => $request->password])) {
            // echo "Berhasil Login";
            return redirect('/panelhonorer/dashboardhonorer');
        } else {
            return redirect('/panelhonorer')->with(['warning' => 'NIK / Password Salah']);
        }
    }

    public function proseslogouthonorer()
    {
        if (Auth::guard('honorer')->check()) {
            Auth::guard('honorer')->logout();
            return redirect('/panelhonorer');
        }
    }

    function index()
    {
        return view('auth.login');
    }


    function login(Request $request)
    {
        $request->validate([
            'email'     =>'required',
            'password'  =>'required'
        ],[
            'email.required'=>'Email Wajib diisi',
            'password.required'=>'Password Wajib diisi',
        ]);

        $infologin = [
            'email'     =>$request->email,
            'password'  =>$request->password,
        ];
        if (Auth::attempt($infologin)) {
            if(Auth::user()->role == 'admin') {
                return redirect('dashboardweb/admin');
            } elseif(Auth::user()->role == 'editor') {
                return redirect('dashboardweb/editor');
            }
        } else {
            return redirect('/login')->withErrors('Username dan Password yang dimasukkan tidak sesuai')->withInput();
        }
    }

    function logout()
    {
        Auth::logout();
        return redirect('/login');
    }

}
