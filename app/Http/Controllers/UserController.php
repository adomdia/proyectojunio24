<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Str;

class UserController extends Controller
{
    public function showProfile()
    {
        $user = Auth()->user();
        return view('edit_user', compact('user'));
    }

    public function updateProfile(Request $request)
    {

        $validator = Validator::make($request->all(), [
            'avatar' => 'nullable|image|max:2000',
            'name_lastname' => 'required|string|max:155',
            'telefono' => 'nullable|numeric',
            'email' => 'required|string|email|max:255|unique:users,email,'.Auth::id(),
            'password' => 'nullable|max:255|confirmed',
        ]);
        if ($validator->fails()) {
            return response()->json(['status' => 'error_validación', 'message' => 'Los datos introducidos no son válidos.'],500);
        } else {
            $myuser = User::find(Auth::id());
            if ($myuser) {
                $rutaImg = null;
                if ($request->file('avatar')) {
                    if (Storage::disk('public')->exists($myuser->avatar)) {
                        if($myuser->avatar!='users/default.png'){
                            Storage::disk('public')->delete($myuser->avatar);
                        }
                    }
                    $month = date('F');
                    $year = date('Y');
                    $imagen = $request->file('avatar');
                    $nombreImg = Str::random(10) . time();
                    $extension = $imagen->clientExtension();
                    $nombreCompletoImg = $nombreImg . "." . $extension;
                    $path_avatar = 'users/' . $month . $year . '/' . $nombreCompletoImg;
                    $imagen->storeAs('public/users/' . $month . $year, $nombreCompletoImg);
                    $myuser->avatar = $path_avatar;
                }

                if($request->password){
                    $myuser->password = Hash::make($request->password);
                }
                $myuser->name = $request->name_lastname;
                $myuser->email = $request->email;
                $myuser->save();
                return response()->json(['status' => 'ok', 'message' => 'Datos actualizados con éxito.']);
            }
        }
    }
}
