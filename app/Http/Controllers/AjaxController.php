<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Mail;

class AjaxController extends Controller
{
    public function send(Request $request){
        $data = array(
                        'name'=>$request->name,
                        'email'=>$request->email,
                        'phone'=>$request->phone, 
                        'messagetext'=>$request->message
                    );
        
        Mail::send('contacttext', $data, function ($message) use ($request){
            /* Config ********** */
            $to_email = "shubham.mandyweb@gmail.com";
            $to_name  = "Shubham goel";
            $subject  = "Laravel Ajax Form Message";
            $message->subject ($subject);
            $message->from ($request->email, $request->name);
            $message->to ($to_email, $to_name);
        });
        if(count(Mail::failures()) > 0){
            $status = 'error';
        } else {
            $status = 'success';
        }
        return response()->json(['response' => $status]);
    }

}
