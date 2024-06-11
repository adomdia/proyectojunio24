<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Str;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use App\Helpers\FlashHelper;
use Illuminate\Support\Facades\Mail;
use App\Http\Controllers\IndexController;
use Illuminate\Support\Facades\Hash;

use App\Models\HomeContent;
use App\Models\HomeValore;



class AuthController extends Controller
{
    function index(){
        return view('reg');
    }

    function acceder(){
        return view('log');
    }

    function validar(){
        return view('validate_code');
    }


    function store(Request $request){

        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users',
            'password' => 'required|string|confirmed|min:8'
        ]);

        $emailCode = strtoupper(Str::random(8));


        $user = new User([
            'name' => $request->name,
            'email' => $request->email,
            'password' => bcrypt($request->password),
            'email_code' => $emailCode,
            'is_email_verified' => false,
            'role_id' => '2'
        ]);

        $user->save();

    //     $data = [
    //         'email' => $user->email,
    //         'code' => $user->email_code
    //     ];

    //     $subject = 'Código de verificación para su usuario';
    //     $for =  $user->email;
    //    // return view ('mail.mail_contacto',$request->all()); ## Para probar vista
    //     Mail::send('mail.mail_code',$data, function($msj) use($subject,$for){
    //         $msj->from(  env('MAIL_FROM_ADDRESS') ,"Código de confirmación - PlayTogether");
    //         $msj->subject($subject);
    //         $msj->to($for);
    //     });

        return redirect()->route('index');
    }

    function login(Request $request){
        $user = User::get()->where('email', $request->email)->first();
        if($user->is_email_verified == 1){
            if((Hash::check($request->password, $user->password))){
                Auth::login($user);
                return redirect()->route('home');
            } else {
                FlashHelper::warning('La contraseña no coincide con nuestra base de datos.');
                return redirect()->route('index');
            }
        } else {
            FlashHelper::warning('El email proporcionado no tiene verificado su código de confirmación.');
            return redirect()->route('index');
        }


    }

    function validar_code(Request $request){
        $user = User::get()->where('email', $request->email)->first();
        if($user == null){
            FlashHelper::warning('El email proporcionado no pertenece a ningún usuario registrado en nuestra base de datos');
            return redirect()->route('index');
        } elseif ($user->is_email_verified == true){
            FlashHelper::warning('El email proporcionado ya tiene validado su código de confirmación. Acceda con su contraseña.');
            return redirect()->route('index');
        } else {
            if($user->email_code == $request->code){
                $user->is_email_verified = true;
                $user->save();
                Auth::login($user);


                return redirect()->route('home');
            } else {
                FlashHelper::warning('El código de verificación no es correcto');
                return redirect()->route('index');
            }
        }
    }
}
