<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use DB;
use App\Models\User;
class UsersController extends Controller
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

    public function index(){
        try {
            $users = DB::table('users')
            ->whereIn('role', ['assistance', 'admin'])
            ->paginate(10);
        return view('admin.users.index', compact('users'));        
        } catch (\Throwable $e) {
            return $e->getMessage();
        }
    }

    public function delete($id){
        try {
            DB::table('users')->where('id',$id)->delete();
            return redirect()->route('users.index')->with('deleteSuccess','delete success'); 
        } catch (\Throwable $th) {
            return $th->getMessage();
        }
    }

    public function update(Request $request)
    {
        try {
            DB::table('users')
            ->where('id', $request->id)
            ->update([
                'name' => $request->name,
                'email' => $request->email,
                'role' => $request->role,
            ]);
        
        return redirect()->route('users.index')->with('successUpdate', 'Course updated successfully');
        
        } catch (\Throwable $th) {
            return  $th->getMessage(); 
        }
    }

    public function updateView($id){
        try {
            $user = DB::table('users')->where('id',$id)->first();
            return view('admin.users.update',compact('user'));
        } catch (\Throwable $th) {
            return $th->getMessage(); 
        }
    }
    
    public function search(Request $request)
    {
        $query = $request->input('query'); // Get the search query from the form input
    
        // Search users by name (modify according to your table structure)
        $users = User::where('email', 'LIKE', "%$query%")
        ->whereIn('role', ['assistance', 'admin']) // Fetch only assistance or admin
        ->paginate(10);    
    
        // Return the search results to a view
        return view('admin.users.index',compact('users'));
    }
    
}
