<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Mail;
use Session;
use Redirect;

class MailController extends Controller
{
    public function store(Request $request)
    {
        Mail::Send('emails.subscribe', $request ->all(), function($smj){
            $smj->subject('Correo de Contacto');
            $smj->to('berserkersex@gmail.com');
        });
        Session::flash('message', 'Mensaje enviado correctamente');
        return back();
    }
}
