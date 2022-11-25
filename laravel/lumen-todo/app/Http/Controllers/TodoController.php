<?php

namespace App\Http\Controllers;

use Illuminate\Http\{Request, JsonResponse};
use App\Models\Todo;

class TodoController extends Controller {
    protected $todo;

    public function __construct(Todo $todo) {
        $this -> todo = $todo;
    }

    public function store(Request $request): JsonResponse {
        $data = $this -> validate($request, [
            'name' => 'required|max:100',
            'description' => 'nullable'
        ]);

        try {
            $todo = $this ->todo -> create($data);
            return response() -> json([
                'status' => true,
                'message' => 'Data todo berhasil disimpan!',
                'data' => $todo
            ], 201);
        } catch(\Exception $e) {
            return response() -> json([
                'status' => false,
                'message' => 'Create data todo gagal'
            ], 409);
        }
    }


    
}