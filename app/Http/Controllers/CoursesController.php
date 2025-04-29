<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use Auth;
class CoursesController extends Controller
{


    public function preparePagePrimareCoures(Request $request){
        try {
            $niveau = $request->input('niveau');
            $matier = $request->input('matiere');
            $image = $request->input('image');
            
            $courses = DB::table('courses')
                ->where('niveaux', $niveau)
                ->where('matier', $matier)
                ->get();
            
            return view('primaireCourses', compact('courses','image','matier'));
            
        } catch (\Throwable $e) {
            return $e->getMessage();
        }
    }

    public function preparePageCollegeCoures(Request $request){
        try {
            $niveau = $request->input('niveau');
            $matier = $request->input('matiere');
            $image = $request->input('image');
            
            $courses = DB::table('courses')
                ->where('niveaux', $niveau)
                ->where('matier', $matier)
                ->get();
            
            return view('collegeCourses', compact('courses','image','matier'));
            
        } catch (\Throwable $e) {
            return $e->getMessage();
        }
    }
    
    public function pagePrimaireCourse($id,$matier){
        try {
            $user = null;
            $niveau = 3;
            $course = DB::table('courses')
            ->where('id', $id)
            ->first();
            
            $courseVideos = DB::table('pr_' . $matier)
            ->where('id', $id)
            ->get();
            
            if(Auth::user()){
                $user = DB::table('users')->where('id',Auth::user()->id)->first();
            }
            
            if($course->statut == 'pu'){
                $niveau = 1;
            }else if($course->statut == 'pr' && Auth::user() && $user->status == 'NON'){
                $niveau = 2;
            }else if($course->statut == 'pr' && Auth::user() && $user->status == 'OUI'){
                $niveau = 3;
            }else{
                $niveau = 4;
            }

            return view('coursesVideos', compact('course', 'courseVideos','niveau'));
            
        } catch (\Throwable $e) {
            return $e->getMessage();
        }
    } 

    public function pageCollegeCourse($id,$matier){
        try {
            
            $course = DB::table('courses')
            ->where('id', $id)
            ->first();
            
            $courseVideos = DB::table('cl_' . $matier)
            ->where('id', $id)
            ->get();
            
            return view('coursesVideos', compact('course', 'courseVideos'));
            
        } catch (\Throwable $e) {
            return $e->getMessage();
        }
    }
}
