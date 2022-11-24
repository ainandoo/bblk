### Langkah-langkah membuat project: Laravel blog

1. Jalankan perintah berikut:

    $ composer create-project laravel/laravel laravel-blog

    $ cd laravel-blog

    $ php artisan storage:link

2. Buat database kosong di PHPMyAdmin atau aplikasi database client yang digunakan

3. Edit file .env, isi konfigurasi DB_DATABASE dengan nama database

4. Buat model Post,

    $ php artisan make:model Post -m

5. Isi method *up* seperti ini di file _migration_ yang tergenerate:

```
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

6. Di dalam class Post, tambahkan kode berikut

```
protected $fillable = [
    'image',
    'title',
    'content',
];
```

7. Jalankan migration

    $ php artisan migrate

8. Buat controller untuk post

    $ php artisan make:controller PostController

9. Tulis kode ini di dalam class PostController

```
public function index() {
    //get posts
    $posts = Post::latest()->paginate(5);

    //render view with posts
    return view('posts.index', compact('posts'));
}
```

10. Jangan lupa impor kelas post,

```
use App\Models\Post;
```

11. 