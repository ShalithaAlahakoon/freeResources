<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Course;
use App\Models\Award;
use App\Models\resource;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\courseController;
use App\Http\Controllers\MailController;
use Illuminate\Support\Facades\DB;


class userAuth extends Controller
{
   public $userDetails;

    function userLogin(Request $req)
    {
        if(session()-> has('userName'))
        {

        }
        else{
            $req->validate(
                [
                    'email' => "required | email",
                    'password' => "required"
                ]
            );

        }

        //retrive course data
        $course = new Course;
        $courses =$course->all();
        $rTypes = DB::table('courses')->distinct()->pluck('resource_type');

        //course count
        $CourseCount = DB::table('courses')->count('id');

        //retrive award data
        $award = new Award;
        $awards = $award->all();
        //award count
       $AwardCount = DB::table('awards')->count('id');

       //retrive award data
       $resource = new resource;
       $resources = $resource->all();

       //award count
       $resourceCount = DB::table('resources') ->count('id');

        //retrive user data
        $user = new User;
        $usrType =DB::table('users')->distinct()->pluck('utype');
        $usrType = DB::table('users')->where('email', $req->email)->value('utype');
        $usrName = DB::table('users')->where('email', $req->email)->value('first_name');
        $password = DB::table('users')->where('email', $req->email)->value('password');

       //user count
       $userCount = DB::table('users')
                ->count('id');

        if($usrType == 'ADM' && $password == $req->password)
        {
            $req->session()->put('userType',$usrType);
            $req->session()->put('userName',$usrName);
            $req->session()->put('email',$req->email);

            return view("admin",['courses'=>$courses,'awards'=>$awards,'rTypes'=>$rTypes,'AwardCount'=>$AwardCount,'CourseCount'=>$CourseCount,'ResourceCount'=>$resourceCount, 'userCount'=>$userCount]);
        }
        else if($usrType == 'USR'  && $password == $req->password)
        {
            $req->session()->put('userType',$usrType);
            $req->session()->put('userName',$usrName);
            $req->session()->put('email',$req->email);

          
            return view("userView",['courses'=>$courses,'awards'=>$awards,'rTypes'=>$rTypes]);
        }
        else
        {
            if($password != $req->password){
                $req->validate(
                    [
                        'password' => "password"
                    ]);
            }else{
                echo  "You should register first before login or check your credentials";
            }
        }

        
        
    }

    function userSignUp(Request $req)
    {
        $req->validate(
            [
                'firstName' => "required | min:3",
                'lastName' => "required | min:3",
                'email' => "required |  email",
                'password' => "required | min:5"
            ]
        );

        $user = new User;
        $user->first_name = $req ->firstName;
        $user->last_name = $req ->lastName;
        $user->email = $req ->email;
        $user->password = $req ->password;
        $user->save();

        $userDetails= [
            'userMail'=>$req ->email,
            'userName'=> $req ->firstName
        ];

        
        $req->session()->put('userFName',$req ->firstName);
        $req->session()->put('userMail',$req ->email);

         echo '<script>alert("User successfully registerd");</script>';

       return redirect('/send-email');
    }

}
