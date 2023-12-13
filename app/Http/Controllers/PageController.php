<?php

namespace App\Http\Controllers;

use App\Models\Page;
use Illuminate\Http\Request;
use Illuminate\View\View;

class PageController extends Controller
{
    public function index(){
       $pages=Page::all();
        return view('pages.index',compact('pages'));
    }
    public function showPage($slug){
        $page=Page::where('slug',$slug)->first();
        return view('pages.single',compact('page'));

    }
}
