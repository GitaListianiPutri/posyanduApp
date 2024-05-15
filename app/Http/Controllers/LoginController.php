<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class LoginController extends Controller
{
    public function index()
    {
        return view('auth.login');
    }

    public function login_proses(Request $request) {
        $request->validate([
            'email' => 'required',
            'password' => 'required',
        ]);
    
        // Retrieve the credentials
        $credentials = $request->only('email', 'password');
    
        if(Auth::attempt($credentials)){
            // Check the role of the authenticated user
            if(Auth::user()->hasRole('admin')) {
                return redirect()->route('admin.dashboard');
            } elseif(Auth::user()->hasRole('peserta')) {
                return redirect()->route('peserta.dashboard');
            } else {
                // Handle other roles if necessary
            }
        } else {
            return redirect()->route('login')->with('failed', 'Email atau password salah!');
        }
    }
    

    public function logout() {
        Auth::logout();
        return redirect()->route('login')->with('success', 'Anda telah logout!');
    }

    public function register(){
        return view('auth.register');
    }

    public function register_proses(Request $request) {
        $request->validate([
            'name' => 'required|max:255',
            'email' => 'required|email|unique:users,email',
            'password' => 'required|min:6',
        ]);

        
        $data['name'] = $request->name;
        $data['email'] = $request->email;
        $data['password'] = Hash::make( $request->password);

        // simpan data ke database
        $user = User::create($data);
        $user->assignRole('peserta');
        // arahkan ke halaman login
         // menyimpan data login
         $login = [
            'email' => $request->email,
            'password' => $request->password
        ];

        if(Auth ::attempt($login)){
            return redirect()->route('peserta.dashboard');
        }else{
            return redirect()->route('login')->with('failed', 'Email atau password salah!');
        }
    }
}
