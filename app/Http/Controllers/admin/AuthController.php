<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Admin;
use App\Models\AdminCodes;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;
use App\Models\User;

class AuthController extends Controller
{ 
    //______________________________________________________________________________________________________________
    public function register(Request $request)
    {
        $validatedData = $request->validate([
            'name' => 'nullable|string',
            'email' => 'required|email|unique:admins',
            'password' => 'required|string',
            ]);
            $admin = Admin::create([
            'email' => $validatedData['email'],
            'password' => Hash::make($validatedData['password']),
            ]);
            return response()->json(['message' => 'successfully']);
    }
    // Admin login_______________________________________________________________________________________________
    public function login(Request $request)
    {
            $validatedData = $request->validate([
            'email' => 'required|email',
            'password' => 'required',
            ]);
                $admin = Admin::where('email', $validatedData['email'])->first();
            if (!$admin || !Hash::check($validatedData['password'], $admin->password)) {
            return response()->json(['message' => 'Invalid credentials'], 401);
            }
        //___________________________________________________________________________________________________________
            $token = $admin->createToken('AdminToken')->plainTextToken;
            return response()->json([
            'message' => 'Login successful',
            'token' => $token
        ]);
    }
    // Admin logout__________________________________________________________________________________________________
    public function logout()
    {
            Auth::logout();
            return response()->json(['message'=> 'deleted']);
    }
    //______________________________________________________________________________________________________________

}

