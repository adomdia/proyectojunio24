<?php

namespace App\Http\Controllers;

use App\Helpers\FlashHelper;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class ContactController extends Controller
{
    public function index (){
        return view('contacto');
    }
    public function sendContact (Request $request){

        // dd($request->all());
        $subject = "Nuevo contacto solicitado";
        $for =  config('app.email_destino_contacto');
       // return view ('mail.mail_contacto',$request->all()); ## Para probar vista
        Mail::send('mail.mail_contacto',$request->all(), function($msj) use($subject,$for){
            $msj->from(  env('MAIL_FROM_ADDRESS') ,"Contacto - NombreWeb");
            $msj->subject($subject);
            $msj->to($for);
        });
        FlashHelper::success("¡Su mensaje se ha enviado correctamente!");
        return redirect()->back();
    }
}
