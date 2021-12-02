<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use App\Mail\MailClass;

class MailController extends Controller
{
    

    public function sendEmail()
    {
         $userFname = session()->get('userFName');
         $userMail = session()->get('userMail');

        $details = [
            'title' => 'Mail from  global edulink free resource test page',
            'body' => 'this is testing mail using gmail',
            'userName'=>  $userFname ,
            'userMail'=> $userMail
        ];

        Mail::to($userMail)->send(new MailClass($details));
        Mail::to('shalitha97068@gmail.com')->send(new MailClass($details));

        return view('home');
    }
}
