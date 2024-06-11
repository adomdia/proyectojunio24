<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\ForoContent;
use App\Models\SubForoContent;

class ForoContentController extends Controller
{
    public function index(){
        $foros = ForoContent::all();
        return view('foro', compact('foros'));
    }

    public function subforo($id){
        $subforos = SubForoContent::where('foro_id', $id)->get();
        $foro = ForoContent::where('id', $id)->get()->first();

        return view('subforo', compact('subforos', 'foro'));
    }
}
