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

    public function create(){
        return view('posts.create');
    }

    public function store(Request $request) {
        // proses validasi form
        $this->validate($request, [
            'gambar' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'judul' => 'required|min:5',
            'konten' => 'required|min:10'
        ]);

        // proses upload gambar
        $gambar = $request -> file('gambar');
        $gambar -> storeAs('public/posts', $gambar ->hashName());

        // kueri membuat post
        Post::create([
            'gambar' => $gambar ->hashName(),
            'judul' => $request -> judul,
            'konten' => $request -> konten
        ]);

        return redirect() -> route('posts.index') -> with(['success' => 'Data berhasil disimpan!']);
    }
}
