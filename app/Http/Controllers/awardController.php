<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Award;
use App\Models\Course;

class awardController extends Controller
{
    function showAll()
    {
        $data = Award::all();
         return view('awards',['awards'=>$data]);
    }

    function getAll()
    {
        $data = Award::all();
        return view('addCourse',['awards'=>$data]);
    }

    function addCourse(Request $req)
    {
        $req->validate(
            [
                'name' => "required ",
            ]
        );
        $Award = new Award;
        $Award->name = $req -> name;
        $Award->save();
        return redirect('awards');
    }

    function deleteAward($id)
    {
          $data=Award::find($id);
          $data->delete();
          return  redirect('awards');
     }

     function findAwardByID($id)
    {
        $data=  Award::find($id);
        return view('editAward',['data'=>$data]);
        
    }

    function updateAward(Request $req)
    { 
        $award = Award::find($req->id);
        $award->name = $req->name;
        $award->update();
        return  redirect('awards');
    }

    public function searchAwards()
    {
        $awards = \Input::get('awards');
        $courses = \Course::whereIn('award', $awards)->get();
        return \View::make('admin.empty')->with('courses',$courses);
    }

    //view all deleted record data
    function deletedAwards(){
        $Award = Award::select("*");
        $Award = $Award->onlyTrashed();
        $Award = $Award->paginate(8);
        return view('deletedAwards',['Award'=>$Award]);
    }

    //restore specific deleted record
    public function restore($id)
    {
        Award::withTrashed()->find($id)->restore();
        return back();
    } 
}
