<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\HomeContent;
use App\Models\HomeValore;

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
            return view('home');
        }
    }
}
