<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\ValidationException;
use Illuminate\Support\Facades\Hash;
use App\Models\User;

class AuthController extends Controller
{
    public function register(Request $request)
    {
        $request->validate([
            'first_name' => 'required|string|max:255',
            'last_name' => 'required|string|max:255',
            'email' => 'required|unique:users,email|email',
            'password' => 'required|string|min:8|confirmed'

        ]);

        $response = User::create([
            'first_name' => $request->first_name,
            'last_name' => $request->last_name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'email_verified_at' => now()
        ]);

        return response()->json([
            'message' => "Registerd Succesfully",
            'user' => $response,
        ]);
    }

    public function login(Request $request)
    {
        $fields = $request->validate([
            'email' => "required|email|exists:users,email",
            'password' => 'required|string'
        ]);
        $credentials = [
            'email' => $fields['email'],
            'password' => $fields['password'],

        ];

        if (!Auth::attempt($credentials)) {
            throw ValidationException::withMessages(["Invalid Credentials"]);
        }

        session()->regenerate();

        return response()->json([
            'message' => "Successfully Logedin",
            'user' => Auth::user(),
        ]);
    }

    public function logout()
    {
        Auth::guard('web')->logout();
        session()->invalidate();
        session()->regenerate();
        return response('Logged out', 204);
    }
}
