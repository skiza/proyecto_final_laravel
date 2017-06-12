<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ContactController extends Controller
{
    public function sendEmail(Request $request){

        $message=$request->message;
        
        $title= "Name: ".$request->name.", Email: ".$request->email;
        
        mail('fitandup@gmail.com', $title, $message );
        
        $action_status = 'El correo se ha enviado satisfactoriamente. Espere la respuesta en unos pocos días';
        
        return redirect(nt_route('contact-'.user_lang()))->with('action_status', $action_status);
        /*bool mail ( string $to , string $subject , string $message [, string $additional_headers [, string $additional_parameters ]] )*/
    }
}
