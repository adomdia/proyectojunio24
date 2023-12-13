<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;

class PostController extends Controller
{
    public function index(){
        $posts = Post::all();
        return view('posts.index',compact('posts'));
    }
    public function single($slug){
        $post = Post::where('slug',$slug)->first();
        if($post){
            return view('posts.single',compact('post'));
        }else{
            return redirect()->back();
        }
    }
}
