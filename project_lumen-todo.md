### Langkah-langkah membuat project: Lumen todo

1. Jalankan perintah berikut

    $ composer create-project --prefer-dist laravel/lumen lumen-todo

    $ cd lumen-todo

2. Nyalakan web dan database server (xampp) dan coba jalankan aplikasi

    $ php -S localhost:8000 -t public

3. Cek di alamat: http://localhost:8000

4. Buat database kosong di PHPMyAdmin atau aplikasi database client yang digunakan

5. Edit file .env, isi konfigurasi DB_DATABASE dengan nama database dan setup database server

6. Pada file `bootstrap/app.php` hapus komentar pada bagian-bagian berikut ini:
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

11. Buat file migration dan tabel todos

    $ php artisan make:migration create_todos_table --create=todos

12. Isi method _up_ dengan kode berikut
```
public function up()
{
    Schema::create('todos', function(Blueprint $table) {
        $table->id();
        $table->string('name');
        $table->string('description')->nullable();
        $table->timestamps();
    });
}
```
13. Jalankan perintah migrate

    $ php artisan migrate

14. Buat file Todo.php di folder `app/Models/Todo.php`
```
<?php 

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Todo extends Model {

    protected $fillable = [
        'name', 'description'
    ];
}
```
15. Buat api endpoint pada file `routes/web.php`
```
// API route group prefix /api

$router->group(['prefix' => 'api'], function() use ($router) {
    $router->post('todo','TodoController@store');
    $router->get('todo', 'TodoController@index');
    $router->get('todo/{id}', 'TodoController@show');
    $router->put('todo/{id}', 'TodoController@update');
    $router->delete('todo/{id}', 'TodoController@destroy');
 });
 ```
 16. Buat file controller TodoController.php di folder `app/Http/Controllers/` dan masukkan kode berikut
 ```
 <?php

 namespace App\Http\Controllers;

use Illuminate\Http\{Request, JsonResponse};
use App\Models\Todo;

class TodoController extends Controller {
    protected $todo;
    
    public function __construct(Todo $todo) {
        $this->todo = $todo;
    }
}
```
17. Tambahkan function _store_ dibawah constructor
```
    public function store(Request $request): JsonResponse {
        
        // validate incoming request 
        $data = $this->validate($request, [
            'name' => 'required|max:100',
            'description' => 'nullable'
        ]);
    
        try {
            $todo = $this->todo->create($data);
            
            //return successful response
            return response()->json([
                'status' => true,
                'message' => 'Data todo berhasil disimpan.',
                'data' => $todo
            ], 201);
        } catch(\Exception $e) {
            //return error message
            return response()->json([
                'status' => false,
                'message' => 'Create data todo gagal'
            ], 409);
        }
    }
```
18. Tambahkan function _index_ di bawahnya lagi
```
    public function index(): JsonResponse {

        $todos = $this->todo->all();
        
        return response()->json(
            ['data' => $todos], 
            200
        );
    }
```
19. Tambahkan function _show_ di bawahnya lagi
```
public function show(int $id): JsonResponse {
    $todo = $this->todo->findOrFail($id);
    
    return response()->json(['data' => $todo], 200);
}
```
20. Tambahkan function update dibawahnya lagi
```
    public function update(Request $request, int $id): JsonResponse {
        //validate incoming request 
        $data = $this->validate($request, [
            'name' => 'required|max:100',
            'description' => 'nullable'
        ]);
    
        try {
            $todo = $this->todo->findOrFail($id);
            $todo->fill($data);
            $todo->save();
            
            //return successful response
            return response()->json([
                'status' => true,
                'message' => 'Data todo berhasil diupdate',
                'data' => $todo
            ], 201);
         } catch(\Exception $e) {
            //return error message
            return response()->json([
                'status' => false,
                'message' => 'Update data todo gagal'
            ], 409);
         }
    }
```
21. Tambahkan function delete dibawahnya lagi
```
    public function destroy(int $id): JsonResponse {

        try {
            $todo = $this->todo->findOrFail($id);
            $todo->delete();

            //return successful response
            return response()->json([
                'status' => true,
                'message' => 'Data todo berhasil dihapus',
                'user' => $todo
            ], 201);
        } catch(\Exception $e) {
            //return error message
            return response()->json([
                'status' => false,
                'message' => 'Hapus data todo gagal'
            ], 409);
        }
    }
```