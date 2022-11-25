### Langkah-langkah membuat project: Lumen todo

1. Jalankan perintah berikut

    $ composer create-project --prefer-dist laravel/lumen lumen-todo
    $ cd lumen-todo

2. Nyalakan web dan database server (xampp) dan coba jalankan aplikasi

    $ php -S localhost:8000 -t public

3. Cek di alamat: http://localhost:8000

4. Buat database kosong di PHPMyAdmin atau aplikasi database client yang digunakan

5. Edit file .env, isi konfigurasi DB_DATABASE dengan nama database dan setup database server

6. Pada file bootstrap/app.php hapus komentar pada bagian-bagian berikut ini:
```
// $app->withFacades();

// $app->withEloquent();

// $app->routeMiddleware([
//    'auth'=> App\Http\Middleware\Authenticate::class,
// ]);

// $app->register(App\Providers\AppServiceProvider::class);

// $app->register(App\Providers\AuthServiceProvider::class);
```
7. Generate APP_KEY di file routes/web.php
```
use Illuminate\Support\Str;

$router->get('/key', function() {
    return Str::random(32);
});
```
8. Jalankan perintah berikut:

    $ php -S localhost:8000 -t public

9. Akses http://localhost:8000/key yang nanti akan menghasilkan nilai seperti "0qu89f2zHQVdDhJuSLe4acxfH5ASg2vr"

10. Buka file .env, masukkan ke bagian APP_KEY=

11. 