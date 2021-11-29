<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\userAuth;
use App\Http\Controllers\courseController;
use App\Http\Controllers\awardController;
use App\Http\Controllers\adminController;
use App\Http\Controllers\resourcesController;
use App\Http\Controllers\AjaxController;



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

Route::view('login','login');

Route::post('user',[userAuth::class,'userLogin']);
Route::post('signup',[userAuth::class,'userSignUp']);


Route::view('signUp','signUp');
Route::view('courses','courses');
Route::view('success','success');
Route::view('admin','admin');
Route::view('user','userView');
Route::view('awards','awards');
Route::view('resources','resource');
Route::view('test','test');

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
// Route::get('SerchCourseByAwardId/{Award}','courseController@SerchCourseByAwardId');


// Award controlles routes
Route::view('addAward','addAward');
Route::get('/awards', [awardController::class,'showAll']);
Route::get('add',[awardController::class,'getAll']);
Route::post('saveAward',[awardController::class,'addCourse']);
Route::get('deleteAward/{id}',[awardController::class,'deleteAward']);
Route::get('findAward/{id}',[awardController::class,'findAwardByID']);
Route::post('updateAward',[awardController::class,'updateAward']);

//resource controller routes

Route::post('/store',[resourcesController::class,'store']);
Route::get('/resources',[resourcesController::class,'showAll']);
Route::get('deleteResource/{id}',[resourcesController::class,'delete']);
Route::post('updateResource',[resourcesController::class,'update']);

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



