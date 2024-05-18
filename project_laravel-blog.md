### Langkah-langkah membuat project: Laravel blog

1. Jalankan perintah berikut satu per satu:

```console
composer create-project laravel/laravel laravel-blog
```
```console
cd laravel-blog
```
```console
php artisan storage:link
```

2. Buat database kosong di PHPMyAdmin atau aplikasi database client yang digunakan

3. Edit file .env, isi konfigurasi DB_DATABASE dengan nama database dan setup database server

4. Buat model Post,
```console
php artisan make:model Post -m
```

5. Isi method *up* seperti ini di file _migration_ yang ter-generate:
```php
public function up()
{
  Schema::create('posts', function (Blueprint $table) {
    $table->id();
    $table->string('image');
    $table->string('title');
    $table->text('content');
    $table->timestamps();
  });
}
```
6. Di dalam class Post (Model), tambahkan kode berikut
```php
protected $fillable = [
    'image',
    'title',
    'content',
];
```
7. Jalankan migration
```console
php artisan migrate
```
8. Buat controller untuk post
```
php artisan make:controller PostController
```
9. Tulis kode ini di dalam class PostController
```php
public function index() {
    //get posts
    $posts = Post::latest()->paginate(5);

    //render view with posts
    return view('posts.index', compact('posts'));
}
```
10. Jangan lupa impor kelas post,
```php
use App\Models\Post;
```
11. Tambahkan route untuk web,
```php
Route::resource('/posts', \App\Http\Controllers\PostController::class);
```
12. Periksa route yang sudah di buat di terminal/command line
```
php artisan route:list
```
13. Buat folder dengan nama "posts" di dalam folder view, di dalamnya, buat view dengan nama index.blade.php

14. Salin isi view index dari sini: 

- https://github.com/ainandoo/bblk/blob/master/laravel/laravel-blog/resources/views/posts/index.blade.php

15. Cek tampilannya di alamat: http://localhost:8000/posts

16. Tambah method _create_ di dalam PostController
```php
public function create() {
    return view('posts.create');
}
```
17. Tambah method _store_ di dalam PostController
```php
public function store(Request $request) {
        // validasi form
        $this->validate($request, [
            'image'     => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'title'     => 'required|min:5',
            'content'   => 'required|min:10'
        ]);

        // upload gambar
        $image = $request->file('image');
        $image->storeAs('public/posts', $image->hashName());

        // mengisi record ke dalam tabel post
        Post::create([
            'image'     => $image->hashName(),
            'title'     => $request->title,
            'content'   => $request->content
        ]);

        // redirect ke index
        return redirect()->route('posts.index')->with(['success' => 'Data Berhasil Disimpan!']);
    }
```
18. Buat view dengan nama "create" di dalam folder posts, salin isi view dari sini
- https://github.com/ainandoo/bblk/blob/master/laravel/laravel-blog/resources/views/posts/create.blade.php

19. Cek tampilannya di alamat: http://localhost:8000/posts/create

20. Tambah method _show_ di dalam PostController
```php
    public function show($id) {
        // get post by ID
        $post = Post::find($id);

        // return view
        return view('posts.show', compact('post'));
    }
```

21. Buat view dengan nama "show" di dalam folder posts, salin isi view dari sini
- https://github.com/ainandoo/bblk/blob/master/laravel/laravel-blog/resources/views/posts/show.blade.php

22. Tambah method _edit_ di dalam PostController
```php
    public function edit(Post $post) {
        return view('posts.edit', compact('post'));
    }
```
23. Tambah method _update_ di dalam PostController
```php
public function update(Request $request, Post $post)
    {
        //validate form
        $this->validate($request, [
            'image'     => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'title'     => 'required|min:5',
            'content'   => 'required|min:10'
        ]);

        //check if image is uploaded
        if ($request->hasFile('image')) {

            //upload new image
            $image = $request->file('image');
            $image->storeAs('public/posts', $image->hashName());

            //delete old image
            Storage::delete('public/posts/'.$post->image);

            //update post with new image
            $post->update([
                'image'     => $image->hashName(),
                'title'     => $request->title,
                'content'   => $request->content
            ]);

        } else {

            //update post without image
            $post->update([
                'title'     => $request->title,
                'content'   => $request->content
            ]);
        }

        //redirect to index
        return redirect()->route('posts.index')->with(['success' => 'Data Berhasil Diubah!']);
    }
```
24. Buat view dengan nama "edit" di dalam folder posts, salin isi view dari sini
- https://github.com/ainandoo/bblk/blob/master/laravel/laravel-blog/resources/views/posts/edit.blade.php

25. Tambahkan method _destroy_ pada PostController
```php
    public function destroy(Post $post) {
        // delete image
        Storage::delete('public/posts/'. $post->image);

        // delete post
        $post->delete();

        // redirect to index
        return redirect()->route('posts.index')->with(['success' => 'Data Berhasil Dihapus!']);
    }
```

