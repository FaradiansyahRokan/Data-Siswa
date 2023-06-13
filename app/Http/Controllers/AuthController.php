<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Storage;

class AuthController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function login()
    {
        return view('auth.login');
    }

    public function authenticate(Request $request)
    {
        // mengambil nilai email dan password dari objek $request yang dikirimkan oleh pengguna saat mengirimkan form login.
        $credentials = $request->only('email', 'password');
        // melakukan pemeriksaaan apakah kombinasi email dan password yang diinputkan pengguna sesuai dengan data yang tersimpan dalam database.
        if (Auth::attempt($credentials)) {
            // jika berhasil menampilkan pesan Welcom
            return redirect('siswa')->with('success', 'Welcome!');
        } else {
            // jika gagal menampilkan pesan error
            return redirect('login')->with('error_message', 'Invalid Email or Password');
        }
    }

    public function logout()
    {
        //  memutuskan session login yang sedang aktif untuk pengguna yang sedang terautentikasi.
        Auth::logout();
        // menghapus semua data session yang tersimpan pada server
        Session::flush();
        // biar bisa balik lagi ke halaman login kalo udah logout
        return redirect('login')->with('logout_message', 'You have been logged out');
    }

    public function register_form()
    {
        return view('auth.register');
    }

    public function register(Request $request)
    {
        $request->validate([
            'name' => 'required|min:3|max:20',
            'email' => 'required|email|unique:users',
            'password' => 'required|min:6|confirmed'
        ]);

        User::create([
            'name' => $request->input('name'),
            'email' => $request->input('email'),
            'password' => Hash::make($request->input('password'))
        ]);

        return redirect('login');
    }
}