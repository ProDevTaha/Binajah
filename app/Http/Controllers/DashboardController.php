<?php
namespace App\Http\Controllers;

use DB;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class DashboardController extends Controller
{
    public function __construct()
    {
        $this->middleware(function ($request, $next) {
            if (!Auth::check()) {
                Auth::logout();
                return redirect()->route('auth.login')->with('error', 'You must be logged in.');
            }
    
            // Check if user has the correct role
            if (!in_array(Auth::user()->role, ['admin', 'assistance'])) {
                return redirect()->route('auth.login')->with('error', 'Access denied.');
            }
    
            return $next($request);
        });
    }

    public function index()
    {
        try {
            $studets = DB::table('users')->where('role', 'etudiant')->count();
            $studets_ins = DB::table('users')
            ->where('status','OUI')
            ->where('role', 'etudiant')->count();
            return view('admin/dashboard',compact('studets','studets_ins'));
        } catch (\Throwable $e) {
            return $e->getMessage();
        }
    }
}
