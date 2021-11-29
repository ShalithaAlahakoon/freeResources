<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Course;
use App\Models\Award;
use App\Models\resource;
use Illuminate\Support\Facades\DB;

class adminController extends Controller
{
   function rederectToAdminPage(Request $req)
   {
       //retrive course data
       $course = new Course;
       $courses =$course->all();
       //course count
       $CourseCount = DB::table('courses')
       ->count('id');

       $rTypes = DB::table('courses')->distinct()->pluck('resource_type');

       //retrive award data
       $award = new Award;
       $awards = $award->all();

       //award count
       $AwardCount = DB::table('awards')
                ->count('id');
        
        //retrive award data
       $resource = new resource;
       $resources = $resource->all();

       //award count
       $resourceCount = DB::table('resources')
                ->count('id');

        //retrive user data
       $User = new User;
       $Users = $User->all();

       //user count
       $userCount = DB::table('users')
                ->count('id');

            

            return view("admin",['courses'=>$courses,'awards'=>$awards,'rTypes'=>$rTypes,'AwardCount'=>$AwardCount,'CourseCount'=>$CourseCount,'ResourceCount'=>$resourceCount,'userCount'=>$userCount]);
    
   }
}
