<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use App\Models\User;
use Hash;
use DB;
class EtudientController extends Controller
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
            $students = DB::table('users')->where('role','etudiant')->paginate(10);
           return view('admin.students.index',compact('students'));
        } catch (\Throwable $th) {
           return $th->getMessage();
        }
    }

    public function createView(){
        try {
            return view('admin.students.create');
        } catch (\Throwable $th) {
            return $th->getMessage();
        }
    }

    public function create(Request $request)
    {
        // Validate input
        $request->validate([
            'name' => 'required|string|max:255',
            'status' => 'required',
            'email' => 'required|email|unique:users,email',
            'tel' => 'required|digits_between:10,15',
            'password' => 'required|min:8',
        ]);
    
        try {
            // Create the student
            User::create([
                'name' => $request->name,
                'email' => $request->email,
                'tel' => $request->tel,
                'password' => Hash::make($request->password),
                'role' => 'etudiant',
                'status' => $request->status,
            ]);
    
            return redirect()->route('students.index')->with('successRegister', 'L\'étudiant a été ajouté avec succès!');
        } catch (\Throwable $th) {
            return redirect()->back()->with('error', 'Une erreur est survenue: ' . $th->getMessage());
        }
    }


    public function delete($id){
        try {
            DB::table('users')->where('id',$id)->delete();

            return redirect()->route('students.index')->with('successDelete','successDelete');
        } catch (\Throwable $th) {
            return $th->getMessage();
        }
    }
    

    public function search(Request $request)
    {
        $query = $request->input('query'); // Get the search query from the form input
    
        // Search users by name (modify according to your table structure)
        $students = User::where('email', 'LIKE', "%$query%")
        ->where('role','etudiant')
        ->paginate(10);
    
        // Return the search results to a view
        return view('admin.students.index',compact('students'));
    }

    public function updateView($id){
       try {
        $student = DB::table('users')->where('id',$id)->first();
        return view('admin.students.update',compact('student'));
       } catch (\Throwable $th) {
        return  $th;
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
                'tel' => $request->tel,
                'status' => $request->status
            ]);
        
            return redirect()->route('students.index')->with('successUpdate', 'Course updated successfully');
        
        } catch (\Throwable $th) {
            return  $th->getMessage(); 
        }
    }

}
