<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    /* Homepage */
    public function showHomepage() {
        if(auth()->check()) {
            return view('loggedin_homepage');
        } else {
            return view('homepage');
        }
    }

    /* Register */
    public function showRegisterPage() {
        return view('register_page');
    }

    public function register(Request $request) {
        $validatedReq = $request->validate([
            'fullname' => ['required', 'min:3'],
            'role' => ['required'],
            'username' => ['required','min:3', Rule::unique('users', 'username')],
            'password' => ['required', 'min:8', 'confirmed']
        ]);

        // Hash the password
        $validatedReq['password'] = Hash::make($validatedReq['password']);

        // Store it in database
        $newUser = User::create($validatedReq);

        // Log in the user automatically
        auth()->login($newUser);

        return redirect("/")->with('success', 'Akun berhasil dibuat');
    }

    /* Login */
    public function login(Request $request) {
        $validatedReq = $request->validate([
            'username_login' => ['required'],
            'password_login' => ['required']
        ]);

        if(auth()->attempt(['username'=>$validatedReq['username_login'], 'password'=>$validatedReq['password_login']])) {
            $request->session()->regenerate();
            
            return redirect("/")->with('success', 'Berhasil Login');
        } else {
            return redirect("/")->withErrors(['login_failed'=>'Username atau password tidak cocok']);
        }

    }

    /* Logout */
    public function logout() {
        auth()->logout();

        return redirect("/")->with('success', 'Berhasil Log out');
    }
}
