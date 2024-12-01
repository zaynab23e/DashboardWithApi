<?php
namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Admin;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;

class AdminLogin extends Controller
{
    public function Loginform()
    {
        return view('admin.login');
    }
//______________________________________________________________________________________________
    // public function register(Request $request)
    // {
    //     $validatedData = $request->validate([
    //         'name' => 'nullable|string',
    //         'email' => 'required|email|unique:admins',
    //         'password' => 'required|string',
    //     ]);
    //     $admin = Admin::create([
    //         'email' => $validatedData['email'],
    //         'password' => Hash::make($validatedData['password']),
    //     ]);
    //     return redirect()->route('admin.login');
    // }
//__________________________________________________________________________________________________________________________
    public function login(Request $request)
    {
        $validatedData = $request->validate([
            'email' => 'required|email|exists:admins,email',
            'password' => 'required',
        ]);
        $admin = Admin::where('email', $validatedData['email'])->first();
        if (!$admin || !Hash::check($validatedData['password'], $admin->password)) {
            return redirect()->route('login')->withErrors(['message' => 'Invalid credentials']);
        }
        Auth::login($admin);
        return redirect()->route('admin.doctors.index');
    }
//_________________________________________________________________________________________________________________________
    public function logout()
    {
        Auth::logout();
        return redirect()->route('login');
    }
    public function dash()
    {
       return view('dash');
    }
    //___________________________________________________________________________________________________________
}
