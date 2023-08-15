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

        return redirect("/");
    }

    /* Logout */
    public function logout() {
        auth()->logout();

        return redirect("/");
    }
}
