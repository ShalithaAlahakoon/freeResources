<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Course;
use App\Models\Award;
use App\Models\awardsandcourse;
use Illuminate\Support\Facades\DB;

class courseController extends Controller
{
    function showAll()
    {
        $data = Course::all();
        $AwordData = Award::all();
         return view('courses',['courses'=>$data,'awards'=>$AwordData]);
    }
    

    function addCourse(Request $req)
    {
        $req->validate(
            [
                'name' => "required ",
                'price' => "required "
            ]
        );
        if($file = $req->file('image')){
            $fileName = $file->getClientOriginalName();

            if($file->move('img',$fileName)){
                $course = new Course;
                $course->course_name = $req -> name;
                $course->price = $req -> price;
                $course->resource_type = $req -> rType;
                $course->award_id = $req -> awards;
                $course->url = $fileName;
                $course->save();
                return redirect('courses');
                
                
            }
        }
    }

    function deleteCourse($id)
    {
          $data=Course::find($id);
          $data->delete();
          return  redirect('courses');
     }

     function findCourseByID($id)
   {
         
         $data=  Course::find($id);
         return view('editCourse',['data'=>$data]);
    }

    // function SerchCourseByAwardId($id)
    // {
    //       echo   $awards; 
            
    //     //   $courses[]=  DB::table('courses')->whereIn('award_id',$awards)->get();
    //     //   return view('user',['courses'=>$courses]);
    //     // return response()->json([
    //     //     'success' => 'yes',
    //     //   ]);
    //     $data = DB::table('courses')->selectRaw('(Select course_name from courses where award_id = awards.id) as courseName')->whereRaw('award_id IN ('.$id.')')->get();

    //     echo json_encode($data);
    //  }

    
    function getCoursesByAwardingId(Request $request){
        $input = $request->all();
        \Log::info($input);
        $data = DB::table('courses')->whereIn('award_id',$input['id'])->get();
        echo json_encode($data);
        exit;
    }

    function getCourses(Request $request){
        $input = $request->all();
        \Log::info($input);
        $data = DB::table('courses')->whereIn('id',$input['id'])->get();
        echo json_encode($data);
        exit;
    }
    
    
    function updateCourse(Request $req)
    {
        
        if($file = $req->file('image')){
            $fileName = $file->getClientOriginalName();

            if($file->move('img',$fileName)){
                $course = Course::find($req->id);
                $course->course_name = $req -> name;
                $course->price = $req -> price;
                $course->resource_type = $req -> rType;
                $course->award_id = $req -> awards;
                $course->url = $fileName;
                $course->update();
                return  redirect('courses');
            }
        }else{
                $course = Course::find($req->id);
                $course->course_name = $req -> name;
                $course->price = $req -> price;
                $course->resource_type = $req -> rType;
                $course->award_id = $req -> awards;
                
                $course->update();
                return  redirect('courses');
        }
        
        
    }
}
