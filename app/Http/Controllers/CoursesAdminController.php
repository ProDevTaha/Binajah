<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Log;
use Auth;
use Storage;
use App\Models\Temp;
use App\Models\Courses;
use DB;
use function Laravel\Prompts\alert;

class CoursesAdminController extends Controller
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
            $courses = DB::table('courses')
            ->paginate(10);
            return view('admin/courses/index' , compact('courses'));
        } catch (\Throwable $e) {
            return $e->getMessage();
        }
    }

    public function create(){
        try {
            return view('admin/courses/create');
        } catch (\Throwable $e) {
            return $e->getMessage();
        }
    }

    public function uploadvideos(Request $request){
        try {
            //$user = Auth::user();
            Log::info("<============= upload videos course started ==============>");
            if($request->file('img_course')){
                $image = $request->file('img_course');
                $originalFilename = $image->getClientOriginalName();
                $filename = pathinfo($originalFilename, PATHINFO_FILENAME) . '_' . time() . '.' . $image->getClientOriginalExtension();
                $folder = uniqid('video-',true);
                Storage::disk('public')->put('videos/tmp/'.$folder.'/'.$filename, file_get_contents($image));
                $tempImage = new  Temp();
                $tempImage->fill([
                    'folder' => $folder,
                    'file' => $filename,
                    //'user_id' => $user->user_id,
                ]);
                $tempImage->save();
                return  $filename;
            }else if($request->file('video1')){
                $image = $request->file('video1');
                $originalFilename = $image->getClientOriginalName();
                $filename = pathinfo($originalFilename, PATHINFO_FILENAME) . '_' . time() . '.' . $image->getClientOriginalExtension();
                $folder = uniqid('video-',true);
                Storage::disk('public')->put('videos/tmp/'.$folder.'/'.$filename, file_get_contents($image));
                $tempImage = new  Temp();
                $tempImage->fill([
                    'folder' => $folder,
                    'file' => $filename,
                    //'user_id' => $user->user_id,
                ]);
                $tempImage->save();
                return  $filename;
            }else if ($request->file('video2')){
                $image = $request->file('video2');
                $originalFilename = $image->getClientOriginalName();
                $filename = pathinfo($originalFilename, PATHINFO_FILENAME) . '_' . time() . '.' . $image->getClientOriginalExtension();
                $folder = uniqid('video-',true);
                Storage::disk('public')->put('videos/tmp/'.$folder.'/'.$filename, file_get_contents($image));
                $tempImage = new  Temp();
                $tempImage->fill([
                    'folder' => $folder,
                    'file' => $filename,
                    //'user_id' => $user->user_id,
                ]);
                $tempImage->save();
                return  $filename;
            }else if ($request->file('video3')){
                $image = $request->file('video3');
                $originalFilename = $image->getClientOriginalName();
                $filename = pathinfo($originalFilename, PATHINFO_FILENAME) . '_' . time() . '.' . $image->getClientOriginalExtension();
                $folder = uniqid('video-',true);
                Storage::disk('public')->put('videos/tmp/'.$folder.'/'.$filename, file_get_contents($image));
                $tempImage = new  Temp();
                $tempImage->fill([
                    'folder' => $folder,
                    'file' => $filename,
                    //'user_id' => $user->user_id,
                ]);
                $tempImage->save();
                return  $filename;
            }else if ($request->file('video4')){
                $image = $request->file('video4');
                $originalFilename = $image->getClientOriginalName();
                $filename = pathinfo($originalFilename, PATHINFO_FILENAME) . '_' . time() . '.' . $image->getClientOriginalExtension();
                $folder = uniqid('video-',true);
                Storage::disk('public')->put('videos/tmp/'.$folder.'/'.$filename, file_get_contents($image));
                $tempImage = new  Temp();
                $tempImage->fill([
                    'folder' => $folder,
                    'file' => $filename,
                    //'user_id' => $user->user_id,
                ]);
                $tempImage->save();
                return  $filename;
            }else if ($request->file('video5')){
                $image = $request->file('video5');
                $originalFilename = $image->getClientOriginalName();
                $filename = pathinfo($originalFilename, PATHINFO_FILENAME) . '_' . time() . '.' . $image->getClientOriginalExtension();
                $folder = uniqid('video-',true);
                Storage::disk('public')->put('videos/tmp/'.$folder.'/'.$filename, file_get_contents($image));
                $tempImage = new  Temp();
                $tempImage->fill([
                    'folder' => $folder,
                    'file' => $filename,
                    //'user_id' => $user->user_id,
                ]);
                $tempImage->save();
                return  $filename;
            }else if ($request->file('video6')){
                $image = $request->file('video6');
                $originalFilename = $image->getClientOriginalName();
                $filename = pathinfo($originalFilename, PATHINFO_FILENAME) . '_' . time() . '.' . $image->getClientOriginalExtension();
                $folder = uniqid('video-',true);
                Storage::disk('public')->put('videos/tmp/'.$folder.'/'.$filename, file_get_contents($image));
                $tempImage = new  Temp();
                $tempImage->fill([
                    'folder' => $folder,
                    'file' => $filename,
                    //'user_id' => $user->user_id,
                ]);
                $tempImage->save();
                return  $filename;
            }else if ($request->file('video7')){
                $image = $request->file('video7');
                $originalFilename = $image->getClientOriginalName();
                $filename = pathinfo($originalFilename, PATHINFO_FILENAME) . '_' . time() . '.' . $image->getClientOriginalExtension();
                $folder = uniqid('video-',true);
                Storage::disk('public')->put('videos/tmp/'.$folder.'/'.$filename, file_get_contents($image));
                $tempImage = new  Temp();
                $tempImage->fill([
                    'folder' => $folder,
                    'file' => $filename,
                    //'user_id' => $user->user_id,
                ]);
                $tempImage->save();
                return  $filename;
            }else if ($request->file('video8')){
                $image = $request->file('video8');
                $originalFilename = $image->getClientOriginalName();
                $filename = pathinfo($originalFilename, PATHINFO_FILENAME) . '_' . time() . '.' . $image->getClientOriginalExtension();
                $folder = uniqid('video-',true);
                Storage::disk('public')->put('videos/tmp/'.$folder.'/'.$filename, file_get_contents($image));
                $tempImage = new  Temp();
                $tempImage->fill([
                    'folder' => $folder,
                    'file' => $filename,
                    //'user_id' => $user->user_id,
                ]);
                $tempImage->save();
                return  $filename;
            }else if ($request->file('video9')){
                $image = $request->file('video9');
                $originalFilename = $image->getClientOriginalName();
                $filename = pathinfo($originalFilename, PATHINFO_FILENAME) . '_' . time() . '.' . $image->getClientOriginalExtension();
                $folder = uniqid('video-',true);
                Storage::disk('public')->put('videos/tmp/'.$folder.'/'.$filename, file_get_contents($image));
                $tempImage = new  Temp();
                $tempImage->fill([
                    'folder' => $folder,
                    'file' => $filename,
                    //'user_id' => $user->user_id,
                ]);
                $tempImage->save();
                return  $filename;
            }else if ($request->file('video10')){
                $image = $request->file('video10');
                $originalFilename = $image->getClientOriginalName();
                $filename = pathinfo($originalFilename, PATHINFO_FILENAME) . '_' . time() . '.' . $image->getClientOriginalExtension();
                $folder = uniqid('video-',true);
                Storage::disk('public')->put('videos/tmp/'.$folder.'/'.$filename, file_get_contents($image));
                $tempImage = new  Temp();
                $tempImage->fill([
                    'folder' => $folder,
                    'file' => $filename,
                    //'user_id' => $user->user_id,
                ]);
                $tempImage->save();
                return  $filename;
            }
        } catch (\Throwable $th){
            Log::info("<========== problem when user upload image :".$th->getMessage()."=======================>");
            return $th->getMessage(); 
        }
    }

    public function deletevideos($id){
        try {
            Log::info("<============= delete videos course started ==============>");
            $cours = DB::table('courses')->where('id', $id)->first();
            if ($cours) {
                $tableVideos =  $cours->niveaux.'_'.$cours->matier ; 
                DB::table($tableVideos)->where('id',$id)->delete();
                Storage::disk('public')->deleteDirectory('videos/courses/'.$cours->folder);
                DB::table('courses')->where('id', $id)->delete();
                return redirect()->route('courses.index')->with('successDelete', 'Cours deleted successfully');
            }
            return redirect()->route('courses.index')->with('error', 'Cours not found');

        } catch (\Exception $e) {
            Log::info("error when delete courses : " . $e->getMessage());
            return alert($e->getMessage());
        }
    }

    public function createCourse(Request $request)
    {
        try {

            $folderCourse = uniqid('course_', true);
            mkdir($folderCourse,  true);

            $course = new Courses();
            $course->title = $request->input('title');
            $course->matier = $request->input('matier');
            $course->niveaux = $request->input('niveaux');
            $course->discription = $request->input('discription');
            $course->statut = $request->input('statut');
            $course->created_by = Auth::user()->name;
            $course->folder = $folderCourse;
            $course->img_course = $request->input('img_course');
            $courseSaved = $course->save();
            $table = $request->input('niveaux') ."_".$request->input('matier');
            Log::info('table insert : '.$table); 
            if ($courseSaved) {
                for ($i = 1; $i <= 10; $i++) {
                    $title = $request->input("title$i");
                    $video = $request->input("video$i");
                    Log::info('title :'.$title.'and video :'.$video);
                    if ($title && $video) {
                        DB::table($table)->insert([
                            'id' => $course->id,
                            'title' => $title,
                            'video' => $video,
                            'created_at' => now(),
                            'updated_at' => now(),     
                        ]);
                    }
                }
            }
            $temps = Temp::get();
            foreach ($temps as $temp) {
                Log::info("start upload image");
                // Copy the image from the temporary directory to the permanent directory
                Storage::disk('public')->copy('videos/tmp/' . $temp->folder . '/' . $temp->file, 'videos/courses/'.$folderCourse. '/' . $temp->file);
            
                // Delete the temporary directory and its contents
                Storage::disk('public')->deleteDirectory('videos/tmp/' . $temp->folder);
    
                // Delete the temporary record
                $temp->delete();
            }
            
            DB::table('courses')->where('id', $course->id)->update(['videos_id' => $course->id]);

            return redirect()->route('courses.index')->with('successCreated', 'Course saved successfully!');

        } catch (\Throwable $th) {
            return  $th->getMessage(); 
        }
    }
    public function updateCours($id)
    {
        try {
            $cours = DB::table('courses')->where('id',$id)->first();
            return view('admin.courses.edit',compact('cours'));
        } catch (\Throwable $th) {
            return  $th->getMessage(); 
        }
    }

    public function update(Request $request)
    {
        try {
            DB::table('courses')
            ->where('id', $request->id)
            ->update([
                'title' => $request->title,
                'discription' => $request->discription,
                'niveaux' => $request->niveaux,
                'matier' => $request->matier,
                'statut' => $request->statut
            ]);
        
        return redirect()->route('courses.index')->with('success', 'Course updated successfully');
        
        } catch (\Throwable $th) {
            return  $th->getMessage(); 
        }
    }
    
}
