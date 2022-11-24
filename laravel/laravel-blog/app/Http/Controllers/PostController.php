<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

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

    public function show($id) {

        $post = Post::find($id);
        return view('posts.show', compact('post'));
    }

    public function edit(Post $post){
        return view ('posts.edit', compact('post'));
    }

    public function update(Request $request, Post $post){
        $this->validate($request, [
            'gambar' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'judul' => 'required|min:5',
            'konten' => 'required|min:10'
        ]);

        if ($request -> hasFile('gambar')) {
            $image = $request -> file('gambar');
            $image -> storeAs('public/posts', $image -> hashName());

            Storage::delete('public/posts' . $post -> gambar);

            $post -> update([
                'gambar' => $image -> hashName(),
                'judul' => $request -> judul,
                'konten' => $request -> konten
            ]);
        } else {
            $post -> update([
                'judul' => $request -> judul,
                'konten' => $request -> konten
            ]);
        }
        return redirect() -> route('posts.index') -> with(['success' => 'Data berhasil diubah!']); 
    }

    public function destroy(Post $post){
        Storage::delete('public/posts' . $post -> gambar);
        $post -> delete();
        return redirect() -> route('posts.index') -> with(['success' => 'Data berhasil dihapus!']);
    }
}
