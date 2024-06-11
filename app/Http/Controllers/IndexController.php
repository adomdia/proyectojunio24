<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\HomeContent;
use App\Models\HomeValore;

use App\Models\UserContent;
use App\Models\AddBanner;
use App\Models\AmistadContent;
use App\Models\User;
use App\Models\Service;
use App\Models\OwnedService;
class IndexController extends Controller
{
    public function index(){
        $content = HomeContent::get()->first();
        $valores = HomeValore::get()->all();

        return view('index', compact('content', 'valores'));
    }


    public function home(){
        if (!auth()->id()){
            return redirect()->route('index');
        } else {
            $amigosIds = AmistadContent::where('user_id_1', auth()->id())
            ->orWhere('user_id_2', auth()->id())
            ->get()
            ->pluck('user_id_1')
            ->merge(AmistadContent::where('user_id_2', auth()->id())->get()->pluck('user_id_2'))
            ->unique();
    
            $publicaciones = UserContent::whereIn('user_id', $amigosIds)
            ->where('user_id', '!=', auth()->id())                
            ->get();

            $ownedServices = OwnedService::where('user_id', Auth()->user()->id)->pluck('service_id');

            $servicios = Service::where('user_id', '!=', Auth()->user()->id)->whereNotIn('id', $ownedServices)->get();

            $adds = AddBanner::all();
    
            return view('home', compact("publicaciones", 'servicios', 'adds'));
        }
    }

    public function getUsers(Request $request)
    {          
        $query = $request->input('query');
        $loggedInUserId = auth()->id();


        $usuarios = User::where('name', 'like', "%$query%")->where('id', '!=', $loggedInUserId)->get();

        $usuarios = User::where('name', 'like', "%$query%")
            ->where(function ($query) use ($loggedInUserId) {
                $query->whereRaw("FIND_IN_SET(?, REPLACE(REPLACE(REPLACE(bloqued_users, '[', ''), ']', ''), '\"', '')) = 0", [$loggedInUserId])
                    ->orWhereNull('bloqued_users');
            })
            ->where('id', '!=', $loggedInUserId)
            ->pluck('name', 'id');



        return response()->json($usuarios);
    }
}
