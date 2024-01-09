<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\View;
use Illuminate\Support\Str;

use App\Models\UserContent;

class UserController extends Controller
{
    public function showProfile()
    {
        $user = Auth()->user();
        $publicaciones = UserContent::orderBy('created_at', 'desc')->get()->where('user_id', $user->id);
        return view('perfil', compact('user', 'publicaciones'));
    }

    public function showGuestProfile($id)
    {
        $user = User::get()->where('id', $id)->first();
        $publicaciones = UserContent::orderBy('created_at', 'desc')->get()->where('user_id', $user->id);
        return view('perfil', compact('user', 'publicaciones'));
    }

    public function editProfile()
    {
        $user = Auth()->user();
        return view('edit_perfil', compact('user'));
    }

    public function updateProfile(Request $request)
    {
        // dd($request);
        $validator = Validator::make($request->all(), [
            'nick' => 'string|max:155',
            'email' => 'nullable|string|email|max:255|unique:users,email,'.Auth::id(),
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
                $myuser->name = $request->nick;
                if($request->email != null){
                    $myuser->email = $request->email; 
                }
                $myuser->save();
                

                $user = Auth()->user();
                return redirect()->route('user_profile')->with(compact('user'));
            }
        }
    }
}
