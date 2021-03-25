<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $posts=Post::all();
        $last=DB::table('posts')->orderBy('created_at', 'desc')->first();
        return view('/home',compact('posts','last'));
    }
    public function post($id){
        $post=Post::find($id);
        return view('/post',compact('post'));
    }


    public function search(Request $request){
        $key = $request->input('key');

        $posts = Post::where('body', 'LIKE', '%' . $key . '%')->get();
        $last=DB::table('posts')->orderBy('created_at', 'desc')->first();

        return view('/home', compact('posts','last'));
    }
    
}
