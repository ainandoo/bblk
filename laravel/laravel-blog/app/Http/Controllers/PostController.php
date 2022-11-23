<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;


class PostController extends Controller
{
    public function index(){
        
        // melakukan kueri
        $posts = Post::latest()->paginate(5);

        return view('posts.index', compact('posts'));
    }
}
