<?php
 
namespace App\Http\Controllers;
 
use Illuminate\Http\Request;
 
use App\Mail\ForgotPasswordMail;
use Illuminate\Support\Facades\Mail;

class SendEmailController extends Controller
{
     
    public function index()
    {
 
      Mail::to('wickj9211@gmail.com')->send(new ForgotPasswordMail('wickj9211@gmail.com'));
 
      if (Mail::failures()) {
           return response('Sorry! Please try again latter', 403);
      }else{
           return response('Great! Successfully send in your mail', 200);
         }
    } 
}