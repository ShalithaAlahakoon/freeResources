<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\userAuth;
use App\Http\Controllers\courseController;
use App\Http\Controllers\awardController;
use App\Http\Controllers\adminController;
use App\Http\Controllers\resourcesController;
use App\Http\Controllers\AjaxController;
use App\Http\Controllers\MailController;
use App\Models\Course;
use App\Models\Award;
use App\Models\resource;
use App\Models\user;


/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('home');
});



Route::post('user',[userAuth::class,'userLogin']);
Route::post('signup',[userAuth::class,'userSignUp']);


Route::view('courses','courses');
Route::view('admin','admin');
Route::view('user','userView');
Route::view('awards','awards');
Route::view('resources','resource');
Route::view('deletedCourses','deletedeCourses');
Route::view('deletedAwards','deletedAwards');
Route::view('deletedResource','deletedResource');
Route::view('home','home');

//testing group middleware
// Route::group(['middleware'=>['protectedPages']],function(){
//     Route::get('/courses', [courseController::class,'showAll']);
// });

// course controlles routes
Route::get('/courses', [courseController::class,'showAll']);
Route::post('save',[courseController::class,'addCourse']);
Route::get('delete/{id}',[courseController::class,'deleteCourse']);
Route::get('find/{id}',[courseController::class,'findCourseByID']);
Route::post('updateCourse',[courseController::class,'updateCourse']);
Route::post('SerchCourse',[courseController::class,'SerchCourse']);
Route::get('SerchCourseByAwardId',[courseController::class,'SerchCourseByAwardId']);
Route::get('getCoursesByAwardingId',[courseController::class,'getCoursesByAwardingId']);
Route::get('getCourses',[courseController::class,'getCourses']);
Route::get('getCoursesfromResource',[courseController::class,'getCoursesfromResource']);
Route::get('viewDeletedCourses',[courseController::class,'deletedeCourses']);
Route::get('restoreDeletedCourse/{id}',[courseController::class,'restore']);

// Award controlles routes
Route::view('addAward','addAward');
Route::get('/awards', [awardController::class,'showAll']);
Route::get('add',[awardController::class,'getAll']);
Route::post('saveAward',[awardController::class,'addCourse']);
Route::get('deleteAward/{id}',[awardController::class,'deleteAward']);
Route::get('findAward/{id}',[awardController::class,'findAwardByID']);
Route::get('viewDeletedAward',[awardController::class,'deletedAwards']);
Route::get('restoreDeletedAward/{id}',[awardController::class,'restore']);
Route::post('updateAward',[awardController::class,'updateAward']);

//resource controller routes
Route::post('/store',[resourcesController::class,'store']);
Route::get('/resources',[resourcesController::class,'showAll']);
Route::get('deleteResource/{id}',[resourcesController::class,'delete']);
Route::post('updateResource',[resourcesController::class,'update']);
Route::get('viewDeletedResource',[resourcesController::class,'deletedResource']);
Route::get('restoreDeleteResource/{id}',[resourcesController::class,'restore']);

//adminPage
Route::get('adminPage',[adminController::class,'rederectToAdminPage']);
Route::get('/logout', function () {
    if(session()-> has('userName'))
    {
        session()->pull('userName');
        session()->pull('userType');

    }

    return view('home');
});

//course soft delete functions
Route::get("softdeleteCourse", function(){
    Course::find(2)->delete();
 });
Route::get("get_deleted_recordCourse", function(){
    return Course::onlyTrashed()->get();
});
Route::get("restoreCourse", function(){
    Course::withTrashed()->restore();
    return  redirect('viewDeletedCourses');
});
Route::get("forcedeleteCourse", function(){
    Course::withTrashed()->find(1)->forceDelete();  
});

 //Award soft delete functions
 Route::get("softdeleteAward", function(){
    Award::find(2)->delete();
 });
 Route::get("get_deleted_recordAward", function(){
    return Award::onlyTrashed()->get();
 });
Route::get("restoreAward", function(){
    Award::withTrashed()->restore();
    return  redirect('awards');
});
Route::get("forcedeleteAward", function(){
    Award::withTrashed()->find(1)->forceDelete();
 });

 //resource soft delete functions
 Route::get("softdeleteresource", function(){
    resource::find(2)->delete();
 });
 Route::get("get_deleted_recordresource", function(){
    return resource::onlyTrashed()->get();
 });
Route::get("restoreresource", function(){
    resource::withTrashed()->restore();
    return  redirect('viewDeletedResource');
});
Route::get("forcedeleteresource", function(){
    resource::withTrashed()->find(1)->forceDelete();
 });

 //users soft delete functions
 Route::get("softdeleteusers", function(){
    Award::find(2)->delete();
 });

Route::get('/send-email',[MailController::class,'sendEmail']);
