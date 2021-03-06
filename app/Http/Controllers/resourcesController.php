<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\resource;
use App\Models\Course;
class resourcesController extends Controller
{
    function showAll()
    {
        $data = resource::all();
        $CourseData = Course::all();
        return view('resource',['resources'=>$data , 'CourseData'=>$CourseData]);
    }
    
    function store(Request $req){

        $req->validate(
            [
                'name' => "required ",
                'file' => "required | file"
            ]
        );

        if($file = $req->file('file')){
            $fileName = $file->getClientOriginalName();

            if($file->move('resource',$fileName)){
                $resource = new resource();
                $resource->name = $req -> name;
                $resource->url = $fileName;
                $resource->course_id = $req -> course;
                $resource->save();
                return redirect('resources');
                }
        }

    }
    function delete($id)
    {
          $data=resource::find($id);
          $data->delete();
          return  redirect('resources');
     }

     function update(Request $req)
    {
        $resource = resource::find($req->id);
        $resource->name = $req -> name;
        $resource->course_id = $req -> course;
        $resource->update();
        return  redirect('resources');
    }

    //view all deleted records
    function deletedResource(){

        $resource = resource::select("*");
        $resource = $resource->onlyTrashed();
        $resource = $resource->paginate(8);
        return view('deletedResource',['resources'=>$resource]);
        
    }
    //restore specific deleted records
    public function restore($id)
    {
        resource::withTrashed()->find($id)->restore();
        return back();
    } 
}
