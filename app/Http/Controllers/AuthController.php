<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Hash;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    protected function register(Request $request)
    {
        // Validate input
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:users,email',
            'tel' => 'required|digits_between:10,15',
            'password' => 'required|min:8',
            'role' => 'required|in:admin,assistance,etudiant',
        ]);
    
        try {
            // Create the student
            User::create([
                'name' => $request->name,
                'email' => $request->email,
                'password' => Hash::make($request->password),
                'role' => $request->role,
            ]);
    
            return redirect()->route('users.index')->with('successRegister', 'Register success');
        } catch (\Throwable $th) {
            return redirect()->back()->with('error', 'Une erreur est survenue: ' . $th->getMessage());
        }
    
        
    }     
    
    public function login(Request $request)
    {
        $credentials = $request->validate([
            'email' => 'required|email',
            'password' => 'required|min:8',
        ]);
    
        if (Auth::attempt($credentials)) {
            $request->session()->regenerate();
            $user = Auth::user();
            if($user->role === 'admin' || $user->role === 'assistance' ){
                return redirect()->route('admin.dashboard')->with('success', 'Welcome to your dashboard!');
            }else{
                $name = $user->name;
                return redirect()->route('home');
            }
        } 
    
        return back()->withErrors([
            'email' => 'Invalid login credentials.',
        ])->onlyInput('email');
    }
    
    public function logout(Request $request){
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect('/')->with('success', 'Logged out successfully.');
    }

    public function createUserView(){
        try {
            return view('auth.register');
        } catch (\Throwable $th) {
            return $th->getMessage(); 
        }
    }

    public function loginview(){
        try {
            return view('auth.login');
        } catch (\Throwable $th) {
            return $th->getMessage();
        }
    }

    public function createTest(){
        return 'fin azin';
    }

}
